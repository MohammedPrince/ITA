<?php 
$page_name = 'New Devices OUT';
$link = 'out_new_devices.php';
include ("Includes/header.php");
$current_date =  date("M-D-Y") ;
?>
<?php
//////////////////Add Out Devices/////////////
if(isset($_POST['Submit']))
{
    $cat_id = $_POST['cat_id'];
    $device_id = $_POST['d_id'];
    $department = $_POST['department'];
    $barnch_id = $_POST['barnch_id'];
    $out_qun = $_POST['out_qun'];
    $device_user = $_POST['device_user'];
    $device_name = $_POST['device_name'];
    $device_ip = $_POST['device_ip'];
    $service_tag = $_POST['service_tag'];
    $device_status = $_POST['device_status'];
    $status_date = $_POST['status_date'];
     $comments = $_POST['comments'];
     $cat_id = $_POST['cat_id'];
     $win_key = $_POST['win_key'];
/*
$today_time = strtotime($current_date);
$check_date = strtotime($status_date);

if ($check_date < $today_time) 
    { 
    $alert = alerts(4,"Device already exist !");
    }
*/
if ( New_Devices_OUT_SAVE($cat_id,$device_id,$department,$barnch_id,$out_qun,$device_user,$device_name,$device_ip,$service_tag,$device_status,$status_date,$comments,$win_key))
            {
            $alert = alerts(1,"Out Device added successfully !");
            }
          else
          {
            $alert = alerts(4,"Device already exist !");
          }
        }
///////////
if(isset($_POST['submit_p']))
{

        $cat_id = $_POST['cat_id'];
        $device_id = $_POST['d_id'];
        $department = $_POST['department'];
        $barnch_id = $_POST['barnch_id'];
        //$current_qun = $_POST['current_qun'];
        $printer_qun = $_POST['printer_qun'];
        $printer_ip = $_POST['printer_ip'];
        $service_tag = $_POST['service_tag'];
        $status  = $_POST['status'];
        $status_date = $_POST['status_date'];
        $comments = $_POST['comments'];
        $none  ='none';
/*
$today_time = strtotime($current_date);
$check_date = strtotime($status_date);

if ($check_date < $today_time) 
    { 
    $alert = alerts(4,"Device already exist !");
    }
*/
if ( New_Devices_OUT_SAVE_Printers($cat_id,$device_id,$department,$barnch_id,$printer_qun,$none,$none,$printer_ip,$service_tag,$status,$status_date,$comments))
            {
            $alert = alerts(1,"Out Device added successfully !");
            }
          else
          {
            $alert = alerts(4,"Device already exist !");
          }
}
///////////
if(isset($_POST['submit_S']))
{

        $cat_id = $_POST['cat_id'];
        $device_id = $_POST['d_id'];
        $department = $_POST['department'];
        $barnch_id = $_POST['barnch_id'];
        //$current_qun = $_POST['current_qun'];
        $scanner_qun = $_POST['qun'];
        $scanner_ip = $_POST['ip'];
        $service_tag = $_POST['service_tag'];
        $status  = $_POST['status'];
        $status_date = $_POST['status_date'];
        $comments = $_POST['comments'];
        $none  ='none';
/*
$today_time = strtotime($current_date);
$check_date = strtotime($status_date);

if ($check_date < $today_time) 
    { 
    $alert = alerts(4,"Device already exist !");
    }
*/
if ( New_Devices_OUT_SAVE_Scanners($cat_id,$device_id,$department,$barnch_id,$scanner_qun,$none,$none,$scanner_ip,$service_tag,$status,$status_date,$comments))
            {
            $alert = alerts(1,"Out Device added successfully !");
            }
          else
          {
            $alert = alerts(4,"Device already exist !");
          }
}
///////////
if(isset($_POST['submit_Phone']))
{

        $cat_id = $_POST['cat_id'];
        $device_id = $_POST['d_id'];
        $department = $_POST['department'];
        $barnch_id = $_POST['barnch_id'];
        //$current_qun = $_POST['current_qun'];
        $phone_qun = $_POST['qun'];
        $phone_ip = $_POST['ip'];
        $phone_ext = $_POST['ext'];
        $service_tag = $_POST['service_tag'];
        $status  = $_POST['status'];
        $status_date = $_POST['status_date'];
        $comments = $_POST['comments'];
        $none  ='none';
/*
$today_time = strtotime($current_date);
$check_date = strtotime($status_date);

if ($check_date < $today_time) 
    { 
    $alert = alerts(4,"Device already exist !");
    }
*/
if ( New_Devices_OUT_SAVE_Phones($cat_id,$device_id,$department,$barnch_id,$phone_qun,$none,$none,$phone_ip,$phone_ext,$service_tag,$status,$status_date,$comments))
            {
            $alert = alerts(1,"Out Device added successfully !");
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
  //$branches_list = View_Branch();
?>
 <div id="my_form3" style="">
                                <form method="post" action="out_new_devices.php" class="form-horizontal"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;"> Select Category : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" data-size="7"
                                                    data-style="select-with-transition" required="required"
                                                    onchange="Get_Cat(this.value);">
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
                            </div>
<?php
if(isset($_GET['cat']))
{
   $cat = $_GET['cat'];
  $category_list_id = View_Category_Id($cat);
  $device_list_id = View_Devices_Id($cat);
  //$device_list_id = View_Devices_OUT($cat);
  
?>
<!-- 
  PCS Forms
-->
 <?php
if($cat == '7' || $cat == '11')
    { 
 //////////////////////PCs Form/////////////////////////    
include("out_devices_form_Pc.php");
     }
if($cat == '8')
     {
//////////////////////Printers Form///////////////////////// 
include("out_devices_form_Printers.php");
     }
//////////////////////Scanners Form/////////////////////////      
if($cat == '9')
     {
include("out_devices_form_Scanners.php");
     }
 //////////////////////Phones Form/////////////////////////      
if($cat == '12')
{
include("out_devices_form_Phones.php");
}
}
?>

                </div>
            </div>
        </div>
        <hr />
      
        <?php 
include ("Includes/footer.php")
?>