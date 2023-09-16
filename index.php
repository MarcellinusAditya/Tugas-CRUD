<?php
  include_once('connection.php');

 
  error_reporting(0);
   
  session_start();
   
  if (isset($_SESSION['username'])) {
      header("Location: home.php");
  }
   
  if (isset($_POST['submit'])) {
      $username = $_POST['username'];
      $password = md5($_POST['password']);
   
      $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
      $result = mysqli_query($mysqli, $sql);
      if ($result->num_rows > 0) {
          $row = mysqli_fetch_assoc($result);
          $_SESSION['username'] = $row['nama'];
          header("Location: home.php");
      } else {
          echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!')</script>";
      }
  }

   
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MSIB Latihan 2</title>
    <style>
      body {
        font-family: "Times New Roman", Times, serif;
        text-shadow: 2px 1px rgba(0, 0, 0, 0.699);
        color: white;
        background-color: rgba(0, 0, 0, 0.699);
        font-size: larger;
        font-weight: bold;
      }
      h1 {
        text-align: center;
      }
      .container {
        max-width: 600px;
        
        margin: 100px auto;
        padding: 25px 20px;
        background-color: gray;
        border-radius: 3px;
        box-shadow: 5px 5px rgba(255, 255, 255, 0.699);
      }
      label,
      input,
      select {
        width: 100%;
        padding: 5px;
        font-weight: bold;
      }
      .submit {
        padding: 10px 20px;
        font-weight: bold;
        background-color: green;
        border-radius: 3px;
        color: white;
      }
      table {
        margin-top: 20px;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        color: black;
        text-shadow: none;
      }

      th {
        background-color: cadetblue;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>Login</h1>

      <form method="post" action="" name="" >
        <label for="username">Username </label><br />
        <br />
        <input type="text" id="username" name="username" required /><br />
        <br />

        <label for="password">Password</label><br /><br />
        <input type="password" id="password" name="password" required /><br /><br />

        
        <br />
        <br />

        <input class="submit" type="submit" name="submit" value="Log In">
      </form>

      
    </div>
  </body>
  
</html>
