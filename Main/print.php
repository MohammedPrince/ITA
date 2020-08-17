<?php 
if(isset($_GET['id']) && ($_GET['service_tag']))
    {
        include("./Includes/functions.php");
 $id = $_GET['id'];
 $service_tag = $_GET['service_tag'];

 $Device_Details_Single  = Device_Details_Single($id,$service_tag);

 $result = mysqli_fetch_array($Device_Details_Single);
 
     $d_name = $result['d_name'];
     $d_rams = $result['rams'];
     $d_cpu = $result['cpu'];
     $d_os = $result['os_version'];
     $service_tag = $result['service_tag'];
     $delivery_date = $result['delivery_date'];
     $remaining = $result['remaining'];
     $c_name = $result['c_name'];
     $remaining_status = $result['remaining_status'];
     $receiving_date = $result['receiving_date'];
     $delivery_date = $result['delivery_date'];
    $user_name = $result['user_full_name'];
    $receipt = $result['receipt'];

     if($d_rams == '0')
     {
    $d_rams  = 'NONE';
     }
     if($d_cpu == '0')
     {
    $d_cpu  = 'NONE';
     }
     if($d_os == '0')
     {
    $d_os  = 'NONE';
     }

?>

 <link href="../assets/css/material-dashboard.minf066.css?v=2.1.0" rel="stylesheet" />

  <link href="../assets/demo/demo.css" rel="stylesheet" />

  <Title>Print Details</Title>

  <div class="content" id="main" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-text">
               
                </div>
                <div class="card-body">

<div id="my_form1">  

<div class="x_panel">
        <div class="x_title">
       
        <center>
            <div class="clearfix">
            <img src="../assets/img/bok.png" alt="Bank Of Khartoum" >
<h3 style="color:#000;">
Department of Information Technology
 </h3>
 <h4 style="color:#000;">
        
</h4>
            </div>
            </center>
        </div>
    </div>

<form method="post" action="inc_new_devices.php" class="form-horizontal" enctype="multipart/form-data" >
<input type="hidden" class="form-control" name="cat_id" required ="required" value="<?php echo "";?>" >

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device Name : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="name" required ="required" value="<?php echo $d_name;?>" disabled="disabled">
</div> 
</div> 
</div>


<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device RAMS : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="d_rams" required ="required" value="<?php echo $d_rams." GB";?>" disabled="disabled">
</div> 
</div> 
</div>


<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Device CPU : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="d_rams" required ="required" value="<?php echo $d_cpu;?>" disabled="disabled">
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">OS Version : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="d_rams" required ="required" value="<?php echo $d_cpu;?>" disabled="disabled">
</div> 
</div> 
</div>

<div class="row" >
<label class="col-sm-2 col-form-label">
<div class="card-text" style="color:#000;"> Service Tag : </div>
</label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="service_tag" required ="required" value="<?php echo $service_tag;?>" disabled="disabled">
            </div>         
</div>
</div>
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"> Company : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="service_tag" required ="required" value="<?php echo $c_name;?>" disabled="disabled">
</div> 
</div> 
</div>



<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Remaining Qunantity : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="remaining" required ="required" value="<?php echo $remaining;?>" disabled="disabled"> 
<span class="bmd-help"> Enter Remaining Qunantity</span>
</div> 
</div> 
</div>


<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"> Remaining Status: </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="remaining_status" required ="required" value="<?php echo $remaining_status;?>" disabled="disabled">
</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Receiving Date : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="date" class="form-control" name="receiving_date" required ="required" value="<?php echo $receiving_date ;?>" disabled="disabled">

</div> 
</div> 
</div>

<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">Delivery Date : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="date" class="form-control" name="delivery_date" required ="required" value="<?php echo $delivery_date ;?>" disabled="disabled">

</div> 
</div> 
</div>





<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;">User Name : </div></label>
<div class="col-md-3">
<div class="form-group">
<input type="text" class="form-control" name="delivery_date" required ="required" value="<?php echo $user_name ;?>" disabled="disabled">

</div> 
</div> 
</div>






<div class="row">
<label class="col-sm-2 col-form-label">  <div class="card-text" style="color:#000;"></div></label>
<div class="col-md-3">
<div class="form-group">
<div id="toggleButton" style="display:block;">
    <button id="toggleButton" onclick="printDiv('main');"  style="background-color: #4CAF50; /* Green */
  border: none;
  color: white;

  
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 20px;">Print Form</button>
    </div>

</div> 
</div> 
</div>

</div>
</div>
</form>


</div>


<?php 
        }
        else
        {

        }
?>

<script>
	function printDiv(divName)
        {
      var x = document.getElementById("toggleButton");
      x.style.display = "none";
			window.print();
			document.body.innerHTML = originalContents;
		}
    </script>


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
