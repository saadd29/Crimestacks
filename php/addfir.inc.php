<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
        // $sql = "SELECT * FROM fir";
        // $result = mysqli_query($conn, $sql);
        // $files = mysqli_fetch_assoc($result);

        // $stnid = $_POST["stnid"];
        $Cfname = $_POST["Cname"];   
        $cdt = $_POST["cdt"]; 
        // $fadd = $_POST["fadd"];   
        $cs = $_POST["cs"];
        $cd = $_POST["cd"];
        $Iname = $_POST["Iname"];
        $Iadd = $_POST["Iadd"];
        $nno = $_POST["no"];
        $ofid = $_POST["ofid"];
        $sstatus = $_POST["status"]; 
        //$filename = $_POST["filename"]; 

        // $stnid = stripcslashes($stnid);
        $Cfname = stripcslashes($Cfname);
        $cdt = stripcslashes($cdt);  
        $fadd = stripcslashes($fadd); 
        $cs = stripcslashes($cs);  
        $cd = stripcslashes($cd); 
        $Iname = stripcslashes($Iname);
        $Iadd = stripcslashes($Iadd);  
        $nno = stripcslashes($nno); 
        $ofid = stripcslashes($ofid); 
        $sstatus = stripcslashes($sstatus); 
  
        // $stnid =  mysqli_real_escape_string($conn,$stnid);
        $Cfname =  mysqli_real_escape_string($conn,$Cfname);
        $cdt =  mysqli_real_escape_string($conn,$cdt);  
        $fadd =  mysqli_real_escape_string($conn,$fadd); 
        $cs =  mysqli_real_escape_string($conn,$cs);  
        $cd =  mysqli_real_escape_string($conn,$cd); 
        $Iname =  mysqli_real_escape_string($conn,$Iname);
        $Iadd =  mysqli_real_escape_string($conn,$Iadd);  
        $nno =  mysqli_real_escape_string($conn,$nno); 
        $ofid =  mysqli_real_escape_string($conn,$ofid); 
        $sstatus =  mysqli_real_escape_string($conn,$sstatus);

        $info_arr=array('name'=>explode(',',$Iname),'add'=>explode(';',$Iadd),'num'=>explode(',',$nno));

        if($_FILES['photo']['size'] == 0 && $_FILES['photo']['error'] == 4){
            $filename='conv.jpg';
            $actual_name = pathinfo($filename,PATHINFO_FILENAME);
            $original_name = $actual_name;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
        }
        else{
            $filename = $_FILES['photo']['name'];
            $actual_name = pathinfo($filename,PATHINFO_FILENAME);
            $original_name = $actual_name;
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $i = 1;
            while(file_exists('uploads/'.$actual_name.".".$extension))
            {           
                $actual_name = (string)$original_name.$i;
                $filename = $actual_name.".".$extension;
                $i++;
            }
        }

        
        $destination = 'uploads/'.$filename;
        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['photo']['tmp_name'];

        if (!in_array($extension, ['jpg','png'])) {
                echo " <script>
                   window.location.href='addfir.php';
                   alert('Your file extension must be .jpg, or .png');
                   </script>";
                   exit();
        } elseif ($_FILES['photo']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
            echo "<script>
                   window.location.href='addfir.php';
                   alert('File too large!');
                   </script>";
                   exit();
        }
        else {
            if (move_uploaded_file($file, $destination)) {
                $sql="INSERT INTO `fir`(`photo`, `C_NAME`,`CRIME_TIME`, `CRIME_SCENE`, `CRIME_DESC`, `OFFICER_ID`, `STATUS`) VALUES ('$filename','$Cfname','$cdt','$cs','$cd','$ofid','$sstatus')";
                // $sql="INSERT INTO `fir`(`photo`,`STN_ID`, `C_NAME`,`CRIME_TIME`, `C_ADDRESS`, `CRIME_SCENE`, `CRIME_DESC`, `I_NAME`, `I_ADDREESS`, `NUMBER`, `OFFICER_ID`, `STATUS`) VALUES ('$filename','$stnid','$Cfname','$cdt','$fadd','$cs','$cd','$Iname','$Iadd','$nno','$ofid','$sstatus')";
                $result = mysqli_query($conn, $sql);
                $newest_id = mysqli_insert_id($conn);
                if($result){
                    echo $_FILES['photo']['name'];
                    include 'addwitness.php';
                    echo "<script>
                    window.location.href='managefir.php';
                    alert('The FIR has been registered successfully!!! ');
                    </script>";
                    exit();
                }
                else{
                    $message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
                    echo '<script language="Javascript" type="text/javascript">';
                    echo     'alert('. json_encode($message) .');';
                    echo '</script>';
                    exit();
                  }
                    
                }
            else{
                $sql="INSERT INTO `fir`(`photo`, `C_NAME`,`CRIME_TIME`, `CRIME_SCENE`, `CRIME_DESC`, `OFFICER_ID`, `STATUS`) VALUES ('$filename','$Cfname','$cdt','$cs','$cd','$ofid','$sstatus')";
                // $sql="INSERT INTO `fir`(`photo`,`STN_ID`, `C_NAME`,`CRIME_TIME`, `C_ADDRESS`, `CRIME_SCENE`, `CRIME_DESC`, `I_NAME`, `I_ADDREESS`, `NUMBER`, `OFFICER_ID`, `STATUS`) VALUES ('$filename','$stnid','$Cfname','$cdt','$fadd','$cs','$cd','$Iname','$Iadd','$nno','$ofid','$sstatus')";
                $result = mysqli_query($conn, $sql);
                $newest_id = mysqli_insert_id($conn);
                if($result){
                    include 'addwitness.php';
                    echo $_FILES['photo']['name']."<script>
                    window.location.href='managefir.php';
                    alert('The FIR has been registered successfully!!! ');
                    </script>";
                    exit();
                }
                else{
                    $message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
                    echo '<script language="Javascript" type="text/javascript">';
                    echo     'alert('. json_encode($message) .');';
                    echo '</script>';
                    exit();
                  }
                    //  $message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
                    // echo '<script language="Javascript" type="text/javascript">';
                    // echo     'alert('. json_encode($message) .');';
                    // echo '</script>';
                    // exit();
            }
        }
        // $sql="INSERT INTO `fir`( `C_NAME`, `NUMBER`, `STATUS`) VALUES ('$Cfname','$nno','$sstatus')";
        
        
    }
    else {
        echo "<script>
        window.location.href='addfir.php';
        alert('There was a error!!! ');
        </script>";
        exit();
    }
?>