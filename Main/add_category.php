<?php 
$page_name = 'Add Categories';
$link = 'add_category.php';
include ("Includes/header.php");
?>

<?php 
//////////////////Delete/////////////
if(isset($_GET['action']))
{
  $action = $_GET['action'];

    if($action =='delete')
        {
 $cat_id = $_GET['cat_id'];
 
        if ($delete_category = Delete_Category($cat_id))
                    {
                        $alert = alerts(1,"Category Deleted Successfully !");
                    }
                    else
                    {
                        $alert = alerts(4,"Category NOT Deleted,Try Again !");
                    }

        }
}
//////////////////Add Category/////////////
if(isset($_POST['add_category']))
    {
        $cat_name = $_POST['cat_name'] ;

        if( trim($cat_name) == '' )
          {
            $alert = alerts(2,"Category Can't be Empty,Try again with real names !");
          }
          else
          {

        if ($add_category = Add_Category($cat_name) )
            {
                $alert = alerts(1,"Category ".$cat_name." added successfully !");
            }
            else
            {
                $alert = alerts(4,"Category ".$cat_name." already exist !");
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
                    <h4 class="card-title">Add Categories</h4>
                  </div>
                </div>
                    <div class="card-body ">

<?php
  echo $alert ;
?>

                  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-horizontal">
                    <div class="row"></br>
                      <label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Category Name : </div></label>
                      <div class="col-md-3">
                        <div class="form-group">

                          <input type="text" class="form-control" name="cat_name" required ="required">
                          <span class="bmd-help">Add Category Name  For examble (Pc,Printers,Scanners...etc) </span>
                          </br>

                          <button type="submit" class="btn btn-fill btn-rose" name="add_category">Add Category</button>

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
$category_list = View_Category();

if(mysqli_num_rows($category_list))
    { 
?>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-text">
                <div class="card-text">
                    <h4 class="card-title"> Categories List</h4>
                  </div>
                </div>
                <div class="card-body">
                  <div class="toolbar">
                  </div>

<div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                      <thead>
                        <tr>
                          <th>Cateroty ID </th>
                          <th>Cateroty Name</th>
                          <th>Date/Time</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
        while($res = mysqli_fetch_array($category_list))
                       {
                          $cat_id = $res['cat_id'];
                          $cat_name = $res['cat_name'];
                          $cat_date_time = $res['cat_date'];
                      ?>
                        <tr>
                          <td><?php echo $cat_id?></td>
                          <td><?php echo $cat_name?></td>
                          <td><?php echo $cat_date_time?></td>
                          <td >

<a href="add_category.php?cat_id=<?php echo $cat_id;?>&action=delete" class="btn btn-link btn-danger btn-just-icon remove" onclick="return confirm('Are You Sure You Want To Delete This Record ?')"><i class="material-icons">delete</i></a>
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