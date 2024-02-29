<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Tambahkan link CSS Tailwind -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-red-400 h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-3xl font-bold mb-6 text-center">Welcome back!</h1>

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="nidn" class="block text-gray-600 text-sm font-semibold mb-2">NIDN</label>
                <input type="text" id="nidn" name="nidn" class="w-full p-2 border rounded focus:outline-none focus:border-red-500">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-600 text-sm font-semibold mb-2">Password</label>
                <input type="password" id="password" name="password" class="w-full p-2 border rounded focus:outline-none focus:border-red-500">
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" id="remember_me" name="remember_me" class="mr-2">
                <label for="remember_me" class="text-gray-600 text-sm">Remember me</label>
            </div>

            <button type="submit" class="w-full bg-red-500 text-white p-2 rounded hover:bg-red-600 focus:outline-none focus:shadow-outline-red">Login</button>
        </form>

        <div class="mt-4 text-center">
            <a href="#" class="text-blue-500 hover:underline">Forgot Password?</a>
        </div>

        <div class="mt-4 text-center">
            <a href="{{url("/")}}" class="text-gray-600 hover:text-gray-800">Back to Main Page</a>
        </div>
    </div>

</body>

</html>
