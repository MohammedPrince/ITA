<?php 
/*
2019/10/01--05:16Pm-TusDay
Maverick Was Here,let The Fun Begin :D 
*/
session_start();
//VARS///
$global = "";
$alert ="" ;
$conn = "";
/////Set The Connections////
$conn = mysqli_connect("localhost","root","","ita");
mysqli_set_charset($conn,'UTF8');
mysqli_query($conn,"SET NAMES 'utf8'");
mysqli_query($conn,'SET CHARACTER SET utf8');
if(!$conn)
{
	echo "Error,".mysqli_connect_error($conn);
	die;
}
$star = "<font style='color:#900;'> * </font>";
//============= Change Date ========================//
function changeDateFormat($date)
{
	return date("Y-m-d", strtotime($date));	
}
//======================== Alerts =================//
function alerts($type,$message)
{
	switch($type)
	{
		case 1: {$res = ' <div class="alert alert-success col-md-6">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Success - </b> '.$message.'</span>
          </div>';break;}//Green
		case 2: {$res = '<div class="alert alert-warning col-md-6">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Warning - </b> '.$message.'</span>
          </div>';break;}//Blue
		case 3: {$res = '<div class="alert alert-info col-md-6">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Info - </b> '.$message.'</span>
          </div>';break;}//RED
		case 4: {$res = '<div class="alert alert-danger col-md-6">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <i class="material-icons">close</i>
            </button>
            <span>
              <b> Error - </b> '.$message.'</span>
          </div>';break;}//Red	
	}
	return $res;
}

//function Update_Status()
//{
/*
    $sql = "SELECT * FROM `ita_incoming_device` where remaining = '0' ";
    $query = mysqli_query($conn,$sql);

    $update_sql = "UPDATE `ita_incoming_device` SET `remaining_status` = 2 WHERE remaining = '0' ";
    $update_query = mysqli_query($conn,$update_sql);
    */

//}
////////////////////////////Login////////////////////////////
function Login($username,$password)
{
  global $conn; 
$pass = MD5($password);
 $sql = "SELECT * FROM `ita_users` WHERE `user_name`  = '{$username}' and `user_pass` = '{$pass}' and del = 0 ";
 $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query))
          {
                $rows = mysqli_fetch_array($query);
                $_SESSION['user_id'] = $rows['user_id'];
                $_SESSION['user_name'] = $rows['user_name'];
                $_SESSION['user_type'] = $rows['user_type'];
                ?>
<script> location.replace("../add_user.php"); </script>
                <?php
//header("location:../add_user.php");
          }
          else
          {
return false ;
          }
  
}
//======================== Add_Categorys  =================//
function Add_Category($cat_name)
{
global $conn;
 $sql = "SELECT * FROM `ita_category` WHERE cat_name  = '{$cat_name}' and del = 0";

        $query = mysqli_query($conn,$sql);
	    
		if(mysqli_num_rows($query)==1)
		    {
                return false ;
            }
            else
            {
     $insert_sql = "INSERT INTO `ita_category`(cat_name) VALUES ('{$cat_name}')";

            if($insert_query = mysqli_query($conn,$insert_sql))
	                {
                        return true ;
                    }
                    else
                    {
                        echo $insert_sql.die;
                        return false ;
                    }
            }       
}
//======================== View_Category =================//
function View_Category()
{
    global $conn;
$sql = "SELECT * FROM `ita_category` where del = '0' ";  
    if($query = mysqli_query($conn,$sql))
	{
		return $query;
	}
	else
	{
		echo $sql;die;
	} 
}
//======================== View_Category =================//
function View_Category_Id($cat)
{
    global $conn;
$sql = "SELECT * FROM `ita_category` where del = '0' and cat_id = $cat";  
    if($query = mysqli_query($conn,$sql))
	{
		return $query;
	}
	else
	{
		echo $sql;die;
	} 
}
function View_Devices_Id($cat)
{
  global $conn;
 //$sql = "SELECT * FROM `ita_devices` where del = '0' and cat_id = $cat";  
 $sql = "SELECT * FROM `ita_devices` D,`ita_incoming_device` INC 
 where D.del = '0' and D.cat_id = $cat and INC.d_id = D.d_id and INC.del = 0 and INC.unit > 0 ORDER BY D.d_id";  

      if($query = mysqli_query($conn,$sql))
    {
      return $query;
    }
    else
    {
      echo $sql;die;
    } 
}
function GET_SINGLE_DEVICE_ID($tag)
{
  global $conn; 
  $sql = "SELECT * from `ita_incoming_device` where service_tag = '{$tag}' and del = 0";
  $query = mysqli_query($conn,$sql);
  $res = mysqli_fetch_array($query);
  return $res['d_id'];
}
function GET_SINGLE_DEVICE_INFO($tag)
{
  global $conn; 
  $sql = "SELECT * from `ita_incoming_device` where service_tag = '{$tag}' and del = 0";
  $query = mysqli_query($conn,$sql);
  //$res = mysqli_fetch_array($query);
  return $query;
}
function View_Devices_Id_INC($cat)
{
  global $conn;
 $sql = "SELECT * FROM `ita_devices` where del = '0' and cat_id = $cat";  

      if($query = mysqli_query($conn,$sql))
    {
      return $query;
    }
    else
    {
      echo $sql;die;
    } 
}


function View_Devices_IN($cat)
{
  global $conn;

  $sql = "SELECT * FROM `ita_devices` D,`ita_incoming_device` INC where D.del = '0' and D.cat_id = $cat and INC.d_id = D.d_id ";  
   if($query = mysqli_query($conn,$sql))
   {
     return $query;
   }
   else
   {
     echo $sql;die;
   } 
}

function View_Devices_OUT($cat)
{

  global $conn; $service_tag = ''; $device_name  = '';

  $sql = "SELECT * FROM `ita_devices` D,`ita_out_device` O 
  where D.del = '0' and D.cat_id = $cat and O.d_id = D.d_id ";  
   if($query = mysqli_query($conn,$sql))
   {
     return $query;
   }
   else
   {
     echo $sql;die;
   } 
}
 
function Get_Device_INC_ID($cat)
{
  global $conn; $service_tag = ''; $device_name  = '';

  $temp_sql = "SELECT * FROM `ita_incoming_device` where cat_id = $cat and del = 0 ";
  $temp_query = mysqli_query($conn,$temp_sql);
  return $temp_query;
}

  
function View_Devices_IN_Id($cat)
{
  global $conn;
  $sql = "SELECT * FROM `ita_devices` D,`ita_incoming_device` INC where INC.del = 0 and D.del = '0' and D.cat_id = $cat and INC.d_id = D.d_id
  and INC.del = 0 order by d_id";  
      if($query = mysqli_query($conn,$sql))
    {
      return $query;
    }
    else
    {
      echo $sql;die;
    } 
}
//======================== Delete_Category =================//
function Delete_Category($cat_id)
{
    global $conn;
    $sql = "UPDATE `ita_category` SET del = 1 WHERE cat_id = $cat_id ";
        if($query = mysqli_query($conn,$sql))
        {
            return true ;
        }
        else
        {
            return false ;
        }
}

function Add_User($user_name,$user_type,$user_full_name,$emp_num)
{
  global $conn;
  $sql = "SELECT * FROM `ita_users` WHERE user_name  = '{$user_name}' and del = 0 ";
  $query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query)==1)
      {
          return false ;
      }
      else
      {
    $user_pass = MD5($user_name);
$insert_sql = "INSERT INTO `ita_users`(`user_name`,`user_pass`,`user_type`,`user_full_name`,`user_emp_id`) VALUES ('{$user_name}','{$user_pass}','{$user_type}','{$user_full_name}',$emp_num)";

      if($insert_query = mysqli_query($conn,$insert_sql))
              {
                  return true ;
              }
              else
              {
                  echo $insert_sql.die;
                  return false ;
              }
      } 
}

