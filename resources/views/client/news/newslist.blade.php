@extends('client.layouts.app')

@section('title', 'News | BNM Stainless Steel')
@section('container')

<!-- header -->
<header class="position-relative">
    <!-- import component navbar -->
    @include('client.components.navbar')
    <img src="{{asset('/images/bnm/components/header/news-list-banner.jpg')}}" alt="" style="width: 100%;object-fit: cover;height:auto" class=" forDesktop">
    <img src="{{asset('/images/bnm/components/header/news-banner-mobile.jpg')}}" alt="" style="width: 100%;object-fit: cover;height:auto" class=" forMobile">
    <div class="desc-first news">
        <h1 class="title forDesktop">NEWS ARCHIVE</h1>
        <h1 class="title forMobile">NEWS <br> ARCHIVE</h1>
    </div>


</header>
<!-- end header -->
<main id="news" page="news">
    <!-- news-section -->
    <section class="news__section pt-5" id="news">
         <div class="d-flex justify-content-center news-caption text-center pb-5">
            <div class="mx-auto">
                <div class="text-center news-caption-container">
                    <h1 class="title text-center forDesktop" >
                        OUR RECENT NEWS
                    </h1>
                    <p class="forDesktop">
                        BNM Stainless Steel brings you the most recent news, including fascinating facts about metals, the business industry, and other intriguing topics.
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row gx-0">
            <div class="col-1"></div>
            <div class="col-10 col-lg-10">
                <h1 class="title forMobile">
                    OUR RECENT NEWS
                </h1>
                <p class="forMobile">
                        BNM Stainless Steel brings you the most recent news, including fascinating facts about metals, the business industry, and other intriguing topics.
                </p>
                <div class="row gx-0"></div>
                <ul class="d-flex newsCollections row">
                    @foreach ($postsNews as $row) 
                    <li class="col-12 col-lg-6 card-height">
                        <a href="/news/{{ $row->slug }}">
                            <div class="news-container " >
                                <div class="card text-bg-dark bg-transparent card-news" style="border-radius: 30px;">
                                    <div class="overlay"></div>
                                    <img src="{{ $row->thumbnail}}" class="card-img" alt="...">
                                    <div class="card-img-overlay">
                                        <div class="d-flex text-container">
                                            <h1 class="text-center date forDesktop">
                                            <?php
                                                $dateTime = new DateTime($row->publish_date);
                                                echo $dateTime->format('M d'); // 15th Apr 2010
                                                ?>
                                            </h1>
                                            <div class="date forMobile">
                                                            <h1 class="text-center month"><?php
                                                                                            $dateTime = new DateTime($row->publish_date);
                                                                                            echo $dateTime->format('M'); // 15th Apr 2010
                                                                                            ?>
                                                            </h1>
                                                            <h1 class="text-center day">
                                                            <?php
                                                                                            $dateTime = new DateTime($row->publish_date);
                                                                                            echo $dateTime->format('d'); // 15th Apr 2010
                                                                                            ?>
                                                            </h1>
                                                        </div>
                                            <div class="card-right">
                                                <h3 class="card-title">{{ $row->title}}</h3>
                                                <div class="d-flex justify-content-between news-button">
                                                    <p class="mb-0 mt-3 news-card-content forDesktop">{{ $row->description}} ... <span><a href="/news/{{ $row->slug }}" class="continue">Continue Reading</a></span></p>
                                                    <p class="mb-0 mt-2 w-100 news-card-content forMobile">
                                                        
                                                        <?php
                                                        // echo $item->news_title;
                                                        $texts = $row->description;
                                                        $n = strlen($texts);
                                                        $jmlh_karakter = 45;
                                                        $tambahan = '...';
                                                        // echo $n;
                                                        if ($n < $jmlh_karakter) {
                                                            echo $row->description;
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
                                                         <span><a href="/news/{{ $row->slug }}" class="continue">Continue Reading</a></span></p>
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
            <!-- <div class="col-1 col-md-12"></div> -->
        </div>
        
        <div class="container-full container-section-pagination">
            <div class="row gx-0">
                <div class="col-1"></div>
                <div class="col-10">
                    {{ $postsNews->links('client.components.pagination') }}
                </div>
                
            </div>
            
        </div>



    </section>
    <!-- end-news-section -->

    <!-- import component message-section -->
    <div>
        @include('client.components.sections.message_section')
    </div>
    <!-- end component message-section -->

    <div class="black-cover"></div>

    @include('client.components.footer')
    @include('client.components.offcanvas2') 

    @include('client.components.search')

</main>

@endsection