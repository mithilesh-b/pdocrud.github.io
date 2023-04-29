<?php
$host = 'localhost';
$dbname = 'college';
$username = 'root';
$password = '';
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<?php
require "../connection.php";
session_start();
if (!isset($_SESSION['login_user'])) {
  header("location:stlogin.php");
  die();
}
$logged_user = $_SESSION['login_user'];
$usrid = $_SESSION["login_usrid"];
$sql = "SELECT * FROM student WHERE sid = :usrid";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':usrid', $usrid);
$stmt->execute();
if ($stmt->rowCount() == 1) {
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
    <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <style>
        .center {
  display: block;
  margin: 0 auto;
  align-items: center;
  justify-content: center;
}

        @media only screen and (max-width: 600px) {
          .nebula td,
          .nebula th {
            padding: 5px;
            font-size: 12px;
            width: 40%;
          }
        }
        #page-content {
          display: none;
        }
        .default {
          position: relative;
          font-size: 20px;
          font-family: sans-serif;
          color: #333;
        }
        .default::after {
          content: '';
          position: absolute;
          top: 0;
          right: 0;
          height: 100%;
          width: 0;
          background-color: transparent;
          animation: typing 2s steps(40, end) forwards;
        }
        @keyframes typing {
          from {
            width: 0;
          }
          to {
            width: 100%;
            background-color: #fff;
          }
        }
        h2 {
          margin: 0;
          padding: 10px;
          display: inline-block;
          background-color: #fff;
        }
        .nebula {
          margin: auto;
          border: 2px solid black;
          border-collapse: collapse;
        }
        .nebula td,
        .nebula th {
          padding: 10px;
          text-align: center;
          border: 3px solid black;
        }
        .progress-bar {
          background-color: #f2f2f2;
          height: 20px;
          border-radius: 10px;
        }
        .progress-bar {
          background-color: #f2f2f2;
          height: 25px;
          border-radius: 50px;
          overflow: hidden;
          max-width: 700px;
        }
        .green {
          background-color: green;
        }

        .orange {
          background-color: orange;
        }

        .red {
          background-color: red;
        }

        .gray {
          background-color: gray;
        }

        .ola td {
          padding: 10px;
          text-align: center;
        }

        .ola tr:nth-child(even) {
          background-color: #f2f2f2;
        }

        .ola tr:hover {
          background-color: #FFA07A;
        }

        .ola td:first-child {
          font-weight: bold;
        }
        @keyframes slidein {
          from {
            margin-left: -300px;
            opacity: 0;
          }
          to {
            margin-left: 0px;
            opacity: 1;
          }
        }
        .ola {
          animation: slidein 1s ease-in-out;
        }
        .ghm {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 5vh;
        }
        .animated-heading {
          animation-name: slideIn;
          animation-duration: 5s;
          animation-fill-mode: both;
        }
        @keyframes slideIn {
          0% {
            transform: translateX(-100%);
            opacity: 0;
          }
          100% {
            transform: translateX(0);
            opacity: 1;
          }
        }
        .lop {
          display: flex;
          justify-content: center;
          align-items: center;
          height: auto;
        }
        @keyframes slideInFromLeft {
          0% {
            transform: translateX(-100%);
          }
          100% {
            transform: translateX(0);
          }
        }
        .lop h2 {
          animation: slideInFromLeft 0.5s ease-in-out;
        }
        
.button-style {
  background-color: black;
  display: flex;
  justify-content: center;
  border: none;
  color: white;
  align-items: center;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  border-radius: 5px;
  cursor: pointer;
}

.button-style:hover {
  background-color: skyblue;
}
      </style>
    </head>
    <body>
      <p class="default">
        <center>
          <br><br>
          <h4>
            <b>
              Welcome <?php echo $logged_user; ?> !
            </b>
          </h4>
        </center>
      </p>
      <table class="ola" style="width: 70%; margin: 0 auto;">
        <tr>
          <td>Name</td>
          <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
          <td>Student ID</td>
          <td><?php echo $row['sid']; ?></td>
        </tr>
        <tr>
          <td>Email ID</td>
          <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
          <td>Branch</td>
          <td><?php echo $row['branch']; ?></td>
        </tr>
      </table>
      <br><br>
    <?php
  }
  $stmt->closeCursor();
} else {
  echo 'No details found';
}
$sql_marks = 'SELECT * FROM temp_table WHERE studentid = :usrid';
$stmt_marks = $pdo->prepare($sql_marks);
$stmt_marks->bindParam(':usrid', $usrid);
$stmt_marks->execute();
if ($stmt_marks->rowCount() > 0) {
  while ($row_marks = $stmt_marks->fetch(PDO::FETCH_ASSOC)) {
    ?>
      <h2 class="lop">
        Results for Current semester
      </h2>
      <table class="ola" style="width: 70%; margin: 0 auto;">
        <thead>
          <th>Subject Code</th>
          <th>Marks Obtained</th>
        </thead>
        <tr>
          <td><?php echo $row_marks['sub1'] . '<br>'; ?></td>
          <b>
            <td><?php echo $row_marks['sub1marks'] . '<br>'; ?></td><b>
        </tr>
        <tr>
          <td><?php echo $row_marks['sub2'] . '<br>'; ?></td>
          <td><?php echo $row_marks['sub2marks'] . '<br>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $row_marks['sub3'] . '<br>'; ?></td>
          <td><?php echo $row_marks['sub3marks'] . '<br>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $row_marks['sub4'] . '<br>'; ?></td>
          <td><?php echo $row_marks['sub4marks'] . '<br>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $row_marks['sub5'] . '<br>'; ?></td>
          <td><?php echo $row_marks['sub5marks'] . '<br>'; ?></td>
        </tr>
        <tr>
          <td><?php echo $row_marks['sub6'] . '<br>'; ?></td>
          <td><?php echo $row_marks['sub6marks'] . '<br>'; ?></td>
        </tr>
      </table>
      <br>
      <br><br>
      <center>
        <h4>Obtained SGPA is:</h4>
        <div class="progress-bar">
          <div class="progress-bar-fill" style="width: <?php echo $row_marks['sgpa'] * 10; ?>%;"></div>
          <div class="progress-bar-text"><?php echo $row_marks['sgpa']; ?></div>
        </div>
        <br><br>
        <h4>Obtained CGPA is:</h4>
        <div class="progress-bar">
          <div class="progress-bar-fill" style="width: <?php echo $row_marks['sgpa'] * 10; ?>%;"></div>
          <div class="progress-bar-text"><?php echo $row_marks['cgpa']; ?></div>
        </div>
      </center>
      <style>
        .progress-bar {
          height: 20px;
          border-radius: 10px;
          background-color: #ddd;
          position: relative;
        }
        .progress-bar-fill {
          height: 100%;
          border-radius: 10px;
          background-color: #4CAF50;
          position: absolute;
          top: 0;
          left: 0;
          transition: width 0.5s ease-in-out;
        }
        .progress-bar-text {
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          font-size: 12px;
          font-weight: bold;
          color: black;
          text-shadow: 0px 0px #000;
        }
      </style>
  <?php
  }
} else {
  echo 'No marks found.<br>';
}
  ?>
  <br>
  <center><a href="logout.php">
  <button class="center button-style">Logot</button>
  </a></center>

  </center>
  </div>
    </body>
    </html>