<?php
$con = mysqli_connect('localhost', 'root', '', 'arthi');
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Products</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen">

<nav class="navbar bg-base-100 shadow-lg rounded-xl mt-3 mb-6">
  <div class="container mx-auto flex justify-between items-center px-6">
    <a class="text-xl font-bold text-purple-700">Customer Panel</a>
    <a class="text-4xl font-bold text-purple-700">ArTHi</a>
    <a href="dashboard.php" class="btn btn-outline btn-error">Back</a>
  </div>
</nav>

<div class="max-w-7xl mx-auto px-4">
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php
      $data = mysqli_query($con, "SELECT * FROM product");
      while ($row = mysqli_fetch_array($data)) {
        echo "
        <div class='card glass shadow-xl transition-transform transform hover:scale-105 duration-300'>
          <figure class='px-4 pt-4'>
            <img src='{$row['img']}' alt='Product Image' class='rounded-xl h-48 w-full object-cover'>
          </figure>
          <div class='card-body items-center text-center'>
            <h2 class='card-title text-lg font-bold text-purple-700'>{$row['Name']}</h2>
            <p class='text-gray-600 mb-2'>Price: <span class='text-green-600 font-medium'>{$row['Price']} Tk</span></p>
            <button class='btn btn-primary toadd w-full' onclick='toggleCart(this, \"{$row['pid']}\")'>Add to Cart</button>
          </div>
        </div>";
      }
    ?>
  </div>

  <div class="mt-8 flex justify-center">
    <a href="new_order_page_2.php" target="_blank">
      <button type="button" class="btn btn-success btn-wide text-white text-lg shadow-md" onclick="sendinfo()">Go To Cart</button>
    </a>
  </div>
</div>

<script>
function sendinfo() {
    let item = localStorage.getItem('item');
    fetch("pera.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json;charset=utf-8"
        },
        body: JSON.stringify({ item })
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error("Error:", error));
}

function whatever(){
    if(localStorage.getItem('item')) localStorage.removeItem('item');
    if(localStorage.getItem('items')) localStorage.removeItem('items');
    window.location.href = "login.php";
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.toadd').forEach(button => {
        const pid = button.getAttribute('onclick').match(/toggleCart\(this, "(.+?)"\)/)[1];
        updateButtonState(button, pid);
    });
});

function instorage(pid) {
    let item = JSON.parse(localStorage.getItem('item') || "[]");
    item.push(pid);
    localStorage.setItem('item', JSON.stringify(item));
}

function removefromstorage(pid) {
    let item = JSON.parse(localStorage.getItem('item') || "[]");
    item = item.filter(info => info !== pid);
    localStorage.setItem('item', JSON.stringify(item));
}

function getitem(pid) {
    let item = JSON.parse(localStorage.getItem('item') || "[]");
    return item.includes(pid);
}

function updateButtonState(button, pid) {
    if (getitem(pid)) {
        button.classList.remove('btn-primary');
        button.classList.add('btn-error');
        button.textContent = 'Cancel';
    } else {
        button.classList.remove('btn-error');
        button.classList.add('btn-primary');
        button.textContent = 'Add to Cart';
    }
}

function toggleCart(button, pid) {
    if (getitem(pid)) {
        removefromstorage(pid);
    } else {
        instorage(pid);
    }
    updateButtonState(button, pid);
}
</script>

</body>
</html>
