<?php 
include 'connect.php';
include 'index.php';  

  // // valid email
  // $select = $conn->query("SELECT `email` FROM `client` ");
  // $row = $select->fetch();
  // print_r($row);

if (isset($_POST['sign_up'])) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST['confirmPassword'];


    if ( $_POST["password"] != $_POST['confirmPassword'] ) {
      echo 'please chose your password';
      
    } else {
      
      $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
      $phonNumber = $_POST["phonNumber"];
      
      // get data email for cheack
      $sql = "INSERT INTO client (first_name, last_name, email, password, phone_number)
      VALUES ('$firstName', '$lastName', '$email', '$password_hash', $phonNumber)";
  
            if ($conn->query($sql) === TRUE) {
        
              echo "New record created successfully";
              echo "<script> swal('Succses', 'your acount not create', 'warning'); </script>";
              header("location: clents.php");
            } else {
              // echo "Error: " . $sql . "<br>" . $conn->error;
              echo "<script> swal('welcom', 'your acount is a create', 'success'); </script>";
        
            }
    }
}

?>