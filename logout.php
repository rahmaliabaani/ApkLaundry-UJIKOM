<?php
session_start();
session_destroy();
echo "<script>alert('Anda telah Keluar!');document.location='login.php'</script>";
?>