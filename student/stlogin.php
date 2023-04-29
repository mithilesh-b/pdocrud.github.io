<?php
include "../connection.php";
require "../mobile.php";
?>

<html>
    <head>
<title>LOG IN PAGE</title>
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
    .login {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  animation-name: fadeIn;
  animation-duration: 1s;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

label {
  font-size: 18px;
  display: block;
  margin-bottom: 10px;
}

input[type="email"],
input[type="number"] {
  font-size: 16px;
  padding: 10px;
  border-radius: 5px;
  border: 2px solid #ccc;
  width: 100%;
  margin-bottom: 20px;
  transition: border-color 0.3s ease-in-out;
}

input[type="email"]:focus,
input[type="number"]:focus {
  border-color: #4CAF50;
  outline: none;
}

.submit {
  background-color: #4CAF50;
  color: #fff;
  font-size: 18px;
  padding: 10px 20px;
  border-radius: 5px;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease-in-out;
}

.submit:hover {
  background-color: #3e8e41;
}

#loader {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  z-index: 9999;
  background-color: #fff;
  display: flex;
  justify-content: center;
  align-items: center;
}

#loader h3 {
  font-size: 24px;
  animation-name: bounceIn;
  animation-duration: 1s;
  animation-delay: 1s;
}

@keyframes bounceIn {
  from {
    opacity: 0;
    transform: scale(0);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}

</style>
    </head>


    <body>
    <div id="loader">
  <div class="spinner"></div>
  <h3 class="message">Hang on, the page is loading...</h3>
</div>


<form action="studentserver.php?mn=2" method="POST" class="form">

<div
class="login">

<label for="Email">Enter your Email</label>
<br>
<input type="email" name="stemail" id="stemail">
<br><br>
<label for="name">Enter your Student-ID</label>
<br>
<input type="number" name="sid" id="sid">
<br><br>
<center>
 <input type="submit" id="btnlogin" name="btnlogin" value="Log In" class="submit">
 </center>
</div>
</form>
</body>
<script>
const LOAD_TIME = 500;

window.addEventListener('load', function() {
  document.getElementById('loader').style.display = 'flex';
});
setTimeout(function() {
  document.getElementById('loader').style.display = 'none';
}, LOAD_TIME);
</script>
    </html>
