<div class="vertical-menu">


    <!-- LOGO -->
    <div class="navbar-brand-box">
       <a href="#" class="logo logo-dark">
           <span class="logo-sm">
           <img src="assets/images/logo-sm.svg" alt="" height="26">

           </span>
           <span class="logo-lg">
           <img src="assets/images/logo-lg.png" alt="" height="40">

           </span>
       </a>

       
   </div>

   <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn">
       <i class="fa fa-fw fa-bars"></i>
   </button>

   <div data-simplebar class="sidebar-menu-scroll">

       <!--- Sidemenu -->
       <div id="sidebar-menu">
           <!-- Left Menu Start -->
           <ul class="metismenu list-unstyled" id="side-menu">
               <li class="menu-title" data-key="t-menu">For Admin</li>

               <li>
                   <a href="{{route('admin.dash')}}">
                       <i class="bx bx-home-circle nav-icon"></i>
                       <span class="menu-item" data-key="t-dashboard">Dashboard</span>
                   </a>
               </li>


               <li>
                   <a href="{{route('company.index')}}" class="">
                       <i class="bx bx-shield-quarter nav-icon"></i>
                       <span class="menu-item" data-key="t-ecommerce">Company</span>
                   </a>
                 
               </li>
               <li>
                   <a href="{{route('contact.info.index')}}" class="">
                       <i class="bx bx-shield-quarter nav-icon"></i>
                       <span class="menu-item" data-key="t-ecommerce">Contact Info</span>
                   </a>
                 
               </li>

               <li>
                   <a href="{{route('banner.index')}}" class="">
                       <i class="bx bx-shield-quarter nav-icon"></i>
                       <span class="menu-item" data-key="t-ecommerce">Banner</span>
                   </a>
                 
               </li>
               <li>
                   <a href="{{route('aboutus.index')}}" class="">
                       <i class="bx bx-shield-quarter nav-icon"></i>
                       <span class="menu-item" data-key="t-ecommerce">About Us</span>
                   </a>
                 
               </li>
               <li>
                   <a href="{{route('service.index')}}" class="">
                       <i class="bx bx-shield-quarter nav-icon"></i>
                       <span class="menu-item" data-key="t-ecommerce">Service Info</span>
                   </a>
                 
               </li>
               <li>
                   <a href="{{route('service.details.index')}}" class="">
                       <i class="bx bx-shield-quarter nav-icon"></i>
                       <span class="menu-item" data-key="t-ecommerce">Our Services </span>
                   </a>
                 
               </li>

               <li>
                   <a href="{{route('client.index')}}" class="">
                       <i class="bx bx-shield-quarter nav-icon"></i>
                       <span class="menu-item" data-key="t-ecommerce">Our Clients </span>
                   </a>
                 
               </li>

           </ul>
       </div>
       <!-- Sidebar -->
   </div>
</div>
<!-- Left Sidebar End -->