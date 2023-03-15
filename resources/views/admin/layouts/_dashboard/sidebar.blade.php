<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
  <div class="sb-sidenav-menu">
     <div class="nav">
        <a class="nav-link {{ set_active('dashboard.index') }}" href="{{ route('dashboard.index') }}">
           <div class="sb-nav-link-icon">
              <i class="fas fa-tachometer-alt"></i>
           </div>
           Dashboard
        </a>
        <div class="sb-sidenav-menu-heading">HomePage</div>
        {{-- Banner --}}
        <a class="nav-link {{ set_active(['sliders.index','sliders.create', 'sliders.edit']) }}" " href="{{ route('sliders.index') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         SLIDER / BANNER
         </a>
         <a class="nav-link {{ set_active(['categories.detail']) }}" " href="{{ route('categories.show','2') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         OUR PROFILE
         </a>
         <a class="nav-link {{ set_active(['categories.detail']) }}" " href="{{ route('categories.show','3') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         SUSTAINABILITY
         </a>
         <a class="nav-link {{ set_active(['categories.detail']) }}" " href="{{ route('categories.show','4') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         OUR IMPACT
         </a>
         <a class="nav-link {{ set_active(['categories.detail']) }}" " href="{{ route('categories.show','5') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         PLANT TOUR
         </a>
         <a class="nav-link {{ set_active(['categories.detail']) }}" " href="{{ route('categories.show','6') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         PRODUCT
         </a>
         <a class="nav-link {{ set_active(['categories.detail']) }}" " href="{{ route('categories.show','7') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         MARKET
         </a>
         <a class="nav-link {{ set_active(['cateories.detail']) }}" " href="{{ route('categories.show','8') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         PRODUCT FACILITIES
         </a>
         <a class="nav-link {{ set_active(['categories.detail','9']) }}" " href="{{ route('categories.show','9') }}">
            <div class="sb-nav-link-icon">
               <i class="far fa-newspaper"></i>
            </div>
         NEWS  
         </a>
         
        <div class="sb-sidenav-menu-heading">Master</div>
        {{-- posts --}}
        {{--<a class="nav-link {{ set_active(['posts.index','posts.create', 'posts.edit']) }}" " href="{{ route('posts.index') }}">
           <div class="sb-nav-link-icon">
              <i class="far fa-newspaper"></i>
           </div>
           Posts
        </a>--}}
        {{-- categories --}}
        <a class="nav-link {{ set_active(['categories.index','categories.create', 'categories.edit']) }}" href="{{ route('categories.index', ) }}">
           <div class="sb-nav-link-icon">
              <i class="fas fa-bookmark"></i>
           </div>
           Categories
        </a>
        <!--<a class="nav-link" href="#">-->
        <!--   <div class="sb-nav-link-icon">-->
        <!--      <i class="fas fa-tags"></i>-->
        <!--   </div>-->
        <!--   Tags-->
        <!--</a>-->
        <div class="sb-sidenav-menu-heading">Data</div>
        {{-- products --}}
        <a class="nav-link {{ set_active(['careers.index','careers.create','careers.edit']) }}" " href="{{ route('careers.index') }}">
           <div class="sb-nav-link-icon">
              <i class="far fa-newspaper"></i>
           </div>
           Career
        </a>
        {{-- products categories --}}
        <a class="nav-link {{ set_active(['contact.index']) }}" href="{{ route('contact.index') }}">
           <div class="sb-nav-link-icon">
              <i class="fas fa-bookmark"></i>
           </div>
           Contact
        </a>
        <!--<div class="sb-sidenav-menu-heading">User permission</div>-->
        <!--<a class="nav-link" href="#">-->
        <!--   <div class="sb-nav-link-icon">-->
        <!--      <i class="fas fa-user"></i>-->
        <!--   </div>-->
        <!--   User-->
        <!--</a>-->
        <!--<a class="nav-link" href="#">-->
        <!--   <div class="sb-nav-link-icon">-->
        <!--      <i class="fas fa-user-shield"></i>-->
        <!--   </div>-->
        <!--   Role-->
        <!--</a>-->
     <!--   <div class="sb-sidenav-menu-heading">Config   </div>-->
     <!--   <a class="nav-link" href="#">-->
     <!--      <div class="sb-nav-link-icon">-->
     <!--         <i class="fas fa-photo-video"></i>-->
     <!--      </div>-->
     <!--      Social Media-->
     <!--   </a>-->
     <!--   <a class="nav-link" href="#">-->
     <!--    <div class="sb-nav-link-icon">-->
     <!--       <i class="fas fa-photo-video"></i>-->
     <!--    </div>-->
     <!--     Website-->
     <!-- </a>-->
     <!--</div>-->
  </div>
</nav>
