<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["config"],1);
$active_group = 'default';
$query_builder = TRUE;
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
<html>
<head>
<style>
body {font-family: Arial, Helvetica, sans-serif; background-color:aliceblue}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  color: dimgray;
  width: 70%;
  padding: 12px;
  border: 1px solid indianred;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color:Indianred;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: beige;
}

.container {
  border-radius: 5px;
  background-color: blanchedalmond;
  padding: 20px;
}
</style>
</head>
<body>

<h3><center>Emplyoee Info</center></h3>

<div class="container">
  <form action="first.php" method="POST">
    <label>First Name</label>
    <input type="text" id="fname"  name="firstname" placeholder="Your first name..">

    <br><label>Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    
    <br><label>Gender</label><br>
  <br><input type="radio" name="gender" value="m">
  <label>Male</label>
  <input type="radio" name="gender" value="f">
  <label>Female</label>
  <input type="radio" name="gender" value="o">
  <label>Others</label><br>
   
<div class="row">
      <div>
        <br><label>Nationality</label>
      </div>
      <div>
        <select id="country" name="country">
          <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option>
          <option value="usa">India</option>
          <option value="usa">UK</option>
        </select>
      </div>
    </div>
 <label >Email:</label>
  <input type="email" id="email" placeholder="Enter email" name="email"><br>
<br><label>Phone no:</label>
  <input type="text" id="contact" placeholder="Enter contact number" name="number"><br>

    <br><input type="submit" name="update" value="UPDATE DATA">
  </form>
</div>

</body>
</html>
