<?php 
$page_name = 'Incoming New Devices';
$link = 'inc_new_devices.php';
include ("Includes/header.php");
$current_date =  date("m-d-Y") ;
?>

<?php 
if(isset($_POST['Submit']))
      {
      // print_r($_POST['Submit']);  
  $cat_id = $_POST['cat_id'];
  $devices_id = $_POST['devices_id'];
  $company_id = $_POST['company_id'];
  $unit = $_POST['unit'];
  $remaining = $_POST['remaining'];
  $remaining_status = $_POST['remaining_status'];
  $receiving_date = $_POST['receiving_date'];
  $receipt_temp = $_FILES['receipt']['tmp_name'];
  $receipt_name = $_FILES['receipt']['name'];
  $comments = $_POST['comments'];
  $service_tag = $_POST['service_tag'];
///for Pcs Only///
if($cat_id == '7' || $cat_id == '11')
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
  $delivery_date = $_POST['delivery_date'];
  $spec_file_temp = $_FILES['spec_file']['tmp_name'];
  $spec_file_name = $_FILES['spec_file']['name'];

  if($incoming_new_devices = Incoming_New_Devices($cat_id,$devices_id,$company_id,$unit,$remaining,$remaining_status,$receiving_date,$receipt_temp,$receipt_name,$comments,$rams,$cpus,$os,$delivery_date,$spec_file_temp,$spec_file_name,$service_tag))
        {
          $alert = alerts(1,"New Device added successfully !");
        }
        else
        {
          $alert = alerts(4,"Device already exist !");
        }
}
?>
<div class="content">
        <div class="content">
          <div class="container-fluid">
            <div class="row">
                    <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title"><?php echo $page_name;?></h4>
                  </div>
                </div>
                    <div class="card-body ">
<?php
  echo $alert ;
  $category_list = View_Category();
  $company_list = View_Companies();

?>

<!-- 
Genral Forms
-->
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
<?php if(isset($_GET['cat']) && $_GET['cat'] == $cat_id){ echo 'selected="selected"';}?>><?php echo $cat_name;?>
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
<!-- 
  printer Forms
-->
<?php
if(isset($_GET['cat']))
{
  $cat = $_GET['cat'];
  $category_list_id = View_Category_Id($cat);
  $device_list_id = View_Devices_Id_INC($cat);

    if( ($cat != '7' ) && ($cat != '11')  )
      {
include("inc_new_devices_General.php");
      }
      
?>
<!-- 
  PCS Forms
-->
<?php
if( ($cat == '7' ) || ($cat == '11') )
      {
include("inc_new_devices_PCs.php");
      }
}
?>




                </div>
              </div>
            </div>
            
<hr/>
<?php 
include ("Includes/footer.php")
?>
