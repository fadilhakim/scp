@include('template/header')
        
        <?php

            $product_id1 = isset($product1->product_id) ? $product1->product_id : "";
            $product_id2 = isset($product2->product_id) ? $product2->product_id : "";
            $product_id3 = isset($product3->product_id) ? $product3->product_id : "";

            $product_title1 = isset($product1->product_title) ? $product1->product_title : "";
            $product_title2 = isset($product2->product_title) ? $product2->product_title : "";
            $product_title3 = isset($product3->product_title) ? $product3->product_title : "";

            $compare_type1 = isset($compare1->type) ? $compare1->type : "";
            $compare_type2 = isset($compare2->type) ? $compare2->type : "";
            $compare_type3 = isset($compare3->type) ? $compare3->type : "";

            $compare_color1 = isset($compare1->color) ? $compare1->color : "";
            $compare_color2 = isset($compare2->color) ? $compare2->color : "";
            $compare_color3 = isset($compare3->color) ? $compare3->color : "";

            $compare_dimensions1 = isset($compare1->dimensions) ? $compare1->dimensions : "";
            $compare_dimensions2 = isset($compare2->dimensions) ? $compare2->dimensions : "";
            $compare_dimensions3 = isset($compare3->dimensions) ? $compare3->dimensions : "";

            $compare_bandwith1 = isset($compare1->bandwith) ? $compare1->bandwith : "";
            $compare_bandwith2 = isset($compare2->bandwith) ? $compare2->bandwith : "";
            $compare_bandwith3 = isset($compare3->bandwith) ? $compare3->bandwith : "";

            $compare_display1 = isset($compare1->display) ? $compare1->display : "";
            $compare_display2 = isset($compare2->display) ? $compare2->display : "";
            $compare_display3 = isset($compare3->display) ? $compare3->display : "";

            $compare_sim_card1 = isset($compare1->sim_card) ? $compare1->sim_card : "";
            $compare_sim_card2 = isset($compare2->sim_card) ? $compare2->sim_card : "";
            $compare_sim_card3 = isset($compare3->sim_card) ? $compare3->sim_card : "";

            $compare_radio1 = isset($compare1->radio) ? $compare1->radio : "";
            $compare_radio2 = isset($compare2->radio) ? $compare2->radio : "";
            $compare_radio3 = isset($compare3->radio) ? $compare3->radio : "";

            $compare_micro_sd1 = isset($compare1->micro_sd) ? $compare1->micro_sd : "";
            $compare_micro_sd2 = isset($compare2->micro_sd) ? $compare2->micro_sd : "";
            $compare_micro_sd3 = isset($compare3->micro_sd) ? $compare3->micro_sd : "";

            $compare_bluetooth1 = isset($compare1->bluetooth) ? $compare1->bluetooth : "";
            $compare_bluetooth2 = isset($compare2->bluetooth) ? $compare2->bluetooth : "";
            $compare_bluetooth3 = isset($compare3->bluetooth) ? $compare3->bluetooth : "";

            $compare_battery1 = isset($compare1->battery) ? $compare1->battery : "";
            $compare_battery2 = isset($compare2->battery) ? $compare2->battery : "";
            $compare_battery3 = isset($compare3->battery) ? $compare3->battery : "";

            $compare_charger1 = isset($compare1->charger) ? $compare1->charger : "";
            $compare_charger2 = isset($compare2->charger) ? $compare2->charger : "";
            $compare_charger3 = isset($compare3->charger) ? $compare3->charger : "";

            $compare_handsfree1 = isset($compare1->handsfree) ? $compare1->handsfree : "";
            $compare_handsfree2 = isset($compare2->handsfree) ? $compare2->handsfree : "";
            $compare_handsfree3 = isset($compare3->handsfree) ? $compare3->handsfree : "";
        ?>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="container">
            <div class="row">
                <h1> Compare </h1>
                <div class="empty-space col-xs-b35 col-md-b70"></div>
                <table class="table table-bordered">
                    <thead>
                        <th></th>
                        <th> 
                            <div align="center"  class="preview">
                            <?php 
                            if(!empty($product_id1)){    
                                    $firstImg =  App\Models\Product::get_first_image($product1->product_id) ;
                                    
                                    if(!empty($firstImg))
                                    {
                                        $getImage = $firstImg->image_name;
                                        $getImage = URL::asset('public/products/'.$product_id1.'/'.$getImage );
                                    }
                                    else
                                    {
                                        $getImage = url("public/products/default-image.png");
                                    }
                            ?>
                                    <img src="{{ $getImage }}" alt=""><br>
                                    
                                    <div> <?=$product_title1?> </div> 
                                    <a href="<?=url("compare/delete/0")?>"> delete </a> 
                            <?php } ?>
                            </div>
                        </th>
                        <th> 
                            <div align="center"  class="preview">
                            <?php 
                            if(!empty($product_id2)){    
                                    $firstImg =  App\Models\Product::get_first_image($product2->product_id) ;
                                    
                                    if(!empty($firstImg))
                                    {
                                        $getImage = $firstImg->image_name;
                                        $getImage = URL::asset('public/products/'.$product_id2.'/'.$getImage );
                                    }
                                    else
                                    {
                                        $getImagePop = url("public/products/default-image.png");
                                    }
                            ?>
                                    <img src="{{ $getImagePop }}" alt=""><br>
                                    <div> <?=$product_title2?> </div> 
                                    <a href="<?=url("compare/delete/1")?>"> delete </a> 
                            <?php } ?>
                            </div>
                        </th>
                        <th>
                        <div align="center"  class="preview">
                            <?php 
                            if(!empty($product_id3)){    
                                    $firstImg =  App\Models\Product::get_first_image($product3->product_id) ;
                                    
                                    if(!empty($firstImg))
                                    {
                                        $getImage = $firstImg->image_name;
                                        $getImage = URL::asset('public/products/'.$product_id3.'/'.$getImage );
                                    }
                                    else
                                    {
                                        $getImagePop = url("public/products/default-image.png");
                                    }
                            ?>
                                    <img src="{{ $getImagePop }}" alt=""><br>
                                    <div> <?=$product_title3?> </div> 
                                    <a href="<?=url("compare/delete/2")?>"> delete </a> 
                            <?php } ?>
                            </div>
                        </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Type</td>
                            <td><?=$compare_type1?></td>
                            <td><?=$compare_type2?></td>
                            <td><?=$compare_type3?></td>
                        </tr>
                        <tr>
                            <td>Color</td>
                            <td><?=$compare_color1?></td>
                            <td><?=$compare_color2?></td>
                            <td><?=$compare_color3?></td>
                        </tr>
                        <tr>
                            <td>Dimensions</td>
                            <td><?=$compare_dimensions1?></td>
                            <td><?=$compare_dimensions2?></td>
                            <td><?=$compare_dimensions3?></td>
                        </tr>
                        <tr>
                            <td>Bandwith</td>
                            <td><?=$compare_bandwith1?></td>
                            <td><?=$compare_bandwith2?></td>
                            <td><?=$compare_bandwith3?></td>
                        </tr>
                        <tr>
                            <td>Display</td>
                            <td><?=$compare_display1?></td>
                            <td><?=$compare_display2?></td>
                            <td><?=$compare_display3?></td>
                        </tr>
                        <tr>
                            <td>Sim Card</td>
                            <td><?=$compare_sim_card1?></td>
                            <td><?=$compare_sim_card2?></td>
                            <td><?=$compare_sim_card3?></td>
                        </tr>
                        <tr>
                            <td>Radio</td>
                            <td><?=$compare_radio1?></td>
                            <td><?=$compare_radio2?></td>
                            <td><?=$compare_radio3?></td>
                        </tr>
                        <tr>
                            <td>Micro SD</td>
                            <td><?=$compare_micro_sd1?></td>
                            <td><?=$compare_micro_sd2?></td>
                            <td><?=$compare_micro_sd3?></td>
                        </tr>
                        <tr>
                            <td>Bluetooth</td>
                            <td><?=$compare_bluetooth1?></td>
                            <td><?=$compare_bluetooth2?></td>
                            <td><?=$compare_bluetooth3?></td>
                        </tr>
                        <tr>
                            <td>Battery</td>
                            <td><?=$compare_battery1?></td>
                            <td><?=$compare_battery2?></td>
                            <td><?=$compare_battery3?></td>
                        </tr>
                        <tr>
                            <td>Charger</td>
                            <td><?=$compare_battery1?></td>
                            <td><?=$compare_battery2?></td>
                            <td><?=$compare_battery3?></td>
                        </tr>
                        <tr>
                            <td>Handsfree</td>
                            <td><?=$compare_handsfree1?></td>
                            <td><?=$compare_handsfree2?></td>
                            <td><?=$compare_handsfree3?></td>
                        </tr>
                    </tbody>
                </table> 
                <!-- buat test modal, jangan dihapus -->
                <!-- <button onclick="showCompare()" class="btn btn-primary"> Show Modal Test </button> -->
               
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
@include('template/footer')