function Users_List()
{
  global $conn;
  $sql = "SELECT * FROM `ita_users` WHERE  del = 0 ";
  if($query = mysqli_query($conn,$sql))
	{
		return $query;
	}
	else
	{
		echo $sql;die;
	} 
}

function Edit_User($user_id,$user_name,$user_type,$user_full_name ,$emp_id)
{
  global $conn;  
$sql = "UPDATE `ita_users` SET user_name = '{$user_name}',user_type = $user_type ,user_full_name = '{$user_full_name}' , user_emp_id = $emp_id WHERE user_id = $user_id ";
if($query = mysqli_query($conn,$sql))
  {
    return true ;
  }
else
  {
  echo $sql;die;
    return false ;
  }
}

function Reset_Password($user_id)
{
  global $conn; 
  $sql = "SELECT * FROM `ita_users` WHERE  user_id  = $user_id ";
  $query = mysqli_query($conn,$sql);
  $rows = mysqli_fetch_array($query);
  $user_name = $rows['user_name']; 
  $user_password = MD5($user_name."@BOK*#ita");

  $update_sql  = "UPDATE `ita_users` SET user_pass = '{$user_password}' WHERE user_id = $user_id "; 
  if($update_query = mysqli_query($conn,$update_sql))
  {
    return true ;
  }
else
  {
  echo $update_sql;die;
    return false ;
  }
}
function Delete_User($user_id)
{
  global $conn;
    $sql = "UPDATE `ita_users` SET del = 1 WHERE user_id = $user_id ";
        if($query = mysqli_query($conn,$sql))
        {
            return true ;
        }
        else
        {
            return false ;
        }
}

