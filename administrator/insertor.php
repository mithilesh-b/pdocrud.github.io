<?php
require "../connection.php";
require "../globalindex.php";
?>
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
<html>
    <head>
<style>

    .animator {
  display: inline-block;
  overflow: hidden;
  animation: typing 2s steps(20, end), deleting 1s steps(10, end) 2.5s forwards;
}

@keyframes typing {
  from {
    width: 0;
  }
  to {
    width: 100%;
  }
}

@keyframes deleting {
  from {
    width: 100%;
  }
  to {
    width: 0;
  }
}
table.mf {
  border-collapse: collapse;
  width: 100%;
}

table.mf th,
table.mf td {
  text-align: center;
  padding: 8px;
  border: 1px solid #ddd;
}

table.mf th {
  background-color: #f2f2f2;
  color: #333;
}

table.mf tr:nth-child(even) {
  background-color: #f2f2f2;
}

table.mf tr:hover {
  background-color: #ddd;
}

table.mf th:first-child,
table.mf td:first-child {
  text-align: left;
}

.uisearch {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 50px;
}

.uisearch input[type="text"],
.uisearch input[type="submit"] {
  font-size: 18px;
  padding: 8px 16px;
}

.uisearch input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

.uisearch input[type="submit"]:hover {
  background-color: #3e8e41;
}


</style>

    </head>
    <body>
  
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="../index.php">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="marks2.php">Marks Entry</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">LOG OUT</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Administrator Page</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<form action="" method="GET" class="uisearch">
  <input type="text" name="txtsearch" id="txtsearch"/>
  <input type="submit" name="btnsearch" id="btnsearch" value="search"/>
</form>
<br><br>

<?php 
if(isset($_REQUEST["txtsearch"])){
  $txt_find = $_REQUEST["txtsearch"];
  $sql = "SELECT * FROM student WHERE name LIKE :txt_find OR sid LIKE :txt_find OR urn LIKE :txt_find";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':txt_find', '%'.$txt_find.'%');
  $stmt->execute();
  
  if ($stmt->rowCount() > 0) {
    echo '<table class="mf">';
    echo '<thead><tr><th>Name</th><th>Email</th><th>Branch</th><th>Semester</th><th>Student ID</th><th>university roll number</th></tr></thead>';
    echo '<tbody>';
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
      echo '<tr>';
      echo '<td>' . preg_replace('/(' . preg_quote($txt_find, '/') . ')/i', '<mark>$1</mark>', $row['name']) . '</td>';
      echo '<td>' . preg_replace('/(' . preg_quote($txt_find, '/') . ')/i', '<mark>$1</mark>', $row['email']) . '</td>';
      echo '<td>' . preg_replace('/(' . preg_quote($txt_find, '/') . ')/i', '<mark>$1</mark>', $row['branch']) . '</td>';
      echo '<td>' . preg_replace('/(' . preg_quote($txt_find, '/') . ')/i', '<mark>$1</mark>', $row['semester']) . '</td>';
      echo '<td>' . preg_replace('/(' . preg_quote($txt_find, '/') . ')/i', '<mark>$1</mark>', $row['sid']) . '</td>';
      echo '<td>' . preg_replace('/(' . preg_quote($txt_find, '/') . ')/i', '<mark>$1</mark>', $row['urn']) . '</td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  } else {
    echo "No data found";
  }
}
?>

<br>
<br>
<br>

<?php
 $sql = "SELECT * FROM student ORDER BY semester, sid";
 $stmt = $connection->prepare($sql);
 $stmt->execute();

$result=$connection->query($sql);
if ($stmt->rowCount() > 0) {
  echo "<table class='mf'>
          <thead>
              <th>Sl no.</th>
              <th>Name</th>
              <th>Student id</th>
              <th>University Roll number</th>
              <th>Branch</th>
              <th>Semester</th>
              <th>Email</th>
          </thead>
          <tbody>";
  $sl = 0;
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $sl++;
      echo "<tr>
              <td>$sl</td>
              <td>{$row['name']}</td>
              <td>{$row['sid']}</td>
              <td>{$row['urn']}</td>
              <td>{$row['branch']}</td>
              <td>{$row['semester']}</td>
              <td>{$row['email']}</td>
          </tr>";
  }
  echo "</tbody></table>";
 } else {
    echo 'No records found';
}
?>
    </body>

</html>
