<!-- Owl Clients v1 -->
<div class="headline"><h2>Наши клиенты</h2></div>
<div class="owl-clients-v1 margin-bottom-20">
    @foreach($clients as $client)
    <div class="item">
        <img src="{{ asset('img/clients/'.$client->file_name) }}" alt="{{ $client->title }}">
    </div>
    @endforeach
</div>
<!-- End Owl Clients v1 -->