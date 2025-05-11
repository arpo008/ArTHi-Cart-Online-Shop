<?php
$branches = ['Banani', 'Dhanmondi', 'Uttara', 'Gulshan', 'Mirpur', 'Bashundhara', 'Motijheel'];
function generateHelplineNumber() {
    return '017' . rand(10000000, 99999999);
}
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Helpline Contacts</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen ">
<nav class="navbar bg-base-100 shadow-lg rounded-xl ">
  <div class="container mx-auto flex justify-between items-center px-6">
    <a class="text-xl font-bold text-purple-700">Customer Panel</a>
    <a class="text-5xl font-bold text-purple-700">ArTHi</a>
    <a href="dashboard.php" class="btn btn-outline btn-error">Back</a>
  </div>
</nav>

<div class="flex flex-col items-center p-6">
  <h1 class="text-4xl font-bold text-purple-700 mb-8">Branch Helpline Contacts</h1>
  
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
    <?php foreach ($branches as $branch): 
    
      $helplineNumber = generateHelplineNumber();
    ?>
      <div class="card glass shadow-xl border border-purple-200 rounded-2xl hover:shadow-4xl transition-shadow duration-300">
        <div class="card-body items-center text-center">
          <h2 class="card-title text-2xl font-bold text-purple-700"><?= $branch ?></h2>
          <p class="text-lg text-gray-600 mt-2">Helpline Number:</p>
          <p class="text-xl font-semibold text-green-600"><?= $helplineNumber ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="mt-10">
    <a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>
  </div>
</div>
</body>
</html>
