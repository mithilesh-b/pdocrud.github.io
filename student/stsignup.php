<?php
include "../connection.php";
require "../mobile.php";
?>
<html>
<head>
<style>
#loader {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: #fff;
  z-index: 9999;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.spinner {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  border: 6px solid #4CAF50;
  border-top-color: transparent;
  animation: spin 1s ease-in-out infinite;
}

.message {
  font-size: 18px;
  margin-top: 20px;
}

@keyframes spin {
  to {
    transform: rotate(360deg);
  }
}


.file {
  opacity: 0;
  position: absolute;
  z-index: -1;
  width: 50%;
}

label[for="photo"] {
  display: inline-block;
  position: relative;
  cursor: pointer;
  font-size: 16px;
  color: #fff;
  background-color: #4CAF50;
  padding: 12px 24px;
  border-radius: 4px;
}

label[for="photo"]:hover {
  background-color: #3e8e41;
}

label[for="photo"]:active {
  background-color: #1e7d34;
}

label[for="photo"]:before {
  content: "Select photo";
  position: relative;
  top: -1px;
}

label[for="photo"]:hover:before {
  text-decoration: underline;
}

label[for="photo"]:focus:before {
  outline: none;
}
.name {
  font-size: 16px;
  padding: 15px;
  border-radius: 10px;
  border: 2px solid #ccc;
  transition: border-color 1s ease-in-out;
  width: 100%;
}

.name:focus {
  border-color: #4CAF50;
  outline: none;
}
.branch {
  font-size: 16px;
  padding: 10px;
  border-radius: 40px;
  border: 2px solid #ccc;
  transition: border-color 0.2s ease-in-out;
  width: 400px;
  height: 40px;
  background-color: #fff;
}

.branch:focus {
  border-color: #4CAF50;
  outline: none;
}

label[for="branch"] {
  display: inline-block;
  margin-bottom: 5px;
  font-size: 16px;
  color: #333;
}

select[name="branch"] {
  margin-bottom: 20px;
}

option[value=""] {
  color: #aaa;
}
.submit {
  display: inline-block;
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 25px;
  font-size: 16px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 2px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease;
}

.submit::before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 0%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.2);
  transition: all 0.3s ease;
  z-index: -1;
}
.submit:hover {
  color: #4CAF50;
  background-color: #fff;
}
.submit:hover::before {
  width: 100%;
}
</style>
</head>
<body>
<div id="loader">
  <div class="spinner"></div>
  <h3 class="message">Hang on, the page is loading...</h3>
</div>
<form action="studentserver.php?mn=1" method="POSt" class="form">

<label for="name">your name</label>
<br>
<input type="text" name="studentname" id="studentname" class="name">
<br><br>
<label for="studentid">your studentid</label>
<br>
<input type="text" name="studentid" id="studentid" class="name">
<br><br>
<label for="university">your University roll number</label>
<br>
<input type="text" name="university" id="university" class="name">
<br><br>
<label for="registration number">your registration number</label>
<br>
<input type="text" name="rn" id="rn" class="name" placeholder="eg. 020777 of 2021-2022">
<br><br>
<label for="email">enter your email</label>
<br>
<input type="email" name="email" id="email" class="name">
<br><br>
<label for="branch">Choose your branch</label>
<br>
<select name="branch" id="branch" class="branch">
  <option value="">--Please select--</option>
  <option value="cse">CSE</option>
  <option value="ecse">ECSE</option>
  <option value="me">ME</option>
  <option value="ce">CE</option>
  <option value="ee">EE</option>
  <option value="aids">AIDS</option>
  <option value="amia">AIMA</option>
  <option value="ceca">CECA</option>
</select>
<br><br>
<label for="branch">Choose your semester</label>
<br>
<select name="semester" id="semester" class="branch">
  <option value="">--Please select--</option>
  <option value="first">first</option>
  <option value="second">Second</option>
  <option value="third">Third</option>
  <option value="fourth">Fourth</option>
  <option value="fifth">Fifth</option>
  <option value="sixth">Sixth</option>
  <option value="seventh">Seventh</option>
  <option value="eighth">Eighth</option>
</select>
<br><br>
<label for="mobile number">enter your contact number</label>
<br>
<input type="number" name="number" id="number" class="name">
<br><br>
<center>
 <input type="submit" id="btnsignup" name="btnsignup" value="Submit" class="submit">
 </center>
</form>
</body>
<script>
const LOAD_TIME = 2000;
window.addEventListener('load', function() {
  document.getElementById('loader').style.display = 'flex';
});
setTimeout(function() {
  document.getElementById('loader').style.display = 'none';
}, LOAD_TIME);
</script>
</html>