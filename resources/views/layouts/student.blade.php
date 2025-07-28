<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle', 'Tracker App')</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('styleBlock')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div id="wrapper" class="flex min-h-screen bg-gray-50">

        <!-- Left Sidebar (Desktop View) -->
        <div id="left" class="w-72 bg-purple-900 text-white p-6 shadow-lg flex-col rounded-r-lg hidden md:flex">
            <h1 class="text-2xl font-semibold mb-8">Tracker App</h1>
            <nav class="flex-grow">
                <ul>
                    {{-- Dashboard Button --}}
                    <li class="mb-2">
                        <a href="#"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                        </a>
                    </li>
                    {{-- Scan button --}}
                    <li class="mb-2">
                        <a href="#"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-qrcode mr-3"></i> Scan
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Right Content Area -->
        <div id="right" class="flex-1 flex flex-col md:ml-72">
            <!-- Right Header -->
            <div id="rightHeader" class="flex justify-end items-center p-6 bg-white border-b border-gray-200 shadow-sm">
                <div class="user-info flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">Current Role: <span
                            class="text-purple-700 font-bold">Student</span>
                    </span>
                    <button
                        class="px-5 py-2 bg-purple-600 text-white rounded-full shadow-md hover:bg-purple-700 transition-colors duration-200">Profile</button>
                </div>
            </div>

            <!-- Main Content Area - Yielded by child views -->
            <div id="content" class="flex-1 p-8 bg-gray-50 ">
                <h1 class="text-3xl md:text-4xl font-extrabold text-violet-800 mb-6 text-center">
                    @yield('rightTitle')
                </h1>
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>
