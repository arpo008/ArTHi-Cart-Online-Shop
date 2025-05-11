<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-100 via-pink-50 to-yellow-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 bg-white shadow-2xl rounded-2xl">
        <h1 class="text-3xl font-bold text-center text-purple-800 mb-2">Admin Panel</h1>
        <p class="text-center text-gray-500 mb-6">Please enter your valid email and password</p>

        <form action="admin db.php" method="post" class="space-y-4">
            <div>
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">Email</span>
                </label>
                <input type="email" name="email" class="input input-bordered w-full" required />
            </div>

            <div>
                <label class="label">
                    <span class="label-text font-semibold text-gray-700">Password</span>
                </label>
                <input type="password" name="password" class="input input-bordered w-full" required />
            </div>

            <div class="pt-4">
                <input type="submit" value="Log In" class="btn btn-primary w-full" />
            </div>
            
        </form>

        <p class="mt-6 text-center text-sm text-gray-600">
            <a href="Home.php" class="link link-hover text-blue-500">← Back to Home</a>
        </p>
    </div>
</body>
</html>