function Add_Company($company_name)
{
global $conn;
  $sql = "SELECT * FROM `ita_companies` WHERE c_name  = '{$company_name}' and del = 0";

        $query = mysqli_query($conn,$sql);
	    
		if(mysqli_num_rows($query)==1)
		    {
                return false ;
            }
            else
            {
      $insert_sql = "INSERT INTO `ita_companies`(c_name,c_user_id) VALUES ('{$company_name}','{$_SESSION['user_id']}')";

            if($insert_query = mysqli_query($conn,$insert_sql))
	                {
                        return true ;
                    }
                    else
                    {
                        echo $insert_sql.die;
                        return false ;
                    }
            }       
}
function View_Companies()
{
  global $conn;
  $sql = "SELECT * FROM `ita_companies`C,`ita_users`U WHERE  C.del = 0 and C.c_user_id = U.user_id";
  if($query = mysqli_query($conn,$sql))
	{
		return $query;
	}
	else
	{
		echo $sql;die;
	}  
}
function View_Branch()
{
  global $conn;
  $sql = "SELECT * FROM `ita_branches` WHERE del = 0";
  if($query = mysqli_query($conn,$sql))
	{
		return $query;
	}
	else
	{
		echo $sql;die;
	} 
}
function Delete_Company($c_id)
{
  global $conn;
  $sql = "UPDATE `ita_companies` SET del = 1 WHERE c_id = $c_id ";
      if($query = mysqli_query($conn,$sql))
      {
          return true ;
      }
      else
      {
          return false ;
      }  
}
function Delete_Branch($b_id)
{
  global $conn;
  $sql = "UPDATE `ita_branches` SET del = 1 WHERE b_id = $b_id ";
      if($query = mysqli_query($conn,$sql))
      {
          return true ;
      }
      else
      {
          return false ;
      }  
}
function Add_Device($device_name,$device_model,$cat_id,$device_details,$d_img_name,$d_img_temp)
{
  global $conn;
  $sql = "SELECT * FROM `ita_devices` WHERE d_name  = '{$device_name}' and del = 0 and cat_id = $cat_id";

  $query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query)==1)
    {
          return false ;
      }
      else
      {
        move_uploaded_file($d_img_temp,"./uploads/" .$d_img_name);

$insert_sql = "INSERT INTO `ita_devices`(d_name,d_model,cat_id,`user_id`,d_details,`d_img`) VALUES ('{$device_name}','{$device_model}',$cat_id,'{$_SESSION['user_id']}','{$device_details}','{$d_img_name}')";

      if($insert_query = mysqli_query($conn,$insert_sql))
            {
                  return true ;
              }
              else
              {
                  echo $insert_sql.die;
                  return false ;
              }
      }
}
function Add_Branch($b_title_en,$b_title_ar,$b_code,$b_ip,$b_location)
{
  global $conn;
  $sql = "SELECT * FROM `ita_branches` where del = 0 and (b_title_en  ='{$b_title_en}' OR b_title_ar = '{$b_title_ar}')";
  $query = mysqli_query($conn,$sql);
  if(mysqli_num_rows($query))
    {
          return false ;
      }
      else
      {
$insert_sql = "INSERT INTO `ita_branches`(b_title_en,b_title_ar,b_code,b_ip,b_location,`user_id`)VALUES('{$b_title_en}','{$b_title_ar}','{$b_code}','{$b_ip}','{$b_location}','{$_SESSION['user_id']}')";
if($insert_query = mysqli_query($conn,$insert_sql))
              {
         return true ;
              }
              else
              {
        echo $insert_sql.die;
        return false ;
              }
      } 
}
function Edit_Branch($b_title_en,$b_title_ar,$b_code,$b_ip,$b_location,$b_id)
{
  
  global $conn;
  $sql = "UPDATE `ita_branches` SET b_title_en = '{$b_title_en}',b_title_ar = '{$b_title_ar}',b_code = '{$b_code}',b_ip = '{$b_ip}',b_location = '{$b_location}' , `user_id` = '{$_SESSION['user_id']}' WHERE b_id = '{$b_id}'";
  if($query = mysqli_query($conn,$sql))
  {
      return true ;
  }
  else
  {
      return false ;
  }
}
function Incoming_New_Devices($cat_id,$devices_id,$company_id,$unit,$remaining,$remaining_status,$receiving_date,$receipt_temp,$receipt_name,$comments,$rams,$cpus,$os,$delivery_date,$spec_file_temp,$spec_file_name,$service_tag)
{
  global $conn;

  $sql = "SELECT * FROM `ita_incoming_device` WHERE `d_id` = $devices_id and cat_id = $cat_id and del = 0 and c_id = $company_id  and service_tag = '{$service_tag}'";
  $query = mysqli_query($conn,$sql);

if(mysqli_num_rows($query))
      {
          return false ;
      }
      else
      {
move_uploaded_file($receipt_temp,"./uploads/" .$receipt_name);
move_uploaded_file($spec_file_temp,"./uploads/" .$spec_file_name);

$insert_sql = "INSERT INTO `ita_incoming_device`(cat_id,d_id,c_id,unit,remaining,remaining_status,receiving_date,receipt,comments,`user_id`,rams,cpu,os_version,delivery_date,specifications,service_tag)
 VALUES
 ($cat_id,$devices_id,$company_id,$unit,$remaining,'{$remaining_status}','{$receiving_date}','{$receipt_name}','{$comments}','{$_SESSION['user_id']}',$rams,'{$cpus}','{$os}','{$delivery_date}','{$spec_file_name}','{$service_tag}')"; 

if($insert_query = mysqli_query($conn,$insert_sql))
        {
            return true ;
        }
        else
        {
            echo $insert_sql.die;
            return false ;
        }
    }
}

