<?php
session_start();
if (!isset($_SESSION['cid'])) {
  echo '<script>
    alert("You must log in first");
    window.location.href="login.php";
  </script>';
  exit();
}
$cid = $_SESSION['cid'];
?>

<script>
  function whatever() {
    window.location.href = "login.php";
    localStorage.removeItem('item');
    localStorage.removeItem('items');
  }
</script>

<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Customer Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen">

<nav class="navbar bg-base-100 shadow-lg rounded-xl mt-3">
    <div class="container mx-auto flex justify-between items-center">
      <a class="text-xl font-bold text-purple-700" href="#">Customer Pannel</a>
      <a class="text-5xl font-bold text-purple-700" href="">ArTHi Cart</a>
      <a href="Home.php" class="btn btn-outline btn-error">LOGOUT</a>
    </div>
  </nav>
 
   
  
 
  <!-- Dashboard Title -->
  <div class="text-center mt-10 ml-10">
    <h1 class="text-3xl font-bold text-black">DASHBOARD</h1>
  </div>
  <div class="flex justify-center items-center mt-20">
  <!-- Dashboard Cards -->
  <div class="flex flex-wrap justify-center mt-10 gap-6 px-4">
    <a href="new_order_page_1.php" class="card w-80 bg-white text-white shadow-xl hover:scale-105 transition-transform">
      <div class="card-body items-center text-center">
        <img src="./Resources/new.png" alt="">
        <h2 class="card-title text-black text-2xl font-semibold">New Order</h2>
        <span class="material-icons-outlined text-black text-4xl">category</span>
      </div>
    </a>

    <a href="order_status.php" class="card w-80 bg-info-content text-white shadow-xl hover:scale-105 transition-transform">
      <div class="card-body items-center text-center">
        <img src="./Resources/status.png" alt="">
        <h2 class="card-title text-2xl font-semibold">Order Status</h2>
        <span class="material-icons-outlined text-4xl">groups</span>
      </div>
    </a>

    <a href="order_history.php" class="card w-80  bg-accent-content shadow-xl hover:scale-105 transition-transform">
      <div class="card-body items-center text-center">
        <img src="./Resources/History.png" alt="">
        <h2 class="card-title text-white text-2xl font-semibold">Order History</h2>
        <span class="material-icons-outlined text-white text-4xl">notification_important</span>
      </div>
      <a href="helpline.php" class="card w-80 bg-error-content text-white shadow-xl hover:scale-105 transition-transform">
      <div class="card-body items-center text-center">
        <img src="./Resources/help.png" alt="">
        <h2 class="card-title text-2xl font-semibold">HelpLine</h2>
        <span class="material-icons-outlined text-4xl">groups</span>
      </div>
    </a>
    </a>
  </div>
  </div>
</body>
</html>
