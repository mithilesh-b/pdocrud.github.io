<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

try {
  $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}

$admin = $_GET['admin'];
if ($admin == 1) {
  if (isset($_POST['adminsign'])) {
    $aname = $_POST['fname'];
    $aid = $_POST['id'];
    $pas = $_POST['psw'];
    $sql = "INSERT INTO administrator(name, id, password) VALUES(:aname,:aid,:pas)";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':aname', $aname);
    $stmt->bindParam(':aid', $aid);
    $stmt->bindParam(':pas', $pas);
    if ($stmt->execute()) {
      header("Location:adminlogin.php");
    } else {
      echo "error";
    }
    exit;
  }
} elseif ($admin == 2) {
  if (isset($_POST['adminlogin'])) {
    $adminid = $_POST['aid'];
    $adminpass = $_POST['pasw'];
    $sql = "SELECT * FROM administrator WHERE id=:adminid AND password=:adminpass";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(':adminid', $adminid);
    $stmt->bindParam(':adminpass', $adminpass);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      session_start();
      $_SESSION["login_usrid"] = $adminid;
      header("location:insertor.php");
      exit;
    } else {
      echo "error";
      header("location:adminlogin.php");
    }
  }
}
