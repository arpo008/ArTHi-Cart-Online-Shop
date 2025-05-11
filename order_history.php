<?php
session_start();
if (!isset($_SESSION['cid'])) {
    echo '<script>
        alert("You must log in first");
        window.location.href = "login.php";
    </script>';
    exit();
}

$con = mysqli_connect("localhost", "root", "", "arthi");
$cid = $_SESSION['cid'];

$query = "
SELECT 
    o.oid,
    o.order_date,
    o.delivery_date,
    o.total_price,
    p.Name AS product_name,
    od.quantity,
    oh.order_status
FROM orders o
JOIN order_detail od ON o.oid = od.oid
JOIN product p ON od.pid = p.pid
JOIN order_history oh ON o.oid = oh.oid
WHERE o.cid = $cid
ORDER BY o.order_date DESC, o.oid DESC
";

$result = mysqli_query($con, $query);

$orders = [];
while ($row = mysqli_fetch_assoc($result)) {
    $oid = $row['oid'];
    if (!isset($orders[$oid])) {
        $orders[$oid] = [
            'order_date' => $row['order_date'],
            'delivery_date' => $row['delivery_date'],
            'total_price' => $row['total_price'],
            'order_status' => $row['order_status'],
            'products' => []
        ];
    }
    $orders[$oid]['products'][] = [
        'product_name' => $row['product_name'],
        'quantity' => $row['quantity']
    ];
}
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <title>Order History</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen">

<nav class="navbar bg-base-100 shadow-lg rounded-xl mt-3">
  <div class="container mx-auto flex justify-between items-center px-6">
    <a class="text-xl font-bold text-purple-700">Customer Panel</a>
    <a class="text-4xl font-bold text-purple-700">ArTHi</a>
    <a href="dashboard.php" class="btn btn-outline btn-error">Back</a>
  </div>
</nav>

<div class="max-w-5xl mx-auto p-6 mt-6 bg-white rounded-xl shadow-lg">
    <h2 class="text-3xl font-bold text-center text-purple-800 mb-6">My Order History</h2>

    <?php if (empty($orders)): ?>
        <div class="alert alert-info shadow-lg">
            <div><span>No order history yet.</span></div>
        </div>
    <?php else: ?>
        <?php foreach ($orders as $oid => $order): ?>
            <div class="card bg-base-100 shadow-md mb-6 border border-purple-200">
                <div class="card-body">
                    <h2 class="card-title text-lg font-semibold text-purple-600">
                        Order ID: <?= $oid ?>
                        <span class="ml-4 badge badge-info text-white"><?= $order['order_status'] ?></span>
                    </h2>
                    <p><strong>Order Date:</strong> <?= $order['order_date'] ?></p>
                    <p><strong>Delivery Date:</strong> <?= $order['delivery_date'] ?></p>
                    
                    <div class="overflow-x-auto mt-3">
                        <table class="table table-zebra w-full border border-gray-300">
                            <thead class="bg-purple-100 text-purple-800">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($order['products'] as $product): ?>
                                <tr>
                                    <td><?= $product['product_name'] ?></td>
                                    <td><?= $product['quantity'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <p class="mt-3 font-semibold text-gray-700">
                        Total Price: <span class="text-green-600"><?= $order['total_price'] ?> Tk</span>
                    </p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="flex justify-center">
        <a href="dashboard.php" class="btn btn-primary bg-red-500 text-white border-black mt-4 px-6">
            Back to Dashboard
        </a>
    </div>
</div>

</body>
</html>
