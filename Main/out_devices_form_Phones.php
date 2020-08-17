<?php 
 //$category_list = View_Category();
 $branches_list = View_Branch();
?>
<div id="my_form2" style="">

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
                    required="required" name="devices_id" id="device_id" onchange="Device_Details(<?php echo $cat;?>,this.value);">
                    <option value="">Select Device </option>
<?php 
while($res = mysqli_fetch_array($device_list_id))
{
$d_id = $res['d_id'];
$d_name = $res['d_name'];
$d_service_t = $res['service_tag'];
$device_full_name =   $d_name." Tag: ".$d_service_t
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
                    required="required" name="barnch_id"  id="dropdown1" onchange="showSelected(this)">
                    <option value="">Select Branch </option>
<?php 
while($b_res = mysqli_fetch_array($branches_list))
{
$b_id = $b_res['b_id'];
$b_code = $b_res['b_code'];
$b_name = $b_res['b_title_en'];
?>
<option value="<?php echo $b_code; ?>"><?php echo $b_name; ?></option>
                    
<?php 
}
?>
                </select>
            </div>
        </div>
    </div>

    <div class="row" style="display:none;">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Phone Qunatity : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="hidden" class="form-control" name="qun" required="required"
                    placeholder="Enter Qunatity" id="printer_qun" value="1" >
              
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Phone Ip : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="text" class="form-control" name="ip" id="phone_ip" required="required"
                    placeholder="Enter Serial Number" >
                <span class="bmd-help"> Enter Phone IP</span>
            </div>
        </div>
    </div>

    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;">Phone Extension Number : </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <input type="number" class="form-control" name="ext" id="ext" required="required"
                    placeholder="Enter Serial Number" >
                <span class="bmd-help"> Enter Extension</span>
            </div>
        </div>
    </div>

    <?php 
if(isset($_GET['d_id']))
    {
        $tag = $_GET['d_id'];
        $single_device_id = GET_SINGLE_DEVICE_ID($tag);

        $device_info = GET_SINGLE_DEVICE_INFO($tag);
        $device_info_result = mysqli_fetch_array($device_info);
        $current_unit = $device_info_result['unit'];
        $remaining = $device_info_result['remaining'];
        
?>
<input type="hidden" class="form-control" name="d_id" value="<?php echo $single_device_id;?>">
<div class="row">
<label class="col-sm-2 col-form-label">
<div class="card-text" style="color:#000;"> Service Tag : </div>
</label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="service_tag" id="service_tag" required="required" placeholder="Enter Service Tag"
value="<?php echo $tag ;?>" readonly="readonly" >
<span class="bmd-help"> Enter Device Service Tag </span>
    </div>         
</div>
</div>

<input type="hidden" class="form-control" name="d_id" value="<?php echo $single_device_id;?>">
<div class="row">
<label class="col-sm-2 col-form-label">
<div class="card-text" style="color:#000;">Quantity In Stock : </div>
</label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="" id="" required="required" 
value="<?php echo $current_unit ;?>" readonly="readonly" >

    </div>         
</div>
</div>

<input type="hidden" class="form-control" name="d_id" value="<?php echo $single_device_id;?>">
<div class="row">
<label class="col-sm-2 col-form-label">
<div class="card-text" style="color:#000;">Remaining Quantity : </div>
</label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="" id="" required="required" 
value="<?php echo $remaining ;?>" readonly="readonly" >

    </div>         
</div>
</div>

</div>

<?php 
    }
?>


    <div class="row">
        <label class="col-sm-2 col-form-label">
            <div class="card-text" style="color:#000;"> Phone Status: </div>
        </label>
        <div class="col-md-3">
            <div class="form-group">
                <select class="form-control" data-size="7"
                    data-style="select-with-transition" required="required"
                    name="status" id="status">
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
                    name="submit_Phone">Submit</button>

            </div>
        </div>
    </div>

</div>
</div>
</form>


</div>