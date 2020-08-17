<?php 
////////////////Page Won't Work without Connections
$conn = mysqli_connect("localhost","root","","ita");
////////////////////////////////////////////////////////
/////////////////////////////////////////////////
if(!empty($_GET['cat_id'])) 
{
    $cat_id = $_GET['cat_id'];

 $sql = " Select * from `ita_devices` where cat_id ='$cat_id' " ; 
$results = mysqli_query($conn,$sql);
?>
<?php
foreach($results as $res) 
    {
?>
<option value="<?php echo $res["d_id"]; ?>"><?php echo $res["d_name"]; ?></option>
<?php
    }
  }
?>

<?php
    $sql2 = " Select * from `ita_category` where cat_id ='$cat_id' " ; 

    $results2 = mysqli_query($conn,$sql2);
    $rows = mysqli_fetch_array($results2);
    
             echo $cat_name = $rows['cat_name'];
            
          if($cat_name == 'Printers')
          {
?>
<script>
  document.getElementById("my_form2").style.display = "block";
  document.getElementById("my_form1").style.display = "none";
  window.location.replace("./inc_new_devices.php?<?php echo $cat_name ;?>");
</script>
<?php
          }
          else
          {
            ?>
           <script>
            document.getElementById("my_form2").style.display = "none";
  document.getElementById("my_form1").style.display = "block";
  window.location.replace("./inc_new_devices.php?<?php echo $cat_name ;?>");
 
</script>
            <?php      
                    
          }

          
?>



