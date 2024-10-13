                     <script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = chkYes.checked ? "block" : "none";   
		
        var kYes = document.getElementById("kYes");
        var dvPass = document.getElementById("dvPass");
        dvPass.style.display = kYes.checked ? "block" : "none";
		}
</script>

       <!------ MODALS EDIT ------>
        <div class="modal modal-success fade" id="modal-edititem">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times;</span></button>
                <h4 class="modal-title">Update Item </h4>
              </div>
              <div class="modal-body">
              
              
              <table class="table table-bordered" >
                  <tr><td>Item:<br><font size="+1"><?php echo strtoupper($rowx['item']); ?></font><br><?php echo $rowx['des'].' | <b>'.$rowx['cat'].'</b>'; ?></td>
                  <td>Avail. Qty:<br><font size="+1"><?php echo number_format($rx['qty']); ?></font>
                  </td>
                  <td bgcolor="<?php echo $color  ;?>" style="color:#FFF">Status: <?php echo number_format($itemstatus); ?>%<br><font size="+1"><?php echo $sta; ?></font></td>
                  </tr></table>
                  
                   <form method="post"> 
                  <strong> <?php echo $erqty; ?></strong>
                      <table class="table table-bordered" >
                  <tr><td>
                 
                     
                       <div class="col-lg-3" >Unit S.Price:<br> <input name="unitprice" type="number"  class="js-calc form-control" value="<?php echo $rx['unitprice']; ?>" required ></div>
                      
                      <div class="col-lg-3" >
                       Pack S.Price:<br>
                        <input name="packprice" type="text"  class="form-control" value="<?php echo $rx['packprice']; ?>" ></div>
                     <div class="col-lg-3" >Expity Date:<br><input name="expiry" class="form-control" rows="1" placeholder="MM/DD" value="<?php echo $rx['xm'].'/'.$rx['xy']; ?>" required></div><div class="col-lg-3" > Uptimum Qty:<br>
                        <input name="uptimum" type="number"  class="js-calc form-control" value="<?php echo $rx['uptimum']; ?>" required >  </div>
                      <p>&nbsp; </p>  <div class="col-lg-3" ><label>Units/Pack</label><input name="pqty" type="number"  class="form-control" value="<?php echo $rx['pqty']; ?>" > </div><div class="col-lg-5" >  <label>Item Category</label>
                                              <select name="cat" class="form-control select2"> 
                                             <option  disabled selected>SELECT CATEGORY</option>
                      <?php 
							$query=mysql_query("select * FROM cat ORDER BY cat ASC" )or die(mysql_error());
							while($row=mysql_fetch_array($query)){
							?>                            <option <?php if($cat==$row['cat']){echo 'selected';} ?> ><?php echo $row['cat'] ;?> </option><?php }  ?>
                          </select> </div>
                        
                        <div class="col-lg-4" > <label>Item</label><input name="item" type="text"  class="form-control" value="<?php echo $rx['item']; ?>" ></div>
                        <div class="col-lg-12" > <label>Description</label><input name="des" type="text"  class="form-control" value="<?php echo $rx['des']; ?>" ></div>
                        </td></tr></table>
                    
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="EditItem" >Update Changes</button> 
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->   
    





    <!------ MODALS UNSTOCK ------>
        <div class="modal modal-success fade" id="modal-unstock">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times;</span></button>
                <h4 class="modal-title">Unstock Item </h4>
              </div>
              <div class="modal-body">
              
              
              <table class="table table-bordered" >
                  <tr><td>Item:<br><font size="+1"><?php echo strtoupper($rowx['item']); ?></font><br><?php echo $rowx['des'].' | <b>'.$rowx['cat'].'</b>'; ?></td>
                  <td>Avail. Qty:<br><font size="+1"><?php echo number_format($rx['qty']); ?></font>
                  </td>
                  <td bgcolor="<?php echo $color  ;?>" style="color:#FFF">Status: <?php echo number_format($itemstatus); ?>%<br><font size="+1"><?php echo $sta; ?></font></td>
                  </tr></table>
                  
                   <form method="post"> 
                   
                      <table class="table table-bordered" >
                  <tr><td><?php echo $erqty; ?>
                 
                   <p>Un-Stock By &nbsp;&nbsp;&nbsp; <label><input type="radio"  id="chkYes" name="chkwork" onclick="ShowHideDiv()"  checked value="1" > Unit Qty </label> &nbsp;&nbsp;&nbsp;<label><input type="radio"  id="kYes" name="chkwork" onclick="ShowHideDiv()" value="0"> Pack Qty </label></p>
                        <div class="col-lg-4" > <div id="dvPassport" style="display: block"><label>Unit QTY</label><input name="unstockqty" type="text"  class="form-control" ></div><div id="dvPass" style="display: none"><table><tr><td><label>Pack QTY</label><input id="packno" name="packno" type="number"  class="js-calc form-control" > <input name="upp" type="hidden" id="upp" class="js-calc" value="<?php echo $rx['pqty']; ?>" ></td><td><label>Total Qty</label><textarea id="result" class="form-control" rows="1"></textarea></td></tr></table></div></div>
                        <div class="col-lg-8" > <label>Reason for unstocking</label><input name="ureason" type="text"  class="form-control" ></div>
                        </td></tr></table>
                    
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="unstock" >Update Changes</button> 
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->   
    









    <!------ MODALS UNSTOCK ------>
        <div class="modal modal-success fade" id="modal-return">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times;</span></button>
                <h4 class="modal-title">Return Item </h4>
              </div>
              <div class="modal-body">
        <p>      
