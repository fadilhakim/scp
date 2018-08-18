<script>
function add_modal_warranty()
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/warranty/insert")?>",
        data:"_token="+_token,
        success:function(data)
        {
            $(".tmp-warranty").html(data)
        }
    });
}

function edit_modal_warranty(warranty_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        type:"POST",
        url:"<?=url("admin/warranty/update")?>",
        data:"_token="+_token+"&warranty_id="+warranty_id,
        success:function(data)
        {
            $(".tmp-warranty").html(data)
        }
    });
}

function delete_modal_warranty(warranty_id)
{
    var _token = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
        type:"POST",
        url:"<?=url("admin/warranty/delete")?>",
        data:"_token="+_token+"&warranty_id="+warranty_id,
        success:function(data)
        {
            $(".tmp-warranty").html(data)
        }
    });
}
</script>
<div class="page-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-8">
                            <h5 class="pull-left"> warranty List </h5>
                        </div>
                        <div class="col-lg-4" style="text-align:right">
                        </div>
                    </div>
      
                </div>
                <div class="card-block">
                    <div class="tmp-warranty"></div>
                    <div class="">
                        <table id="warranty-tbl" class="table table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Model Product</th>
                                    <th>Number Imei 1</th>
                                    <th>Number Imei 2</th>
                                    <th>Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $i=1; foreach ($warranty as $row){ 
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td>
                                       <?php echo $row->customer_name ?>
                                    </td>
                                    <td>  
                                      <?php echo $row->customer_phone ?>
                                    </td>
                                    <td>
                                       {{ $row->model}}
                                    </td>

                                    <td>
                                        {{ $row->no_imei_1}}
                                    </td>
                                      
                                    <td>
                                         {{ $row->no_imei_2}}
                                    </td>
                                    <td>
                                        @if ($row->status == 'on progress')
                                            <span style="color:#2C3E50; font-weight: bold">{{ $row->status}}</span>
                                        @else 
                                            <span style="color:green; font-weight: bold">{{ $row->status}}</span>
                                        @endif    
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" type="button" onclick="edit_modal_warranty(<?=$row->id?>)"> Edit 
                                         </button>

                                         <button class="btn btn-danger" type="button button-delete" onclick="delete_modal_warranty(<?=$row->id?>)"> Delete 
                                         </button>
                                    </td>
                                </tr>

                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $("#warranty-tbl").DataTable({

    });
</script>