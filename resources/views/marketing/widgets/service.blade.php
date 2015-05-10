<!-- Service Blocks -->
<div class="row margin-bottom-30">
    <div class="col-md-4">
        <div class="service">
            <i class="fa fa-compress service-icon"></i>
            <div class="desc">
                <h4>{{ $left_block->title }}</h4>
                {!! $left_block->full_text !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="service">
            <i class="fa fa-cogs service-icon"></i>
            <div class="desc">
                <h4>{{ $middle_block->title }}</h4>
                {!! $middle_block->full_text !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="service">
            <i class="fa fa-hand-o-up service-icon"></i>
            <div class="desc">
                <h4>{{ $right_block->title }}</h4>
                {!! $right_block->full_text !!}
            </div>
        </div>
    </div>
</div>
<!-- End Service Blokcs -->