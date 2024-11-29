<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Navigasyon -->
        <nav class="bg-white shadow-sm fixed w-full z-50 top-0">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="/" class="text-2xl font-bold text-gray-800">Todo App</a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @if (Route::has('login'))
                            <div class="space-x-4">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900">Notlar</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Giriş Yap</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Kayıt Ol</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Sayfa İçeriği -->
        <div class="relative" style="padding-top: 120px;">
            <!-- Hero Section -->
            <main>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <!-- Hero Content -->
                    <div class="text-center py-12">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Yapılacakları Yönetmek</span>
                            <span class="block text-indigo-600">Artık Çok Kolay</span>
                        </h1>
                        <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            Günlük görevlerinizi organize edin, önceliklendirin ve takip edin. Modern ve kullanıcı dostu arayüzümüzle yapılacaklar listenizi yönetmek çok daha kolay.
                        </p>
                        <div class="mt-5 max-w-md mx-auto sm:flex sm:justify-center md:mt-8">
                            <div class="rounded-md shadow">
                                <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10">
                                    Hemen Başlayın
                                </a>
                            </div>
                            <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                                <a href="#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-indigo-600 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10">
                                    Daha Fazla Bilgi
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Features Section -->
                    <div id="features" class="py-12 bg-white">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                                <!-- Feature 1 -->
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="p-6">
                                        <div class="flex items-center">
                                            <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                            </svg>
                                            <h3 class="ml-3 text-lg font-medium text-gray-900">Kolay Organizasyon</h3>
                                        </div>
                                        <div class="mt-4 text-base text-gray-500">
                                            Görevlerinizi kategorilere ayırın, önceliklendirin ve düzenli bir şekilde yönetin.
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 2 -->
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="p-6">
                                        <div class="flex items-center">
                                            <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            <h3 class="ml-3 text-lg font-medium text-gray-900">Akıllı Hatırlatıcılar</h3>
                                        </div>
                                        <div class="mt-4 text-base text-gray-500">
                                            Önemli görevleriniz için hatırlatıcılar ayarlayın, hiçbir şeyi kaçırmayın.
                                        </div>
                                    </div>
                                </div>

                                <!-- Feature 3 -->
                                <div class="bg-white overflow-hidden shadow rounded-lg">
                                    <div class="p-6">
                                        <div class="flex items-center">
                                            <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                            <h3 class="ml-3 text-lg font-medium text-gray-900">Çoklu Cihaz Erişimi</h3>
                                        </div>
                                        <div class="mt-4 text-base text-gray-500">
                                            Tüm cihazlarınızdan görevlerinize erişin ve senkronize kalın.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white mt-12">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="text-center text-gray-500">
                        <p>&copy; 2024 Todo App. Tüm hakları saklıdır.</p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>