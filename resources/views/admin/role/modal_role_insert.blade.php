<div id="modal_role_insert" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
            <h5 class="modal-title text-white"> role Insert </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id="form-role-insert">
            <div class="modal-body">
                <div id="temp-role"></div>
                
                <div class="form-group">
                    <label>Role Name</label>
                    <input type="text" name="role_name" id="role_name" class="form-control">
                </div>
                <div class="form-group">
                    <label> Privilege</label><br>
                    <?php $i = 1;
                        foreach($menu as $row)
                        {
                            $disable = "";
                            if($row == "admin" || $row == "role")
                            {
                                $disable = "disabled";
                            }
                            echo "<label class='float-left' style='width:120px'>
                            <input value='$row' $disable type='checkbox' name='privilege[]'>
                            $row</label>";
                            if($i % 5 == 0 )
                            {
                                echo "<br class='clearfix'>";
                            }

                            $i++;
                        }

                        echo "<br class='clearfix'>";
                    ?>
                </div>
                {{ csrf_field() }}
            </div>
            
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#modal_role_insert").modal({
        show:true
    });

    $("form#form-role-insert").submit(function(){
        $.ajax({
            type:"POST",
            url:"{{ url('admin/role/insert_process') }}",
            data:$(this).serialize(),
            success:function(data)
            {
                $("#temp-role").html(data);
            }

        });
        return false;
    });
</script>