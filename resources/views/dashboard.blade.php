<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body x-data="{ sidebarOpen: false, darkMode: localStorage.getItem('darkMode') === 'true' }"
    x-init="$watch('darkMode', val => { localStorage.setItem('darkMode', val); document.documentElement.classList.toggle('dark', val) })"
    :class="darkMode ? 'dark' : ''" class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen" x-cloak>
        <!-- Sidebar -->
        <div :class="sidebarOpen ? 'block' : 'hidden md:block'" 
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-md md:relative md:translate-x-0 transition-transform duration-200 flex flex-col">
            <div class="flex-1 p-6">
                <h2 class="text-2xl font-bold mb-8">Admin Panel</h2>
                <nav class="space-y-4">
                    <a href="/dashboard" class="block py-2 px-4 rounded hover:bg-gray-200">Dashboard</a>
                    <a href="/users" class="block py-2 px-4 rounded hover:bg-gray-200">Users</a>
                </nav>
            </div>
            <div class="p-6 mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full py-2 px-4 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
                </form>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col min-w-0">
            <!-- Top Navbar -->
            <header class="flex items-center justify-between bg-white shadow px-6 py-4" :class="darkMode ? 'bg-gray-900 text-white' : 'bg-white text-black'">
                <span class="text-xl font-semibold">Dashboard</span>
                <div class="flex items-center gap-4">
                    <div class="text-gray-600 font-mono" :class="darkMode ? 'text-gray-300' : 'text-gray-600'"
                        id="datetime"></div>
                    <!-- Dark Mode Switch -->
                    <button @click="darkMode = !darkMode; document.documentElement.classList.toggle('dark', darkMode)"
                        class="focus:outline-none rounded-full p-2 transition-colors" :class="darkMode ? 'bg-gray-700 text-yellow-300' : 'bg-gray-200 text-gray-700'" title="Toggle Dark Mode">
                        <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.07l-.71.71M21 12h-1M4 12H3m16.66 5.66l-.71-.71M4.05 4.93l-.71-.71M12 5a7 7 0 100 14 7 7 0 000-14z" />
                        </svg>
                        <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                            viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                        </svg>
                    </button>
                    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden ml-4 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </header>
            <!-- Page Content -->
            <main class="flex-1 p-6">            
                @yield('content', 'content here')
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
            const str = `${dt.getFullYear()}-${pad(dt.getMonth() + 1)}-${pad(dt.getDate())} ${pad(dt.getHours())}:${pad(dt.getMinutes())}:${pad(dt.getSeconds())}`;
            document.getElementById('datetime').textContent = str;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</body>

</html>