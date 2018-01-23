<!DOCTYPE html>
<?php
    $head = !empty($head) ? $head : "admin/template/head";
?>
<html lang="en">
    <head> 
        @include("admin/template/head")
        <?php 
        
        
        ?>
    </head>
    <body> 
         <!-- Pre-loader start -->
        <div class="theme-loader">
            <div class="ball-scale">
                <div></div>
            </div>
        </div>
        <!-- Pre-loader end -->

        @include("admin/template/template")

        @include("admin/template/js_under")


    </body>
</html> 