@extends('client.layouts.app')
@section('title', 'Home | BNM Stainless Steel')
@section('container')
<!-- Header -->
<div>
    <header class="position-relative" id="home">
        @include('client.components.navbar')
        <img src="{{ $slider->image_desktop_path }}" alt="" style="width: 100%;" class="banner-img forDesktop">
        <img src="{{ $slider->image_mobile_path }}" alt="" style="width: 100%;" class="banner-img forMobile">
        <div class="desc-first"><h1>{{ $slider->title }}</h1></div>
        <div class="desc-second pop-head " data-header=1 data-img="head-1.jpg" data-popSlide="1">
            <div class="d-flex justify-content-center">
                <svg width="58" height="58" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg-plus">
                    <path d="M27 54C41.9117 54 54 41.9117 54 27C54 12.0883 41.9117 0 27 0C12.0883 0 0 12.0883 0 27C0 41.9117 12.0883 54 27 54Z" fill="#FFAF08" class="plus-img" />
                    <path d="M29.2723 17.779V24.9655H35.9881V28.994H29.2723V36.221H24.6972V28.9991H18.0168V24.9706H24.6972V17.7841H29.2723V17.779Z" fill="white" />
                </svg>
                <div class="caption forDesktop">{{ $postsBanner[0]->title }}</div>
                <div class="caption forMobile"><?php echo str_replace("Stainless","<br/> Stainless",$postsBanner[0]->title);?></div>
            </div>
        </div>
        <div class="desc-third pop-head " data-header=2 data-popSlide="2">
            <div class="d-flex justify-content-center">
                <svg width="58" height="58" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg-plus">
                    <path d="M27 54C41.9117 54 54 41.9117 54 27C54 12.0883 41.9117 0 27 0C12.0883 0 0 12.0883 0 27C0 41.9117 12.0883 54 27 54Z" fill="#FFAF08" class="plus-img" />
                    <path d="M29.2723 17.779V24.9655H35.9881V28.994H29.2723V36.221H24.6972V28.9991H18.0168V24.9706H24.6972V17.7841H29.2723V17.779Z" fill="white" />
                </svg>
                <div class="caption">{{ $postsBanner[1]->title }}</div>
            </div>
        </div>
        <div class="desc-fourth pop-head " data-header=3 data-img="head-3.png" data-popSlide="3">
            <div class="d-flex justify-content-center">
                <svg width="58" height="58" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg-plus">
                    <path d="M27 54C41.9117 54 54 41.9117 54 27C54 12.0883 41.9117 0 27 0C12.0883 0 0 12.0883 0 27C0 41.9117 12.0883 54 27 54Z" fill="#FFAF08" class="plus-img" />
                    <path d="M29.2723 17.779V24.9655H35.9881V28.994H29.2723V36.221H24.6972V28.9991H18.0168V24.9706H24.6972V17.7841H29.2723V17.779Z" fill="white" />
                </svg>
                <div class="caption forDesktop">{{ $postsBanner[2]->title }}</div>
                <div class="caption forMobile"> <?php echo str_replace("Manufacturing","<br/> Manufacturing",$postsBanner[2]->title); ?></div>
            </div>
        </div>
    </header>
