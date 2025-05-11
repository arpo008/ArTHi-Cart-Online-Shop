<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ArTHi Customer List</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen p-6">
  <div class="max-w-7xl mx-auto">
    <h1 class="text-4xl font-bold text-center text-purple-800 mb-8">Customer List</h1>

    <div class="overflow-x-auto">
      <table class="table table-zebra w-full">
        <thead class="bg-purple-200 text-purple-900">
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Address</th>
            <th>Number</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $con = mysqli_connect('localhost', 'root', '', 'arthi'); 
            $pic = mysqli_query($con , "SELECT * FROM customer");

            while($row = mysqli_fetch_array($pic)) {
              echo "
                <tr>
                  <td>{$row['cid']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['Age']}</td>
                  <td>{$row['address']}</td>
                  <td>{$row['number']}</td>
                </tr>
              ";
            }
          ?>
        </tbody>
      </table>
    </div>

    <div class="mt-6 text-center">
      <a href="admindashboard.php" class="btn btn-outline btn-primary">Back to Dashboard</a>
    </div>
  </div>
</body>
</html>
