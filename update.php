<?php
$con = mysqli_connect('localhost', 'root', '', 'arthi');
$ID = $_GET['id'];
$Rec = mysqli_query($con, "SELECT * FROM product WHERE pid = $ID");
$data = mysqli_fetch_array($Rec);
?>

<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />


    <style>
    html, body {
      height: 100%;
    }
  </style>

</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 h-full">

    <div class="container mx-auto py-12">
        <div class="card card-body shadow-lg p-6 bg-white rounded-lg max-w-md mx-auto">
            <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">Update Product</h1>
            <form action="update1.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" value="<?php echo $data['Name'] ?>" class="input input-bordered w-full" required>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" value="<?php echo $data['Price'] ?>" class="input input-bordered w-full" required>
                </div>

                <div>
                    <label for="img" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="img" class="file-input file-input-bordered w-full">
                    <img src="<?php echo $data['img'] ?>" width="200px" height="70px" class="mt-2">
                </div>

                <input type="hidden" name="pid" value="<?php echo $data['pid'] ?>">

                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-primary w-full">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
