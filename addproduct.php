<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <title>Add Product </title>

    
    <style>
    html, body {
      height: 100%;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 h-full">

    <nav class="navbar bg-base-100 shadow-lg rounded-xl ">
        <div class="container mx-auto flex justify-between items-center">
            <a class="text-xl font-bold text-purple-700" href="#">Admin Pannel</a>
            <a class="text-5xl font-bold text-purple-700" href="">ArTHi </a>
            <a href="admindashboard.php" class="btn btn-outline btn-error">Back</a>
        </div>
    </nav>
 <div class=" flex justify-center rounded-3xl items-center font-bold text-3xl  mt-2 p-5 mx-40">
    <p>ADD PRODUCT</p>
 </div>
    <div class="container mx-auto py-8">
        <div class="card card-body mt-4 shadow-lg p-6 bg-white rounded-lg">
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <div class="space-y-4">
                    <div>
                        <label for="pid" class="block text-sm font-medium text-gray-700">ID:</label>
                        <input type="text" name="pid" id="pid" class="input input-bordered w-full" required>
                    </div>

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                        <input type="text" name="name" id="name" class="input input-bordered w-full" required>
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price:</label>
                        <input type="text" name="price" id="price" class="input input-bordered w-full" required>
                    </div>

                    <div>
                        <label for="img" class="block text-sm font-medium text-gray-700">Image:</label>
                        <input type="file" name="img" id="img" class="input input-bordered  py-2" required>
                    </div>

                    <button type="submit" name="upload" class="btn btn-primary w-full">Upload</button>
                </div>
            </form>
        </div>
    </div>
  
 </div>
    

</body>
</html>
