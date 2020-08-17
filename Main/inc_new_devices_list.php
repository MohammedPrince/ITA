<?php 
$page_name = 'Incoming New Devices List';
$link = 'inc_new_devices_list.php';
include ("Includes/header.php");

$in_id = "";
$cat_id = '';
$cat_name = '';
$d_id = '';
$d_name = '';
$service_tag = '';
$d_model = '';
$cpu = '';
$os = '';
$rams = '';
$c_id = '';
$c_name = '';
$unit = '';
$remaining = '';
$remaining_status = '';
$receiving_date = '';
$delivery_date = '';
$Specification = '';
$receipt = '';
$comments = '';
$user_id = '';
$user_name = '';
?>
<?php 
///////////////////////////Delete///////////////////////////
if(isset($_GET['in_id']) && ($_GET['action'] =='delete'))
{
  $in_id = $_GET['in_id'];

  if($delete_device_INC = Delete_Device_INC($in_id))
          {
            $alert = alerts(1," Device Deleted successfully !");
          }
          else
          {
            $alert = alerts(4,"Erorr While Deleting Device !");
          }
}
if(isset($_POST['edit']))
    {
  $in_id = $_POST['in_id'];
  $cat_id = $_POST['cat_id'];
  $devices_id = $_POST['devices_id'];
  $service_tag = $_POST['service_tag'];
  $company_id = $_POST['company_id'];
  $unit = $_POST['unit'];
  ///for Pcs Only///
if($cat_id == '7')
{
$rams = $_POST['rams'];
$cpus = $_POST['cpus'];
$os = $_POST['os'];
}
else
{
  $rams = '0';
  $cpus = 'None';
  $os = 'None';
}
////--------////
  $remaining = $_POST['remaining'];
  $remaining_status = $_POST['remaining_status'];
  $receiving_date = $_POST['receiving_date'];
  $receipt_temp = $_FILES['receipt']['tmp_name'];
  $receipt_name = $_FILES['receipt']['name'];
  $receipt_old = $_POST['receipt_old'];
  $comments = $_POST['comments'];
  $delivery_date = $_POST['delivery_date'];
  $specification_old = $_POST['specification_old'];
  
  $spec_file_temp = $_FILES['spec_file']['tmp_name'];
  $spec_file_name = $_FILES['spec_file']['name'];

  if($edit_in_deviecs = Edit_Inc_Devices($in_id,$cat_id,$devices_id,$company_id,$unit,$remaining,$remaining_status,$receiving_date,$receipt_temp,$receipt_name,$receipt_old,$comments,$rams,$cpus,$os,$delivery_date,$specification_old,$spec_file_name,$spec_file_temp))
        {
            $alert = alerts(1,"New Incoming Device updated successfully !");
        }
        else
        {
            $alert = alerts(4,"Cannot Updated Device Informations !");
        }
    }
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
?>
<div id="my_form3">  

<form method="post" action="inc_new_devices.php" class="form-horizontal" enctype="multipart/form-data">

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"> Select Category : </div></label>
<div class="col-md-3">
<div class="form-group">

<select class="form-control" data-size="7" data-style="select-with-transition" required = "required"  onchange="Get_Cat(this.value);">
<option disabled selected >Select Category</option>
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

</div>

</br><hr/>

