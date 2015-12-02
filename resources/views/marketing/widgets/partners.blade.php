<!-- Наши партнёры -->
<div class="headline"><h2>Наши партнёры</h2></div>
<div class="row our-partners">
    <div class="col-xs-1 text-right">
       <a class="owl-btn prev-clients"><i class="fa fa-angle-left"></i></a>
    </div>
    <div class="col-xs-10">
        <div class="owl-clients-v1 margin-bottom-20">
            @foreach($partners as $partner)
                <div class="item">
                    @if(trim($partner->url) != '')
                        <a title="Перейти на сайт партнёра" href="{{ $partner->url }}" target="_blank"><img src="{{ asset('img/partners/'.$partner->file_name) }}" alt="{{ $partner->title }}"></a>
                    @else
                        <img src="{{ asset('img/partners/'.$partner->file_name) }}" alt="{{ $partner->title }}">
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="col-xs-1 text-left">
       <a class="owl-btn next-clients"><i class="fa fa-angle-right"></i></a>
    </div>
</div>
<!-- End Наши партнёры -->