@extends('marketing.layout.master')

@section('top_content')
    @slider()
    @include('marketing.layout.purchase')
@stop

@section('content')

@service()
@news()
@product_categories()

<!-- Info Blokcs -->
<div class="row">
    <!-- Welcome Block -->
    <div class="col-md-8 md-margin-bottom-40">
        <div class="headline"><h2>Обращение директора</h2></div>
        <div class="row">
            <div class="col-sm-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc mollis, turpis nec mollis ultrices, est orci rhoncus justo, in pretium quam nibh at nisl. Maecenas felis elit, convallis non neque lobortis, volutpat sagittis ex. Curabitur porttitor eu risus non iaculis. Proin vel augue quis tortor convallis suscipit vitae sit amet sem. Curabitur at lacus ut ante sodales dapibus. Proin varius pharetra tortor, at sagittis diam rhoncus et. Donec sit amet risus gravida, mollis libero et, efficitur neque. Morbi sed lacinia risus. Morbi lobortis lacus tellus, quis mattis lorem pretium eu. Suspendisse ligula purus, congue et euismod eget, lobortis non nunc. Integer non sem faucibus, vulputate nibh et, tincidunt urna. Proin vitae neque eros. Aenean mollis luctus laoreet.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam. Aliquam porta feugiat tincidunt. Praesent pharetra massa et turpis lacinia volutpat. Aliquam bibendum orci id justo ornare fringilla. In at eros id nisi pulvinar placerat. Phasellus pellentesque massa vitae justo volutpat, et fermentum nisi gravida. </p>
                <p>Praesent aliquet vitae massa nec porta. Nulla facilisi. Pellentesque vitae ipsum purus. Nullam aliquam imperdiet quam id maximus. Phasellus porttitor nulla nec mattis lobortis. Nullam nec metus congue, interdum leo et, pretium diam.</p>
            </div>
            <div class="col-sm-4">
                <img class="img-responsive margin-bottom-20" src="img/main/img27.jpg" alt="">
            </div>
        </div>
    </div><!--/col-md-8-->

    <!-- Галерея и опрос -->
    <div class="col-md-4">
        @gallery()
        @polls()
    </div><!--/col-md-4-->
</div>
<!-- End Info Blokcs -->

@clients()

@stop