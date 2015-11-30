<!-- Наши партнёры -->
<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
    <div class="headline"><h2 class="pull-left">Наши партнёры</h2>
        <div class="owl-navigation">
            <div class="customNavigation">
                <a class="owl-btn prev-clients"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next-clients"><i class="fa fa-angle-right"></i></a>
            </div>
        </div><!--/navigation-->
    </div>

    <div class="owl-clients-v1">
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
<!-- End Наши партнёры -->