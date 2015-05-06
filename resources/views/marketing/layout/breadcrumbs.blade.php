<!--=== Breadcrumbs ===-->
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">{{ $title }}</h1>
        <ul class="pull-right breadcrumb">
            @foreach($items as $item)
                <li class="{{ $item['active'] == TRUE ? 'active' : '' }}">
                    @if ($item['action'] != '')
                    <a href="{{ action($item['action']) }}">{{ $item['title'] }}</a>
                    @else
                    {{ $item['title'] }}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div><!--/breadcrumbs-->
<!--=== End Breadcrumbs ===-->