<?php
if(isset($_GET['cat']))
{
   $cat = $_GET['cat'];

   $devices_list = Incoming_Devices_List($cat);
   $category_list_ = View_Category();
   

   $category_list_NEW = View_Category();

if(mysqli_num_rows($devices_list))
        {

?>
                  <div class="toolbar">
                  </div>
<div class="material-datatables">
 <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th> Name</th>
                          <th> Service Tag</th>
                          <th>Company</th>
                         <!-- <th>Category</th> -->
                          <th>Received Qunantity</th>
                          <th>Remaining</th>
                          <th>Remaining Status</th>
                          <th>Receiving Date</th>
                          <th>Delivery Date</th>
                          <th>Comments</th>
                          <!--  <th>Added By</th> -->
                          <!-- <th>Date/Time</th> -->
                          <th>Receipt / Print</th>
                          <th>Action</th> 
                        </tr>
                      </thead>
                      <tbody>
                    <?php 
while( $rows = mysqli_fetch_array($devices_list) )
                       {
                          $in_id = $rows['in_id'];
                          $cat_id = $rows['cat_id'];
                          $cat_name = $rows['cat_name'];
                          $d_id = $rows['d_id'];
                          $d_name = $rows['d_name'];
                          $service_tag = $rows['service_tag'];
                          $d_model = $rows['d_model'];
                          $cpu = $rows['cpu'];
                          $os = $rows['os_version'];
                          $rams = $rows['rams'];
                          $c_id = $rows['c_id'];
                          $c_name = $rows['c_name'];
                          $unit = $rows['unit'];
                          $remaining = $rows['remaining'];
                          $remaining_status = $rows['remaining_status'];
                          $receiving_date = $rows['receiving_date'];
                          $delivery_date = $rows['delivery_date'];
                          $Specification = $rows['specifications'];
                          $receipt = $rows['receipt'];
                          $comments = $rows['comments'];
                          $user_id = $rows['user_id'];
                          $user_name = $rows['user_name'];
                          $date_time = $rows['date_time'];
                      ?>
                        <tr>
                        <td><?php echo $in_id?></td>
                        <td><?php echo $d_name?></td>
                        <td><?php echo $service_tag?></td>
                        <td><?php echo $c_name?></td>
                        <!--<td><?php //echo $cat_name?></td> -->
                        <td><?php echo $unit?></td>
                        <td><?php echo $remaining?></td>
                        <td><?php echo $remaining_status?></td>
                        <td><?php echo $receiving_date?></td>
                        <td><?php echo $delivery_date?></td>
                        <td><?php echo $comments?></td>
                        <!--<td><?php echo $user_name?></td>-->
                       <!--<td><?php echo $date_time?></td>-->
                       <td>

<a href="./uploads/<?php echo $receipt?>" target="_blank" class="btn btn-rose">View</a>
<a href="print.php?id=<?php echo $in_id?>&service_tag=<?php echo $service_tag; ?>" target="_blank" class="btn btn-info">Print</a>
                        </td>
                        <td>
<button type="button" class="btn btn-link btn-danger btn-just-icon edit" data-toggle="modal" data-target="#myModal_<?php echo $in_id ;?>">
<i class="material-icons">edit</i>
</button>
<a href="inc_new_devices_list.php?in_id=<?php echo $in_id;?>&action=delete" class="btn btn-link btn-danger btn-just-icon remove" onclick="return confirm('Are You Sure You Want To Delete This Record ?')"><i class="material-icons">delete</i></a>
                        </td>
                       </tr>
                        </tr>
<!--Modal: modalCookie-->
<div class="modal fade top" id="myModal_<?php echo $in_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true" >
  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body">
      <div class="card-text">

<h3 class="card-title">
  <b>Edit Incoming Device : <?php echo $d_name ;?></b></h3>
</div>
<form method="post" action="inc_new_devices_list.php" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="in_id" required ="required" value="<?php echo $in_id ;?>" >
<input type="hidden" class="form-control" name="cat_id" required ="required" value="<?php echo $cat ;?>" >
<?php 
 $device_list_id = View_Devices_Id_INC($cat);
?>
<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device Name : </div></label>
<div class="col-md-6">
<div class="form-group">
<select class="form-control" data-style="select-with-transition" required = "required" name="devices_id" id="device_id">
<option value="<?php echo $d_id ;?>"><?php echo $d_name ;?></option>
<?php 
while($res = mysqli_fetch_array($device_list_id))
    {
    $d_id = $res['d_id'];
    $d_name = $res['d_name'];
?>
<option value="<?php echo $d_id; ?>"><?php echo $d_name; ?></option>
<?php 
    }
?>
</select>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Service Tag</div></label>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" name="service_tag" id="service_tag" required ="required" placeholder="Enter Service Tag"
value="<?php echo $service_tag ;?>">
<span class="bmd-help"> Enter Service Tag</span>
</div> 
</div> 
</div>

<?php 
if($cat == '7')
  {
?>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device RAMS</div></label>
<div class="col-md-6">
<div class="form-group">
<select class="form-control" data-style="select-with-transition" required = "required" name="rams" id="rams" >
<option value="<?php echo $rams ;?>"><?php echo $rams ;?></option>
<option value="1">2 GB</option>
<option value="2">4 GB</option>
<option value="3">8 GB</option>
<option value="4">16 GB</option>
<option value="5">32 GB</option>
<option value="6">64 GB</option>
<option value="7">128 GB</option>
</select>
</div> 
</div> 
</div>


<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device CPU</div></label>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" name="cpus" required ="required" placeholder="Enter Device CPU" value="<?php echo $cpu ;?>">
<span class="bmd-help"> Enter Device CPU </span>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">OS Version </div></label>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" name="os" required ="required" placeholder="Enter OS Version" value="<?php echo $os ;?>">
<span class="bmd-help"> Enter OS Version </span>
</div> 
</div> 
</div>

<?php 
  }
?>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Company</div></label>
<div class="col-md-6">
<div class="form-group">
<?php 
$company_list_ = View_Companies();
?>
<select class="form-control" data-size="7" data-style="select-with-transition" required = "required" name="company_id" id= "company_id" >
  <option value="<?php echo $c_id; ?>"><?php echo $c_name; ?></option>
<?php 

while($res = mysqli_fetch_array($company_list_))
  {
    $c_id = $res['c_id'];
    $c_name = $res['c_name'];
?>
<option value="<?php echo $c_id; ?>"><?php echo $c_name; ?></option>
<?php 
  }
?>
</select>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Unit</div></label>
<div class="col-md-6">
<div class="form-group">
<input type="text" class="form-control" name="unit" required ="required" value="<?php echo $unit ;?>" >
<span class="bmd-help"> Enter Unit </span>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Remaining</div></label>
<div class="col-md-6">
<div class="form-group">
<input type="number" class="form-control" name="remaining" required ="required" value="<?php echo $remaining ;?>">
<span class="bmd-help"> Enter Remaining </span>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Remaining Status</div></label>
<div class="col-md-6">
<div class="form-group">
<select class="form-control" data-size="7" data-style="select-with-transition" required = "required" name="remaining_status" >
<option value="<?php echo $remaining_status ; ?>"><?php echo $remaining_status ; ?></option>
<option value="Pending">Pending</option>
<option value="Finished">Finished</option>
</select>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Receiving Date</div></label>
<div class="col-md-6">
<div class="form-group">
<input type="date" class="form-control" name="receiving_date" required ="required" value="<?php echo $receiving_date ;?>">
<span class="bmd-help"> Select Receiving Date</span>
</div> 
</div> 
</div>


<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Delivery Date : </div></label>
<div class="col-md-6">
<div class="form-group">
<input type="date" class="form-control" name="delivery_date" required ="required" value="<?php echo $delivery_date ;?>">
<span class="bmd-help"> Select Delivery Date</span>
</div> 
</div> 
</div>


<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Upload Specification</div></label>
<div class="col-md-3">
<div class="form-group">
<div class="file_input_div">
    <div class="file_input">
      <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">file_upload</i>
        <input id="file_input_file" class="none" type="file" name="spec_file" required="required" />
        <input type="hidden" class="form-control" name="specification_old" value="<?php echo $Specification ;?>">
      </label>
    </div>
    <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
      <input class="file_input_text mdl-textfield__input" type="text" disabled readonly id="file_input_text" />
      <label class="mdl-textfield__label" for="file_input_text"></label>
    </div>
  </div>
  </div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Upload Receipt</div></label>
<div class="col-md-6">
<div class="form-group">


<div class="file_input_div">
    <div class="file_input">
      <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">file_upload</i>
        <input id="file_input_file" class="none" type="file" name="receipt"   value="<?php echo $receipt ;?>"/>
        <input type="hidden" class="form-control" name="receipt_old" value="<?php echo $receipt ;?>">

      </label>
    </div>
    <div id="file_input_text_div" class="mdl-textfield mdl-js-textfield textfield-demo">
      <input class="file_input_text mdl-textfield__input" type="text" disabled readonly id="file_input_text" />
      <label class="mdl-textfield__label" for="file_input_text"></label>
    </div>
  </div>

</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Comments</div></label>
<div class="col-md-6">
<div class="form-group">
<textarea class="form-control" name="comments" required ="required" placeholder="Any Comments"><?php echo $comments ;?></textarea>
<span class="bmd-help"> Enter Comments if found ! </span>
</div> 
</div> 
</div>
</br>

                          <div class="row">
                          <button type="submit" class="btn btn-fill btn-rose" name="edit">Edit Device</button>
                          <a href="inc_new_devices.php?cat=<?php echo $cat; ?>" class="btn btn-fill btn-info">Add New Incoming Device</a>
                          <button type="submit" class="btn btn-fill btn-warning waves-effect" data-dismiss="modal">Close</button>
                         
                            </div>
                          </div>             
                      </div>
                    </div>
                  </form>
        </div>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: modalCookie-->



<?php 
                       }             
?>
                      </tbody>
                    </table>
                  </div>            
<?php 
}
else
{
?>
<center>
<div class="alert alert-warning col-md-6">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b style="color:#f00;"> No Information or data for selected category !</b></span>
          </div>
<center>         
<?php
}
///Close  GET//
}
?>

                <!-- end content-->
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
