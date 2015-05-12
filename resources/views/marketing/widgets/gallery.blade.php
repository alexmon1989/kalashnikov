<div class="row">
    <div class="col-md-12 margin-bottom-20">
        <div class="headline"><h2>Фотогалерея</h2></div>
        <div id="myCarousel" class="carousel slide carousel-v1">
            <div class="carousel-inner">
                @foreach($images as $key => $image)
                <div class="item {{ $key == 0 ? 'active' : ''}}">
                    <a href="{{ action('Marketing\GalleryController@getCategory', array('id' => $image->category->id)) }}" title="Перейти в категорию">
                        <img src="{{ asset('img/gallery/'.$image->file_name) }}" alt="{{ $image->description }}">
                    </a>
                    <div class="carousel-caption">
                        <p>{{ $image->description }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="carousel-arrow">
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>