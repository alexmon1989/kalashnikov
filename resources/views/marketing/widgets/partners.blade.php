<!-- Owl Clients v1 -->
<div class="headline"><h2>Наши партнёры</h2></div>
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
<!-- End Owl Clients v1 -->