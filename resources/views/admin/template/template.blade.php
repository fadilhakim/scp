<?php
    $content = !empty($content) ? $content : "admin/template/content";
?>
<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        @include("admin/template/navbar")

        @include("admin/template/chat")

        <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    
                    @include("admin/template/sidebar")
                    
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-header">
                                        <div class="page-header-title">
                                            <h4><?=$title?></h4>
                                        </div>
                                        <div class="page-header-breadcrumb">
                                            <ul class="breadcrumb-title">
                                                <li class="breadcrumb-item">
                                                    <a href="#!">
                                                        <i class="icofont icofont-home"></i>
                                                    </a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="<?=url("admin/$title")?>"><?=$title?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    @include("$content")
                                   
                                </div>
                            </div>
                        </div>
                        <!--<div id="styleSelector">-->

                        <!--</div>-->
                    </div>
                </div>
            </div>
    </div>
</div>
