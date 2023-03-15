<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-site-verification" content="AxgfIIfo7VPRnFbjv-_Trr5D03MPE3daDAQajLjUAKY" /> 
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <!-- plugin -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css">
    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
    <style>
        .grecaptcha-badge { z-index: 9999; }
    </style>

    
    <!--<script src="https://www.google.com/recaptcha/api.js?onload=ReCaptchaCallback&render=explicit" async defer></script>-->
    <script src="https://www.google.com/recaptcha/api.js?render=6LcOq_keAAAAAF4AweLemkoyeCEvL5m2fyKjXwHM"></script>

    <!--<link rel="preconnect" href="https://fonts.googleapis.com">-->
    <!--<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
    <!--<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">-->
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-242592185-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-242592185-1');
    </script>
   
</head>

<body>
   <div class="loader-wrapper">
        <div class="loader-container">
            <div class="d-flex justify-content-center">
                <span class="loader"></span>
            </div>
            <span class="loaders">Loading</span>
        </div>
    </div>
    @yield('container')
    
   <div class="popup-success ">
        <div class="body">
            <div class="d-flex justify-content-center popSlider">
                <div class="bg-white width-popup" >
                    <div class="d-flex justify-content-end " style="padding: 10px;">
                        <div class="mb-5 close-popupSuccess">
                            <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#ACACAC" stroke-width="3" />
                                <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#ACACAC" stroke-width="3" />
                            </svg>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div>
                            <div class="d-flex justify-content-center mb-5">
                                <img src="{{asset('/images/bnm/messages.png')}}" alt="">
                            </div>
                            <h1 class="text-center">
                                Thank you for your message.
                            </h1>
                            <h1 class="text-center">
                                We will be in touch with you shortly.
                            </h1>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script  src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!--<script  src="{{asset('/vendor/owlcarousel/dist/owl.carousel.min.js')}}"></script>-->
<script  src="{{ asset('/js/app.js') }}"></script>

<!--<script  type="text/javascript" src="{{ asset('/vendor/jquery-lazy-master/jquery.lazy.min.js') }}"></script>-->
<!--<script  type="text/javascript" src="{{ asset('/vendor/jquery-lazy-master/jquery.lazy.plugins.min.js') }}"></script>-->
<script type="text/javascript">
  var ReCaptchaCallback = function() {
    	 $('.g-recaptcha').each(function(){
    		var el = $(this);
    // 		console.log('tes')
    //         console.log($(this).data("sitekey"))
    		grecaptcha.render(el.get(0), {'sitekey' : el.data("sitekey")});
    // 		grecaptcha.render(el.get(1), {'sitekey' : el.data("sitekey")});
    	 })
    	 };
</script>

