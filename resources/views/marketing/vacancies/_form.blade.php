<form class="sky-form" action="{{ action('Marketing\VacanciesController@postFormCV') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
        <section>
            <label class="label">Вакансия</label>
            <label class="select">
                <select name="vacancy_id">
                    <option value="0">Выбирайте вакансию</option>
                    @foreach($vacancies as $vacancy)
                        <option value="{{ $vacancy->id }}" {{ old('vacancy_id') == $vacancy->id ? 'selected="selected" ' : '' }}>{{ $vacancy->title }}</option>
                    @endforeach
                </select>
                <i></i>
            </label>
        </section>

        <section>
            <label class="label">ФИО</label>
            <label class="input">
                <input type="text" name="username" value="{{ old('username') }}">
            </label>
        </section>

        <section>
            <label class="label">Фото</label>
            <label class="input input-file" for="file">
                <div class="button"><input type="file" name="photo" onchange="this.parentNode.nextSibling.value = this.value" id="file">Выбрать</div><input type="text" readonly="">
            </label>
            <div class="note"><strong>Информация:</strong> резюме без фото не рассматриваются.</div>
        </section>

        <section>
            <label class="label">Дата и место рождения, возраст</label>
            <label class="input">
                <input type="text" name="birthdate" value="{{ old('birthdate') }}">
            </label>
        </section>

        <section>
            <label class="label">Домашний адрес (фактический)</label>
            <label class="input">
                <input type="text" name="address_fact" value="{{ old('address_fact') }}">
            </label>
        </section>

        <section>
            <label class="label">Домашний адрес (по прописке)</label>
            <label class="input">
                <input type="text" name="address_reg" value="{{ old('address_reg') }}">
            </label>
        </section>

        <div class="row">
            <section class="col col-4">
                <label class="label">Телефон домашний</label>
                <label class="input">
                    <input type="text" name="phone_home" value="{{ old('phone_home') }}">
                </label>
            </section>
            <section class="col col-4">
                <label class="label">мобильный</label>
                <label class="input">
                    <input type="text" name="phone_mobile" value="{{ old('phone_mobile') }}">
                </label>
            </section>
            <section class="col col-4">
                <label class="label">E-Mail</label>
                <label class="input">
                    <input type="text" name="email" value="{{ old('email') }}">
                </label>
            </section>
        </div>

        <div class="row">
            <section class="col col-4">
                <label class="label">Семейное положение</label>
                <label class="input">
                    <input type="text" name="marital_status" value="{{ old('marital_status') }}">
                </label>
            </section>
            <section class="col col-2">
                <label class="label">Дети</label>
                <div class="inline-group">
                    <label class="radio"><input type="radio" name="has_children" value="1" {{ old('has_children', 0) == 1 ? 'checked' : '' }}><i class="rounded-x"></i>Да</label>
                    <label class="radio"><input type="radio" name="has_children" value="0" {{ old('has_children', 0) == 0 ? 'checked' : '' }}><i class="rounded-x"></i>Нет</label>
                </div>
            </section>
            <section class="col col-6">
                <label class="label">Возраст детей</label>
                <label class="input">
                    <input type="text" name="children_age" value="{{ old('children_age') }}">
                </label>
            </section>
        </div>
    </fieldset>

    <fieldset>
        <div class="panel panel-grey margin-bottom-20">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i> Состав семьи</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-relation">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Степень родства</th>
                            <th>Фамилия, имя, отчество</th>
                            <th>Род занятий</th>
                            <th>Год рождения</th>
                        </tr>
                    </thead>
                    <tbody>
                    @for($i = 1; $i <= 4; $i++)
                        <tr>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                <section>
                                    <label class="input">
                                        <input type="text" name="relation_degree_{{ $i }}" value="{{ old('relation_degree_'.$i) }}">
                                    </label>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <label class="input">
                                        <input type="text" name="relation_name_{{ $i }}" value="{{ old('relation_name_'.$i) }}">
                                    </label>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <label class="input">
                                        <input type="text" name="relation_occupation_{{ $i }}" value="{{ old('relation_occupation_'.$i) }}">
                                    </label>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <label class="input">
                                        <input type="text" name="relation_birth_year_{{ $i }}" value="{{ old('relation_birth_year_'.$i) }}">
                                    </label>
                                </section>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="row">
            <section class="col col-2">
                <label class="label">Водительские права</label>
                <div class="inline-group">
                    <label class="radio"><input type="radio" name="drivers_license" value="1" {{ old('drivers_license', 0) == 1 ? 'checked=""' : '' }}><i class="rounded-x"></i>Есть</label>
                    <label class="radio"><input type="radio" name="drivers_license" value="0" {{ old('drivers_license', 0) == 0 ? 'checked=""' : '' }}><i class="rounded-x"></i>Нет</label>
                </div>
            </section>
            <section class="col col-3">
                <label class="label">Категория</label>
                <label class="select">
                    <select name="drivers_license_category">
                        <option value="0">Выбирайте категорию</option>
                        <option value="a" {{ old('drivers_license_category') == 'a' ? 'selected' : '' }}>A</option>
                        <option value="b" {{ old('drivers_license_category') == 'b' ? 'selected' : '' }}>B</option>
                        <option value="c" {{ old('drivers_license_category') == 'c' ? 'selected' : '' }}>C</option>
                        <option value="d" {{ old('drivers_license_category') == 'd' ? 'selected' : '' }}>D</option>
                        <option value="e" {{ old('drivers_license_category') == 'e' ? 'selected' : '' }}>E</option>
                    </select>
                    <i></i>
                </label>
            </section>
            <section class="col col-3">
                <label class="label">Стаж вождения</label>
                <label class="input">
                    <input type="text" name="driving_experience" value="{{ old('driving_experience') }}">
                </label>
            </section>
            <section class="col col-4">
                <label class="label">Наличие автомобиля (марка)</label>
                <label class="input">
                    <input type="text" name="automobile" value="{{ old('automobile') }}">
                </label>
            </section>
        </div>

        <section>
            <label class="label">Прохождение воинской службы, сведения о воинском учете (когда, где, род войск)</label>
            <label class="input">
                <input type="text" name="military" value="{{ old('military') }}">
            </label>
        </section>

        <section>
            <label class="label">Суммарный месячный доход на последнем месте работы</label>
            <label class="input">
                <input type="text" name="salary_last" value="{{ old('salary_last') }}">
            </label>
        </section>

        <div class="row">
            <section class="col col-6">
                <label class="label">Ожидаемая зарплата в нашей организации (минимум)</label>
                <label class="input">
                    <input type="text" name="salary_minimum" value="{{ old('salary_minimum') }}">
                </label>
            </section>
            <section class="col col-6">
                <label class="label">Оптимум</label>
                <label class="input">
                    <input type="text" name="salary_optimum" value="{{ old('salary_optimum') }}">
                </label>
            </section>
        </div>

        <section>
            <label class="label">Приемлем ли для вас ненормированный рабочий день?</label>
            <div class="inline-group">
                <label class="radio"><input type="radio" name="irregular_working" value="1" {{ old('irregular_working', 0) == 1 ? 'checked' : '' }}><i class="rounded-x"></i>Да</label>
                <label class="radio"><input type="radio" name="irregular_working" value="0" {{ old('irregular_working', 0) == 0 ? 'checked' : '' }}><i class="rounded-x"></i>Нет</label>
            </div>
        </section>

        <section>
            <label class="label">Источник информации о наличии вакансии</label>
            <label class="input">
                <input type="text" name="info_source" value="{{ old('info_source') }}">
            </label>
        </section>

        <section>
            <label class="label">Курение</label>
            <label class="select">
                <select name="smoking">
                    <option value="0">Выбирайте вариант</option>
                    <option value="yes" {{ old('smoking') == 'yes' ? 'selected' : '' }}>Да</option>
                    <option value="no" {{ old('smoking') == 'no' ? 'selected' : '' }}>Нет</option>
                    <option value="sometimes" {{ old('smoking') == 'sometimes' ? 'selected' : '' }}>Иногда</option>
                </select>
                <i></i>
            </label>
        </section>

        <div class="row">
            <section class="col col-4">
                <label class="label">Привлечение к уголовной ответственности</label>
                <div class="inline-group">
                    <label class="radio"><input type="radio" name="criminal" value="1" {{ old('criminal', 0) == 1 ? 'checked' : '' }}><i class="rounded-x"></i>Да</label>
                    <label class="radio"><input type="radio" name="criminal" value="0" {{ old('criminal', 0) == 0 ? 'checked' : '' }}><i class="rounded-x"></i>Нет</label>
                </div>
            </section>
            <section class="col col-8">
                <label class="label">№ статьи</label>
                <label class="input">
                    <input type="text" name="crime_article_num" value="{{ old('crime_article_num') }}">
                </label>
            </section>
        </div>
    </fieldset>

    <fieldset>
        <section>
            <label class="label">Образование</label>
            <label class="select">
                <select name="education">
                    <option value="0">Выбирайте вариант</option>
                    <option value="high_school" {{ old('education') == 'high_school' ? 'selected' : '' }}>Высшее</option>
                    <option value="pre_high_school" {{ old('education') == 'pre_high_school' ? 'selected' : '' }}>Незаконченное высшее</option>
                    <option value="college" {{ old('education') == 'college' ? 'selected' : '' }}>Средне-техническое</option>
                    <option value="school" {{ old('education') == 'school' ? 'selected' : '' }}>Среднее</option>
                </select>
                <i></i>
            </label>
        </section>

        <div class="panel panel-grey margin-bottom-20">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-institution"></i> Образование, курсы, семинары, тренинги, стажировки - подробно</h3>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-relation">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Даты поступления и окончания (продолжительность)</th>
                        <th>Название учебного заведения, учебного центра, город</th>
                        <th>Факультет, специальность, квалификация; успеваемость (средний балл – 3, 4, 5); отделение (очное, заочное, вечернее)</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 1; $i <= 4; $i++)
                        <tr>
                            <td>
                                {{ $i }}
                            </td>
                            <td>
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="1" name="education_date_{{ $i }}">{{ old('education_date_'.$i) }}</textarea>
                                    </label>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="3" name="education_place_{{ $i }}">{{ old('education_place_'.$i) }}</textarea>
                                    </label>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="3" name="education_specs_{{ $i }}">{{ old('education_specs_'.$i) }}</textarea>
                                    </label>
                                </section>
                            </td>
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="panel panel-grey margin-bottom-20">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-fax"></i> Информация о предыдущих местах работы</h3>
            </div>
            <div class="panel-body">
                <p>Начиная с последнего (ВСЕ! реальные места, вне зависимости от того, имеется запись в Трудовой книжке или нет)</p>
                @for($i = 1; $i <= 3; $i++)
                <p><strong>Организация {{ $i }}:</strong></p>
                <table class="table table-bordered table-relation last-jobs">
                    <tbody>
                        <tr>
                            <td>
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="1" name="job_date_{{ $i }}" placeholder="Месяц и год поступления/ухода">{{ old('job_date_'.$i) }}</textarea>
                                    </label>
                                    <div class="note">Месяц и год поступления/ухода</div>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="1" name="job_title_{{ $i }}" placeholder="Название организации, город">{{ old('job_title_'.$i) }}</textarea>
                                    </label>
                                    <div class="note">Название организации, город</div>
                                </section>
                            </td>
                            <td rowspan="3">
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="6" name="job_post_description_{{ $i }}" placeholder="Должностные обязанности">{{ old('job_post_description_'.$i) }}</textarea>
                                    </label>
                                    <div class="note">Должностные обязанности</div>
                                </section>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="1" name="job_post_{{ $i }}" placeholder="Должность">{{ old('job_post_'.$i) }}</textarea>
                                    </label>
                                    <div class="note">Должность</div>
                                </section>
                            </td>
                            <td>
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="1" name="job_organization_area_{{ $i }}" placeholder="Область деятельности организации">{{ old('job_organization_area_'.$i) }}</textarea>
                                    </label>
                                    <div class="note">Область деятельности организации</div>
                                </section>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="3" name="job_fire_reason_{{ $i }}" placeholder="Причина увольнения">{{ old('job_fire_reason_'.$i) }}</textarea>
                                    </label>
                                    <div class="note">Причина увольнения</div>
                                </section>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <section>
                                    <label class="textarea textarea-expandable">
                                        <textarea rows="3" name="job_recomendations_{{ $i }}" placeholder="Можно ли получить рекомендации на данном месте работы? Ф.И.О., должность, телефон">{{ old('job_recomendations_'.$i) }}</textarea>
                                    </label>
                                    <div class="note">Можно ли получить рекомендации на данном месте работы? Ф.И.О., должность, телефон</div>
                                </section>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @endfor
            </div>
        </div>
    </fieldset>

    <fieldset>
        <section>
            <label class="label">Владение ПК (укажите программы)</label>
            <label class="textarea textarea-expandable">
                <textarea rows="2" name="pc_level">{{ old('pc_level') }}</textarea>
            </label>
        </section>

        <p><strong>Ответьте, пожалуйста, на вопросы максимально подробно:</strong></p>

        <section>
            <label class="label">Какими профессиональными навыками, умениями и знаниями Вы обладаете?</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="prof_skills">{{ old('prof_skills') }}</textarea>
            </label>
        </section>

        <section>
            <label class="label">Были ли у вас разногласия с руководством? По каким вопросам?</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="controversy">{{ old('controversy') }}</textarea>
            </label>
        </section>

        <section>
            <label class="label">Что вам нравилось в вашей работе на предыдущем месте работы?</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="previous_job_like">{{ old('previous_job_like') }}</textarea>
            </label>
        </section>

        <section>
            <label class="label">Какие особенности в вашей работе вас не устраивали?</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="previous_job_dislike">{{ old('previous_job_dislike') }}</textarea>
            </label>
        </section>

        <section>
            <label class="label">Как бы Вы описали свой характер?</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="character">{{ old('character') }}</textarea>
            </label>
        </section>

        <section>
            <label class="label">Приходилось ли вам опаздывать на работу или на учебу?</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="lateness">{{ old('lateness') }}</textarea>
            </label>
        </section>

        <section>
            <label class="label">Как Вы проводите свободное время, хобби?</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="hobby">{{ old('hobby') }}</textarea>
            </label>
        </section>

        <section>
            <label class="label">Дополнительная информация</label>
            <label class="textarea textarea-expandable">
                <textarea rows="3" name="add_info">{{ old('add_info') }}</textarea>
            </label>
        </section>

    </fieldset>
    <footer>
        <button class="btn-u" type="submit">Отправить</button>
        <button class="btn-u btn-u-default" type="reset">Сброс</button>
    </footer>
</form>