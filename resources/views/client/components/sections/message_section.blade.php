

<section class="message__section3" id="contact">
    <div class="position-relative">
        <div class="row gx-0">
            <div class="col-12 col-xl-8 " style="background-color: #F2F2F2;">
            </div>

            <div class="col-12 col-xl-4">
                <img src="{{asset('/images/bnm/components/message_section/contact-us.jpg')}}" alt="" class="w-100 img-fluid forDesktop" style="height: 600px;height:770px">
            </div>
        </div>
        <div class="forDesktop">
            <div class="position-absolute box " id="contacts" >
                <div class="position-relative">
                    <div class="position-absolute box-style">
                        <div class="contact-box">
                            <h1 class="mb-5 contact-us">CONTACT US</h1>
                            <div class="group-input">
                                <span class="invalid-feedback-mandatory fs-4 fw-bold text-danger fst-italic">*All fields are mandatory</span>
                            </div>
                            
                            <!--<form method="POST" action="/contact-form" enctype="multipart/form-data">-->
                            <form>
                                {{ csrf_field() }}
                                <div class="row gx-0 label-input">
                                     <input type="hidden" id="gcap" name="gcap" value="">
                                    <div class="col-md-6">
                                        <div class="mb-4 pe-312 group-input">
                                            <label for="fullname" class="form-label">Full Name</label>
                                            <input type="text" class="form-control border-bottom" id="fullname" name="fullname" required>
                                        </div>
                                        <div class="mb-4 pe-312 group-input">
                                            <label for="company" class="form-label">Company</label>
                                            <input type="text" class="form-control border-bottom" id="company" name="company" required>
                                        </div>
                                        <div class="mb-4 pe-312 group-input">
                                            <label for="businessaddress" class="form-label">Business Address</label>
                                            <input type="text" class="form-control border-bottom" id="businessaddress" name="address" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-4 pe-312 group-input">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control border-bottom " id="email" name="email" required>
                                        </div>
                                        <div class="mb-4 pe-312 group-input">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control border-bottom " id="title" name="subject" required>
                                        </div>
                                        <div class="mb-4 pe-312 group-input">
                                            <label for="phone" class="form-label">Phone</label>
                                            <input type="number" class="form-control border-bottom phone-limit" id="phone" name="phone" required>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="d-flex  border-bottom margin-r-3-5 mb-4">
                                    <div class="mb-3 pe-2 w-90 group-input ">
                                        <label for="exampleInputPassword2" class="form-label">Message</label>
                                        <textarea class="form-control" aria-label="With textarea" id="message" name="message" required></textarea>
                                    </div>
                                    <div class="border-0 bg-transparent send-button" id="submit" >
                                        <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.0851 0H19.9149C20.836 0.125134 21.7591 0.225242 22.676 0.379574C31.5381 1.86866 38.3258 9.40588 38.7801 18.2528C39.2614 27.592 33.4632 35.7716 24.5928 38.1929C23.1407 38.5891 21.6139 38.7372 20.1223 39H18.8777C17.9919 38.8707 17.104 38.7581 16.2203 38.61C7.46809 37.1418 0.717767 29.615 0.21782 20.7513C-0.300797 11.5644 5.50356 3.26182 14.2018 0.863422C15.7867 0.42754 17.4504 0.279465 19.0851 0ZM30.3432 12.1067C30.2748 12.1067 30.2063 12.1213 30.1358 12.1359C22.4091 13.7918 14.6852 15.4554 6.96399 17.1266C6.63 17.1996 6.14665 17.6105 6.1342 17.8795C6.15165 18.0882 6.21552 18.2902 6.32109 18.4707C6.42666 18.6512 6.57122 18.8055 6.7441 18.9223C8.08628 19.7023 9.46995 20.4135 10.8661 21.0934C11.4718 21.3895 11.7207 21.7482 11.6959 22.449C11.6544 24.253 11.671 26.0612 11.7394 27.8714C11.756 28.299 11.9676 28.9142 12.2746 29.0727C12.5816 29.2312 13.1832 28.9747 13.5193 28.7224C14.2972 28.1509 14.9901 27.471 15.7265 26.8328C16.463 26.1947 17.1538 25.1852 17.9607 25.081C18.7677 24.9767 19.6805 25.7984 20.5455 26.2176C20.7322 26.3073 20.9189 26.397 21.0973 26.5012C21.8338 26.9329 22.3607 26.7598 22.8357 26.0424C25.5326 21.9756 28.2729 17.9254 30.9946 13.869C31.1 13.7329 31.1898 13.5853 31.2622 13.4289C31.5568 12.6927 31.117 12.0837 30.337 12.1067H30.3432Z" fill="#FFAF08" />
                                        </svg>

                                    </div>
                                    
                                </div>
                                
                                <!--<div class="g-recaptcha" data-sitekey="6LcTMmgjAAAAAJ87qhpH57Qr71IOtn-yGpJT-JQb" data-size="invisible" data-callback="onSubmit"></div>-->
                                <!--<div id="contact-recaptcha"></div>-->
                                
                                
                                
                            </form>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="FALSE" id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Agree to
                                    <a href="/privacy" style="text-decoration: none;">
                                        <span style="color:#FFAF08 ;">
                                            Privacy Policy
                                        </span>
                                    </a>
                                </label>
                                <!--<div class="invalid-feedback">-->
                                <!--    Must filled-->
                                <!--</div>-->

                            </div>
                        </div>
                        <div class="position-absolute down pt-3 pb-2 pe-312 ">
                            <div class="d-flex justify-content-between ">
                                <h1>
                                    Connect with us anytime, anywhere  :
                                </h1>
                                <div class="d-flex justify-content-between sosmed-container pe-312">
                                    <a target="_blank" rel="noopener" href="https://www.facebook.com/people/BNM-Stainless-Steel/100068964490029/" class="btn btn-white p-0 mx-2 rounded-circle border-0 fb-button">
                                        <svg width="28" height="28" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.4215 15.8498C30.4265 24.2395 23.5971 31.0844 15.2183 31.0874C6.79023 31.0904 -0.0020079 24.2837 4.45261e-07 15.8377C0.00200879 7.4339 6.81734 0.61311 15.2072 0.619145C23.5891 0.626185 30.4165 7.46106 30.4215 15.8498ZM19.5814 17.7878C19.7883 16.4643 19.9861 15.2001 20.198 13.8524C18.9227 13.8524 17.7317 13.8524 16.5177 13.8524C16.5177 12.8246 16.5016 11.8701 16.5237 10.9157C16.5378 10.3143 16.843 9.83154 17.3843 9.59821C17.802 9.41819 18.276 9.3327 18.7329 9.28644C19.241 9.23515 19.7591 9.27437 20.3365 9.27437C20.3365 8.29581 20.3215 7.37959 20.3446 6.46338C20.3536 6.09931 20.213 6.01483 19.8786 6.0088C19.009 5.9917 18.1394 5.95348 17.2718 5.89716C14.906 5.74329 13.1738 6.94915 12.5793 9.24822C12.4136 9.88786 12.3805 10.5697 12.3513 11.2345C12.3142 12.0984 12.3423 12.9654 12.3423 13.8916C11.1413 13.8916 10.0136 13.8916 8.88193 13.8916C8.88193 15.2152 8.88193 16.4773 8.88193 17.8059C10.0488 17.8059 11.1745 17.8059 12.3694 17.8059C12.3694 21.0272 12.3694 24.1812 12.3694 27.327C13.7863 27.327 15.1309 27.327 16.5247 27.327C16.5247 24.1419 16.5247 20.997 16.5247 17.7878C17.563 17.7878 18.5582 17.7878 19.5814 17.7878Z" fill="#FFAF08" class="outside" />
                                            <path d="M19.5814 17.7875C18.5591 17.7875 17.564 17.7875 16.5227 17.7875C16.5227 20.9978 16.5227 24.1417 16.5227 27.3268C15.1289 27.3268 13.7843 27.3268 12.3674 27.3268C12.3674 24.1809 12.3674 21.027 12.3674 17.8056C11.1724 17.8056 10.0467 17.8056 8.87988 17.8056C8.87988 16.4771 8.87988 15.2159 8.87988 13.8914C10.0106 13.8914 11.1393 13.8914 12.3403 13.8914C12.3403 12.9661 12.3122 12.0992 12.3493 11.2343C12.3784 10.5695 12.4116 9.88759 12.5773 9.24796C13.1717 6.94888 14.9049 5.74302 17.2698 5.8969C18.1374 5.95322 19.007 5.99144 19.8766 6.00853C20.211 6.01457 20.3516 6.09905 20.3425 6.46312C20.3194 7.37933 20.3345 8.29554 20.3345 9.27411C19.7571 9.27411 19.24 9.23388 18.7308 9.28617C18.2739 9.33244 17.8 9.41792 17.3822 9.59795C16.84 9.83127 16.5347 10.314 16.5217 10.9154C16.5006 11.8689 16.5156 12.8243 16.5156 13.8521C17.7297 13.8521 18.9216 13.8521 20.1959 13.8521C19.9861 15.2008 19.7882 16.464 19.5814 17.7875Z" fill="#3A2465" />
                                        </svg>

                                    </a>
                                    <a target="_blank" rel="noopener" href="https://www.instagram.com/bnmstainless/" class="btn btn-white p-0 mx-2 rounded-circle border-0 ig-button">
                                        <svg width="28" height="28" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.4165 15.8307C30.4185 24.2777 23.6292 31.0865 15.2022 31.0865C6.82136 31.0865 0.00502365 24.2566 2.77239e-06 15.8548C-0.0050181 7.4641 6.81032 0.635261 15.2032 0.619169C23.5861 0.603077 30.4144 7.4299 30.4165 15.8307ZM15.2072 6.13755C13.7351 6.13755 12.263 6.13454 10.7909 6.13856C7.82052 6.14761 5.49987 8.46379 5.49585 11.4266C5.49183 14.3583 5.49384 17.291 5.49485 20.2227C5.49585 23.2167 7.73516 25.5349 10.7306 25.5711C13.7251 25.6073 16.7205 25.6083 19.714 25.5711C22.6562 25.5339 24.9096 23.2599 24.9407 20.3082C24.9728 17.3262 24.9768 14.3432 24.9407 11.3613C24.9055 8.40244 22.5769 6.1456 19.6236 6.13755C18.1515 6.13454 16.6793 6.13755 15.2072 6.13755Z" fill="#FFAF08" class="outside" />
                                            <path d="M15.2069 6.13708C16.6791 6.13708 18.1512 6.13407 19.6233 6.13708C22.5766 6.14412 24.9053 8.40196 24.9404 11.3608C24.9766 14.3428 24.9715 17.3257 24.9404 20.3077C24.9093 23.2595 22.6559 25.5334 19.7137 25.5706C16.7192 25.6088 13.7248 25.6068 10.7303 25.5706C7.73488 25.5344 5.49557 23.2162 5.49456 20.2222C5.49356 17.2905 5.49155 14.3578 5.49557 11.4262C5.49958 8.46331 7.82023 6.14714 10.7906 6.13809C12.2627 6.13407 13.7348 6.13708 15.2069 6.13708ZM23.2273 15.8483C23.2273 14.4232 23.2313 12.9991 23.2263 11.574C23.2183 9.40165 21.7029 7.85586 19.539 7.8448C16.661 7.83072 13.782 7.83172 10.9041 7.8448C8.74006 7.85385 7.20969 9.38556 7.19764 11.5609C7.18158 14.4272 7.18158 17.2935 7.19764 20.1588C7.20969 22.3262 8.74809 23.8518 10.9161 23.8609C13.7941 23.872 16.673 23.872 19.551 23.8609C21.6839 23.8518 23.2142 22.3081 23.2263 20.1729C23.2333 18.7317 23.2273 17.2905 23.2273 15.8483Z" fill="#3A2465" />
                                            <path d="M23.2272 15.8496C23.2272 17.2908 23.2333 18.732 23.2262 20.1742C23.2152 22.3094 21.6838 23.8542 19.551 23.8622C16.673 23.8743 13.794 23.8733 10.9161 23.8622C8.74804 23.8542 7.20965 22.3275 7.1976 20.1602C7.18153 17.2939 7.18153 14.4276 7.1976 11.5623C7.20965 9.38689 8.74001 7.85518 10.904 7.84612C13.782 7.83305 16.6609 7.83204 19.5389 7.84612C21.7029 7.85719 23.2192 9.40298 23.2262 11.5753C23.2313 13.0004 23.2272 14.4255 23.2272 15.8496ZM15.235 21.1619C18.1451 21.1619 20.5642 18.7491 20.5551 15.8567C20.5461 12.9693 18.116 10.5485 15.225 10.5475C12.3149 10.5465 9.93598 12.9381 9.93498 15.8667C9.93397 18.8014 12.2958 21.1619 15.235 21.1619ZM20.4025 11.7815C21.0291 11.7936 21.5673 11.2726 21.5663 10.6551C21.5653 10.0607 21.0492 9.54177 20.4497 9.53171C19.806 9.52165 19.2939 10.0205 19.2959 10.6571C19.2979 11.2756 19.7839 11.7704 20.4025 11.7815Z" fill="#FFAF08" class="outside" />
                                            <path d="M15.2356 21.1612C12.2964 21.1612 9.93454 18.8018 9.93555 15.8661C9.93655 12.9375 12.3154 10.5459 15.2255 10.5469C18.1166 10.5479 20.5467 12.9686 20.5557 15.8561C20.5647 18.7485 18.1457 21.1612 15.2356 21.1612ZM18.6899 15.8611C18.6899 13.9724 17.1325 12.4075 15.2376 12.3924C13.3297 12.3773 11.739 13.9573 11.739 15.8661C11.739 17.7881 13.3056 19.362 15.2175 19.361C17.1295 19.359 18.6899 17.7871 18.6899 15.8611Z" fill="#3A2465" />
                                            <path d="M20.4025 11.7802C19.7839 11.7682 19.2979 11.2743 19.2959 10.6558C19.2939 10.0192 19.806 9.52037 20.4497 9.53042C21.0492 9.53947 21.5643 10.0594 21.5663 10.6538C21.5673 11.2723 21.0291 11.7933 20.4025 11.7802Z" fill="#3A2465" />
                                            <path d="M18.6901 15.8604C18.6901 17.7864 17.1296 19.3593 15.2187 19.3603C13.3067 19.3614 11.7402 17.7874 11.7402 15.8655C11.7402 13.9566 13.3308 12.3766 15.2388 12.3917C17.1326 12.4058 18.6901 13.9707 18.6901 15.8604Z" fill="#FFAF08" class="outside" />
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/bnmstainless" rel="noopener" target="_blank" class="btn btn-white p-0 mx-2 rounded-circle border-0 twitter-button">
                                        <svg width="28" height="28" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.4205 15.8619C30.4365 24.2385 23.6031 31.0784 15.2092 31.0875C6.81635 31.0965 0.00804242 24.2868 9.02172e-06 15.875C-0.00902855 7.46212 6.77317 0.643336 15.1711 0.619199C23.567 0.596068 30.4044 7.42994 30.4205 15.8619ZM6.13351 22.1688C6.3464 22.3035 6.4458 22.379 6.55526 22.4353C8.22319 23.2831 9.98552 23.7387 11.8613 23.7719C18.268 23.8865 23.2687 18.8972 23.1071 12.5309C23.1 12.2504 23.1593 12.0784 23.4224 11.9285C24.0671 11.5624 24.5189 11.0103 24.9056 10.2852C24.5099 10.4089 24.2267 10.5084 23.9365 10.5849C23.6654 10.6563 23.3882 10.7025 23.1131 10.7589C23.6955 10.1373 24.2207 9.54396 24.4938 8.70117C23.8441 8.9878 23.2758 9.22716 22.7175 9.48864C22.363 9.65459 22.1089 9.60631 21.7836 9.34483C20.44 8.26871 18.9408 8.10477 17.4124 8.87415C15.9282 9.6214 15.2273 10.8896 15.2815 12.5631C15.2876 12.7401 15.2825 12.9171 15.2825 13.1344C11.9407 13.0962 9.48143 11.4186 7.30639 9.0934C6.27209 11.1863 6.8053 12.8568 8.51843 14.2658C8.48127 14.3101 8.44411 14.3543 8.40696 14.3976C7.87274 14.2537 7.33953 14.1089 6.77417 13.9571C6.93886 15.7663 7.84061 17.0245 9.60193 17.647C9.59189 17.6933 9.58285 17.7396 9.57281 17.7848C9.07976 17.808 8.58671 17.8311 8.06052 17.8562C8.35274 18.5834 8.74436 19.2441 9.38201 19.6575C10.0046 20.0608 10.7176 20.3233 11.4074 20.6562C9.96042 21.9254 8.11676 22.0732 6.13351 22.1688Z" fill="#FFAF08" class="outside" />
                                            <path d="M6.13379 22.1688C8.11703 22.0733 9.9607 21.9255 11.4107 20.6552C10.7209 20.3223 10.0069 20.0598 9.38531 19.6566C8.74766 19.2432 8.35603 18.5824 8.06381 17.8553C8.59 17.8302 9.08305 17.807 9.5761 17.7839C9.58614 17.7376 9.59518 17.6914 9.60522 17.6461C7.8439 17.0236 6.94215 15.7654 6.77746 13.9561C7.34281 14.109 7.87603 14.2528 8.41025 14.3966C8.44741 14.3524 8.48456 14.3081 8.52171 14.2649C6.80859 12.8559 6.27537 11.1844 7.30967 9.09247C9.48472 11.4177 11.9439 13.0952 15.2858 13.1335C15.2858 12.9152 15.2909 12.7382 15.2848 12.5622C15.2306 10.8887 15.9305 9.62047 17.4157 8.87322C18.944 8.10485 20.4433 8.26778 21.7869 9.3439C22.1122 9.60539 22.3663 9.65266 22.7207 9.48772C23.2791 9.22623 23.8484 8.98687 24.4971 8.70024C24.224 9.54303 23.6988 10.1364 23.1164 10.7579C23.3915 10.7006 23.6687 10.6544 23.9398 10.584C24.229 10.5075 24.5122 10.408 24.9088 10.2842C24.5222 11.0094 24.0694 11.5615 23.4257 11.9276C23.1616 12.0774 23.1033 12.2494 23.1104 12.53C23.272 18.8962 18.2713 23.8856 11.8646 23.771C9.98882 23.7378 8.22548 23.2822 6.55855 22.4344C6.44609 22.379 6.34667 22.3036 6.13379 22.1688Z" fill="#3A2465" />
                                        </svg>
                                    </a>
                                    <a target="_blank" rel="noopener" href="https://www.linkedin.com/in/bnmstainless/" class="btn btn-transparent p-0 mx-2 rounded-circle border-0 linked-button">
                                        <svg width="28" height="28" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.000396601 15.834C0.0616513 7.34769 6.88904 0.569133 15.3261 0.619419C23.7552 0.668699 30.4861 7.54682 30.4209 16.0441C30.3576 24.3695 23.4619 31.1581 15.1413 31.0877C6.75246 31.0163 -0.0598539 24.1543 0.000396601 15.834ZM15.6254 12.8128C14.4444 12.8128 13.3489 12.8128 12.2312 12.8128C12.2312 16.6586 12.2312 20.4683 12.2312 24.3403C13.13 24.3403 13.9956 24.3433 14.8612 24.3393C15.7268 24.3353 15.6173 24.4228 15.6203 23.5981C15.6264 21.7717 15.6053 19.9453 15.6304 18.1189C15.6484 16.8025 16.7159 15.7957 18.0364 15.7857C19.2725 15.7766 20.1863 16.6938 20.2646 18.0284C20.2757 18.2125 20.2727 18.3965 20.2727 18.5816C20.2727 20.3406 20.2707 22.1006 20.2757 23.8596C20.2767 24.0547 20.1803 24.3373 20.5388 24.3383C21.5711 24.3423 22.6034 24.3393 23.6487 24.3393C23.6698 24.1844 23.6929 24.0879 23.6929 23.9913C23.6939 21.4951 23.712 18.9979 23.6748 16.5017C23.6668 15.9818 23.5242 15.4357 23.3254 14.9499C22.1133 11.979 17.5895 12.1017 16.0762 13.7964C15.9597 13.9271 15.8352 14.0498 15.6243 14.2721C15.6254 13.7089 15.6254 13.2824 15.6254 12.8128ZM10.1657 24.3122C10.1657 20.4381 10.1657 16.6265 10.1657 12.8218C9.01086 12.8218 7.90124 12.8218 6.80167 12.8218C6.80167 16.6767 6.80167 20.4874 6.80167 24.3122C7.94442 24.3122 9.04098 24.3122 10.1657 24.3122ZM10.5392 9.01316C10.5332 7.83546 9.60231 6.92327 8.4204 6.93735C7.29572 6.95043 6.41004 7.8606 6.40702 9.00712C6.40401 10.1838 7.29371 11.1071 8.43947 11.1161C9.60432 11.1252 10.5462 10.1828 10.5392 9.01316Z" fill="#FFAF08" class="outside" />
                                            <path d="M15.6255 12.8124C15.6255 13.2821 15.6255 13.7085 15.6255 14.2697C15.8374 14.0475 15.9609 13.9248 16.0774 13.794C17.5907 12.0994 22.1155 11.9767 23.3265 14.9476C23.5244 15.4333 23.668 15.9784 23.676 16.4994C23.7132 18.9956 23.6951 21.4928 23.6941 23.989C23.6941 24.0856 23.67 24.1821 23.6499 24.337C22.6045 24.337 21.5722 24.339 20.54 24.336C20.1815 24.335 20.2769 24.0524 20.2769 23.8573C20.2718 22.0983 20.2739 20.3382 20.2739 18.5792C20.2739 18.3952 20.2769 18.2101 20.2658 18.0261C20.1875 16.6925 19.2737 15.7743 18.0376 15.7833C16.7171 15.7934 15.6506 16.8011 15.6316 18.1166C15.6054 19.943 15.6275 21.7694 15.6215 23.5958C15.6185 24.4205 15.728 24.333 14.8624 24.337C13.9968 24.341 13.1312 24.338 12.2324 24.338C12.2324 20.466 12.2324 16.6563 12.2324 12.8104C13.3491 12.8124 14.4446 12.8124 15.6255 12.8124Z" fill="#3A2465" />
                                            <path d="M10.1657 24.3116C9.04107 24.3116 7.94451 24.3116 6.80176 24.3116C6.80176 20.4859 6.80176 16.6762 6.80176 12.8213C7.90133 12.8213 9.01195 12.8213 10.1657 12.8213C10.1657 16.6259 10.1657 20.4376 10.1657 24.3116Z" fill="#3A2465" />
                                            <path d="M10.5394 9.01247C10.5454 10.1811 9.60453 11.1235 8.43968 11.1154C7.29392 11.1064 6.40422 10.1841 6.40723 9.00643C6.41025 7.85991 7.29493 6.94974 8.42061 6.93666C9.60252 6.92359 10.5334 7.83477 10.5394 9.01247Z" fill="#3A2465" />
                                        </svg>
                                    </a>
                                    <a target="_blank" rel="noopener" href="https://www.youtube.com/channel/UCCXNRxF1A87XUGfJ8m593MQ" class="btn btn-transparent p-0 mx-2 rounded-circle border-0 youtube-button">
                                        <svg width="28" height="28" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M30.7557 15.8665C30.7313 24.3819 23.7964 31.2929 15.3134 31.2532C6.79786 31.2146 -0.0222798 24.3128 5.46989e-05 15.7577C0.0223892 7.27887 6.94812 0.415691 15.4464 0.452294C23.897 0.487881 30.779 7.41715 30.7557 15.8665ZM15.4078 9.01551C13.2871 9.13955 11.1419 9.22801 9.00288 9.39984C7.03745 9.55744 6.26386 10.3495 6.07097 12.3017C5.83544 14.684 5.83341 17.0703 6.08315 19.4526C6.273 21.2655 6.98873 22.0006 8.79579 22.2304C11.7064 22.6015 14.6322 22.6005 17.557 22.5192C19.0757 22.4765 20.5965 22.3718 22.1072 22.204C23.7061 22.0261 24.4289 21.356 24.6066 19.7576C24.7873 18.1308 24.8421 16.4837 24.8512 14.8446C24.8573 13.7831 24.7264 12.7155 24.5771 11.6611C24.4066 10.4542 23.6716 9.73029 22.4655 9.50559C22.2168 9.45882 21.9671 9.40188 21.7153 9.38663C19.6219 9.25851 17.5296 9.13955 15.4078 9.01551Z" fill="#FFAF08" class="outside" />
                                            <path d="M15.4074 9.01562C17.5291 9.13967 19.6215 9.25863 21.7128 9.38675C21.9646 9.402 22.2143 9.45894 22.463 9.50571C23.6691 9.7294 24.4041 10.4544 24.5746 11.6613C24.7239 12.7146 24.8548 13.7832 24.8488 14.8448C24.8396 16.4838 24.7848 18.1299 24.6041 19.7578C24.4264 21.3561 23.7036 22.0262 22.1047 22.2041C20.595 22.3719 19.0732 22.4776 17.5545 22.5193C14.6297 22.6006 11.7039 22.6017 8.79329 22.2305C6.98622 22.0008 6.27152 21.2656 6.08066 19.4527C5.83092 17.0705 5.83296 14.6841 6.06848 12.3018C6.26137 10.3486 7.03495 9.55756 9.00038 9.39996C11.1414 9.22915 13.2866 9.13967 15.4074 9.01562ZM13.518 13.0115C13.518 14.9464 13.518 16.7634 13.518 18.678C15.1688 17.7161 16.7535 16.7929 18.4113 15.8259C16.7373 14.8631 15.1647 13.9581 13.518 13.0115Z" fill="#3A2465" />
                                            <path d="M13.5186 13.0117C15.1652 13.9593 16.7388 14.8633 18.4118 15.8261C16.753 16.7931 15.1693 17.7163 13.5186 18.6782C13.5186 16.7626 13.5186 14.9466 13.5186 13.0117Z" fill="#FFAF08" class="outside" />
                                        </svg>
                                    </a>
                                    <a target="_blank" rel="noopener" href="https://api.whatsapp.com/send?phone=628119115655" class="btn btn-transparent p-0 mx-2 rounded-circle border-0 whatsapp-button">
                                        <svg width="28" height="28" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="15.817" cy="15.8023" r="15.1832" fill="#FFAF08" class="outside" />
                                            <g clip-path="url(#clip0_1440_85)">
                                                <path d="M22.439 9.17481L22.4507 9.14451C20.6755 7.42837 18.3397 6.45898 15.8535 6.45898C8.71202 6.45898 4.22904 14.1966 7.79411 20.348L6.47363 25.146L11.4063 23.8598C13.5552 25.0208 15.3155 24.9183 15.8567 24.9865C24.1358 24.9865 28.2567 14.97 22.439 9.17481ZM15.8692 23.3941H15.8644H15.8535C13.376 23.3941 11.7931 22.2207 11.6373 22.1532L8.71749 22.9123L9.49854 20.0728L9.3124 19.7808C8.54083 18.5546 8.13165 17.1352 8.13207 15.6864C8.13207 8.84012 16.4984 5.41623 21.3397 10.2548C26.1694 15.0441 22.7785 23.3941 15.8692 23.3941Z" fill="#3A2465" />
                                                <path d="M20.1051 17.5984L20.0982 17.6568C19.8639 17.54 18.7223 16.9816 18.5098 16.9046C18.0325 16.7279 18.1671 16.8765 17.2507 17.9265C17.1146 18.0783 16.9791 18.09 16.7478 17.9849C16.5142 17.8681 15.7645 17.6228 14.8769 16.8287C14.1856 16.2082 13.7214 15.4505 13.5845 15.2169C13.3564 14.8227 13.8334 14.7669 14.2681 13.9446C14.3459 13.7811 14.3046 13.6526 14.2484 13.5365C14.1922 13.4205 13.7254 12.2751 13.5305 11.8189C13.3436 11.3638 13.1531 11.4222 13.0071 11.4222C12.5586 11.3831 12.2308 11.3893 11.9418 11.6901C10.6852 13.0712 11.002 14.4961 12.0775 16.0115C14.1904 18.7769 15.3163 19.2864 17.3751 19.9934C17.931 20.1701 18.4379 20.1452 18.8387 20.0876C19.2858 20.0168 20.2146 19.5262 20.4081 18.9773C20.6015 18.4284 20.6066 17.9729 20.5482 17.8678C20.4898 17.7626 20.338 17.7042 20.1044 17.5991L20.1051 17.5984Z" fill="#3A2465" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1440_85">
                                                    <rect width="18.687" height="18.687" fill="white" transform="translate(6.47363 6.45898)" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="position-absolute right p-4">
                            <h1>
                                Our Location
                            </h1>
                            <p class="mt-3">
                                Kawasan Industri Jababeka Tahap 2 <br>
                                Jl. Industri Selatan 4, Blok PP-4/4 <br>
                                Pasirsari, Cikarang Selatan, <br>
                                Bekasi 17530, Indonesia
                            </p>

                            <div class="d-flex  mt-4 location-button">
                                <img src="{{asset('/images/bnm/career-icon/loc.png')}}" alt="" style="width: 15px;height:18px">
                                <a href="https://goo.gl/maps/DqUCAmU6B2dbQhuy6" target="_blank" rel="noopener" style="text-decoration: none;">
                                    <p class="g-map ">
                                        Google Map
                                    </p>
                                </a>
                            </div>
                            <div class="d-flex  mt-4">
                                <img src="{{asset('/images/bnm/career-icon/skyp.png')}}" alt="" style="width: 15px;height:15px">
                                <p class="g-map">
                                    (+62-21) 8983 0472, 8983 0535
                                </p>
                            </div>
                            <div class="d-flex  mt-2">
                                <img src="{{asset('/images/bnm/career-icon/print.png')}}" alt="" style="width: 15px;height:15px">
                                <p class="g-map">
                                    (+62-21) 893 7635
                                </p>
                            </div>
                            <div class="d-flex  mt-2">
                                <img src="{{asset('/images/bnm/career-icon/phone.png')}}" alt="" style="width: 15px;height:15px">
                                <div>
                                    <p class="g-map">
                                        (+62) 811 911 5655
                                    </p>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div>Kanan</div> -->

            </div>
        </div>
    </div>
    <div class="g-recaptcha" data-sitekey="6LdSIpMjAAAAAC8WbtBWdmJFRIKjMqVGtHY8LGN1" data-size="invisible" data-callback="onSubmit"></div>
     <div class="forMobile">
        <div class="d-flex justify-content-center " style="margin-top: 6.5rem;" id="contactsM">
            <div class="w-85 bg-white" style="box-shadow: 0px 2px 10px rgb(0 0 0 / 34%);">
                <div class=" p-5">
                    <div class=" message-form">
                        <h1 class=" contact-us">CONTACT US</h1>
                        <div class="group-input">
                                <span class="invalid-feedback-mandatory fs-5 fw-bold text-danger fst-italic">*All fields are mandatory</span>
                        </div>
                        
                        <form >    
                            {{ csrf_field() }}
                            <div class="row gx-0">
                                <div class="col-12">
                                    <div class="d-flex">
                                        
                                    </div>
                                    <div class="mb-2 pe-4 group-input">
                                        <div class="d-flex">
                                            <label for="fullnameM" class="form-label w-100">Full Name</label>
                                        </div>
                                        <input type="text" class="form-control border-bottom" id="fullnameM" name="fullname" required>
                                    </div>
                                    <div class="mb-2 pe-4 group-input">
                                        <div class="d-flex">
                                            <label for="emailM" class="form-label w-100">Email</label>
                                        </div>
                                        <input type="email" class="form-control border-bottom" id="emailM" name="email" required>
                                        <!--<div class="invalid-feedback">-->
                                        <!--    Wajib Diisi!-->
                                        <!--</div>-->
                                    </div>
                                    <div class="mb-2 pe-4 group-input">
                                        <div class="d-flex">
                                            <label for="companyM" class="form-label w-100">Company</label>
                                        </div>
                                        <input type="text" class="form-control border-bottom" id="companyM" name="company" required>
                                        <!--<div class="invalid-feedback">-->
                                        <!--    Wajib Diisi!-->
                                        <!--</div>-->
                                    </div>
                                   
                                </div>
                                <div class="col-12">
                                    <div class="mb-2 pe-4 group-input">
                                        <div class="d-flex">
                                            <label for="titleM" class="form-label w-100">Title</label>
                                        </div>
                                        <input type="text" class="form-control border-bottom" id="titleM" name="subject" required>
                                        <!--<div class="invalid-feedback">-->
                                        <!--    Wajib Diisi!-->
                                        <!--</div>-->
                                    </div>
                                     <div class="mb-2 pe-4 group-input">
                                        <div class="d-flex">
                                            <label for="businessaddressM" class="form-label w-100">Business Address</label>
                                        </div>
                                        <input type="text" class="form-control border-bottom" id="businessaddressM" name="address" required>
                                        <!--<div class="invalid-feedback">-->
                                        <!--    Wajib Diisi!-->
                                        <!--</div>-->
                                    </div>
                                    <div class="mb-2 pe-4 group-input">
                                        <div class="d-flex">
                                            <label for="phoneM" class="form-label w-100">Phone</label>
                                        </div>
                                        <input type="number" class="form-control border-bottom phone-limit" id="phoneM" name="phone" required>
                                        <!--<div class="invalid-feedback">-->
                                        <!--    Wajib Diisi!-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex border-bottom mb-4" style="margin-right:2rem">
                                <div class="mb-2 pe-2 w-90 group-input">
                                    <div class="d-flex">
                                        <label for="exampleInputPassword2" class="form-label">Message</label>
                                    </div>
                                    <textarea class="form-control" aria-label="With textarea" name="message" id="messageM" required></textarea>
                                    <!--<div class="invalid-feedback">-->
                                    <!--    Wajib Diisi!-->
                                    <!--</div>-->
                                </div>
                                <button class="border-0 bg-transparent send-button" id="submitM" style="    display: flex;flex-direction: column;justify-content: end;padding-bottom: 10px;">
                                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19.0851 0H19.9149C20.836 0.125134 21.7591 0.225242 22.676 0.379574C31.5381 1.86866 38.3258 9.40588 38.7801 18.2528C39.2614 27.592 33.4632 35.7716 24.5928 38.1929C23.1407 38.5891 21.6139 38.7372 20.1223 39H18.8777C17.9919 38.8707 17.104 38.7581 16.2203 38.61C7.46809 37.1418 0.717767 29.615 0.21782 20.7513C-0.300797 11.5644 5.50356 3.26182 14.2018 0.863422C15.7867 0.42754 17.4504 0.279465 19.0851 0ZM30.3432 12.1067C30.2748 12.1067 30.2063 12.1213 30.1358 12.1359C22.4091 13.7918 14.6852 15.4554 6.96399 17.1266C6.63 17.1996 6.14665 17.6105 6.1342 17.8795C6.15165 18.0882 6.21552 18.2902 6.32109 18.4707C6.42666 18.6512 6.57122 18.8055 6.7441 18.9223C8.08628 19.7023 9.46995 20.4135 10.8661 21.0934C11.4718 21.3895 11.7207 21.7482 11.6959 22.449C11.6544 24.253 11.671 26.0612 11.7394 27.8714C11.756 28.299 11.9676 28.9142 12.2746 29.0727C12.5816 29.2312 13.1832 28.9747 13.5193 28.7224C14.2972 28.1509 14.9901 27.471 15.7265 26.8328C16.463 26.1947 17.1538 25.1852 17.9607 25.081C18.7677 24.9767 19.6805 25.7984 20.5455 26.2176C20.7322 26.3073 20.9189 26.397 21.0973 26.5012C21.8338 26.9329 22.3607 26.7598 22.8357 26.0424C25.5326 21.9756 28.2729 17.9254 30.9946 13.869C31.1 13.7329 31.1898 13.5853 31.2622 13.4289C31.5568 12.6927 31.117 12.0837 30.337 12.1067H30.3432Z" fill="#FFAF08" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                            <!--<div class="g-recaptcha" data-sitekey="6LcDZHEjAAAAAD4154VY3HfhsYwtIKvUblZ1X69e" style="transform: scale(0.77); -webkit-transform: scale(0.77); transform-origin: 0 0; -webkit-transform-origin: 0 0;"></div>-->
                            <!--<div class="g-recaptcha" data-sitekey="6LficZYjAAAAAOqT9e7IiYto4zLtVUgnaKsLYfr6" data-size="invisible" data-callback="onSubmit"></div>-->
                             <!--<div id="recaptcha2"></div>-->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="FALSE" id="flexCheckDefaultM" required>
                            <label class="form-check-label" for="flexCheckDefault1">
                                Agree to
                                <span>
                                    Privacy Policy
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="down-message-form bg-blue px-5 ">
                    <h1 class="text-white white-loc pt-4">Our Location</h1>
                    <div class="d-flex ">
                        <p class="g-map text-white ">
                            Kawasan Industri Jababeka Tahap 2 <br>
                            Jl. Industri Selatan 4, Blok PP-4/4 <br>
                            Pasirsari, Cikarang Selatan, <br>
                            Bekasi 17530, Indonesia
                        </p>
                    </div>
                    <div class="d-flex  mt-4 mb-4 location-button">
                        <img src="{{asset('/images/bnm/career-icon/loc.png')}}" alt="" style="width: 15px;height:18px">
                        <a href="https://goo.gl/maps/DqUCAmU6B2dbQhuy6" target="_blank" rel="noopener" style="text-decoration: none;">
                            <p class="g-map text-white ms-4">
                                Google Map
                            </p>
                        </a>
                    </div>
                    <div class="d-flex ">
                        <img src="{{asset('/images/bnm/career-icon/skyp.png')}}" alt="" style="height: 15px;width: 15px;">
                        <p class="g-map text-white ms-4">
                            (+62-21) 8983 0472, 8983 0535
                        </p>
                    </div>
                    <div class="d-flex ">
                        <img src="{{asset('/images/bnm/career-icon/print.png')}}" alt="" style="height: 15px;width: 15px;">
                        <p class="g-map text-white ms-4">
                            (+62-21) 893 7635
                        </p>
                    </div>
                    <div class="d-flex">
                        <img src="{{asset('/images/bnm/career-icon/phone.png')}}" alt="" style="height: 15px;width: 15px;">
                        <p class="g-map text-white ms-4">
                            (+62) 811 911 5655
                        </p>
                    </div>
                    <div class="d-flex justify-content-center pt-5 pb-5">
                        <div class="d-flex justify-content-between">
                            <a target="_blank" rel="noopener" href="https://www.facebook.com/people/BNM-Stainless-Steel/100068964490029/" class="btn btn-white p-0 mx-2 rounded-circle border-0 fb-button">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.4215 15.8498C30.4265 24.2395 23.5971 31.0844 15.2183 31.0874C6.79023 31.0904 -0.0020079 24.2837 4.45261e-07 15.8377C0.00200879 7.4339 6.81734 0.61311 15.2072 0.619145C23.5891 0.626185 30.4165 7.46106 30.4215 15.8498ZM19.5814 17.7878C19.7883 16.4643 19.9861 15.2001 20.198 13.8524C18.9227 13.8524 17.7317 13.8524 16.5177 13.8524C16.5177 12.8246 16.5016 11.8701 16.5237 10.9157C16.5378 10.3143 16.843 9.83154 17.3843 9.59821C17.802 9.41819 18.276 9.3327 18.7329 9.28644C19.241 9.23515 19.7591 9.27437 20.3365 9.27437C20.3365 8.29581 20.3215 7.37959 20.3446 6.46338C20.3536 6.09931 20.213 6.01483 19.8786 6.0088C19.009 5.9917 18.1394 5.95348 17.2718 5.89716C14.906 5.74329 13.1738 6.94915 12.5793 9.24822C12.4136 9.88786 12.3805 10.5697 12.3513 11.2345C12.3142 12.0984 12.3423 12.9654 12.3423 13.8916C11.1413 13.8916 10.0136 13.8916 8.88193 13.8916C8.88193 15.2152 8.88193 16.4773 8.88193 17.8059C10.0488 17.8059 11.1745 17.8059 12.3694 17.8059C12.3694 21.0272 12.3694 24.1812 12.3694 27.327C13.7863 27.327 15.1309 27.327 16.5247 27.327C16.5247 24.1419 16.5247 20.997 16.5247 17.7878C17.563 17.7878 18.5582 17.7878 19.5814 17.7878Z" fill="#FFAF08" class="outside" />
                                    <path d="M19.5814 17.7875C18.5591 17.7875 17.564 17.7875 16.5227 17.7875C16.5227 20.9978 16.5227 24.1417 16.5227 27.3268C15.1289 27.3268 13.7843 27.3268 12.3674 27.3268C12.3674 24.1809 12.3674 21.027 12.3674 17.8056C11.1724 17.8056 10.0467 17.8056 8.87988 17.8056C8.87988 16.4771 8.87988 15.2159 8.87988 13.8914C10.0106 13.8914 11.1393 13.8914 12.3403 13.8914C12.3403 12.9661 12.3122 12.0992 12.3493 11.2343C12.3784 10.5695 12.4116 9.88759 12.5773 9.24796C13.1717 6.94888 14.9049 5.74302 17.2698 5.8969C18.1374 5.95322 19.007 5.99144 19.8766 6.00853C20.211 6.01457 20.3516 6.09905 20.3425 6.46312C20.3194 7.37933 20.3345 8.29554 20.3345 9.27411C19.7571 9.27411 19.24 9.23388 18.7308 9.28617C18.2739 9.33244 17.8 9.41792 17.3822 9.59795C16.84 9.83127 16.5347 10.314 16.5217 10.9154C16.5006 11.8689 16.5156 12.8243 16.5156 13.8521C17.7297 13.8521 18.9216 13.8521 20.1959 13.8521C19.9861 15.2008 19.7882 16.464 19.5814 17.7875Z" fill="#3A2465" />
                                </svg>
                            </a>
                            <a target="_blank" rel="noopener" href="https://www.instagram.com/bnmstainless/" class="btn btn-white p-0 mx-2 rounded-circle border-0 ig-button">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.4165 15.8307C30.4185 24.2777 23.6292 31.0865 15.2022 31.0865C6.82136 31.0865 0.00502365 24.2566 2.77239e-06 15.8548C-0.0050181 7.4641 6.81032 0.635261 15.2032 0.619169C23.5861 0.603077 30.4144 7.4299 30.4165 15.8307ZM15.2072 6.13755C13.7351 6.13755 12.263 6.13454 10.7909 6.13856C7.82052 6.14761 5.49987 8.46379 5.49585 11.4266C5.49183 14.3583 5.49384 17.291 5.49485 20.2227C5.49585 23.2167 7.73516 25.5349 10.7306 25.5711C13.7251 25.6073 16.7205 25.6083 19.714 25.5711C22.6562 25.5339 24.9096 23.2599 24.9407 20.3082C24.9728 17.3262 24.9768 14.3432 24.9407 11.3613C24.9055 8.40244 22.5769 6.1456 19.6236 6.13755C18.1515 6.13454 16.6793 6.13755 15.2072 6.13755Z" fill="#FFAF08" class="outside" />
                                    <path d="M15.2069 6.13708C16.6791 6.13708 18.1512 6.13407 19.6233 6.13708C22.5766 6.14412 24.9053 8.40196 24.9404 11.3608C24.9766 14.3428 24.9715 17.3257 24.9404 20.3077C24.9093 23.2595 22.6559 25.5334 19.7137 25.5706C16.7192 25.6088 13.7248 25.6068 10.7303 25.5706C7.73488 25.5344 5.49557 23.2162 5.49456 20.2222C5.49356 17.2905 5.49155 14.3578 5.49557 11.4262C5.49958 8.46331 7.82023 6.14714 10.7906 6.13809C12.2627 6.13407 13.7348 6.13708 15.2069 6.13708ZM23.2273 15.8483C23.2273 14.4232 23.2313 12.9991 23.2263 11.574C23.2183 9.40165 21.7029 7.85586 19.539 7.8448C16.661 7.83072 13.782 7.83172 10.9041 7.8448C8.74006 7.85385 7.20969 9.38556 7.19764 11.5609C7.18158 14.4272 7.18158 17.2935 7.19764 20.1588C7.20969 22.3262 8.74809 23.8518 10.9161 23.8609C13.7941 23.872 16.673 23.872 19.551 23.8609C21.6839 23.8518 23.2142 22.3081 23.2263 20.1729C23.2333 18.7317 23.2273 17.2905 23.2273 15.8483Z" fill="#3A2465" />
                                    <path d="M23.2272 15.8496C23.2272 17.2908 23.2333 18.732 23.2262 20.1742C23.2152 22.3094 21.6838 23.8542 19.551 23.8622C16.673 23.8743 13.794 23.8733 10.9161 23.8622C8.74804 23.8542 7.20965 22.3275 7.1976 20.1602C7.18153 17.2939 7.18153 14.4276 7.1976 11.5623C7.20965 9.38689 8.74001 7.85518 10.904 7.84612C13.782 7.83305 16.6609 7.83204 19.5389 7.84612C21.7029 7.85719 23.2192 9.40298 23.2262 11.5753C23.2313 13.0004 23.2272 14.4255 23.2272 15.8496ZM15.235 21.1619C18.1451 21.1619 20.5642 18.7491 20.5551 15.8567C20.5461 12.9693 18.116 10.5485 15.225 10.5475C12.3149 10.5465 9.93598 12.9381 9.93498 15.8667C9.93397 18.8014 12.2958 21.1619 15.235 21.1619ZM20.4025 11.7815C21.0291 11.7936 21.5673 11.2726 21.5663 10.6551C21.5653 10.0607 21.0492 9.54177 20.4497 9.53171C19.806 9.52165 19.2939 10.0205 19.2959 10.6571C19.2979 11.2756 19.7839 11.7704 20.4025 11.7815Z" fill="#FFAF08" class="outside" />
                                    <path d="M15.2356 21.1612C12.2964 21.1612 9.93454 18.8018 9.93555 15.8661C9.93655 12.9375 12.3154 10.5459 15.2255 10.5469C18.1166 10.5479 20.5467 12.9686 20.5557 15.8561C20.5647 18.7485 18.1457 21.1612 15.2356 21.1612ZM18.6899 15.8611C18.6899 13.9724 17.1325 12.4075 15.2376 12.3924C13.3297 12.3773 11.739 13.9573 11.739 15.8661C11.739 17.7881 13.3056 19.362 15.2175 19.361C17.1295 19.359 18.6899 17.7871 18.6899 15.8611Z" fill="#3A2465" />
                                    <path d="M20.4025 11.7802C19.7839 11.7682 19.2979 11.2743 19.2959 10.6558C19.2939 10.0192 19.806 9.52037 20.4497 9.53042C21.0492 9.53947 21.5643 10.0594 21.5663 10.6538C21.5673 11.2723 21.0291 11.7933 20.4025 11.7802Z" fill="#3A2465" />
                                    <path d="M18.6901 15.8604C18.6901 17.7864 17.1296 19.3593 15.2187 19.3603C13.3067 19.3614 11.7402 17.7874 11.7402 15.8655C11.7402 13.9566 13.3308 12.3766 15.2388 12.3917C17.1326 12.4058 18.6901 13.9707 18.6901 15.8604Z" fill="#FFAF08" class="outside" />
                                </svg>
    
                            </a>
                            <a href="https://twitter.com/bnmstainless" rel="noopener" target="_blank" class="btn btn-white p-0 mx-2 rounded-circle border-0 twitter-button">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.4205 15.8619C30.4365 24.2385 23.6031 31.0784 15.2092 31.0875C6.81635 31.0965 0.00804242 24.2868 9.02172e-06 15.875C-0.00902855 7.46212 6.77317 0.643336 15.1711 0.619199C23.567 0.596068 30.4044 7.42994 30.4205 15.8619ZM6.13351 22.1688C6.3464 22.3035 6.4458 22.379 6.55526 22.4353C8.22319 23.2831 9.98552 23.7387 11.8613 23.7719C18.268 23.8865 23.2687 18.8972 23.1071 12.5309C23.1 12.2504 23.1593 12.0784 23.4224 11.9285C24.0671 11.5624 24.5189 11.0103 24.9056 10.2852C24.5099 10.4089 24.2267 10.5084 23.9365 10.5849C23.6654 10.6563 23.3882 10.7025 23.1131 10.7589C23.6955 10.1373 24.2207 9.54396 24.4938 8.70117C23.8441 8.9878 23.2758 9.22716 22.7175 9.48864C22.363 9.65459 22.1089 9.60631 21.7836 9.34483C20.44 8.26871 18.9408 8.10477 17.4124 8.87415C15.9282 9.6214 15.2273 10.8896 15.2815 12.5631C15.2876 12.7401 15.2825 12.9171 15.2825 13.1344C11.9407 13.0962 9.48143 11.4186 7.30639 9.0934C6.27209 11.1863 6.8053 12.8568 8.51843 14.2658C8.48127 14.3101 8.44411 14.3543 8.40696 14.3976C7.87274 14.2537 7.33953 14.1089 6.77417 13.9571C6.93886 15.7663 7.84061 17.0245 9.60193 17.647C9.59189 17.6933 9.58285 17.7396 9.57281 17.7848C9.07976 17.808 8.58671 17.8311 8.06052 17.8562C8.35274 18.5834 8.74436 19.2441 9.38201 19.6575C10.0046 20.0608 10.7176 20.3233 11.4074 20.6562C9.96042 21.9254 8.11676 22.0732 6.13351 22.1688Z" fill="#FFAF08" class="outside" />
                                    <path d="M6.13379 22.1688C8.11703 22.0733 9.9607 21.9255 11.4107 20.6552C10.7209 20.3223 10.0069 20.0598 9.38531 19.6566C8.74766 19.2432 8.35603 18.5824 8.06381 17.8553C8.59 17.8302 9.08305 17.807 9.5761 17.7839C9.58614 17.7376 9.59518 17.6914 9.60522 17.6461C7.8439 17.0236 6.94215 15.7654 6.77746 13.9561C7.34281 14.109 7.87603 14.2528 8.41025 14.3966C8.44741 14.3524 8.48456 14.3081 8.52171 14.2649C6.80859 12.8559 6.27537 11.1844 7.30967 9.09247C9.48472 11.4177 11.9439 13.0952 15.2858 13.1335C15.2858 12.9152 15.2909 12.7382 15.2848 12.5622C15.2306 10.8887 15.9305 9.62047 17.4157 8.87322C18.944 8.10485 20.4433 8.26778 21.7869 9.3439C22.1122 9.60539 22.3663 9.65266 22.7207 9.48772C23.2791 9.22623 23.8484 8.98687 24.4971 8.70024C24.224 9.54303 23.6988 10.1364 23.1164 10.7579C23.3915 10.7006 23.6687 10.6544 23.9398 10.584C24.229 10.5075 24.5122 10.408 24.9088 10.2842C24.5222 11.0094 24.0694 11.5615 23.4257 11.9276C23.1616 12.0774 23.1033 12.2494 23.1104 12.53C23.272 18.8962 18.2713 23.8856 11.8646 23.771C9.98882 23.7378 8.22548 23.2822 6.55855 22.4344C6.44609 22.379 6.34667 22.3036 6.13379 22.1688Z" fill="#3A2465" />
                                </svg>
    
    
                            </a>
                            <a target="_blank" rel="noopener" href="https://www.linkedin.com/in/bnmstainless/" class="btn btn-transparent p-0 mx-2 rounded-circle border-0 linked-button">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.000396601 15.834C0.0616513 7.34769 6.88904 0.569133 15.3261 0.619419C23.7552 0.668699 30.4861 7.54682 30.4209 16.0441C30.3576 24.3695 23.4619 31.1581 15.1413 31.0877C6.75246 31.0163 -0.0598539 24.1543 0.000396601 15.834ZM15.6254 12.8128C14.4444 12.8128 13.3489 12.8128 12.2312 12.8128C12.2312 16.6586 12.2312 20.4683 12.2312 24.3403C13.13 24.3403 13.9956 24.3433 14.8612 24.3393C15.7268 24.3353 15.6173 24.4228 15.6203 23.5981C15.6264 21.7717 15.6053 19.9453 15.6304 18.1189C15.6484 16.8025 16.7159 15.7957 18.0364 15.7857C19.2725 15.7766 20.1863 16.6938 20.2646 18.0284C20.2757 18.2125 20.2727 18.3965 20.2727 18.5816C20.2727 20.3406 20.2707 22.1006 20.2757 23.8596C20.2767 24.0547 20.1803 24.3373 20.5388 24.3383C21.5711 24.3423 22.6034 24.3393 23.6487 24.3393C23.6698 24.1844 23.6929 24.0879 23.6929 23.9913C23.6939 21.4951 23.712 18.9979 23.6748 16.5017C23.6668 15.9818 23.5242 15.4357 23.3254 14.9499C22.1133 11.979 17.5895 12.1017 16.0762 13.7964C15.9597 13.9271 15.8352 14.0498 15.6243 14.2721C15.6254 13.7089 15.6254 13.2824 15.6254 12.8128ZM10.1657 24.3122C10.1657 20.4381 10.1657 16.6265 10.1657 12.8218C9.01086 12.8218 7.90124 12.8218 6.80167 12.8218C6.80167 16.6767 6.80167 20.4874 6.80167 24.3122C7.94442 24.3122 9.04098 24.3122 10.1657 24.3122ZM10.5392 9.01316C10.5332 7.83546 9.60231 6.92327 8.4204 6.93735C7.29572 6.95043 6.41004 7.8606 6.40702 9.00712C6.40401 10.1838 7.29371 11.1071 8.43947 11.1161C9.60432 11.1252 10.5462 10.1828 10.5392 9.01316Z" fill="#FFAF08" class="outside" />
                                    <path d="M15.6255 12.8124C15.6255 13.2821 15.6255 13.7085 15.6255 14.2697C15.8374 14.0475 15.9609 13.9248 16.0774 13.794C17.5907 12.0994 22.1155 11.9767 23.3265 14.9476C23.5244 15.4333 23.668 15.9784 23.676 16.4994C23.7132 18.9956 23.6951 21.4928 23.6941 23.989C23.6941 24.0856 23.67 24.1821 23.6499 24.337C22.6045 24.337 21.5722 24.339 20.54 24.336C20.1815 24.335 20.2769 24.0524 20.2769 23.8573C20.2718 22.0983 20.2739 20.3382 20.2739 18.5792C20.2739 18.3952 20.2769 18.2101 20.2658 18.0261C20.1875 16.6925 19.2737 15.7743 18.0376 15.7833C16.7171 15.7934 15.6506 16.8011 15.6316 18.1166C15.6054 19.943 15.6275 21.7694 15.6215 23.5958C15.6185 24.4205 15.728 24.333 14.8624 24.337C13.9968 24.341 13.1312 24.338 12.2324 24.338C12.2324 20.466 12.2324 16.6563 12.2324 12.8104C13.3491 12.8124 14.4446 12.8124 15.6255 12.8124Z" fill="#3A2465" />
                                    <path d="M10.1657 24.3116C9.04107 24.3116 7.94451 24.3116 6.80176 24.3116C6.80176 20.4859 6.80176 16.6762 6.80176 12.8213C7.90133 12.8213 9.01195 12.8213 10.1657 12.8213C10.1657 16.6259 10.1657 20.4376 10.1657 24.3116Z" fill="#3A2465" />
                                    <path d="M10.5394 9.01247C10.5454 10.1811 9.60453 11.1235 8.43968 11.1154C7.29392 11.1064 6.40422 10.1841 6.40723 9.00643C6.41025 7.85991 7.29493 6.94974 8.42061 6.93666C9.60252 6.92359 10.5334 7.83477 10.5394 9.01247Z" fill="#3A2465" />
                                </svg>
    
                            </a>
                            <a target="_blank" rel="noopener" href="https://www.youtube.com/channel/UCCXNRxF1A87XUGfJ8m593MQ" class="btn btn-transparent p-0 mx-2 rounded-circle border-0 youtube-button">
                                <svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M30.7557 15.8665C30.7313 24.3819 23.7964 31.2929 15.3134 31.2532C6.79786 31.2146 -0.0222798 24.3128 5.46989e-05 15.7577C0.0223892 7.27887 6.94812 0.415691 15.4464 0.452294C23.897 0.487881 30.779 7.41715 30.7557 15.8665ZM15.4078 9.01551C13.2871 9.13955 11.1419 9.22801 9.00288 9.39984C7.03745 9.55744 6.26386 10.3495 6.07097 12.3017C5.83544 14.684 5.83341 17.0703 6.08315 19.4526C6.273 21.2655 6.98873 22.0006 8.79579 22.2304C11.7064 22.6015 14.6322 22.6005 17.557 22.5192C19.0757 22.4765 20.5965 22.3718 22.1072 22.204C23.7061 22.0261 24.4289 21.356 24.6066 19.7576C24.7873 18.1308 24.8421 16.4837 24.8512 14.8446C24.8573 13.7831 24.7264 12.7155 24.5771 11.6611C24.4066 10.4542 23.6716 9.73029 22.4655 9.50559C22.2168 9.45882 21.9671 9.40188 21.7153 9.38663C19.6219 9.25851 17.5296 9.13955 15.4078 9.01551Z" fill="#FFAF08" class="outside" />
                                    <path d="M15.4074 9.01562C17.5291 9.13967 19.6215 9.25863 21.7128 9.38675C21.9646 9.402 22.2143 9.45894 22.463 9.50571C23.6691 9.7294 24.4041 10.4544 24.5746 11.6613C24.7239 12.7146 24.8548 13.7832 24.8488 14.8448C24.8396 16.4838 24.7848 18.1299 24.6041 19.7578C24.4264 21.3561 23.7036 22.0262 22.1047 22.2041C20.595 22.3719 19.0732 22.4776 17.5545 22.5193C14.6297 22.6006 11.7039 22.6017 8.79329 22.2305C6.98622 22.0008 6.27152 21.2656 6.08066 19.4527C5.83092 17.0705 5.83296 14.6841 6.06848 12.3018C6.26137 10.3486 7.03495 9.55756 9.00038 9.39996C11.1414 9.22915 13.2866 9.13967 15.4074 9.01562ZM13.518 13.0115C13.518 14.9464 13.518 16.7634 13.518 18.678C15.1688 17.7161 16.7535 16.7929 18.4113 15.8259C16.7373 14.8631 15.1647 13.9581 13.518 13.0115Z" fill="#3A2465" />
                                    <path d="M13.5186 13.0117C15.1652 13.9593 16.7388 14.8633 18.4118 15.8261C16.753 16.7931 15.1693 17.7163 13.5186 18.6782C13.5186 16.7626 13.5186 14.9466 13.5186 13.0117Z" fill="#FFAF08" class="outside" />
                                </svg>
                            </a>
                            <a target="_blank" rel="noopener" href="https://api.whatsapp.com/send?phone=628119115655" class="btn btn-transparent p-0 mx-2 rounded-circle border-0 whatsapp-button">
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="15.817" cy="15.8023" r="15.1832" fill="#FFAF08" class="outside" />
                                    <g clip-path="url(#clip0_1440_85)">
                                        <path d="M22.439 9.17481L22.4507 9.14451C20.6755 7.42837 18.3397 6.45898 15.8535 6.45898C8.71202 6.45898 4.22904 14.1966 7.79411 20.348L6.47363 25.146L11.4063 23.8598C13.5552 25.0208 15.3155 24.9183 15.8567 24.9865C24.1358 24.9865 28.2567 14.97 22.439 9.17481ZM15.8692 23.3941H15.8644H15.8535C13.376 23.3941 11.7931 22.2207 11.6373 22.1532L8.71749 22.9123L9.49854 20.0728L9.3124 19.7808C8.54083 18.5546 8.13165 17.1352 8.13207 15.6864C8.13207 8.84012 16.4984 5.41623 21.3397 10.2548C26.1694 15.0441 22.7785 23.3941 15.8692 23.3941Z" fill="#3A2465" />
                                        <path d="M20.1051 17.5984L20.0982 17.6568C19.8639 17.54 18.7223 16.9816 18.5098 16.9046C18.0325 16.7279 18.1671 16.8765 17.2507 17.9265C17.1146 18.0783 16.9791 18.09 16.7478 17.9849C16.5142 17.8681 15.7645 17.6228 14.8769 16.8287C14.1856 16.2082 13.7214 15.4505 13.5845 15.2169C13.3564 14.8227 13.8334 14.7669 14.2681 13.9446C14.3459 13.7811 14.3046 13.6526 14.2484 13.5365C14.1922 13.4205 13.7254 12.2751 13.5305 11.8189C13.3436 11.3638 13.1531 11.4222 13.0071 11.4222C12.5586 11.3831 12.2308 11.3893 11.9418 11.6901C10.6852 13.0712 11.002 14.4961 12.0775 16.0115C14.1904 18.7769 15.3163 19.2864 17.3751 19.9934C17.931 20.1701 18.4379 20.1452 18.8387 20.0876C19.2858 20.0168 20.2146 19.5262 20.4081 18.9773C20.6015 18.4284 20.6066 17.9729 20.5482 17.8678C20.4898 17.7626 20.338 17.7042 20.1044 17.5991L20.1051 17.5984Z" fill="#3A2465" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1440_85">
                                            <rect width="18.687" height="18.687" fill="white" transform="translate(6.47363 6.45898)" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </a>
    
                        </div>
                    </div>
    
                </div>
            </div>

        </div>
    </div>
    <img src="{{asset('/images/bnm/components/message_section/contacct-m.jpg')}}" alt="" class="w-100  forMobile">
</section>