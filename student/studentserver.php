<?php
include '../connection.php';
$mn = $_GET['mn'];
if ($mn == 1) {
	if (isset($_POST['btnsignup'])) {
		$sname = $_POST['studentname'];
		$sid = $_POST['studentid'];
		$sun = $_POST['university'];
		$sregistration = $_POST['rn'];
		$semail = $_POST['email'];
		$sbranch = $_POST['branch'];
		$sem = $_POST['semester'];
		$snum = $_POST['number'];

		$stmt = $connection->prepare("INSERT INTO student(name, sid, urn, registration, email, branch, semester, contact) VALUES(:sname, :sid, :sun, :sregistration, :semail, :sbranch, :sem, :snum)");
		$stmt->bindParam(':sname', $sname);
		$stmt->bindParam(':sid', $sid);
		$stmt->bindParam(':sun', $sun);
		$stmt->bindParam(':sregistration', $sregistration);
		$stmt->bindParam(':semail', $semail);
		$stmt->bindParam(':sbranch', $sbranch);
		$stmt->bindParam(':sem', $sem);
		$stmt->bindParam(':snum', $snum);

		if ($stmt->execute()) {
			header("Location:stlogin.php");
		} else {
			echo "error";
		}

		exit;
	}
} elseif ($mn == 2) {
	if (isset($_POST['btnlogin'])) {
		$studentemail = $_POST['stemail'];
		$studentid = $_POST['sid'];

		$stmt = $connection->prepare("SELECT * FROM student WHERE email = :studentemail AND sid = :studentid");
		$stmt->bindParam(':studentemail', $studentemail);
		$stmt->bindParam(':studentid', $studentid);
		$stmt->execute();

		$studentname = '';
		$studentid = 0;
		if ($stmt->rowCount() == 1) {
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$studentname = $row['name'];
				$studentid = $row['sid'];
				$studentemail = $row['email'];
			}
			$stmt->closeCursor();
			$connection = null;
			session_start();
			$_SESSION["login_user"] = $studentname;
			$_SESSION["login_usrid"] = $studentid;
			$_SESSION["login_email"] = $studentemail;
			header("location:main.php");
			exit;
		} else {
			header("location:stlogin.php");
		}
	}
}
