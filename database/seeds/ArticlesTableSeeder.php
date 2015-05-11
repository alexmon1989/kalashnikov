<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('articles')->truncate();

        Article::create(array(
                'title' => 'Миссии компании',
                'full_text' => '<ul class="list-unstyled">
                    <li><i class="fa fa-check color-green"></i> Расширение ассортиментного ряда компании;</li>
                    <li><i class="fa fa-check color-green"></i> Полный охват всех торговых точек РСО-Алания;</li>
                    <li><i class="fa fa-check color-green"></i> Не останавливаться на достигнутом.</li>
                </ul>',
                'type' => 'service_left'
            )
        );

        Article::create(array(
                'title' => 'Принципы работы',
                'full_text' => '<ul class="list-unstyled">
                    <li><i class="fa fa-check color-green"></i> Стабильность;</li>
                    <li><i class="fa fa-check color-green"></i> Надёжность;</li>
                    <li><i class="fa fa-check color-green"></i> Качество;</li>
                    <li><i class="fa fa-check color-green"></i> Честность;</li>
                    <li><i class="fa fa-check color-green"></i> Заинтересованность во всех клиентах;</li>
                    <li><i class="fa fa-check color-green"></i> Уважение к каждому клиенту.</li>
                </ul>',
                'type' => 'service_middle'
            )
        );

        Article::create(array(
                'title' => 'Текущие вакансии',
                'full_text' => '<p>На данный момент открыта вакансия:</p>
                <ul class="list-unstyled">
                    <li><i class="fa fa-check color-green"></i> Экономист.</li>
                </ul>',
                'type' => 'service_right'
            )
        );

        Article::create(array(
                'title' => 'Обращение директора',
                'full_text' => '<p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam. Aliquam porta feugiat tincidunt. Praesent pharetra massa et turpis lacinia volutpat. Aliquam bibendum orci id justo ornare fringilla. In at eros id nisi pulvinar placerat. Phasellus pellentesque massa vitae justo volutpat, et fermentum nisi gravida. </p>
                <p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam.</p>',
                'type' => 'main_article'
            )
        );

        Article::create(array(
                'full_text' => 'Компания основана в 1992 году. На момент основания компании мы имели очень слабые ресурсы, как складские, так и офисные. Однако на протяжении последующих 18 лет руководитель компании прилагал максимальные усилия для ее развития.',
                'type' => 'footer_about'
            )
        );

        Article::create(array(
                'full_text' => '<i>Директор:</i> <br>
                        КАЛАШНИКОВ Виталий Александрович <br>
                        тел: 8 (8672) 56-11-50, доп. 101 <br>
                        8 (8672) 44-08-39, 8 (928) 928-24-64 <br>
                        Email: <a class="" href="mailto:kalashnikov@kalashnikovcom.ru">kalashnikov@kalashnikovcom.ru</a>

                        <br><br>
                        <i>Коммерческий директор:</i> <br>
                        ЦЕБОЕВ Сосланбек Солтанбекович <br>
                        тел: 8 (8672) 56-11-50, доп. 105 <br>
                        94-50-82, 8 (918) 824-50-82 <br>
                        Email: <a class="" href="mailto:tceboev_s@kalashnikovcom.ru">tceboev_s@kalashnikovcom.ru</a>',
                'type' => 'footer_contacts'
            )
        );

        Article::create(array(
                'full_text' => '<p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam. Aliquam porta feugiat tincidunt. Praesent pharetra massa et turpis lacinia volutpat. Aliquam bibendum orci id justo ornare fringilla. In at eros id nisi pulvinar placerat. Phasellus pellentesque massa vitae justo volutpat, et fermentum nisi gravida. </p>
                <p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam.</p>',
                'type' => 'about'
            )
        );
    }

}