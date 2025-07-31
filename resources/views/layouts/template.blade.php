<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('pageTitle', 'Tracker App')</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
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
                        <a href="{{route('dashboard')}}"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
                        </a>
                    </li>
                    {{-- Attendance button --}}
                    <li class="mb-2">
                        <a href="{{route('attendance')}}"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-calendar-check mr-3"></i> Attendance
                        </a>
                    </li>
                    {{-- Managing Button --}}

                    <li class="mb-2" x-data="{ open: false }">
                        <input type="checkbox" id="mobileClassManagementCheckbox" class="hidden peer" x-model="open">
                        <label for="mobileClassManagementCheckbox"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200 w-full text-left cursor-pointer select-none"
                            @click="open = !open">
                            <i class="fas fa-chalkboard-teacher mr-3"></i> Managing
                            <i class="fas fa-chevron-right ml-auto transition-transform duration-300 ease-in-out transform"
                                :class="{ 'rotate-90': open, 'rotate-': !open }"></i>
                        </label>
                        <ul x-show="open" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-y-95 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 scale-y-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 scale-y-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 scale-y-95 transform -translate-y-2"
                            class="pl-8 mt-1 origin-top">
                            <li class="mb-1">
                                <a href="{{route('manage.class')}}"
                                    class="flex items-center p-2 rounded-lg text-white text-sm hover:bg-purple-700 transition-colors duration-200">Manage
                                    Class</a>
                            </li>
                            <li class="mb-1">
                                <a href="{{route('manage.student')}}"
                                    class="flex items-center p-2 rounded-lg text-white text-sm hover:bg-purple-700 transition-colors duration-200">Manage
                                    Students</a>
                            </li>
                        </ul>
                    </li>
                    {{-- Report Button --}}
                    <li class="mb-2">
                        <a href="{{route('report')}}"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-chart-bar mr-3"></i> Report
                        </a>
                    </li>
                    {{-- QR Generate button --}}
                    <li class="mb-2">
                        <a href="{{route('qr.generate')}}"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fas fa-qrcode mr-3"></i> QR Generator
                        </a>
                    </li>
                    {{-- Student button --}}
                    <li class="mb-2">
                        <a href="{{route('studentlist')}}"
                            class="flex items-center p-3 rounded-lg hover:bg-purple-700 transition-colors duration-200">
                            <i class="fa-solid fa-user mr-3 "></i>Student List
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
                            class="text-purple-700 font-bold">Teacher</span>
                    </span>
                    <button
                        class="px-5 py-2 bg-purple-600 text-white rounded-full shadow-md hover:bg-purple-700 transition-colors duration-200">Profile</button>
                </div>
            </div>

            <!-- Main Content Area - Yielded by child views -->
            <div id="content" class="flex-1 p-8 bg-gray-50 ">
                <h1 class="text-3xl md:text-4xl font-extrabold text-violet-800 mb-6 text-center">
                    Student Attendance
                </h1>
                @yield('content')
            </div>
        </div>
    </div>
    @yield('popup')
</body>
@yield('scripts')
</html>
