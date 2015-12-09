<?php namespace App\Http\Controllers\Marketing;

use App\CV;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News;
use App\Vacancy;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCVRequest;
use App\Http\Requests\StoreCVFormRequest;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Orchestra\Support\Facades\Memory;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;

class VacanciesController extends Controller {

	/**
	 * Отображение индексной страницы вакансий
	 */
	public function getIndex()
	{
        $data['vacancies'] = Vacancy::whereEnabled(TRUE)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('marketing.vacancies.index', $data);
	}

    /**
     * Обработка заппроса на отправку файла с резюме.
     *
     * @param StoreCVRequest $request валидатор данных
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postSendCV(StoreCVRequest $request)
    {
        // Сохраняем файл с резюме
        $uploadFile = $request->file('file_cv');
        $newFileName = Str::random().'.'.$uploadFile->getClientOriginalExtension();
        $uploadFile->move('temp_cv', $newFileName);
        $filePath = 'temp_cv'. DIRECTORY_SEPARATOR .$newFileName;

        // Отправляем письмо
        Mail::raw('', function($message) use ($request, $filePath)
        {
            $message->from($request->email, $request->username);
            $message->subject('Резюме, отправленное через сайт. Вакансия: '.Vacancy::find($request->vacancy_id)->title);
            $message->to(Memory::get('vacancies.email', 'hr@kalashnikovcom.ru'));
            $message->attach($filePath);
        });

        // Удаляем файл
        File::delete($filePath);

        //Возвращаем пользователя на предыд. страницу
        return redirect()->back()->with('success', 'Резюме успешно отправлено, с вами скоро свяжутся!');
    }

	/**
	 * Отображение страницы с формой заполнения резюме.
	 *
     * @return Response
	 */
	public function getFormCV()
	{
        $data['vacancies'] = Vacancy::whereEnabled(TRUE)
            ->where('title', '<>', 'Резерв')
            ->orderBy('created_at', 'DESC')
            ->get();

        // Отображаем представление
        return view('marketing.vacancies.form_cv', $data);

	}

