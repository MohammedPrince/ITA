<?php 
$page_name = 'Add Companies';
$link = 'add_company.php';
include ("Includes/header.php");
?>
<?php 
//////////////////Delete/////////////
if(isset($_GET['action']))
{
  $action = $_GET['action'];

    if($action =='delete')
        {
 $c_id = $_GET['c_id'];
 
        if ($delete_company = Delete_Company($c_id))
                    {
                        $alert = alerts(1,"Company Deleted Successfully !");
                    }
                    else
                    {
                        $alert = alerts(4,"Company NOT Deleted,Try Again !");
                    }
        }
}
//////////////////Add Company/////////////
if(isset($_POST['add_company']))
    {
        $company_name = $_POST['c_name'] ;

        if( trim($company_name) == '' )
          {
            $alert = alerts(2,"Company Can't be Empty,Try again with real names !");
          }
          else
          {
        if ($add_company = Add_Company($company_name))
            {
                $alert = alerts(1,"Company ".$company_name." added successfully !");
            }
            else
            {
                $alert = alerts(4,"Company ".$company_name." already exist !");
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
                    <div class="row"></br>
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Company Name : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">

                          <input type="text" class="form-control" name="c_name" required ="required">
                          <span class="bmd-help">Enter Company Name</span>
                          </br>

                          <button type="submit" class="btn btn-fill btn-rose" name="add_company">Add Company</button>

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

$company_list = View_Companies();

if(mysqli_num_rows($company_list))
    { 
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title"> Companies List</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                  </div>

<div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Company ID </th>
                          <th>Company Name</th>
                          <th>Added By</th>
                          <th>Date/Time</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
        while($res = mysqli_fetch_array($company_list))
                       {
                          $c_id = $res['c_id'];
                          $c_name = $res['c_name'];
                          $user_name = $res['user_name'];
                          $date_time = $res['c_date'];
                      ?>
                        <tr>
                          <td><?php echo $c_id?></td>
                          <td><?php echo $c_name?></td>
                          <td><?php echo $user_name?></td>
                          <td><?php echo $date_time?></td>
                          <td >
<a href="add_company.php?c_id=<?php echo $c_id;?>&action=delete" class="btn btn-link btn-danger btn-just-icon remove" onclick="return confirm('Are You Sure You Want To Delete This Record ?')"><i class="material-icons">delete</i></a>
                          </td>
                        </tr>
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