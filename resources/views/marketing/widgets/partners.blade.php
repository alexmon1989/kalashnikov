<!-- Owl Clients v1 -->
<div class="headline"><h2>Наши партнёры</h2></div>
<div class="owl-clients-v1 margin-bottom-20">
    @foreach($partners as $partner)
    <div class="item">
        <a href="#"><img src="{{ asset('img/partners/'.$partner->file_name) }}" alt="{{ $partner->title }}"></a>
    </div>
    @endforeach
</div>
<!-- End Owl Clients v1 -->