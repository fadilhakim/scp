<div class="container">
    <div class="card col-lg-11">
        <div class="card-header">
        
            <h5 class="col-md-10 pull-left"> Courer Calculator - <small>Powered by Rajaongkir</small>  </h5>

        </div>
        <div class="card-block ">
           <div class="row"> 
                <div class="col-md-4">
                        <h5> Your Request </h5>
                        <table class="table"> 
                            <tr style="font-weight:bold">    
                                <td> Origin</td>
                                <td> Destination </td>
                                <td> Weight </td>
                            </tr> 
                            <tr>
                                
                                <td> <b> City : </b> <?=$city_origin["rajaongkir"]["results"]["city_name"]?> </td>
                                <td> <b> City : </b> <?=$city_destination["rajaongkir"]["results"]["city_name"]?> </td>
                                <td> <?=$weight?></td>
                            </tr>
                        </table>
                </div> 
                <div class="col-md-1">

                </div>
                <div class="col-md-7">
                        <h5> Result </h5>
                        <table class="table"> 
                            <thead>
                            <tr style="font-weight:bold">  
                                <td> Type Of Delivery </td>
                                <td width="20"> Estimate Shipping Days  </td>
                                <td> Price </td>
                                <td> Service Name </td>
                            </tr> 
                            </thead>
                            <tbody>
                            <?php 
                            $dt_cost = isset($cost["rajaongkir"]["results"][0]["costs"]) ? $cost["rajaongkir"]["results"][0]["costs"] : "" ;
                            if(!empty($dt_cost))
                            {
                                foreach($dt_cost as $row){
                            ?>
                            <tr>
                                <td> <?=$row["service"]?> </td>
                                <td> <?=$row["cost"][0]["etd"]?>  </td>
                                <td> <?=$row["cost"][0]["value"]?> </td>
                                <td> <?=$row["description"]?> </td>
                            
                            </tr>
                            <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                </div>
           </div>
        </div>
    </div>
</div>
