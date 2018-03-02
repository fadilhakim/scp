<?php

  $due_intr = "1 day";
  
  $create_date= $order['create_date'];
  
  $effectiveDate = strtotime("+".$due_intr, strtotime($create_date));
  
  $due_date = date("Y-m-d H:i:s",$effectiveDate);
  
  $base_url = "http://www.mochakidshop.com";
  $image_url = "$base_url/assets/image/logo_mocha.png"; //img
  $data["base_url"] = $base_url; //img
  
  
  $date1 = date_create($order["create_date"]);
  $date2 = date_create($due_date);
  $diff  = date_diff($date1,$date2);
  
  $month =  $diff->format("%m");
  
  
?>
<div style="margin:0; padding:0; top:0; font-family:Verdana, Geneva, sans-serif; background-color:#CCC; color:#666" > 
  
  <div style="border:10px solid #00F; width:700px; margin-left:auto; margin-right:auto;  "></div>
  <div style="width:680px; margin-left:auto; margin-right:auto; background-color:#FFF; padding:20px">
  
  
     <div id="header">
       <!-- <div style="float:left; width:40%; font-size:16px; font-weight:bold">
       	  <div>  Jl. KH. Hasyim ashari no.112 </div>
          <div> RT 02/02 Pinang Tangerang 15145 </div>
          <div> 0217317895 </div>
       </div> -->
       <div style="float:left; width:50%">
          <a href='<?=base_url()?>'><img src="<?=$image_url?>" style="width:95%"></a>
        
       </div>
     </div>
     <div id="body">
       <div style="clear:both"></div>
       <div class="devider" style="margin:40px 0"></div>
       <div style="color:#03F; font-size:25px"> Payment Confirmation #<?=$order["id_order"]?> </div>
       <div class="devider" style="margin:10px 0"></div>
       <div style="font-size:14px; font-weight:bold; color:#F0F"> Submitted on <?=$create_date?> </div>
       <div class="devider" style="margin:40px 0"></div>
       
       <p> You already send a Payment confirmation . Your Confirmation data : </p>
       
       <h4 style="font-size:16px;"> USER PAYMENT :  </h4>
       
       <div> Username Account : <?=$payment["nama_pemilik"]?></div>
       <div> User Bank Account : <?=$payment["no_rekening"]?></div>
       <div> Total Payment : <?=$payment["jumlah_dana"]?></div>
       
       <div class="devider" style="margin:40px 0"></div>
        
       <h4 style="font-size:16px;"> TRANSFER TO :  </h4>
       <?php 
			
		$bank = $this->bank_model->get_by_name_arr($order["purpose_bank"]);
		
		?>
       <div> Bank Name : <?=$bank["nama_bank"]?> </div>
		<!-- <div> Bank Branch : TAMAN PALEM </div> -->
		<div> Bank Account Number : <?=$bank["rekening_bank"]?>  </div>
		<div> Bank Account Name :  <?=$bank["nama_pemilik"]?></div>
       
       <p>We have to check your payment confirmation. Thanks  </p>
        
     </div><!-- body --> 
       
     
     
      
  </div>
</div>