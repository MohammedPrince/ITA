<?php 



?>
<div id="my_form1" >  
<form method="post" action="inc_new_devices.php" class="form-horizontal" enctype="multipart/form-data">
<input type="hidden" class="form-control" name="cat_id" required ="required" value="<?php echo $cat?>" >

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device Name : </div></label>
<div class="col-md-3">
<div class="form-group">
<select class="form-control" data-style="select-with-transition" required = "required" name="devices_id" id="device_id">
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
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device RAMS : </div></label>
<div class="col-md-3">
<div class="form-group">
<select class="form-control" data-style="select-with-transition" required = "required" name="rams" id="rams" >
<option value="">Select Ram Size </option>
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
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device CPU : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="cpus" required ="required" placeholder="Enter Device CPU">
<span class="bmd-help"> Enter Device CPU </span>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">OS Version : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="os" required ="required" placeholder="Enter OS Version">
<span class="bmd-help"> Enter OS Version </span>
</div> 
</div> 
</div>

<div class="row" >
<label class="col-sm-2 col-form-label">
<div class="card-text" style="color:#000;"> Service Tag : </div>
</label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="service_tag" id="service_tag" required="required" placeholder="Enter Service Tag" >
<span class="bmd-help"> Enter Device Service Tag </span>
            </div>         
</div>
</div>
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"> Company : </div></label>
<div class="col-md-3">
<div class="form-group">
<select class="form-control" data-size="7" data-style="select-with-transition" required = "required" name="company_id" id= "company_id" >
<option disabled selected >Select Company</option>
<?php 
while($res = mysqli_fetch_array($company_list))
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
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Received Qunantity : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="number" class="form-control" name="unit" required ="required" placeholder="Enter Received Qunantity">
<span class="bmd-help"> Enter Received Qunantity </span>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Remaining Qunantity : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="number" class="form-control" name="remaining" required ="required" placeholder="Enter Remaining Qunantity"
onchange="Remaining_Qunantity(this.value);"
>
<span class="bmd-help"> Enter Remaining Qunantity</span>
</div> 
</div> 
</div>


<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"> Remaining Status: </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="remaining_status" required ="required" placeholder="Remaining Status" 
id= "status"  readonly="readonly"
>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Receiving Date : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="date" class="form-control" name="receiving_date" required ="required" value="<?php echo $current_date ;?>">
<span class="bmd-help"> Select Receiving Date</span>
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Delivery Date : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="date" class="form-control" name="delivery_date" required ="required" value="<?php echo $current_date ;?>">
<span class="bmd-help"> Select Delivery Date</span>
</div> 
</div> 
</div>



<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Upload Specification File : </div></label>
<div class="col-md-3">
<div class="form-group">
<div class="file_input_div">
    <div class="file_input">
      <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">file_upload</i>
        <input id="file_input_file" class="none" type="file" name="spec_file" required="required" />
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
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Upload Receipt : </div></label>
<div class="col-md-3">
<div class="form-group">
<div class="file_input_div">
    <div class="file_input">
      <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">file_upload</i>
        <input id="file_input_file" class="none" type="file" name="receipt" required="required" />
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
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Comments : </div></label>
<div class="col-md-3">
<div class="form-group">
<textarea class="form-control" name="comments" required ="required" placeholder="Any Comments"></textarea>
<span class="bmd-help"> Enter Comments if found ! </span>
</div> 
</div> 
</div>


</br>
<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"></div></label>
<div class="col-md-3">
<div class="form-group">
<button type="submit" class="btn btn-fill btn-rose" name="Submit" >Submit</button>

</div> 
</div> 
</div>

</div>
</div>
</form>



</div>