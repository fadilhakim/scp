@include('template/header')
        <?php
            $product_title1 = isset($product1->product_title ) ? $product1->product_title : ""
        ?>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="container">
            <div class="row">
                <h1> Compare </h1>
                <div class="empty-space col-xs-b35 col-md-b70"></div>
                <table class="table table-bordered">
                    <thead>
                        <th></th>
                        <th> <?=$product_title1?> </th>
                        <th> Compare 2 </th>
                        <th> Compare 3 </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Type</td>
                            <td></td>
                            <td></td>
                            <td></td>
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