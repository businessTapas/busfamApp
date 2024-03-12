 <!-- Begin page -->
 <div id="layout-wrapper">

     <header id="page-topbar">
         <div class="navbar-header">
             <div class="d-flex">
                 <!-- LOGO -->
                 <div class="navbar-brand-box">
                     <a href="#" class="logo logo-dark">
                         Job Portal
                     </a>

                    
                 </div>

                 <button type="button" class="btn btn-sm px-3 header-item vertical-menu-btn noti-icon">
                     <i class="fa fa-fw fa-bars font-size-16"></i>
                 </button>

                 

                
             </div>

             <div class="d-flex">
                 <div class="dropdown d-inline-block d-block d-lg-none">
                     <button type="button" class="btn header-item noti-icon" data-bs-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <i class="bx bx-search icon-sm"></i>
                     </button>
                    
                 </div>

                
              


                 <div class="dropdown d-inline-block">
                     <button type="button" class="btn header-item user text-start d-flex align-items-center"
                         id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                         aria-expanded="false">
                         <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg"
                             alt="Header Avatar">
                         <span class="ms-2 d-none d-xl-inline-block user-item-desc">
                             <span class="user-name">Marie N. <i class="mdi mdi-chevron-down"></i></span>
                         </span>
                     </button>
                     <div class="dropdown-menu dropdown-menu-end pt-0">
                         <h6 class="dropdown-header">Welcome Job Portal!</h6>
                        
                         <a class="dropdown-item" href="{{route('logout')}}"><i
                                 class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span
                                 class="align-middle">Logout</span></a>
                     </div>
                 </div>
             </div>
         </div>


         <div class=" verti-dash-content" id="dashtoggle">
            
         </div>

       


     </header>
