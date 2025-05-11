<?php
$con = mysqli_connect('localhost', 'root', '', 'arthi');
$ID = $_GET['id'];
$Rec = mysqli_query($con, "SELECT * FROM order_history WHERE `oid` = $ID");
$data = mysqli_fetch_array($Rec);
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order Status</title>
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
            <h1 class="text-3xl font-bold text-center text-purple-700 mb-6">Update Order Status</h1>
            <form action="updatestatus1.php" method="POST" class="space-y-4">

                <div>
                    <label for="order_status" class="block text-sm font-medium text-gray-700 mb-1">Order Status</label>
                    <select name="name" class="select select-bordered w-full" required>
                        <?php
                        $options = [
                            'Shipped',
                            'Delivered',
                            'Ongoing Process',
                            'Order Cancel',
                            'Some Internal Issue. Delay 4-5 days'
                        ];
                        foreach ($options as $option) {
                            $selected = ($data['order_status'] === $option) ? 'selected' : '';
                            echo "<option value=\"$option\" $selected>$option</option>";
                        }
                        ?>
                    </select>
                </div>

                <input type="hidden" name="oid" value="<?php echo $data['oid'] ?>">

                <div class="text-center">
                    <button type="submit" name="update" class="btn btn-primary w-full">Update</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
