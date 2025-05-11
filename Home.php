<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ArTHi - Home</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Lora:wght@400;500&display=swap" rel="stylesheet">
  <style>
    /* Applying unique fonts */
    body {
      font-family: 'Lora', serif;
    }

    h1, h2, h3 {
      font-family: 'Playfair Display', serif;
      font-weight: 600;
    }

    /* Premium Button Styles */
    .premium-button {
      background: linear-gradient(45deg, #ff7f50, #ff6347);
      color: #fff;
      padding: 12px 36px;
      border-radius: 50px;
      font-size: 18px;
      font-weight: 500;
      transition: all 0.3s ease-in-out;
    }

    .premium-button:hover {
      transform: translateY(-4px);
      background: linear-gradient(45deg, #ff6347, #ff7f50);
      box-shadow: 0px 6px 18px rgba(255, 99, 71, 0.3);
    }

    /* Styling for the boxes with a sleek, modern hover effect */
    .box {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .box:hover {
      transform: translateY(-5px);
      box-shadow: 0px 15px 25px rgba(0, 0, 0, 0.15);
      background: linear-gradient(45deg, #f2e1ff, #fef6fc);
    }

    .box-text {
      font-size: 1.5rem;
      font-weight: 600;
      color: #6b46c1;
      letter-spacing: 1px;
    }

    .box:hover .box-text {
      color: #9f7aea;
    }

    /* Adding elegant spacing */
    .hero-section {
      margin-top: 50px;
      padding: 50px 0;
    }

    .hero-text {
      font-size: 1.2rem;
      color: #555;
      line-height: 1.8;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen">

  <!-- Navbar -->
  <div class="navbar bg-base-100 shadow-md px-6">
    <div class="flex-1">
      <a class="btn btn-ghost text-3xl text-purple-700 font-bold">ArTHi CART</a>
    </div>
    <div class="flex gap-4">
      <a href="Signup.php" class="premium-button">Sign Up</a>
      <a href="login.php" class="premium-button">Login</a>
      <a href="about.php" class="premium-button">About</a>
      <a href="admin.php" class="premium-button">Admin</a>
    </div>
  </div>

  <!-- Hero Section -->
  <section class="text-center hero-section px-4 mt-28">
    <p class="hero-text font-bold text-gray-500 ">Experience the finest online shopping platform with seamless design and unique features.</p>
    <h1 class="text-8xl font-extrabold  text-purple-800 mb-4 mt-5">ArTHi Cart</h1>
    <p class="text-xl text-gray-600 font-small text-xl mt-10 ">Where Shopping Meets Elegance</p>
    </section>
    <div class="grid grid-cols-3 gap-4 space-x-8 flex  mx-96 text-center">
      <div class="box">
        <p class="box-text">VISIT</p>
      </div>
      <div class="box">
        <p class="box-text">ORDER</p>
      </div>
      <div class="box">
        <p class="box-text">ENJOY YOUR DAY</p>
      </div>
    </div>
  

  <footer class="text-center py-8 mt-16">
    <p class="text-gray-700 text-lg">© 2025 ArTHi. All Rights Reserved.</p>
  </footer>
</body>
</html>
