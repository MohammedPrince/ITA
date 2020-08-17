<?php 
header('Content-Type: text/html; charset=utf-8');

$page_name = 'Add Branch';
$link = 'add_branch.php';
include ("Includes/header.php");

?>
<?php 
//////////////////Delete/////////////
if(isset($_GET['action']))
{
  $action = $_GET['action'];

    if($action =='delete')
        {
 $b_id = $_GET['b_id'];
 
        if ($delete_branch = Delete_Branch($b_id))
                    {
                        $alert = alerts(1,"Branch Deleted Successfully !");
                    }
                    else
                    {
                        $alert = alerts(4,"Branch NOT Deleted,Try Again !");
                    }
        }
}

if(isset($_POST['edit']))
{
    $b_title_en  =$_POST['b_title_en'];
    $b_title_ar  =$_POST['b_title_ar'];
    $b_code  =$_POST['b_code'];
    $b_ip  =$_POST['b_ip'];
    $b_location  = $_POST['b_location'];
    $b_id = $_POST['b_id'];

    if( trim($b_title_en) == '' || trim($b_title_ar) == '' )
          {
            $alert = alerts(2,"Branch Can't be Empty,Try again with real names !");
          }
          else
          {
            if($edit_branch = Edit_Branch($b_title_en,$b_title_ar,$b_code,$b_ip,$b_location,$b_id))
            {
                $alert = alerts(1,"Branch ".$b_title_en." Updated successfully !");
            }
            else
            {
                $alert = alerts(4,"Cannot Update Branch info !");
            }
          }
}

