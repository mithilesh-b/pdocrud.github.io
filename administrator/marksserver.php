<?php
include '../connection.php';
$opcode= $_GET['opcode'];
//echo"1";
if ($opcode == 1) 
{
    //echo "3";
    if (isset($_POST['submitmarks'])) {
        $sid = $_POST['studentid'];
        $s1 = $_POST['subject1'];
        $s1mark = $_POST['sname1'];
        $s2 = $_POST['subject2'];
        $s2mark = $_POST['sname2'];
        $s3 = $_POST['subject3'];
        $s3mark = $_POST['sname3'];
        $s4 = $_POST['subject4'];
        $s4mark = $_POST['sname4'];
        $s5 = $_POST['subject5'];
        $s5mark = $_POST['sname5'];        
        $s6 = $_POST['subject6'];
        $s6mark = $_POST['sname6'];
        $sg = $_POST['sgpa'];
        $cg = $_POST['cgpa'];
        $sql = "INSERT INTO temp_table(studentid, sub1, sub1marks, sub2, sub2marks, sub3, sub3marks, sub4, sub4marks, sub5, sub5marks, sub6, sub6marks, sgpa, cgpa) 
                VALUES(:sid,:s1,:s1mark,:s2,:s2mark,:s3,:s3mark,:s4,:s4mark,:s5,:s5mark,:s6,:s6mark,:sg,:cg)";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':sid', $sid);
        $stmt->bindParam(':s1', $s1);
        $stmt->bindParam(':s1mark', $s1mark);
        $stmt->bindParam(':s2', $s2);
        $stmt->bindParam(':s2mark', $s2mark);
        $stmt->bindParam(':s3', $s3);
        $stmt->bindParam(':s3mark', $s3mark);
        $stmt->bindParam(':s4', $s4);
        $stmt->bindParam(':s4mark', $s4mark);
        $stmt->bindParam(':s5', $s5);
        $stmt->bindParam(':s5mark', $s5mark);
        $stmt->bindParam(':s6', $s6);
        $stmt->bindParam(':s6mark', $s6mark);
        $stmt->bindParam(':sg', $sg);
        $stmt->bindParam(':cg', $cg);
        if ($stmt->execute()) {
            header("Location: marks2.php");
            exit;
        } else {
            echo "Error";
            echo $sql;
            //header("Location: stsignup.php");
        }
    }
}
