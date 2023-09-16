<?php 
 
session_start();
session_destroy();

echo("
            <script>
                alert('Session berakhir');
                window.location.href='index.php';
            </script>");
 

 
?>