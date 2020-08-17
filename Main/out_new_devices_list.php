<?php 
$page_name = 'New Devices OUT List';
$link = 'out_new_devices_list.php';
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
?>

 <div id="my_form3" >  

<form method="post" action="out_new_devices_list.php" class="form-horizontal" enctype="multipart/form-data">

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

   $devices_list = Outgoing_Devices_List($cat);
   $category_list_ = View_Category();
   $company_list_ = View_Companies();

   $category_list_NEW = View_Category();

if(mysqli_num_rows($devices_list))
        {
  //if(mysqli_num_rows($inc_dev)==1)
    //{ 
?>
                  <div class="toolbar">
                  </div>
<div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th> Category</th>
                          <th> Device </th>
                          <th>Device Name</th>
                          <th>Device IP</th>
                      
                          <th>Date/Time</th>
                          <th>More Details</th>
                          <th>Action</th>
                          </tr>
                          </thead>
                      <tbody>
                          <?php 

while( $rows = mysqli_fetch_array($devices_list) )
                     {
                         ?>
                          </tr>            
<td><?php echo $rows['out_id']?></td>
<td><?php echo $rows['cat_name']?></td>
<td><?php echo $rows['d_name']?></td>
<td><?php echo $rows['out_device_name']?></td>
<td><?php echo $rows['out_device_ip']?></td>
<td><?php echo $rows['out_add_date']?></td>
<td>
<a href="out_devices_details.php?device_id=<?php echo $rows['out_id'];?>&action=details_edit" class="btn btn-rose" target ="_blank">Details</a>
</td>
   <td>
<button type="button" class="btn btn-link btn-danger btn-just-icon edit" data-toggle="modal" data-target="#myModal_<?php ;?>"><i class="material-icons">edit</i></button>
<a href="out_new_devices_list.php?id=<?php ;?>&action=delete" class="btn btn-link btn-danger btn-just-icon remove" onclick="return confirm('Are You Sure You Want To Delete This Record ?')"><i class="material-icons">delete</i></a>
                        </td>
                        </tr>
                        <?php 
                     }
                        ?>
                      </tbody>
                        </table>
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
