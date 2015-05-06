<!--=== Footer Version 1 ===-->
<div class="footer-v1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-3 md-margin-bottom-40">
                    <a href="index.html"><img id="logo-footer" class="footer-logo" src="{{ asset('img/logo2-default.png') }}" alt=""></a>
                    <p>Компания основана в 1992 году. На момент основания компании мы имели очень слабые ресурсы, как складские, так и офисные. Однако на протяжении последующих 18 лет руководитель компании прилагал максимальные усилия для ее развития.</p>
                </div><!--/col-md-3-->
                <!-- End About -->

                @latest_news_footer()

                <!-- Link List -->
                <div class="col-md-3 md-margin-bottom-40">
                    <div class="headline"><h2>Ссылки</h2></div>
                    <ul class="list-unstyled link-list">
                        <li><a href="#">О компании</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ action('Marketing\NewsController@getIndex') }}">Новости</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="#">Продукция</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="#">Галерея</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="#">Контакты</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div><!--/col-md-3-->
                <!-- End Link List -->

                <!-- Address -->
                <div class="col-md-3 map-img md-margin-bottom-40">
                    <div class="headline"><h2>Контакты</h2></div>
                    <address class="md-margin-bottom-40">
                        <i>Директор:</i> <br />
                        КАЛАШНИКОВ Виталий Александрович <br />
                        тел: 8 (8672) 56-11-50, доп. 101 <br />
                        8 (8672) 44-08-39, 8 (928) 928-24-64 <br />
                        Email: <a href="mailto:kalashnikov@kalashnikovcom.ru" class="">kalashnikov@kalashnikovcom.ru</a>

                        <br /><br />
                        <i>Коммерческий директор:</i> <br />
                        ЦЕБОЕВ Сосланбек Солтанбекович <br />
                        тел: 8 (8672) 56-11-50, доп. 105 <br />
                        94-50-82, 8 (918) 824-50-82 <br />
                        Email: <a href="mailto:tceboev_s@kalashnikovcom.ru" class="">tceboev_s@kalashnikovcom.ru</a>
                    </address>
                </div><!--/col-md-3-->
                <!-- End Address -->
            </div>
        </div>
    </div><!--/footer-->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>
                        2015 &copy; Все права защищены.
                    </p>
                </div>
            </div>
        </div>
    </div><!--/copyright-->
</div>
<!--=== End Footer Version 1 ===-->