function Incoming_Devices_List($cat_id)
{
  global $conn; 
 $sql = " SELECT * FROM `ita_incoming_device` L, `ita_devices` D , `ita_category` C ,`ita_companies` Cm ,`ita_users` U 
 WHERE L.`d_id` = D.`d_id` and L.`cat_id` = C.`cat_id` and L.`c_id` = Cm.`c_id` and U.`user_id` = L.`user_id` and L.`del` = 0 and L.cat_id = $cat_id" ;
if($query = mysqli_query($conn,$sql))
{
  return $query;
}
else
{
  echo $sql;die;
}
 
}

function Outgoing_Devices_List($cat_id)
{
  global $conn; 
 $sql = " SELECT * FROM `ita_out_device` L, `ita_devices` D , `ita_category` C  ,`ita_users` U 
 WHERE L.`d_id` = D.`d_id` and L.`cat_id` = C.`cat_id` and U.`user_id` = L.`user_id` and L.`del` = 0 and L.cat_id = $cat_id" ;
if($query = mysqli_query($conn,$sql))
{
  return $query;
}
else
{
  echo $sql;die;
}
 
}

function Edit_Inc_Devices($in_id,$cat_id,$devices_id,$company_id,$unit,$remaining,$remaining_status,$receiving_date,$receipt_temp,$receipt_name,$receipt_old,$comments,$rams,$cpus,$os,$delivery_date,$specification_old,$spec_file_name,$spec_file_temp)
{
  global $conn;
    
  if($receipt_name != '' || $receipt_temp != '')
        {
          move_uploaded_file($receipt_temp,"./uploads/" .$receipt_name) ;
        }
        else
        {
         $receipt_name =  $receipt_old ;
        }
  if($spec_file_name != '' || $spec_file_temp != '')
        {
          move_uploaded_file($spec_file_temp,"./uploads/" .$spec_file_name) ;
        }
        else
        {
          $spec_file_name =  $specification_old ;
        }

echo $sql= "UPDATE `ita_incoming_device` SET cat_id = $cat_id,d_id=$devices_id,c_id = $company_id ,unit = $unit,remaining = $remaining ,remaining_status = '{$remaining_status}' ,receiving_date = '{$receiving_date}',
 receipt = '{$receipt_name}' ,comments = '{$comments}',`user_id` = '{$_SESSION['user_id']}',rams = '{$rams}',cpu = '{$cpus}',os_version = '{$os}',delivery_date = '{$delivery_date}',specifications = '{$spec_file_name}'
 WHERE in_id = $in_id ";      
if($update_query = mysqli_query($conn,$sql))
  {
    return true ;
  }
else
  {
    echo $sql.die;
    return false ;
  }
}