<script>
    $(document).ready(function() {
        // grecaptcha.execute();
        // grecapthca.execute(1)
        $('#inputM').focus(function() {
                $('.offcanvas-end').css('top', '-41%');
        });
            
        $('#inputM').on( "focusout", function(){
                 $('.offcanvas-end').css('top', '0');
        })

        $("#flexCheckDefault") // select the radio by its id
            .change(function() { // bind a function to the change event
                $(this).val(this.checked ? "TRUE" : "FALSE");
            });

        /////// filter for max input length
        $('input[type="number"]').on('keypress',  function(e){
            if(this.value.length > 12){
                return false
            }
        })
        
            ////////// filter for special characters includes - + e , .
        $('input[type="number"]').on('keydown',  function(e){
            var invalidChars = [
                    "-",
                    "+",
                    "e",
                    ".",
                    ","
                ];

          if (invalidChars.includes(e.key)) {
                    // console.log('sam')
                    e.preventDefault();
                  }else{
                    // console.log('tes')
                    return true
                  }
        })
        
        // email filter
        function isEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }
        
        $(".invalid-feedback-mandatory").hide();

        $("#flexCheckDefaultM") // select the radio by its id
            .change(function() { // bind a function to the change event
                $(this).val(this.checked ? "TRUE" : "FALSE");
        });
        
        
        
        // $('.g-recaptcha').each(function(index, el) {
        //     grecaptcha.render(el, {
        //         'sitekey' : jQuery(el).attr('data-sitekey')
        //     });
        // });
        
        
         $('#submitM').on('click tap touchstart', function(e) {
            
            if($('#flexCheckDefaultM').val() === 'TRUE'){
                if ($('#flexCheckDefaultM').val() === 'TRUE' && $('#fullnameM').val().length !== 0 && $('#businessaddressM').val().length !== 0 && $('#emailM').val().length !== 0 && $('#titleM').val().length !== 0 && $('#phoneM').val().length !== 1 && $('#messageM').val().length !== 0 ) {
                    
                    
                    grecaptcha.ready(function() {
                      grecaptcha.execute('6LcOq_keAAAAAF4AweLemkoyeCEvL5m2fyKjXwHM', {action: 'submit'}).then(function(tokenCapctha) {
                          
                          
                         $.ajaxSetup({
                            headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        
                          let capctha = tokenCapctha
                        
                          var type = "POST";
                          var ajaxurl = '/contact-form';
                          var token = $('meta[name="csrf-token"]').attr('content')
                          
                          let data = {
                                        fullname: $('#fullnameM').val(),
                                        company: $('#companyM').val(),
                                        address: $('#businessaddressM').val(),
                                        email: $('#emailM').val(),
                                        subject: $('#titleM').val(),
                                        phone: $('#phoneM').val(),
                                        message: $('#messageM').val(),
                                        grecaptcha6 : capctha
                                    }
                
                          $.ajax({
                                type: type,
                                url: ajaxurl,
                                data: data,
                                     
                                success: function(data) {
                                        $('.invalid-feedback').hide()
                                        $('.popup-success').addClass('open')
                                        $('input[type="text"],input[type="number"],input[type="email"],textarea').val('');
                                        $("#flexCheckDefault").val("FALSE")
                                        $("#flexCheckDefault") // select the radio by its id
                                                .change(function() { // bind a function to the change event
                                        $(this).val(this.checked ? "TRUE" : "FALSE");
                                        });
                                        $(".invalid-feedback-mandatory").hide();
                                         
                                            
                                        },
                                        error: function(data) {
                                            console.log(data, 'error');
                                        }
                                    });
                                });
                            });
                        e.preventDefault();
                } else if($('#flexCheckDefaultM').val() !== 'TRUE' || $('#fullnameM').val().length === 0 || $('#businessaddressM').val().length === 0 || $('#emailM').val().length === 0 || $('#titleM').val().length === 0 || $('#phoneM').val().length === 1 || $('#messageM').val().length === 0 ) {
                    $('.group-input').each(function(params) {
                        let gr = $(this);
    
                        $(this).find('input, textarea').each(function(params) {
                            if ($(this).val().length === 0) {
                                gr.find('.invalid-feedback').show()
                                $('.invalid-feedback-mandatory').show()
                            } else {
                                gr.find('.invalid-feedback').hide()
                                $('.invalid-feedback-mandatory').hide()
                            }
                        })
                    })
                    e.preventDefault();
                }
                $('.form-check').each(function(params) {
                    let gr = $(this);
    
                    $(this).find('input').each(function(params) {
                        // console.log($(this).val().length);
                        // console.log($(this).val())
                        if ($(this).val() === 'FALSE') {
                            gr.find('.invalid-feedback').show()
                            $('.invalid-feedback-mandatory').show()
                            // console.log('tes3')
                        } else if ($(this).val() === 'TRUE') {
                            // console.log('set4')
                            gr.find('.invalid-feedback').hide()
                            $('.invalid-feedback-mandatory').hide()
                        }
                    })
                })
            }
            else if($('#flexCheckDefaultM').val() === 'FALSE'){
                // $('.invalid-feedback-mandatory').show()
                e.preventDefault();
                $('.group-input').each(function(params) {
                        let gr = $(this);
    
                        $(this).find('input, textarea').each(function(params) {
                            if ($(this).val().length === 0) {
                                gr.find('.invalid-feedback').show()
                                $('.invalid-feedback-mandatory').show()
                            } else {
                                gr.find('.invalid-feedback').hide()
                                $('.invalid-feedback-mandatory').show()
                            }
                        })
                    })
                
            }
        });
        
        
        
        $('#submit').on('click', function(e){
            let email = $('#email').val()
            if ($('#flexCheckDefault').val() === 'TRUE') {
                if ($('#fullname').val().length !== 0 && $('#message').val().length !== 0 && $('#businessaddress').val().length !== 0 && $('#email').val().length !== 0 && $('#title').val().length !== 0 && $('#phone').val().length !== 0 && isEmail(email) && $('#flexCheckDefault').val() === 'TRUE' ) {
                    
                e.preventDefault();
                grecaptcha.ready(function() {
                  grecaptcha.execute('6LcOq_keAAAAAF4AweLemkoyeCEvL5m2fyKjXwHM', {action: 'submit'}).then(function(tokenCapctha) {
                      
                     $.ajaxSetup({
                        headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    
                      let capctha = tokenCapctha
                      var type = "POST";
                      var ajaxurl = '/contact-form';
                      var token = $('meta[name="csrf-token"]').attr('content')
                      
                      let data = {
                                    fullname: $('#fullname').val(),
                                    company: $('#company').val(),
                                    address: $('#businessaddress').val(),
                                    email: $('#email').val(),
                                    subject: $('#title').val(),
                                    phone: $('#phone').val(),
                                    message: $('#message').val(),
                                    grecaptcha6 : capctha
                                }
            
                      $.ajax({
                            type: type,
                            url: ajaxurl,
                            data: data,
                                 
                            success: function(data) {
                                    console.log(data)
                                    $('.invalid-feedback').hide()
                                    $('.popup-success').addClass('open')
                                    $('input[type="text"],input[type="number"],input[type="email"],textarea').val('');
                                    $("#flexCheckDefault").val("FALSE")
                                    $("#flexCheckDefault") // select the radio by its id
                                            .change(function() { // bind a function to the change event
                                    $(this).val(this.checked ? "TRUE" : "FALSE");
                                    });
                                    $(".invalid-feedback-mandatory").hide();
                                     
                                        
                                    },
                                    error: function(data) {
                                        console.log(data, 'error');
                                    }
                                });
                            });
                        });
                    
                }
                else if($('#fullname').val().length === 0 || $('#message').val().length === 0 || $('#businessaddress').val().length === 0 || $('#email').val().length === 0 || $('#title').val().length === 0 || $('#phone').val().length === 0 || !isEmail(email) || $('#flexCheckDefault').val() === 'FALSE' || !grecaptcha.getResponse()){
                    
                    $('.group-input').each(function(params) {
                    let gr = $(this);
                    // alert(grecaptcha.getResponse())
                    
                    

                    $(this).find('input, textarea').each(function(params) {
                        // console.log($(this).val().length);
                        if ($(this).val().length === 0) {
                            gr.find('.invalid-feedback').show()
                            $('.invalid-feedback-mandatory').show()
                        } else {
                            gr.find('.invalid-feedback').hide()
                            $('.invalid-feedback-mandatory').hide()
                        }
                    })
                })
                $('.form-check').each(function(params) {
                    let gr = $(this);

                    $(this).find('input').each(function(params) {
                        
                        if ($(this).val() === 'FALSE') {
                            gr.find('.invalid-feedback').show()
                            $('.invalid-feedback-mandatory').show()
                        } else if ($(this).val() === 'TRUE') {
                            gr.find('.invalid-feedback').hide()
                            $('.invalid-feedback-mandatory').hide()
                        }
                    })
                })
                }
            } else {
                $('.group-input').each(function(params) {
                    let gr = $(this);

                    $(this).find('input, textarea').each(function(params) {
                        // console.log($(this).val().length);
                        if ($(this).val().length === 0) {
                            gr.find('.invalid-feedback').show()
                            $('.invalid-feedback-mandatory').show()
                            // console.log('tes')
                        } else {
                            // console.log('set')
                            gr.find('.invalid-feedback').hide()
                            $('.invalid-feedback-mandatory').hide()
                        }
                    })
                })
                $('.form-check').each(function(params) {
                    let gr = $(this);

                    $(this).find('input').each(function(params) {
                        // console.log($(this).val().length);
                        // console.log($(this).val())
                        if ($(this).val() === 'FALSE') {
                            gr.find('.invalid-feedback').show()
                            $('.invalid-feedback-mandatory').show()
                            // console.log('tes')
                        } else if ($(this).val() === 'TRUE') {
                            // console.log('set')
                            gr.find('.invalid-feedback').hide()
                            $('.invalid-feedback-mandatory').hide()
                        }
                    })
                })
            }
            
            
        })
        
    });
    
</script>




</html>