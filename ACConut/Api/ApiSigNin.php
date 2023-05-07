<?php

// Include the ConnertSQL.php file that establishes the database connection
include '../../models/ConnertSQL.php';

// Check if the email and password parameters are set via the POST method using the isset() function
if(isset($_POST['email'], $_POST['password'])) {
  $email = mysqli_real_escape_string($conn, trim($_POST['email']));
  $password = mysqli_real_escape_string($conn, trim($_POST['password']));

  // Use a secure hashing algorithm like bcrypt to hash the password
  $password = md5($password);

  // Define an array of table names that the script will use to check if the user exists in any of them
  $tables = array('adminstration', 'giangvien', 'sinhvien');

  foreach ($tables as $table) {
    $sql = "SELECT name, email, password, phone, address, '$table' AS type, id FROM $table WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
      // Handle query error
      echo json_encode(array("success" => false, "message" => "Query error: " . mysqli_error($conn)));
      exit();
    }
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $username = $row['name'];
      $useremail = $row['email'];
      $userpassword = $row['password'];
      $userphone = $row['phone'];
      $address = $row['address'];
      $type = $row['type'];
      $id = $row['id'];

      setcookie("user_email", $useremail, time()+3600, "/", "", true, true);
      setcookie("user_type", $type, time()+3600, "/", "", true, true);
      setcookie("user_id", $id, time()+3600, "/", "", true, true);
      setcookie("user_name",$username, time()+3600, "/", "", true, true);
      echo json_encode(array("success" => true));

      // setcookie("user_email", $useremail, time()+3600, "/", true, true);
      // setcookie("user_type", $type, time()+3600, "/", true, true);
      // setcookie("user_id", $id, time()+3600, "/", true, true);
      // setcookie("user_name",$username, time()+3600, "/", true, true);
      // echo json_encode(array("success" => true));
      
      exit();
    }
  }
  echo json_encode(array("success" => false, "message" => "Incorrect email or password"));
  exit();
}

mysqli_close($conn);  

?>
