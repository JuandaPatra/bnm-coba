@extends('layouts.app')
@section('title', 'News')

@section('container')

<!-- header -->
<header class="position-relative">
    <div class="container">
    </div>
    <div class="header__bannerHome">
        <img class="forDesktop" src="{{asset('/images/bnm/BNM.jpg')}}" width="100%" alt="" srcset="">
        <img class="forMobile" src="{{asset('/images/bnm/BNM.jpg')}}" width="100%" alt="" srcset="">
    </div>

    <div class="container logo-top">
        <div class="d-flex">
            <div>
                <a href="/">
                    <img src="{{asset('/images/bnm/logo.png')}}" alt="" class="logo forDesktop" width="200px">
                    <img src="{{asset('/images/bnm/logo.png')}}" alt="" class="logo forMobile" width="200px">
                </a>
            </div>

            <div class="vl"></div>
            <div>
                <div class="input-group mb-3 mt-4 input-header">
                    <input type="text" class="form-control d-block" placeholder="Search..." aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-white bg-white py-2" type="button" id="button-addon2">Button</button>
                </div>
            </div>
            <div id="menu-hamburger" class="">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <div class="desc-first news">
        <h1>NEWS</h1>
    </div>

 
</header>
<!-- end header -->
<main id="news" page="news">
    <!-- detail-section -->
    <section class="detail__section " id="detail">
        <div class="container">
            <div class="row mar-7">
                <div class="col-md-5">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('/images/bnm/n1.png')}}" alt="" class="h-75 w-75">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="v1-footer"></div>
                </div>
                <div class="col-md-6 kanan">
                    <h1 class="mt-5">WE PROVIDE HIGH <br>ACCURACY PRODUCT
                    </h1>
                    <p class="date">31 Jan 2022</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore quae quasi nam magnam ullam, eos explicabo suscipit perferendis quod in, officia rerum, ipsa nesciunt cum veritatis. Neque inventore suscipit illo consectetur sunt laboriosam excepturi architecto.</p>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto culpa minima magni? Ducimus corporis, ratione numquam magni iusto autem deserunt expedita minima iure sapiente. Alias blanditiis facere aspernatur doloremque aut.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Expedita corporis laudantium, ea alias, fuga illum provident atque ipsa fugit excepturi quos accusamus obcaecati consequatur ipsam dolorum fugiat a magni cupiditate?</p>

                    <div class="mt-5">
                        <p>
                            Share this article to:
                        </p>
                        <div class="d-flex icon">
                            <div class="rounded-circle p-2 me-4">
                                <img src="{{asset('/images/bnm/twitter-n.png')}}" alt="">
                            </div>
                            <div class="rounded-circle p-2 me-4">
                                <img src="{{asset('/images/bnm/twitter-n.png')}}" alt="">
                            </div>
                            <div class="rounded-circle p-2 me-4">
                                <img src="{{asset('/images/bnm/twitter-n.png')}}" alt="">
                            </div>
                            <div class="rounded-circle p-2 me-4">
                                <img src="{{asset('/images/bnm/twitter-n.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end-detail-section -->

    <!-- import component footer -->
    @include('components.footer')
    
    <!-- import component offcanvas -->
    @include('components.offcanvas')
</main>
