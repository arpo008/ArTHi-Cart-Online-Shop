<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Product Management</title>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100">

    <nav class="navbar bg-base-100 shadow-lg rounded-xl ">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-xl font-bold text-purple-700" href="#">Admin Pannel</a>
            <a class="text-4xl font-bold text-purple-700" href="">ArTHi </a>
            <a href="admindashboard.php" class="btn btn-outline btn-error">Back</a>
        </div>
    </nav>

    <div class=" flex justify-center rounded-3xl items-center font-bold text-3xl  mt-2 p-5 mx-40">
    <p> PRODUCT LIST</p>
    </div>
    <div class="container mx-auto py-8">
        <div class="card card-body mt-4 shadow-lg p-6 bg-white rounded-lg">
            <table class="table table-zebra w-full">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'arthi'); 
                    $pic = mysqli_query($con, "SELECT * FROM product");

                    while ($row = mysqli_fetch_array($pic)) {
                        echo "
                        <tr>
                            <td>{$row['pid']}</td>
                            <td>{$row['Name']}</td>
                            <td>{$row['Price']}</td>
                            <td><img src='{$row['img']}' width='100px' height='70px'></td>
                            <td>
                                <a href='delete.php?id={$row['pid']}' class='btn btn-error btn-sm'>Delete</a>
                                <a href='update.php?id={$row['pid']}' class='btn btn-warning btn-sm'>Update</a>
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
