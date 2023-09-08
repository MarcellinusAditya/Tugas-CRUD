<?php 
    include_once('connection.php');


    if(isset($_POST['proses']) and $_POST['proses']=='insert')
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

        
        $query="INSERT INTO mahasiswa(nama, matkul, grade, rata_rata)
        VALUES ('$nama','$matkul','$grade','$rata_rata')";
        $eksekusi=mysqli_query($mysqli, $query);
        if($eksekusi)
        {
            echo("
            <script>
                alert('Proses Input Berhasil');
                window.location.href='index.php';
            </script>");
            
        }
        else 
        {
            echo("Proses Input gagal");
        }
    }



?>