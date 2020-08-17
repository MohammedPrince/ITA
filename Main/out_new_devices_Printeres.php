<?php 
$page_name = ' New Devices OUT';
$link = 'out_new_devices.php';
include ("Includes/header.php");

 $current_date =  date("M-D-Y") ;

?>
<script>

</script>
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
  $branches_list = View_Branch();
?>
                            <!-- 
Genral Forms
-->
                            <div id="my_form3" style="">

                                <form method="post" action="inc_new_devices.php" class="form-horizontal"
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
?>
                            <!-- 
  PCS Forms
-->
                            <?php
if($cat == '7')
    { 
?>
                            <div id="my_form1" style="">

                                <form method="post" action="out_new_devices.php" class="form-horizontal"
                                    enctype="multipart/form-data">
                                    <input type="hidden" class="form-control" name="cat_id" required="required"
                                        value="<?php echo $cat?>">

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;">Device Name : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" data-style="select-with-transition"
                                                    required="required" name="devices_id" id="device_id">
                                                    <option value="">Select Device </option>
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
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;">Department : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" data-style="select-with-transition"
                                                    required="required" name="department" id="department">
                                                    <option value="">Select Department/Locaton </option>
                                                    <option value="1">HQ</option>
                                                    <option value="2">Khartoum</option>
                                                    <option value="3">States</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;">Bank Branch : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" data-style="select-with-transition"
                                                    required="required" name="b1" id="dropdown1" onchange="showSelected(this)">
                                                    <option value="">Select Branch </option>
                                                    <?php 
while($b_res = mysqli_fetch_array($branches_list))
    {
    $b_id = $b_res['b_id'];
    $b_code = $b_res['b_code'];
    $b_name = $b_res['b_title_en'];
?>
                                                    <option value="<?php echo $b_code; ?>"><?php echo $b_name; ?>
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
                                            <div class="card-text" style="color:#000;">Pc User : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" data-style="select-with-transition"
                                                    required="required" name="pc_user"  id="dropdown2" onchange="showSelected(this)">
                                                   
                                                    <option value="">Select Pc User</option>
                                                    <option value="TL">Teller TL</option>
                                                    <option value="PB">Personal Bnker PB</option>
                                                    <option value="CS">Customer Service CS</option>
                                                    <option value="SP">Supervisor SP</option>
                                                    <option value="BM">Manager BM</option>
                                                    <option value="Other">Other</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;">Pc Name : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="os" required="required"
                                                    placeholder="Pc name generate automatically after you select branch,Pc User" id="pc_name" readonly="readonly">
                                              
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;">Pc IP : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="os" required="required"
                                                    placeholder="Enter Pc IP" >
                                                <span class="bmd-help"> Enter Pc IP </span>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;"> Pc Status: </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select class="form-control" data-size="7"
                                                    data-style="select-with-transition" required="required"
                                                    name="pc_status" id="pc_status">
                                                    <option value="">Select Status</option>
                                                    <option value="1">Ready</option>
                                                    <option value="2">Deliverd</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label class="col-sm-2 col-form-label">
                                            <div class="card-text" style="color:#000;">Status Date : </div>
                                        </label>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <input type="date" class="form-control" name="status_date"
                                                    required="required" value="<?php echo $current_date ;?>">
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-fill btn-rose"
                                                    name="Submit">Submit</button>

                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                        </form>


                    </div>


                    <?php 
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