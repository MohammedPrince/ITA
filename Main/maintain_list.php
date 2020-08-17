<?php 
$page_name = 'Maintenance Devices List';
$link = 'maintain_list.php';
include ("Includes/header.php");
?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-text">
                        <div class="card-text">
                            <h4 class="card-title"><?php echo $page_name ;?></h4>
                        </div>
                    </div>
<div class="card-body">
<?php 
echo $alert ;
$category_list = View_Category();
$company_list = View_Companies();
$branches_list = View_Branch();
?>

<form method="post" action="maintain.php" class="form-horizontal" enctype="multipart/form-data">

<div class="row">
    <label class="col-sm-2 col-form-label">
        <div class="card-text" style="color:#000;"> Select Category : </div>
    </label>
    <div class="col-md-3">
        <div class="form-group">
            <select class="form-control" data-size="7" data-style="select-with-transition"
                required="required" onchange="Get_Cat(this.value);">
                <option disabled selected>Select Category</option>
                <?php 
while($res = mysqli_fetch_array($category_list))
{
$cat_id = $res['cat_id'];
$cat_name = $res['cat_name'];
?>
                <option value="<?php echo $cat_id;?>"
                    <?php if(isset($_GET['cat']) && $_GET['cat'] == $cat_id){ echo 'selected="selected"';}?>>
                    <?php echo $cat_name;?>
                </option>
                <?php 
}
?>
            </select>
        </div>
    </div>
</div>

</form>

<?php 
if(isset($_GET['cat']))
{
    $cat_id = $_GET['cat'];
?>
 <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    <div class="card-text" style="color:#000;"> Maintenance Type : </div>
                                </label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" data-size="7" data-style="select-with-transition"
                                            required="required"
                                            onchange="Maintain_List(<?php echo $cat_id?>,this.value);">
                                            <option disabled selected>Select Type</option>

                                            <option value="<?php echo "1"?>"
                                                <?php if(isset($_GET['type_id']) && $_GET['type_id'] == "1"){ echo 'selected="selected"';}?>>
                                                <?php echo "Damaged";?></option>

                                            <option value="<?php echo "2"?>"
                                                <?php if(isset($_GET['type_id']) && $_GET['type_id'] == "2"){ echo 'selected="selected"';}?>>
                                                <?php echo "Can Fix"; ?></option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            
<?php
    if(isset($_GET['cat']) && isset($_GET['type_id']))
    {
?>
<hr>
<div class="material-datatables">
<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                         
                          <th>Category</th>
                          <th>Device Name</th>
                          <th>Service Tag</th>
                          <th>Receiving Date </th>
                          <th>Maintenance Date</th>
                          <th>Maintenance Status</th>
                          <th>Status Date</th>
                          <th>Done By</th>
                          </tr>
                          </thead>
                      <tbody>
 <?php 
 $out_device_info = Out_Device_Info($_GET['cat'],$_GET['type_id']);
 while($result = mysqli_fetch_array($out_device_info))
        {
 ?>                        
      <tr>             
<td><?php echo $result['cat_id']?></td>
<td><?php echo $result['d_id']?></td>
<td><?php echo $result['mn_service_tag']?></td>
<td><?php echo $result['mn_receiving_date']?></td>
<td><?php echo $result['mn_maintain_date']?></td>
<td><?php echo $result['mn_status']?></td>
<td><?php echo $result['mn_status_date']?></td>
<td><?php echo $result['user_id']?></td>
</tr>
<?php 
        }
?>
</tbody>
</table>
</div>
<?php
            }

        }

?>
</div>
                    <!--  end card  -->
                </div>
                <!-- end col-md-12 -->
            </div>
            <!-- end row -->
        </div>
    </div>
    <?php 
include ("Includes/footer.php")
?>