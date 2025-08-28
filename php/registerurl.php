<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "username", "password", "database");

// Periksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Ambil nilai dari form
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];

  // Periksa apakah password dan confirm password sama
  if ($password == $confirm_password) {
    // Periksa apakah username sudah digunakan
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Jika username belum digunakan, maka simpan data ke database
    if (mysqli_num_rows($result) == 0) {
      $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
      mysqli_query($conn, $query);
      header("Location: login.html");
    } else {
      // Jika username sudah digunakan, maka tampilkan pesan error
      echo "Username sudah digunakan";
    }
  } else {
    // Jika password dan confirm password tidak sama, maka tampilkan pesan error
    echo "Password dan confirm password tidak sama";
  }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