function Get_Device_Inc_Qun($d_id)
{

  global $conn; 

  $sql = "Select * from `ita_incoming_device` where d_id  = $d_id and del = 0 " ;
  $query  = mysqli_query($conn,$sql) ;

    if(mysqli_num_rows($query))
    {
      $res = mysqli_fetch_array($query);

      $device_qun = $res['unit'] ;
    
        return $device_qun ;
    }
    else
    {
      return 0 ;
    }
}

function New_Devices_OUT_SAVE($cat_id,$device_id,$department,$barnch_id,$out_qun,$device_user,$device_name,$device_ip,$service_tag,$device_status,$status_date,$comments,$win_key)
{
  global $conn;
  $sql = "SELECT * FROM `ita_out_device` where d_id = $device_id  and del = 0 and cat_id  = $cat_id and out_service_tag  = $service_tag ";
    $query = mysqli_query($conn,$sql) ;
    $res = mysqli_fetch_array($query);

      if(mysqli_num_rows($query))
            {
              return false ;
            }
            else
            {
  $update_sql = "UPDATE `ita_incoming_device` SET `unit` = (`unit` - '$out_qun') where d_id  = $device_id and service_tag = '{$service_tag}'";
  $update_query = mysqli_query($conn,$update_sql);

 $sql_insert = "insert into `ita_out_device`(cat_id,d_id,out_dept,b_id,out_qun,out_device_user,out_device_name,out_device_ip,out_win_key,out_device_status,out_status_date,out_comments,user_id,out_service_tag)
       values
($cat_id,$device_id,'{$department}','{$barnch_id}',$out_qun,'{$device_user}','{$device_name}','{$device_ip}','{$win_key}','{$device_status}','{$status_date}','{$comments}','{$_SESSION['user_id']}' ,'{$service_tag}')"   ;
$insert_query = mysqli_query($conn,$sql_insert) ;

              if($insert_query)
              {
                return true ;
              }
              else
              {
                echo $sql_insert.die;
                return false ;
              }
            }
}
function New_Devices_OUT_SAVE_Printers($cat_id,$device_id,$department,$barnch_id,$printer_qun,$none1,$none2,$printer_ip,$service_tag,$status,$status_date,$comments)
{
  global $conn;
    $sql = "SELECT * FROM `ita_out_device` where d_id = $device_id  and del = 0 and cat_id  = $cat_id and out_service_tag  = $service_tag";
    $query = mysqli_query($conn,$sql) ;

      if(mysqli_num_rows($query))
            {
              return false ;
            }
            else
            {
  $update_sql = "UPDATE `ita_incoming_device` SET `unit` = (`unit` - '$printer_qun') where d_id  = $device_id and service_tag = '{$service_tag}' ";
  $update_query = mysqli_query($conn,$update_sql);

 $sql_insert = "insert into `ita_out_device`(cat_id,d_id,out_dept,b_id,out_qun,out_device_user,out_device_name,out_device_ip,out_device_status,out_status_date,out_comments,user_id,out_service_tag)
       values
($cat_id,$device_id,'{$department}','{$barnch_id}',$printer_qun,'{$none1}','{$none2}','{$printer_ip}','{$status}','{$status_date}','{$comments}','{$_SESSION['user_id']}','{$service_tag}')"   ;

$insert_query = mysqli_query($conn,$sql_insert) ;

              if($insert_query)
              {
                return true ;
              }
              else
              {
                echo $sql_insert.die;
                return false ;
              }

            }
}
function New_Devices_OUT_SAVE_Scanners($cat_id,$device_id,$department,$barnch_id,$scanner_qun,$none1,$none2,$scanner_ip,$service_tag,$status,$status_date,$comments)
{
  global $conn;
    $sql = "SELECT * FROM `ita_out_device` where d_id = $device_id  and del = 0 and cat_id  = $cat_id and out_service_tag  = $service_tag ";
    $query = mysqli_query($conn,$sql) ;

      if(mysqli_num_rows($query))
            {
              return false ;
            }
            else
            {
  $update_sql = "UPDATE `ita_incoming_device` SET `unit` = (`unit` - '$scanner_qun') where d_id  = $device_id and service_tag = '{$service_tag}'";
  $update_query = mysqli_query($conn,$update_sql);

 $sql_insert = "insert into `ita_out_device`(cat_id,d_id,out_dept,b_id,out_qun,out_device_user,out_device_name,out_device_ip,out_device_status,out_status_date,out_comments,user_id,out_service_tag)
       values
($cat_id,$device_id,'{$department}','{$barnch_id}',$scanner_qun,'{$none1}','{$none2}','{$scanner_ip}','{$status}','{$status_date}','{$comments}','{$_SESSION['user_id']}','{$service_tag}')"   ;

$insert_query = mysqli_query($conn,$sql_insert) ;

              if($insert_query)
              {
                return true ;
              }
              else
              {
                echo $sql_insert.die;
                return false ;
              }

            }
}
function New_Devices_OUT_SAVE_Phones($cat_id,$device_id,$department,$barnch_id,$phone_qun,$none1,$none2,$phone_ip,$phone_ext,$service_tag,$status,$status_date,$comments)
{
  global $conn;
    $sql = "SELECT * FROM `ita_out_device` where d_id = $device_id  and del = 0 and cat_id  = $cat_id and d_id  = $device_id and out_service_tag  = $service_tag";
    $query = mysqli_query($conn,$sql) ;

      if(mysqli_num_rows($query))
            {
              return false ;
            }
            else
            {
  $update_sql = "UPDATE `ita_incoming_device` SET `unit` = (`unit` - '$phone_qun') where d_id  = $device_id and service_tag = '{$service_tag}'";
  $update_query = mysqli_query($conn,$update_sql);

 $sql_insert = "insert into `ita_out_device`(cat_id,d_id,out_dept,b_id,out_qun,out_device_user,out_device_name,out_device_ip,out_phone_ext,out_device_status,out_status_date,out_comments,user_id,out_service_tag)
       values
($cat_id,$device_id,'{$department}','{$barnch_id}',$phone_qun,'{$none1}','{$none2}','{$phone_ip}','{$phone_ext}','{$status}','{$status_date}','{$comments}','{$_SESSION['user_id']}','{$service_tag}')"   ;

$insert_query = mysqli_query($conn,$sql_insert) ;

              if($insert_query)
              {
                return true ;
              }
              else
              {
                echo $sql_insert.die;
                return false ;
              }

            }
}

