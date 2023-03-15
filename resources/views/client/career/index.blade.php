@extends('client.layouts.app')
@section('title', 'Career | BNM Stainless Steel')
@section('container')
<!-- header -->
<header class="position-relative career">
    <!-- import component navbar -->
    @include('client.components.navbar')
    <img src="{{asset('/images/bnm/career/purple.png')}}" alt="" style="width: 100%;object-fit: cover;" class="h-100 forDesktop">
    <img src="{{asset('/images/bnm/career/career-banner-mobile.png')}}" alt="" style="width: 100%;object-fit: cover;" class="banner-img forMobile">
    <div class="desc-first career">
        <h1 class="title">CAREER</h1>
    </div>
</header>
<!-- end header -->
<main id="career" page="career">
    <!-- career-section -->
    <div class="mt-5">
        @include('client.components.sections.career_section')
    </div>
    <!-- end-career-section -->
    <section class="job__section">
        <div class="container-full">
            <div class="row gx-0">
                <div class="col-1"></div>
                <div class="col-11">
                    <div class="container-full mb-5 forDesktop">
                        <h1>
                            Current Openings
                        </h1>
                    </div>
                </div>
            </div>
            <div class="container-full mb-5 px-5 forMobile bg-special">
                <h1 class="py-5">
                    Current Openings
                </h1>
            </div>
            <div class="tableFull forDesktop">
                <div class="container">
                    <table class="table table-xl" id="jobtable">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Job Title</th>
                                <th scope="col">Department</th>
                                <th scope="col">Location</th>
                                <th scope="col">Employment Type</th>
                                <th scope="col">Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($career->count() == 0)
                                    
                            @else
                                @foreach ($career as $row)
                                	<tr class="job-list" data-position="{{ $row->title }}" data-date="<?php
                                		$dateTime = new DateTime($row->due_date);
                                		echo $dateTime->format('F d, Y');  ?>" data-loc="{{$row->location}}" data-division="{{ $row->departement }}" data-employee="{{ $row->type }}" data-requirement="{!! $row->description !!}" data-image="{{asset('/images/bnm/header/career-popup.jpg')}}" data-subjectemail={{$row->subject_email}}>
                                    	<td>{{ $row->title }}</td>
                                    	<td>{{ $row->departement }}</td>
                                    	<td>{{ $row->location }}</td>
                                    	<td>{{ $row->type }}</td>
                                    	<td>
                                         <?php
                                        $dateTime = new DateTime($row->due_date);
                                        echo $dateTime->format('F d, Y'); 
                                        ?>
                                    	</td>
                                    	<td class="d-none">
                                            <div class="requirement2" id="reqs">
                                                {!! $row->description !!}
                                            </div>
                                            <p class="subem">{{$row->subject_email}}</p>
                                        </td>
                                	</tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="px-5 job-mobile forMobile">
                @if($career->count() == 0)
                    <!--<div class="job-listm py-5 border-bottom" data-position="" data-date="" data-loc="" data-division="" data-employee="" data-requirement="" data-image="{{asset('/images/bnm/header/career-popup.jpg')}}">-->
                    <!--	<h3>-->
                    <!--         NO JOB FOUND-->
                    <!--	</h3>-->
                    <!--</div>-->
                @else
                  @foreach ($career as $row)
                    	<div class="job-list py-5 border-bottom" data-position="{{ $row->title }}" data-date="<?php
                                $dateTime = new DateTime($row->due_date);
                                echo $dateTime->format('F d,Y'); ?>" data-loc="{{$row->location}}" data-division="{{ $row->departement }}" data-employee="{{ $row->type }}" data-requirement="{!! $row->description !!}" data-image="{{asset('/images/bnm/header/career-popup.jpg')}}">
                        	<h3 class="job-position" data-position="marketing">
                            {{ $row->title }} &nbsp; |{{ $row->location }}
                        	</h3>
                        	<h3>
                            Employment Type : <u>{{ $row->type }}</u>
                        	</h3>
                        	<p>
                             <?php
                                $dateTime = new DateTime($row->due_date);
                                echo $dateTime->format('F d,Y'); 
                            ?>
                        	</p>
                        </div>
                    @endforeach
              @endif
        </div>
    </section>
    <section>
        <div class="container-full">
            <div class="row gx-0">
                <div class="col-1"></div>
                <div class="col-10">
                    {{ $career->links('client.components.pagination') }}
                </div>
            </div>
        </div>
    </section>
    <!-- import component message-section -->
    <div >
        @include('client.components.sections.message_section')
    </div>
    <!-- end component message-section -->
    <!-- popup specification -->
    <div class="popupCareer">
       <div class="body forDesktop">
            <div class="d-flex justify-content-center popSlider">
                <div class="w-85 bg-white ">
                    <div class="d-flex justify-content-end  px-5 py-3 pt-5 mb-5">
                        <div class=" close-popupCareer">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                                <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                            </svg>
                        </div>
                    </div>
                     <div class="row gx-0 mb-5">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <h1 id="career-position">
                                MARKETING STAFF
                            </h1>
                        </div>
                    </div>
                    <div class="row gx-0 body-container">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <div class="row gx-0 h-100">
                                <div class="col-md-8 mt-3">
                                    <div class="row gx-0 h-100">
                                        <!--<h1 id="career-position">-->
                                        <!--    MARKETING STAFF-->
                                        <!--</h1>-->
                                        <div class="col-md-4">
                                            <div class="left-popup-career">
                                                <h3>
                                                    Department
                                                </h3>
                                                <p id="career-division">
                                                </p>
                                            </div>
                                            <div class="left-popup-career">
                                                <h3>
                                                    Location
                                                </h3>
                                                <p id="career-location">
                                                    Bekasi
                                                </p>
                                            </div>
                                            
                                            <div class="left-popup-career">
                                                <h3>
                                                    Employment Type
                                                </h3>
                                                <p id="career-employee">
                                                    Probation
                                                </p>
                                            </div>
                                            <div class="left-popup-career">
                                                <h3>
                                                    Due Date
                                                </h3>
                                                <p id="career-date">
                                                    August 23,2022
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <h3 id="p-title">Qualifications
                                            </h3>

                                            <p id="career-req">
                                            </p>

                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-8 email">
                                            <div class="d-block " style="margin-bottom: -26px;">
                                                <p id="subject_email"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <div class="d-flex justify-content-end">
                                        <img src="{{asset('/images/bnm/header/career-popup.jpg')}}" alt="" class="w-85" style="height: 390px;" id="p-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="body forMobile">
            <div class="d-flex justify-content-center popSlider">
                <div class="w-85 bg-white pt-3 ">
                    <div class="px-5 pb-2 pt-4">
                        <div class="d-flex justify-content-between " style="height: 6%;">
                            <div class="d-flex flex-column justify-content-end">
                                <p id="career-dateM"></p>
                            </div>
                            <div class="close-popupCareer">
                                <svg width="50" height="50" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                                    <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                                </svg>
                            </div>
                        </div>
                        <div class="row gx-0">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <h1 id="career-positionM">
                                </h1>
                                <div>
                                    <span id="career-locationM"></span> <span>|</span>
                                    <span>
                                        <u id="career-employeeM">
                                        </u>
                                    </span>
                                </div>
                                <div class="mt-5">
                                    <h3>
                                        Requirement
                                    </h3>
                                    <p id="career-reqM">

                                    </p>
                                    <h3 class="mt-4 subject_emailM">
                                        
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <img src="{{asset('/images/bnm/components/career_section/gmbr1.png')}}" alt="" class="w-100 h-50 mobile-img" id="p-img2">
                </div>
            </div>
        </div>
    </div>
    <!-- end popup specification -->
    <div class="black-cover"></div>
    @include('client.components.offcanvas2')
    @include('client.components.footer')
    @include('client.components.search')
</main>
@endsection