<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_POST["submit"]))
{

               $url='localhost';
$username='u656699139_lms2';
$password='**********';
$conn=mysqli_connect($url,$username,$password,"u656699139_lms2");
          if(!$conn){
          die('Could not Connect My Sql:' .mysqli_error());
		  }
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          $id = $filesop[0];
          $x = $filesop[1];
           
           $fname= str_replace('/',"",$x); 
            $sql = "INSERT INTO `rename` (id,name) VALUES ('$id','$x')";
          
          
         
          $stmt = mysqli_prepare($conn,$sql);
          mysqli_stmt_execute($stmt);

         $c = $c + 1;
           }

            if($sql){
               echo "sucess";
             } 
		 else
		 {
            echo "Sorry! Unable to impo.";
          }

}
?>
<form method="post" enctype="multipart/form-data">
  Select CSV Excel file to upload:
  <input type="file" name="file" id="fileToUpload">
  <input type="submit" value="Upload file" name="submit">
</form>