if(isset($_POST['add_branch']))
{

$b_title_en  =$_POST['b_title_en'];
$b_title_ar  =$_POST['b_title_ar'];
$b_code  =$_POST['b_code'];
$b_ip  =$_POST['b_ip'];
$b_location  =$_POST['b_location'];

if( trim($b_title_en) == '' || trim($b_title_ar) == '' )
          {
            $alert = alerts(2,"Branch Can't be Empty,Try again with real names !");
          }
          else
          {

    if($add_branch = Add_Branch($b_title_en,$b_title_ar,$b_code,$b_ip,$b_location))
        {
            $alert = alerts(1,"Branch ".$b_title_en." added successfully !");
        }
        else
        {
            $alert = alerts(4,"Branch ".$b_title_en." already exist !");
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
?>

                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">

                  <div class="row">
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Branch Title EN :</div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_title_en" required ="required" placeholder="Enter Branch name in English">
                          <span class="bmd-help"> Branch Name In English</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Branch Title Arabic :</div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_title_ar" required ="required" placeholder="Enter Branch name in Arabic">
                          <span class="bmd-help"> Branch Name In Arabic</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Branch Code :</div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_code" required ="required" placeholder="Enter Branch Code">
                          <span class="bmd-help"> Branch Code</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Branch IP :</div></label>
                      <div class="col-md-3">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_ip" required ="required" placeholder="Enter Branch IP">
                          <span class="bmd-help">Branch IP</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                        <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"> Branch Location: </div></label>
                        <div class="col-md-3">
                        <div class="form-group">
                        <select class="form-control" data-size="7" data-style="select-with-transition" required = "required" name="b_location" id= "b_location" >
                        <option value="">Select Branch Location</option>
                        <option value="1">Khartoum</option>
                        <option value="2">States</option>
                        </select>

                        </br>  </br>
                          <button type="submit" class="btn btn-fill btn-rose" name="add_branch">Add Branch</button>

                        </div> 
                        </div> 
                        </div>




                  </form>
                  
                </div>
              </div>
          
            <hr/>
            
            <?php 
$branches_list = View_Branch();

if(mysqli_num_rows($branches_list))
    { 
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title"> Branches List</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                  </div>

<div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th>Branch Name EN</th>
                          <th>Branch Name Ar</th>
                          <th>Branch Code</th>
                          <th>Branch IP</th>
                          <th>Branch location</th>
                          <th>Date/Time</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
        while($res = mysqli_fetch_array($branches_list))
                       {
                          $B_id = $res['b_id'];
                          $B_name_en = $res['b_title_en'];
                          $B_name_ar = $res['b_title_ar'];
                          $B_code  = $res['b_code'];
                          $B_ip = $res['b_ip'];
                          $B_location = $res['b_location'];
                          $user_id = $res['user_id'];
                          $B_date_time = $res['b_date'];
                      ?>
                        <tr>
                          <td><?php echo $B_id?></td>
                          <td><?php echo $B_name_en?></td>
                          <td><?php echo $B_name_ar?></td>
                          <td><?php echo $B_code?></td>
                          <td><?php echo $B_ip?></td>
                          <td>
                          <?php 

                          if($B_location == '1')
                          {
                                echo "Khartoum";
                          }
                          if($B_location == '2')
                          {
                                echo "States";
                          }
                          
                          ?>
                          </td>
                          <td><?php echo $B_date_time?></td>
                          <td>
<button type="button" class="btn btn-link btn-danger btn-just-icon edit" data-toggle="modal" data-target="#myModal_<?php echo $B_id ;?>"><i class="material-icons">edit</i></button>
<a href="add_branch.php?b_id=<?php echo $B_id;?>&action=delete" class="btn btn-link btn-danger btn-just-icon remove" onclick="return confirm('Are You Sure You Want To Delete This Record ?')"><i class="material-icons">delete</i></a>
                          </td>
                        </tr>

 <!--Modal: modalCookie-->
 <div class="modal fade top" id="myModal_<?php echo $B_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body">
      <div class="card-text">
                    <h3 class="card-title"> <b>Edit Branch <?php echo $B_name_en ;?></b></h3>
                  </div>
      <form method="post" action="add_branch.php" class="form-horizontal">
      <input type="hidden" class="form-control" name="b_id"  value="<?php echo $B_id?>" >
      <div class="row">
                      <label class="col-sm-3 col-form-label">  <div class="card-text" style="color:#000;">Branch Title EN :</div></label>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_title_en" required ="required" placeholder="Enter Branch name in English" value="<?php echo $B_name_en?>" >
                          <span class="bmd-help"> Branch Name In English</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                      <label class="col-sm-3 col-form-label">  <div class="card-text" style="color:#000;">Branch Title Arabic :</div></label>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_title_ar" required ="required" placeholder="Enter Branch name in Arabic" value="<?php echo $B_name_ar?>">
                          <span class="bmd-help"> Branch Name In Arabic</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                      <label class="col-sm-3 col-form-label">  <div class="card-text" style="color:#000;">Branch Code :</div></label>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_code" required ="required" placeholder="Enter Branch Code" value="<?php echo $B_code?>">
                          <span class="bmd-help"> Branch Code</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                      <label class="col-sm-3 col-form-label">  <div class="card-text" style="color:#000;">Branch IP :</div></label>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" name="b_ip" required ="required" placeholder="Enter Branch IP" value="<?php echo $B_ip?>">
                          <span class="bmd-help">Branch IP</span>
                          </div>
                          </div>
                          </div>

                          <div class="row">
                        <label class="col-sm-3 col-form-label">  <div class="card-text" style="color:#000;"> Branch Location: </div></label>
                        <div class="col-md-6">
                        <div class="form-group">
                        <select class="form-control" data-size="7" data-style="select-with-transition" required = "required" name="b_location" id= "b_location" >
                      
                        <option value="1">Khartoum</option>
                        <option value="2">States</option>
                        </select>
                        </div> 
                        </div> 
                        </div>

                       
                          <div class="row">
                          <button type="submit" class="btn btn-fill btn-rose" name="edit">Edit Branch</button>
                          
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

<?php 
                       }
?>
                      </tbody>
                    </table>
                  </div>

                  </div>
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
    }
?>

<?php 
include ("Includes/footer.php")
?>