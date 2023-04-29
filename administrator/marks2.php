<?php
include "../connection.php";
?>
<!DOCTYPE html>
<html>
<head>
  <style>
    select,
    label {
      display: block;
      margin-bottom: 10px;
      font-size: 16px;
    }

    input[type="text"] {
      display: block;
      margin-bottom: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    .submit {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    #select {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #f2f2f2;
    }

    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 16px;
      background-color: #fff;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      background-repeat: no-repeat;
      background-position: right 10px center;
    }

    select:focus {
      outline: none;
      border: 1px solid #4CAF50;
    }

    select option:first-child {
      color: #ccc;
    }

    .marks {
      text-align: center;
      font-family: "Arial Black", Arial, sans-serif;
      font-size: 22px;
    }
  </style>
</head>

<body>
  <form action="marksserver.php?opcode=1" method="post">
    <div class="select" id="select">
      <h5 class="marks">student marks entry form</h5>
      <label for="textbox">Enter Student ID first</label>
      <input type="text" id="textbox" name="studentid">
      <select id="select1" name="subject1" onchange="return checkDuplicateSelection()">
        <option value="0">--please select--</option>
        <option value="ES 201">ES 201</option>
        <option value="ES 202">ES 202</option>
        <option value="ES 203">ES 203</option>
        <option value="ES 204">ES 204</option>
        <option value="ES 205">ES 205</option>
        <option value="ES 206">ES 206</option>
      </select>
      <label for="textbox">Enter marks for this subject:</label>
      <input type="text" id="textbox" name="sname1">
      <select id="select2" name="subject2" onchange="return checkDuplicateSelection()">
        <option value="1">--please select--</option>
        <option value="ES 201">ES 201</option>
        <option value="ES 202">ES 202</option>
        <option value="ES 203">ES 203</option>
        <option value="ES 204">ES 204</option>
        <option value="ES 205">ES 205</option>
        <option value="ES 206">ES 206</option>
      </select>
      <label for="textbox">Enter marks for this subject:</label>
      <input type="text" id="textbox" name="sname2">
      
      <select id="select3" name="subject3" onchange="return checkDuplicateSelection()">
        <option value="2">--please select--</option>
        <option value="ES 201">ES 201</option>
        <option value="ES 202">ES 202</option>
        <option value="ES 203">ES 203</option>
        <option value="ES 204">ES 204</option>
        <option value="ES 205">ES 205</option>
        <option value="ES 206">ES 206</option>
      </select>
      <label for="textbox">Enter marks for this subject:</label>
      <input type="text" id="textbox" name="sname3">
      <select id="select4" name="subject4" onchange="return checkDuplicateSelection()">
        <option value="3">--please select--</option>
        <option value="ES 201">ES 201</option>
        <option value="ES 202">ES 202</option>
        <option value="ES 203">ES 203</option>
        <option value="ES 204">ES 204</option>
        <option value="ES 205">ES 205</option>
        <option value="ES 206">ES 206</option>
      </select>
      <label for="textbox">Enter marks for this subject:</label>
      <input type="text" id="textbox" name="sname4">
      <select id="select5" name="subject5" onchange="return checkDuplicateSelection()">
        <option value="4">--please select--</option>
        <option value="ES 201">ES 201</option>
        <option value="ES 202">ES 202</option>
        <option value="ES 203">ES 203</option>
        <option value="ES 204">ES 204</option>
        <option value="ES 205">ES 205</option>
        <option value="ES 206">ES 206</option>
      </select>
      <label for="textbox">Enter marks for this subject:</label>
      <input type="text" id="textbox" name="sname5">
      <select id="select6" name="subject6" onchange="return checkDuplicateSelection()">
        <option value="5">--please select--</option>
        <option value="ES 201">ES 201</option>
        <option value="ES 202">ES 202</option>
        <option value="ES 203">ES 203</option>
        <option value="ES 204">ES 204</option>
        <option value="ES 205">ES 205</option>
        <option value="ES 206">ES 206</option>
      </select>
      <label for="textbox">Enter marks for this subject:</label>
      <input type="text" id="textbox" name="sname6">
      <br>
      <label for="textbox">Enter the SGPA</label>
      <input type="text" id="textbox" name="sgpa">
      <label for="textbox">Enter the CGPA</label>
      <input type="text" id="textbox" name="cgpa">
      <input type="submit" name="submitmarks" value="submit" id="submitmarks" class="submit"></input>
    </div>
  </form>
</body>
<script>
  function checkDuplicateSelection() {
    var selects = document.getElementsByTagName("select");
    var selectedOptions = [];
    for (var i = 0; i < selects.length; i++) {
      var select = selects[i];
      var selectedOption = select.options[select.selectedIndex].value;
      if (selectedOptions.indexOf(selectedOption) > -1) {
        alert("Error: You cannot select the same subject twice.");
        select.selectedIndex = 0;
        return false;
      }
      selectedOptions.push(selectedOption);
    }
    return true;
  }
</script>

</html>