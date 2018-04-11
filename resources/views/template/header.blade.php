@include('template/meta')    
    <?php
    $session =  Auth::guard("user")->user();
    if(!empty($session))
    {
        $name_session = $session->name;
    }
    
    ?>
    <div id="content-block">
        <!-- HEADER -->
        <header>
            <style type="text/css">
                .header-bottom {
                    height: 65px;
                }
            </style>
            <div class="header-top">
                <div class="content-margins">
                    <div class="row">
                        <div class="col-md-7 hidden-xs hidden-sm">
                            <div class="entry"><b>contact us:</b> <a href="tel:+35235551238745">+3  (523) 555 123 8745</a></div>
                            <div class="entry"><b>email:</b> <a href="mailto:office@strawberyCell.com">office@sws.com</a></div>
                        </div>
                        <div class="col-md-5 col-md-text-right" style="position: relative;">
                            <?php if(empty($session)){ ?>
                            <div class="entry"><a class="open-popup" data-rel="1"><b>login</b></a>&nbsp; or &nbsp;<a class="open-popup" data-rel="2"><b>register</b></a></div>
                            <?php }else{ ?>

                                <div class='entry' id="dropdownMenu2" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> 
                                  <a href='#' >Hi, {{ $name_session }}</a>
                                </div>

                                <div class="dropdown-menu" style="top: 93%; left: 19%;" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="{{ url('memberarea') }}"> Member Area </a>
                                    <a class="dropdown-item" href="{{ url('auth/logout') }}"> Logout </a>
                                </div>
                               
                            <?php } ?>
                            <div class="entry hidden-xs hidden-sm cart">
                                <a href="{{url('cart')}}">
                                    <b class="hidden-xs">Your bag</b>
                                    <span class="cart-icon">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        <span class="cart-label"><?=Cart::count()?></span>
                                    </span>
                                    <span class="cart-title hidden-xs">Rp <?=Cart::total(0, 0, ".");?></span>
                                </a>
                                <!-- <div class="cart-toggle hidden-xs hidden-sm">
                                    <div class="cart-overflow">
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img src="img/product-1.png" alt="" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey">Rp 155.00</div>
                                                            <div class="simple-article size-1">TOTAL: Rp 310.00</div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-color" style="background: #eee;"></div>
                                                        </td>
                                                        <td>
                                                            <div class="button-close"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img src="{{URL::asset('public/img/product-2.png')}}" alt="" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey">Rp 155.00</div>
                                                            <div class="simple-article size-1">TOTAL: Rp 310.00</div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-color" style="background: #bf584b;"></div>
                                                        </td>
                                                        <td>
                                                            <div class="button-close"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img src="img/product-3.png" alt="" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey">Rp 155.00</div>
                                                            <div class="simple-article size-1">TOTAL: Rp 310.00</div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-color" style="background: #facc22;"></div>
                                                        </td>
                                                        <td>
                                                            <div class="button-close"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="empty-space col-xs-b40"></div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="cell-view empty-space col-xs-b50">
                                                <div class="simple-article size-5 grey">TOTAL <span class="color">Rp <?=Cart::total(0, 0, ".");?></span></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a class="button size-2 style-3" href="checkout1.html">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                                    <span class="text">proceed to checkout</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <div class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="content-margins">
                    <div class="row">
                        <div class="col-xs-3 col-sm-1">
                            <a id="logo" href="{{url('')}}"><img src="{{URL::asset('/public/dummy_logo.png')}}" alt="" /></a>  
                        </div>
                        <div class="col-xs-9 col-sm-11 text-right">

                            @include('template/hover_menu')

                            <div class="header-bottom-icon toggle-search"><i class="fa fa-search" aria-hidden="true"></i></div>
                            <div class="header-bottom-icon visible-rd"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                            <div class="header-bottom-icon visible-rd">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                <span class="cart-label">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="header-search-wrapper">
                        <div class="header-search-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                        <form>
                                            <div class="search-submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="submit"/>
                                            </div>
                                            <input class="simple-input style-1" type="text" value="" placeholder="Enter keyword" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="button-close"></div>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                .opt  {
                    width:100%;
                    background-color:rgba(255,255,255,0.8);
                    margin-top:-1px;
                    padding-top:5px;
                    padding-bottom:5px;
                    text-align:right;
                    padding-right:50px;
                    height:40px;
                }
                
                .opt>a  {
                    color: #000;
                    display:inline-block;
                    padding: 5px 20px 7px 20px;
                    border-radius: 16px;
                    -webkit-border-radius: 16px;
                    font-size: 14px;
                    font-weight:500;

                }


                .opt .actived {
                    background-color: #b8cd06 !important;
                    -webkit-box-shadow: 1px 1px 2px rgba(0,0,0,.1);
                    box-shadow: 1px 1px 2px rgba(0,0,0,.1);
                    color: #fff;
                    display:block;
                    padding: 5px 20px 7px 20px;
                    border-radius: 16px;
                    -webkit-border-radius: 16px;
                    margin-top: -20px;
                    font-size: 14px;
                }
            </style>
            <?php 
          
                $route = Request::segment(2);
                $id = Request::segment(3);
                $opt = '' ;
                if($route == 'detail'){
                    $opt = 'actived' ;
                }
                if($route == 'highlight') {
                $product = App\Models\Product::detail_product($id);
                $category = $product->product_category;
                $slug = str_slug($product->product_title, '-');
            ?>
            
            <div class="opt header-bottom">
                <a class="{{$opt}}" href="{{url('product/detail/'.$product->product_id.'/'.$category.'/'.$slug)}}">Specs</a>
                <a class="" target="_blank" href="">Overview</a>
            </div>
            <?php } ?>           
        </header>

        <div class="header-empty-space"></div>

