<?php
session_start();

// Safe decode and validation
if (isset($_SESSION['arr']) && is_array($_SESSION['arr']) && !empty($_SESSION['arr'][0])) {
    $ar = json_decode($_SESSION['arr'][0], true);
    if (!is_array($ar)) {
        echo "Invalid session data";
        exit;
    }
} else {
    echo "No Data Entry";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Order Page 2</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" />
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 h-max min-h-screen">

    <!-- Navbar -->
    <nav class="navbar bg-base-100 shadow-lg rounded-xl mt-3 mb-6">
  <div class="container mx-auto flex justify-between items-center px-6">
    <a class="text-xl font-bold text-purple-700">Customer Panel</a>
    <a class="text-4xl font-bold text-purple-700">ArTHi</a>
    <a href="dashboard.php" class="btn btn-outline btn-error">Back</a>
  </div>
</nav>

    <div class="container mx-auto py-10">
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full shadow-xl bg-white rounded-lg">
                <thead class="text-base font-bold text-purple-700">
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                        <th>Total</th>
                        <th>Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $con = mysqli_connect('localhost', 'root', '', 'arthi');
                    $data = mysqli_query($con, "SELECT * FROM product");

                    while ($row = mysqli_fetch_array($data)) {
                        $id = $row['pid'];
                        if (in_array($id, $ar)) {
                            echo "
                            <tr>
                                <td>{$id}</td>
                                <td>{$row['Name']}</td>
                                <td>{$row['Price']}</td>
                                <td><img src='{$row['img']}' class='w-24 h-20 object-cover rounded-lg border border-purple-200'></td>
                                <td>
                                    <input type='number' id='quantity_{$id}' value='0' class='input input-bordered w-20 text-center'>
                                </td>
                                <td class='flex gap-2'>
                                    <button class='btn btn-sm btn-outline btn-primary' onclick='increment(\"quantity_{$id}\",{$row['Price']})'>+</button>
                                    <button class='btn btn-sm btn-outline btn-secondary' onclick='decrement(\"quantity_{$id}\",{$row['Price']})'>-</button>
                                </td>
                                <td class='text-purple-700 font-semibold' id='total_price_{$id}'>0</td>
                                <td>
                                    <button class='btn btn-sm btn-success drama' onclick='togglecart(this,\"{$id}\",\"quantity_{$id}\",\"{$row['Price']}\")'>Order</button>
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            <button type="button" class="btn btn-primary w-full text-lg font-bold" onclick="callotherfunction()">Confirm Order</button>
        </div>
    </div>

    <!-- Scripts -->
    <script>
    function increment(id, price) {
        let input = document.getElementById(id);
        input.value = parseInt(input.value) + 1;
        id = id.split('_')[1];
        updateprice(id, input.value, price);
    }

    function decrement(id, price) {
        let input = document.getElementById(id);
        if (parseInt(input.value) > 0) {
            input.value = parseInt(input.value) - 1;
            id = id.split('_')[1];
            updateprice(id, input.value, price);
        }
    }

    function updateprice(id, quantity, price) {
        let total = quantity * price;
        document.getElementById("total_price_" + id).textContent = total;
        return total;
    }

    function getitem(pid) {
        let items = JSON.parse(localStorage.getItem('items') || '[]');
        return items.some(info => info.pid == pid);
    }

    function instorage(obj) {
        let items = JSON.parse(localStorage.getItem('items') || '[]');
        items.push(obj);
        localStorage.setItem('items', JSON.stringify(items));
    }

    function removefromstorage(pid) {
        let items = JSON.parse(localStorage.getItem('items'));
        items = items.filter(info => info.pid !== pid);
        localStorage.setItem('items', JSON.stringify(items));
    }

    function togglecart(button, pid, qua_id, price) {
        let quantity = parseInt(document.getElementById(qua_id).value);
        if (quantity > 0) {
            if (getitem(pid)) {
                removefromstorage(pid);
                button.classList.remove('btn-error');
                button.classList.add('btn-success');
                button.textContent = 'Order';
            } else {
                let total = quantity * parseInt(price);
                instorage({ pid, quantity, totalprice: total });
                button.classList.remove('btn-success');
                button.classList.add('btn-error');
                button.textContent = 'Cancel';
            }
        } else {
            alert("Please select quantity before ordering.");
        }
    }

    function sendinfo() {
        let items = localStorage.getItem('items');
        fetch("pera2.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ items })
        })
        .then(res => res.text())
        .then(data => console.log(data))
        .catch(err => console.error("Error:", err));
    }

    function callotherfunction() {
        if (localStorage.getItem('items')) {
            if (localStorage.getItem('item')) localStorage.removeItem('item');
            sendinfo();
            window.location.href = "customer_to_sql.php";
        } else {
            alert("Please order something");
            window.location.href = "new_order_page_2.php";
        }
    }

    function whatever() {
        localStorage.removeItem('item');
        localStorage.removeItem('items');
        window.location.href = "login.php";
    }

    // Set UI state on load
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.drama').forEach(button => {
            const pid = button.getAttribute('onclick').match(/togglecart\(this,"(.+?)"/)[1];
            if (getitem(pid)) {
                button.classList.remove('btn-success');
                button.classList.add('btn-error');
                button.textContent = 'Cancel';
            }
        });
    });
    </script>
</body>
</html>
