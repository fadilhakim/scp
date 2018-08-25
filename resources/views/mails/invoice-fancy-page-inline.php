<?php
  
  $due_intr = "24 hours";
  $create_date= date("d M, Y");
  $effectiveDate = strtotime("+".$due_intr, strtotime($create_date));
  $due_date = date("d M, Y",$effectiveDate);

  //$detail_user = $this->model_user->get_user_detail($user_sess["user_id"]);
 
?>

<!DOCTYPE html>

<html lang="en">

  <head>
    <meta charset="utf-8">
    <title><?="Order invoice"?></title>
  </head>

  <body style="position:relative;width:21cm;height:29.7cm;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;color:#555555;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-family:SourceSansPro;font-size:10px;" >

    <header class="clearfix" style="padding-top:10px;padding-bottom:10px;padding-right:0;padding-left:0;margin-bottom:20px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#AAAAAA;font-size:14px;" >

      <div id="logo" style="float:left;width:40%;margin-top:8px;" >
        <img src='<?=url("public/yifang_logo.png")?> '>
      </div>

      <div id="company" style="float:right;width:55%;text-align:right;" >
        <br>
        <!-- <h2 class="name" style="font-size:1.4em;font-weight:normal;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;" ><?=""?></h2> -->

        <div><?="Company Address : ---- "?></div>
        <div><?="Phone Number : -----"?></div>
        <div><?="Company Email : -----"?></div>
        <br><br>
      </div>

      <span style="clear:both" ></span>

    </header>
    
   
    <main>
      <br>
      <div id="details" style="margin-bottom:50px; clear:both" >

        <div id="client" style="padding-left:6px;border-left-width:6px;border-left-style:solid;border-left-color:#0087C3;float:left;width:45%;" >

         <!--  <div class="to" style="color:#777777;" >INVOICE TO:</div>

          <h2 class="name" style="font-size:1.4em;font-weight:normal;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;" ><?= ""//$detail_user["contact_person"]?></h2>

          <div class="address">796 Silver Harbour, TX 79273, US</div>

          <div class="email"><a href="mailto:john@example.com" style="color:#0087C3;text-decoration:none;" ><?=""//$user_sess["email"]?></a></div> -->

        </div>

        <div id="invoice" style="float:right;text-align:right;width:45%;" >

          <h1 style="color:#0087C3;font-size:2.4em;line-height:1em;font-weight:normal;margin-top:0;margin-bottom:0;margin-right:;margin-left:10px;" > </h1>

          <div class="date" style="font-size:1.1em;color:#777777;" >Date of Invoice: <?=$create_date?></div>

          <div class="date" style="font-size:1.1em;color:#777777;" >Due Date: <?=$due_date?></div>

        </div>

      </div>
      <div style="both:clear" ></div>
      <table border="0" cellspacing="0" cellpadding="0" style="width:100%;border-collapse:collapse;border-spacing:0;margin-bottom:20px;" >

        <thead>

          <tr>

           <!--  <th class="" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;background-color:#EEEEEE;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;text-align:center;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;white-space:nowrap;font-weight:normal;" >IMAGE</th> -->

            <th class="desc" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;background-color:#EEEEEE;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;white-space:nowrap;font-weight:normal;text-align:left;" >PRODUCT NAME</th>

            <th class="unit" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;text-align:center;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;white-space:nowrap;font-weight:normal;background-color:#DDDDDD;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;" >UNIT PRICE</th>

            <th class="qty" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;background-color:#EEEEEE;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;text-align:center;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;white-space:nowrap;font-weight:normal;" >QUANTITY</th>

            <th class="total" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;text-align:center;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;white-space:nowrap;font-weight:normal;background-color:#57B223;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;color:#FFFFFF;" >TOTAL</th>

          </tr>

        </thead>

        <tbody>

          <?php

		  foreach(Cart::content() as $items)

			{

        $subtotal = $items->price * $items->qty;

		  ?>

          <tr>

           <!--  <td class="" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;background-color:#EEEEEE;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;text-align:right;" >

            <img width="100" height="100" /></td> -->

            <td class="desc" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;background-color:#EEEEEE;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;text-align:left;" > <?=$items->name?></td>

            <td class="unit" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;text-align:right;background-color:#DDDDDD;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;font-size:1.2em;" >Rp. <?=number_format($items->price)?></td>

            <td class="qty" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;background-color:#EEEEEE;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;text-align:right;font-size:1.2em;" ><?=$items->qty?> </td>

            <td class="total" style="padding-top:20px;padding-bottom:20px;padding-right:20px;padding-left:20px;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#FFFFFF;text-align:right;background-color:#57B223;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;color:#FFFFFF;font-size:1.2em;" >Rp. <?=number_format($subtotal)?></td>

          </tr>

          <?php

			}

		  ?>

        </tbody>

        <tfoot>

          <tr>

            <td colspan="2" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >
            </td>
            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >
            SUBTOTAL
            </td>
            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >
            </td>

            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >
            <h3 style="color:#57B223;font-size:1.2em;font-weight:normal;margin-top:0;margin-bottom:0.2em;margin-right:0;margin-left:0;" >
              Rp.  <?=Cart::subtotal()?>
            </h3>
            </td>

          </tr>

          <tr>

            <td colspan="2" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" ></td>
            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" > </td>
            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >TAX 10%</td>
            <td style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >
            	Rp. <?=Cart::tax()?>
            </td>

            

          </tr>

          <tr>

            <td colspan="2" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" ></td>
            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" > </td>
            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >SHIPPING COST</td>
            <td style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >
              Rp. <?=session("shipping_cost")?>
            </td>

          </tr>

          <tr>

            <td colspan="2" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >

              <!-- Shipping Cost -->

            </td>

             <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >

            	<!-- TAX -->

            </td>

            <td colspan="" style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >GRAND TOTAL</td>

            <td style="border-bottom-width:1px;border-bottom-color:#FFFFFF;text-align:right;padding-top:10px;padding-bottom:10px;padding-right:20px;padding-left:20px;background-color:#FFFFFF;background-image:none;background-repeat:repeat;background-position:top left;background-attachment:scroll;border-bottom-style:none;font-size:1.2em;white-space:nowrap;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;" >

            	Rp. <?=session("final_total")?>

            	

            

            </td>

          </tr>

        </tfoot>

      </table>

      <div id="thanks" style="font-size:2em;margin-bottom:50px;" >Thank you!</div>

      <div id="notices" style="padding-left:6px;border-left-width:6px;border-left-style:solid;border-left-color:#0087C3;" >

        <div>NOTICE:</div>

        <div class="notice" style="font-size:1.2em;" >--</div>

      </div>

    </main>

    <footer style="color:#777777;width:100%;height:30px;position:absolute;bottom:0;border-top-width:1px;border-top-style:solid;border-top-color:#AAAAAA;padding-top:8px;padding-bottom:8px;padding-right:0;padding-left:0;text-align:center;" >

      Invoice was created on a computer and is valid without the signature and seal.

    </footer>

  </body>

</html>