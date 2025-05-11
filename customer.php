<?php
session_start();

// Optional: Check for admin session
// if (!isset($_SESSION['admin_id'])) {
//     echo '<script>alert("Admin must log in first"); window.location.href = "login.php";</script>';
//     exit();
// }

$con = mysqli_connect("localhost", "root", "", "arthi");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT cid, name, email, address, age, number FROM customer";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen">

<nav class="navbar bg-base-100 shadow-lg rounded-xl ">
        <div class="container mx-auto flex justify-between items-center mt-3">
            <a class="text-xl font-bold text-purple-700" href="#">Admin Pannel</a>
            <a class="text-5xl font-bold text-purple-700" href="">ArTHi </a>
            <a href="Home.php" class="btn btn-outline btn-error">LOGOUT</a>
        </div>
    </nav>


    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4 text-center">Customer Details</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-300 text-sm">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">CID</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Address</th>
                            <th class="px-4 py-2 border">Age</th>
                            <th class="px-4 py-2 border">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr class="text-center hover:bg-yellow-100">
                                <td class="px-4 py-2 border"><?= $row['cid'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['name'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['email'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['address'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['age'] ?></td>
                                <td class="px-4 py-2 border"><?= $row['number'] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Back Button -->
            <div class="flex justify-end mt-6">
                <a href="admindashboard.php" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>
        </div>
    </div>

</body>
</html>
