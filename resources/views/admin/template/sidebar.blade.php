<?php
   $session =  Auth::guard("admin")->user();
   $name_session = $session->name;
?>
<nav class="pcoded-navbar" >
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-80" src="<?=asset(BASE_ADMIN_ASSET."assets/images/user.png")?>" alt="User-Profile-Image">
                <div class="user-details">
                    <span>{{ $name_session }}</span>
                    <span id="more-details">UX Designer<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="#!"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigatio-lavel">Menu</div>
        <?php 
            $route = Request::segment(2);
            $active_about_us = '' ;
            $active_home = '' ;
            $active_dashboard = '' ;
            $active_users = '' ;
            $active_contact = '' ;
            $active_product = '' ;
            $active_bank = '' ;
            $active_order = "";
            $active_voucher = "";
            $active_midtrans = "";

            if($route == 'about'){
                $active_about = 'active pcoded-trigger' ;
            }
            else if($route == 'product'){
                $active_product = 'active pcoded-trigger' ;
            }else if($route == 'bank_account'){
                $active_bank = 'active pcoded-trigger' ;
            }else if($route == 'users'){
                $active_users = 'active pcoded-trigger' ;
            }else if($route == 'contact'){
                $active_contact = 'active' ;
            }
            else if($route == 'midtrans'){

                $active_midtrans = 'active' ;
            }
            else if($route == 'dashboard'){
                $active_dashboard = 'active pcoded-trigger' ;
            }
            else{
                $active_home = 'active pcoded-trigger';
            }

        ?>
        <ul class="pcoded-item pcoded-left-item">
            <li class="{{ $active_dashboard }}">
                <a href="<?=url("admin/dashboard")?>">
                    <span class="pcoded-micon"><i class="ti-comments"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                    <span class="pcoded-mtext"> Product </span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li>
                        <a href="<?=url("admin/product")?>">
                            <span class="pcoded-micon"><i class="ti-briefcase"></i></span>
                            <span class="pcoded-mtext"> List Product </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=url("admin/product/category")?>">
                            <span class="pcoded-micon"><i class="ti-briefcase"></i></span>
                            <span class="pcoded-mtext"> Category </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=url("admin/product/brand")?>">
                            <span class="pcoded-micon"><i class="ti-briefcase"></i></span>
                            <span class="pcoded-mtext"> Brand </span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li class="{{ $active_users }}">
                <a href="<?=url("admin/users")?>">
                    <span class="pcoded-micon"><i class="ti-user"></i></span>
                    <span class="pcoded-mtext">Costumer</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="{{ $active_order }}">
                <a href="<?=url("admin/order")?>">
                    <span class="pcoded-micon"><i class="ti-briefcase"></i></span>
                    <span class="pcoded-mtext"> Order Management </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            
            <li class="{{ $active_voucher }}">
                <a href="<?=url("admin/voucher")?>">
                    <span class="pcoded-micon"><i class="ti-coupon"></i></span>
                    <span class="pcoded-mtext"> Voucher / Coupon </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

             <li class="{{ $active_midtrans }}">
                <a href="<?=url("admin/midtrans_setting")?>">
                    <span class="pcoded-micon"><i class="ti-payment"></i></span>
                    <span class="pcoded-mtext"> Midtrans Setting </span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="{{ $active_bank }}">
                <a href="<?=url("admin/bank_account")?>">
                    <span class="pcoded-micon"><i class="ti-money"></i></span>
                    <span class="pcoded-mtext">Bank Account</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <li class="pcoded-hasmenu {{ $active_home }}" dropdown-icon="style1" subitem-icon="style6">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="ti-id-badge"></i></span>
                    <span class="pcoded-mtext">Pages</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    
                    <li class="">
                        <a href="{{url('admin/slider')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">Home Slider</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <li class="">
                        <a href="{{url('admin/about')}}">
                            <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                            <span class="pcoded-mtext">About Us</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      

    </div>
</nav>