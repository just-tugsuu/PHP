<?php 
   
   require_once './config/config.php';

   $petName_err = $ownerName_err = $petBirth_err = " ";
   $upPetName = $upOwnerName = $upPetType = $upPetGender = $upPetBirth = ""; 

   if(isset($_POST['submit'])) {
       if(is_numeric(trim($_POST['pet_name']))) {
           $petName_err = 'Зөвхөн тоо биш үсэгтэй цуг оруулана уу';
           $ownerName_err = is_numeric(trim($_POST['pet_owner'])) ? 'Таны нэр буруу байна' : " ";
       }
       elseif(!$_POST['pet_birth']) {
           $petBirth_err = 'Амьтаны насыг оруулана уу';
       }
       else {
           
        $query = "INSERT INTO pet VALUES (NULL, '".$_POST['pet_name']."' , '".$_POST['pet_owner']."' , '".$_POST['pet_type']."' , '".$_POST['pet_gender']."' , '".$_POST['pet_birth']."', NULL);";
            if($mysql_db->query($query) === true){
            
            }
            else {
             echo "ERROR: Could not able to execute insert query $query . " . $mysql_db->error;
            }
       }
   }

   function emptyTable() {
    echo '<div class = "bottom_table">';
    echo '<table class = "table table-sm table-hover">
          <thead>
              <tr> 
                  <th scope = "col">id</th>
                  <th scope = "col">Pet name</th>
                  <th scope = "col">Owner</th>
                  <th scope = "col">Type</th>
                  <th scope = "col">Gender</th>
                  <th scope = "col">Birth</th>
              </tr>
              </thead>
        <tbody>';
         echo '<tr>
         <th scope ="row"> </th>';
           echo '<td> </td>';
           echo '<td> </td>';
           echo '<td> </td>';
           echo '<td> </td>';
           echo '<td> </td>';
         echo '</tr>';
     echo '</tbody>
        </table>
       </div>';
   }
//    if(isset($_GET['crud']) && isset($_GET['pet_id'])) {
//     $statement = $_GET['crud'];
//     if($statement === 'update') {
//         $update = true;
//         $id = $_GET['pet_id'];
//         try {
//             $query = "SELECT * FROM pet WHERE pet_id = ".$id;
//             $result = $mysql_db->query($query);
//             $firstrow = mysqli_fetch_assoc($result);
           
//         }
//         catch(Exception $e) {
//             echo 'Couldn\'t find data (Caught error): ',  $e->getMessage(), "\n";
//         }
//         $upPetName =  $firstrow['name'];
//         $upOwnerName = $firstrow['owner'];
//         $upPetGender = $firstrow['gender'];
//         $upPetType = $firstrow['type'];
//         $upPetBirth = $firstrow['birth']; 
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
    <title>Form</title>
</head>
<body>
<div class = "container"> 
        <form action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
           <div class = "container_top"> <p>Амьтаны бүртгэл</p> </div>
           <div class = "container_middle"> 
                   <div class = "row">
                    <div class="col-sm">
                        <label for="email">Амьтаны нэр:</label>
                        <input type="text" name = "pet_name" class="form-control" value = "<?php echo isset($_GET['pet_name']) ? $_GET['pet_name'] : ''; ?>"required>
                        <span class="block" style="color: #ff0033"><?php echo $petName_err;?></span>
                    </div>
                    <div class="col-sm">
                        <label for="text">Эзэмшигч:</label>
                        <input type="text" name = "pet_owner" class="form-control" value = "<?php echo isset($_GET['pet_owner']) ? $_GET['pet_owner'] : ''; ?>"required> 
                        <span class="block" style="color: #ff0033"><?php echo $ownerName_err;?></span>
                    </div>
                   </div> 
                   <div class = "row">
                   <div class = "col-sm">
                    <label for = "text"> Төрөл: </label>
                    <select name = "pet_type" class="form-control">
                           <option value = "dog" selected = "selected">Dog</option>
                           <option value = "cat">Cat</option>
                           <option value = "bird">Bird</option>
                           <option value = "rabbit">Rabbit</option>
                           <option value = "hamster">Hamster</option>
                       </select>
                    </div>
                   <div class = "col-sm">
                       <label for = "text">Хүйс: </label>
                       <select name = "pet_gender" class="form-control">
                           <option value = "m" selected = "selected">Male</option>
                           <option value = "f">Female</option>
                       </select>
                   </div>
               </div>
               <div class = "row">
                    <div class="col-sm">
                       <label for = "text"> Төрсөн он: </label>
                       <input type = "date" name = "pet_birth" class="form-control">
                       <span class="block" style="color: #ff0033"><?php echo $petBirth_err;?></span>
                   </div>
                   <div class="col-sm"> </div>
               </div>
           </div>
           <div class = "container_bottom"> 
            <div class = 'buttons'>
                <input name = "submit" type="submit" value = 'Бүртгэх'class="btn btn-primary">
                <input type="reset" value = 'цэвэрлэх'class="btn btn-light">
                
              </div>
           </div>
        </form>
       </div>

       <?php 
       if($_SERVER['REQUEST_METHOD'] === 'GET' || $_SERVER['REQUEST_METHOD'] === 'POST') {
                if(isset($_GET['crud']) && isset($_GET['pet_id'])) {
                 $statement = $_GET['crud'];
                if($statement === 'delete') {
                    $query = "DELETE FROM pet WHERE pet_id =" .$_GET['pet_id'];
                    try{
                      $mysql_db->query($query);
                    }
                    catch(Exception $e) {
                       echo 'Couldn\'t execute delete command (Caught error): ',  $e->getMessage(), "\n";
                    }
                 }
                }
                $query = "SELECT * FROM pet;";   
                if($result = $mysql_db->query($query)) {
                    if($result->num_rows > 0) {
                          
                           echo '<div class = "bottom_table">';
                           echo '<table class = "table table-sm table-hover">
                                 <thead>
                                     <tr> 
                                         <th scope = "col">id</th>
                                         <th scope = "col">нэр</th>
                                         <th scope = "col">эзэмшигч</th>
                                         <th scope = "col">хүйс</th>
                                         <th scope = "col">төрөл</th>
                                         <th scope = "col">төрсөн он</th>
                                         <th colspan = "2" scope = "col">удирдах</th>
                                     </tr>
                                     </thead>
                               <tbody>';
                               while($row = $result->fetch_array()) {
                                echo '<tr>
                                <th scope ="row">'.$row['pet_id'] .'</th>';
                                  echo '<td>' .$row['name'] . '</td>';
                                  echo '<td>' .$row['owner'] . '</td>';
                                  echo '<td>' .$row['type'] . '</td>';
                                  echo '<td>' .$row['gender'] . '</td>';
                                  echo '<td>' .$row['birth'] . '</td>';
                                  echo '<td> <a href = \'./index.php?crud=update&pet_id='.$row["pet_id"].'&pet_name='.$row["name"].'&pet_owner='.$row["owner"].'&pet_type='.$row["type"]. '&pet_gender='.$row["gender"] .'&pet_birth='.$row["birth"] .'\'> Edit </a></td>';
                                  echo '<td> <a href = \'./index.php?crud=delete&pet_id='.$row["pet_id"].'\'> Delete </a></td>';
                                echo '</tr>';
                               }
                            echo '</tbody>
                               </table>
                              </div>';
                            $result->free_result();
                    }
                    else {
                          emptyTable();
                    }
                } 
                else {
                    printf ("Error: %s\n", $mysql_db->error);
                }
            }
            $mysql_db->close();
       ?> 
</body>
</html>