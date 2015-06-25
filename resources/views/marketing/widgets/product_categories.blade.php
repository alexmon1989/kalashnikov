<!-- Продукция -->
<div class="owl-carousel-v1 owl-work-v1 margin-bottom-40">
    <div class="headline"><h2 class="pull-left">Продукция</h2>
        <div class="owl-navigation">
            <div class="customNavigation">
                <a class="owl-btn prev-product-category"><i class="fa fa-angle-left"></i></a>
                <a class="owl-btn next-product-category"><i class="fa fa-angle-right"></i></a>
            </div>
        </div><!--/navigation-->
    </div>

    <div class="owl-product-categories">
        @foreach($categories as $category)
        <div class="item">
            <a href="{{ count($category->childCategories) > 0 ? action('Marketing\ProductsController@getCategory', ['id' => $category->childCategories[0]->id]) : '#' }}">
                <em class="overflow-hidden">
                    <img class="img-responsive" src="{{ asset('img/product_categories/'.$category->file_name) }}" alt="{{ $category->title }}">
                </em>
                <span>
                    <strong>{{ $category->title }}</strong>
                    <i>{!! $category->description !!}</i>
                </span>
            </a>
        </div>
        @endforeach
    </div>
</div>
<!-- End Продукция -->