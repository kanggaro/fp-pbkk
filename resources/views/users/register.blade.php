
<body class="bg-gray-100">
    <div class="flex items-center justify-center h-screen">
        <div class="w-1/3 bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold mb-6">Register</h2>
            <form action="/register" method="POST">
                @csrf <!-- Menambahkan token CSRF untuk keamanan -->
                <div class="mb-4">
                    <label for="firstname" class="block mb-2 text-sm font-bold">First Name</label>
                    <input type="text" name="firstname" id="firstname" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="lastname" class="block mb-2 text-sm font-bold">Last Name</label>
                    <input type="text" name="lastname" id="lastname" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-bold">Email</label>
                    <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-bold">Password</label>
                    <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-2 text-sm font-bold">Phone Number</label>
                    <input type="tel" name="phone" id="phone" class="w-full border border-gray-300 rounded-md p-2">
                </div>
                <div class="mb-4">
                    <label for="gender" class="block mb-2 text-sm font-bold">Gender</label>
                    <select name="gender" id="gender" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button>
            </form>
            <p class="text-center mt-4">Already have an account? <a href="/login" class="text-blue-500 font-bold">Login</a></p>
        </div>
    </div>
</body>
</html>