<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $Email= $_POST['email'];
    $Password= $_POST['password'];

    $con = new mysqli('localhost', 'root', '','arthi');

    if ($con->connect_error) {
        die("Failed to connect: ".$con->connect_error);
    } else {
        $stmt = $con->prepare("SELECT * FROM customer WHERE email=?");
        $stmt->bind_param("s", $Email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            $data = $stmt_result->fetch_assoc();
            if ($data['pass'] === $Password) {
                $_SESSION['cid'] = $data['cid'];
                echo '<script> 
                    alert("Successfully Login '. $data['name'].'");
                    window.location.href = "dashboard.php";
                    </script>';
            } else {
                echo '<script>alert("Invalid Email or Password")</script>';
            }
        } else {
            echo "<h2> Invalid Email or Password </h2>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen  ">

<nav class="navbar bg-base-100 shadow-lg rounded-xl mt-3">
    <div class="container mx-auto flex justify-center items-center">
      
      <a class="text-4xl font-bold text-purple-700" href="">ArTHi</a>
      
    </div>
  </nav>  
<div class="flex items-center justify-center mt-32">
<div class="card w-full max-w-md shadow-2xl bg-white p-8 border border-purple-200">
    <h2 class="text-3xl font-bold text-center text-purple-700 mb-4">LOG IN</h2>
    <p class="text-center text-gray-600 mb-6">Please enter your valid email and password</p>

    <form method="post" class="space-y-4">
      <div>
        <label class="label">Email</label>
        <input type="email" name="email" required class="input input-bordered w-full"/>
      </div>
      <div>
        <label class="label">Password</label>
        <input type="password" name="password" required class="input input-bordered w-full"/>
      </div>
      <input type="submit" value="Log In" class="btn btn-primary w-full"/>
    </form>

    <p class="mt-4 text-sm text-center">
      Not have an account? <a href="Signup.php" class="text-blue-600 hover:underline">Sign Up Here</a>
    </p>
    <p class="text-center text-sm mt-2"><a href="Home.php" class="text-gray-500 hover:underline">Back to Home</a></p>
  </div>
</div>
</body>
</html>
