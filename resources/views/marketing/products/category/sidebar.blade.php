<h4>Категории</h4>

<ul id="sidebar-nav" class="list-group sidebar-nav-v1">
    @foreach($categories as $parentCategory)
    <li class="list-group-item list-toggle {{ $parentCategory->id == $category->parentCategory->id ? 'active' : '' }}">
        <a data-toggle="collapse" data-parent="#sidebar-nav" href="#category-{{ $parentCategory->id }}">{{ $parentCategory->title }}</a>

        @if (count($parentCategory->childCategories) > 0)
        <ul id="category-{{ $parentCategory->id }}" class="collapse {{ $parentCategory->id == $category->parentCategory->id ? 'in' : '' }}">

            @foreach($parentCategory->childCategories as $childCategory)
            <li class="{{ $childCategory->id == $category->id ? 'active' : '' }}">
                <a href="{{ action('Marketing\ProductsController@getCategory', ['id' => $childCategory->id]) }}"><i class="fa fa-chevron-circle-right"></i> {{ $childCategory->title }}</a>
            </li>
            @endforeach

        </ul>
        @endif

    </li>
    @endforeach
</ul>

<h4>Фильтры</h4>

<form method="get">
    <div id="accordion" class="panel-group">
        <div class="panel panel-grey">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a href="#title" data-parent="#accordion" data-toggle="collapse">
                        Название
                        <i class="fa fa-angle-down"></i>
                    </a>
                </h2>
            </div>
            <div class="panel-collapse collapse in" id="title">
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" placeholder="Название" id="title" name="title" class="form-control" value="{{ Input::get('title') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="accordion-v2" class="panel-group">
        <div class="panel panel-grey">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a href="#manufacturers" data-parent="#accordion-v2" data-toggle="collapse">
                        Производитель
                        <i class="fa fa-angle-down"></i>
                    </a>
                </h2>
            </div>
            <div class="panel-collapse collapse in" id="manufacturers">
                <div class="panel-body">
                    @foreach($manufacturers as $item)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" {{ in_array($item->id, Input::get('manufacturer_id', array())) ? 'checked=""' : '' }} name="manufacturer_id[]" value="{{ $item->id }}"> {{ $item->title }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="accordion-v3" class="panel-group">
        <div class="panel panel-grey">
            <div class="panel-heading">
                <h2 class="panel-title">
                    <a href="#providers" data-parent="#accordion-v3" data-toggle="collapse">
                        Поставщик
                        <i class="fa fa-angle-down"></i>
                    </a>
                </h2>
            </div>
            <div class="panel-collapse collapse in" id="providers">
                <div class="panel-body">
                    @foreach($providers as $item)
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" {{ in_array($item->id, Input::get('provider_id', array())) ? 'checked=""' : '' }} name="provider_id[]" value="{{ $item->id }}"> {{ $item->title }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <button class="btn-u btn-u-blue" type="submit">Применить</button>
</form>