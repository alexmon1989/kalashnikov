<!--=== Footer Version 1 ===-->
<div class="footer-v1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-3 md-margin-bottom-40">
                    <a href="{{ action('Marketing\MainController@index') }}"><img id="logo-footer" class="footer-logo" src="{{ asset('img/logo2-default.png') }}" alt="ИП калашников"></a>
                    {!! Memory::get('footer.about') !!}
                </div><!--/col-md-3-->
                <!-- End About -->

                @latest_news_footer()

                <!-- Link List -->
                <div class="col-md-3 md-margin-bottom-40">
                    <div class="headline"><h2>Ссылки</h2></div>
                    <ul class="list-unstyled link-list">
                        <li><a href="{{ url() }}">Стартовая страница</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ action('Marketing\AboutController@getIndex') }}">О компании</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ action('Marketing\NewsController@getIndex') }}">Новости</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ action('Marketing\PromotionsController@getIndex') }}">Промо-акции</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ action('Marketing\ProductsController@getIndex') }}">Продукция</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ action('Marketing\GalleryController@getIndex') }}">Галерея</a><i class="fa fa-angle-right"></i></li>
                        <li><a href="{{ action('Marketing\ContactsController@getIndex') }}">Контакты</a><i class="fa fa-angle-right"></i></li>
                    </ul>
                </div><!--/col-md-3-->
                <!-- End Link List -->

                <!-- Address -->
                <div class="col-md-3 map-img md-margin-bottom-40">
                    <div class="headline"><h2>Контакты</h2></div>
                    <address class="md-margin-bottom-40">
                        {!! Memory::get('footer.contacts') !!}
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
                        {{ date('Y') }} &copy; Все права защищены.
                    </p>
                </div>
            </div>
        </div>
    </div><!--/copyright-->
</div>
<!--=== End Footer Version 1 ===-->