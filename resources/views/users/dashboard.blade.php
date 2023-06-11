<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-1/5">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Dashboard</h2>
            </div>
            <nav class="py-4">
                <ul>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Daftar Buku</a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Menu 2</a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700">
                        <a href="#" class="block">Menu 3</a>
                    </li>
                    <!-- Tambahkan menu lain sesuai kebutuhan -->
                </ul>
            </nav>
        </aside>

        <!-- Content -->
        <div class="w-4/5">
            <!-- Header -->
            <header class="bg-white shadow-md p-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-bold">Library Management System</h1>
                    <div class="flex items-center">
                        <a href="{{ route('profile') }}" class="text-gray-600 hover:text-gray-900 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v4m0 0v4m0-4h4m-4 0H4m14 0v4m0 0v4m0-4h4m-4 0H4m10-6a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </a>
                        <a href="{{ route('logout') }}" class="text-gray-600 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="p-4">
                <!-- Tambahkan konten utama di sini -->
            </main>
        </div>
    </div>
</body>

</html>