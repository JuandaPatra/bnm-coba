<div class="forDesktop">
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent position-absolute w-100 fixed-top" id="navbar_top">
        <div class="container-full mt-3 mb-3 w-100">
            <div class="d-flex justify-content-between">
                <div class="position-relative">
                    <a class="navbar-brand" href="/">
                        <div class="d-flex ">
                            <img src="{{asset('/images/bnm/components/header/logo-bnm-true.png')}}" alt="" class="logo forDesktop ">
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent" style="margin-right: 2rem;">
                    <a href="#contacts" class="btn  btn-contact">Contact Us</a>
                    <button class="btn btn-transparent" id="search">
                        <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.4123 16.0331C20.8381 18.4502 23.2413 20.8449 25.6432 23.2395C25.9244 23.5206 26.2183 23.7918 26.4827 24.0883C27.1619 24.8472 27.1704 25.8309 26.5193 26.4872C25.8401 27.173 24.8177 27.1814 24.0724 26.4492C22.3695 24.7755 20.6904 23.0779 19.0015 21.3901C18.207 20.5961 17.383 19.8288 16.6278 18.9969C16.1905 18.5149 15.8741 18.4727 15.2863 18.8142C9.97492 21.8918 3.3389 19.7825 0.883615 14.2751C-0.851678 10.3796 0.0173749 5.84043 3.06469 2.87804C6.09934 -0.0730971 10.6485 -0.836178 14.4566 0.968235C18.3083 2.79232 20.5864 6.78198 20.2095 11.0387C20.0689 12.6281 19.5894 14.1036 18.7414 15.4569C18.6303 15.6326 18.5347 15.8153 18.4123 16.0331ZM10.1634 16.8665C13.8843 16.8524 16.8781 13.831 16.8739 10.0901C16.8711 6.35477 13.8013 3.34461 10.027 3.37833C6.38902 3.41066 3.39234 6.43909 3.38953 10.0873C3.38671 13.8661 6.39746 16.8805 10.1634 16.8665Z" fill="#FFAF08" />
                        </svg>
                    </button>
                    <form class="d-flex justify-content-end">
                        <button class="btn btn-outline-none" type="submit" style="margin-left: 1rem;">
                            <div id="menu-hamburger" class="btn" data-bs-toggle="offcanvas">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="forMobile">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark-navbar position-fixed w-100 forMobile" style="z-index: 999;height: 5.3rem;padding-top: 1.3rem;height: 6.3rem;">
        <div class="container d-flex justify-content-between navbar-mob">
            <div>
                <a class="navbar-brand" href="/">
                    <div class="d-flex w-50">
                        <img src="{{asset('/images/bnm/components/header/logo-bnm-true.png')}}" alt="" class="logo forMobile me-2 ">
                    </div>
                </a>
            </div>
            <div>
                <div class="collapse navbar-collapse d-flex justify-content-end navbar-right-m" id="navbarSupportedContent">
                    <button class="btn btn-outline-none" type="submit">
                        <div id="menu-hamburger-m" class="btn" data-bs-toggle="offcanvas">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>