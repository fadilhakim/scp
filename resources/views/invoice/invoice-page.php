<?php
  $due_intr = "24 hours";
  
  $create_date= date("d M, Y");
  
  $effectiveDate = strtotime("+".$due_intr, strtotime($create_date));
  
  $due_date = date("d M, Y",$effectiveDate);
  
  $user_sess = $this->session->all_userdata();
  
  $detail_user = $this->model_user->get_user_detail($user_sess["user_id"]);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?=$name_pdf?></title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
		
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="6">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="<?=base_url("assets/image/logo-besha.jpg")?>" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Invoice #: 123<br>
                                Created: <?=date("d M, Y")?><br>
                                Due: <?=$due_date?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <hr>
            <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>
                                Besha Analitika.co.id<br>
                                West Kelapa Gading, Kelapa Gading, North<br>
                                Jakarta 14240
                            </td>
                            
                            <td>
                               <?=$detail_user["company_name"]?>.<br>
							   <?=$detail_user["contact_person"]?><br>
                               <?=$user_sess["email"]?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <!-- <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr> -->
            
            <tr class="heading">
                <td>
                    Product Image
                </td>
				<td style="text-align:left !important">
                	Product name
                </td>
                <td>
                	Product Code
                </td>
                
                <td>
                	Quantity
                </td>
                
                <td>
                    Price
                </td>
                <td>
                	Subtotal
                </td>
            </tr>
            
            <?php
			foreach($this->cart->contents() as $items)
			{
				$detail_sparepart = $this->model_sparepart->getproductfromIdandCode($items['id'],$items['code'])->row();
				
			?>
            <tr class="item">
                <td>
                    <img 
                    src="<?=check_image_sparepart($items['id'])?>" width="100" height="100" />
                    
                   
                </td>
                <td style="text-align:left !important">
                	<?=$detail_sparepart->sparepart_name?>
                </td>
                <td>
                	<?=$items["code"]?>
                </td>
                
                <td>
                	<?=$items["qty"]?> 
                </td>
                <td>
                	Rp. <?=number_format($items["price"])?>
                </td>
                <td>
                    Rp. <?=number_format($items["subtotal"])?>
                </td>
            </tr>
            <?php
			}
			
			?>
            
            
            <tr class="total">
                <td colspan="5" align="right"> <h3> Total: </h3> </td>
                
                <td>
                   <h3> Rp. <?=number_format($this->cart->total())?> </h3>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
