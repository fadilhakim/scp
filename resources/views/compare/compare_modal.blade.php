<style>
    #modal_compare{
        width:100% !important;
    }
    #modal_compare .modal-dialog {
        width:100%;
        position:fixed;
       
    }

    #modal_compare .modal-full{
        width:100%;
        margin:0;

    }

    #modal_compare .modal-content{
       
        min-height: 100%;
        border-radius: 0;
        width:100%;
        bottom:0;
       
    }

     #modal_compare .modal-header{
      
     }

</style>
<div id="modal_compare" class="modal" tabindex="-1" role="dialog">
    <div class="row" role="document">
        <div class="modal-content" style='bottom:0'>
            <!-- <div class="modal-header bg-primary">
                <h5 class="modal-title text-white"> Compare Product </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <form id="form-compare">
            <div class="modal-body">
              
                <div class="row justify-content-md-center">
                <?php
                    $sess_compare = session("product_compare");
                    if(!empty($sess_compare))
                    {
                        foreach($sess_compare as $row)
                        {
                            $rowProduct = App\Models\Product::detail_product($row);
                            //echo $product_detail->product_title."<br>";
                            $slugProd = str_slug($rowProduct->product_title, '-'); 
                            $prodId = $rowProduct->product_id;
                                
                ?>
                            <div class="">
                                <div class="product-shortcode style-1">
                                    <style type="text/css">
                                        
                                        .preview {
                                            min-height: 10px;
                                            overflow: hidden;
                                            text-align: center;
                                        } 
                                    </style>
                                    <div class="preview">
                                    <?php 
                                    
                                        $firstImg =  App\Models\Product::get_first_image($prodId) ;
                                        
                                        if(!empty($firstImg))
                                        {
                                            $getImage = $firstImg->image_name;
                                            $getImage = URL::asset('public/products/'.$prodId.'/'.$getImage );
                                        }
                                        else
                                        {
                                            $getImage = url("public/products/default-image.png");
                                        }
                                        ?>
                                         <img src="{{ $getImage }}" alt="" width='100' height='100'>
                                        
                                        <!-- <div class="preview-buttons valign-middle">
                                            <div class="valign-middle-content">
                                                <a class="button size-2 style-2" href="<?=url("product/detail/{$rowProduct->product_id}/{$rowProduct->product_category}/{$slugProd}")?>">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="{{URL::asset('public/img/icon-1.png')}}" alt=""></span>
                                                        <span class="text">See Detail</span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>-->
                                    </div>
                                    <div class="">
                                        <span><?=$rowProduct->product_title?></span>
                                        <div class="simple-article size-4 dark">Rp {{number_format($rowProduct->price)}}</div>
                                    </div>
                                   
                        
                                </div>  
                            </div>
                <?php
                        }
                    }
                    
                ?>
                </div>
                {{ csrf_field() }}
            </div>
            <div class="modal-footer">
                <a href="<?=url("compare")?>" class="btn btn-primary"> Compare </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_compare").modal({
        sshow:true,
        backdrop: 'static'
    });

    $("form#form-compare").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('compare/process') }}",
            data:$(this).serialize()
          
        });
     
    });
</script>
