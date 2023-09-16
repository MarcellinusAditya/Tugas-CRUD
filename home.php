<?php
  include_once('connection.php');

  session_start();

 
  if (!isset($_SESSION['username'])) {
        header("Location: index.php");
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
      <a href="logout.php"><button>Log Out</button></a>
      <h1>Selamat datang, <?php echo $_SESSION['username'] ?></h1>
      <h1>Menghitung Nilai Rata-Rata</h1>

      <form method="post" action="insert.php" name="formData" >
        <label for="nama">Nama </label><br />
        <br />
        <input type="text" id="nama" name="nama" required /><br />
        <br />

        <label for="matkul">Mata Kuliah</label><br /><br />
        <input type="text" id="matkul" name="matkul" required /><br /><br />

        <label for="grade">Grade</label><br /><br />
        <select name="grade" id="grade" required>
          <option value="">Grade</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
        <br />
        <br />

        <input class="submit" type="submit" name="proses" value="insert">
      </form>

      <table border="1" border-color="black" width="100%" id="data">
        <tr>
          <th>Nama</th>
          <th>Mata Kuliah</th>
          <th>Grade</th>
          <th>Nilai Rata-Rata</th>
          <th>Aksi</th>
        </tr>

        <?php
          $query="SELECT * from mahasiswa";
          $result=$mysqli->query($query);
          if($result->num_rows > 0){
              while($data=$result->fetch_assoc())
          {


        ?>
        <tr>
          <td><?php echo $data['nama'];?></td>
          <td><?php echo $data['matkul'];?></td>
          <td><?php echo $data['grade'];?></td>
          <td><?php echo $data['rata_rata'];?></td>
          <td><a href="update.php?id=<?=$data['id']?>">Edit</a>    <a href="delete.php?id=<?=$data['id']?>&proses=delete">Delete</a></td>
        </tr>
        
        <?php }}?>
      </table>
    </div>
  </body>
  
</html>
