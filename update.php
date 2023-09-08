<?php
  include_once('connection.php');

  if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $query="SELECT * FROM mahasiswa WHERE id='$id'";
        $result=$mysqli->query($query);
        if($data=$result->fetch_assoc())
        {
            $nama=$data['nama'];
            $matkul=$data['matkul'];
            $grade=$data['grade'];
            
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
      <h1>Update Menghitung Nilai Rata-Rata</h1>

      <form method="post" action="update.php" name="formData" >
        <label for="nama">Nama </label><br />
        <br />
        <input type="text" id="nama" name="nama" value="<?php echo $nama;?>" required /><br />
        <br />

        <label for="matkul">Mata Kuliah</label><br /><br />
        <input type="text" id="matkul" name="matkul" value="<?php echo $matkul;?>" required /><br /><br />

        <input type="hidden" id="id" name="id" value="<?php echo $id;?>" required />

        <label for="grade">Grade</label><br /><br />
        <select name="grade" id="grade"  required>
          <option value="<?php echo $grade;?>" selected hidden><?php echo $grade;?></option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
          <option value="E">E</option>
        </select>
        <br />
        <br />

        <input class="submit" type="submit" name="proses" value="update">
      </form>

      
    </div>
  </body>
  
</html>


<?php 
    if(isset($_POST['proses']) and $_POST['proses']=='update')
    {
        $nama=$_POST['nama'];
        $matkul=$_POST['matkul'];
        $grade=$_POST['grade'];
        $list_grade= [
            'A' => 4.00,
            'B' => 3.00,
            'C' => 2.00,
            'D' => 1.00,
            'E' => 0.00
        ];
        $rata_rata=$list_grade[$grade];
        $id=$_POST['id'];

        $sql="UPDATE mahasiswa SET nama='$nama', matkul='$matkul', grade='$grade', rata_rata='$rata_rata'
        WHERE id='$id'";
        $eksekusi=$mysqli->query($sql);
        if($eksekusi)
        {
            echo("
            <script>
                alert('Proses Update Berhasil');
                window.location.href='index.php';
            </script>");
        }
        else 
        {
            echo("Proses Update gagal");
        }
    }
?>