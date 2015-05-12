<!--=== Slider ===-->
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            @foreach($sliders as $slider)
            <!-- SLIDE -->
            <li class="revolution-mch-1" data-transition="fade" data-slotamount="5" data-masterspeed="1000" data-title="{{ str_limit($slider->title, 18) }}">
                <!-- MAIN IMAGE -->
                <img src="{{ asset('img/sliders/'.$slider->file_name) }}"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">

                <div class="tp-caption revolution-ch1 sft start"
                     data-x="center"
                     data-hoffset="0"
                     data-y="50"
                     data-speed="1500"
                     data-start="500"
                     data-easing="Back.easeInOut"
                     data-endeasing="Power1.easeIn"
                     data-endspeed="300">
                    {{ $slider->title }}
                </div>

                <!-- LAYER -->
                <div class="tp-caption revolution-ch2 sft"
                     data-x="center"
                     data-hoffset="0"
                     data-y="130"
                     data-speed="1400"
                     data-start="2000"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    {{ $slider->description_1 }} <br /> {{ $slider->description_2 }}
                </div>

                <!-- LAYER -->
                <div class="tp-caption sft"
                     data-x="center"
                     data-hoffset="0"
                     data-y="250"
                     data-speed="1600"
                     data-start="2800"
                     data-easing="Power4.easeOut"
                     data-endspeed="300"
                     data-endeasing="Power1.easeIn"
                     data-captionhidden="off"
                     style="z-index: 6">
                    <a href="{{ $slider->url }}" class="btn-u btn-brd btn-brd-hover btn-u-light">{{ $slider->btn_text }}</a>
                </div>
            </li>
            <!-- END SLIDE -->
            @endforeach
        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>
<!--=== End Slider ===-->