<div class="col-lg-3" >Unit Price:<br><strong style="font-size:18px">₦<?php echo number_format($rowx['unitprice']); ?></strong></div>
                      <input name="price" id="price" type="hidden" value="<?php echo $rowx['unitprice']; ?>"  placeholder="Price">
                      <div class="col-lg-3" >
                       Quantity:<br>
                        <input name="qty" type="number" id="qty" class="js-calc form-control" value="1" required >
                         <input type="hidden" id="qtyx" class="js-calc" value="<?php echo $rx['qty']; ?>" required >
                         </div>
                     <div class="col-lg-3" >Sub Total:<br><textarea id="result" class="form-control" rows="1"></textarea></div><div class="col-lg-3" ><br><?php if($_SESSION['mode'] != 2){ ?> <button type="submit" class="btn btn-primary" name="sales" <?php if($qt==0){echo 'disabled'; } ?> >Add Item</button><?php  }  ?></div>
                     
                    <div class="clearfix"></div><br>
                       <div class="col-lg-3" >Pack Price:<br><strong style="font-size:18px">₦<?php echo number_format($rowx['packprice']); ?></strong><br>units: <?php echo $rowx['pqty']; ?></div>
                      <input name="price" id="price2" type="hidden" value="<?php echo $rowx['packprice']; ?>"  placeholder="Price">
                      <div class="col-lg-3" >
                       Pack Qty:<br>
                        <input name="qty2" type="number" id="qty2" class="js-calc form-control" value="1" ><em>Total Qty:<span id="totalqty"></span></em></div>
                     <div class="col-lg-3" >Sub Total:<br><textarea id="result2" class="form-control" rows="1"></textarea></div><div class="col-lg-3" ><br> <?php if($_SESSION['mode'] != 2){ ?> <button type="submit" class="btn btn-warning" name="sales2" <?php if($qt==0 || $qt<$pu){echo 'disabled'; } ?>>Add Item</button><?php  }  ?></div>
                     </p>
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="returnitem" >Update Changes</button> 
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->   
    


  <!------ MODALS UNSTOCK ------>
        <div class="modal modal-success fade" id="modal-cat">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"> &times;</span></button>
                <h4 class="modal-title">Expenditure Categories </h4>
              </div>
              <div class="modal-body">
              
                   <form method="post"> 
                   
                      <table class="table table-bordered" >
                  <tr><td><label>Category Name</label><input name="expend" class="form-control" required ></td>
                  <td><label>Category Note</label><textarea name="note" class="form-control" rows="1" required></textarea></td></tr></table>
                    
              </div>
              <div class="modal-footer">
               <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="expenditem" >Enter Category</button> 
              </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->   
    
    
          
              
              
          <form method="post">    
     <?php $bt = '<button type="submit" class="btn btn-primary" name="addVendor" >Enter Vendor</button>';
	   modalHead('vendor','Enter Vendor'); ?> 
     <p>
     <div class="col-lg-4" > <label>Name of Vendor</label><input name="name" type="text"  class="form-control" required ></div>
     <div class="col-lg-4" > <label>Phone Number</label><input name="phone" type="text"  class="form-control" required ></div>
     <div class="col-lg-4" > <label>Address</label><input name="address" type="text"  class="form-control"  required></div>
     </p>
     <p>&nbsp;</p>
       <?php   modalFoot('default',$bt); ?>
	   </form>