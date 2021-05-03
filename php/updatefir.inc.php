<?php
	session_start();
    include_once "dbh.php";
	if(isset($_POST["submitted"]))
	{
        $stnid = $_POST["fi"];
        // $Cfname = $_POST["si"];   
        $cdt = $_POST["cna"]; 
        $fadd = $_POST["cti"];   
        // $cs = $_POST["ca"];
        $cd = $_POST["cri"];
        $Iname = $_POST["crd"];
        $Iadd = $_POST["in"];
        $nno = $_POST["iad"];
        $ofid = $_POST["num"];
        $sstatus = $_POST["fird"]; 
        $od = $_POST["offd"]; 
        $sta = $_POST["stats"];   
        // $ph = $_POST["photo"];
 
        $stnid = stripcslashes($stnid);
        // $Cfname = stripcslashes($Cfname);
        $cdt = stripcslashes($cdt);  
        $fadd = stripcslashes($fadd); 
        // $cs = stripcslashes($cs);  
        $cd = stripcslashes($cd); 
        $Iname = stripcslashes($Iname);
        $Iadd = stripcslashes($Iadd);  
        $nno = stripcslashes($nno); 
        $ofid = stripcslashes($ofid); 
        $sstatus = stripcslashes($sstatus); 
        $od = stripcslashes($od); 
        $sta = stripcslashes($sta);


        $stnid =  mysqli_real_escape_string($conn,$stnid);
        // $Cfname =  mysqli_real_escape_string($conn,$Cfname);
        $cdt =  mysqli_real_escape_string($conn,$cdt);  
        $fadd =  mysqli_real_escape_string($conn,$fadd); 
        // $cs =  mysqli_real_escape_string($conn,$cs);  
        $cd =  mysqli_real_escape_string($conn,$cd); 
        $Iname =  mysqli_real_escape_string($conn,$Iname);
        $Iadd =  mysqli_real_escape_string($conn,$Iadd);  
        $nno =  mysqli_real_escape_string($conn,$nno); 
        $ofid =  mysqli_real_escape_string($conn,$ofid); 
        $sstatus =  mysqli_real_escape_string($conn,$sstatus);
        $od =  mysqli_real_escape_string($conn,$od); 
        $sta =  mysqli_real_escape_string($conn,$sta);

        $info_arr=array('name'=>explode(',',$Iadd),'add'=>explode(';',$nno),'num'=>explode(',',$ofid));
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
        $destination = 'uploads/'.$filename;
        // the physical file on a temporary uploads directory on the server
        $file = $_FILES['photo']['tmp_name'];

        if (!in_array($extension, ['jpg','png'])) {
            echo " <script>
                   window.location.href='managefir.php';
                   alert('Your file extension must be .jpg, or .png');
                   </script>";
                   exit();
        } elseif ($_FILES['photo']['size'] > 10000000) { // file shouldn't be larger than 10 Megabyte
            echo "<script>
                   window.location.href='managefir.php';
                   alert('File too large!');
                   </script>";
                   exit();
        }
        else {
            if (move_uploaded_file($file, $destination)) {
                $sql="UPDATE `fir` SET `C_NAME`='$cdt',`PHOTO`='$filename',`CRIME_TIME`='$fadd',`CRIME_SCENE`=' $cd',`CRIME_DESC`='$Iname',`OFFICER_ID`='$od',`STATUS`='$sta' WHERE `FIR_NO`='$stnid'";
                $result = mysqli_query($conn, $sql);
                $newest_id = mysqli_insert_id($conn);
                if($result){
                    include 'updatewitness.php';
                    echo "<script>
                    window.location.href='managefir.php';
                    alert('FIR has been updated successfully!!! ');
                    </script>";
                    exit();
                }
                elseif (!$result) {
                    echo(mysqli_error($conn));
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
                echo "Failed to upload file.";
                    //  $message = "ERROR: Could not execute $sql. " . mysqli_error($conn);
                    // echo '<script language="Javascript" type="text/javascript">';
                    // echo     'alert('. json_encode($message) .');';
                    // echo '</script>';
                    // exit();
            }
        }
    }
    else {
        echo "<script>
            window.location.href='managefir.php';
            alert('There was a error!!! ');
            </script>";
            exit();
    }
?>