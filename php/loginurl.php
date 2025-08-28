<?php
// Periksa apakah user telah login
session_start();
if (!isset($_SESSION["username"])) {
  header("Location: login.html");
}

// Tampilkan dashboard
echo "Selamat datang, " . $_SESSION["username"];
?>
