
  
 
    <script type="text/javascript">

    $(document).ready(function(){

        $(".js-calc").keyup(function(){

            var val1 = parseInt($("#qty").val());
            var val2 = parseInt($("#price").val());

            if ( ! isNaN(val1) && ! isNaN(val2))
            {
                 $("#result").text(val1 * val2);
            }
        });

    });



    </script>

   <font color="green"><?php echo $er; ?></font>
                 
                   <form method="post">
                      <p> <label>Item: <?php echo $rowx['item']; ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php if(isset($item)){ ?>
                          <sta> <?php echo $sta ; ?></sta>
                          <p></p>
                          <?php  }  ?></strong>
                       
                      </p>
                      <p><table><tr><td><strong>Price:</strong>
                      <input name="price" id="price" class="js-calc form-control" value="<?php echo $rowx['price']; ?>"  placeholder="Price"><br></td><td>
                       <b>Quantity:</b>
                        <input name="qty" id="qty" class="js-calc form-control" value="1" >
                        Stock Quantity:
                        <b><?php if($rowx['qty']<1){echo "Out of Stock" ;} else{ echo $rowx['qty']; }?></b></td></tr></table>
                      </p>
                      <p><table><tr><td><strong>Cash Paid:</strong>
                      <input name="cash" id="price" class="js-calc form-control" value="<?php echo $rowx['price']; ?>"  placeholder="Price"></td><td><strong>Discount:</strong>
                      <input name="discount"  class="js-calc form-control" value="0"  placeholder="Discount"></td></tr></table>
                      </p>               
                      <p> Sub Total (N): <strong><textarea id="result" class="form-control" rows="1"></textarea></strong> </p>
                      <p style="float:right">
                        <button type="reset" class="btn btn-default">Reset Form</button>
                        <button type="submit" class="btn btn-default" name="sales">Add Item</button>
                      </p>
                    </form>
                    
