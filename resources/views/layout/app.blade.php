<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<title>@yield('title')</title>

<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <div id="sidebar"
        class="fixed inset-y-0 left-0 w-64 bg-gray-800 text-white transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out lg:static lg:w-64 lg:h-screen">
        <div class="p-4 text-2xl font-bold border-b border-gray-700">
            @auth
                {{ Auth::user()->name }}
            @endauth
        </div>
        <nav class="mt-5">
            <ul>
                <a href="/">
                    <li class="p-4 {{ request()->is('/') ? 'bg-indigo-400' : '' }} hover:bg-gray-700">
                        Dashboard
                    </li>
                </a>

                @can('read-role')
                    <a href="/roles">
                        <li class="p-4 {{ request()->is('roles*') ? 'bg-indigo-400' : '' }} hover:bg-gray-700">
                            Roles
                        </li>
                    </a>
                @endcan

                @can('read-user')
                    <a href="/users">
                        <li class="p-4 {{ request()->is('users*') ? 'bg-indigo-400' : '' }} hover:bg-gray-700">
                            Users
                        </li>
                    </a>
                @endcan
                <a href="/logout">
                    <li class="p-4  hover:bg-gray-700">
                        Logout
                    </li>
                </a>
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col ml-0 ">

        <!-- Mobile Navbar -->
        <div class="lg:hidden bg-white shadow p-4 fixed w-full top-0 z-10 flex justify-between items-center">
            <div class="text-xl font-semibold">
                {{ Auth()->user()->name }}

            </div>
            <button id="sidebar-toggle" class="text-gray-600 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
            </button>
        </div>


        <!-- Desktop Navbar -->
        <div class="hidden lg:block bg-white shadow p-4 fixed w-full top-0 z-10">
            <div class="flex justify-between items-center">
                <div class="text-xl font-semibold">User-Role-Management</div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="p-8 my-2">

            @yield('content')

        </div>
    </div>

    <!-- Mobile Sidebar -->
    <div id="mobile-sidebar"
        class="fixed inset-0 bg-gray-800 text-white transform -translate-x-full lg:hidden transition-transform duration-300 ease-in-out">
        <div class="p-4 text-2xl font-bold border-b border-gray-700">
            {{ Auth()->user()->name }}
        </div>
        <nav class="mt-5">
            <ul>
                <a href="/">
                    <li class="p-4 {{ request()->is('/') ? 'bg-indigo-400' : '' }} hover:bg-gray-700">
                        Dashboard
                    </li>
                </a>

                @can('read-role')
                    <a href="/roles">
                        <li class="p-4 {{ request()->is('roles*') ? 'bg-indigo-400' : '' }} hover:bg-gray-700">
                            Roles
                        </li>
                    </a>
                @endcan

                @can('read-user')
                    <a href="/users">
                        <li class="p-4 {{ request()->is('users*') ? 'bg-indigo-400' : '' }} hover:bg-gray-700">
                            Users
                        </li>
                    </a>
                @endcan
                <a href="/logout">
                    <li class="p-4  hover:bg-gray-700">
                        Logout
                    </li>
                </a>
            </ul>
        </nav>
    </div>

    <script>
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            const sidebar = document.getElementById('mobile-sidebar');
            sidebar.classList.toggle('-translate-x-full');
        });
    </script>


</body>

</html>
