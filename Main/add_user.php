<?php 
$page_name = 'Add Users';
$link = 'add_user.php';
include ("Includes/header.php");
?>
<?php
//////////////////Delete/////////////
if(isset($_GET['action']))
{
  $action = $_GET['action'];

    if($action =='delete')
        {
 $user_id = $_GET['user_id'];
 
        if ($delete_user = Delete_User($user_id))
                    {
                        $alert = alerts(1,"User Deleted Successfully !");
                    }
                    else
                    {
                        $alert = alerts(4,"User NOT Deleted,Try Again !");
                    }
        }
}
//////////////////Add Users/////////////
if(isset($_POST['add_user']))
    {
$user_name = $_POST['user_name'];
$user_type = $_POST['user_type'];
$user_full_name = $_POST['user_full_name'];
$emp_id = $_POST['emp_id'];

if( trim($user_name) == '' )
    {
  $alert = alerts(2,"Username Can't be Empty,Try again with real names !");
    }
else
  {
    if($add_user = Add_User($user_name,$user_type,$user_full_name,$emp_id) )
        {
          $alert = alerts(1,"User ".$user_name." added successfully !");
        }
        else
        {
          $alert = alerts(4,"User ".$user_name." already exist !");
        }
  }
}
//////////////////Edit Users/////////////
if( (isset($_POST['edit'])) || (isset($_POST['reset'])) )
    {
      $user_id =  $_POST['user_id'];

      if(isset($_POST['edit']) != NULL)
        {
 $user_name =  $_POST['user_name'];
 $user_type =  $_POST['user_type'];
 $user_full_name =  $_POST['user_full_name'];
 $emp_id = $_POST['emp_id'];

 if( trim($user_name) == '' )
  {
    $alert = alerts(2,"Username Can't be Empty,Try again with real names !");
  }
  else
  {
 if($edit_user = Edit_User($user_id,$user_name,$user_type,$user_full_name,$emp_id))
    {
$alert = alerts(1,"User ".$user_name." Updated successfully !");
    }
    else
    {
      $alert = alerts(4,"Cannot Update User info !");
    }
  }
        }

      if(isset($_POST['reset']) != NULL)
        {
if($reset_password = Reset_Password($user_id))
{
  $alert = alerts(1,"Password Reset Successfully !");
}
else
{
  $alert = alerts(4,"Cannot Reset Password !");
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
                    <h4 class="card-title">Add Users</h4>
                  </div>
                </div>
                    <div class="card-body ">

<?php
  echo $alert ;
?>

         <form method="post" action="add_user.php" class="form-horizontal">

                    <div class="row">
                    </br>

                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">User Login Name : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">

                          <input type="text" class="form-control" name="user_name" required ="required">
                          <span class="bmd-help"> User Name</span>

                          </div> </div> </div>

                          <div class="row">
                          <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">User Full Name : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">

                          <input type="text" class="form-control" name="user_full_name" required ="required">
                          <span class="bmd-help"> User Full Name</span>

                          </div> </div> </div>

                          <div class="row">
                          <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Employee ID  : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">

                          <input type="text" class="form-control" name="emp_id" required ="required">
                          <span class="bmd-help"> Employee ID</span>

                          </div> </div> </div>
                          
                          <div class="row">
                          <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">User Type : </div></label>
                        <div class="col-md-3">
                        <div class="form-group">
                          <select class="form-control" data-size="7" data-style="select-with-transition" required = "required" name="user_type">
                            <option disabled selected >Select User Type</option>
                            <option value="1">Admin</option>
                            <option value="2">Staff</option>
                            <option value="3">IT Staff</option>
                          
                          </select>

                          </br>  </br>
                          <button type="submit" class="btn btn-fill btn-rose" name="add_user">Add User</button>

                          </div>   </div> </div>                        

                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
<hr/>
<?php 
$users_list = Users_List();

if(mysqli_num_rows($users_list))
    { 
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title"> Users List</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                  </div>

<div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>User ID </th>
                          <th>Login Name</th>
                          <th>Full Name</th>
                          <th>Employee ID</th>
                          <th>User Type</th>
                          <th>Date/Time</th>
                          <th>Edit/Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                   
        while($res = mysqli_fetch_array($users_list))
                       {
                          $user_id = $res['user_id'];
                          $user_name = $res['user_name'];
                          $user_full_name = $res['user_full_name'];
                          $emp_id = $res['user_emp_id'];
                          $user_type = $res['user_type'];
                          $date_time = $res['user_date'];

                          if($user_type == 1)
                          {
                            $user_type = 'Admin';
                          }
                          if($user_type == 2)
                          {
                            $user_type = 'Staff';
                          }
                          if($user_type == 3)
                          {
                            $user_type = 'IT Staff';
                          }
                      ?>
                        <tr>
                          <td><?php echo $user_id?></td>
                          <td><?php echo $user_name?></td>
                          <td><?php echo $user_full_name?></td>
                          <td><?php echo $emp_id?></td>
                          <td><?php echo $user_type?></td>
                          <td><?php echo $date_time?></td>
                          <td >

<button type="button" class="btn btn-link btn-danger btn-just-icon edit" data-toggle="modal" data-target="#myModal_<?php echo $user_id ;?>"><i class="material-icons">edit</i></button>
<a href="add_user.php?user_id=<?php echo $user_id;?>&action=delete" class="btn btn-link btn-danger btn-just-icon remove" onclick="return confirm('Are You Sure You Want To Delete This Record ?')"><i class="material-icons">delete</i></a>
                          </td>
                        </tr>
                        <!--Modal: modalCookie-->
<div class="modal fade top" id="myModal_<?php echo $user_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Body-->
      <div class="modal-body">
      <div class="card-text">
                    <h3 class="card-title"> <b>Edit User <?php echo $user_name ;?></b></h3>
                  </div>
      <form method="post" action="add_user.php" class="form-horizontal">
                   
                    <div class="row"></br>

                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">User Name </div></label>
                      <div class="col-md-6">
                        <div class="form-group">

                          <input type="text" class="form-control" name="user_name" required ="required" value="<?php echo $user_name?>">
                          <input type="hidden" class="form-control" name="user_id" required ="required" value="<?php echo $user_id?>">
                          <span class="bmd-help"> User Name</span>

                          </div> </div> </div>

                          <div class="row">
                          <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">User Full Name : </div></label>
                      <div class="col-md-6">
                        <div class="form-group">

                          <input type="text" class="form-control" name="user_full_name" required ="required" value="<?php echo $user_full_name?>">
                          <span class="bmd-help"> User Full Name</span>

                          </div> </div> </div>

                          <div class="row">
                          <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Employee ID  : </div></label>
                      <div class="col-md-6">
                        <div class="form-group">

                          <input type="text" class="form-control" name="emp_id" required ="required">
                          <span class="bmd-help"> Employee ID</span>

                          </div> </div> </div>
                          
                          <div class="row">
                          <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">User Type </div></label>
                        <div class="col-md-6">
                        <div class="form-group">
                          <select class="form-control" data-style="select-with-transition" required = "required" name="user_type" class="col-md-6">
                    
                            <option value="1">Admin</option>
                            <option value="2">Manager</option>
                            <option value="3">IT Staff</option>
                          
                          </select>

                          </br>  </div>   </div> </div>     
                          <div class="row">
                          <button type="submit" class="btn btn-fill btn-rose" name="edit">Edit User</button>
                          <button type="submit" class="btn btn-fill btn-info" name="reset">Reset Password</button>
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
