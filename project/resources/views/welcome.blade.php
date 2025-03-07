<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Platform</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</head>
<body>
    <div class="bg-gray-800 text-white min-h-screen">
        <!-- Navigation Bar -->
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div>
                <a href="#" class="text-2xl font-bold">BrandName</a>
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#" class="hover:text-blue-300">Dashboard</a>
                <a href="#" class="hover:text-blue-300">Product</a>
                <a href="#" class="hover:text-blue-300">Pricing</a>
                <a href="#" class="hover:text-blue-300">Contact</a>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ asset('login') }}" class="hover:text-blue-300">Login</a>
                <a href="{{ asset('register') }}" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 rounded-md flex items-center">
                    JOIN US
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-16 md:mb-0">
                <span class="text-blue-400">Welcome</span>
                <h1 class="text-5xl font-bold mt-2 mb-6">Best Learning Opportunities</h1>
                <p class="text-xl mb-8">
                    We know how large objects will act, 
                    <br>but things on a small scale
                </p>
                <div class="flex flex-col sm:flex-row">
                    <a href="#" class="bg-blue-500 hover:bg-blue-600 text-center px-6 py-3 rounded-md mr-4 mb-4 sm:mb-0">
                        Get Quote Now
                    </a>
                    <a href="#" class="border border-blue-500 hover:bg-blue-500 hover:bg-opacity-10 text-center px-6 py-3 rounded-md">
                        Learn More
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="relative z-10">
                    <img src="https://plus.unsplash.com/premium_photo-1663045272347-d62d89c5b0b1?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDF8fHxlbnwwfHx8fHw%3D" alt="Teacher with chalkboard" class="rounded-lg shadow-lg object-cover h-96">
                </div>
                <div class="absolute -bottom-10 -left-10 z-20">
                    <div class="bg-yellow-400 p-1 rounded-lg">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?q=80&w=2022&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Student" class="rounded-lg h-32 w-32 object-cover">
                    </div>
                </div>
                <div class="absolute -right-6 top-10 bg-teal-400 h-40 w-40 rounded-lg -z-10"></div>
            </div>
        </div>

        <!-- Expand/Fullscreen Button -->
        <div class="fixed bottom-8 right-8">
            <button class="bg-gray-900 p-3 rounded-lg shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5v-4m0 4h-4m4 0l-5-5" />
                </svg>
            </button>
        </div>
    </div>
</body>
</html>