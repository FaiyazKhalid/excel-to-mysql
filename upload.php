<?php
if(isset($_POST["bulk"]))
{

                $url='localhost';
                $username='addusername';
                $password='addpassword';
                $conn=mysqli_connect($url,$username,$password,"advocate_wall");
          if(!$conn){
          die('Could not Connect My Sql:' .mysqli_error());
		  }
          $file = $_FILES['file']['tmp_name'];
          $handle = fopen($file, "r");
          $c = 0;
          while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
                    {
          $id = $filesop[0];
          $fname = $filesop[1];
          $lname = $filesop[2];
          $title = $filesop[3];
          $rank = $filesop[4];
          $depart = $filesop[5];
          $email = $filesop[6];
          $staffid = $filesop[7];
          $online = $filesop[8];
           $pic= $filesop[9];
        $time = $filesop[10];
           
           
            $sql = "INSERT INTO Users(Firstname,Sirname,Mtitle,Rank,Department,Email,Staffid,Online,Picname,Time) VALUES ('$fname','$lname','$title', '$rank', '$depart', '$email', '$staffid', '$online', '$pic', '$time')";
          
          
         
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
