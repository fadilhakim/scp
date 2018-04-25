<div id="modal_subcategory" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> {{ $category->category_name }} - Subcategory </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
           
            <div class="modal-body">
                
                <form id="form-subcategory-insert">
                    <div id="temp-subcategory"></div>
                    <label> Subcategory </label>
                    <div class="input-group">                        
                        <input type="text" name="subcategory_name" id="subcategory_name" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary btn-outline-secondary" type="button"> Add </button>
                        </div>
                    </div>
                    
                    <table id="subcategory-tbl" class="table table-bordered">
                        <thead>
                            <th> Subcategory </th>
                            <th> Action </th>
                        </thead>
                        <tbody>
                            <?php
                            //var_dump($subcategory);
                            foreach($subcategory as $row){
                            ?>
                            <tr>
                                <td><?=$row->subcategory_name?></td> 
                                <td><a href="#"> <i class="icofont icofont-trash"></i> </a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    
                    <input value="{{ $category->category_id }}" type="hidden" name="category_id" id="category_id"> 
                    {{ csrf_field() }}
                    
                </form>
                
            </div>
            
           
        </div>
    </div>
</div>
<script>
    $("#modal_subcategory").modal({
        show:true
    });

    $("#subcategory-tbl").DataTable();

    $("form#form-subcategory-insert").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/product/subcategory/insert_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-subcategory").html(data);
            }

        });
        return false;
    });
</script>