<?php 
    include_once('connection.php');

    if(isset($_GET['proses']) and $_GET['proses']=='delete')
    {
        $id=$_GET['id'];
        $sql="DELETE FROM mahasiswa
        WHERE id='$id'";
        $eksekusi=$mysqli->query($sql);
        if($eksekusi)
        {
            echo("
            <script>
                alert('Proses Delete Berhasil');
                window.location.href='index.php';
            </script>");
        }
        else
        { 
            echo "proses hapus gagal";
        }
    }

?>