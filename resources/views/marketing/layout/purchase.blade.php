<!--=== Purchase Block ===-->
<div class="purchase">
    <div class="container">
        <div class="row">
            <div class="col-md-9 animated fadeInLeft">
                <span>Мы - ведущий поставщик продуктов на территории РСО-Алания.</span>
            </div>
            <div class="col-md-3 animated fadeInRight">
                <a href="#" class="btn-u btn-u-blue btn-u-lg rounded" data-toggle="modal" data-target="#responsive"><i class="fa fa-envelope-square"></i> Запросить прайс-лист</a>
            </div>
        </div>
    </div>
</div><!--/row-->
<!-- End Purchase Block -->

<!-- Bootstrap Modals With Forms -->
<div class="modal fade" id="responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel4">Запрос прайс-листа</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div style="display: none" id="loading-div" class="text-center">Пожалуйста, подождите, идёт отправка сообщения...<img width="60" src="{{ asset('img/loading.gif') }}" alt="Отправка..."/></div>
                    
                        <div class="alert alert-danger" style="display: none" id="errors-price-div">
                            <h4>Ошибка!</h4>
                            <div id="errors-text"></div>
                        </div>

                        <div class="alert alert-success" style="display: none" id="success-price-div">
                            <h4>Сообщение отправлено!</h4>
                            В ближайшеее время по указанному адресу мы вышлем наш прайс-лист.
                        </div>
                        
                        <h4>Укажите E-Mail, на который высылать прайс-лист:</h4>
                        <input type="text" id="email_for_price" class="form-control" placeholder="Введите E-Mail">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-u btn-u-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn-u btn-u-primary" id="request_price_btn">Отправить</button>
            </div>
        </div>
    </div>
</div>
<!-- End Bootstrap Modals With Forms -->