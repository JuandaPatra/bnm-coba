<div class="offcanvas offcanvas-end offcvs" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
     <div class="forDesktop">
        <div class="offcanvas-header me-3 d-flex justify-content-end">
            <button type="button" class="close-off btn btn-transparent">
               <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                    <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                </svg>
            </button>
        </div>
    </div>
    <div class="forMobile">
        <div class="offcanvas-header me-3 d-flex justify-content-between">
            <a class="navbar-brand" href="/">
                <div class="d-flex ">
                    <img src="{{asset('/images/bnm/components/header/logo-bnm-true.png')}}" alt="" class="logo-offcanvas">
                </div>
            </a>
            <button type="button" class="close-off btn btn-transparent">
               <svg width="54" height="54" viewBox="0 0 54 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="40.6045" y1="13.9948" x2="13.9948" y2="40.6045" stroke="#FFAF08" stroke-width="3" />
                    <line x1="40.3441" y1="39.8974" x2="13.7345" y2="13.2877" stroke="#FFAF08" stroke-width="3" />
                </svg>
            </button>
        </div>
    </div>
    <div class="forDesktop">
        <div class="offcanvas-body mt-3">
            <div class="dropdown mt-3">
                <ul>
                    <li><a  href="/" >Home</a></li>
                    <li><a class="to-other" data-to="profile">Profile</a></li>
                    <li><a class="to-other" data-to="sustainability">Sustainability</a></li>
                    <li><a class="to-other" data-to="plant">Plant Tour</a></li>
                    <li><a class="to-other" data-to="product">Products</a></li>
                    <li><a class="to-other" data-to="end">End Applications</a></li>
                    <li><a class="to-other" data-to="production">Production Facilities</a></li>
                    <li><a class="to-other" data-to="news" >News</a></li>
                    <li><a class="to-other" data-to="career">Career</a></li>
                    <li><a class="to" data-to="contacts" >Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="forMobile">
        <div class="offcanvas-body mt-3">
            <div class="dropdown mt-3 OffMobile" data-device=1>
                <ul>
                    <li><a  href="/" >Home</a></li>
                    <li><a class="to-other" data-device="1" data-to="profile" >Profile</a></li>
                    <li><a class="to-other" data-device="1" data-to="sustainability" >Sustainability</a></li>
                    <li><a class="to-other" data-device="1" data-to="plant" >Plant Tour</a></li>
                    <li><a class="to-other" data-device="1" data-to="product" >Products & Applications</a></li>
                    <li><a class="to-other" data-device="1" data-to="end" >End Applications</a></li>
                    <li><a class="to-other" data-device="1" data-to="production" >Production Facilities</a></li>
                    <li><a class="to-other" data-device="1" data-to="news"  >News</a></li>
                    <li><a class="to-other" data-device="1" data-to="career" >Career</a></li>
                    <li><a class="to-other" data-device="1" data-to="contactsM" >Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
     <div class="forMobile">
        <div class="d-flex justify-content-start search-container">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="search" placeholder="Type to search">
                <button class="btn btn-transparent" id="search" type="submit">
                <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.4123 16.0331C20.8381 18.4502 23.2413 20.8449 25.6432 23.2395C25.9244 23.5206 26.2183 23.7918 26.4827 24.0883C27.1619 24.8472 27.1704 25.8309 26.5193 26.4872C25.8401 27.173 24.8177 27.1814 24.0724 26.4492C22.3695 24.7755 20.6904 23.0779 19.0015 21.3901C18.207 20.5961 17.383 19.8288 16.6278 18.9969C16.1905 18.5149 15.8741 18.4727 15.2863 18.8142C9.97492 21.8918 3.3389 19.7825 0.883615 14.2751C-0.851678 10.3796 0.0173749 5.84043 3.06469 2.87804C6.09934 -0.0730971 10.6485 -0.836178 14.4566 0.968235C18.3083 2.79232 20.5864 6.78198 20.2095 11.0387C20.0689 12.6281 19.5894 14.1036 18.7414 15.4569C18.6303 15.6326 18.5347 15.8153 18.4123 16.0331ZM10.1634 16.8665C13.8843 16.8524 16.8781 13.831 16.8739 10.0901C16.8711 6.35477 13.8013 3.34461 10.027 3.37833C6.38902 3.41066 3.39234 6.43909 3.38953 10.0873C3.38671 13.8661 6.39746 16.8805 10.1634 16.8665Z" fill="#FFAF08" />
                </svg>
                </button>
            </form>
        </div>
    </div>
</div> 