</div>
<!-- End Header -->
<main id="bnm" page="bnm">
    <section id="profile" class="profile__section2">
        <div class="row gx-0 m-50Desktop">
            <div class="col-1"></div>
            <div class="col-10 col-xl-3">
                <h1 class="title">OUR PROFILE</h1>
                <div class="forMobile"><img data-src="{{asset('images/bnm/components/profile_section/green-worker-mobile.jpg')}}" alt="" class="w-100 forMobile"></div>
            </div>
            <div class="col-lg-7 forDesktop">
                <h1>{{ $categoryProfile->subtitle }}</h1>
                {!! $categoryProfile->description !!}
            </div>
            <div class="forMobile">
                <div class="row gx-0">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <h1 style="width: 85%;margin-top: 0%;">{{ $categoryProfile->subtitle }}</h1>
                        {!! $categoryProfile->description !!}
                    </div>
                </div>
            </div>
        </div>
         <div>
            <div class="row gx-0">
                <div class="col-12 col-md-1 col-lg-1"></div>
                <div class="col-12 col-md-3 col-lg-3"></div>
                <div class="col-12 col-md-7 col-lg-7">
                    <div class="position-relative">
                        <video id="videoHome" class="mask " width="100%" height="100%" poster="{{asset('images/bnm/poster-thumbnail.jpg')}}">
                            <source src="{{asset('video/bnm-video.mp4')}}" type="video/mp4">
                        </video>
                        <div class="play_btn ">
                            <img src="{{asset('images/bnm/playbutton.png')}}" width="100%" alt="" class="forDesktop">
                            <img src="{{asset('images/bnm/play-button-3.png')}}" alt="" class="forMobile">
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <div class="row gx-0">
             <div class="d-flex justify-content-center  text-center infograph">
                <div>
                    <div class="mx-4 text-center">
                        <div class="forDesktop">
                            <div class="d-flex justify-content-between flex-wrap" style="width: 82vw;margin: auto;">
                                <div class="row gx-3 gy-3">
                                    <div class="col-4">
                                        <img src="{{asset('images/bnm/components/profile_section/establish-box.png')}}" alt="" class="mb-2 mx-auto w-85">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{asset('images/bnm/components/profile_section/location-box.png')}}" alt="" class="mb-2 mx-auto w-85">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{asset('images/bnm/components/profile_section/employees-box.png')}}" alt="" class="mb-2 mx-auto w-85">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{asset('images/bnm/components/profile_section/production-box.png')}}" alt="" class="mb-2 mx-auto w-85">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{asset('images/bnm/components/profile_section/shipment-box.png')}}" alt="" class="mb-2 mx-auto w-85">
                                    </div>
                                    <div class="col-4">
                                        <img src="{{asset('images/bnm/components/profile_section/certifications-box.png')}}" alt="" class="mb-2 mx-auto w-85">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="infograph-slick forMobile">
                            <ul class="infograph-slick">
                                <li>
                                    <div class="info-box mx-3">
                                        
                                        <img src="{{asset('images/bnm/components/profile_section/establish-box.png')}}" alt="" class="w-100">
                                    </div>
                                </li>
                                <li>
                                    <div class="info-box mx-3">
                                        
                                        <img src="{{asset('images/bnm/components/profile_section/location-box.png')}}" alt="" class="w-100">

                                    </div>
                                </li>
                                <li>
                                    <div class="info-box mx-3">
                                       
                                        <img src="{{asset('images/bnm/components/profile_section/employees-box.png')}}" alt="" class="w-100">
                                    </div>
                                </li>
                                <li>
                                    <div class="info-box mx-3">
                                        
                                        <img src="{{asset('images/bnm/components/profile_section/production-box.png')}}" alt="" class="w-100">
                                    </div>
                                </li>
                                <li>
                                    <div class="info-box mx-3">
                                        
                                        <img src="{{asset('images/bnm/components/profile_section/shipment-box.png')}}" alt="" class="w-100">
                                    </div>
                                </li>
                                <li>
                                    <div class="info-box mx-3">
                                        
                                        <img src="{{asset('images/bnm/components/profile_section/certifications-box.png')}}" alt="" class="w-100">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </section>
    <section id="sustainability" class="profile__section2">
        <div class="d-flex justify-content-center sustain-caption text-center">
            <div class="mx-auto">
                <div class="text-center">
                    <h1>{{ $categorySustanbility->title  }}</h1>
                    <div class="forDesktop">{!! $categorySustanbility->description !!}</div>
                    <div class="forMobile">{!! $categorySustanbility->description !!}</div>
                    <img src="{{asset('images/bnm/components/profile_section/solar-top.jpg')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
        <div class=" pt-4 p-10 text-center impact">
            <div>
                <div class="text-center">
                    <h1 class="impact-caption">Our Impact</h1>
                    <div>
                        <div class="row gx-0">
                            <div class="col-1"></div>
                            <div class="col-10 ">
                                <div class=" impact-box-slider row gx-2">
                                        @foreach($postsOur as $row)
                                        <div class="col-12 col-md-4 ">
                                            <div class="impact-box"><img src="{{ $row->thumbnail }}" alt="energy" class="impact-img"></div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end-profile-section -->
    <!-- plant-section -->
    <section id="plant" class="plant-section h-100 pt-5">
        <div class="row gx-0">
            <div class="col-md-1 gx-0"></div>
            <div class="col-md-11 gx-0 h-100">
                <div class="row gx-0">
                    <div class="col-md-3 gx-0">
                        <h1 class=" title-plant forDesktop">PLANT TOUR</h1>
                        <div class="title-plant forMobile">
                            <div class="row gx-0">
                                <div class="col-1"></div>
                                <div class="col-11"><h1>PLANT TOUR</h1></div>
                            </div>
                        </div>
                        <div class="row gx-0">
                            <div class="col-1"></div>
                            <div class="col-11 col-lg-12">
                                <ul class="mainul">
                                    <li class=" border border-0  border-top mainul_list border-plant-C1 active">
                                        <div class="mainul-box active">
                                            <div class="mainul_list-title active" data-slider="C1">
                                                <div class="forDesktop"><h1> {{ $postsPlant[0]-> title }}</h1></div>
                                                <div class="forMobile">
                                                    <div class="d-flex justify-content-center"><h1> {{ $postsPlant[0]-> title }}</h1></div>
                                                </div>
                                                <div class="d-flex justify-content-center contain-plant-arrow">
                                                    <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="plant-arrow">
                                                        <path d="M22 2L13.4142 10.5858C12.6332 11.3668 11.3668 11.3668 10.5858 10.5858L2.00001 2" stroke="#d6d6d6" stroke-width="4" class="plant-arrow-icon " />
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class=" border border-0 border-dark border-top mainul_list border-plant-C2">
                                        <div class=" mainul-box">
                                            <div class="mainul_list-title" data-slider="C2">
                                                <div class="forDesktop">
                                                    <h1>{{ $postsPlant[1]-> title }}</h1>
                                                </div>
                                                <div class="forMobile">
                                                    <div class="d-flex justify-content-start">
                                                        <h1>{{ $postsPlant[1]-> title }}</h1>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center contain-plant-arrow">
                                                    <div class="forDesktop">
                                                        <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="plant-arrow">
                                                            <path d="M22 2L13.4142 10.5858C12.6332 11.3668 11.3668 11.3668 10.5858 10.5858L2.00001 2" stroke="#d6d6d6" stroke-width="4" class="plant-arrow-icon " />
                                                        </svg>
                                                    </div>
                                                    <div class="forMobile">
                                                        <svg width="24" height="14" viewBox="0 0 24 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="plant-arrow" style="margin-left: -50px;">
                                                            <path d="M22 2L13.4142 10.5858C12.6332 11.3668 11.3668 11.3668 10.5858 10.5858L2.00001 2" stroke="#d6d6d6" stroke-width="4" class="plant-arrow-icon " />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 box_map h-100">
                        <div class="positon-relative box_map-img W-100">
                            <div>
                                <ul class="slider-int-C1 owl-C1">
                                    @foreach($postsPlant1->sortBy('order') as $row)
                                    <li @if($row->order == 0)class="item-0" @else class="item"  @endif>
                                        <img src="{{$row->full_path}}" alt="" class="img-fluid w-100">
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <ul class="slider-int-C2 owl-C2">
                                    @foreach($postPlant2->sortBy('order') as $row)
                                    <li class="item">
                                        <img src="{{$row->full_path}}" alt="" class="img-fluid w-100">
                                    </li>
                                    @endforeach
                        
                                </ul>
                            </div>
                            <div class="me-3 pt-5 arrow-box-img" >
                                <div class="d-flex justify-content-center" style="margin-left: 42%;margin:auto">
                                    <svg width="47" height="46" viewBox="0 0 47 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-5 left-arrow" style="height:37px">
                                        <path d="M23.6818 -0.000101191C10.9913 -0.0001023 0.7037 10.2875 0.703699 22.978C0.703698 35.6684 10.9913 45.9561 23.6818 45.9561C36.3722 45.9561 46.6599 35.6684 46.6599 22.978C46.6599 10.2875 36.3722 -0.000100082 23.6818 -0.000101191Z" fill="#FFAF08" class="button-circle" />
                                        <path d="M27.0859 30.6375L19.9898 23.5413C19.2087 22.7602 19.2087 21.4939 19.9898 20.7128L27.0859 13.6167" stroke="white" stroke-width="3" />
                                    </svg>
                                    <svg width="47" height="46" viewBox="0 0 47 46" fill="none" xmlns="http://www.w3.org/2000/svg" class="right-arrow" style="height:37px">>
                                        <path d="M23.3182 45.9562C36.0087 45.9562 46.2963 35.6685 46.2963 22.9781C46.2963 10.2876 36.0087 0 23.3182 0C10.6278 0 0.340149 10.2876 0.340149 22.9781C0.340149 35.6685 10.6278 45.9562 23.3182 45.9562Z" fill="#FFAF08" class="button-circle" />
                                        <path d="M19.9141 15.3186L27.0102 22.4148C27.7913 23.1958 27.7913 24.4622 27.0102 25.2432L19.9141 32.3394" stroke="white" stroke-width="3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="forDesktop">
                                <div class="plant-caption-contain">
                                    <div class="d-flex pe-3 plant-edit">
                                        <div class="plant-caption plant-change-C1 active">{!! $postsPlant[0]-> content !!}</div>
                                        <div class="plant-caption plant-change-C2">{!! $postsPlant[1]-> content !!}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="forMobile">
                                <div class="row gx-0">
                                    <div class="col-1"></div>
                                    <div class="col-11">
                                        <div class="plant-caption-contain">
                                            <div class="d-flex pe-3 plant-edit">
                                                <div class="plant-caption plant-change-C1 active" style="width: 95%;">
                                                    <p class="text-justify" style="width: 90%;">{!! $postsPlant[0]-> content !!}</p>
                                                </div>
                                                <div class="plant-caption plant-change-C2" style="width: 95%;">
                                                    <p class="text-justify" style="width: 90%;">{!! $postsPlant[1]-> content !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end-plant-section -->
    <!-- product-section -->
    <section class="product-section mb-5 pt-8" id="product">
        <div class="container-full">
            <div class="row gx-0">
                <div class="col-1 col-md-1"></div>
                <div class="col-11 col-md-11">
                    <div class="row gx-0 mb-5">
                        <div class="col-md-3">
                            <img src="{{asset('/images/bnm/Rectangle_3.png')}}" alt="" class="top-product-image lazy forDesktop">
                        </div>
                        <div class="col-10 col-md-8">
                            <div class="forDesktop">
                                <div class="mt-4 ms-5">
                                    <h1 class="product-title">{{$categoryProduct->title}}</h1>
                                    <h1 class="mt-5 product-caption">{{$categoryProduct->subtitle}}</h1>
                                    <p class="mt-3  forDesktop">{!! $categoryProduct->description !!}</p>
                                </div>
                            </div>
                            <div class="forMobile">
                                <div class="mt-4">
                                    <h1 class="product-title">{{$categoryProduct->title}}</h1>
                                    <h1 class="mt-5 product-caption">{{$categoryProduct->subtitle}}</h1>
                                    {!! $categoryProduct->description !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row gx-0">
                        <div class="col-11 col-md-11">
                            <div class="card__collections owl-zero row gx-0 mb-10">
                                @foreach($postsProduct as $key => $row)
                                <div class="card mx-2 specPopup" data-spec={{ $loop->index }}>
                                    <div class="card-body">
                                        <h3 class="card-title mb-2">{{ $row->title }}</h3>
                                        <p class="card-text">{!! $row->description !!}</p>
                                    </div>
                                    <img src="{!! $row->thumbnail !!}" class="card-img-top mx-auto px-0" alt="..." width="23vw" style="height:100%; object-fit:cover;">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="end-section mb-5" id="end">
                        <h1 class="title">{{$categoryMarket->title}}</h1>
                        <h1>{{$categoryMarket->subtitle}}</h1>
                        <div class="row gx-0">
                            <div class="col-11 col-md-11">
                                <div class="card__collections2 owl-one  row gx-0 ">
                                    @foreach($postsMarket as $key => $row)
                                    <div class="col-12 col-md-3">
                                        <div class="card mx-2 specPopup3" data-end-product={{ $loop->index }}>
                                            <div class="card-body">
                                                <h3 class="card-title mb-2">{{ $row->title }}</h3>
                                                <p class="card-text">{{ $row->description }}</p>
                                            </div>
                                            <img src=" {!! $row->thumbnail !!}" class="card-img-top mx-auto px-0" alt="..." width="23vw" style="height:100%; object-fit:cover;">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end product-section -->
    <!-- production-facilities-section -->
    <section id="production" class="production__section pt-5 ">
        <div class="container-full h-100">
            <div class="row gx-0">
                <div class="col-md-1"></div>
                <div class="col-md-11">
                    <div class="row gx-0">
                        <div class="col-1"></div>
                        <div class="col-11 col-lg-12">
                            <h1 class="title">
                                PRODUCTION FACILITIES
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-11">
                            <div class="row gx-0">
                                    <div class="col-1 col-lg-12"></div>
                                    <div class="col-10 col-md-12" id="main">
                                        <div class="pt-5"></div>
                                        <svg width="100%" height="392" viewBox="0 0 1152 392" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg-diagram">
                                            <path d="M432.604 369H434.584V358.2H436.654V356.4H430.534V358.2H432.604V369ZM438.332 369H443.732V367.2H440.312V363.33H443.03V361.53H440.312V358.2H443.732V356.4H438.332V369ZM445.591 369H447.355V359.802H447.391L449.767 369H451.801V356.4H450.037V363.942H450.001L448.075 356.4H445.591V369ZM456.567 369.18C458.511 369.18 459.555 368.028 459.555 365.976C459.555 364.41 459.033 363.402 457.377 361.944C456.081 360.81 455.667 360.144 455.667 359.226C455.667 358.362 456.027 358.02 456.657 358.02C457.287 358.02 457.647 358.362 457.647 359.262V359.91H459.519V359.388C459.519 357.372 458.565 356.22 456.639 356.22C454.713 356.22 453.687 357.372 453.687 359.352C453.687 360.792 454.227 361.818 455.883 363.276C457.179 364.41 457.575 365.076 457.575 366.12C457.575 367.056 457.179 367.38 456.549 367.38C455.919 367.38 455.523 367.056 455.523 366.156V365.292H453.651V366.012C453.651 368.028 454.623 369.18 456.567 369.18ZM461.41 369H463.39V356.4H461.41V369ZM468.455 369.18C470.399 369.18 471.461 368.028 471.461 366.012V359.388C471.461 357.372 470.399 356.22 468.455 356.22C466.511 356.22 465.449 357.372 465.449 359.388V366.012C465.449 368.028 466.511 369.18 468.455 369.18ZM468.455 367.38C467.825 367.38 467.429 367.038 467.429 366.138V359.262C467.429 358.362 467.825 358.02 468.455 358.02C469.085 358.02 469.481 358.362 469.481 359.262V366.138C469.481 367.038 469.085 367.38 468.455 367.38ZM473.52 369H475.284V359.802H475.32L477.696 369H479.73V356.4H477.966V363.942H477.93L476.004 356.4H473.52V369ZM485.525 369H490.763V367.2H487.505V356.4H485.525V369ZM492.432 369H497.832V367.2H494.412V363.33H497.13V361.53H494.412V358.2H497.832V356.4H492.432V369ZM501.077 369H503.705L505.613 356.4H503.795L502.499 366.174H502.463L501.167 356.4H499.169L501.077 369ZM507.284 369H512.684V367.2H509.264V363.33H511.982V361.53H509.264V358.2H512.684V356.4H507.284V369ZM514.543 369H519.781V367.2H516.523V356.4H514.543V369ZM521.451 369H523.431V356.4H521.451V369ZM525.634 369H527.398V359.802H527.434L529.81 369H531.844V356.4H530.08V363.942H530.044L528.118 356.4H525.634V369ZM536.843 369.18C538.787 369.18 539.795 368.028 539.795 366.012V361.89H536.933V363.69H537.923V366.156C537.923 367.056 537.527 367.38 536.897 367.38C536.267 367.38 535.871 367.056 535.871 366.156V359.262C535.871 358.362 536.267 358.02 536.897 358.02C537.527 358.02 537.923 358.362 537.923 359.262V360.468H539.795V359.388C539.795 357.372 538.787 356.22 536.843 356.22C534.899 356.22 533.891 357.372 533.891 359.388V366.012C533.891 368.028 534.899 369.18 536.843 369.18ZM545.389 369H550.627V367.2H547.369V356.4H545.389V369ZM552.297 369H554.277V356.4H552.297V369ZM556.48 369H558.244V359.802H558.28L560.656 369H562.69V356.4H560.926V363.942H560.89L558.964 356.4H556.48V369ZM564.881 369H570.281V367.2H566.861V363.33H569.579V361.53H566.861V358.2H570.281V356.4H564.881V369Z" fill="#848484" />


                                            <rect x="0.5" y="1.5" width="162.343" height="157.626" fill="white" stroke="#D9D9D9" class="m1 sendzimir w1 active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M56.1777 52.0601H106.563" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M75.9267 40.2427C78.6367 40.2427 80.8337 38.0458 80.8337 35.3357C80.8337 32.6257 78.6367 30.4287 75.9267 30.4287C73.2166 30.4287 71.0197 32.6257 71.0197 35.3357C71.0197 38.0458 73.2166 40.2427 75.9267 40.2427Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M81.2343 45.1342C83.0216 45.1342 84.4704 43.6854 84.4704 41.8982C84.4704 40.1109 83.0216 38.6621 81.2343 38.6621C79.4471 38.6621 77.9983 40.1109 77.9983 41.8982C77.9983 43.6854 79.4471 45.1342 81.2343 45.1342Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M74.7924 46.4648C76.5797 46.4648 78.0285 45.0159 78.0285 43.2287C78.0285 41.4415 76.5797 39.9927 74.7924 39.9927C73.0052 39.9927 71.5564 41.4415 71.5564 43.2287C71.5564 45.0159 73.0052 46.4648 74.7924 46.4648Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M79.0341 48.8244C80.2117 48.8244 81.1663 47.8698 81.1663 46.6922C81.1663 45.5147 80.2117 44.5601 79.0341 44.5601C77.8566 44.5601 76.902 45.5147 76.902 46.6922C76.902 47.8698 77.8566 48.8244 79.0341 48.8244Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M83.291 48.8244C84.4685 48.8244 85.4231 47.8698 85.4231 46.6922C85.4231 45.5147 84.4685 44.5601 83.291 44.5601C82.1134 44.5601 81.1588 45.5147 81.1588 46.6922C81.1588 47.8698 82.1134 48.8244 83.291 48.8244Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M87.6081 46.7753C89.3953 46.7753 90.8442 45.3265 90.8442 43.5393C90.8442 41.7521 89.3953 40.3032 87.6081 40.3032C85.8209 40.3032 84.3721 41.7521 84.3721 43.5393C84.3721 45.3265 85.8209 46.7753 87.6081 46.7753Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M67.1787 44.794C69.8888 44.794 72.0857 42.597 72.0857 39.887C72.0857 37.1769 69.8888 34.98 67.1787 34.98C64.4687 34.98 62.2717 37.1769 62.2717 39.887C62.2717 42.597 64.4687 44.794 67.1787 44.794Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M86.0053 40.2427C88.7153 40.2427 90.9123 38.0458 90.9123 35.3357C90.9123 32.6257 88.7153 30.4287 86.0053 30.4287C83.2952 30.4287 81.0983 32.6257 81.0983 35.3357C81.0983 38.0458 83.2952 40.2427 86.0053 40.2427Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M94.7229 45.1495C97.433 45.1495 99.6299 42.9525 99.6299 40.2425C99.6299 37.5324 97.433 35.3354 94.7229 35.3354C92.0129 35.3354 89.8159 37.5324 89.8159 40.2425C89.8159 42.9525 92.0129 45.1495 94.7229 45.1495Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M85.975 73.2832C88.6851 73.2832 90.882 71.0863 90.882 68.3762C90.882 65.6662 88.6851 63.4692 85.975 63.4692C83.2649 63.4692 81.068 65.6662 81.068 68.3762C81.068 71.0863 83.2649 73.2832 85.975 73.2832Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M87.1091 63.727C88.8963 63.727 90.3452 62.2782 90.3452 60.4909C90.3452 58.7037 88.8963 57.2549 87.1091 57.2549C85.3219 57.2549 83.873 58.7037 83.873 60.4909C83.873 62.2782 85.3219 63.727 87.1091 63.727Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M82.8751 59.1598C84.0526 59.1598 85.0072 58.2052 85.0072 57.0277C85.0072 55.8501 84.0526 54.8955 82.8751 54.8955C81.6975 54.8955 80.7429 55.8501 80.7429 57.0277C80.7429 58.2052 81.6975 59.1598 82.8751 59.1598Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M78.6108 59.1598C79.7884 59.1598 80.743 58.2052 80.743 57.0277C80.743 55.8501 79.7884 54.8955 78.6108 54.8955C77.4332 54.8955 76.4786 55.8501 76.4786 57.0277C76.4786 58.2052 77.4332 59.1598 78.6108 59.1598Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M74.2935 63.4096C76.0808 63.4096 77.5296 61.9608 77.5296 60.1735C77.5296 58.3863 76.0808 56.9375 74.2935 56.9375C72.5063 56.9375 71.0575 58.3863 71.0575 60.1735C71.0575 61.9608 72.5063 63.4096 74.2935 63.4096Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M94.7229 68.7315C97.433 68.7315 99.6299 66.5345 99.6299 63.8245C99.6299 61.1144 97.433 58.9175 94.7229 58.9175C92.0129 58.9175 89.8159 61.1144 89.8159 63.8245C89.8159 66.5345 92.0129 68.7315 94.7229 68.7315Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M75.8964 73.2832C78.6064 73.2832 80.8034 71.0863 80.8034 68.3762C80.8034 65.6662 78.6064 63.4692 75.8964 63.4692C73.1863 63.4692 70.9894 65.6662 70.9894 68.3762C70.9894 71.0863 73.1863 73.2832 75.8964 73.2832Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M67.1787 68.3765C69.8888 68.3765 72.0857 66.1796 72.0857 63.4695C72.0857 60.7594 69.8888 58.5625 67.1787 58.5625C64.4687 58.5625 62.2717 60.7594 62.2717 63.4695C62.2717 66.1796 64.4687 68.3765 67.1787 68.3765Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M50.8851 55.0923L44.723 76.1266" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M111.576 55.0923L117.738 76.1266" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M51.7621 55.8931C53.5118 55.8931 54.9301 54.4748 54.9301 52.7251C54.9301 50.9755 53.5118 49.5571 51.7621 49.5571C50.0125 49.5571 48.5941 50.9755 48.5941 52.7251C48.5941 54.4748 50.0125 55.8931 51.7621 55.8931Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M51.7621 54.0867C52.5137 54.0867 53.123 53.4773 53.123 52.7257C53.123 51.9741 52.5137 51.3647 51.7621 51.3647C51.0104 51.3647 50.4011 51.9741 50.4011 52.7257C50.4011 53.4773 51.0104 54.0867 51.7621 54.0867Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M110.533 55.8931C112.282 55.8931 113.701 54.4748 113.701 52.7251C113.701 50.9755 112.282 49.5571 110.533 49.5571C108.783 49.5571 107.365 50.9755 107.365 52.7251C107.365 54.4748 108.783 55.8931 110.533 55.8931Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M110.533 54.0867C111.284 54.0867 111.894 53.4773 111.894 52.7257C111.894 51.9741 111.284 51.3647 110.533 51.3647C109.781 51.3647 109.172 51.9741 109.172 52.7257C109.172 53.4773 109.781 54.0867 110.533 54.0867Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M101.165 30.6706L95.6454 25H67.0503L61.3645 30.2321L56.1777 34.9728V67.9533L61.3645 73.4576L67.2166 79.1282H95.1464L100.159 73.7978L106.011 67.2652V35.1391L101.165 30.6706Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M37.011 83.3243C41.621 83.3243 45.3582 79.5871 45.3582 74.9771C45.3582 70.367 41.621 66.6299 37.011 66.6299C32.401 66.6299 28.6638 70.367 28.6638 74.9771C28.6638 79.5871 32.401 83.3243 37.011 83.3243Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M37.0109 78.7347C39.0863 78.7347 40.7687 77.0523 40.7687 74.977C40.7687 72.9016 39.0863 71.2192 37.0109 71.2192C34.9356 71.2192 33.2532 72.9016 33.2532 74.977C33.2532 77.0523 34.9356 78.7347 37.0109 78.7347Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M125.45 83.3243C130.06 83.3243 133.798 79.5871 133.798 74.9771C133.798 70.367 130.06 66.6299 125.45 66.6299C120.84 66.6299 117.103 70.367 117.103 74.9771C117.103 79.5871 120.84 83.3243 125.45 83.3243Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M125.45 78.7347C127.526 78.7347 129.208 77.0523 129.208 74.977C129.208 72.9016 127.526 71.2192 125.45 71.2192C123.375 71.2192 121.693 72.9016 121.693 74.977C121.693 77.0523 123.375 78.7347 125.45 78.7347Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M65.6249 114V112.928C66.3289 112.245 66.9635 111.616 67.5289 111.04C68.1049 110.464 68.5902 109.931 68.9849 109.44C69.3902 108.949 69.6995 108.491 69.9129 108.064C70.1262 107.637 70.2329 107.232 70.2329 106.848C70.2329 106.304 70.0889 105.877 69.8009 105.568C69.5129 105.248 69.0969 105.088 68.5529 105.088C68.1582 105.088 67.7955 105.2 67.4649 105.424C67.1449 105.648 66.8462 105.915 66.5689 106.224L65.5449 105.2C66.0142 104.699 66.4942 104.315 66.9849 104.048C67.4862 103.771 68.0889 103.632 68.7929 103.632C69.2835 103.632 69.7262 103.707 70.1209 103.856C70.5155 104.005 70.8515 104.219 71.1289 104.496C71.4062 104.763 71.6195 105.088 71.7689 105.472C71.9289 105.856 72.0089 106.283 72.0089 106.752C72.0089 107.2 71.9075 107.659 71.7049 108.128C71.5129 108.587 71.2462 109.056 70.9049 109.536C70.5742 110.005 70.1849 110.491 69.7369 110.992C69.2889 111.493 68.8142 112.011 68.3129 112.544C68.5795 112.523 68.8675 112.501 69.1769 112.48C69.4862 112.448 69.7635 112.432 70.0089 112.432H72.5049V114H65.6249ZM77.956 114.192C76.8893 114.192 76.0467 113.739 75.428 112.832C74.8093 111.915 74.5 110.592 74.5 108.864C74.5 107.136 74.8093 105.835 75.428 104.96C76.0467 104.075 76.8893 103.632 77.956 103.632C79.0227 103.632 79.8653 104.075 80.484 104.96C81.1027 105.845 81.412 107.147 81.412 108.864C81.412 110.592 81.1027 111.915 80.484 112.832C79.8653 113.739 79.0227 114.192 77.956 114.192ZM77.956 112.752C78.2013 112.752 78.4253 112.688 78.628 112.56C78.8413 112.421 79.0227 112.197 79.172 111.888C79.3213 111.579 79.4387 111.179 79.524 110.688C79.6093 110.197 79.652 109.589 79.652 108.864C79.652 108.149 79.6093 107.552 79.524 107.072C79.4387 106.581 79.3213 106.187 79.172 105.888C79.0227 105.589 78.8413 105.381 78.628 105.264C78.4253 105.136 78.2013 105.072 77.956 105.072C77.7107 105.072 77.4813 105.136 77.268 105.264C77.0653 105.381 76.8893 105.589 76.74 105.888C76.5907 106.187 76.4733 106.581 76.388 107.072C76.3027 107.552 76.26 108.149 76.26 108.864C76.26 109.589 76.3027 110.197 76.388 110.688C76.4733 111.179 76.5907 111.579 76.74 111.888C76.8893 112.197 77.0653 112.421 77.268 112.56C77.4813 112.688 77.7107 112.752 77.956 112.752ZM87.8742 114V103.536H89.7302V107.744H93.9702V103.536H95.8263V114H93.9702V109.36H89.7302V114H87.8742ZM98.9636 114V106.144H100.804V114H98.9636ZM99.8916 104.768C99.561 104.768 99.289 104.672 99.0756 104.48C98.8623 104.288 98.7556 104.037 98.7556 103.728C98.7556 103.419 98.8623 103.168 99.0756 102.976C99.289 102.773 99.561 102.672 99.8916 102.672C100.222 102.672 100.494 102.773 100.708 102.976C100.921 103.168 101.028 103.419 101.028 103.728C101.028 104.037 100.921 104.288 100.708 104.48C100.494 104.672 100.222 104.768 99.8916 104.768ZM34.8568 133.192C34.1528 133.192 33.4701 133.059 32.8088 132.792C32.1581 132.525 31.5821 132.147 31.0808 131.656L32.1688 130.392C32.5421 130.744 32.9688 131.032 33.4488 131.256C33.9288 131.469 34.4088 131.576 34.8888 131.576C35.4861 131.576 35.9395 131.453 36.2488 131.208C36.5581 130.963 36.7128 130.637 36.7128 130.232C36.7128 130.019 36.6701 129.837 36.5848 129.688C36.5101 129.539 36.3981 129.411 36.2488 129.304C36.1101 129.187 35.9395 129.08 35.7368 128.984C35.5448 128.888 35.3315 128.792 35.0968 128.696L33.6568 128.072C33.4008 127.965 33.1448 127.832 32.8888 127.672C32.6435 127.512 32.4195 127.32 32.2168 127.096C32.0141 126.872 31.8488 126.611 31.7208 126.312C31.6035 126.013 31.5448 125.672 31.5448 125.288C31.5448 124.872 31.6301 124.488 31.8008 124.136C31.9821 123.773 32.2275 123.459 32.5368 123.192C32.8461 122.925 33.2141 122.717 33.6408 122.568C34.0781 122.419 34.5528 122.344 35.0648 122.344C35.6728 122.344 36.2595 122.467 36.8248 122.712C37.3901 122.947 37.8755 123.267 38.2808 123.672L37.3368 124.856C36.9955 124.579 36.6435 124.36 36.2808 124.2C35.9181 124.04 35.5128 123.96 35.0648 123.96C34.5635 123.96 34.1635 124.072 33.8648 124.296C33.5661 124.509 33.4168 124.808 33.4168 125.192C33.4168 125.395 33.4595 125.571 33.5448 125.72C33.6408 125.859 33.7635 125.987 33.9128 126.104C34.0728 126.211 34.2541 126.312 34.4568 126.408C34.6595 126.493 34.8675 126.579 35.0808 126.664L36.5048 127.256C36.8141 127.384 37.0968 127.533 37.3528 127.704C37.6088 127.875 37.8275 128.072 38.0088 128.296C38.2008 128.52 38.3501 128.781 38.4568 129.08C38.5635 129.368 38.6168 129.704 38.6168 130.088C38.6168 130.515 38.5315 130.915 38.3608 131.288C38.1901 131.661 37.9395 131.992 37.6088 132.28C37.2888 132.557 36.8941 132.781 36.4248 132.952C35.9661 133.112 35.4435 133.192 34.8568 133.192ZM44.3596 133.192C43.8156 133.192 43.3089 133.101 42.8396 132.92C42.3702 132.728 41.9596 132.456 41.6076 132.104C41.2556 131.752 40.9782 131.325 40.7756 130.824C40.5836 130.312 40.4876 129.731 40.4876 129.08C40.4876 128.44 40.5889 127.864 40.7916 127.352C40.9942 126.84 41.2609 126.408 41.5916 126.056C41.9329 125.704 42.3222 125.432 42.7596 125.24C43.1969 125.048 43.6449 124.952 44.1036 124.952C44.6369 124.952 45.1062 125.043 45.5116 125.224C45.9169 125.405 46.2529 125.661 46.5196 125.992C46.7969 126.323 47.0049 126.717 47.1436 127.176C47.2822 127.635 47.3516 128.136 47.3516 128.68C47.3516 128.861 47.3409 129.032 47.3196 129.192C47.3089 129.352 47.2929 129.48 47.2716 129.576H42.2796C42.3649 130.28 42.6102 130.824 43.0156 131.208C43.4316 131.581 43.9596 131.768 44.5996 131.768C44.9409 131.768 45.2556 131.72 45.5436 131.624C45.8422 131.517 46.1356 131.373 46.4236 131.192L47.0476 132.344C46.6742 132.589 46.2582 132.792 45.7996 132.952C45.3409 133.112 44.8609 133.192 44.3596 133.192ZM42.2636 128.328H45.7516C45.7516 127.72 45.6182 127.245 45.3516 126.904C45.0956 126.552 44.6956 126.376 44.1516 126.376C43.6822 126.376 43.2716 126.541 42.9196 126.872C42.5676 127.203 42.3489 127.688 42.2636 128.328ZM49.7489 133V125.144H51.2689L51.3969 126.2H51.4609C51.8129 125.859 52.1916 125.565 52.5969 125.32C53.0129 125.075 53.4929 124.952 54.0369 124.952C54.8796 124.952 55.4929 125.224 55.8769 125.768C56.2609 126.301 56.4529 127.069 56.4529 128.072V133H54.6129V128.312C54.6129 127.661 54.5169 127.203 54.3249 126.936C54.1329 126.669 53.8183 126.536 53.3809 126.536C53.0396 126.536 52.7356 126.621 52.4689 126.792C52.2129 126.952 51.9196 127.192 51.5889 127.512V133H49.7489ZM62.0941 133.192C61.1021 133.192 60.3127 132.835 59.7261 132.12C59.1501 131.395 58.8621 130.381 58.8621 129.08C58.8621 128.44 58.9527 127.864 59.1341 127.352C59.3261 126.84 59.5767 126.408 59.8861 126.056C60.1954 125.704 60.5474 125.432 60.9421 125.24C61.3474 125.048 61.7634 124.952 62.1901 124.952C62.6381 124.952 63.0167 125.032 63.3261 125.192C63.6354 125.341 63.9447 125.549 64.2541 125.816L64.1901 124.552V121.704H66.0301V133H64.5101L64.3821 132.152H64.3181C64.0301 132.44 63.6941 132.685 63.3101 132.888C62.9261 133.091 62.5207 133.192 62.0941 133.192ZM62.5421 131.672C63.1287 131.672 63.6781 131.379 64.1901 130.792V127.128C63.9127 126.883 63.6407 126.712 63.3741 126.616C63.1181 126.52 62.8567 126.472 62.5901 126.472C62.0781 126.472 61.6461 126.696 61.2941 127.144C60.9421 127.592 60.7661 128.232 60.7661 129.064C60.7661 129.917 60.9154 130.568 61.2141 131.016C61.5234 131.453 61.9661 131.672 62.5421 131.672ZM68.3893 133V132.008L72.1013 126.6H68.8053V125.144H74.4053V126.12L70.7093 131.528H74.5333V133H68.3893ZM76.7471 133V125.144H78.5871V133H76.7471ZM77.6751 123.768C77.3444 123.768 77.0724 123.672 76.8591 123.48C76.6457 123.288 76.5391 123.037 76.5391 122.728C76.5391 122.419 76.6457 122.168 76.8591 121.976C77.0724 121.773 77.3444 121.672 77.6751 121.672C78.0057 121.672 78.2777 121.773 78.4911 121.976C78.7044 122.168 78.8111 122.419 78.8111 122.728C78.8111 123.037 78.7044 123.288 78.4911 123.48C78.2777 123.672 78.0057 123.768 77.6751 123.768ZM81.5746 133V125.144H83.0946L83.2226 126.216H83.2866C83.6172 125.864 83.9746 125.565 84.3586 125.32C84.7532 125.075 85.1959 124.952 85.6866 124.952C86.2626 124.952 86.7212 125.075 87.0626 125.32C87.4146 125.565 87.6812 125.912 87.8626 126.36C88.2359 125.955 88.6252 125.619 89.0306 125.352C89.4359 125.085 89.8892 124.952 90.3906 124.952C91.2226 124.952 91.8359 125.224 92.2306 125.768C92.6252 126.301 92.8226 127.069 92.8226 128.072V133H90.9666V128.312C90.9666 127.661 90.8652 127.203 90.6626 126.936C90.4706 126.669 90.1719 126.536 89.7666 126.536C89.2759 126.536 88.7266 126.861 88.1186 127.512V133H86.2786V128.312C86.2786 127.661 86.1772 127.203 85.9746 126.936C85.7826 126.669 85.4786 126.536 85.0626 126.536C84.5719 126.536 84.0226 126.861 83.4146 127.512V133H81.5746ZM95.6989 133V125.144H97.5389V133H95.6989ZM96.6269 123.768C96.2963 123.768 96.0243 123.672 95.8109 123.48C95.5976 123.288 95.4909 123.037 95.4909 122.728C95.4909 122.419 95.5976 122.168 95.8109 121.976C96.0243 121.773 96.2963 121.672 96.6269 121.672C96.9576 121.672 97.2296 121.773 97.4429 121.976C97.6563 122.168 97.7629 122.419 97.7629 122.728C97.7629 123.037 97.6563 123.288 97.4429 123.48C97.2296 123.672 96.9576 123.768 96.6269 123.768ZM100.526 133V125.144H102.046L102.174 126.536H102.238C102.516 126.024 102.852 125.635 103.246 125.368C103.641 125.091 104.046 124.952 104.462 124.952C104.836 124.952 105.134 125.005 105.358 125.112L105.038 126.712C104.9 126.669 104.772 126.637 104.654 126.616C104.537 126.595 104.393 126.584 104.222 126.584C103.913 126.584 103.588 126.707 103.246 126.952C102.905 127.187 102.612 127.603 102.366 128.2V133H100.526ZM111.138 133V122.536H113.234L115.09 127.656C115.208 127.987 115.32 128.328 115.426 128.68C115.533 129.021 115.645 129.363 115.762 129.704H115.826C115.944 129.363 116.05 129.021 116.146 128.68C116.253 128.328 116.365 127.987 116.482 127.656L118.29 122.536H120.402V133H118.69V128.216C118.69 127.971 118.696 127.704 118.706 127.416C118.728 127.128 118.749 126.84 118.77 126.552C118.792 126.253 118.818 125.965 118.85 125.688C118.882 125.4 118.909 125.133 118.93 124.888H118.866L118.018 127.32L116.306 132.024H115.202L113.474 127.32L112.642 124.888H112.578C112.6 125.133 112.621 125.4 112.642 125.688C112.674 125.965 112.701 126.253 112.722 126.552C112.754 126.84 112.776 127.128 112.786 127.416C112.808 127.704 112.818 127.971 112.818 128.216V133H111.138ZM123.54 133V125.144H125.38V133H123.54ZM124.468 123.768C124.138 123.768 123.866 123.672 123.652 123.48C123.439 123.288 123.332 123.037 123.332 122.728C123.332 122.419 123.439 122.168 123.652 121.976C123.866 121.773 124.138 121.672 124.468 121.672C124.799 121.672 125.071 121.773 125.284 121.976C125.498 122.168 125.604 122.419 125.604 122.728C125.604 123.037 125.498 123.288 125.284 123.48C125.071 123.672 124.799 123.768 124.468 123.768ZM130.16 133.192C129.498 133.192 129.034 132.995 128.768 132.6C128.501 132.205 128.368 131.667 128.368 130.984V121.704H130.208V131.08C130.208 131.304 130.25 131.464 130.336 131.56C130.421 131.645 130.512 131.688 130.608 131.688C130.65 131.688 130.688 131.688 130.72 131.688C130.762 131.688 130.821 131.677 130.896 131.656L131.136 133.032C130.89 133.139 130.565 133.192 130.16 133.192ZM135.143 133.192C134.482 133.192 134.018 132.995 133.751 132.6C133.485 132.205 133.351 131.667 133.351 130.984V121.704H135.191V131.08C135.191 131.304 135.234 131.464 135.319 131.56C135.405 131.645 135.495 131.688 135.591 131.688C135.634 131.688 135.671 131.688 135.703 131.688C135.746 131.688 135.805 131.677 135.879 131.656L136.119 133.032C135.874 133.139 135.549 133.192 135.143 133.192Z" fill="#848484" class="m1 caption-sendzimir active" data-prod="sendzimir" data-fac=0 />
                                            <path d="M80.6673 65.0571C82.4545 65.0571 83.9034 63.6082 83.9034 61.821C83.9034 60.0338 82.4545 58.585 80.6673 58.585C78.8801 58.585 77.4313 60.0338 77.4313 61.821C77.4313 63.6082 78.8801 65.0571 80.6673 65.0571Z" class="m1 sendzimir active" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" data-prod="sendzimir" data-fac=0 />

                                            <rect x="199.5" y="1.5" width="162.343" height="157.626" fill="white" stroke="#D9D9D9" class="m1 degreaser w1" data-prod="degreaser" data-fac=1 />
                                            <path d="M243.288 122V111.536H246.088C247.688 111.536 248.936 111.968 249.832 112.832C250.728 113.696 251.176 114.992 251.176 116.72C251.176 117.584 251.059 118.347 250.824 119.008C250.6 119.669 250.269 120.224 249.832 120.672C249.405 121.109 248.883 121.44 248.264 121.664C247.656 121.888 246.963 122 246.184 122H243.288ZM245.144 120.496H245.96C247.027 120.496 247.843 120.192 248.408 119.584C248.984 118.965 249.272 118.011 249.272 116.72C249.272 115.44 248.984 114.507 248.408 113.92C247.832 113.333 247.016 113.04 245.96 113.04H245.144V120.496ZM257.128 122.192C256.584 122.192 256.077 122.101 255.608 121.92C255.139 121.728 254.728 121.456 254.376 121.104C254.024 120.752 253.747 120.325 253.544 119.824C253.352 119.312 253.256 118.731 253.256 118.08C253.256 117.44 253.357 116.864 253.56 116.352C253.763 115.84 254.029 115.408 254.36 115.056C254.701 114.704 255.091 114.432 255.528 114.24C255.965 114.048 256.413 113.952 256.872 113.952C257.405 113.952 257.875 114.043 258.28 114.224C258.685 114.405 259.021 114.661 259.288 114.992C259.565 115.323 259.773 115.717 259.912 116.176C260.051 116.635 260.12 117.136 260.12 117.68C260.12 117.861 260.109 118.032 260.088 118.192C260.077 118.352 260.061 118.48 260.04 118.576H255.048C255.133 119.28 255.379 119.824 255.784 120.208C256.2 120.581 256.728 120.768 257.368 120.768C257.709 120.768 258.024 120.72 258.312 120.624C258.611 120.517 258.904 120.373 259.192 120.192L259.816 121.344C259.443 121.589 259.027 121.792 258.568 121.952C258.109 122.112 257.629 122.192 257.128 122.192ZM255.032 117.328H258.52C258.52 116.72 258.387 116.245 258.12 115.904C257.864 115.552 257.464 115.376 256.92 115.376C256.451 115.376 256.04 115.541 255.688 115.872C255.336 116.203 255.117 116.688 255.032 117.328ZM265.097 125.472C264.628 125.472 264.19 125.429 263.785 125.344C263.39 125.259 263.049 125.131 262.761 124.96C262.473 124.789 262.244 124.576 262.073 124.32C261.913 124.064 261.833 123.765 261.833 123.424C261.833 123.093 261.929 122.784 262.121 122.496C262.313 122.219 262.59 121.968 262.953 121.744V121.68C262.75 121.552 262.58 121.381 262.441 121.168C262.313 120.955 262.249 120.688 262.249 120.368C262.249 120.059 262.334 119.781 262.505 119.536C262.686 119.28 262.889 119.072 263.113 118.912V118.848C262.846 118.645 262.606 118.368 262.393 118.016C262.19 117.653 262.089 117.237 262.089 116.768C262.089 116.32 262.174 115.92 262.345 115.568C262.516 115.216 262.74 114.923 263.017 114.688C263.305 114.443 263.636 114.261 264.009 114.144C264.382 114.016 264.777 113.952 265.193 113.952C265.406 113.952 265.609 113.973 265.801 114.016C266.004 114.048 266.185 114.091 266.345 114.144H269.161V115.504H267.721C267.849 115.653 267.956 115.845 268.041 116.08C268.126 116.304 268.169 116.555 268.169 116.832C268.169 117.269 268.089 117.653 267.929 117.984C267.78 118.315 267.572 118.592 267.305 118.816C267.038 119.04 266.724 119.211 266.361 119.328C265.998 119.445 265.609 119.504 265.193 119.504C265.022 119.504 264.846 119.488 264.665 119.456C264.484 119.424 264.302 119.371 264.121 119.296C264.004 119.403 263.908 119.509 263.833 119.616C263.769 119.723 263.737 119.867 263.737 120.048C263.737 120.272 263.828 120.448 264.009 120.576C264.201 120.704 264.537 120.768 265.017 120.768H266.409C267.358 120.768 268.073 120.923 268.553 121.232C269.044 121.531 269.289 122.021 269.289 122.704C269.289 123.088 269.188 123.451 268.985 123.792C268.793 124.133 268.516 124.427 268.153 124.672C267.79 124.917 267.348 125.109 266.825 125.248C266.313 125.397 265.737 125.472 265.097 125.472ZM265.193 118.352C265.566 118.352 265.886 118.219 266.153 117.952C266.42 117.675 266.553 117.28 266.553 116.768C266.553 116.277 266.42 115.899 266.153 115.632C265.897 115.355 265.577 115.216 265.193 115.216C264.809 115.216 264.484 115.349 264.217 115.616C263.95 115.883 263.817 116.267 263.817 116.768C263.817 117.28 263.95 117.675 264.217 117.952C264.484 118.219 264.809 118.352 265.193 118.352ZM265.385 124.272C266.025 124.272 266.537 124.144 266.921 123.888C267.316 123.643 267.513 123.349 267.513 123.008C267.513 122.699 267.39 122.491 267.145 122.384C266.91 122.277 266.569 122.224 266.121 122.224H265.049C264.622 122.224 264.265 122.187 263.977 122.112C263.572 122.421 263.369 122.768 263.369 123.152C263.369 123.504 263.545 123.776 263.897 123.968C264.26 124.171 264.756 124.272 265.385 124.272ZM271.314 122V114.144H272.834L272.962 115.536H273.026C273.303 115.024 273.639 114.635 274.034 114.368C274.428 114.091 274.834 113.952 275.25 113.952C275.623 113.952 275.922 114.005 276.146 114.112L275.826 115.712C275.687 115.669 275.559 115.637 275.442 115.616C275.324 115.595 275.18 115.584 275.01 115.584C274.7 115.584 274.375 115.707 274.034 115.952C273.692 116.187 273.399 116.603 273.154 117.2V122H271.314ZM281.126 122.192C280.582 122.192 280.075 122.101 279.606 121.92C279.137 121.728 278.726 121.456 278.374 121.104C278.022 120.752 277.745 120.325 277.542 119.824C277.35 119.312 277.254 118.731 277.254 118.08C277.254 117.44 277.355 116.864 277.558 116.352C277.761 115.84 278.027 115.408 278.358 115.056C278.699 114.704 279.089 114.432 279.526 114.24C279.963 114.048 280.411 113.952 280.87 113.952C281.403 113.952 281.873 114.043 282.278 114.224C282.683 114.405 283.019 114.661 283.286 114.992C283.563 115.323 283.771 115.717 283.91 116.176C284.049 116.635 284.118 117.136 284.118 117.68C284.118 117.861 284.107 118.032 284.086 118.192C284.075 118.352 284.059 118.48 284.038 118.576H279.046C279.131 119.28 279.377 119.824 279.782 120.208C280.198 120.581 280.726 120.768 281.366 120.768C281.707 120.768 282.022 120.72 282.31 120.624C282.609 120.517 282.902 120.373 283.19 120.192L283.814 121.344C283.441 121.589 283.025 121.792 282.566 121.952C282.107 122.112 281.627 122.192 281.126 122.192ZM279.03 117.328H282.518C282.518 116.72 282.385 116.245 282.118 115.904C281.862 115.552 281.462 115.376 280.918 115.376C280.449 115.376 280.038 115.541 279.686 115.872C279.334 116.203 279.115 116.688 279.03 117.328ZM288.232 122.192C287.539 122.192 286.979 121.984 286.552 121.568C286.125 121.141 285.912 120.581 285.912 119.888C285.912 119.472 285.997 119.104 286.168 118.784C286.349 118.453 286.627 118.171 287 117.936C287.384 117.701 287.864 117.504 288.44 117.344C289.027 117.184 289.725 117.061 290.536 116.976C290.525 116.773 290.493 116.581 290.44 116.4C290.397 116.208 290.317 116.043 290.2 115.904C290.093 115.755 289.949 115.643 289.768 115.568C289.587 115.483 289.363 115.44 289.096 115.44C288.712 115.44 288.333 115.515 287.96 115.664C287.597 115.813 287.24 115.995 286.888 116.208L286.216 114.976C286.653 114.699 287.144 114.459 287.688 114.256C288.232 114.053 288.819 113.952 289.448 113.952C290.429 113.952 291.16 114.245 291.64 114.832C292.131 115.408 292.376 116.245 292.376 117.344V122H290.856L290.728 121.136H290.664C290.312 121.435 289.933 121.685 289.528 121.888C289.133 122.091 288.701 122.192 288.232 122.192ZM288.824 120.752C289.144 120.752 289.432 120.677 289.688 120.528C289.955 120.379 290.237 120.165 290.536 119.888V118.128C290.003 118.192 289.555 118.277 289.192 118.384C288.829 118.491 288.536 118.613 288.312 118.752C288.088 118.88 287.928 119.029 287.832 119.2C287.736 119.371 287.688 119.552 287.688 119.744C287.688 120.096 287.795 120.352 288.008 120.512C288.221 120.672 288.493 120.752 288.824 120.752ZM297.41 122.192C296.866 122.192 296.327 122.091 295.794 121.888C295.271 121.675 294.818 121.413 294.434 121.104L295.298 119.92C295.65 120.197 295.997 120.416 296.338 120.576C296.69 120.725 297.069 120.8 297.474 120.8C297.901 120.8 298.215 120.715 298.418 120.544C298.621 120.363 298.722 120.133 298.722 119.856C298.722 119.696 298.674 119.557 298.578 119.44C298.482 119.312 298.354 119.2 298.194 119.104C298.034 119.008 297.853 118.923 297.65 118.848C297.447 118.763 297.245 118.677 297.042 118.592C296.786 118.496 296.525 118.384 296.258 118.256C295.991 118.128 295.751 117.973 295.538 117.792C295.335 117.611 295.165 117.403 295.026 117.168C294.898 116.923 294.834 116.635 294.834 116.304C294.834 115.611 295.09 115.045 295.602 114.608C296.114 114.171 296.813 113.952 297.698 113.952C298.242 113.952 298.733 114.048 299.17 114.24C299.607 114.432 299.986 114.651 300.306 114.896L299.458 116.016C299.181 115.813 298.898 115.653 298.61 115.536C298.333 115.408 298.039 115.344 297.73 115.344C297.335 115.344 297.042 115.429 296.85 115.6C296.669 115.76 296.578 115.963 296.578 116.208C296.578 116.368 296.621 116.507 296.706 116.624C296.802 116.731 296.925 116.827 297.074 116.912C297.223 116.997 297.394 117.077 297.586 117.152C297.789 117.227 297.997 117.301 298.21 117.376C298.477 117.472 298.743 117.584 299.01 117.712C299.277 117.829 299.517 117.979 299.73 118.16C299.954 118.341 300.13 118.565 300.258 118.832C300.397 119.088 300.466 119.397 300.466 119.76C300.466 120.101 300.397 120.421 300.258 120.72C300.13 121.008 299.938 121.264 299.682 121.488C299.426 121.701 299.106 121.872 298.722 122C298.338 122.128 297.901 122.192 297.41 122.192ZM306.109 122.192C305.565 122.192 305.058 122.101 304.589 121.92C304.119 121.728 303.709 121.456 303.357 121.104C303.005 120.752 302.727 120.325 302.525 119.824C302.333 119.312 302.237 118.731 302.237 118.08C302.237 117.44 302.338 116.864 302.541 116.352C302.743 115.84 303.01 115.408 303.341 115.056C303.682 114.704 304.071 114.432 304.509 114.24C304.946 114.048 305.394 113.952 305.853 113.952C306.386 113.952 306.855 114.043 307.261 114.224C307.666 114.405 308.002 114.661 308.269 114.992C308.546 115.323 308.754 115.717 308.893 116.176C309.031 116.635 309.101 117.136 309.101 117.68C309.101 117.861 309.09 118.032 309.069 118.192C309.058 118.352 309.042 118.48 309.021 118.576H304.029C304.114 119.28 304.359 119.824 304.765 120.208C305.181 120.581 305.709 120.768 306.349 120.768C306.69 120.768 307.005 120.72 307.293 120.624C307.591 120.517 307.885 120.373 308.173 120.192L308.797 121.344C308.423 121.589 308.007 121.792 307.549 121.952C307.09 122.112 306.61 122.192 306.109 122.192ZM304.013 117.328H307.501C307.501 116.72 307.367 116.245 307.101 115.904C306.845 115.552 306.445 115.376 305.901 115.376C305.431 115.376 305.021 115.541 304.669 115.872C304.317 116.203 304.098 116.688 304.013 117.328ZM311.498 122V114.144H313.018L313.146 115.536H313.21C313.487 115.024 313.823 114.635 314.218 114.368C314.613 114.091 315.018 113.952 315.434 113.952C315.807 113.952 316.106 114.005 316.33 114.112L316.01 115.712C315.871 115.669 315.743 115.637 315.626 115.616C315.509 115.595 315.365 115.584 315.194 115.584C314.885 115.584 314.559 115.707 314.218 115.952C313.877 116.187 313.583 116.603 313.338 117.2V122H311.498Z" fill="#848484" class="m1 caption-degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M296.088 56.7768H260.916V50.5745C260.916 45.7176 264.849 41.7842 269.706 41.7842H287.298C292.155 41.7842 296.088 45.7176 296.088 50.5745V56.7768Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M248.021 58.3271H227.499C226.438 58.3271 225.583 59.1822 225.583 60.2425V78.0512C225.583 79.1115 226.438 79.9666 227.499 79.9666H248.021C249.081 79.9666 249.936 79.1115 249.936 78.0512V60.2425C249.936 59.1822 249.081 58.3271 248.021 58.3271Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M329.699 58.3271H310.089C308.778 58.3271 307.718 59.3874 307.718 60.6986V77.5952C307.718 78.9063 308.778 79.9666 310.089 79.9666H329.699C331.01 79.9666 332.071 78.9063 332.071 77.5952V60.6986C332.071 59.3874 331.01 58.3271 329.699 58.3271Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M302.074 58.3271H255.705C254.36 58.3271 253.277 59.4103 253.277 60.7556V77.5382C253.277 78.8835 254.36 79.9666 255.705 79.9666H302.074C303.419 79.9666 304.502 78.8835 304.502 77.5382V60.7556C304.502 59.4103 303.419 58.3271 302.074 58.3271Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M328.103 33.3813H257.245C255.056 33.3813 253.288 35.1599 253.288 37.3376V52.809C253.288 54.998 255.067 56.7652 257.245 56.7652H328.114C330.303 56.7652 332.071 54.9866 332.071 52.809V37.3376C332.071 35.1485 330.292 33.3813 328.103 33.3813Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M251.567 56.332C249.879 56.332 248.5 57.7002 248.5 59.3989V68.3147H254.634V59.3989C254.634 57.7002 253.266 56.332 251.567 56.332Z" fill="white" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M246.106 68.3149H256.868" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M251.567 56.3315V53.333" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M274.711 56.332C273.024 56.332 271.644 57.7002 271.644 59.3989V68.3147H277.778V59.3989C277.767 57.7002 276.398 56.332 274.711 56.332Z" fill="white" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M269.239 68.3149H280.001" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M274.711 56.3315V53.333" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M305.164 56.332C303.476 56.332 302.097 57.7002 302.097 59.3989V68.3147H308.231V59.3989C308.231 57.7002 306.863 56.332 305.164 56.332Z" fill="white" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M299.691 68.3149H310.454" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M305.164 56.3315V53.333" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M290.183 72.1567H285.976V79.9666H290.183V72.1567Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M287.925 65.5898C286.112 65.5898 284.642 67.0606 284.642 68.8734C284.642 70.6862 286.112 72.1569 287.925 72.1569C289.738 72.1569 291.209 70.6862 291.209 68.8734C291.209 67.0606 289.738 65.5898 287.925 65.5898Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M225.583 41.7842H253.277" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />
                                            <path d="M315.562 42.7876L326.564 46.6754C327.487 47.006 328.103 47.8725 328.103 48.8416V56.7655" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 degreaser " data-prod="degreaser" data-fac=1 />

                                            <rect x="395.5" y="0.5" width="162" height="157" fill="white" stroke="#D9D9D9" class="m1 vertical-bright w1" data-prod="vertical-bright" data-fac="2" />
                                            <path d="M426.654 116L423.39 105.536H425.358L426.83 110.8C427 111.397 427.15 111.963 427.278 112.496C427.416 113.029 427.576 113.6 427.758 114.208H427.822C428.003 113.6 428.158 113.029 428.286 112.496C428.424 111.963 428.574 111.397 428.734 110.8L430.19 105.536H432.094L428.846 116H426.654ZM436.934 116.192C436.39 116.192 435.883 116.101 435.414 115.92C434.945 115.728 434.534 115.456 434.182 115.104C433.83 114.752 433.553 114.325 433.35 113.824C433.158 113.312 433.062 112.731 433.062 112.08C433.062 111.44 433.163 110.864 433.366 110.352C433.569 109.84 433.835 109.408 434.166 109.056C434.507 108.704 434.897 108.432 435.334 108.24C435.771 108.048 436.219 107.952 436.678 107.952C437.211 107.952 437.681 108.043 438.086 108.224C438.491 108.405 438.827 108.661 439.094 108.992C439.371 109.323 439.579 109.717 439.718 110.176C439.857 110.635 439.926 111.136 439.926 111.68C439.926 111.861 439.915 112.032 439.894 112.192C439.883 112.352 439.867 112.48 439.846 112.576H434.854C434.939 113.28 435.185 113.824 435.59 114.208C436.006 114.581 436.534 114.768 437.174 114.768C437.515 114.768 437.83 114.72 438.118 114.624C438.417 114.517 438.71 114.373 438.998 114.192L439.622 115.344C439.249 115.589 438.833 115.792 438.374 115.952C437.915 116.112 437.435 116.192 436.934 116.192ZM434.838 111.328H438.326C438.326 110.72 438.193 110.245 437.926 109.904C437.67 109.552 437.27 109.376 436.726 109.376C436.257 109.376 435.846 109.541 435.494 109.872C435.142 110.203 434.923 110.688 434.838 111.328ZM442.323 116V108.144H443.843L443.971 109.536H444.035C444.313 109.024 444.649 108.635 445.043 108.368C445.438 108.091 445.843 107.952 446.259 107.952C446.633 107.952 446.931 108.005 447.155 108.112L446.835 109.712C446.697 109.669 446.569 109.637 446.451 109.616C446.334 109.595 446.19 109.584 446.019 109.584C445.71 109.584 445.385 109.707 445.043 109.952C444.702 110.187 444.409 110.603 444.163 111.2V116H442.323ZM451.7 116.192C451.242 116.192 450.852 116.123 450.532 115.984C450.223 115.845 449.967 115.653 449.764 115.408C449.572 115.152 449.428 114.853 449.332 114.512C449.247 114.16 449.204 113.771 449.204 113.344V109.6H448.084V108.224L449.3 108.144L449.524 106H451.06V108.144H453.06V109.6H451.06V113.344C451.06 114.261 451.428 114.72 452.164 114.72C452.303 114.72 452.442 114.704 452.58 114.672C452.73 114.64 452.863 114.597 452.98 114.544L453.3 115.904C453.087 115.979 452.842 116.043 452.564 116.096C452.298 116.16 452.01 116.192 451.7 116.192ZM455.353 116V108.144H457.193V116H455.353ZM456.281 106.768C455.951 106.768 455.679 106.672 455.465 106.48C455.252 106.288 455.145 106.037 455.145 105.728C455.145 105.419 455.252 105.168 455.465 104.976C455.679 104.773 455.951 104.672 456.281 104.672C456.612 104.672 456.884 104.773 457.097 104.976C457.311 105.168 457.417 105.419 457.417 105.728C457.417 106.037 457.311 106.288 457.097 106.48C456.884 106.672 456.612 106.768 456.281 106.768ZM463.461 116.192C462.928 116.192 462.426 116.101 461.957 115.92C461.498 115.739 461.098 115.472 460.757 115.12C460.416 114.768 460.149 114.336 459.957 113.824C459.765 113.312 459.669 112.731 459.669 112.08C459.669 111.429 459.776 110.848 459.989 110.336C460.202 109.824 460.49 109.392 460.853 109.04C461.216 108.688 461.632 108.421 462.101 108.24C462.581 108.048 463.082 107.952 463.605 107.952C464.117 107.952 464.554 108.037 464.917 108.208C465.29 108.379 465.621 108.587 465.909 108.832L465.013 110.032C464.8 109.851 464.586 109.712 464.373 109.616C464.17 109.509 463.946 109.456 463.701 109.456C463.061 109.456 462.544 109.696 462.149 110.176C461.754 110.645 461.557 111.28 461.557 112.08C461.557 112.869 461.749 113.504 462.133 113.984C462.528 114.453 463.034 114.688 463.653 114.688C463.962 114.688 464.25 114.624 464.517 114.496C464.794 114.357 465.045 114.197 465.269 114.016L466.021 115.232C465.648 115.552 465.237 115.792 464.789 115.952C464.352 116.112 463.909 116.192 463.461 116.192ZM469.959 116.192C469.266 116.192 468.706 115.984 468.279 115.568C467.853 115.141 467.639 114.581 467.639 113.888C467.639 113.472 467.725 113.104 467.895 112.784C468.077 112.453 468.354 112.171 468.727 111.936C469.111 111.701 469.591 111.504 470.167 111.344C470.754 111.184 471.453 111.061 472.263 110.976C472.253 110.773 472.221 110.581 472.167 110.4C472.125 110.208 472.045 110.043 471.927 109.904C471.821 109.755 471.677 109.643 471.495 109.568C471.314 109.483 471.09 109.44 470.823 109.44C470.439 109.44 470.061 109.515 469.687 109.664C469.325 109.813 468.967 109.995 468.615 110.208L467.943 108.976C468.381 108.699 468.871 108.459 469.415 108.256C469.959 108.053 470.546 107.952 471.175 107.952C472.157 107.952 472.887 108.245 473.367 108.832C473.858 109.408 474.103 110.245 474.103 111.344V116H472.583L472.455 115.136H472.391C472.039 115.435 471.661 115.685 471.255 115.888C470.861 116.091 470.429 116.192 469.959 116.192ZM470.551 114.752C470.871 114.752 471.159 114.677 471.415 114.528C471.682 114.379 471.965 114.165 472.263 113.888V112.128C471.73 112.192 471.282 112.277 470.919 112.384C470.557 112.491 470.263 112.613 470.039 112.752C469.815 112.88 469.655 113.029 469.559 113.2C469.463 113.371 469.415 113.552 469.415 113.744C469.415 114.096 469.522 114.352 469.735 114.512C469.949 114.672 470.221 114.752 470.551 114.752ZM478.737 116.192C478.076 116.192 477.612 115.995 477.345 115.6C477.079 115.205 476.945 114.667 476.945 113.984V104.704H478.785V114.08C478.785 114.304 478.828 114.464 478.913 114.56C478.999 114.645 479.089 114.688 479.185 114.688C479.228 114.688 479.265 114.688 479.297 114.688C479.34 114.688 479.399 114.677 479.473 114.656L479.713 116.032C479.468 116.139 479.143 116.192 478.737 116.192ZM485.932 116V105.536H489.276C489.82 105.536 490.316 105.584 490.764 105.68C491.223 105.765 491.618 105.909 491.948 106.112C492.29 106.304 492.551 106.565 492.732 106.896C492.924 107.227 493.02 107.632 493.02 108.112C493.02 108.613 492.892 109.077 492.636 109.504C492.38 109.931 492.023 110.224 491.564 110.384V110.448C492.14 110.576 492.615 110.848 492.988 111.264C493.372 111.669 493.564 112.224 493.564 112.928C493.564 113.451 493.463 113.904 493.26 114.288C493.058 114.672 492.775 114.992 492.412 115.248C492.06 115.504 491.639 115.696 491.148 115.824C490.658 115.941 490.124 116 489.548 116H485.932ZM487.788 109.856H489.116C489.852 109.856 490.38 109.723 490.7 109.456C491.031 109.189 491.196 108.832 491.196 108.384C491.196 107.872 491.026 107.509 490.684 107.296C490.343 107.083 489.831 106.976 489.148 106.976H487.788V109.856ZM487.788 114.56H489.356C490.124 114.56 490.716 114.421 491.132 114.144C491.548 113.856 491.756 113.419 491.756 112.832C491.756 112.277 491.554 111.877 491.148 111.632C490.743 111.376 490.146 111.248 489.356 111.248H487.788V114.56ZM495.959 116V108.144H497.479L497.607 109.536H497.671C497.948 109.024 498.284 108.635 498.679 108.368C499.074 108.091 499.479 107.952 499.895 107.952C500.268 107.952 500.567 108.005 500.791 108.112L500.471 109.712C500.332 109.669 500.204 109.637 500.087 109.616C499.97 109.595 499.826 109.584 499.655 109.584C499.346 109.584 499.02 109.707 498.679 109.952C498.338 110.187 498.044 110.603 497.799 111.2V116H495.959ZM502.568 116V108.144H504.408V116H502.568ZM503.496 106.768C503.165 106.768 502.893 106.672 502.68 106.48C502.467 106.288 502.36 106.037 502.36 105.728C502.36 105.419 502.467 105.168 502.68 104.976C502.893 104.773 503.165 104.672 503.496 104.672C503.827 104.672 504.099 104.773 504.312 104.976C504.525 105.168 504.632 105.419 504.632 105.728C504.632 106.037 504.525 106.288 504.312 106.48C504.099 106.672 503.827 106.768 503.496 106.768ZM510.131 119.472C509.662 119.472 509.225 119.429 508.819 119.344C508.425 119.259 508.083 119.131 507.795 118.96C507.507 118.789 507.278 118.576 507.107 118.32C506.947 118.064 506.867 117.765 506.867 117.424C506.867 117.093 506.963 116.784 507.155 116.496C507.347 116.219 507.625 115.968 507.987 115.744V115.68C507.785 115.552 507.614 115.381 507.475 115.168C507.347 114.955 507.283 114.688 507.283 114.368C507.283 114.059 507.369 113.781 507.539 113.536C507.721 113.28 507.923 113.072 508.147 112.912V112.848C507.881 112.645 507.641 112.368 507.427 112.016C507.225 111.653 507.123 111.237 507.123 110.768C507.123 110.32 507.209 109.92 507.379 109.568C507.55 109.216 507.774 108.923 508.051 108.688C508.339 108.443 508.67 108.261 509.043 108.144C509.417 108.016 509.811 107.952 510.227 107.952C510.441 107.952 510.643 107.973 510.835 108.016C511.038 108.048 511.219 108.091 511.379 108.144H514.195V109.504H512.755C512.883 109.653 512.99 109.845 513.075 110.08C513.161 110.304 513.203 110.555 513.203 110.832C513.203 111.269 513.123 111.653 512.963 111.984C512.814 112.315 512.606 112.592 512.339 112.816C512.073 113.04 511.758 113.211 511.395 113.328C511.033 113.445 510.643 113.504 510.227 113.504C510.057 113.504 509.881 113.488 509.699 113.456C509.518 113.424 509.337 113.371 509.155 113.296C509.038 113.403 508.942 113.509 508.867 113.616C508.803 113.723 508.771 113.867 508.771 114.048C508.771 114.272 508.862 114.448 509.043 114.576C509.235 114.704 509.571 114.768 510.051 114.768H511.443C512.393 114.768 513.107 114.923 513.587 115.232C514.078 115.531 514.323 116.021 514.323 116.704C514.323 117.088 514.222 117.451 514.019 117.792C513.827 118.133 513.55 118.427 513.187 118.672C512.825 118.917 512.382 119.109 511.859 119.248C511.347 119.397 510.771 119.472 510.131 119.472ZM510.227 112.352C510.601 112.352 510.921 112.219 511.187 111.952C511.454 111.675 511.587 111.28 511.587 110.768C511.587 110.277 511.454 109.899 511.187 109.632C510.931 109.355 510.611 109.216 510.227 109.216C509.843 109.216 509.518 109.349 509.251 109.616C508.985 109.883 508.851 110.267 508.851 110.768C508.851 111.28 508.985 111.675 509.251 111.952C509.518 112.219 509.843 112.352 510.227 112.352ZM510.419 118.272C511.059 118.272 511.571 118.144 511.955 117.888C512.35 117.643 512.547 117.349 512.547 117.008C512.547 116.699 512.425 116.491 512.179 116.384C511.945 116.277 511.603 116.224 511.155 116.224H510.083C509.657 116.224 509.299 116.187 509.011 116.112C508.606 116.421 508.403 116.768 508.403 117.152C508.403 117.504 508.579 117.776 508.931 117.968C509.294 118.171 509.79 118.272 510.419 118.272ZM516.348 116V104.704H518.188V107.616L518.124 109.136C518.455 108.827 518.817 108.555 519.212 108.32C519.617 108.075 520.092 107.952 520.636 107.952C521.479 107.952 522.092 108.224 522.476 108.768C522.86 109.301 523.052 110.069 523.052 111.072V116H521.212V111.312C521.212 110.661 521.116 110.203 520.924 109.936C520.732 109.669 520.417 109.536 519.98 109.536C519.639 109.536 519.335 109.621 519.068 109.792C518.812 109.952 518.519 110.192 518.188 110.512V116H516.348ZM528.678 116.192C528.219 116.192 527.83 116.123 527.51 115.984C527.2 115.845 526.944 115.653 526.742 115.408C526.55 115.152 526.406 114.853 526.31 114.512C526.224 114.16 526.182 113.771 526.182 113.344V109.6H525.062V108.224L526.278 108.144L526.502 106H528.038V108.144H530.038V109.6H528.038V113.344C528.038 114.261 528.406 114.72 529.142 114.72C529.28 114.72 529.419 114.704 529.558 114.672C529.707 114.64 529.84 114.597 529.958 114.544L530.278 115.904C530.064 115.979 529.819 116.043 529.542 116.096C529.275 116.16 528.987 116.192 528.678 116.192ZM425.66 129.432L425.292 130.712H427.964L427.596 129.432C427.425 128.877 427.26 128.307 427.1 127.72C426.95 127.133 426.801 126.552 426.652 125.976H426.588C426.438 126.563 426.289 127.149 426.14 127.736C425.99 128.312 425.83 128.877 425.66 129.432ZM422.156 135L425.564 124.536H427.74L431.148 135H429.196L428.38 132.168H424.86L424.044 135H422.156ZM432.918 135V127.144H434.438L434.566 128.2H434.63C434.982 127.859 435.36 127.565 435.766 127.32C436.182 127.075 436.662 126.952 437.206 126.952C438.048 126.952 438.662 127.224 439.046 127.768C439.43 128.301 439.622 129.069 439.622 130.072V135H437.782V130.312C437.782 129.661 437.686 129.203 437.494 128.936C437.302 128.669 436.987 128.536 436.55 128.536C436.208 128.536 435.904 128.621 435.638 128.792C435.382 128.952 435.088 129.192 434.758 129.512V135H432.918ZM442.511 135V127.144H444.031L444.159 128.2H444.223C444.575 127.859 444.953 127.565 445.359 127.32C445.775 127.075 446.255 126.952 446.799 126.952C447.641 126.952 448.255 127.224 448.639 127.768C449.023 128.301 449.215 129.069 449.215 130.072V135H447.375V130.312C447.375 129.661 447.279 129.203 447.087 128.936C446.895 128.669 446.58 128.536 446.143 128.536C445.801 128.536 445.497 128.621 445.231 128.792C444.975 128.952 444.681 129.192 444.351 129.512V135H442.511ZM455.464 135.192C454.92 135.192 454.413 135.101 453.944 134.92C453.474 134.728 453.064 134.456 452.712 134.104C452.36 133.752 452.082 133.325 451.88 132.824C451.688 132.312 451.592 131.731 451.592 131.08C451.592 130.44 451.693 129.864 451.896 129.352C452.098 128.84 452.365 128.408 452.696 128.056C453.037 127.704 453.426 127.432 453.864 127.24C454.301 127.048 454.749 126.952 455.208 126.952C455.741 126.952 456.21 127.043 456.616 127.224C457.021 127.405 457.357 127.661 457.624 127.992C457.901 128.323 458.109 128.717 458.248 129.176C458.386 129.635 458.456 130.136 458.456 130.68C458.456 130.861 458.445 131.032 458.424 131.192C458.413 131.352 458.397 131.48 458.376 131.576H453.384C453.469 132.28 453.714 132.824 454.12 133.208C454.536 133.581 455.064 133.768 455.704 133.768C456.045 133.768 456.36 133.72 456.648 133.624C456.946 133.517 457.24 133.373 457.528 133.192L458.152 134.344C457.778 134.589 457.362 134.792 456.904 134.952C456.445 135.112 455.965 135.192 455.464 135.192ZM453.368 130.328H456.856C456.856 129.72 456.722 129.245 456.456 128.904C456.2 128.552 455.8 128.376 455.256 128.376C454.786 128.376 454.376 128.541 454.024 128.872C453.672 129.203 453.453 129.688 453.368 130.328ZM462.57 135.192C461.876 135.192 461.316 134.984 460.89 134.568C460.463 134.141 460.25 133.581 460.25 132.888C460.25 132.472 460.335 132.104 460.506 131.784C460.687 131.453 460.964 131.171 461.338 130.936C461.722 130.701 462.202 130.504 462.778 130.344C463.364 130.184 464.063 130.061 464.874 129.976C464.863 129.773 464.831 129.581 464.778 129.4C464.735 129.208 464.655 129.043 464.538 128.904C464.431 128.755 464.287 128.643 464.106 128.568C463.924 128.483 463.7 128.44 463.434 128.44C463.05 128.44 462.671 128.515 462.298 128.664C461.935 128.813 461.578 128.995 461.226 129.208L460.554 127.976C460.991 127.699 461.482 127.459 462.026 127.256C462.57 127.053 463.156 126.952 463.786 126.952C464.767 126.952 465.498 127.245 465.978 127.832C466.468 128.408 466.714 129.245 466.714 130.344V135H465.194L465.066 134.136H465.002C464.65 134.435 464.271 134.685 463.866 134.888C463.471 135.091 463.039 135.192 462.57 135.192ZM463.162 133.752C463.482 133.752 463.77 133.677 464.026 133.528C464.292 133.379 464.575 133.165 464.874 132.888V131.128C464.34 131.192 463.892 131.277 463.53 131.384C463.167 131.491 462.874 131.613 462.65 131.752C462.426 131.88 462.266 132.029 462.17 132.2C462.074 132.371 462.026 132.552 462.026 132.744C462.026 133.096 462.132 133.352 462.346 133.512C462.559 133.672 462.831 133.752 463.162 133.752ZM471.348 135.192C470.686 135.192 470.222 134.995 469.956 134.6C469.689 134.205 469.556 133.667 469.556 132.984V123.704H471.396V133.08C471.396 133.304 471.438 133.464 471.524 133.56C471.609 133.645 471.7 133.688 471.796 133.688C471.838 133.688 471.876 133.688 471.908 133.688C471.95 133.688 472.009 133.677 472.084 133.656L472.324 135.032C472.078 135.139 471.753 135.192 471.348 135.192ZM474.539 135V127.144H476.379V135H474.539ZM475.467 125.768C475.137 125.768 474.865 125.672 474.651 125.48C474.438 125.288 474.331 125.037 474.331 124.728C474.331 124.419 474.438 124.168 474.651 123.976C474.865 123.773 475.137 123.672 475.467 123.672C475.798 123.672 476.07 123.773 476.283 123.976C476.497 124.168 476.603 124.419 476.603 124.728C476.603 125.037 476.497 125.288 476.283 125.48C476.07 125.672 475.798 125.768 475.467 125.768ZM479.367 135V127.144H480.887L481.015 128.2H481.079C481.431 127.859 481.81 127.565 482.215 127.32C482.631 127.075 483.111 126.952 483.655 126.952C484.498 126.952 485.111 127.224 485.495 127.768C485.879 128.301 486.071 129.069 486.071 130.072V135H484.231V130.312C484.231 129.661 484.135 129.203 483.943 128.936C483.751 128.669 483.436 128.536 482.999 128.536C482.658 128.536 482.354 128.621 482.087 128.792C481.831 128.952 481.538 129.192 481.207 129.512V135H479.367ZM491.696 138.472C491.227 138.472 490.789 138.429 490.384 138.344C489.989 138.259 489.648 138.131 489.36 137.96C489.072 137.789 488.843 137.576 488.672 137.32C488.512 137.064 488.432 136.765 488.432 136.424C488.432 136.093 488.528 135.784 488.72 135.496C488.912 135.219 489.189 134.968 489.552 134.744V134.68C489.349 134.552 489.179 134.381 489.04 134.168C488.912 133.955 488.848 133.688 488.848 133.368C488.848 133.059 488.933 132.781 489.104 132.536C489.285 132.28 489.488 132.072 489.712 131.912V131.848C489.445 131.645 489.205 131.368 488.992 131.016C488.789 130.653 488.688 130.237 488.688 129.768C488.688 129.32 488.773 128.92 488.944 128.568C489.115 128.216 489.339 127.923 489.616 127.688C489.904 127.443 490.235 127.261 490.608 127.144C490.981 127.016 491.376 126.952 491.792 126.952C492.005 126.952 492.208 126.973 492.4 127.016C492.603 127.048 492.784 127.091 492.944 127.144H495.76V128.504H494.32C494.448 128.653 494.555 128.845 494.64 129.08C494.725 129.304 494.768 129.555 494.768 129.832C494.768 130.269 494.688 130.653 494.528 130.984C494.379 131.315 494.171 131.592 493.904 131.816C493.637 132.04 493.323 132.211 492.96 132.328C492.597 132.445 492.208 132.504 491.792 132.504C491.621 132.504 491.445 132.488 491.264 132.456C491.083 132.424 490.901 132.371 490.72 132.296C490.603 132.403 490.507 132.509 490.432 132.616C490.368 132.723 490.336 132.867 490.336 133.048C490.336 133.272 490.427 133.448 490.608 133.576C490.8 133.704 491.136 133.768 491.616 133.768H493.008C493.957 133.768 494.672 133.923 495.152 134.232C495.643 134.531 495.888 135.021 495.888 135.704C495.888 136.088 495.787 136.451 495.584 136.792C495.392 137.133 495.115 137.427 494.752 137.672C494.389 137.917 493.947 138.109 493.424 138.248C492.912 138.397 492.336 138.472 491.696 138.472ZM491.792 131.352C492.165 131.352 492.485 131.219 492.752 130.952C493.019 130.675 493.152 130.28 493.152 129.768C493.152 129.277 493.019 128.899 492.752 128.632C492.496 128.355 492.176 128.216 491.792 128.216C491.408 128.216 491.083 128.349 490.816 128.616C490.549 128.883 490.416 129.267 490.416 129.768C490.416 130.28 490.549 130.675 490.816 130.952C491.083 131.219 491.408 131.352 491.792 131.352ZM491.984 137.272C492.624 137.272 493.136 137.144 493.52 136.888C493.915 136.643 494.112 136.349 494.112 136.008C494.112 135.699 493.989 135.491 493.744 135.384C493.509 135.277 493.168 135.224 492.72 135.224H491.648C491.221 135.224 490.864 135.187 490.576 135.112C490.171 135.421 489.968 135.768 489.968 136.152C489.968 136.504 490.144 136.776 490.496 136.968C490.859 137.171 491.355 137.272 491.984 137.272ZM501.916 135V124.536H503.772V133.432H508.124V135H501.916ZM510.427 135V127.144H512.267V135H510.427ZM511.355 125.768C511.024 125.768 510.752 125.672 510.539 125.48C510.326 125.288 510.219 125.037 510.219 124.728C510.219 124.419 510.326 124.168 510.539 123.976C510.752 123.773 511.024 123.672 511.355 123.672C511.686 123.672 511.958 123.773 512.171 123.976C512.384 124.168 512.491 124.419 512.491 124.728C512.491 125.037 512.384 125.288 512.171 125.48C511.958 125.672 511.686 125.768 511.355 125.768ZM515.254 135V127.144H516.774L516.902 128.2H516.966C517.318 127.859 517.697 127.565 518.102 127.32C518.518 127.075 518.998 126.952 519.542 126.952C520.385 126.952 520.998 127.224 521.382 127.768C521.766 128.301 521.958 129.069 521.958 130.072V135H520.118V130.312C520.118 129.661 520.022 129.203 519.83 128.936C519.638 128.669 519.324 128.536 518.886 128.536C518.545 128.536 518.241 128.621 517.974 128.792C517.718 128.952 517.425 129.192 517.094 129.512V135H515.254ZM528.208 135.192C527.664 135.192 527.157 135.101 526.688 134.92C526.218 134.728 525.808 134.456 525.456 134.104C525.104 133.752 524.826 133.325 524.624 132.824C524.432 132.312 524.336 131.731 524.336 131.08C524.336 130.44 524.437 129.864 524.64 129.352C524.842 128.84 525.109 128.408 525.44 128.056C525.781 127.704 526.17 127.432 526.608 127.24C527.045 127.048 527.493 126.952 527.952 126.952C528.485 126.952 528.954 127.043 529.36 127.224C529.765 127.405 530.101 127.661 530.368 127.992C530.645 128.323 530.853 128.717 530.992 129.176C531.13 129.635 531.2 130.136 531.2 130.68C531.2 130.861 531.189 131.032 531.168 131.192C531.157 131.352 531.141 131.48 531.12 131.576H526.128C526.213 132.28 526.458 132.824 526.864 133.208C527.28 133.581 527.808 133.768 528.448 133.768C528.789 133.768 529.104 133.72 529.392 133.624C529.69 133.517 529.984 133.373 530.272 133.192L530.896 134.344C530.522 134.589 530.106 134.792 529.648 134.952C529.189 135.112 528.709 135.192 528.208 135.192ZM526.112 130.328H529.6C529.6 129.72 529.466 129.245 529.2 128.904C528.944 128.552 528.544 128.376 528 128.376C527.53 128.376 527.12 128.541 526.768 128.872C526.416 129.203 526.197 129.688 526.112 130.328Z" fill="#848484" class="m1 caption-vertical-bright" data-prod="vertical-bright" data-fac=2 />
                                            <path d="M429.141 75.6585L433.862 68.3794H442.821V52.2416H446.005V68.4128H456.694L458.55 40.3159H460.848L463.271 68.4629H471.821V47.5031C471.821 47.5031 471.946 45.9821 473.877 45.9821C473.877 45.9821 475.866 45.9821 475.866 47.3945V68.4629H530.238" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M423.048 80.9148C426.413 80.9148 429.141 78.1871 429.141 74.8224C429.141 71.4576 426.413 68.73 423.048 68.73C419.683 68.73 416.956 71.4576 416.956 74.8224C416.956 78.1871 419.683 80.9148 423.048 80.9148Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M423.048 77.5639C424.562 77.5639 425.789 76.3366 425.789 74.8227C425.789 73.3088 424.562 72.0815 423.048 72.0815C421.534 72.0815 420.307 73.3088 420.307 74.8227C420.307 76.3366 421.534 77.5639 423.048 77.5639Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M530.58 80.5564C533.945 80.5564 536.673 77.8287 536.673 74.464C536.673 71.0992 533.945 68.3716 530.58 68.3716C527.215 68.3716 524.488 71.0992 524.488 74.464C524.488 77.8287 527.215 80.5564 530.58 80.5564Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M530.58 77.2045C532.094 77.2045 533.321 75.9772 533.321 74.4633C533.321 72.9494 532.094 71.7222 530.58 71.7222C529.066 71.7222 527.839 72.9494 527.839 74.4633C527.839 75.9772 529.066 77.2045 530.58 77.2045Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M462.954 59.4542H456.677C454.839 59.4542 453.351 57.9666 453.351 56.128V30.5801C453.351 28.7415 454.839 27.2539 456.677 27.2539H462.954C464.792 27.2539 466.28 28.7415 466.28 30.5801V56.128C466.28 57.9666 464.792 59.4542 462.954 59.4542Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M494.243 59.4541H484.306C482.677 59.4541 481.348 60.7745 481.348 62.4125V75.8258C481.348 77.4555 482.668 78.7843 484.306 78.7843H494.243C495.873 78.7843 497.201 77.4638 497.201 75.8258V62.4125C497.193 60.7829 495.873 59.4541 494.243 59.4541Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M511.71 59.4541H504.656C502.224 59.4541 500.26 61.4264 500.26 63.85V74.38C500.26 76.812 502.233 78.7759 504.656 78.7759H511.71C514.142 78.7759 516.105 76.8036 516.105 74.38V63.85C516.114 61.4264 514.142 59.4541 511.71 59.4541Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright  " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M504.18 68.4627C504.891 68.4627 505.467 67.8865 505.467 67.1757C505.467 66.4649 504.891 65.8887 504.18 65.8887C503.469 65.8887 502.893 66.4649 502.893 67.1757C502.893 67.8865 503.469 68.4627 504.18 68.4627Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M486.187 65.2208C486.768 65.2208 487.24 64.7493 487.24 64.1678C487.24 63.5862 486.768 63.1147 486.187 63.1147C485.605 63.1147 485.134 63.5862 485.134 64.1678C485.134 64.7493 485.605 65.2208 486.187 65.2208Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M489.271 65.2208C489.852 65.2208 490.324 64.7493 490.324 64.1678C490.324 63.5862 489.852 63.1147 489.271 63.1147C488.689 63.1147 488.218 63.5862 488.218 64.1678C488.218 64.7493 488.689 65.2208 489.271 65.2208Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M492.421 65.2208C493.003 65.2208 493.474 64.7493 493.474 64.1678C493.474 63.5862 493.003 63.1147 492.421 63.1147C491.84 63.1147 491.368 63.5862 491.368 64.1678C491.368 64.7493 491.84 65.2208 492.421 65.2208Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M486.187 74.7554C486.768 74.7554 487.24 74.284 487.24 73.7024C487.24 73.1209 486.768 72.6494 486.187 72.6494C485.605 72.6494 485.134 73.1209 485.134 73.7024C485.134 74.284 485.605 74.7554 486.187 74.7554Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M489.271 74.7554C489.852 74.7554 490.324 74.284 490.324 73.7024C490.324 73.1209 489.852 72.6494 489.271 72.6494C488.689 72.6494 488.218 73.1209 488.218 73.7024C488.218 74.284 488.689 74.7554 489.271 74.7554Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M492.421 74.7554C493.003 74.7554 493.474 74.284 493.474 73.7024C493.474 73.1209 493.003 72.6494 492.421 72.6494C491.84 72.6494 491.368 73.1209 491.368 73.7024C491.368 74.284 491.84 74.7554 492.421 74.7554Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M477.479 68.4627C478.189 68.4627 478.766 67.8865 478.766 67.1757C478.766 66.4649 478.189 65.8887 477.479 65.8887C476.768 65.8887 476.192 66.4649 476.192 67.1757C476.192 67.8865 476.768 68.4627 477.479 68.4627Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M470.509 68.4627C471.219 68.4627 471.796 67.8865 471.796 67.1757C471.796 66.4649 471.219 65.8887 470.509 65.8887C469.798 65.8887 469.222 66.4649 469.222 67.1757C469.222 67.8865 469.798 68.4627 470.509 68.4627Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M447.535 68.4627C448.246 68.4627 448.822 67.8865 448.822 67.1757C448.822 66.4649 448.246 65.8887 447.535 65.8887C446.824 65.8887 446.248 66.4649 446.248 67.1757C446.248 67.8865 446.824 68.4627 447.535 68.4627Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M444.459 53.8216C445.59 53.8216 446.507 52.9049 446.507 51.7741C446.507 50.6433 445.59 49.7266 444.459 49.7266C443.329 49.7266 442.412 50.6433 442.412 51.7741C442.412 52.9049 443.329 53.8216 444.459 53.8216Z" fill="white" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M459.678 42.3641C460.809 42.3641 461.725 41.4474 461.725 40.3166C461.725 39.1857 460.809 38.269 459.678 38.269C458.547 38.269 457.63 39.1857 457.63 40.3166C457.63 41.4474 458.547 42.3641 459.678 42.3641Z" fill="white" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M521.212 72.6497C522.343 72.6497 523.259 71.733 523.259 70.6022C523.259 69.4714 522.343 68.5547 521.212 68.5547C520.081 68.5547 519.164 69.4714 519.164 70.6022C519.164 71.733 520.081 72.6497 521.212 72.6497Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M441.083 68.4627C441.794 68.4627 442.37 67.8865 442.37 67.1757C442.37 66.4649 441.794 65.8887 441.083 65.8887C440.372 65.8887 439.796 66.4649 439.796 67.1757C439.796 67.8865 440.372 68.4627 441.083 68.4627Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M434.481 71.3133C435.192 71.3133 435.768 70.7371 435.768 70.0263C435.768 69.3155 435.192 68.7393 434.481 68.7393C433.77 68.7393 433.194 69.3155 433.194 70.0263C433.194 70.7371 433.77 71.3133 434.481 71.3133Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M464.7 68.4627C465.411 68.4627 465.987 67.8865 465.987 67.1757C465.987 66.4649 465.411 65.8887 464.7 65.8887C463.99 65.8887 463.413 66.4649 463.413 67.1757C463.413 67.8865 463.99 68.4627 464.7 68.4627Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M455.148 68.4627C455.859 68.4627 456.435 67.8865 456.435 67.1757C456.435 66.4649 455.859 65.8887 455.148 65.8887C454.437 65.8887 453.861 66.4649 453.861 67.1757C453.861 67.8865 454.437 68.4627 455.148 68.4627Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M511.768 65.2704C513.24 65.2704 514.434 64.0768 514.434 62.6044C514.434 61.1321 513.24 59.9385 511.768 59.9385C510.296 59.9385 509.102 61.1321 509.102 62.6044C509.102 64.0768 510.296 65.2704 511.768 65.2704Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M512.412 70.9617C513.122 70.9617 513.699 70.3855 513.699 69.6747C513.699 68.9639 513.122 68.3877 512.412 68.3877C511.701 68.3877 511.125 68.9639 511.125 69.6747C511.125 70.3855 511.701 70.9617 512.412 70.9617Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />
                                            <path d="M504.823 78.2069C506.296 78.2069 507.489 77.0133 507.489 75.5409C507.489 74.0686 506.296 72.875 504.823 72.875C503.351 72.875 502.157 74.0686 502.157 75.5409C502.157 77.0133 503.351 78.2069 504.823 78.2069Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 vertical-bright " data-prod="vertical-bright" data-fac=2 />

                                            <rect x="594.5" y="0.5" width="161" height="157" fill="white" stroke="#D9D9D9" class="m1 skin-pass-mill w1" data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M629.638 123.192C628.934 123.192 628.251 123.059 627.59 122.792C626.939 122.525 626.363 122.147 625.862 121.656L626.95 120.392C627.323 120.744 627.75 121.032 628.23 121.256C628.71 121.469 629.19 121.576 629.67 121.576C630.267 121.576 630.72 121.453 631.03 121.208C631.339 120.963 631.494 120.637 631.494 120.232C631.494 120.019 631.451 119.837 631.366 119.688C631.291 119.539 631.179 119.411 631.03 119.304C630.891 119.187 630.72 119.08 630.518 118.984C630.326 118.888 630.112 118.792 629.878 118.696L628.438 118.072C628.182 117.965 627.926 117.832 627.67 117.672C627.424 117.512 627.2 117.32 626.998 117.096C626.795 116.872 626.63 116.611 626.502 116.312C626.384 116.013 626.326 115.672 626.326 115.288C626.326 114.872 626.411 114.488 626.582 114.136C626.763 113.773 627.008 113.459 627.318 113.192C627.627 112.925 627.995 112.717 628.422 112.568C628.859 112.419 629.334 112.344 629.846 112.344C630.454 112.344 631.04 112.467 631.606 112.712C632.171 112.947 632.656 113.267 633.062 113.672L632.118 114.856C631.776 114.579 631.424 114.36 631.062 114.2C630.699 114.04 630.294 113.96 629.846 113.96C629.344 113.96 628.944 114.072 628.646 114.296C628.347 114.509 628.198 114.808 628.198 115.192C628.198 115.395 628.24 115.571 628.326 115.72C628.422 115.859 628.544 115.987 628.694 116.104C628.854 116.211 629.035 116.312 629.238 116.408C629.44 116.493 629.648 116.579 629.862 116.664L631.286 117.256C631.595 117.384 631.878 117.533 632.134 117.704C632.39 117.875 632.608 118.072 632.79 118.296C632.982 118.52 633.131 118.781 633.238 119.08C633.344 119.368 633.398 119.704 633.398 120.088C633.398 120.515 633.312 120.915 633.142 121.288C632.971 121.661 632.72 121.992 632.39 122.28C632.07 122.557 631.675 122.781 631.206 122.952C630.747 123.112 630.224 123.192 629.638 123.192ZM635.78 123V111.704H637.588V118.76H637.636L640.548 115.144H642.564L639.876 118.344L642.836 123H640.836L638.82 119.592L637.588 121V123H635.78ZM644.78 123V115.144H646.62V123H644.78ZM645.708 113.768C645.377 113.768 645.105 113.672 644.892 113.48C644.679 113.288 644.572 113.037 644.572 112.728C644.572 112.419 644.679 112.168 644.892 111.976C645.105 111.773 645.377 111.672 645.708 111.672C646.039 111.672 646.311 111.773 646.524 111.976C646.737 112.168 646.844 112.419 646.844 112.728C646.844 113.037 646.737 113.288 646.524 113.48C646.311 113.672 646.039 113.768 645.708 113.768ZM649.607 123V115.144H651.127L651.255 116.2H651.319C651.671 115.859 652.05 115.565 652.455 115.32C652.871 115.075 653.351 114.952 653.895 114.952C654.738 114.952 655.351 115.224 655.735 115.768C656.119 116.301 656.311 117.069 656.311 118.072V123H654.471V118.312C654.471 117.661 654.375 117.203 654.183 116.936C653.991 116.669 653.677 116.536 653.239 116.536C652.898 116.536 652.594 116.621 652.327 116.792C652.071 116.952 651.778 117.192 651.447 117.512V123H649.607ZM663.204 123V112.536H666.5C667.076 112.536 667.609 112.589 668.1 112.696C668.601 112.803 669.033 112.984 669.396 113.24C669.758 113.496 670.041 113.832 670.244 114.248C670.446 114.653 670.548 115.16 670.548 115.768C670.548 116.344 670.446 116.845 670.244 117.272C670.041 117.699 669.758 118.056 669.396 118.344C669.044 118.621 668.622 118.829 668.132 118.968C667.652 119.096 667.129 119.16 666.564 119.16H665.06V123H663.204ZM665.06 117.672H666.42C667.956 117.672 668.724 117.037 668.724 115.768C668.724 115.107 668.521 114.653 668.116 114.408C667.721 114.152 667.134 114.024 666.356 114.024H665.06V117.672ZM674.291 123.192C673.597 123.192 673.037 122.984 672.611 122.568C672.184 122.141 671.971 121.581 671.971 120.888C671.971 120.472 672.056 120.104 672.227 119.784C672.408 119.453 672.685 119.171 673.059 118.936C673.443 118.701 673.923 118.504 674.499 118.344C675.085 118.184 675.784 118.061 676.595 117.976C676.584 117.773 676.552 117.581 676.499 117.4C676.456 117.208 676.376 117.043 676.259 116.904C676.152 116.755 676.008 116.643 675.827 116.568C675.645 116.483 675.421 116.44 675.155 116.44C674.771 116.44 674.392 116.515 674.019 116.664C673.656 116.813 673.299 116.995 672.947 117.208L672.275 115.976C672.712 115.699 673.203 115.459 673.747 115.256C674.291 115.053 674.877 114.952 675.507 114.952C676.488 114.952 677.219 115.245 677.699 115.832C678.189 116.408 678.435 117.245 678.435 118.344V123H676.915L676.787 122.136H676.723C676.371 122.435 675.992 122.685 675.587 122.888C675.192 123.091 674.76 123.192 674.291 123.192ZM674.883 121.752C675.203 121.752 675.491 121.677 675.747 121.528C676.013 121.379 676.296 121.165 676.595 120.888V119.128C676.061 119.192 675.613 119.277 675.251 119.384C674.888 119.491 674.595 119.613 674.371 119.752C674.147 119.88 673.987 120.029 673.891 120.2C673.795 120.371 673.747 120.552 673.747 120.744C673.747 121.096 673.853 121.352 674.067 121.512C674.28 121.672 674.552 121.752 674.883 121.752ZM683.469 123.192C682.925 123.192 682.386 123.091 681.853 122.888C681.33 122.675 680.877 122.413 680.493 122.104L681.357 120.92C681.709 121.197 682.055 121.416 682.397 121.576C682.749 121.725 683.127 121.8 683.533 121.8C683.959 121.8 684.274 121.715 684.477 121.544C684.679 121.363 684.781 121.133 684.781 120.856C684.781 120.696 684.733 120.557 684.637 120.44C684.541 120.312 684.413 120.2 684.253 120.104C684.093 120.008 683.911 119.923 683.709 119.848C683.506 119.763 683.303 119.677 683.101 119.592C682.845 119.496 682.583 119.384 682.317 119.256C682.05 119.128 681.81 118.973 681.597 118.792C681.394 118.611 681.223 118.403 681.085 118.168C680.957 117.923 680.893 117.635 680.893 117.304C680.893 116.611 681.149 116.045 681.661 115.608C682.173 115.171 682.871 114.952 683.757 114.952C684.301 114.952 684.791 115.048 685.229 115.24C685.666 115.432 686.045 115.651 686.365 115.896L685.517 117.016C685.239 116.813 684.957 116.653 684.669 116.536C684.391 116.408 684.098 116.344 683.789 116.344C683.394 116.344 683.101 116.429 682.909 116.6C682.727 116.76 682.637 116.963 682.637 117.208C682.637 117.368 682.679 117.507 682.765 117.624C682.861 117.731 682.983 117.827 683.133 117.912C683.282 117.997 683.453 118.077 683.645 118.152C683.847 118.227 684.055 118.301 684.269 118.376C684.535 118.472 684.802 118.584 685.069 118.712C685.335 118.829 685.575 118.979 685.789 119.16C686.013 119.341 686.189 119.565 686.317 119.832C686.455 120.088 686.525 120.397 686.525 120.76C686.525 121.101 686.455 121.421 686.317 121.72C686.189 122.008 685.997 122.264 685.741 122.488C685.485 122.701 685.165 122.872 684.781 123C684.397 123.128 683.959 123.192 683.469 123.192ZM690.999 123.192C690.455 123.192 689.917 123.091 689.383 122.888C688.861 122.675 688.407 122.413 688.023 122.104L688.887 120.92C689.239 121.197 689.586 121.416 689.927 121.576C690.279 121.725 690.658 121.8 691.063 121.8C691.49 121.8 691.805 121.715 692.007 121.544C692.21 121.363 692.311 121.133 692.311 120.856C692.311 120.696 692.263 120.557 692.167 120.44C692.071 120.312 691.943 120.2 691.783 120.104C691.623 120.008 691.442 119.923 691.239 119.848C691.037 119.763 690.834 119.677 690.631 119.592C690.375 119.496 690.114 119.384 689.847 119.256C689.581 119.128 689.341 118.973 689.127 118.792C688.925 118.611 688.754 118.403 688.615 118.168C688.487 117.923 688.423 117.635 688.423 117.304C688.423 116.611 688.679 116.045 689.191 115.608C689.703 115.171 690.402 114.952 691.287 114.952C691.831 114.952 692.322 115.048 692.759 115.24C693.197 115.432 693.575 115.651 693.895 115.896L693.047 117.016C692.77 116.813 692.487 116.653 692.199 116.536C691.922 116.408 691.629 116.344 691.319 116.344C690.925 116.344 690.631 116.429 690.439 116.6C690.258 116.76 690.167 116.963 690.167 117.208C690.167 117.368 690.21 117.507 690.295 117.624C690.391 117.731 690.514 117.827 690.663 117.912C690.813 117.997 690.983 118.077 691.175 118.152C691.378 118.227 691.586 118.301 691.799 118.376C692.066 118.472 692.333 118.584 692.599 118.712C692.866 118.829 693.106 118.979 693.319 119.16C693.543 119.341 693.719 119.565 693.847 119.832C693.986 120.088 694.055 120.397 694.055 120.76C694.055 121.101 693.986 121.421 693.847 121.72C693.719 122.008 693.527 122.264 693.271 122.488C693.015 122.701 692.695 122.872 692.311 123C691.927 123.128 691.49 123.192 690.999 123.192ZM700.341 123V112.536H702.437L704.293 117.656C704.41 117.987 704.522 118.328 704.629 118.68C704.736 119.021 704.848 119.363 704.965 119.704H705.029C705.146 119.363 705.253 119.021 705.349 118.68C705.456 118.328 705.568 117.987 705.685 117.656L707.493 112.536H709.605V123H707.893V118.216C707.893 117.971 707.898 117.704 707.909 117.416C707.93 117.128 707.952 116.84 707.973 116.552C707.994 116.253 708.021 115.965 708.053 115.688C708.085 115.4 708.112 115.133 708.133 114.888H708.069L707.221 117.32L705.509 122.024H704.405L702.677 117.32L701.845 114.888H701.781C701.802 115.133 701.824 115.4 701.845 115.688C701.877 115.965 701.904 116.253 701.925 116.552C701.957 116.84 701.978 117.128 701.989 117.416C702.01 117.704 702.021 117.971 702.021 118.216V123H700.341ZM712.743 123V115.144H714.583V123H712.743ZM713.671 113.768C713.34 113.768 713.068 113.672 712.855 113.48C712.642 113.288 712.535 113.037 712.535 112.728C712.535 112.419 712.642 112.168 712.855 111.976C713.068 111.773 713.34 111.672 713.671 111.672C714.002 111.672 714.274 111.773 714.487 111.976C714.7 112.168 714.807 112.419 714.807 112.728C714.807 113.037 714.7 113.288 714.487 113.48C714.274 113.672 714.002 113.768 713.671 113.768ZM719.362 123.192C718.701 123.192 718.237 122.995 717.97 122.6C717.704 122.205 717.57 121.667 717.57 120.984V111.704H719.41V121.08C719.41 121.304 719.453 121.464 719.538 121.56C719.624 121.645 719.714 121.688 719.81 121.688C719.853 121.688 719.89 121.688 719.922 121.688C719.965 121.688 720.024 121.677 720.098 121.656L720.338 123.032C720.093 123.139 719.768 123.192 719.362 123.192ZM724.346 123.192C723.685 123.192 723.221 122.995 722.954 122.6C722.688 122.205 722.554 121.667 722.554 120.984V111.704H724.394V121.08C724.394 121.304 724.437 121.464 724.522 121.56C724.608 121.645 724.698 121.688 724.794 121.688C724.837 121.688 724.874 121.688 724.906 121.688C724.949 121.688 725.008 121.677 725.082 121.656L725.322 123.032C725.077 123.139 724.752 123.192 724.346 123.192Z" fill="#848484" class="m1 caption-skin-pass-mill" data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M694.62 68.2876L687.853 63.5394C687.452 63.2596 687.218 62.806 687.218 62.3145V29.7499C687.218 29.3643 687.067 28.9938 686.802 28.7216L680.837 22.4612C680.557 22.1664 680.164 22 679.755 22H671.03C670.637 22 670.259 22.1512 669.979 22.431L663.59 28.7216C663.303 29.0014 663.144 29.387 663.144 29.7877V62.3221C663.144 62.806 662.91 63.2672 662.509 63.547L655.742 68.2952C655.341 68.5749 655.107 69.0286 655.107 69.52V74.4649C655.107 75.6897 656.498 76.3929 657.481 75.6746L663.144 71.5388L663.794 71.2591C665.382 76.03 669.873 79.4701 675.174 79.4701C679.907 79.4701 683.99 76.7331 685.94 72.7561C686.326 71.9622 687.331 71.7051 688.072 72.1815L692.866 75.6821C693.856 76.4004 695.24 75.6973 695.24 74.4724V69.5276C695.255 69.021 695.021 68.5674 694.62 68.2876Z" fill="white" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill outside" data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M635.895 74.3821C639.365 74.3821 642.178 71.569 642.178 68.099C642.178 64.6289 639.365 61.8159 635.895 61.8159C632.425 61.8159 629.612 64.6289 629.612 68.099C629.612 71.569 632.425 74.3821 635.895 74.3821Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M635.895 70.926C637.457 70.926 638.723 69.66 638.723 68.0983C638.723 66.5365 637.457 65.2705 635.895 65.2705C634.333 65.2705 633.067 66.5365 633.067 68.0983C633.067 69.66 634.333 70.926 635.895 70.926Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M714.755 74.3821C718.225 74.3821 721.038 71.569 721.038 68.099C721.038 64.6289 718.225 61.8159 714.755 61.8159C711.285 61.8159 708.472 64.6289 708.472 68.099C708.472 71.569 711.285 74.3821 714.755 74.3821Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M714.755 70.926C716.316 70.926 717.583 69.66 717.583 68.0983C717.583 66.5365 716.316 65.2705 714.755 65.2705C713.193 65.2705 711.927 66.5365 711.927 68.0983C711.927 69.66 713.193 70.926 714.755 70.926Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M633.067 62.4878L648.847 47.4189H701.659L714.755 61.8148" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M649.762 51.3439C650.814 51.3439 651.667 50.4908 651.667 49.4385C651.667 48.3862 650.814 47.5332 649.762 47.5332C648.709 47.5332 647.856 48.3862 647.856 49.4385C647.856 50.4908 648.709 51.3439 649.762 51.3439Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M700.646 51.3439C701.698 51.3439 702.552 50.4908 702.552 49.4385C702.552 48.3862 701.698 47.5332 700.646 47.5332C699.594 47.5332 698.741 48.3862 698.741 49.4385C698.741 50.4908 699.594 51.3439 700.646 51.3439Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M675.181 65.7849C679.065 65.7849 682.213 62.6367 682.213 58.7533C682.213 54.8699 679.065 51.7217 675.181 51.7217C671.298 51.7217 668.15 54.8699 668.15 58.7533C668.15 62.6367 671.298 65.7849 675.181 65.7849Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M675.181 62.8206C677.428 62.8206 679.249 60.9994 679.249 58.7528C679.249 56.5063 677.428 54.6851 675.181 54.6851C672.935 54.6851 671.113 56.5063 671.113 58.7528C671.113 60.9994 672.935 62.8206 675.181 62.8206Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M675.181 43.5481C679.065 43.5481 682.213 40.3999 682.213 36.5165C682.213 32.633 679.065 29.4849 675.181 29.4849C671.298 29.4849 668.15 32.633 668.15 36.5165C668.15 40.3999 671.298 43.5481 675.181 43.5481Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />
                                            <path d="M675.181 40.5847C677.428 40.5847 679.249 38.7635 679.249 36.517C679.249 34.2704 677.428 32.4492 675.181 32.4492C672.935 32.4492 671.113 34.2704 671.113 36.517C671.113 38.7635 672.935 40.5847 675.181 40.5847Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 skin-pass-mill " data-prod="skin-pass-mill" data-fac=3 />

                                            <rect x="791.5" y="0.5" width="162" height="157" fill="white" stroke="#D9D9D9" class="m1 slitting-line w1" data-prod="slitting-line" data-fac=5 />
                                            <path d="M832.594 123.192C831.89 123.192 831.208 123.059 830.546 122.792C829.896 122.525 829.32 122.147 828.818 121.656L829.906 120.392C830.28 120.744 830.706 121.032 831.186 121.256C831.666 121.469 832.146 121.576 832.626 121.576C833.224 121.576 833.677 121.453 833.986 121.208C834.296 120.963 834.45 120.637 834.45 120.232C834.45 120.019 834.408 119.837 834.322 119.688C834.248 119.539 834.136 119.411 833.986 119.304C833.848 119.187 833.677 119.08 833.474 118.984C833.282 118.888 833.069 118.792 832.834 118.696L831.394 118.072C831.138 117.965 830.882 117.832 830.626 117.672C830.381 117.512 830.157 117.32 829.954 117.096C829.752 116.872 829.586 116.611 829.458 116.312C829.341 116.013 829.282 115.672 829.282 115.288C829.282 114.872 829.368 114.488 829.538 114.136C829.72 113.773 829.965 113.459 830.274 113.192C830.584 112.925 830.952 112.717 831.378 112.568C831.816 112.419 832.29 112.344 832.802 112.344C833.41 112.344 833.997 112.467 834.562 112.712C835.128 112.947 835.613 113.267 836.018 113.672L835.074 114.856C834.733 114.579 834.381 114.36 834.018 114.2C833.656 114.04 833.25 113.96 832.802 113.96C832.301 113.96 831.901 114.072 831.602 114.296C831.304 114.509 831.154 114.808 831.154 115.192C831.154 115.395 831.197 115.571 831.282 115.72C831.378 115.859 831.501 115.987 831.65 116.104C831.81 116.211 831.992 116.312 832.194 116.408C832.397 116.493 832.605 116.579 832.818 116.664L834.242 117.256C834.552 117.384 834.834 117.533 835.09 117.704C835.346 117.875 835.565 118.072 835.746 118.296C835.938 118.52 836.088 118.781 836.194 119.08C836.301 119.368 836.354 119.704 836.354 120.088C836.354 120.515 836.269 120.915 836.098 121.288C835.928 121.661 835.677 121.992 835.346 122.28C835.026 122.557 834.632 122.781 834.162 122.952C833.704 123.112 833.181 123.192 832.594 123.192ZM840.529 123.192C839.868 123.192 839.404 122.995 839.137 122.6C838.871 122.205 838.737 121.667 838.737 120.984V111.704H840.577V121.08C840.577 121.304 840.62 121.464 840.705 121.56C840.791 121.645 840.881 121.688 840.977 121.688C841.02 121.688 841.057 121.688 841.089 121.688C841.132 121.688 841.191 121.677 841.265 121.656L841.505 123.032C841.26 123.139 840.935 123.192 840.529 123.192ZM843.721 123V115.144H845.561V123H843.721ZM844.649 113.768C844.318 113.768 844.046 113.672 843.833 113.48C843.62 113.288 843.513 113.037 843.513 112.728C843.513 112.419 843.62 112.168 843.833 111.976C844.046 111.773 844.318 111.672 844.649 111.672C844.98 111.672 845.252 111.773 845.465 111.976C845.678 112.168 845.785 112.419 845.785 112.728C845.785 113.037 845.678 113.288 845.465 113.48C845.252 113.672 844.98 113.768 844.649 113.768ZM851.316 123.192C850.858 123.192 850.468 123.123 850.148 122.984C849.839 122.845 849.583 122.653 849.38 122.408C849.188 122.152 849.044 121.853 848.948 121.512C848.863 121.16 848.82 120.771 848.82 120.344V116.6H847.7V115.224L848.916 115.144L849.14 113H850.676V115.144H852.676V116.6H850.676V120.344C850.676 121.261 851.044 121.72 851.78 121.72C851.919 121.72 852.058 121.704 852.196 121.672C852.346 121.64 852.479 121.597 852.596 121.544L852.916 122.904C852.703 122.979 852.458 123.043 852.18 123.096C851.914 123.16 851.626 123.192 851.316 123.192ZM857.425 123.192C856.967 123.192 856.577 123.123 856.257 122.984C855.948 122.845 855.692 122.653 855.489 122.408C855.297 122.152 855.153 121.853 855.057 121.512C854.972 121.16 854.929 120.771 854.929 120.344V116.6H853.809V115.224L855.025 115.144L855.249 113H856.785V115.144H858.785V116.6H856.785V120.344C856.785 121.261 857.153 121.72 857.889 121.72C858.028 121.72 858.167 121.704 858.305 121.672C858.455 121.64 858.588 121.597 858.705 121.544L859.025 122.904C858.812 122.979 858.567 123.043 858.289 123.096C858.023 123.16 857.735 123.192 857.425 123.192ZM861.078 123V115.144H862.918V123H861.078ZM862.006 113.768C861.676 113.768 861.404 113.672 861.19 113.48C860.977 113.288 860.87 113.037 860.87 112.728C860.87 112.419 860.977 112.168 861.19 111.976C861.404 111.773 861.676 111.672 862.006 111.672C862.337 111.672 862.609 111.773 862.822 111.976C863.036 112.168 863.142 112.419 863.142 112.728C863.142 113.037 863.036 113.288 862.822 113.48C862.609 113.672 862.337 113.768 862.006 113.768ZM865.906 123V115.144H867.426L867.554 116.2H867.618C867.97 115.859 868.349 115.565 868.754 115.32C869.17 115.075 869.65 114.952 870.194 114.952C871.037 114.952 871.65 115.224 872.034 115.768C872.418 116.301 872.61 117.069 872.61 118.072V123H870.77V118.312C870.77 117.661 870.674 117.203 870.482 116.936C870.29 116.669 869.975 116.536 869.538 116.536C869.197 116.536 868.893 116.621 868.626 116.792C868.37 116.952 868.077 117.192 867.746 117.512V123H865.906ZM878.235 126.472C877.766 126.472 877.328 126.429 876.923 126.344C876.528 126.259 876.187 126.131 875.899 125.96C875.611 125.789 875.382 125.576 875.211 125.32C875.051 125.064 874.971 124.765 874.971 124.424C874.971 124.093 875.067 123.784 875.259 123.496C875.451 123.219 875.728 122.968 876.091 122.744V122.68C875.888 122.552 875.718 122.381 875.579 122.168C875.451 121.955 875.387 121.688 875.387 121.368C875.387 121.059 875.472 120.781 875.643 120.536C875.824 120.28 876.027 120.072 876.251 119.912V119.848C875.984 119.645 875.744 119.368 875.531 119.016C875.328 118.653 875.227 118.237 875.227 117.768C875.227 117.32 875.312 116.92 875.483 116.568C875.654 116.216 875.878 115.923 876.155 115.688C876.443 115.443 876.774 115.261 877.147 115.144C877.52 115.016 877.915 114.952 878.331 114.952C878.544 114.952 878.747 114.973 878.939 115.016C879.142 115.048 879.323 115.091 879.483 115.144H882.299V116.504H880.859C880.987 116.653 881.094 116.845 881.179 117.08C881.264 117.304 881.307 117.555 881.307 117.832C881.307 118.269 881.227 118.653 881.067 118.984C880.918 119.315 880.71 119.592 880.443 119.816C880.176 120.04 879.862 120.211 879.499 120.328C879.136 120.445 878.747 120.504 878.331 120.504C878.16 120.504 877.984 120.488 877.803 120.456C877.622 120.424 877.44 120.371 877.259 120.296C877.142 120.403 877.046 120.509 876.971 120.616C876.907 120.723 876.875 120.867 876.875 121.048C876.875 121.272 876.966 121.448 877.147 121.576C877.339 121.704 877.675 121.768 878.155 121.768H879.547C880.496 121.768 881.211 121.923 881.691 122.232C882.182 122.531 882.427 123.021 882.427 123.704C882.427 124.088 882.326 124.451 882.123 124.792C881.931 125.133 881.654 125.427 881.291 125.672C880.928 125.917 880.486 126.109 879.963 126.248C879.451 126.397 878.875 126.472 878.235 126.472ZM878.331 119.352C878.704 119.352 879.024 119.219 879.291 118.952C879.558 118.675 879.691 118.28 879.691 117.768C879.691 117.277 879.558 116.899 879.291 116.632C879.035 116.355 878.715 116.216 878.331 116.216C877.947 116.216 877.622 116.349 877.355 116.616C877.088 116.883 876.955 117.267 876.955 117.768C876.955 118.28 877.088 118.675 877.355 118.952C877.622 119.219 877.947 119.352 878.331 119.352ZM878.523 125.272C879.163 125.272 879.675 125.144 880.059 124.888C880.454 124.643 880.651 124.349 880.651 124.008C880.651 123.699 880.528 123.491 880.283 123.384C880.048 123.277 879.707 123.224 879.259 123.224H878.187C877.76 123.224 877.403 123.187 877.115 123.112C876.71 123.421 876.507 123.768 876.507 124.152C876.507 124.504 876.683 124.776 877.035 124.968C877.398 125.171 877.894 125.272 878.523 125.272ZM888.455 123V112.536H890.311V121.432H894.663V123H888.455ZM896.966 123V115.144H898.806V123H896.966ZM897.894 113.768C897.563 113.768 897.291 113.672 897.078 113.48C896.865 113.288 896.758 113.037 896.758 112.728C896.758 112.419 896.865 112.168 897.078 111.976C897.291 111.773 897.563 111.672 897.894 111.672C898.225 111.672 898.497 111.773 898.71 111.976C898.923 112.168 899.03 112.419 899.03 112.728C899.03 113.037 898.923 113.288 898.71 113.48C898.497 113.672 898.225 113.768 897.894 113.768ZM901.793 123V115.144H903.313L903.441 116.2H903.505C903.857 115.859 904.236 115.565 904.641 115.32C905.057 115.075 905.537 114.952 906.081 114.952C906.924 114.952 907.537 115.224 907.921 115.768C908.305 116.301 908.497 117.069 908.497 118.072V123H906.657V118.312C906.657 117.661 906.561 117.203 906.369 116.936C906.177 116.669 905.863 116.536 905.425 116.536C905.084 116.536 904.78 116.621 904.513 116.792C904.257 116.952 903.964 117.192 903.633 117.512V123H901.793ZM914.747 123.192C914.203 123.192 913.696 123.101 913.227 122.92C912.757 122.728 912.347 122.456 911.995 122.104C911.643 121.752 911.365 121.325 911.163 120.824C910.971 120.312 910.875 119.731 910.875 119.08C910.875 118.44 910.976 117.864 911.179 117.352C911.381 116.84 911.648 116.408 911.979 116.056C912.32 115.704 912.709 115.432 913.147 115.24C913.584 115.048 914.032 114.952 914.491 114.952C915.024 114.952 915.493 115.043 915.899 115.224C916.304 115.405 916.64 115.661 916.907 115.992C917.184 116.323 917.392 116.717 917.531 117.176C917.669 117.635 917.739 118.136 917.739 118.68C917.739 118.861 917.728 119.032 917.707 119.192C917.696 119.352 917.68 119.48 917.659 119.576H912.667C912.752 120.28 912.997 120.824 913.403 121.208C913.819 121.581 914.347 121.768 914.987 121.768C915.328 121.768 915.643 121.72 915.931 121.624C916.229 121.517 916.523 121.373 916.811 121.192L917.435 122.344C917.061 122.589 916.645 122.792 916.187 122.952C915.728 123.112 915.248 123.192 914.747 123.192ZM912.651 118.328H916.139C916.139 117.72 916.005 117.245 915.739 116.904C915.483 116.552 915.083 116.376 914.539 116.376C914.069 116.376 913.659 116.541 913.307 116.872C912.955 117.203 912.736 117.688 912.651 118.328Z" fill="#848484" class="m1 caption-slitting-line" data-prod="slitting-line" data-fac=5 />
                                            <path d="M836.757 63.2444C840.628 63.2444 843.766 60.1064 843.766 56.2355C843.766 52.3646 840.628 49.2266 836.757 49.2266C832.886 49.2266 829.748 52.3646 829.748 56.2355C829.748 60.1064 832.886 63.2444 836.757 63.2444Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />
                                            <path d="M836.757 59.3883C838.498 59.3883 839.91 57.9767 839.91 56.2354C839.91 54.4941 838.498 53.0825 836.757 53.0825C835.016 53.0825 833.604 54.4941 833.604 56.2354C833.604 57.9767 835.016 59.3883 836.757 59.3883Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />
                                            <path d="M907.708 63.2444C911.579 63.2444 914.717 60.1064 914.717 56.2355C914.717 52.3646 911.579 49.2266 907.708 49.2266C903.837 49.2266 900.699 52.3646 900.699 56.2355C900.699 60.1064 903.837 63.2444 907.708 63.2444Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />
                                            <path d="M907.708 59.3883C909.449 59.3883 910.861 57.9767 910.861 56.2354C910.861 54.4941 909.449 53.0825 907.708 53.0825C905.967 53.0825 904.555 54.4941 904.555 56.2354C904.555 57.9767 905.967 59.3883 907.708 59.3883Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />
                                            <path d="M872.459 44.0095C878.648 44.0095 883.665 38.9928 883.665 32.8043C883.665 26.6159 878.648 21.5991 872.459 21.5991C866.271 21.5991 861.254 26.6159 861.254 32.8043C861.254 38.9928 866.271 44.0095 872.459 44.0095Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />
                                            <path d="M872.459 37.8474C875.245 37.8474 877.502 35.5895 877.502 32.8043C877.502 30.0191 875.245 27.7612 872.459 27.7612C869.674 27.7612 867.416 30.0191 867.416 32.8043C867.416 35.5895 869.674 37.8474 872.459 37.8474Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line" data-prod="slitting-line" data-fac=5 />
                                            <path d="M872.459 77.6326C878.648 77.6326 883.665 72.6158 883.665 66.4274C883.665 60.2389 878.648 55.2222 872.459 55.2222C866.271 55.2222 861.254 60.2389 861.254 66.4274C861.254 72.6158 866.271 77.6326 872.459 77.6326Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-fac=5 />
                                            <path d="M872.459 71.4704C875.245 71.4704 877.502 69.2126 877.502 66.4274C877.502 63.6421 875.245 61.3843 872.459 61.3843C869.674 61.3843 867.416 63.6421 867.416 66.4274C867.416 69.2126 869.674 71.4704 872.459 71.4704Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />
                                            <path d="M884.035 18H860.891C857.421 18 854.616 20.8126 854.616 24.2755V74.6536C854.616 78.124 857.428 80.9291 860.891 80.9291H884.035C887.505 80.9291 890.311 78.1164 890.311 74.6536V24.2755C890.311 20.8051 887.498 18 884.035 18Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />
                                            <path d="M836.757 49.2266H907.708" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 slitting-line " data-prod="slitting-line" data-fac=5 />

                                            <rect x="989.157" y="0.5" width="162.343" height="157.626" fill="white" stroke="#D9D9D9" class="m1 cold-rolled w1" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1035.45 121.18C1034.83 121.18 1034.25 121.07 1033.71 120.85C1033.17 120.63 1032.7 120.305 1032.3 119.875C1031.91 119.445 1031.6 118.915 1031.37 118.285C1031.14 117.655 1031.02 116.935 1031.02 116.125C1031.02 115.325 1031.14 114.61 1031.37 113.98C1031.61 113.34 1031.93 112.8 1032.33 112.36C1032.74 111.92 1033.21 111.585 1033.75 111.355C1034.3 111.125 1034.89 111.01 1035.51 111.01C1036.13 111.01 1036.68 111.135 1037.16 111.385C1037.64 111.635 1038.03 111.925 1038.34 112.255L1037.41 113.38C1037.15 113.12 1036.87 112.915 1036.57 112.765C1036.27 112.605 1035.93 112.525 1035.55 112.525C1035.15 112.525 1034.78 112.61 1034.44 112.78C1034.11 112.94 1033.82 113.175 1033.57 113.485C1033.33 113.785 1033.14 114.155 1033 114.595C1032.87 115.035 1032.81 115.53 1032.81 116.08C1032.81 117.2 1033.05 118.08 1033.53 118.72C1034.02 119.35 1034.68 119.665 1035.51 119.665C1035.95 119.665 1036.34 119.575 1036.68 119.395C1037.02 119.205 1037.33 118.96 1037.61 118.66L1038.54 119.755C1038.14 120.215 1037.68 120.57 1037.16 120.82C1036.65 121.06 1036.08 121.18 1035.45 121.18ZM1043.64 121.18C1043.18 121.18 1042.74 121.095 1042.32 120.925C1041.9 120.755 1041.53 120.505 1041.2 120.175C1040.88 119.845 1040.62 119.44 1040.43 118.96C1040.24 118.48 1040.15 117.935 1040.15 117.325C1040.15 116.715 1040.24 116.17 1040.43 115.69C1040.62 115.21 1040.88 114.805 1041.2 114.475C1041.53 114.145 1041.9 113.895 1042.32 113.725C1042.74 113.545 1043.18 113.455 1043.64 113.455C1044.1 113.455 1044.54 113.545 1044.96 113.725C1045.39 113.895 1045.77 114.145 1046.09 114.475C1046.41 114.805 1046.66 115.21 1046.85 115.69C1047.05 116.17 1047.15 116.715 1047.15 117.325C1047.15 117.935 1047.05 118.48 1046.85 118.96C1046.66 119.44 1046.41 119.845 1046.09 120.175C1045.77 120.505 1045.39 120.755 1044.96 120.925C1044.54 121.095 1044.1 121.18 1043.64 121.18ZM1043.64 119.77C1044.18 119.77 1044.61 119.55 1044.92 119.11C1045.23 118.66 1045.38 118.065 1045.38 117.325C1045.38 116.575 1045.23 115.98 1044.92 115.54C1044.61 115.09 1044.18 114.865 1043.64 114.865C1043.1 114.865 1042.68 115.09 1042.37 115.54C1042.07 115.98 1041.92 116.575 1041.92 117.325C1041.92 118.065 1042.07 118.66 1042.37 119.11C1042.68 119.55 1043.1 119.77 1043.64 119.77ZM1051.14 121.18C1050.52 121.18 1050.08 120.995 1049.83 120.625C1049.58 120.255 1049.46 119.75 1049.46 119.11V110.41H1051.18V119.2C1051.18 119.41 1051.22 119.56 1051.3 119.65C1051.38 119.73 1051.47 119.77 1051.56 119.77C1051.6 119.77 1051.63 119.77 1051.66 119.77C1051.7 119.77 1051.76 119.76 1051.83 119.74L1052.05 121.03C1051.82 121.13 1051.52 121.18 1051.14 121.18ZM1056.71 121.18C1055.78 121.18 1055.04 120.845 1054.49 120.175C1053.95 119.495 1053.68 118.545 1053.68 117.325C1053.68 116.725 1053.76 116.185 1053.93 115.705C1054.11 115.225 1054.35 114.82 1054.64 114.49C1054.93 114.16 1055.26 113.905 1055.63 113.725C1056.01 113.545 1056.4 113.455 1056.8 113.455C1057.22 113.455 1057.57 113.53 1057.86 113.68C1058.15 113.82 1058.44 114.015 1058.73 114.265L1058.67 113.08V110.41H1060.4V121H1058.97L1058.85 120.205H1058.79C1058.52 120.475 1058.21 120.705 1057.85 120.895C1057.49 121.085 1057.11 121.18 1056.71 121.18ZM1057.13 119.755C1057.68 119.755 1058.19 119.48 1058.67 118.93V115.495C1058.41 115.265 1058.16 115.105 1057.91 115.015C1057.67 114.925 1057.42 114.88 1057.17 114.88C1056.69 114.88 1056.29 115.09 1055.96 115.51C1055.63 115.93 1055.46 116.53 1055.46 117.31C1055.46 118.11 1055.6 118.72 1055.88 119.14C1056.17 119.55 1056.59 119.755 1057.13 119.755ZM1062.73 117.85V116.59H1066.3V117.85H1062.73ZM1068.78 121V111.19H1072.1C1072.61 111.19 1073.08 111.24 1073.52 111.34C1073.96 111.44 1074.34 111.605 1074.66 111.835C1074.98 112.055 1075.23 112.35 1075.41 112.72C1075.6 113.09 1075.7 113.55 1075.7 114.1C1075.7 114.85 1075.52 115.455 1075.16 115.915C1074.81 116.375 1074.34 116.705 1073.75 116.905L1076.09 121H1074.14L1072.02 117.16H1070.52V121H1068.78ZM1070.52 115.78H1071.92C1072.59 115.78 1073.1 115.64 1073.45 115.36C1073.81 115.08 1073.99 114.66 1073.99 114.1C1073.99 113.53 1073.81 113.135 1073.45 112.915C1073.1 112.695 1072.59 112.585 1071.92 112.585H1070.52V115.78ZM1080.98 121.18C1080.52 121.18 1080.08 121.095 1079.66 120.925C1079.24 120.755 1078.86 120.505 1078.53 120.175C1078.21 119.845 1077.96 119.44 1077.77 118.96C1077.58 118.48 1077.48 117.935 1077.48 117.325C1077.48 116.715 1077.58 116.17 1077.77 115.69C1077.96 115.21 1078.21 114.805 1078.53 114.475C1078.86 114.145 1079.24 113.895 1079.66 113.725C1080.08 113.545 1080.52 113.455 1080.98 113.455C1081.44 113.455 1081.88 113.545 1082.3 113.725C1082.73 113.895 1083.1 114.145 1083.42 114.475C1083.74 114.805 1084 115.21 1084.19 115.69C1084.39 116.17 1084.49 116.715 1084.49 117.325C1084.49 117.935 1084.39 118.48 1084.19 118.96C1084 119.44 1083.74 119.845 1083.42 120.175C1083.1 120.505 1082.73 120.755 1082.3 120.925C1081.88 121.095 1081.44 121.18 1080.98 121.18ZM1080.98 119.77C1081.52 119.77 1081.94 119.55 1082.25 119.11C1082.56 118.66 1082.72 118.065 1082.72 117.325C1082.72 116.575 1082.56 115.98 1082.25 115.54C1081.94 115.09 1081.52 114.865 1080.98 114.865C1080.44 114.865 1080.01 115.09 1079.7 115.54C1079.4 115.98 1079.25 116.575 1079.25 117.325C1079.25 118.065 1079.4 118.66 1079.7 119.11C1080.01 119.55 1080.44 119.77 1080.98 119.77ZM1088.47 121.18C1087.85 121.18 1087.42 120.995 1087.17 120.625C1086.92 120.255 1086.79 119.75 1086.79 119.11V110.41H1088.52V119.2C1088.52 119.41 1088.56 119.56 1088.64 119.65C1088.72 119.73 1088.8 119.77 1088.89 119.77C1088.93 119.77 1088.97 119.77 1089 119.77C1089.04 119.77 1089.09 119.76 1089.16 119.74L1089.39 121.03C1089.16 121.13 1088.85 121.18 1088.47 121.18ZM1093.15 121.18C1092.53 121.18 1092.09 120.995 1091.84 120.625C1091.59 120.255 1091.47 119.75 1091.47 119.11V110.41H1093.19V119.2C1093.19 119.41 1093.23 119.56 1093.31 119.65C1093.39 119.73 1093.48 119.77 1093.57 119.77C1093.61 119.77 1093.64 119.77 1093.67 119.77C1093.71 119.77 1093.77 119.76 1093.84 119.74L1094.06 121.03C1093.83 121.13 1093.53 121.18 1093.15 121.18ZM1099.29 121.18C1098.78 121.18 1098.3 121.095 1097.86 120.925C1097.42 120.745 1097.04 120.49 1096.71 120.16C1096.38 119.83 1096.12 119.43 1095.93 118.96C1095.75 118.48 1095.66 117.935 1095.66 117.325C1095.66 116.725 1095.75 116.185 1095.94 115.705C1096.13 115.225 1096.38 114.82 1096.69 114.49C1097.01 114.16 1097.38 113.905 1097.79 113.725C1098.2 113.545 1098.62 113.455 1099.05 113.455C1099.55 113.455 1099.99 113.54 1100.37 113.71C1100.75 113.88 1101.06 114.12 1101.31 114.43C1101.57 114.74 1101.77 115.11 1101.9 115.54C1102.03 115.97 1102.09 116.44 1102.09 116.95C1102.09 117.12 1102.08 117.28 1102.06 117.43C1102.05 117.58 1102.04 117.7 1102.02 117.79H1097.34C1097.42 118.45 1097.65 118.96 1098.03 119.32C1098.42 119.67 1098.91 119.845 1099.51 119.845C1099.83 119.845 1100.13 119.8 1100.4 119.71C1100.68 119.61 1100.95 119.475 1101.22 119.305L1101.81 120.385C1101.46 120.615 1101.07 120.805 1100.64 120.955C1100.21 121.105 1099.76 121.18 1099.29 121.18ZM1097.32 116.62H1100.59C1100.59 116.05 1100.47 115.605 1100.22 115.285C1099.98 114.955 1099.6 114.79 1099.09 114.79C1098.65 114.79 1098.27 114.945 1097.94 115.255C1097.61 115.565 1097.4 116.02 1097.32 116.62ZM1106.92 121.18C1105.99 121.18 1105.25 120.845 1104.7 120.175C1104.16 119.495 1103.89 118.545 1103.89 117.325C1103.89 116.725 1103.98 116.185 1104.15 115.705C1104.33 115.225 1104.56 114.82 1104.85 114.49C1105.14 114.16 1105.47 113.905 1105.84 113.725C1106.22 113.545 1106.61 113.455 1107.01 113.455C1107.43 113.455 1107.79 113.53 1108.08 113.68C1108.37 113.82 1108.66 114.015 1108.95 114.265L1108.89 113.08V110.41H1110.61V121H1109.19L1109.07 120.205H1109.01C1108.74 120.475 1108.42 120.705 1108.06 120.895C1107.7 121.085 1107.32 121.18 1106.92 121.18ZM1107.34 119.755C1107.89 119.755 1108.41 119.48 1108.89 118.93V115.495C1108.63 115.265 1108.37 115.105 1108.12 115.015C1107.88 114.925 1107.64 114.88 1107.39 114.88C1106.91 114.88 1106.5 115.09 1106.17 115.51C1105.84 115.93 1105.68 116.53 1105.68 117.31C1105.68 118.11 1105.82 118.72 1106.1 119.14C1106.39 119.55 1106.8 119.755 1107.34 119.755ZM1005.63 138.18C1004.97 138.18 1004.33 138.055 1003.71 137.805C1003.1 137.555 1002.56 137.2 1002.09 136.74L1003.11 135.555C1003.46 135.885 1003.86 136.155 1004.31 136.365C1004.76 136.565 1005.21 136.665 1005.66 136.665C1006.22 136.665 1006.65 136.55 1006.94 136.32C1007.23 136.09 1007.37 135.785 1007.37 135.405C1007.37 135.205 1007.33 135.035 1007.25 134.895C1007.18 134.755 1007.08 134.635 1006.94 134.535C1006.81 134.425 1006.65 134.325 1006.46 134.235C1006.28 134.145 1006.08 134.055 1005.86 133.965L1004.51 133.38C1004.27 133.28 1004.03 133.155 1003.79 133.005C1003.56 132.855 1003.35 132.675 1003.16 132.465C1002.97 132.255 1002.81 132.01 1002.69 131.73C1002.58 131.45 1002.53 131.13 1002.53 130.77C1002.53 130.38 1002.61 130.02 1002.77 129.69C1002.94 129.35 1003.17 129.055 1003.46 128.805C1003.75 128.555 1004.09 128.36 1004.49 128.22C1004.9 128.08 1005.35 128.01 1005.83 128.01C1006.4 128.01 1006.95 128.125 1007.48 128.355C1008.01 128.575 1008.46 128.875 1008.84 129.255L1007.96 130.365C1007.64 130.105 1007.31 129.9 1006.97 129.75C1006.63 129.6 1006.25 129.525 1005.83 129.525C1005.36 129.525 1004.98 129.63 1004.7 129.84C1004.42 130.04 1004.28 130.32 1004.28 130.68C1004.28 130.87 1004.32 131.035 1004.4 131.175C1004.49 131.305 1004.61 131.425 1004.75 131.535C1004.9 131.635 1005.07 131.73 1005.26 131.82C1005.45 131.9 1005.64 131.98 1005.84 132.06L1007.18 132.615C1007.47 132.735 1007.73 132.875 1007.97 133.035C1008.21 133.195 1008.42 133.38 1008.59 133.59C1008.77 133.8 1008.91 134.045 1009.01 134.325C1009.11 134.595 1009.16 134.91 1009.16 135.27C1009.16 135.67 1009.08 136.045 1008.92 136.395C1008.76 136.745 1008.52 137.055 1008.21 137.325C1007.91 137.585 1007.54 137.795 1007.1 137.955C1006.67 138.105 1006.18 138.18 1005.63 138.18ZM1013.59 138.18C1013.16 138.18 1012.79 138.115 1012.49 137.985C1012.2 137.855 1011.96 137.675 1011.77 137.445C1011.59 137.205 1011.46 136.925 1011.37 136.605C1011.29 136.275 1011.25 135.91 1011.25 135.51V132H1010.2V130.71L1011.34 130.635L1011.55 128.625H1012.99V130.635H1014.86V132H1012.99V135.51C1012.99 136.37 1013.33 136.8 1014.02 136.8C1014.15 136.8 1014.28 136.785 1014.41 136.755C1014.55 136.725 1014.68 136.685 1014.79 136.635L1015.09 137.91C1014.89 137.98 1014.66 138.04 1014.4 138.09C1014.15 138.15 1013.88 138.18 1013.59 138.18ZM1018.48 138.18C1017.83 138.18 1017.3 137.985 1016.9 137.595C1016.5 137.195 1016.3 136.67 1016.3 136.02C1016.3 135.63 1016.38 135.285 1016.54 134.985C1016.71 134.675 1016.97 134.41 1017.32 134.19C1017.68 133.97 1018.13 133.785 1018.67 133.635C1019.22 133.485 1019.88 133.37 1020.64 133.29C1020.63 133.1 1020.6 132.92 1020.55 132.75C1020.51 132.57 1020.43 132.415 1020.32 132.285C1020.22 132.145 1020.09 132.04 1019.92 131.97C1019.75 131.89 1019.54 131.85 1019.29 131.85C1018.93 131.85 1018.57 131.92 1018.22 132.06C1017.88 132.2 1017.55 132.37 1017.22 132.57L1016.59 131.415C1017 131.155 1017.46 130.93 1017.97 130.74C1018.48 130.55 1019.03 130.455 1019.62 130.455C1020.54 130.455 1021.22 130.73 1021.67 131.28C1022.13 131.82 1022.36 132.605 1022.36 133.635V138H1020.94L1020.82 137.19H1020.76C1020.43 137.47 1020.07 137.705 1019.69 137.895C1019.32 138.085 1018.92 138.18 1018.48 138.18ZM1019.03 136.83C1019.33 136.83 1019.6 136.76 1019.84 136.62C1020.09 136.48 1020.36 136.28 1020.64 136.02V134.37C1020.14 134.43 1019.72 134.51 1019.38 134.61C1019.04 134.71 1018.76 134.825 1018.55 134.955C1018.34 135.075 1018.19 135.215 1018.1 135.375C1018.01 135.535 1017.97 135.705 1017.97 135.885C1017.97 136.215 1018.07 136.455 1018.27 136.605C1018.47 136.755 1018.72 136.83 1019.03 136.83ZM1025.03 138V130.635H1026.75V138H1025.03ZM1025.9 129.345C1025.59 129.345 1025.33 129.255 1025.13 129.075C1024.93 128.895 1024.83 128.66 1024.83 128.37C1024.83 128.08 1024.93 127.845 1025.13 127.665C1025.33 127.475 1025.59 127.38 1025.9 127.38C1026.21 127.38 1026.46 127.475 1026.66 127.665C1026.86 127.845 1026.96 128.08 1026.96 128.37C1026.96 128.66 1026.86 128.895 1026.66 129.075C1026.46 129.255 1026.21 129.345 1025.9 129.345ZM1029.55 138V130.635H1030.98L1031.1 131.625H1031.16C1031.49 131.305 1031.84 131.03 1032.22 130.8C1032.61 130.57 1033.06 130.455 1033.57 130.455C1034.36 130.455 1034.94 130.71 1035.3 131.22C1035.66 131.72 1035.84 132.44 1035.84 133.38V138H1034.11V133.605C1034.11 132.995 1034.02 132.565 1033.84 132.315C1033.66 132.065 1033.37 131.94 1032.96 131.94C1032.64 131.94 1032.35 132.02 1032.1 132.18C1031.86 132.33 1031.59 132.555 1031.28 132.855V138H1029.55ZM1040.23 138.18C1039.61 138.18 1039.17 137.995 1038.92 137.625C1038.67 137.255 1038.55 136.75 1038.55 136.11V127.41H1040.27V136.2C1040.27 136.41 1040.31 136.56 1040.39 136.65C1040.47 136.73 1040.56 136.77 1040.65 136.77C1040.69 136.77 1040.72 136.77 1040.75 136.77C1040.79 136.77 1040.85 136.76 1040.92 136.74L1041.14 138.03C1040.91 138.13 1040.61 138.18 1040.23 138.18ZM1046.37 138.18C1045.86 138.18 1045.38 138.095 1044.94 137.925C1044.5 137.745 1044.12 137.49 1043.79 137.16C1043.46 136.83 1043.2 136.43 1043.01 135.96C1042.83 135.48 1042.74 134.935 1042.74 134.325C1042.74 133.725 1042.83 133.185 1043.02 132.705C1043.21 132.225 1043.46 131.82 1043.77 131.49C1044.09 131.16 1044.46 130.905 1044.87 130.725C1045.28 130.545 1045.7 130.455 1046.13 130.455C1046.63 130.455 1047.07 130.54 1047.45 130.71C1047.83 130.88 1048.14 131.12 1048.39 131.43C1048.65 131.74 1048.85 132.11 1048.98 132.54C1049.11 132.97 1049.17 133.44 1049.17 133.95C1049.17 134.12 1049.16 134.28 1049.14 134.43C1049.13 134.58 1049.12 134.7 1049.1 134.79H1044.42C1044.5 135.45 1044.73 135.96 1045.11 136.32C1045.5 136.67 1045.99 136.845 1046.59 136.845C1046.91 136.845 1047.21 136.8 1047.48 136.71C1047.76 136.61 1048.03 136.475 1048.3 136.305L1048.89 137.385C1048.54 137.615 1048.15 137.805 1047.72 137.955C1047.29 138.105 1046.84 138.18 1046.37 138.18ZM1044.4 133.62H1047.67C1047.67 133.05 1047.55 132.605 1047.3 132.285C1047.06 131.955 1046.68 131.79 1046.17 131.79C1045.73 131.79 1045.35 131.945 1045.02 132.255C1044.69 132.565 1044.48 133.02 1044.4 133.62ZM1053.48 138.18C1052.97 138.18 1052.46 138.085 1051.96 137.895C1051.47 137.695 1051.05 137.45 1050.69 137.16L1051.5 136.05C1051.83 136.31 1052.15 136.515 1052.47 136.665C1052.8 136.805 1053.16 136.875 1053.54 136.875C1053.94 136.875 1054.23 136.795 1054.42 136.635C1054.61 136.465 1054.71 136.25 1054.71 135.99C1054.71 135.84 1054.66 135.71 1054.57 135.6C1054.48 135.48 1054.36 135.375 1054.21 135.285C1054.06 135.195 1053.89 135.115 1053.7 135.045C1053.51 134.965 1053.32 134.885 1053.13 134.805C1052.89 134.715 1052.65 134.61 1052.4 134.49C1052.15 134.37 1051.92 134.225 1051.72 134.055C1051.53 133.885 1051.37 133.69 1051.24 133.47C1051.12 133.24 1051.06 132.97 1051.06 132.66C1051.06 132.01 1051.3 131.48 1051.78 131.07C1052.26 130.66 1052.92 130.455 1053.75 130.455C1054.26 130.455 1054.72 130.545 1055.13 130.725C1055.54 130.905 1055.89 131.11 1056.19 131.34L1055.4 132.39C1055.14 132.2 1054.87 132.05 1054.6 131.94C1054.34 131.82 1054.07 131.76 1053.78 131.76C1053.41 131.76 1053.13 131.84 1052.95 132C1052.78 132.15 1052.7 132.34 1052.7 132.57C1052.7 132.72 1052.74 132.85 1052.82 132.96C1052.91 133.06 1053.02 133.15 1053.16 133.23C1053.3 133.31 1053.46 133.385 1053.64 133.455C1053.83 133.525 1054.03 133.595 1054.23 133.665C1054.48 133.755 1054.73 133.86 1054.98 133.98C1055.23 134.09 1055.45 134.23 1055.65 134.4C1055.86 134.57 1056.03 134.78 1056.15 135.03C1056.28 135.27 1056.34 135.56 1056.34 135.9C1056.34 136.22 1056.28 136.52 1056.15 136.8C1056.03 137.07 1055.85 137.31 1055.61 137.52C1055.37 137.72 1055.07 137.88 1054.71 138C1054.35 138.12 1053.94 138.18 1053.48 138.18ZM1060.54 138.18C1060.03 138.18 1059.52 138.085 1059.02 137.895C1058.53 137.695 1058.11 137.45 1057.75 137.16L1058.56 136.05C1058.89 136.31 1059.21 136.515 1059.53 136.665C1059.86 136.805 1060.22 136.875 1060.6 136.875C1061 136.875 1061.29 136.795 1061.48 136.635C1061.67 136.465 1061.77 136.25 1061.77 135.99C1061.77 135.84 1061.72 135.71 1061.63 135.6C1061.54 135.48 1061.42 135.375 1061.27 135.285C1061.12 135.195 1060.95 135.115 1060.76 135.045C1060.57 134.965 1060.38 134.885 1060.19 134.805C1059.95 134.715 1059.71 134.61 1059.46 134.49C1059.21 134.37 1058.98 134.225 1058.78 134.055C1058.59 133.885 1058.43 133.69 1058.3 133.47C1058.18 133.24 1058.12 132.97 1058.12 132.66C1058.12 132.01 1058.36 131.48 1058.84 131.07C1059.32 130.66 1059.98 130.455 1060.81 130.455C1061.32 130.455 1061.78 130.545 1062.19 130.725C1062.6 130.905 1062.95 131.11 1063.25 131.34L1062.46 132.39C1062.2 132.2 1061.93 132.05 1061.66 131.94C1061.4 131.82 1061.13 131.76 1060.84 131.76C1060.47 131.76 1060.19 131.84 1060.01 132C1059.84 132.15 1059.76 132.34 1059.76 132.57C1059.76 132.72 1059.8 132.85 1059.88 132.96C1059.97 133.06 1060.08 133.15 1060.22 133.23C1060.36 133.31 1060.52 133.385 1060.7 133.455C1060.89 133.525 1061.09 133.595 1061.29 133.665C1061.54 133.755 1061.79 133.86 1062.04 133.98C1062.29 134.09 1062.51 134.23 1062.71 134.4C1062.92 134.57 1063.09 134.78 1063.21 135.03C1063.34 135.27 1063.4 135.56 1063.4 135.9C1063.4 136.22 1063.34 136.52 1063.21 136.8C1063.09 137.07 1062.91 137.31 1062.67 137.52C1062.43 137.72 1062.13 137.88 1061.77 138C1061.41 138.12 1061 138.18 1060.54 138.18ZM1072.16 138.18C1071.5 138.18 1070.86 138.055 1070.24 137.805C1069.63 137.555 1069.09 137.2 1068.62 136.74L1069.64 135.555C1069.99 135.885 1070.39 136.155 1070.84 136.365C1071.29 136.565 1071.74 136.665 1072.19 136.665C1072.75 136.665 1073.17 136.55 1073.46 136.32C1073.75 136.09 1073.9 135.785 1073.9 135.405C1073.9 135.205 1073.86 135.035 1073.78 134.895C1073.71 134.755 1073.6 134.635 1073.46 134.535C1073.33 134.425 1073.17 134.325 1072.98 134.235C1072.8 134.145 1072.6 134.055 1072.38 133.965L1071.03 133.38C1070.79 133.28 1070.55 133.155 1070.31 133.005C1070.08 132.855 1069.87 132.675 1069.68 132.465C1069.49 132.255 1069.34 132.01 1069.22 131.73C1069.11 131.45 1069.05 131.13 1069.05 130.77C1069.05 130.38 1069.13 130.02 1069.29 129.69C1069.46 129.35 1069.69 129.055 1069.98 128.805C1070.27 128.555 1070.62 128.36 1071.02 128.22C1071.43 128.08 1071.87 128.01 1072.35 128.01C1072.92 128.01 1073.47 128.125 1074 128.355C1074.53 128.575 1074.99 128.875 1075.37 129.255L1074.48 130.365C1074.16 130.105 1073.83 129.9 1073.49 129.75C1073.15 129.6 1072.77 129.525 1072.35 129.525C1071.88 129.525 1071.51 129.63 1071.23 129.84C1070.95 130.04 1070.81 130.32 1070.81 130.68C1070.81 130.87 1070.85 131.035 1070.93 131.175C1071.02 131.305 1071.13 131.425 1071.27 131.535C1071.42 131.635 1071.59 131.73 1071.78 131.82C1071.97 131.9 1072.17 131.98 1072.37 132.06L1073.7 132.615C1073.99 132.735 1074.26 132.875 1074.5 133.035C1074.74 133.195 1074.94 133.38 1075.11 133.59C1075.29 133.8 1075.43 134.045 1075.53 134.325C1075.63 134.595 1075.68 134.91 1075.68 135.27C1075.68 135.67 1075.6 136.045 1075.44 136.395C1075.28 136.745 1075.05 137.055 1074.74 137.325C1074.44 137.585 1074.07 137.795 1073.63 137.955C1073.2 138.105 1072.71 138.18 1072.16 138.18ZM1080.12 138.18C1079.69 138.18 1079.32 138.115 1079.02 137.985C1078.73 137.855 1078.49 137.675 1078.3 137.445C1078.12 137.205 1077.99 136.925 1077.9 136.605C1077.82 136.275 1077.78 135.91 1077.78 135.51V132H1076.73V130.71L1077.87 130.635L1078.08 128.625H1079.52V130.635H1081.39V132H1079.52V135.51C1079.52 136.37 1079.86 136.8 1080.55 136.8C1080.68 136.8 1080.81 136.785 1080.94 136.755C1081.08 136.725 1081.21 136.685 1081.32 136.635L1081.62 137.91C1081.42 137.98 1081.19 138.04 1080.93 138.09C1080.68 138.15 1080.41 138.18 1080.12 138.18ZM1086.46 138.18C1085.95 138.18 1085.47 138.095 1085.03 137.925C1084.59 137.745 1084.21 137.49 1083.88 137.16C1083.55 136.83 1083.29 136.43 1083.1 135.96C1082.92 135.48 1082.83 134.935 1082.83 134.325C1082.83 133.725 1082.92 133.185 1083.11 132.705C1083.3 132.225 1083.55 131.82 1083.86 131.49C1084.18 131.16 1084.55 130.905 1084.96 130.725C1085.37 130.545 1085.79 130.455 1086.22 130.455C1086.72 130.455 1087.16 130.54 1087.54 130.71C1087.92 130.88 1088.23 131.12 1088.48 131.43C1088.74 131.74 1088.94 132.11 1089.07 132.54C1089.2 132.97 1089.26 133.44 1089.26 133.95C1089.26 134.12 1089.25 134.28 1089.23 134.43C1089.22 134.58 1089.21 134.7 1089.19 134.79H1084.51C1084.59 135.45 1084.82 135.96 1085.2 136.32C1085.59 136.67 1086.08 136.845 1086.68 136.845C1087 136.845 1087.3 136.8 1087.57 136.71C1087.85 136.61 1088.12 136.475 1088.39 136.305L1088.98 137.385C1088.63 137.615 1088.24 137.805 1087.81 137.955C1087.38 138.105 1086.93 138.18 1086.46 138.18ZM1084.49 133.62H1087.76C1087.76 133.05 1087.64 132.605 1087.39 132.285C1087.15 131.955 1086.77 131.79 1086.26 131.79C1085.82 131.79 1085.44 131.945 1085.11 132.255C1084.78 132.565 1084.57 133.02 1084.49 133.62ZM1094.66 138.18C1094.15 138.18 1093.67 138.095 1093.23 137.925C1092.79 137.745 1092.41 137.49 1092.08 137.16C1091.75 136.83 1091.49 136.43 1091.3 135.96C1091.12 135.48 1091.03 134.935 1091.03 134.325C1091.03 133.725 1091.12 133.185 1091.31 132.705C1091.5 132.225 1091.75 131.82 1092.06 131.49C1092.38 131.16 1092.75 130.905 1093.16 130.725C1093.57 130.545 1093.99 130.455 1094.42 130.455C1094.92 130.455 1095.36 130.54 1095.74 130.71C1096.12 130.88 1096.43 131.12 1096.68 131.43C1096.94 131.74 1097.14 132.11 1097.27 132.54C1097.4 132.97 1097.46 133.44 1097.46 133.95C1097.46 134.12 1097.45 134.28 1097.43 134.43C1097.42 134.58 1097.41 134.7 1097.39 134.79H1092.71C1092.79 135.45 1093.02 135.96 1093.4 136.32C1093.79 136.67 1094.28 136.845 1094.88 136.845C1095.2 136.845 1095.5 136.8 1095.77 136.71C1096.05 136.61 1096.32 136.475 1096.59 136.305L1097.18 137.385C1096.83 137.615 1096.44 137.805 1096.01 137.955C1095.58 138.105 1095.13 138.18 1094.66 138.18ZM1092.69 133.62H1095.96C1095.96 133.05 1095.84 132.605 1095.59 132.285C1095.35 131.955 1094.97 131.79 1094.46 131.79C1094.02 131.79 1093.64 131.945 1093.31 132.255C1092.98 132.565 1092.77 133.02 1092.69 133.62ZM1101.39 138.18C1100.77 138.18 1100.34 137.995 1100.09 137.625C1099.84 137.255 1099.71 136.75 1099.71 136.11V127.41H1101.44V136.2C1101.44 136.41 1101.48 136.56 1101.56 136.65C1101.64 136.73 1101.72 136.77 1101.81 136.77C1101.85 136.77 1101.89 136.77 1101.92 136.77C1101.96 136.77 1102.01 136.76 1102.08 136.74L1102.31 138.03C1102.08 138.13 1101.77 138.18 1101.39 138.18ZM1111 138.18C1110.34 138.18 1109.7 138.055 1109.08 137.805C1108.47 137.555 1107.93 137.2 1107.46 136.74L1108.48 135.555C1108.83 135.885 1109.23 136.155 1109.68 136.365C1110.13 136.565 1110.58 136.665 1111.03 136.665C1111.59 136.665 1112.02 136.55 1112.31 136.32C1112.6 136.09 1112.74 135.785 1112.74 135.405C1112.74 135.205 1112.7 135.035 1112.62 134.895C1112.55 134.755 1112.45 134.635 1112.31 134.535C1112.18 134.425 1112.02 134.325 1111.83 134.235C1111.65 134.145 1111.45 134.055 1111.23 133.965L1109.88 133.38C1109.64 133.28 1109.4 133.155 1109.16 133.005C1108.93 132.855 1108.72 132.675 1108.53 132.465C1108.34 132.255 1108.18 132.01 1108.06 131.73C1107.95 131.45 1107.9 131.13 1107.9 130.77C1107.9 130.38 1107.98 130.02 1108.14 129.69C1108.31 129.35 1108.54 129.055 1108.83 128.805C1109.12 128.555 1109.46 128.36 1109.86 128.22C1110.27 128.08 1110.72 128.01 1111.2 128.01C1111.77 128.01 1112.32 128.125 1112.85 128.355C1113.38 128.575 1113.83 128.875 1114.21 129.255L1113.33 130.365C1113.01 130.105 1112.68 129.9 1112.34 129.75C1112 129.6 1111.62 129.525 1111.2 129.525C1110.73 129.525 1110.35 129.63 1110.07 129.84C1109.79 130.04 1109.65 130.32 1109.65 130.68C1109.65 130.87 1109.69 131.035 1109.77 131.175C1109.86 131.305 1109.98 131.425 1110.12 131.535C1110.27 131.635 1110.44 131.73 1110.63 131.82C1110.82 131.9 1111.01 131.98 1111.21 132.06L1112.55 132.615C1112.84 132.735 1113.1 132.875 1113.34 133.035C1113.58 133.195 1113.79 133.38 1113.96 133.59C1114.14 133.8 1114.28 134.045 1114.38 134.325C1114.48 134.595 1114.53 134.91 1114.53 135.27C1114.53 135.67 1114.45 136.045 1114.29 136.395C1114.13 136.745 1113.89 137.055 1113.58 137.325C1113.28 137.585 1112.91 137.795 1112.47 137.955C1112.04 138.105 1111.55 138.18 1111 138.18ZM1118.96 138.18C1118.53 138.18 1118.17 138.115 1117.87 137.985C1117.58 137.855 1117.34 137.675 1117.15 137.445C1116.97 137.205 1116.83 136.925 1116.74 136.605C1116.66 136.275 1116.62 135.91 1116.62 135.51V132H1115.57V130.71L1116.71 130.635L1116.92 128.625H1118.36V130.635H1120.24V132H1118.36V135.51C1118.36 136.37 1118.71 136.8 1119.4 136.8C1119.53 136.8 1119.66 136.785 1119.79 136.755C1119.93 136.725 1120.05 136.685 1120.16 136.635L1120.46 137.91C1120.26 137.98 1120.03 138.04 1119.77 138.09C1119.52 138.15 1119.25 138.18 1118.96 138.18ZM1122.39 138V130.635H1123.81L1123.93 131.94H1123.99C1124.25 131.46 1124.57 131.095 1124.94 130.845C1125.31 130.585 1125.69 130.455 1126.08 130.455C1126.43 130.455 1126.71 130.505 1126.92 130.605L1126.62 132.105C1126.49 132.065 1126.37 132.035 1126.26 132.015C1126.15 131.995 1126.01 131.985 1125.85 131.985C1125.56 131.985 1125.26 132.1 1124.94 132.33C1124.62 132.55 1124.34 132.94 1124.11 133.5V138H1122.39ZM1128.58 138V130.635H1130.31V138H1128.58ZM1129.45 129.345C1129.14 129.345 1128.89 129.255 1128.69 129.075C1128.49 128.895 1128.39 128.66 1128.39 128.37C1128.39 128.08 1128.49 127.845 1128.69 127.665C1128.89 127.475 1129.14 127.38 1129.45 127.38C1129.76 127.38 1130.02 127.475 1130.22 127.665C1130.42 127.845 1130.52 128.08 1130.52 128.37C1130.52 128.66 1130.42 128.895 1130.22 129.075C1130.02 129.255 1129.76 129.345 1129.45 129.345ZM1133.11 140.91V130.635H1134.53L1134.65 131.415H1134.71C1135.02 131.155 1135.37 130.93 1135.75 130.74C1136.13 130.55 1136.52 130.455 1136.93 130.455C1137.39 130.455 1137.8 130.545 1138.15 130.725C1138.51 130.895 1138.81 131.145 1139.06 131.475C1139.31 131.805 1139.5 132.2 1139.63 132.66C1139.76 133.12 1139.83 133.635 1139.83 134.205C1139.83 134.835 1139.74 135.4 1139.56 135.9C1139.39 136.39 1139.16 136.805 1138.87 137.145C1138.58 137.475 1138.24 137.73 1137.86 137.91C1137.48 138.09 1137.09 138.18 1136.68 138.18C1136.36 138.18 1136.04 138.11 1135.72 137.97C1135.4 137.83 1135.09 137.63 1134.79 137.37L1134.83 138.6V140.91H1133.11ZM1136.32 136.755C1136.81 136.755 1137.22 136.545 1137.55 136.125C1137.88 135.695 1138.04 135.06 1138.04 134.22C1138.04 133.48 1137.92 132.905 1137.67 132.495C1137.42 132.085 1137.01 131.88 1136.45 131.88C1135.93 131.88 1135.39 132.155 1134.83 132.705V136.14C1135.1 136.37 1135.36 136.53 1135.61 136.62C1135.86 136.71 1136.1 136.755 1136.32 136.755Z" fill="#848484" class="m1 caption-cold-rolled" data-prod="cold-rolled" data-fac=6 />

                                            <path d="M1070.44 77.4849C1086.94 77.4849 1100.33 64.1035 1100.33 47.5967C1100.33 31.0899 1086.94 17.7085 1070.44 17.7085C1053.93 17.7085 1040.55 31.0899 1040.55 47.5967C1040.55 64.1035 1053.93 77.4849 1070.44 77.4849Z" fill="white" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 cold-rolled p1" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1070.44 56.8763C1075.56 56.8763 1079.72 52.7216 1079.72 47.5966C1079.72 42.4716 1075.56 38.3169 1070.44 38.3169C1065.31 38.3169 1061.16 42.4716 1061.16 47.5966C1061.16 52.7216 1065.31 56.8763 1070.44 56.8763Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 cold-rolled inside" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1070.44 53.9326C1073.94 53.9326 1076.77 51.0955 1076.77 47.5957C1076.77 44.0959 1073.94 41.2588 1070.44 41.2588C1066.94 41.2588 1064.1 44.0959 1064.1 47.5957C1064.1 51.0955 1066.94 53.9326 1070.44 53.9326Z" fill="#FFAF08" class="m1 cold-rolled" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1070.44 60.6581C1077.65 60.6581 1083.5 54.8101 1083.5 47.5962C1083.5 40.3823 1077.65 34.5342 1070.44 34.5342C1063.22 34.5342 1057.38 40.3823 1057.38 47.5962C1057.38 54.8101 1063.22 60.6581 1070.44 60.6581Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 cold-rolled inside" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1070.44 64.0889C1079.55 64.0889 1086.93 56.7051 1086.93 47.5967C1086.93 38.4883 1079.55 31.1045 1070.44 31.1045C1061.33 31.1045 1053.95 38.4883 1053.95 47.5967C1053.95 56.7051 1061.33 64.0889 1070.44 64.0889Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 cold-rolled inside" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1070.44 73.5943C1084.8 73.5943 1096.44 61.9548 1096.44 47.5967C1096.44 33.2387 1084.8 21.5991 1070.44 21.5991C1056.08 21.5991 1044.44 33.2387 1044.44 47.5967C1044.44 61.9548 1056.08 73.5943 1070.44 73.5943Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 cold-rolled inside" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1070.44 69.0985C1082.31 69.0985 1091.94 59.4717 1091.94 47.5964C1091.94 35.7211 1082.31 26.0942 1070.44 26.0942C1058.56 26.0942 1048.94 35.7211 1048.94 47.5964C1048.94 59.4717 1058.56 69.0985 1070.44 69.0985Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 cold-rolled inside" data-prod="cold-rolled" data-fac=6 />
                                            <path d="M1056.66 74.1176C1056.66 74.1176 1077.63 88.1455 1106.83 67.0405" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 cold-rolled inside" data-prod="cold-rolled" data-fac=6 />

                                            <g id="svg-tension" data-fac=6 data-prod="tension">

                                            </g>
                                            <rect x="395.5" y="193.5" width="360" height="198" fill="white" stroke="#D9D9D9" class="m1 tension w1" data-prod="tension" data-fac=4 />

                                            <path d="M467.322 219H430.829V241.393H467.322V219Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M520.402 219H483.08V241.393H520.402V219Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M597.534 219H542.795V241.393H597.534V219Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M709.5 219H640.662V241.393H709.5V219Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M697.059 302.767H653.102V325.99H697.059V302.767Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M467.322 302.767H430.829V325.99H467.322V302.767Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M520.402 302.767H483.08V325.99H520.402V302.767Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M597.534 302.767H542.795V325.99H597.534V302.767Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M439.228 288.483C443.786 288.483 447.482 284.788 447.482 280.229C447.482 275.671 443.786 271.975 439.228 271.975C434.669 271.975 430.974 275.671 430.974 280.229C430.974 284.788 434.669 288.483 439.228 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M439.228 271.975V288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M430.974 280.229H447.482" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M459.326 288.483C463.885 288.483 467.581 284.788 467.581 280.229C467.581 275.671 463.885 271.975 459.326 271.975C454.768 271.975 451.072 275.671 451.072 280.229C451.072 284.788 454.768 288.483 459.326 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M459.268 271.975L459.391 288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M451.072 280.293L467.581 280.171" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M449.277 271.532C453.836 271.532 457.531 267.837 457.531 263.278C457.531 258.719 453.836 255.024 449.277 255.024C444.718 255.024 441.023 258.719 441.023 263.278C441.023 267.837 444.718 271.532 449.277 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M449.277 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M441.023 263.278H457.531" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M507.038 271.532C511.597 271.532 515.292 267.837 515.292 263.278C515.292 258.719 511.597 255.024 507.038 255.024C502.479 255.024 498.784 258.719 498.784 263.278C498.784 267.837 502.479 271.532 507.038 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M507.038 271.532V255.024" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M515.292 263.278H498.784" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M486.939 271.532C491.498 271.532 495.193 267.837 495.193 263.278C495.193 258.719 491.498 255.024 486.939 255.024C482.381 255.024 478.685 258.719 478.685 263.278C478.685 267.837 482.381 271.532 486.939 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M486.997 271.532L486.875 255.024" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M495.193 263.22L478.685 263.342" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M496.989 288.483C501.547 288.483 505.243 284.788 505.243 280.229C505.243 275.671 501.547 271.975 496.989 271.975C492.43 271.975 488.734 275.671 488.734 280.229C488.734 284.788 492.43 288.483 496.989 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M496.989 288.483V271.975" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M505.243 280.229H488.734" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M543.919 288.483C548.478 288.483 552.173 284.788 552.173 280.229C552.173 275.671 548.478 271.975 543.919 271.975C539.36 271.975 535.665 275.671 535.665 280.229C535.665 284.788 539.36 288.483 543.919 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M543.919 271.975V288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M535.665 280.229H552.173" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M564.018 288.483C568.576 288.483 572.272 284.788 572.272 280.229C572.272 275.671 568.576 271.975 564.018 271.975C559.459 271.975 555.764 275.671 555.764 280.229C555.764 284.788 559.459 288.483 564.018 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M563.96 271.975L564.082 288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M555.764 280.293L572.272 280.171" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M553.968 271.532C558.527 271.532 562.222 267.837 562.222 263.278C562.222 258.719 558.527 255.024 553.968 255.024C549.41 255.024 545.714 258.719 545.714 263.278C545.714 267.837 549.41 271.532 553.968 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M553.968 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M545.714 263.278H562.222" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M533.1 271.532C537.659 271.532 541.354 267.837 541.354 263.278C541.354 258.719 537.659 255.024 533.1 255.024C528.542 255.024 524.846 258.719 524.846 263.278C524.846 267.837 528.542 271.532 533.1 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M533.1 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M524.852 263.278H541.354" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M586.052 288.483C590.611 288.483 594.306 284.788 594.306 280.229C594.306 275.671 590.611 271.975 586.052 271.975C581.494 271.975 577.798 275.671 577.798 280.229C577.798 284.788 581.494 288.483 586.052 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M586.052 271.975V288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M577.798 280.229H594.306" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M606.151 288.483C610.71 288.483 614.405 284.788 614.405 280.229C614.405 275.671 610.71 271.975 606.151 271.975C601.592 271.975 597.897 275.671 597.897 280.229C597.897 284.788 601.592 288.483 606.151 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M606.087 271.975L606.209 288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M597.897 280.293L614.405 280.171" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M596.102 271.532C600.66 271.532 604.356 267.837 604.356 263.278C604.356 258.719 600.66 255.024 596.102 255.024C591.543 255.024 587.848 258.719 587.848 263.278C587.848 267.837 591.543 271.532 596.102 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M596.102 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M587.848 263.278H604.356" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M575.233 271.532C579.792 271.532 583.487 267.837 583.487 263.278C583.487 258.719 579.792 255.024 575.233 255.024C570.675 255.024 566.979 258.719 566.979 263.278C566.979 267.837 570.675 271.532 575.233 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M575.233 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M566.979 263.278H583.487" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M699.627 288.483C704.186 288.483 707.881 284.788 707.881 280.229C707.881 275.671 704.186 271.975 699.627 271.975C695.069 271.975 691.373 275.671 691.373 280.229C691.373 284.788 695.069 288.483 699.627 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M699.627 271.975V288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M707.881 280.229H691.373" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M679.528 288.483C684.087 288.483 687.782 284.788 687.782 280.229C687.782 275.671 684.087 271.975 679.528 271.975C674.97 271.975 671.274 275.671 671.274 280.229C671.274 284.788 674.97 288.483 679.528 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M679.587 271.975L679.464 288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M687.782 280.293L671.274 280.171" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M689.578 271.532C694.136 271.532 697.832 267.837 697.832 263.278C697.832 258.719 694.136 255.024 689.578 255.024C685.019 255.024 681.324 258.719 681.324 263.278C681.324 267.837 685.019 271.532 689.578 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M689.578 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M697.832 263.278H681.324" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M657.494 288.483C662.053 288.483 665.748 284.788 665.748 280.229C665.748 275.671 662.053 271.975 657.494 271.975C652.935 271.975 649.24 275.671 649.24 280.229C649.24 284.788 652.935 288.483 657.494 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M657.494 271.975V288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M665.748 280.229H649.24" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M637.395 288.483C641.954 288.483 645.649 284.788 645.649 280.229C645.649 275.671 641.954 271.975 637.395 271.975C632.837 271.975 629.141 275.671 629.141 280.229C629.141 284.788 632.837 288.483 637.395 288.483Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M637.459 271.975L637.337 288.483" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M645.649 280.293L629.141 280.171" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M647.445 271.532C652.003 271.532 655.699 267.837 655.699 263.278C655.699 258.719 652.003 255.024 647.445 255.024C642.886 255.024 639.191 258.719 639.191 263.278C639.191 267.837 642.886 271.532 647.445 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M647.445 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M655.699 263.278H639.191" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M668.313 271.532C672.872 271.532 676.567 267.837 676.567 263.278C676.567 258.719 672.872 255.024 668.313 255.024C663.754 255.024 660.059 258.719 660.059 263.278C660.059 267.837 663.754 271.532 668.313 271.532Z" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M668.313 255.024V271.532" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M676.567 263.278H660.059" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M625.733 282.033C625.733 282.033 628.746 348.764 668.4 349.933C668.4 349.933 711.563 355.766 715.306 282.033" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M618.269 286.18C618.269 286.18 621.812 363.495 668.442 364.844C668.442 364.844 719.199 371.6 723.599 286.18" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M712.817 321.843L725.258 330.966" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M707.841 313.549L711.234 298.62L723.599 308.573L707.841 313.549Z" fill="#FFAF08" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M716.135 306.76L734 311.738" stroke="#FFAF08" stroke-width="2" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M430 268.542H436.277C439.372 268.542 441.231 269.407 443.807 271.035L446.104 272.304C447.969 273.478 449.268 273.229 451.238 272.431C451.466 272.337 451.693 272.237 451.915 272.127L457.836 269.218C458.104 269.085 458.378 268.958 458.658 268.853C461.222 267.878 463.612 267.85 466.258 268.792L479.407 272.67C481.761 273.362 484.297 273.257 486.581 272.365L491.903 270.287C494.444 269.296 497.294 269.279 499.847 270.243L507.237 273.03C508.484 273.501 509.813 273.739 511.148 273.739H527.205C528.464 273.739 529.717 273.523 530.9 273.107L538.809 270.315C541.479 269.373 544.439 269.49 547.021 270.642L549.149 271.595C552.174 272.947 555.688 272.863 558.637 271.379L559.226 271.08C562.257 269.551 565.882 269.506 568.947 270.969L570.183 271.556C573.086 272.935 576.489 272.98 579.427 271.672L581.263 270.858C584.264 269.523 587.744 269.601 590.681 271.058L591.072 271.251C594.202 272.808 597.938 272.786 601.044 271.185L603.824 269.756C605.375 268.958 607.111 268.542 608.872 268.542H634.615C636.381 268.542 638.112 268.958 639.663 269.756L642.297 271.107C645.485 272.747 649.326 272.725 652.497 271.058C655.597 269.423 659.357 269.368 662.504 270.913L663.512 271.407C666.508 272.875 670.057 272.902 673.076 271.484L674.545 270.792C677.675 269.318 681.37 269.407 684.424 271.024L684.582 271.107C687.676 272.753 691.43 272.814 694.589 271.279L699.187 269.041C700.685 268.315 702.341 267.933 704.019 267.933H719.452" stroke="#FFAF08" stroke-width="6" stroke-miterlimit="10" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M718.294 261.416L730.082 269.476L718.294 275.415V261.416Z" fill="#FFAF08" stroke="#FFAF08" class="m1 tension" data-prod="tension" data-fac=4 />
                                            <path d="M428.44 365V356.104H425.416V354.536H433.32V356.104H430.296V365H428.44ZM437.762 365.192C437.218 365.192 436.711 365.101 436.242 364.92C435.772 364.728 435.362 364.456 435.01 364.104C434.658 363.752 434.38 363.325 434.178 362.824C433.986 362.312 433.89 361.731 433.89 361.08C433.89 360.44 433.991 359.864 434.194 359.352C434.396 358.84 434.663 358.408 434.994 358.056C435.335 357.704 435.724 357.432 436.162 357.24C436.599 357.048 437.047 356.952 437.506 356.952C438.039 356.952 438.508 357.043 438.914 357.224C439.319 357.405 439.655 357.661 439.922 357.992C440.199 358.323 440.407 358.717 440.546 359.176C440.684 359.635 440.754 360.136 440.754 360.68C440.754 360.861 440.743 361.032 440.722 361.192C440.711 361.352 440.695 361.48 440.674 361.576H435.682C435.767 362.28 436.012 362.824 436.418 363.208C436.834 363.581 437.362 363.768 438.002 363.768C438.343 363.768 438.658 363.72 438.946 363.624C439.244 363.517 439.538 363.373 439.826 363.192L440.45 364.344C440.076 364.589 439.66 364.792 439.202 364.952C438.743 365.112 438.263 365.192 437.762 365.192ZM435.666 360.328H439.154C439.154 359.72 439.02 359.245 438.754 358.904C438.498 358.552 438.098 358.376 437.554 358.376C437.084 358.376 436.674 358.541 436.322 358.872C435.97 359.203 435.751 359.688 435.666 360.328ZM443.151 365V357.144H444.671L444.799 358.2H444.863C445.215 357.859 445.594 357.565 445.999 357.32C446.415 357.075 446.895 356.952 447.439 356.952C448.282 356.952 448.895 357.224 449.279 357.768C449.663 358.301 449.855 359.069 449.855 360.072V365H448.015V360.312C448.015 359.661 447.919 359.203 447.727 358.936C447.535 358.669 447.22 358.536 446.783 358.536C446.442 358.536 446.138 358.621 445.871 358.792C445.615 358.952 445.322 359.192 444.991 359.512V365H443.151ZM454.936 365.192C454.392 365.192 453.854 365.091 453.32 364.888C452.798 364.675 452.344 364.413 451.96 364.104L452.824 362.92C453.176 363.197 453.523 363.416 453.864 363.576C454.216 363.725 454.595 363.8 455 363.8C455.427 363.8 455.742 363.715 455.944 363.544C456.147 363.363 456.248 363.133 456.248 362.856C456.248 362.696 456.2 362.557 456.104 362.44C456.008 362.312 455.88 362.2 455.72 362.104C455.56 362.008 455.379 361.923 455.176 361.848C454.974 361.763 454.771 361.677 454.568 361.592C454.312 361.496 454.051 361.384 453.784 361.256C453.518 361.128 453.278 360.973 453.064 360.792C452.862 360.611 452.691 360.403 452.552 360.168C452.424 359.923 452.36 359.635 452.36 359.304C452.36 358.611 452.616 358.045 453.128 357.608C453.64 357.171 454.339 356.952 455.224 356.952C455.768 356.952 456.259 357.048 456.696 357.24C457.134 357.432 457.512 357.651 457.832 357.896L456.984 359.016C456.707 358.813 456.424 358.653 456.136 358.536C455.859 358.408 455.566 358.344 455.256 358.344C454.862 358.344 454.568 358.429 454.376 358.6C454.195 358.76 454.104 358.963 454.104 359.208C454.104 359.368 454.147 359.507 454.232 359.624C454.328 359.731 454.451 359.827 454.6 359.912C454.75 359.997 454.92 360.077 455.112 360.152C455.315 360.227 455.523 360.301 455.736 360.376C456.003 360.472 456.27 360.584 456.536 360.712C456.803 360.829 457.043 360.979 457.256 361.16C457.48 361.341 457.656 361.565 457.784 361.832C457.923 362.088 457.992 362.397 457.992 362.76C457.992 363.101 457.923 363.421 457.784 363.72C457.656 364.008 457.464 364.264 457.208 364.488C456.952 364.701 456.632 364.872 456.248 365C455.864 365.128 455.427 365.192 454.936 365.192ZM460.275 365V357.144H462.115V365H460.275ZM461.203 355.768C460.872 355.768 460.6 355.672 460.387 355.48C460.174 355.288 460.067 355.037 460.067 354.728C460.067 354.419 460.174 354.168 460.387 353.976C460.6 353.773 460.872 353.672 461.203 353.672C461.534 353.672 461.806 353.773 462.019 353.976C462.232 354.168 462.339 354.419 462.339 354.728C462.339 355.037 462.232 355.288 462.019 355.48C461.806 355.672 461.534 355.768 461.203 355.768ZM468.318 365.192C467.828 365.192 467.358 365.101 466.91 364.92C466.462 364.739 466.062 364.472 465.71 364.12C465.369 363.768 465.097 363.336 464.894 362.824C464.692 362.312 464.59 361.731 464.59 361.08C464.59 360.429 464.692 359.848 464.894 359.336C465.097 358.824 465.369 358.392 465.71 358.04C466.062 357.688 466.462 357.421 466.91 357.24C467.358 357.048 467.828 356.952 468.318 356.952C468.809 356.952 469.278 357.048 469.726 357.24C470.185 357.421 470.585 357.688 470.926 358.04C471.268 358.392 471.54 358.824 471.742 359.336C471.956 359.848 472.062 360.429 472.062 361.08C472.062 361.731 471.956 362.312 471.742 362.824C471.54 363.336 471.268 363.768 470.926 364.12C470.585 364.472 470.185 364.739 469.726 364.92C469.278 365.101 468.809 365.192 468.318 365.192ZM468.318 363.688C468.894 363.688 469.348 363.453 469.678 362.984C470.009 362.504 470.174 361.869 470.174 361.08C470.174 360.28 470.009 359.645 469.678 359.176C469.348 358.696 468.894 358.456 468.318 358.456C467.742 358.456 467.289 358.696 466.958 359.176C466.638 359.645 466.478 360.28 466.478 361.08C466.478 361.869 466.638 362.504 466.958 362.984C467.289 363.453 467.742 363.688 468.318 363.688ZM474.524 365V357.144H476.044L476.172 358.2H476.236C476.588 357.859 476.966 357.565 477.372 357.32C477.788 357.075 478.268 356.952 478.812 356.952C479.654 356.952 480.268 357.224 480.652 357.768C481.036 358.301 481.228 359.069 481.228 360.072V365H479.388V360.312C479.388 359.661 479.292 359.203 479.1 358.936C478.908 358.669 478.593 358.536 478.156 358.536C477.814 358.536 477.51 358.621 477.244 358.792C476.988 358.952 476.694 359.192 476.364 359.512V365H474.524ZM488.12 365V354.536H489.976V363.432H494.328V365H488.12ZM499.788 365.192C499.244 365.192 498.737 365.101 498.268 364.92C497.799 364.728 497.388 364.456 497.036 364.104C496.684 363.752 496.407 363.325 496.204 362.824C496.012 362.312 495.916 361.731 495.916 361.08C495.916 360.44 496.017 359.864 496.22 359.352C496.423 358.84 496.689 358.408 497.02 358.056C497.361 357.704 497.751 357.432 498.188 357.24C498.625 357.048 499.073 356.952 499.532 356.952C500.065 356.952 500.535 357.043 500.94 357.224C501.345 357.405 501.681 357.661 501.948 357.992C502.225 358.323 502.433 358.717 502.572 359.176C502.711 359.635 502.78 360.136 502.78 360.68C502.78 360.861 502.769 361.032 502.748 361.192C502.737 361.352 502.721 361.48 502.7 361.576H497.708C497.793 362.28 498.039 362.824 498.444 363.208C498.86 363.581 499.388 363.768 500.028 363.768C500.369 363.768 500.684 363.72 500.972 363.624C501.271 363.517 501.564 363.373 501.852 363.192L502.476 364.344C502.103 364.589 501.687 364.792 501.228 364.952C500.769 365.112 500.289 365.192 499.788 365.192ZM497.692 360.328H501.18C501.18 359.72 501.047 359.245 500.78 358.904C500.524 358.552 500.124 358.376 499.58 358.376C499.111 358.376 498.7 358.541 498.348 358.872C497.996 359.203 497.777 359.688 497.692 360.328ZM506.937 365L504.201 357.144H506.073L507.321 361.224C507.428 361.608 507.535 361.997 507.641 362.392C507.759 362.787 507.871 363.187 507.977 363.592H508.041C508.159 363.187 508.271 362.787 508.377 362.392C508.484 361.997 508.596 361.608 508.713 361.224L509.961 357.144H511.737L509.065 365H506.937ZM517.006 365.192C516.462 365.192 515.955 365.101 515.486 364.92C515.016 364.728 514.606 364.456 514.254 364.104C513.902 363.752 513.624 363.325 513.422 362.824C513.23 362.312 513.134 361.731 513.134 361.08C513.134 360.44 513.235 359.864 513.438 359.352C513.64 358.84 513.907 358.408 514.238 358.056C514.579 357.704 514.968 357.432 515.406 357.24C515.843 357.048 516.291 356.952 516.75 356.952C517.283 356.952 517.752 357.043 518.158 357.224C518.563 357.405 518.899 357.661 519.166 357.992C519.443 358.323 519.651 358.717 519.79 359.176C519.928 359.635 519.998 360.136 519.998 360.68C519.998 360.861 519.987 361.032 519.966 361.192C519.955 361.352 519.939 361.48 519.918 361.576H514.926C515.011 362.28 515.256 362.824 515.662 363.208C516.078 363.581 516.606 363.768 517.246 363.768C517.587 363.768 517.902 363.72 518.19 363.624C518.488 363.517 518.782 363.373 519.07 363.192L519.694 364.344C519.32 364.589 518.904 364.792 518.446 364.952C517.987 365.112 517.507 365.192 517.006 365.192ZM514.91 360.328H518.398C518.398 359.72 518.264 359.245 517.998 358.904C517.742 358.552 517.342 358.376 516.798 358.376C516.328 358.376 515.918 358.541 515.566 358.872C515.214 359.203 514.995 359.688 514.91 360.328ZM524.187 365.192C523.526 365.192 523.062 364.995 522.795 364.6C522.528 364.205 522.395 363.667 522.395 362.984V353.704H524.235V363.08C524.235 363.304 524.278 363.464 524.363 363.56C524.448 363.645 524.539 363.688 524.635 363.688C524.678 363.688 524.715 363.688 524.747 363.688C524.79 363.688 524.848 363.677 524.923 363.656L525.163 365.032C524.918 365.139 524.592 365.192 524.187 365.192ZM527.379 365V357.144H529.219V365H527.379ZM528.307 355.768C527.976 355.768 527.704 355.672 527.491 355.48C527.277 355.288 527.171 355.037 527.171 354.728C527.171 354.419 527.277 354.168 527.491 353.976C527.704 353.773 527.976 353.672 528.307 353.672C528.637 353.672 528.909 353.773 529.123 353.976C529.336 354.168 529.443 354.419 529.443 354.728C529.443 355.037 529.336 355.288 529.123 355.48C528.909 355.672 528.637 355.768 528.307 355.768ZM532.206 365V357.144H533.726L533.854 358.2H533.918C534.27 357.859 534.649 357.565 535.054 357.32C535.47 357.075 535.95 356.952 536.494 356.952C537.337 356.952 537.95 357.224 538.334 357.768C538.718 358.301 538.91 359.069 538.91 360.072V365H537.07V360.312C537.07 359.661 536.974 359.203 536.782 358.936C536.59 358.669 536.275 358.536 535.838 358.536C535.497 358.536 535.193 358.621 534.926 358.792C534.67 358.952 534.377 359.192 534.046 359.512V365H532.206ZM544.535 368.472C544.066 368.472 543.629 368.429 543.223 368.344C542.829 368.259 542.487 368.131 542.199 367.96C541.911 367.789 541.682 367.576 541.511 367.32C541.351 367.064 541.271 366.765 541.271 366.424C541.271 366.093 541.367 365.784 541.559 365.496C541.751 365.219 542.029 364.968 542.391 364.744V364.68C542.189 364.552 542.018 364.381 541.879 364.168C541.751 363.955 541.687 363.688 541.687 363.368C541.687 363.059 541.773 362.781 541.943 362.536C542.125 362.28 542.327 362.072 542.551 361.912V361.848C542.285 361.645 542.045 361.368 541.831 361.016C541.629 360.653 541.527 360.237 541.527 359.768C541.527 359.32 541.613 358.92 541.783 358.568C541.954 358.216 542.178 357.923 542.455 357.688C542.743 357.443 543.074 357.261 543.447 357.144C543.821 357.016 544.215 356.952 544.631 356.952C544.845 356.952 545.047 356.973 545.239 357.016C545.442 357.048 545.623 357.091 545.783 357.144H548.599V358.504H547.159C547.287 358.653 547.394 358.845 547.479 359.08C547.565 359.304 547.607 359.555 547.607 359.832C547.607 360.269 547.527 360.653 547.367 360.984C547.218 361.315 547.01 361.592 546.743 361.816C546.477 362.04 546.162 362.211 545.799 362.328C545.437 362.445 545.047 362.504 544.631 362.504C544.461 362.504 544.285 362.488 544.103 362.456C543.922 362.424 543.741 362.371 543.559 362.296C543.442 362.403 543.346 362.509 543.271 362.616C543.207 362.723 543.175 362.867 543.175 363.048C543.175 363.272 543.266 363.448 543.447 363.576C543.639 363.704 543.975 363.768 544.455 363.768H545.847C546.797 363.768 547.511 363.923 547.991 364.232C548.482 364.531 548.727 365.021 548.727 365.704C548.727 366.088 548.626 366.451 548.423 366.792C548.231 367.133 547.954 367.427 547.591 367.672C547.229 367.917 546.786 368.109 546.263 368.248C545.751 368.397 545.175 368.472 544.535 368.472ZM544.631 361.352C545.005 361.352 545.325 361.219 545.591 360.952C545.858 360.675 545.991 360.28 545.991 359.768C545.991 359.277 545.858 358.899 545.591 358.632C545.335 358.355 545.015 358.216 544.631 358.216C544.247 358.216 543.922 358.349 543.655 358.616C543.389 358.883 543.255 359.267 543.255 359.768C543.255 360.28 543.389 360.675 543.655 360.952C543.922 361.219 544.247 361.352 544.631 361.352ZM544.823 367.272C545.463 367.272 545.975 367.144 546.359 366.888C546.754 366.643 546.951 366.349 546.951 366.008C546.951 365.699 546.829 365.491 546.583 365.384C546.349 365.277 546.007 365.224 545.559 365.224H544.487C544.061 365.224 543.703 365.187 543.415 365.112C543.01 365.421 542.807 365.768 542.807 366.152C542.807 366.504 542.983 366.776 543.335 366.968C543.698 367.171 544.194 367.272 544.823 367.272ZM554.755 365V354.536H556.611V363.432H560.963V365H554.755ZM563.266 365V357.144H565.106V365H563.266ZM564.194 355.768C563.863 355.768 563.591 355.672 563.378 355.48C563.165 355.288 563.058 355.037 563.058 354.728C563.058 354.419 563.165 354.168 563.378 353.976C563.591 353.773 563.863 353.672 564.194 353.672C564.525 353.672 564.797 353.773 565.01 353.976C565.223 354.168 565.33 354.419 565.33 354.728C565.33 355.037 565.223 355.288 565.01 355.48C564.797 355.672 564.525 355.768 564.194 355.768ZM568.094 365V357.144H569.614L569.742 358.2H569.806C570.158 357.859 570.536 357.565 570.942 357.32C571.358 357.075 571.838 356.952 572.382 356.952C573.224 356.952 573.838 357.224 574.222 357.768C574.606 358.301 574.798 359.069 574.798 360.072V365H572.958V360.312C572.958 359.661 572.862 359.203 572.67 358.936C572.478 358.669 572.163 358.536 571.726 358.536C571.384 358.536 571.08 358.621 570.814 358.792C570.558 358.952 570.264 359.192 569.934 359.512V365H568.094ZM581.047 365.192C580.503 365.192 579.996 365.101 579.527 364.92C579.057 364.728 578.647 364.456 578.295 364.104C577.943 363.752 577.665 363.325 577.463 362.824C577.271 362.312 577.175 361.731 577.175 361.08C577.175 360.44 577.276 359.864 577.479 359.352C577.681 358.84 577.948 358.408 578.279 358.056C578.62 357.704 579.009 357.432 579.447 357.24C579.884 357.048 580.332 356.952 580.791 356.952C581.324 356.952 581.793 357.043 582.199 357.224C582.604 357.405 582.94 357.661 583.207 357.992C583.484 358.323 583.692 358.717 583.831 359.176C583.969 359.635 584.039 360.136 584.039 360.68C584.039 360.861 584.028 361.032 584.007 361.192C583.996 361.352 583.98 361.48 583.959 361.576H578.967C579.052 362.28 579.297 362.824 579.703 363.208C580.119 363.581 580.647 363.768 581.287 363.768C581.628 363.768 581.943 363.72 582.231 363.624C582.529 363.517 582.823 363.373 583.111 363.192L583.735 364.344C583.361 364.589 582.945 364.792 582.487 364.952C582.028 365.112 581.548 365.192 581.047 365.192ZM578.951 360.328H582.439C582.439 359.72 582.305 359.245 582.039 358.904C581.783 358.552 581.383 358.376 580.839 358.376C580.369 358.376 579.959 358.541 579.607 358.872C579.255 359.203 579.036 359.688 578.951 360.328Z" fill="#848484" class="m1 caption-tension" data-prod="tension" data-fac=4 />



                                            <!--<path d="M195.635 74.8812L187.26 70.0984C187.178 70.0505 187.087 70.0194 186.993 70.0066C186.899 69.9938 186.804 69.9997 186.712 70.024C186.62 70.0483 186.534 70.0905 186.459 70.1481C186.384 70.2057 186.321 70.2776 186.275 70.3595C186.227 70.4398 186.195 70.5288 186.182 70.6213C186.169 70.7139 186.176 70.8081 186.2 70.8983C186.225 70.9885 186.267 71.0728 186.325 71.1464C186.384 71.22 186.456 71.2814 186.538 71.3268L192.595 74.7891L161.721 74.7891C161.53 74.7891 161.347 74.8644 161.211 74.9983C161.076 75.1322 161 75.3138 161 75.5031C161 75.6925 161.076 75.8741 161.211 76.008C161.347 76.1419 161.53 76.2171 161.721 76.2171L192.588 76.2171L186.538 79.6718C186.456 79.718 186.383 79.78 186.325 79.8543C186.267 79.9286 186.224 80.0136 186.2 80.1044C186.175 80.1952 186.169 80.29 186.182 80.3831C186.195 80.4763 186.226 80.5659 186.275 80.6468C186.337 80.755 186.427 80.8449 186.536 80.907C186.645 80.9691 186.769 81.0012 186.895 81C187.022 80.9993 187.148 80.9677 187.26 80.9078L195.635 76.1173C195.746 76.0561 195.838 75.967 195.902 75.8591C195.966 75.7511 196 75.6283 196 75.5031C195.999 75.377 195.966 75.2532 195.902 75.1441C195.838 75.035 195.746 74.9443 195.635 74.8812V74.8812Z" fill="#D9D9D9" />-->
                                            <path d="M197.635 74.8812L189.26 70.0984C189.178 70.0505 189.087 70.0194 188.993 70.0066C188.899 69.9938 188.804 69.9997 188.712 70.024C188.62 70.0483 188.534 70.0905 188.459 70.1481C188.384 70.2057 188.321 70.2776 188.275 70.3595C188.227 70.4398 188.195 70.5288 188.182 70.6213C188.169 70.7139 188.176 70.8081 188.2 70.8983C188.225 70.9885 188.267 71.0728 188.325 71.1464C188.384 71.22 188.456 71.2814 188.538 71.3268L194.595 74.7891L163.721 74.7891C163.53 74.7891 163.347 74.8644 163.211 74.9983C163.076 75.1322 163 75.3138 163 75.5031C163 75.6925 163.076 75.8741 163.211 76.008C163.347 76.1419 163.53 76.2171 163.721 76.2171L194.588 76.2171L188.538 79.6718C188.456 79.718 188.383 79.78 188.325 79.8543C188.267 79.9286 188.224 80.0136 188.2 80.1044C188.175 80.1952 188.169 80.29 188.182 80.3831C188.195 80.4763 188.226 80.5659 188.275 80.6468C188.337 80.755 188.427 80.8449 188.536 80.907C188.645 80.9691 188.769 81.0012 188.895 81C189.022 80.9993 189.148 80.9677 189.26 80.9078L197.635 76.1173C197.746 76.0561 197.838 75.967 197.902 75.8591C197.966 75.7511 198 75.6283 198 75.5031C197.999 75.377 197.966 75.2532 197.902 75.1441C197.838 75.035 197.746 74.9443 197.635 74.8812Z" fill="#D9D9D9" />
                                            <path d="M394.646 74.8812L386.509 70.0984C386.43 70.0505 386.342 70.0194 386.251 70.0066C386.159 69.9938 386.066 69.9997 385.977 70.024C385.888 70.0483 385.805 70.0905 385.732 70.1481C385.659 70.2057 385.598 70.2776 385.553 70.3595C385.506 70.4398 385.475 70.5288 385.463 70.6213C385.45 70.7139 385.456 70.8081 385.48 70.8983C385.504 70.9885 385.545 71.0728 385.602 71.1464C385.658 71.22 385.729 71.2814 385.809 71.3268L391.693 74.7891L361.701 74.7891C361.515 74.7891 361.337 74.8644 361.205 74.9983C361.074 75.1322 361 75.3138 361 75.5031C361 75.6925 361.074 75.8741 361.205 76.008C361.337 76.1419 361.515 76.2171 361.701 76.2171L391.685 76.2171L385.809 79.6718C385.728 79.718 385.658 79.78 385.601 79.8543C385.545 79.9286 385.503 80.0136 385.48 80.1044C385.456 80.1952 385.45 80.29 385.462 80.3831C385.475 80.4763 385.506 80.5659 385.553 80.6468C385.613 80.755 385.701 80.8449 385.807 80.907C385.913 80.9691 386.033 81.0012 386.155 81C386.279 80.9993 386.401 80.9677 386.509 80.9078L394.646 76.1173C394.753 76.0561 394.842 75.967 394.904 75.8591C394.967 75.7511 395 75.6283 395 75.5031C394.999 75.377 394.966 75.2532 394.904 75.1441C394.842 75.035 394.753 74.9443 394.646 74.8812V74.8812Z" fill="#D9D9D9" />
                                            <path d="M395.646 292.881L387.509 288.098C387.43 288.051 387.342 288.019 387.251 288.007C387.159 287.994 387.066 288 386.977 288.024C386.888 288.048 386.805 288.09 386.732 288.148C386.659 288.206 386.598 288.278 386.553 288.36C386.506 288.44 386.475 288.529 386.463 288.621C386.45 288.714 386.456 288.808 386.48 288.898C386.504 288.988 386.545 289.073 386.602 289.146C386.658 289.22 386.729 289.281 386.809 289.327L392.693 292.789L362.701 292.789C362.515 292.789 362.337 292.864 362.205 292.998C362.074 293.132 362 293.314 362 293.503C362 293.692 362.074 293.874 362.205 294.008C362.337 294.142 362.515 294.217 362.701 294.217L392.685 294.217L386.809 297.672C386.728 297.718 386.658 297.78 386.601 297.854C386.545 297.929 386.503 298.014 386.48 298.104C386.456 298.195 386.45 298.29 386.462 298.383C386.475 298.476 386.506 298.566 386.553 298.647C386.613 298.755 386.701 298.845 386.807 298.907C386.913 298.969 387.033 299.001 387.155 299C387.279 298.999 387.401 298.968 387.509 298.908L395.646 294.117C395.753 294.056 395.842 293.967 395.904 293.859C395.967 293.751 396 293.628 396 293.503C395.999 293.377 395.966 293.253 395.904 293.144C395.842 293.035 395.753 292.944 395.646 292.881V292.881Z" fill="#D9D9D9" />
                                            <path d="M592.635 74.8812L584.26 70.0984C584.178 70.0505 584.087 70.0194 583.993 70.0066C583.899 69.9938 583.804 69.9997 583.712 70.024C583.62 70.0483 583.534 70.0905 583.459 70.1481C583.384 70.2057 583.321 70.2776 583.275 70.3595C583.227 70.4398 583.195 70.5288 583.182 70.6213C583.169 70.7139 583.176 70.8081 583.2 70.8983C583.225 70.9885 583.267 71.0728 583.325 71.1464C583.384 71.22 583.456 71.2814 583.538 71.3268L589.595 74.7891L558.721 74.7891C558.53 74.7891 558.347 74.8644 558.211 74.9983C558.076 75.1322 558 75.3138 558 75.5031C558 75.6925 558.076 75.8741 558.211 76.008C558.347 76.1419 558.53 76.2171 558.721 76.2171L589.588 76.2171L583.538 79.6718C583.456 79.718 583.383 79.78 583.325 79.8543C583.267 79.9286 583.224 80.0136 583.2 80.1044C583.175 80.1952 583.169 80.29 583.182 80.3831C583.195 80.4763 583.226 80.5659 583.275 80.6468C583.337 80.755 583.427 80.8449 583.536 80.907C583.645 80.9691 583.769 81.0012 583.895 81C584.022 80.9993 584.148 80.9677 584.26 80.9078L592.635 76.1173C592.746 76.0561 592.838 75.967 592.902 75.8591C592.966 75.7511 593 75.6283 593 75.5031C592.999 75.377 592.966 75.2532 592.902 75.1441C592.838 75.035 592.746 74.9443 592.635 74.8812V74.8812Z" fill="#D9D9D9" />
                                            <path d="M790.635 74.8812L782.26 70.0984C782.178 70.0505 782.087 70.0194 781.993 70.0066C781.899 69.9938 781.804 69.9997 781.712 70.024C781.62 70.0483 781.534 70.0905 781.459 70.1481C781.384 70.2057 781.321 70.2776 781.275 70.3595C781.227 70.4398 781.195 70.5288 781.182 70.6213C781.169 70.7139 781.176 70.8081 781.2 70.8983C781.225 70.9885 781.267 71.0728 781.325 71.1464C781.384 71.22 781.456 71.2814 781.538 71.3268L787.595 74.7891L756.721 74.7891C756.53 74.7891 756.347 74.8644 756.211 74.9983C756.076 75.1322 756 75.3138 756 75.5031C756 75.6925 756.076 75.8741 756.211 76.008C756.347 76.1419 756.53 76.2171 756.721 76.2171L787.588 76.2171L781.538 79.6718C781.456 79.718 781.383 79.78 781.325 79.8543C781.267 79.9286 781.224 80.0136 781.2 80.1044C781.175 80.1952 781.169 80.29 781.182 80.3831C781.195 80.4763 781.226 80.5659 781.275 80.6468C781.337 80.755 781.427 80.8449 781.536 80.907C781.645 80.9691 781.769 81.0012 781.895 81C782.022 80.9993 782.148 80.9677 782.26 80.9078L790.635 76.1173C790.746 76.0561 790.838 75.967 790.902 75.8591C790.966 75.7511 791 75.6283 791 75.5031C790.999 75.377 790.966 75.2532 790.902 75.1441C790.838 75.035 790.746 74.9443 790.635 74.8812V74.8812Z" fill="#D9D9D9" />
                                            <path d="M988.625 74.8812L980.01 70.0984C979.926 70.0505 979.833 70.0194 979.736 70.0066C979.639 69.9938 979.541 69.9997 979.446 70.024C979.352 70.0483 979.264 70.0905 979.187 70.1481C979.109 70.2057 979.045 70.2776 978.997 70.3595C978.947 70.4398 978.915 70.5288 978.902 70.6213C978.889 70.7139 978.895 70.8081 978.92 70.8983C978.945 70.9885 978.989 71.0728 979.049 71.1464C979.109 71.22 979.183 71.2814 979.268 71.3268L985.498 74.7891L953.742 74.7891C953.545 74.7891 953.356 74.8644 953.217 74.9983C953.078 75.1322 953 75.3138 953 75.5031C953 75.6925 953.078 75.8741 953.217 76.008C953.356 76.1419 953.545 76.2171 953.742 76.2171L985.49 76.2171L979.268 79.6718C979.183 79.718 979.108 79.78 979.049 79.8543C978.989 79.9286 978.945 80.0136 978.92 80.1044C978.894 80.1952 978.888 80.29 978.901 80.3831C978.915 80.4763 978.947 80.5659 978.997 80.6468C979.061 80.755 979.154 80.8449 979.266 80.907C979.378 80.9691 979.506 81.0012 979.635 81C979.766 80.9993 979.895 80.9677 980.01 80.9078L988.625 76.1173C988.738 76.0561 988.833 75.967 988.899 75.8591C988.965 75.7511 989 75.6283 989 75.5031C988.999 75.377 988.965 75.2532 988.899 75.1441C988.833 75.035 988.739 74.9443 988.625 74.8812V74.8812Z" fill="#D9D9D9" />

                                            <path d="M276 160V293H362" stroke="#D9D9D9" stroke-width="1.5" />
                                            <path d="M873.881 157.354L869.098 165.491C869.051 165.57 869.019 165.658 869.007 165.749C868.994 165.841 869 165.934 869.024 166.023C869.048 166.112 869.09 166.195 869.148 166.268C869.206 166.341 869.278 166.402 869.359 166.447C869.44 166.494 869.529 166.525 869.621 166.537C869.714 166.55 869.808 166.544 869.898 166.52C869.988 166.496 870.073 166.455 870.146 166.398C870.22 166.342 870.281 166.271 870.327 166.191L873.789 160.307L873.789 190.299C873.789 190.485 873.864 190.663 873.998 190.795C874.132 190.926 874.314 191 874.503 191C874.692 191 874.874 190.926 875.008 190.795C875.142 190.663 875.217 190.485 875.217 190.299L875.217 160.315L878.672 166.191C878.718 166.272 878.78 166.342 878.854 166.399C878.929 166.455 879.014 166.497 879.104 166.52C879.195 166.544 879.29 166.55 879.383 166.538C879.476 166.525 879.566 166.494 879.647 166.447C879.755 166.387 879.845 166.299 879.907 166.193C879.969 166.087 880.001 165.967 880 165.845C879.999 165.721 879.968 165.599 879.908 165.491L875.117 157.354C875.056 157.247 874.967 157.158 874.859 157.096C874.751 157.033 874.628 157 874.503 157C874.377 157.001 874.253 157.034 874.144 157.096C874.035 157.158 873.944 157.247 873.881 157.354V157.354Z" fill="#D9D9D9" />
                                            <path d="M756 293H842" stroke="#D9D9D9" stroke-width="1.5" />
                                            <path d="M756 293H875" stroke="#D9D9D9" stroke-width="1.5" />
                                            <path d="M874.5 293V158" stroke="#D9D9D9" stroke-width="1.5" />
                                        </svg>
                                        <div class="pb-5"></div>
                                    </div>
                            </div>
                            <div class="mb-4"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row gx-0 h-100">
                <div class="col-1"></div>
                <div class="col-10 col-md-10 h-100">
                    <div class="row  gx-0 h-100">
                         <div class="col-12 col-lg-6 h-100">
                            <div class="row gx-0 h-100">
                                <div class="col-1 position-relative forDesktop">
                                    <div class="left-arrow-fc forDesktop">
                                        <svg width="47" height="46" viewBox="0 0 47 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.6818 -0.000101191C10.9913 -0.0001023 0.7037 10.2875 0.703699 22.978C0.703698 35.6684 10.9913 45.9561 23.6818 45.9561C36.3722 45.9561 46.6599 35.6684 46.6599 22.978C46.6599 10.2875 36.3722 -0.000100082 23.6818 -0.000101191Z" fill="#FFAF08" />
                                            <path d="M27.0859 30.6375L19.9898 23.5413C19.2087 22.7602 19.2087 21.4939 19.9898 20.7128L27.0859 13.6167" stroke="white" stroke-width="3" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <div class="positon-relative box_map-img W-100">
                                        <div>
                                            <ul class=" facilities-slide2 owl-C1">
                                                
                                                <li class="item"><img src="{{asset('/images/bnm/facilities/sendzimir-1-min.jpg')}}" alt="" class="img-fluid w-100"></li>
                                                <li class="item"><img src="{{asset('/images/bnm/facilities/degreaser-min.jpg')}}" alt="" class="img-fluid w-100"></li>
                                                <li class="item"><img src="{{asset('/images/bnm/facilities/vertical-min.jpg')}}" alt="" class="img-fluid w-100"></li>
                                                <li class="item"><img src="{{asset('/images/bnm/facilities/skin-pass-mill-min.jpg')}}" alt="" class="img-fluid w-100"></li>
                                                <li class="item"><img src="{{asset('/images/bnm/facilities/tension-line-min.jpg')}}" alt="" class="img-fluid w-100"></li>
                                                <li class="item"><img src="{{asset('/images/bnm/facilities/slitting-line-min.jpg')}}" alt="" class="img-fluid w-100"></li>
                                                <li class="item"><img src="{{asset('/images/bnm/facilities/cold-rolled-min.jpg')}}" alt="" class="img-fluid w-100"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 position-relative forDesktop">
                                    <div class="right-arrow-fc forDesktop" >
                                        <svg width="47" height="46" viewBox="0 0 47 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M23.3182 45.9562C36.0087 45.9562 46.2963 35.6685 46.2963 22.9781C46.2963 10.2876 36.0087 0 23.3182 0C10.6278 0 0.340149 10.2876 0.340149 22.9781C0.340149 35.6685 10.6278 45.9562 23.3182 45.9562Z" fill="#FFAF08" />
                                            <path d="M19.9141 15.3186L27.0102 22.4148C27.7913 23.1958 27.7913 24.4622 27.0102 25.2432L19.9141 32.3394" stroke="white" stroke-width="3" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 h-100 mb-5">
                            <div class="h-100">
                                <div class="slide-caption-contain h-100">
                                    <div class="d-flex pe-3 production-edit h-100">
                                        @foreach($postsFacilities as $key=> $row)
                                        <div class="production-caption
                                        @if($key == 0)
                                         production-change-sendzimir active
                                         @elseif($key==1)
                                         production-change-degreaser
                                         @elseif($key==2)
                                         production-change-vertical-bright
                                         @elseif($key==3)
                                         production-change-skin-pass-mill
                                         @elseif($key==4)
                                         production-change-slitting-line
                                         @elseif($key==5)
                                         production-change-cold-rolled
                                         @elseif($key==6)
                                         production-change-tension
                                         @endif
                                         ">
                                            <h1>{{$row->title}}</h1>
                                            {!!$row->content!!}
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative h-100">
                            <div class="position-absolute w-100">
                                <div class="slide-fc-dots"></div>
                                <div class="slide-m-dots"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end production-facilities-section -->
    <!-- news-section2 -->
    <section class="news__section2 pt-5 " id="news">
        <div class="container-full">
            <div class="row gx-0">
                <div class="col-1 col-md-1"></div>
                <div class="col-11 col-md-11">
                    <div class="row gx-0">
                        <div class="col-md-3">
                            <h1 class="m-4-c title">NEWS</h1>
                            <a href="/news" class="see">See All</a>
                        </div>
                    </div>
                    <div class="row gx-0">
                        <div class="col-11 col-lg-11">
                            <ul class="d-flex newsCollections row">
                                @foreach ($postsNews as $news)
                                <li class="col-12 col-lg-6">
                                    <a href="news/{{ $news->slug }}">
                                        <div class="news-container">
                                            <div class="card text-bg-dark bg-transparent border-light card-news" style="border-radius: 30px;">
                                                <div class="overlay"></div>
                                                <img src="{{ $news->thumbnail }}" class="card-img" alt="...">
                                                <div class="card-img-overlay">
                                                    <div class="d-flex">
                                                        <div class="date">
                                                            <h1 class="text-center month"><?php
                                                                                            $dateTime = new DateTime($news->publish_date);
                                                                                            echo $dateTime->format('M'); // 15th Apr 2010
                                                                                            ?>
                                                            </h1>
                                                            <h1 class="text-center day">
                                                            <?php
                                                                                            $dateTime = new DateTime($news->publish_date);
                                                                                            echo $dateTime->format('d'); // 15th Apr 2010
                                                                                            ?>
                                                            </h1>
                                                        </div>
                                                        <div class="card-right">
                                                            <h3 class="card-title">{{ $news->title }}</h3>
                                                            <div class="d-flex justify-content-between news-button">
                                                                <p class="mb-0 mt-3 news-card-content forDesktop">{!! $news->description !!} ... <span><a href="/news/{{ $news->slug }}" class="continue">Continue Reading</a></span></p>
                                                                <p class="mb-0 mt-2 w-100 news-card-content forMobile">
                                                                    
                                                                     <?php
                                                                    // echo $item->news_title;
                                                                    $texts = $news->description;
                                                                    $n = strlen($texts);
                                                                    $jmlh_karakter = 45;
                                                                    $tambahan = '...';
                                                                    // echo $n;
                                                                    if ($n < $jmlh_karakter) {
                                                                        echo $news->description;
                                                                    } else {
                
                                                                        if (strlen($texts) > $jmlh_karakter || $texts = '') {
                                                                            $kata = preg_split('/\s/', $texts);
                                                                            $hasilakhir = '';
                                                                            $j = 0;
                                                                            while (1) {
                                                                                $panjang = strlen($hasilakhir) + strlen($kata[$j]);
                                                                                if ($panjang > $jmlh_karakter) { //pengambilan sesuai jumlah karakter
                                                                                    break;
                                                                                } else {
                                                                                    $hasilakhir .= " " . $kata[$j]; //Menyatukan text
                                                                                    ++$j;
                                                                                }
                                                                            }
                                                                            $hasilakhir .= $tambahan; //Tambahan setelah kalimat dipotong
                                                                            echo $hasilakhir;
                                                                        } else {
                                                                            $hasilakhir = $kata;
                                                                            // echo $hasilakhir;
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <span><a href="/news/{{ $news->slug }}" class="continue">Continue Reading</a></span></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-1 col-md-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end news-section2 -->
    <!-- awards-section-->
   <section class="award__section bg-yellow h-100">
        <div class="container-full">
            <div class="row gx-0">
                <div class="col-1"></div>
                <div class="col-10 col-lg-10">
                    <div class="row gx-0">
                        <div class="col-12 col-lg-6 ">
                            <h1>AWARDED BY</h1>
                            <p class="ministry">The Ministry of Trade <br> of the Republic of Indonesia</p>
                            <img src="{{asset('/images/bnm/awards.png')}}" alt="" class="img-awards">
                        </div>
                        <div class="col-12 col-lg-6">
                            <h1>SATISFIED CUSTOMERS</h1>
                            <p>We become partners with our customers by manufacturing and providing tailor-made solutions exclusively to their needs.</p>
                            <img src="{{asset('/images/bnm/brands.png')}}" alt="" class="img-brands">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end awards-section-->
    <!-- career-section -->
    <section class="career__section pt-5 pb-5" id="career">
        <div class="container-full">
            <div class="row gx-0">
                <div class="col-1 col-md-1"></div>
                <div class="col-10 col-md-11">
                    <div class="row gx-0">
                        <div class="col-md-4">
                            <h1 class="title">CAREER</h1>
                            <h1 class="m-4-c">Join Our Team</h1>
                            <p class="mt-5 ">We welcome all talented individuals with a passion to learn, to contribute at BNM Stainless Steel &#8212;  a mindfulness-based business that continuously nurture its employees to have an interdependent co-arising perspective.</p>
                            <div class="contain-btn-job"><a class="btn btn-job rounded-pill btn-lg" href="/career">See Job Openings</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="forMobile">
                <div class="row gx-0">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="d-flex justify-content-center">
                            <a href="/career" class="btn-job-m rounded-pill btn-lg">See Job Openings</a>
                        </div>
                    </div>
                </div>
            </div>
            <img src="{{asset('/images/bnm/career-img-2-min.jpg')}}" alt="" class="w-100  forDesktop">
            <img src="{{asset('/images/bnm/components/career_section/gmbr2-min.jpg')}}" alt="" class="w-100  forMobile" style="margin-top: 30px;padding-bottom: 40px;">
        </div>
    </section>
    <!-- end-career-section -->
    <div class="popupheader2 ">
        <div class="body ">
            <ul class="slider-hotOffers ">
                @foreach ($postsBanner as $key => $row)
                <li>
                    <div class="d-flex justify-content-center popSlider2 ">
                        <div class="w-85 0 bg-white p-5 box-popupheader">
                            <div class="popupheader2-top  ">
                                <div class="close-popup">
                                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                                        <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                                    </svg>
                                </div>
                            </div>
                            <div class="row gx-3 popupheader-body-container">
                                <div class="col-lg-8 mt-3 popupheader-body-left">
                                    <h1 id="p-title" class="@if($key == 1)popupheader2-1 @elseif($key ==2)popupheader2-2 @elseif($key == 0)popupheader2-3 @endif ">{{ $row->title}}
                                    </h1>
                                    <img src="{{ $row->thumbnail }}" alt="" class="w-100 h-100 forMobile" id="p-img">
                                    <div>
                                        <div id="p-body" >{!! $row->content !!} </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3 popupheader-body-right"><img src="{{ $row->thumbnail }}" alt="" class="w-100 forDesktop" id="p-img"></div>
                            </div>
                            <div class="d-flex justify-content-between mt-5">
                                <div class="left-header-arrow"><img src="{{asset('/images/bnm/header/left-arrow.png')}}" alt=""></div>
                                <div class="right-header-arrow"><img src="{{asset('/images/bnm/header/right-arrow.png')}}" alt=""></div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- end popup header -->
    @foreach ($postsBanner as $key => $row)
    <div class="popupheader2--{{$key}} ">
        <div class="body">
            <div class="d-flex">
                <div class="d-flex justify-content-center popSlider2 ">
                    <div class="w-85 0 bg-white p-5 box-popupheader">
                        <div class="popupheader2-top  ">
                            <div class="close-popup-{{$key}}">
                                <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                                    <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                                </svg>
                            </div>
                        </div>
                        <div class="row gx-3 popupheader-body-container">
                            <div class="col-lg-8  popupheader-body-left">
                                <h1 id="p-title" class="@if($key == 1)popupheader2-1 @elseif($key ==2)popupheader2-2 @elseif($key == 0)popupheader2-3 @endif ">{{ $row->title}}
                                </h1>
                                <img src="{{ $row->thumbnail }}" alt="" class="w-100 h-100 forMobile" id="p-img">
                                <div>
                                    <div id="p-body">{!! $row->content !!} </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-3 popupheader-body-right">
                                <img src="{{ $row->thumbnail }}" alt="" class="w-100 forDesktop" id="p-img">
                            </div>
                        </div>
                        @if($key == 0)
                        <div class="d-flex justify-content-end margin-arrow">
                            <div class="right-header-arrow trigger-arrow" data-slide-to="1" data-popup-headerii=<?php echo $key ?>>
                                <img src="{{asset('/images/bnm/header/right-arrow.png')}}" alt="">
                            </div>
                        </div>
                        @elseif($key == 2)
                        <div class="d-flex justify-content-between margin-arrow">
                            <div class="left-header-arrow trigger-arrow" data-slide-to=<?php echo $key - 1 ?> data-popup-headerii=<?php echo $key ?>>
                                <img src="{{asset('/images/bnm/header/left-arrow.png')}}" alt="">
                            </div>
                        </div>
                        @else
                        <div class="d-flex justify-content-between margin-arrow">
                            <div class="left-header-arrow trigger-arrow" data-slide-to=<?php echo $key - 1 ?> data-popup-headerii=<?php echo $key ?>>
                                <img src="{{asset('/images/bnm/header/left-arrow.png')}}" alt="">
                            </div>
                            <div class="right-header-arrow trigger-arrow" data-slide-to=<?php echo $key + 1 ?> data-popup-headerii=<?php echo $key ?>>
                                <img src="{{asset('/images/bnm/header/right-arrow.png')}}" alt="">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- popup-end-product -->
     <div class="popupheader3">
        <div class="body">
            <ul class="slider-hotOffers3">
                @foreach ($postsMarket as $row)
                <li>
                    <div class="d-flex justify-content-center popSlider">
                        <div class="w-85 bg-white p-5 box-popupheader3">
                            <div class="d-flex justify-content-end ">
                                <div class="close-popupOffers3">
                                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                                        <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                                    </svg>
                                </div>
                            </div>
                            <h1 class="title">END APPLICATIONS</h1>
                            <div class="row gx-0">
                                <div class="col-md-12 mt-2">
                                    <h1 id="p-title-specs">{{ $row->title}}</h1>
                                    <div id="p-specs-info" class="mt-5">{!! $row->content !!}</div>
                                </div>
                            </div>
                            <div class="forDesktop"><div class="mt-3"><a class="contact-to ">Contact Us</a></div></div>
                            <div class="forMobile"><div class="mt-3"><a class="contact-to" data-mobile=1>Contact Us</a></div></div>
                            <div class="d-flex justify-content-between mt-5">
                                <div class="left-arrowPopup"><img src="{{asset('/images/bnm/header/left-arrow.png')}}" alt=""></div>
                                <div class="right-arrowPopup"><img src="{{asset('/images/bnm/header/right-arrow.png')}}" alt=""></div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- end of popup-end-product -->
    <!-- popup specification -->
    <!-- end popup specification -->
    <!-- popup Serve Market -->
    <div class="popupServeMarket">
        <div class="body">
            <ul class="slider-serveMarket">
                @foreach ($postsProduct as $key=>$row)
                <li>
                    <div class="d-flex justify-content-center popSlider">
                        <div class=" bg-white p-5 box-popupServe">
                            <div class="d-flex justify-content-end">
                                <div class="close-popupServeMarket">
                                    <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                                        <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                                    </svg>
                                </div>
                            </div>
                            <h1 class="title">
                                TECHNICAL
                            </h1>
                            <div class="row gx-0">
                                <div class="col-12   mt-2">
                                    <h1 id="p-title-specs">
                                        {{ $row->title}} <span class="span-orange">{{$row->subtitle}}</span> 
                                    </h1>
                                    <div id="p-specs-info" class="mt-5 delayed">
                                        {!! $row->content !!}
                                    </div>
                                </div>
                            </div>
                             <div class="forDesktop">
                                <div class="mt-3">
                                    <a class="contact-to ">Contact Us</a>
                                </div>
                            </div>
                            <div class="forMobile">
                                <div class="mt-3">
                                    <a class="contact-to" data-mobile=1>Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- end popup Serve Market -->
    <!-- message-section -->
    <div>
        @include('client.components.sections.message_section')
    </div>
    <!-- end-message-section -->
    @include('client.components.footer')
    @include('client.components.offcanvas')
    <!-- endoffcanvas -->
    @include('client.components.search')
    <div class="black-cover"></div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
   $(document).ready(function() {
    // $(window).on('load', function() { 
    
    // var myCarousel = $(".slider-for:not(.slick-initialized)");
    // myCarousel.each(function() {
    //     $(this).slick({});
    // });
        $('.impact-box-slider').slick({
            dots: false,
            infinite: false,
            slidesToShow: 3,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        margin: 40,
                        // autoWidth:true
                    }
                }
            ]
        });
        $('.impact-box-slider').not('.slick-initialized').slick();
            $('.owl-one').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            centerMode: false,
            margin: 10,
            responsive: [{
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        dots: true,
                    }
                }, {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autowidth: true,
                        dots: true,
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autowidth: true,
                        dots: true,
                    }
                },
            ]
        })
        $(".owl-one").not('.slick-initialized').slick();
         $(".owl-one").on('init reInit afterChange', function(event, slick) {
             $(".specPopup3").on("click", function() {
                    var slidenoEndProduct = $(this).data('end-product')
                $('.slider-hotOffers3').slick('slickGoTo', slidenoEndProduct)
                $('.popupheader3').addClass('open')
                $("html").css('overflow','hidden')
            })
        });
        $('.owl-zero').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            dots: true,
            centerMode: false,
            autowidth: true,
            margin: 10,
            responsive: [{
                    breakpoint: 1000,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        autowidth: true,
                        dots: true,
                    }
                }, {
                    breakpoint: 720,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        autowidth: true,
                        dots: true,
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        autowidth: true,
                        dots: true,
                    }
                },
            ]
        })
        $('.owl-zero').not('.slick-initialized').slick();
        $(".owl-zero").on('init reInit afterChange', function(event, slick) {
            console.log('reinitalized');
            $(".specPopup").on("click", function() {
                var slideno = $(this).data('spec');
                $('.slider-serveMarket').slick('slickGoTo', slideno);
                $('.popupServeMarket').addClass('open')
                $('html').css('overflow', 'hidden')
            });
        });
        // $(".owl-end").owlCarousel({
        //     // margin: 10,
        //     loop: true,
        //     autoWidth: true,
        //     items: 5
        // });
        // $('.owl-end').not('.slick-initialized').slick();
        $('.infograph-slick').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            autoplay: true,
            autoplaySpeed: 2000,
        })
        $('.infograph-slick').not('.slick-initialized').slick();
        $('.newsCollections').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 2,
            dots: true,
            margin: 3,
            adaptiveHeight: true,
            responsive: [{
                    breakpoint: 414,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 650,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        })
        $('.newsCollections').not('.slick-initialized').slick();
        $('.infograph-slick').not('.slick-initialized').slick();
        $('.facilities-slide2').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            appendDots: $('.slide-fc-dots'),
            arrows: true,
            margin: 10,
            prevArrow: $('.left-arrow-fc'),
            nextArrow: $('.right-arrow-fc'),
            responsive: [{
                breakpoint: 1020,
                settings: {
                    dots: true,
                    appendDots: $('.slide-m-dots'),
                }
            }, ]
        })
        $('.infograph-slick').not('.slick-initialized').slick();
        $('.impact-slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            margin: 10
        })
        $('.impact-slider').not('.slick-initialized').slick();
        $('.facilities-slide2').on('afterChange', function(event, slick, currentSlide, nextSlide) {
            var elt = slick.$slides.get(currentSlide);
            let previousSlideIndex = currentSlide;
            let prod = '';
            if (previousSlideIndex === 0) {
                prod = 'sendzimir'
            } else if (previousSlideIndex === 1) {
                prod = 'degreaser'
            } else if (previousSlideIndex === 2) {
                prod = 'vertical-bright'
            } else if (previousSlideIndex === 3) {
                prod = 'skin-pass-mill'
            } else if (previousSlideIndex === 4) {
                prod = 'tension'
            } else if (previousSlideIndex === 5) {
                prod = 'slitting-line '
            } else if (previousSlideIndex === 6) {
                prod = 'cold-rolled'
            }
            $('rect').siblings(`:not(.${prod})`).removeClass('active')
            $('rect').siblings(`.caption-${prod}`).removeClass('active')
            let not = $('rect').siblings(`.${prod}`)
            let notCaption = $(`.caption-${prod}`)
            $(notCaption).addClass('active')
            $(not).addClass('active')
            if (
                !$(".production-edit").hasClass(
                    "production-change-".concat(prod)
                )
            ) {
                $(`.production-change-sendzimir`).removeClass('active')
                $(`.production-change-degreaser`).removeClass('active')
                $(`.production-change-vertical-bright`).removeClass('active')
                $(`.production-change-skin-pass-mill`).removeClass('active')
                $(`.production-change-slitting-line`).removeClass('active')
                $(`.production-change-cold-rolled`).removeClass('active')
                $(`.production-change-tension`).removeClass('active')
            }
            $(".production-change-".concat(prod)).addClass(
                "active"
            );
        });
        $('.facilities-slide2').not('.slick-initialized').slick();
        //////////////// end production facilities slider integration /////////
        //////////////// slider header ////////////////////////
        // $(`.slider-hotOffers`).slick({
        //     slidesToScroll: 1,
        //     slidesToShow: 1,
        //     arrows: true,
        //     prevArrow: $(`.left-header-arrow`),
        //     nextArrow: $(`.right-header-arrow`),
        //     swipe: false,
        //     adaptiveHeight: false,
        //     // responsive: [{
        //     //     breakpoint: 350,
        //     //     settings: {
        //     //         adaptiveHeight: true
        //     //     }
        //     // }, ]
        // });
         $(`.slider-hotOffers`).on('afterChange', function(event, slick, currentSlide, nextSlide) {
            $(".popupheader2").animate({
                scrollTop: 0
            }, "fast");
        });
        for (let i = 0; i < 3; i++) {
            $(`.close-popup-${i}`).on('click', function() {
                $(`.popupheader2--${i}`).removeClass('open')
                $("html,body").removeAttr("style");
            })
        }
        $(".pop-head").on("click", function() {
            var slideno = $(this).data('header');
            $(`.popupheader2--${slideno-1}`).addClass('open')
            $(`.popupheader2--${slideno-1}`).animate({
                scrollTop: 0
            }, "slow");
            $("html").css('overflow', 'hidden')
        });
         $('.trigger-arrow').each(function() {
            $(this).on('click', function() {
                let index = $(this).data('slide-to')
                let key = $(this).data('popup-headerii')
                popupheaderTrigger(index, key)
            })
        })
        function popupheaderTrigger(index, key) {
            $(`.popupheader2--${key}`).removeClass('open')
            $(`.popupheader2--${index}`).addClass('open')
            $(`.popupheader2--${index}`).animate({
                scrollTop: 0
            }, "slow");
        }
        popupheaderTrigger()
        // $(".pop-head").on("click", function() {
        //     var slideno = $(this).data('header');
        //     $('.slider-hotOffers').slick('slickGoTo', slideno - 1);
        //     $('.popupheader2').addClass('open')
        //     $("html").css('overflow','hidden')
        // });
        
        // $('.slider-hotOffers').not('.slick-initialized').slick();
        ///////// end slider header //////////////
        
        // $(`.slider-hotOffers3`).on('init', function(event, slick, currentSlide, nextSlide) {
        //      console.log('tes')
             
        //     let _ = slick
        //     $activeSlides = _.$slideTrack.find('.slick-active');
        //     console.log($activeSlides)
        //     $activeSlides.each(function() {
        //     var height = $(this).outerHeight(true);
        //     // console.log(height);
        //     // if (targetHeight < height) {
        //     //     targetHeight = height;
        //     // }
        //  });
        // });
        $(`.slider-hotOffers3`).slick({
            slidesToScroll: 1,
            slidesToShow: 1,
            arrows: true,
            prevArrow: $(`.left-arrowPopup`),
            nextArrow: $(`.right-arrowPopup`),
            swipe: false,
            // adaptiveHeight:true
            // infinite: false,
        });
        $(".specPopup3").on("click", function() {
            var slidenoEndProduct = $(this).data('end-product')
            $('.slider-hotOffers3').slick('slickGoTo', slidenoEndProduct)
            $('.popupheader3').addClass('open')
            $("html").css('overflow','hidden')
        })
        // $(`.slider-hotOffers3`).on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        //     console.log('tes')
        //     let _ = slick
        //     $activeSlides = _.$slideTrack.find('.slick-active');
        //     console.log($activeSlides[0])
        //     // let tinggi = $('.popupheader3').height()
        //     // console.log(tinggi)

        //     // $('.popupheader3').css('height', tinggi)
            
        //     let tinggi = $('.popupheader3 ').height()
        //     let tinggiSlick = $('.popupheader3 .body .box-popupheader3').height()
        //     // let tinggiSlick = $('.slick-active').height()
        //     console.log(tinggi)
        //     console.log(tinggiSlick)
            

        //     $('.popupheader3 .body .slick-track').css('height', tinggi)
        //     $activeSlides.each(function() {
        //         var height = $(this).outerHeight(true);
        //         console.log(height);
        //         // if (targetHeight < height) {
        //         //     targetHeight = height;
        //         // }
        //     });

        // });
        
        
        // $(`.slider-hotOffers3`).on('afterChange', function(event, slick, currentSlide, nextSlide) {
        // //     let _ = slick
        // //     let targetHeight = 0
        // //     $activeSlides = _.$slideTrack.find('.slick-active');
        // //     console.log($activeSlides)
        // //     console.log($activeSlides[0].lastChild.offsetParent.children[0].offsetHeight)
        // //     $activeSlides.each(function() {
        // //     var height = $(this).outerHeight(true);
        // //     console.log(height);
        // //     if (targetHeight < $activeSlides[0].lastChild.offsetParent.children[0].offsetHeight) {
        // //         targetHeight = $activeSlides[0].lastChild.offsetParent.children[0].offsetHeight;
        // //     }
        // //  });
        //     $(".popupheader3").animate({
        //         scrollTop: 0,
        //         // height: targetHeight
        //     }, "fast");
        // });
        $(`.slider-hotOffers3`).on('afterChange', function(event, slick, currentSlide, nextSlide) {
            $(".popupheader3").animate({
                scrollTop: 0
            }, "fast");
        });
        $('.slider-hotOffers3').not('.slick-initialized').slick();
        $(`.slider-serveMarket`).slick({
            slidesToScroll: 1,
            slidesToShow: 1,
            infinite: false,
            arrows: true,
            prevArrow: $(`.left-arrowPopupServeMarket`),
            nextArrow: $(`.right-arrowPopupServeMarket`),
            swipeToSlide: false,
            swipe: false
        });
         $(`.slider-serveMarket`).on('afterChange', function(event, slick, currentSlide, nextSlide) {
            $(".popupServeMarket").animate({
                scrollTop: 0
            }, "fast");
        });
        $('slider-serveMarket').not('.slick-initialized').slick();
        $(".specPopup").on("click", function() {
            var slideno = $(this).data('spec');
            $('.slider-serveMarket').slick('slickGoTo', slideno);
            $('.popupServeMarket').addClass('open')
            $("html").css('overflow','hidden')
        });
        $('.product-specs-slider').slick({
            infinite: false,
            slidesToShow: 4.5,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
        $('.product-specs-sliders').slick({
            infinite: true,
            slidesToShow: 4,
        })
        $('.product-specs-sliders').not('.slick-initialized').slick();
        $('.product-up-slider').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: false,
                        centerPadding: '40px',
                    }
                }
            ]
        });
        $('.product-up-slider').not('.slick-initialized').slick();
        ////////////////////// end serveMarket popup ///////////////////
        $(`.owl-C1`).slick({
            dots: false,
            infinite: true,
            speed: 500,
            cssEase: 'linear',
            prevArrow: $(`.left-arrow`),
            nextArrow: $(`.right-arrow`),
        });
         $('.owl-C1').not('.slick-initialized').slick();
    });
</script>
<script>
    window.onload = function () {
        //  $('html, body').hide();
        if (window.location.hash) {
            setTimeout(function() {
                $('html, body').scrollTop(0).show();
                $('html, body').animate({
                    scrollTop: $(window.location.hash).offset().top +350
                    }, 1000)
            }, 0);
        }
        else {
            $('html, body').show();
        }
    }
</script>
@endsection