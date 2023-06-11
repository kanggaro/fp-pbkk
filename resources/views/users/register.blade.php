<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div class="w-1/3 bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6">Register</h2>
            <form action="{{ route('register') }}" method="POST"> <!-- Ubah action menjadi {{ route('register') }} dan tambahkan method="POST" -->
                @csrf <!-- Menambahkan token CSRF untuk keamanan -->
                <div class="mb-4">
                    <label for="firstname" class="block mb-2 text-sm font-bold">First Name</label>
                    <input type="text" name="first_name" id="firstname" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="lastname" class="block mb-2 text-sm font-bold">Last Name</label>
                    <input type="text" name="last_name" id="lastname" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-bold">Email</label>
                    <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-2 text-sm font-bold">Phone Number</label>
                    <input type="tel" name="phone_number" id="phone" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-bold">Password</label>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="confirm_password" class="block mb-2 text-sm font-bold">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
            </form>
            <p class="text-center mt-4">Already have an account? <a href="/login" class="text-blue-500 font-bold">Login</a></p>
        </div>
    </div>
</body>

</html>