function Device_Details($device_id)
{
  global $conn; 
    $sql = " SELECT * FROM `ita_out_device` O , `ita_branches` B
   WHERE O.`del` = 0 and O.out_service_tag = '{$device_id}' and  B.b_code = O.b_id  " ;
if($query = mysqli_query($conn,$sql))
{
  return $query;
}
else
{
  echo $sql;die;
}
 
}

function Maintenance($d_id,$cat_id,$service_tag,$receiving_date,$maintain_date,$maintain_status,$status_date,$comments,$mn_type)
{
  global $conn; 
  $sql = "SELECT * FROM `ita_maintenance` where mn_service_tag = '{$service_tag}' and d_id = $d_id and cat_id = $cat_id and mn_type = $mn_type";
  $query = mysqli_query($conn,$sql) ;

  if(mysqli_num_rows($query))
        {
          return false ;
        }
        else
        {

      $update_sql = "UPDATE `ita_incoming_device` SET `unit` = (`unit` - 1) where d_id  = $d_id and service_tag = '{$service_tag}'";
      $update_query = mysqli_query($conn,$update_sql);

$insert_sql = "INSERT INTO `ita_maintenance`(cat_id,d_id,mn_service_tag,mn_receiving_date,mn_maintain_date,mn_status,mn_status_date,mn_comments,mn_type,`user_id`)
VALUES($cat_id,$d_id,'{$service_tag}','{$receiving_date}','{$maintain_date}','{$maintain_status}','{$status_date}','{$comments}','{$mn_type}','{$_SESSION['user_id']}')";
$insert_query = mysqli_query($conn,$insert_sql) ;
       if($insert_query && $update_query)
       {
         return true ;
       }
       else
       {
         echo $sql_insert.die;
         return false ;
       }
    }

}

