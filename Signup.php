<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $con = mysqli_connect("localhost", "root", "", "arthi");

    if (!$con)
        die("Connection Failed: " . mysqli_connect_error());

    if (isset($_POST['submit'])) {
        $Name = $_POST['name'];
        $Email = $_POST['email'];
        $Age = $_POST['age'];
        $Address = $_POST['address'];
        $Number = $_POST['number'];
        $Password = $_POST['pass'];

        $data = mysqli_query($con, "SELECT cid FROM customer ORDER BY cid DESC LIMIT 1");
        $lcid = 0;
        if ($row = mysqli_fetch_array($data)) {
            $lcid = $row['cid'];
        }
        if ($lcid === 0)
            $lcid = 1100;
        else
            $lcid++;

        $sql = "INSERT INTO customer (cid,name, email, Age, address, number, pass) VALUES ('$lcid','$Name', '$Email', '$Age', '$Address', '$Number', '$Password')";
        if (mysqli_query($con, $sql)) {
            echo "<script>
                alert('Registration Successful!');
                window.location.href = 'login.php';
            </script>";
            exit();
        } else {
            echo "<script>alert('Something went wrong!');</script>";
        }
        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Sign Up</title>
    <style>
    html, body {
      height: 100%;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100">

<nav class="navbar bg-base-100 shadow-lg rounded-xl mt-3">
    <div class="container mx-auto flex justify-center items-center">
      
      <a class="text-4xl font-bold text-purple-700" href="">ArTHi</a>
      
    </div>
  </nav>  

    <div class="container mx-auto py-12">
        <div class="card card-body shadow-lg p-6 bg-white rounded-lg max-w-md mx-auto">
            <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">Sign Up</h1>
            <form method="POST" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required class="input input-bordered w-full">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" required class="input input-bordered w-full">
                </div>

                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="text" id="age" name="age" required class="input input-bordered w-full">
                </div>

                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address" required class="input input-bordered w-full">
                </div>

                <div>
                    <label for="number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" id="number" name="number" required class="input input-bordered w-full">
                </div>

                <div>
                    <label for="pass" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="pass" name="pass" required class="input input-bordered w-full">
                </div>

                <button type="submit" name="submit" class="btn btn-primary w-full">Submit</button>
            </form>

            <p class="mt-4 text-center">
                Already have an account? <a href="login.php" class="text-blue-500">Login Here</a>
            </p>
            <p class="mt-2 text-center">
                <a href="home.php" class="text-blue-500">Go to Home</a>
            </p>
        </div>
    </div>

</body>
</html>
