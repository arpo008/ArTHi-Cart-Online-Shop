<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Order Tracking</title>

    <style>
    html, body {
      height: 100%;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 h-full">

<nav class="navbar bg-base-100 shadow-lg rounded-xl ">
        <div class="container mx-auto flex justify-between items-center mt-3">
            <a class="text-xl font-bold text-purple-700" href="#">Admin Pannel</a>
            <a class="text-4xl font-bold text-purple-700" href="">ArTHi </a>
            <a href="admindashboard.php" class="btn btn-outline btn-error">Back</a>
        </div>
    </nav>

    <div class="container mx-auto py-8">
        <div class="card card-body mt-4 shadow-lg p-6 bg-white rounded-lg">
            <table class="table table-zebra w-full">
                <thead class="text-center">
                    <tr>
                        <th>Order No</th>
                        <th>Order Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'arthi'); 
                    $pic = mysqli_query($con, "SELECT * FROM order_history");

                    while ($row = mysqli_fetch_array($pic)) {
                        echo "
                        <tr>
                            <td>{$row['oid']}</td>
                            <td>{$row['order_status']}</td>
                            <td>
                                <a href='updatestatus.php?id={$row['oid']}' class='btn btn-warning btn-sm'>Update</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
