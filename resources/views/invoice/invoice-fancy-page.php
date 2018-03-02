<?php
  $due_intr = "24 hours";
  
  $create_date= date("d M, Y");
  
  $effectiveDate = strtotime("+".$due_intr, strtotime($create_date));
  
  $due_date = date("d M, Y",$effectiveDate);
  
  $user_sess = $this->session->all_userdata();
  
 // print_r($user_sess);exit;
  
  $detail_user = $this->model_user->get_user_detail($user_sess["user_id"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?=$name_pdf?></title>
    <link rel="stylesheet" href="<?=base_url("assets/plugins/invoice/fancy2/style.css")?>" media="all" />
    <style>
		
	</style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo" style="float:left; width:45%">
        <img src="<?=base_url("assets/image/logo-besha.jpg")?>" >
        <!-- <img src="<?=base_url("assets/plugins/invoice/fancy2/logo.png")?>" height="70"> -->
      </div>
      <div id="company" style="float:right; width:55%">
        <!-- <h2 class="name"><?=TITLE?></h2> -->
        <div><?=ADDRESS?></div>
        <div><?=PHONE?></div>
        <div><?=EMAIL_SPAREPART?></div>
      </div>
      <span style="clear:both"></span>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name"><?= $detail_user["contact_person"]?></h2>
          <div class="address">796 Silver Harbour, TX 79273, US</div>
          <div class="email"><a href="mailto:john@example.com"><?=$user_sess["email"]?></a></div>
        </div>
        <div id="invoice">
          <h1>SURAT PENAWARAN SPAREPART</h1>
          <div class="date">Date of Invoice: <?=$create_date?></div>
          <div class="date">Due Date: <?=$due_date?></div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="">IMAGE</th>
            <th class="desc">PRODUCT NAME</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <?php
		  foreach($this->cart->contents() as $items)
			{
				$detail_sparepart = $this->model_sparepart->getproductfromIdandCode($items['id'],$items['code'])->row();
		  ?>
          <tr>
            <td class=""><img 
                    src="<?=check_image_sparepart($items['id'])?>" width="100" height="100" /></td>
            <td class="desc"><?=$items["code"]?> / <?=$detail_sparepart->sparepart_name?></td>
            <td class="unit">Rp. <?=number_format($items["price"])?></td>
            <td class="qty"><?=$items["qty"]?> </td>
            <td class="total">Rp. <?=number_format($items["subtotal"])?></td>
          </tr>
          <?php
			}
		  ?>
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td><h3> Rp. <?=number_format($this->cart->total())?> </h3></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">TAX 25%</td>
            <td>$1,300.00</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>$6,500.00</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>