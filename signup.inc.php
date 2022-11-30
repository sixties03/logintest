<?php
if (isset($_POST['signup-subm'])){

require 'dbh.inc.php';

$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

if (empty($username)|| empty($email)|| empty($password)|| empty($passwordRepeat)){
  header("location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
  exit();
}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !PREG_MATCH("/^[a-zA-Z0-9]*$/", $username)) {
header("location: ../signup.php?error=invalidmail&uid=");
exit();  // code...
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
 (header("location: ../signup.php?error=invalidmail&uid=".$username.);
exit();  // code...
}
else if (!PREG_MATCH("/^[a-zA-Z0-9]*$/",$username)){
 (header("location: ../signup.php?error=invalid&mail=".$mail.);
exit();
}
elseif ($password !== $passwordRepeat) {
header("location: ../signup.php?error=passwordcheckuid=".$username."&mail=".$email)
  // code...
  }
  else {
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn)
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("location: ../signup.php?error=sqlerror");
      exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "s", $username);
    msqli_stmt_execute($stmt);
    msqli_stmt_store_result($stmt);
    $resultCheck = msqli_stmt_num_rows($stmt);
    if ($resultCheck >0) {
      header("location: ../signup.php?error=usertaken&mail".$email);
      exit();
      // code...
    }
    else {

      $sql = "INSERT INTO users(uidUsers, E-mailUsers, pdwdUsers) values (?, ?, ?)";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=sqlerror")
        // code...
      }
      else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT)

        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
        msqli_stmt_execute($stmt);
          msqli_stmt_store_result($stmt);
          header("location: ../signup.php?signup=success");
          exit();
        // code...
      }
    }
  }
    // code...
  }
 msqli_stmt_close($stmt);
 msqli_close($conn);

   else {
     header("location: ../signup.php");
     exit();
   }
}
