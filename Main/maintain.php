<?php 
$page_name = 'Maintenance';
$link = 'maintain.php';
include ("Includes/header.php");
?>

<?php 
//////////////////Add Devices to Maintenance/////////////
if(isset($_POST['Submit']))
{
    $d_id = $_POST['d_id'];
    $cat_id = $_POST['cat_id'];
    $service_tag = $_POST['service_tag'];
    $receiving_date  =$_POST['receiving_date'];
    $maintain_date = $_POST['maintain_date'];
    $maintain_status = $_POST['maintain_status'];
    $status_date = $_POST['status_date'];
    $comments = $_POST['comments'];
    $mn_type= $_POST['type_id'];

   if($maintenance = Maintenance($d_id,$cat_id,$service_tag,$receiving_date,$maintain_date,$maintain_status,$status_date,$comments,$mn_type))
        {
        $alert = alerts(1,"Device sent to  Maintenance successfully !");
        }
    else
        {
        $alert = alerts(4,"Device already exist in Maintenance!");
        }
}
//////////////////////////Send Device To Scrap/////////////////////////
if(isset($_POST['Yes']))
{
$d_id = $_POST['d_id'];
$cat_id = $_POST['cat_id'];
$type_id = $_POST['type_id'];
$receiving_date  = "NONE";
$maintain_date = "NONE";
$maintain_status = "0";
$status_date = "NONE";
$comments = "NONE";
$service_tag = $_POST['service_tag'];

if($maintenance = Maintenance($d_id,$cat_id,$service_tag,$receiving_date,$maintain_date,$maintain_status,$status_date,$comments,$type_id))
    {
$alert = alerts(1,"Device sent to Scrap successfully !");
    }
else
{
    $alert = alerts(4,"Device already exist as Scrap !");
}
}
if(isset($_POST['No']))
{
    $d_id = $_POST['d_id'];
    $cat_id = $_POST['cat_id'];
    $type_id = $_POST['type_id'];
    $service_tag = $_POST['service_tag'];
?>
<script>
window.location.replace("maintain.php?cat=<?php echo $cat_id;?>&d_id=<?php echo $service_tag;?>&type_id=<?php echo '' ;?>");
</script>
<?php
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

                            <?php
if(isset($_GET['cat']))
{
    $cat = $_GET['cat'];
    $category_list_id = View_Category_Id($cat);
    $device_list_id = View_Devices_OUT($cat);
?>
<input type="hidden" class="form-control" name="cat_id" required="required" value="<?php echo $cat?>">

                            <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    <div class="card-text" style="color:#000;">Device Name : </div>
                                </label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" data-style="select-with-transition"
                                            required="required" name="devices_id" id="device_id"
                                            onchange="Device_Details(<?php echo $cat;?>,this.value);">
                                            <option value="0">Select Device </option>
                                            <?php 
while($res = mysqli_fetch_array($device_list_id))
{
    $d_id = $res['d_id'];
    $d_name = $res['d_name'];
    $d_service_t = $res['out_service_tag'];
    $inc_service_t = $res['service_tag'];
    $device_full_name =   $d_name." Tag: ".$d_service_t ;

?>
<option value="<?php echo $d_service_t;?>"
<?php if( isset($_GET['d_id']) && $_GET['d_id'] == $d_service_t ){ echo 'selected="selected"';}?>>
                                                <?php echo $device_full_name;?>
                                            </option>
                                            <?php 
}
?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    <div class="card-text" style="color:#000;"> Maintenance Type : </div>
                                </label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" data-size="7" data-style="select-with-transition"
                                            required="required"
                                            onchange="Maintain(<?php echo $cat?>,<?php echo $_GET['d_id'] ?>,this.value);">
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
                            <br>                          
<?php 
if(isset($_GET['d_id']) )
    {
$type_id = $_GET['type_id'];
$device_id = $_GET['d_id'] ;
$device_details  = Device_Details($device_id);
$single_device_id  ='';
       $res = mysqli_fetch_array($device_details);
   
       $department = $res['out_dept'];
       $device_user = $res['out_device_user'];
       $device_name = $res['out_device_name'];
       $device_ip = $res['out_device_ip'];
       $service_tag = $res['out_service_tag'];
       $win_key = $res['out_win_key'];

 // echo $single_device_id ;

        if($department =='1')
        {
            $department = 'HQ' ;
        }
        if($department =='2')
        {
            $department = 'Khartoum' ;
        }
        if($department =='3')
        {
            $department = 'States' ;
        }
        
            if($device_user == 'TL')
            {
                $device_user   ="Teller TL" ;
            }
            if($device_user == 'PB')
            {
                $device_user   ="Personal Bnker PB" ;
            }
            if($device_user == 'CS')
            {
                $device_user   ="Customer Service CS" ;
            }
            if($device_user == 'SP')
            {
                $device_user   ="Supervisor SP" ;
            }
            if($device_user == 'BM')
            {
                $device_user   ="Manager BM" ;
            }
            if($device_user == 'Other')
            {
                $device_user   ="Other" ;
            }
/////////////////////////////////////////////////////////////////////////////////////////////////////////
        if($type_id == 2)
            {
?>
<hr class="btn-danger"> 
    <legend>Device Main Info :</legend>

                            <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    <div class="card-text" style="color:#000;">Department : </div>
                                </label>
                                <div class="col-md-3">
                                    <div class="form-group">
 <select class="form-control" data-style="select-with-transition" required="required" name="department" id="department" readonly="readonly">
 <option value="<?php echo $res['out_dept']?>"><?php echo $department ;?> </option>
                                          
                                        </select>
                                    </div>
                                </div>
                            </div>
</br>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">
                                    <div class="card-text" style="color:#000;">Bank Branch : </div>
                                </label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control" data-style="select-with-transition"
                                            required="required" name="barnch_id" id="dropdown1" readonly="readonly"
                                            onchange="showSelected(this)">
                                           
<option value="<?php echo $res['b_id']; ?>" ><?php echo $res['b_title_en'];?></option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            </br>
                            <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Pc User : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control" data-style="select-with-transition"
                    required="required" name="device_user"  id="dropdown2" onchange="showSelected(this)" readonly="readonly">
                    <option  value="<?php echo  $device_user ; ?>"><?php echo  $device_user ; ?></option>
               
                </select>
            </div>
        </div>
    </div>
    </br>
    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Pc Name : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="device_name" required="required"
                    placeholder="Select Branch and Pc User first !" id="pc_namez"  value="<?php echo $device_name ; ?>" readonly="readonly">
            </div>
        </div>
    </div>
    
    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Pc IP : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="device_ip" required="required"
                    placeholder="Enter Pc IP"  id="device_ipz" value="<?php echo $device_ip; ?>" readonly="readonly">
                <span class="bmd-help"> Enter Pc IP </span>
            </div>
        </div>
    </div>

<div class="row" >
<label class="col-sm-2 col-form-label">
<div class="card-text" style="color:#000;"> Service Tag : </div>
</label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="service_tag" id="service_tag" required="required" placeholder="Enter Service Tag" value="<?php echo $service_tag ?>" readonly="readonly">
<span class="bmd-help"> Enter Device Service Tag </span>
</div>         
</div>

</div>

<hr class="btn-danger"> 
    <legend>Maintenance Info :</legend>


    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Windows Key : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
<input type="text" class="form-control" name="win_key" readonly="readonly" required="required" value= "<?php echo $win_key; ?>" id="win_key"  placeholder="Enter Windows Key">
<span class="bmd-help"> Enter Windows key</span>
            </div>
        </div>
    </div>


    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Receiving Date : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="date" class="form-control" name="receiving_date"
                    required="required" value="<?php echo "" ;?>">
                <span class="bmd-help"> Select Date</span>
            </div>
        </div>
    </div>


    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Maintenance  Date : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="date" class="form-control" name="maintain_date"
                    required="required" value="<?php echo "" ;?>">
                <span class="bmd-help"> Select Date</span>
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Status : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control" data-size="7"
                    data-style="select-with-transition" required="required"
                    name="maintain_status" id="pc_status">
                    <option value="">Select Status</option>
                    <option value="1">Ready</option>
                    <option value="2">Deliverd</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Status Date :</div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="date" class="form-control" name="status_date"
                    required="required" value="<?php echo "" ;?>">
                <span class="bmd-help"> Select Date</span>
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Comments : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <textarea class="form-control" name="comments" required="required"
                    placeholder="Any Comments"></textarea>
                <span class="bmd-help"> Enter Comments if found ! </span>
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;"></div>
        </label>
        <?php 
        $single_device_id = GET_SINGLE_DEVICE_ID($service_tag);
        ?>
<input type="hidden" class="form-control" name="d_id" value="<?php echo $single_device_id ?>" >
<input type="hidden" class="form-control" name="type_id" value="<?php echo $type_id ?>" >
        <div class="col-md-3">
            <div class="form-group">
                <button type="submit" class="btn btn-fill btn-rose"
                    name="Submit">Submit</button>

            </div>
        </div>
    </div>
<?php 
            } 
        if($type_id == 1)
            {
               //echo "service_tag : ".$service_tag ;
                //echo "Device name ".$device_full_name              
?>
<center>
   <form method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">

   <input type="hidden" class="form-control" name="d_id" value="<?php echo $d_id ?>" >
   <input type="hidden" class="form-control" name="cat_id" value="<?php echo $cat ?>" >
   <input type="hidden" class="form-control" name="type_id" value="<?php echo $type_id ?>" >
   <input type="hidden" class="form-control" name="service_tag" value="<?php echo $service_tag ?>" >

<span style="color:#f00;font-size:20px;">Are you sure you want send this device <b><?php echo $device_full_name ;?></b> to Scrap ? </span><br />
        <input type="submit" name="Yes" value="Yes" class="btn btn-fill btn-success">
        <input type="submit" name="No" value="No" class="btn btn-fill btn-danger">
    </form>
    </center>
<?php
            }
       
    }
}
    ?>
 </form>

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