function Out_Device_Info($cat_id,$type_id)
{
  global $conn; 
  $sql = "SELECT * FROM `ita_maintenance` M where M.cat_id = $cat_id and mn_type = $type_id ";
  $query = mysqli_query($conn,$sql);

  if(mysqli_num_rows($query))
        {
          return $query ;
        }
        else
        {
          return false ;
        }
}
function Delete_Device_INC($id)
{
  global $conn; 
  $sql = "UPDATE `ita_incoming_device` SET del = 1 where in_id = $id ";
  $query = mysqli_query($conn,$sql);

  if($query)
  {
    return true ;
  }
  else
  {
    return false ;
  }
 
}

function Device_Details_Single($id,$service_tag)
{
  global $conn;
   $sql = "SELECT * FROM `ita_users`U,`ita_companies` C,`ita_incoming_device`INC,`ita_devices`D where INC.in_id = $id and INC.service_tag = '{$service_tag}' and INC.del = 0
  and D.d_id = INC.d_id and INC.c_id = C.c_id and INC.user_id = U.user_id
  ";
  $query = mysqli_query($conn,$sql);
  
    return $query ;
  

}
?>

<script language="javascript"> 
/////////////////////////////////////////Filter////////////////////////////////
//===========================================================================//
function Get_Devices()
{
	var cat_id = document.getElementById('cat_id').value;
  $.ajax({          
        	type: "GET",
        	url: "./Includes/filter.php",
        	data:'cat_id='+cat_id,
        	success: function(data){
        		$("#device_id").html(data);
        	}
	});
	//alert(cat_id)
}
//===========================================================================//
function Get_Name(var1,var2)
{
	var cat_id = document.getElementById('cat_id').value;
  $.ajax({          
        	type: "GET",
        	url: "./Includes/filter.php",
        	data:'cat_id='+cat_id,
        	success: function(data){
        		$("#device_id").html(data);
        	}
	});
	//alert(cat_id)
}
///////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////
</script>