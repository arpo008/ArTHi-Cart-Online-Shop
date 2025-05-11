<?php
$con = mysqli_connect('localhost', 'root', '', 'arthi'); // Update db name if needed
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($con, "SELECT * FROM employee");
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Employee List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen p-8">

    <h1 class="text-4xl font-bold text-center text-purple-700 mb-8">Employee Information</h1>

    <div class="overflow-x-auto">
        <table class="table table-zebra w-full rounded-xl shadow-lg border border-purple-300">
            <thead class="text-purple-800 text-lg bg-purple-200">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr class="hover:bg-pink-100 transition">
                        <td><?= $row['pid'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['age'] ?></td>
                        <td class="font-medium text-green-600"><?= $row['role'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div class="mt-10 flex justify-center">
        <a href="admindashboard.php" class="btn btn-primary">Back to Dashboard</a>
    </div>

</body>
</html>
