<!-- Новости -->
<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
    <div class="headline"><h2 class="pull-left">Новости</h2>
        <div class="owl-navigation">
            <div class="customNavigation">
                <a class="owl-btn prev-news"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next-news"><i class="fa fa-angle-right"></i></a>
            </div>
        </div><!--/navigation-->
    </div>

    <div class="owl-news">
        @foreach($news as $item)
        <div class="item">
            <a href="{{ action('Marketing\NewsController@getShow', array('id' => $item->id)) }}">
                <em class="overflow-hidden">
                    <img class="img-responsive" src="{{ asset('img/thumb/'.$item->thumbnail) }}" alt="{{ $item->title }}">
                </em>
                <span>
                    <strong>{{ $item->title }}</strong>
                    <i>{{ Str::limit($item->preview_text_small, 150) }}</i>
                </span>
            </a>
        </div>
        @endforeach
    </div>
</div>
<!-- End Новости -->