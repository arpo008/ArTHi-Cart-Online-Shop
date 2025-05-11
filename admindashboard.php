<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen">
  
  <nav class="navbar bg-base-100 shadow-lg rounded-xl mt-3">
    <div class="container mx-auto flex justify-between items-center">
      <a class="text-xl font-bold text-purple-700" href="#">Admin Pannel</a>
      <a class="text-5xl font-bold text-purple-700" href="">ArTHi</a>
      <a href="Home.php" class="btn btn-outline btn-error">LOGOUT</a>
    </div>
  </nav>

  <div class="container mx-auto px-8 mt-5">
    <h1 class="text-4xl font-bold text-center text-purple-800 mb-10">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      
      <div class="card bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-shadow duration-300">
        <figure class="rounded-t-2xl overflow-hidden">
          <img src="./Resources/customer.png" alt="Customer" class="w-full h-52 object-contain p-4 bg-gray-100" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Customer Details</h2>
          <p> you can see all Customers information Here</p>
          <div class="card-actions justify-end">
            <a href="customer.php" class="btn btn-primary">Customer List</a>
          </div>
        </div>
      </div>

     
      <div class="card bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-shadow duration-300">
        <figure class="rounded-t-2xl overflow-hidden">
          <img src="./Resources/list.png" alt="Product" class="w-full h-52 object-contain p-4 bg-gray-100" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Product List</h2>
          <p> you can update or delete product here</p>
          <div class="card-actions justify-end">
            <a href="product.php" class="btn btn-primary">Product List</a>
          </div>
        </div>
      </div>

     
      <div class="card bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-shadow duration-300">
        <figure class="rounded-t-2xl overflow-hidden">
          <img src="./Resources/add.png" alt="Product" class="w-full h-52 object-contain p-4 bg-gray-100" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Add Product</h2>
          <p> you can add product here</p>
          <div class="card-actions justify-end">
            <a href="addproduct.php" class="btn btn-primary">Add Product</a>
          </div>
        </div>
      </div>

      
      <div class="card bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-shadow duration-300">
        <figure class="rounded-t-2xl overflow-hidden">
          <img src="./Resources/emp.png" alt="Employee" class="w-full h-52 object-contain p-4 bg-gray-100" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Employee Details</h2>
          <p> You can see all employees information </p>
          <div class="card-actions justify-end">
            <a href="employee.php" class="btn btn-primary">Employees List</a>
          </div>
        </div>
      </div>

      
      <div class="card bg-white shadow-xl rounded-2xl hover:shadow-2xl transition-shadow duration-300">
        <figure class="rounded-t-2xl overflow-hidden">
          <img src="./Resources/delivery2.png" alt="Delivery" class="w-full h-52 object-contain p-4 bg-gray-100" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Delivery Status</h2>
          <p> you can update product delivery status Here</p>
          <div class="card-actions justify-end">
            <a href="orderstrack.php" class="btn btn-primary">Order Status</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
