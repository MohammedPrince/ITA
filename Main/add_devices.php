<?php 
$page_name = 'Add Devices';
$link = 'add_devices.php';
include ("Includes/header.php");
?>
<?php 
if(isset($_POST['device_details']))
{
    $device_name = $_POST['device_name'] ;
    $device_model = $_POST['device_model'] ;
    $cat_id = $_POST['cat_id'] ;
    $device_details = $_POST['device_details'] ;

    $d_img_temp = $_FILES['d_img']['tmp_name'];
    $d_img_name = $_FILES['d_img']['name'];
    
if( trim($device_name) == '' )
          {
            $alert = alerts(2,"Device name Can't be Empty,Try again with real names !");
          }
          else
          {
    if($add_device = Add_Device($device_name,$device_model,$cat_id,$device_details,$d_img_name,$d_img_temp))
                {
                    $alert = alerts(1,"Device : ".$device_name. " Model : ".$device_model." added successfully !");
                }
                else
                {
                    $alert = alerts(4,"Device : ".$device_name." Model : ".$device_model." already exist !");
                }
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
?>

<form method="post" action="add_devices.php" class="form-horizontal" enctype="multipart/form-data">


                            <div class="row">
                          <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"> Select Category : </div></label>
                        <div class="col-md-3">
                        <div class="form-group">
                          <select class="form-control" data-size="7" data-style="select-with-transition" required = "required" name="cat_id">
                            <option disabled selected >Select Category</option>
                            <?php 
                           while($res = mysqli_fetch_array($category_list))
                            {
                                $cat_id = $res['cat_id'];
                                $cat_name = $res['cat_name'];
                            ?>
                            <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>
                           
                            <?php 
                            }
                            ?>
                          </select>
                          </div> 
                        </div> 
                        </div>

                    <div class="row">
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device Name : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="device_name" required ="required">
                          <span class="bmd-help">Enter Device Name</span>
                          </div> 
                        </div> 
                        </div>

                        <div class="row">
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device Model : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="device_model" required ="required">
                          <span class="bmd-help"> Enter Device Model</span>
                          </div> 
                        </div> 
                        </div>
                          
                         

                        <div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Upload Device Image : </div></label>
<div class="col-md-3">
<div class="form-group">


<div class="file_input_div">
    <div class="file_input">
      <label class="image_input_button mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect mdl-button--colored">
        <i class="material-icons">file_upload</i>
        <input id="file_input_file" class="none" type="file" name="d_img" required="required" />
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
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device Details : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                          <textarea class="form-control" name="device_details" required ="required" placeholder="Device Details (Specifications)"></textarea>
                          <span class="bmd-help"> Enter device Specifications If no details,enter 0 or Null </span>
                          </div> 
                        </div> 
                        </div>

                        
                        </br>
                        <div class="row">
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"></div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                        <button type="submit" class="btn btn-fill btn-rose" name="add_device">Add Device</button>
                      
                          </div> 
                        </div> 
                        </div>

                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
<hr/>


<?php 
include ("Includes/footer.php")
?>