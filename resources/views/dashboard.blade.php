<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen" x-cloak>
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'block' : 'hidden md:block'" class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-md md:relative md:translate-x-0 transition-transform duration-200 flex flex-col">
            <div class="flex-1 p-6">
                <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>
                <nav class="space-y-4">
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Dashboard</a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Users</a>
                    <a href="#" class="block py-2 px-4 rounded hover:bg-gray-200">Settings</a>
                </nav>
            </div>
            <div class="p-6 mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full py-2 px-4 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top Navbar -->
            <header class="flex items-center justify-between bg-white shadow px-6 py-4">
    <span class="text-xl font-semibold">Dashboard</span>
    <div class="flex items-center gap-4">
        <div class="text-gray-600 font-mono" id="datetime"></div>
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden ml-4 focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>
</header>
            <!-- Page Content -->
            <main class="flex-1 p-6">
                <h1 class="text-3xl font-bold mb-4">Welcome to the Admin Panel</h1>
                <p class="text-gray-700">Your content goes here.</p>
            </main>
        </div>
    </div>

    <!-- Alpine.js for sidebar toggle -->
    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- DateTime Script -->
    <script>
        function updateDateTime() {
            const dt = new Date();
            const pad = n => n.toString().padStart(2, '0');
            const str = `${dt.getFullYear()}-${pad(dt.getMonth()+1)}-${pad(dt.getDate())} ${pad(dt.getHours())}:${pad(dt.getMinutes())}:${pad(dt.getSeconds())}`;
            document.getElementById('datetime').textContent = str;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</body>
</html>