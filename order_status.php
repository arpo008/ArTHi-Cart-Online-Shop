<?php
session_start();

if (!isset($_SESSION['cid'])) {
    echo '<script>
        alert("You must log in first");
        window.location.href = "login.php";
    </script>';
    exit();
}

$cid = $_SESSION['cid'];
$con = mysqli_connect("localhost", "root", "", "arthi");

// Cancel order logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    $getOidQuery = "
        SELECT o.oid 
        FROM orders o
        JOIN order_detail od ON o.oid = od.oid
        WHERE o.cid = $cid AND od.pid = $product_id
        LIMIT 1
    ";
    $result = mysqli_query($con, $getOidQuery);
    if ($row = mysqli_fetch_assoc($result)) {
        $oid = $row['oid'];
        mysqli_query($con, "DELETE FROM order_detail WHERE oid = $oid AND pid = $product_id");
        mysqli_query($con, "DELETE FROM order_history WHERE oid = $oid");
        mysqli_query($con, "DELETE FROM orders WHERE oid = $oid");

        echo "<script>alert('Order cancelled successfully'); window.location.href='order_status.php';</script>";
        exit();
    } else {
        echo "<script>alert('Order not found or unauthorized');</script>";
    }
}

$query = "
SELECT 
    od.pid AS Product_id,
    p.Name AS product_Name,
    o.order_date AS Order_Date,
    o.delivery_date AS Expected_Delivery_Date,
    oh.order_status AS Order_Status
FROM orders o
JOIN order_detail od ON o.oid = od.oid
JOIN product p ON od.pid = p.pid
JOIN order_history oh ON o.oid = oh.oid
WHERE o.cid = $cid
";
$data = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en"data-theme="light">
<head>
  <meta charset="UTF-8">
  <title>Order Status</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen">

<nav class="navbar bg-base-100 shadow-lg rounded-xl ">
  <div class="container mx-auto flex justify-between items-center px-6">
    <a class="text-xl font-bold text-purple-700">Customer Panel</a>
    <a class="text-4xl font-bold text-purple-700">ArTHi</a>
    <a href="dashboard.php" class="btn btn-outline btn-error">Back</a>
  </div>
</nav>

<div class="max-w-6xl mx-auto p-6 mt-6 bg-white rounded-xl shadow-lg">
  <h2 class="text-3xl font-bold text-center text-purple-800 mb-6">Your Order Status</h2>

  <div class="overflow-x-auto">
    <table class="table w-full border border-purple-200">
      <thead class="bg-purple-100 text-purple-700">
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Order Date</th>
          <th>Expected Delivery Date</th>
          <th>Status</th>
          <th>Cancel</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = mysqli_fetch_array($data)) { ?>
        <tr class="hover:bg-pink-50">
          <td class="font-medium"><?= $row['Product_id'] ?></td>
          <td><?= $row['product_Name'] ?></td>
          <td><?= $row['Order_Date'] ?></td>
          <td><?= $row['Expected_Delivery_Date'] ?></td>
          <td>
            <span class="badge badge-outline badge-info"><?= $row['Order_Status'] ?></span>
          </td>
          <td>
            <form method="post">
              <input type="hidden" name="product_id" value="<?= $row['Product_id'] ?>">
              <button type="submit" class="btn btn-sm btn-error">Cancel</button>
            </form>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <div class="flex justify-center mt-6">
    <a href="dashboard.php" class="btn btn-primary px-6 bg-red-500 text-white border border-black">Back</a>
  </div>
</div>

</body>
</html>
