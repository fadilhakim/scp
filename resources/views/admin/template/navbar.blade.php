<?php
   $session =  Auth::guard("admin")->user();
   $name_session = $session->name;
?>
<nav class="navbar header-navbar pcoded-header" >
    <div class="navbar-wrapper">
        <div class="navbar-logo" data-navbar-theme="theme4">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="ti-menu"></i>
            </a>
            <a class="mobile-search morphsearch-search" href="#">
                <i class="ti-search"></i>
            </a>
            <a href="#!">
<<<<<<< HEAD
                <!-- <img class="img-fluid" src="<?=asset(BASE_ADMIN_ASSET."assets/images/logo.png")?>" alt="Theme-Logo" /> -->
                <h5>Strawberry CMS</h5>
=======
                <img class="img-fluid" src="<?=asset(BASE_ADMIN_ASSET."assets/images/logo.png")?>" alt="Strawberry Cellphone" />
>>>>>>> 2c9a51f8b13703ab8fb7c3fb0a2fb984817b6c4b
            </a>
            <a class="mobile-options">
                <i class="ti-more"></i>
            </a>
        </div>
        <div class="navbar-container container-fluid">
            <div>
                <ul class="nav-left">
                    <li>
                        <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                    </li>
                   
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()">
                            <i class="ti-fullscreen"></i>
                        </a>
                    </li>
                  
                </ul>


                <ul class="nav-right">
                    

                   
                    
                    <li class="user-profile header-notification">
                        <a href="#!">
                            <img src="<?=asset(BASE_ADMIN_ASSET."assets/images/user.png")?>" alt="User-Profile-Image">
                            <span>{{ $name_session }}</span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            <li>
                                <a href="#!">
                                    <i class="ti-settings"></i> Settings
                                </a>
                            </li>
                            <li>
                                <a href="user-profile.html">
                                    <i class="ti-user"></i> Profile
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?=url("admin/logout")?>">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
               

               
            </div>
        </div>
    </div>
</nav>