    /**
     * Обработчик запроса на отправку формы с анткетой.
     *
     * @param StoreCVFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function postFormCV(StoreCVFormRequest $request)
    {
        // Фото с формы (меняем размер до 200 по ширине)
        $uploadFile = $request->file('photo');
        $newFileName = Str::random().'.'.$uploadFile->getClientOriginalExtension();
        $photoPath = 'temp_cv'. DIRECTORY_SEPARATOR .$newFileName;
        Image::make($uploadFile)
            ->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save($photoPath);

        //Создаём вордовский документ
        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(12);
        $section = $phpWord->addSection(['margintop' => 800, 'marginright' => 800]);

        // Имя соискателя
        $section->addText(
            htmlspecialchars($request->username),
            ['size' => 22]
        );

        // Вакансия
        $vacancyTitle = $request->vacancy_id != 'another'
                                            ? Vacancy::find($request->vacancy_id)->title
                                            : $request->another_vacancy;
        $section->addText(
            htmlspecialchars($vacancyTitle),
            ['size' => 15, 'color' => '6E6E6E']
        );
        $linestyle = array('weight' => 1, 'width' => 645, 'height' => 0);
        $section->addLine($linestyle);

        // Личные данные
        $cellRowSpan = array('vMerge' => 'restart', 'valign' => 'top');
        $cellRowContinue = array('vMerge' => 'continue');
        $table = $section->addTable('Colspan Rowspan');

        $table->addRow();
        $cell1 = $table->addCell(4000);
        $cell1->addText('Дата и место рождения, возраст', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->birthdate);
        $cell3 = $table->addCell(2000, $cellRowSpan);
        $cell3->addImage($photoPath, ['width' => 200]);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addText('Домашний адрес (фактический)', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->address_fact);
        $cell3 = $table->addCell(NULL, $cellRowContinue);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addText('Домашний адрес (по прописке)', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->address_reg);
        $cell3 = $table->addCell(NULL, $cellRowContinue);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addText('Телефон домашний', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->phone_home);
        $cell3 = $table->addCell(NULL, $cellRowContinue);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addText('Телефон мобильный', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->phone_mobile);
        $cell3 = $table->addCell(NULL, $cellRowContinue);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addText('E-Mail', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->email);
        $cell3 = $table->addCell(NULL, $cellRowContinue);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addText('Семейное положение', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->marital_status);
        $cell3 = $table->addCell(NULL, $cellRowContinue);

        $table->addRow();
        $cell1 = $table->addCell();
        $cell1->addText('Дети', ['bold' => true]);
        $cell2 = $table->addCell(3000, ['marginright' => 200]);
        $cell2->addText($request->has_children == 1 ? 'Есть' : 'Нет');
        $cell3 = $table->addCell(NULL, $cellRowContinue);

        if ($request->has_children == 1) {
            $table->addRow();
            $cell1 = $table->addCell();
            $cell1->addText('Возраст детей', ['bold' => true]);
            $cell2 = $table->addCell(3000, ['marginright' => 200]);
            $cell2->addText($request->children_age);
            $cell3 = $table->addCell(NULL, $cellRowContinue);
        }
        $section->addLine($linestyle);

        // Состав семьи
        $section->addText(
            htmlspecialchars('Состав семьи:'),
            ['size' => 16, 'bold' => true]
        );
        $styleTable = ['borderSize' => 6, 'cellMargin' => 80, 'alignment' => 'center'];
        $phpWord->addTableStyle('Family Table', $styleTable);
        $table = $section->addTable('Family Table');
        $table->addRow();
        $table->addCell(2500)->addText('Степень родства', ['bold' => true]);
        $table->addCell(2500)->addText('Фамилия, имя, отчество', ['bold' => true]);
        $table->addCell(2500)->addText('Род занятий', ['bold' => true]);
        $table->addCell(2500)->addText('Год рождения', ['bold' => true]);
        for ($r = 1; $r <= 4; $r++) {
            if ($request->{'relation_degree_'.$r} != '') {
                $table->addRow();
                $table->addCell()->addText($request->{'relation_degree_' . $r});
                $table->addCell()->addText($request->{'relation_name_' . $r});
                $table->addCell()->addText($request->{'relation_occupation_' . $r});
                $table->addCell()->addText($request->{'relation_birth_year_' . $r});
            }
        }

        // Продолжение личных данных
        $section->addTextBreak(1);
        $section->addLine($linestyle);
        $styleTable = ['cellMargin' => 80, 'alignment' => 'center'];
        $phpWord->addTableStyle('Data Table', $styleTable);

        $table = $section->addTable('Data Table');
        $table->addRow();
        $table->addCell(5000)->addText('Водительские права', ['bold' => true]);
        $table->addCell(5000)->addText($request->drivers_license == 1 ? 'Есть' : 'Нету');

        if ($request->drivers_license == 1) {
            $table->addRow();
            $table->addCell(5000)->addText('Категория', ['bold' => true]);
            $table->addCell(5000)->addText(strtoupper($request->drivers_license_category));

            $table->addRow();
            $table->addCell(5000)->addText('Стаж вождения', ['bold' => true]);
            $table->addCell(5000)->addText($request->driving_experience);

            $table->addRow();
            $table->addCell(5000)->addText('Наличие автомобиля (марка)', ['bold' => true]);
            $table->addCell(5000)->addText($request->automobile);
        }

        $table->addRow();
        $table->addCell(5000)->addText('Прохождение воинской службы, сведения о воинском учете (когда, где, род войск)', ['bold' => true]);
        $table->addCell(5000)->addText($request->military);

        $table->addRow();
        $table->addCell(5000)->addText('Суммарный месячный доход на последнем месте работы', ['bold' => true]);
        $table->addCell(5000)->addText($request->salary_last);

        $table->addRow();
        $table->addCell(5000)->addText('Ожидаемая зарплата в нашей организации (минимум)', ['bold' => true]);
        $table->addCell(5000)->addText($request->salary_minimum);

        $table->addRow();
        $table->addCell(5000)->addText('Ожидаемая зарплата в нашей организации (оптиммум)', ['bold' => true]);
        $table->addCell(5000)->addText($request->salary_optimum);

        $table->addRow();
        $table->addCell(5000)->addText('Приемлем ли для вас ненормированный рабочий день?', ['bold' => true]);
        $table->addCell(5000)->addText($request->irregular_working == 1 ? 'Да' : 'Нет');

        $table->addRow();
        $table->addCell(5000)->addText('Источник информации о наличии вакансии', ['bold' => true]);
        $table->addCell(5000)->addText($request->info_source);

        $table->addRow();
        $table->addCell(5000)->addText('Курение', ['bold' => true]);
        $smoking = ['yes' => 'Да', 'no' => 'Нет', 'sometimes' => 'Иногда'];
        $table->addCell(5000)->addText($smoking[$request->smoking]);

        $table->addRow();
        $table->addCell(5000)->addText('Привлечение к уголовной ответственности', ['bold' => true]);
        $table->addCell(5000)->addText($request->criminal == 1 ? 'Да' : 'Нет');

        if ($request->criminal == 1) {
            $table->addRow();
            $table->addCell(5000)->addText('№ статьи', ['bold' => true]);
            $table->addCell(5000)->addText($request->crime_article_num);
        }

        // Образование
        $section->addTextBreak(1);
        $section->addLine($linestyle);
        $section->addText(
            htmlspecialchars('Образование:'),
            ['size' => 16, 'bold' => true]
        );
        $styleTable = ['borderSize' => 6, 'cellMargin' => 80, 'alignment' => 'center'];
        $phpWord->addTableStyle('Education Table', $styleTable);
        $table = $section->addTable('Education Table');
        $table->addRow();
        $table->addCell(3333)->addText('Даты поступления и окончания (продолжительность)', ['bold' => true]);
        $table->addCell(3333)->addText('Название учебного заведения, учебного центра, город', ['bold' => true]);
        $table->addCell(3333)->addText('Факультет, специальность, квалификация; успеваемость (средний балл – 3, 4, 5); отделение (очное, заочное, вечернее)', ['bold' => true]);
        for ($r = 1; $r <= 4; $r++) {
            if ($request->{'education_date_'.$r} != '') {
                $table->addRow();
                $cell1 = $table->addCell();
                $date_strings = explode("\r\n", $request->{'education_date_' . $r});
                foreach ($date_strings as $item) {
                    $cell1->addText($item);
                }
                $cell2 = $table->addCell();
                $place_strings = explode("\r\n", $request->{'education_place_' . $r});
                foreach ($place_strings as $item) {
                    $cell2->addText($item);
                }
                $cell3 = $table->addCell();
                $specs_strings = explode("\r\n", $request->{'education_specs_' . $r});
                foreach ($specs_strings as $item) {
                    $cell3->addText($item);
                }
            }
        }

        // Информация о предыдущих местах работы
        $section->addTextBreak(1);
        $section->addLine($linestyle);
        $section->addText(
            htmlspecialchars('Информация о предыдущих местах работы:'),
            ['size' => 16, 'bold' => true]
        );
        for($i = 1; $i <= 3; $i++) {
            if (trim($request->{'job_date_'.$i}) != '') {
                $section->addText(
                    htmlspecialchars($request->{'job_date_' . $i}),
                    ['size' => 12, 'italic' => true]
                );
                if (trim($request->{'job_title_' . $i}) != '') {
                    $section->addText(
                        htmlspecialchars($request->{'job_title_' . $i}),
                        ['size' => 12, 'bold' => true]
                    );
                }
                if (trim($request->{'job_organization_area_' . $i}) != '') {
                    $section->addText(
                        htmlspecialchars('Область деятельности организации: ' . $request->{'job_organization_area_' . $i}),
                        ['size' => 8]
                    );
                }
                if (trim($request->{'job_post_' . $i}) != '') {
                    $section->addText(
                        htmlspecialchars($request->{'job_post_' . $i}),
                        ['italic' => true]
                    );
                }
                if (trim($request->{'job_post_description_' . $i}) != '') {
                    $job_post_description = explode("\r\n", $request->{'job_post_description_' . $i});
                    foreach ($job_post_description as $item) {
                        $section->addText(
                            htmlspecialchars($item)
                        );
                    }
                }
                if (trim($request->{'job_fire_reason_' . $i}) != '') {
                    $section->addText(
                        htmlspecialchars('Причина увольнения:'),
                        ['italic' => true, 'bold' => true]
                    );
                    $job_fire_reason = explode("\r\n", $request->{'job_fire_reason_' . $i});
                    foreach ($job_fire_reason as $item) {
                        $section->addText(
                            htmlspecialchars($item)
                        );
                    }
                }

                if (trim($request->{'job_recomendations_' . $i}) != '') {
                    $section->addText(
                        htmlspecialchars('Рекомендации:'),
                        ['italic' => true, 'bold' => true]
                    );
                    $job_recomendations = explode("\r\n", $request->{'job_recomendations_' . $i});
                    foreach ($job_recomendations as $item) {
                        $section->addText(
                            htmlspecialchars($item)
                        );
                    }
                }
                $section->addTextBreak(1);
            }
        }

        // Продолжение личных данных
        $section->addTextBreak(1);
        $section->addLine($linestyle);
        $styleTable = ['cellMargin' => 80, 'alignment' => 'center'];
        $phpWord->addTableStyle('Data Table', $styleTable);

        $table = $section->addTable('Data Table');
        $table->addRow();
        $table->addCell(5000)->addText('Какими профессиональными навыками, умениями и знаниями Вы обладаете?', ['bold' => true]);
        $cell = $table->addCell(5000);
        $prof_skills = explode("\r\n", $request->prof_skills);
        foreach ($prof_skills as $item) {
            $cell->addText(
                htmlspecialchars($item)
            );
        }

        $table->addRow();
        $table->addCell(5000)->addText('Были ли у вас разногласия с руководством? По каким вопросам?', ['bold' => true]);
        $cell = $table->addCell(5000);
        $controversy = explode("\r\n", $request->controversy);
        foreach ($controversy as $item) {
            $cell->addText(
                htmlspecialchars($item)
            );
        }

        $table->addRow();
        $table->addCell(5000)->addText('Что вам нравилось в вашей работе на предыдущем месте работы?', ['bold' => true]);
        $cell = $table->addCell(5000);
        $previous_job_like = explode("\r\n", $request->previous_job_like);
        foreach ($previous_job_like as $item) {
            $cell->addText(
                htmlspecialchars($item)
            );
        }

        $table->addRow();
        $table->addCell(5000)->addText('Какие особенности в вашей работе вас не устраивали?', ['bold' => true]);
        $cell = $table->addCell(5000);
        $previous_job_dislike = explode("\r\n", $request->previous_job_dislike);
        foreach ($previous_job_dislike as $item) {
            $cell->addText(
                htmlspecialchars($item)
            );
        }

        $table->addRow();
        $table->addCell(5000)->addText('Как бы Вы описали свой характер?', ['bold' => true]);
        $cell = $table->addCell(5000);
        $character = explode("\r\n", $request->character);
        foreach ($character as $item) {
            $cell->addText(
                htmlspecialchars($item)
            );
        }

        $table->addRow();
        $table->addCell(5000)->addText('Приходилось ли вам опаздывать на работу или на учебу?', ['bold' => true]);
        $cell = $table->addCell(5000);
        $lateness = explode("\r\n", $request->lateness);
        foreach ($lateness as $item) {
            $cell->addText(
                htmlspecialchars($item)
            );
        }

        $table->addRow();
        $table->addCell(6000)->addText('Как Вы проводите свободное время, хобби?', ['bold' => true]);
        $cell = $table->addCell(4000);
        $hobby = explode("\r\n", $request->hobby);
        foreach ($hobby as $item) {
            $cell->addText(
                htmlspecialchars($item)
            );
        }

        if (trim($request->add_info) != '') {
            $table->addRow();
            $table->addCell(5000)->addText('Дополнительная информация', ['bold' => true]);
            $cell = $table->addCell(5000);
            $add_info = explode("\r\n", $request->add_info);
            foreach ($add_info as $item) {
                $cell->addText(
                    htmlspecialchars($item)
                );
            }
        }

        if (trim($request->covering_letter) != '') {
            $table->addRow();
            $table->addCell(5000)->addText('Сопроводительное письмо', ['bold' => true]);
            $cell = $table->addCell(5000);
            $covering_letter = explode("\r\n", $request->covering_letter);
            foreach ($covering_letter as $item) {
                $cell->addText(
                    htmlspecialchars($item)
                );
            }
        }

        // Сохранение
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $filePath = 'temp_cv'. DIRECTORY_SEPARATOR .Str::random().'.docx';
        $objWriter->save($filePath);

        // Отправляем письмо
        Mail::raw('', function($message) use ($request, $filePath, $vacancyTitle)
        {
            $message->from($request->email, $request->username);
            $message->subject('Резюме, заполненное с помощью анкеты на сайте. Вакансия: '.$vacancyTitle);
            $message->to(Memory::get('vacancies.email', 'hr@kalashnikovcom.ru'));
            $message->attach($filePath);
        });

        // Удаляем лишние файлы
        File::delete([$filePath, $photoPath]);

        // Запись в БД отправленных данных (пока без картинок, т.к. и так требования хранить нету)
        $data = $request->all();
        $data['vacancy_title'] = $vacancyTitle;
        CV::create(['data_json' => json_encode($data)]);

        //Возвращаем пользователя на предыд. страницу
        return redirect()->back()->with('success', 'Резюме успешно сформировано и отправлено, с вами скоро свяжутся!');
    }
}
