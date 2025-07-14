<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>پروفایل من | داشبورد کاربری</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: '#1e40af',
                        success: {
                            500: '#10b981',
                            600: '#059669'
                        },
                        danger: {
                            500: '#ef4444',
                            600: '#dc2626'
                        },
                        warning: '#f59e0b',
                        dark: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        }
                    },
                    boxShadow: {
                        'glass': '0 4px 30px rgba(0, 0, 0, 0.1)',
                        'glass-dark': '0 4px 30px rgba(0, 0, 0, 0.3)',
                        'neumorphism': '8px 8px 16px #d1d9e6, -8px -8px 16px #ffffff',
                        'neumorphism-dark': '8px 8px 16px #0f172a, -8px -8px 16px #1e293b',
                        'button': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)'
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'float': 'float 6s ease-in-out infinite',
                        'wave': 'wave 1.5s linear infinite'
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        wave: {
                            '0%': { transform: 'rotate(0deg)' },
                            '10%': { transform: 'rotate(14deg)' },
                            '20%': { transform: 'rotate(-8deg)' },
                            '30%': { transform: 'rotate(14deg)' },
                            '40%': { transform: 'rotate(-4deg)' },
                            '50%': { transform: 'rotate(10deg)' },
                            '60%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(0deg)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            transition: background-color 0.3s ease;
        }

        body.dark {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: #f8fafc;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            transition: all 0.3s ease;
        }

        .dark .glass-card {
            background: rgba(30, 41, 59, 0.9);
            border: 1px solid rgba(15, 23, 42, 0.3);
        }

        .glass-card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .dark .glass-card:hover {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .avatar-ring {
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.2),
            0 0 0 8px rgba(37, 99, 235, 0.1),
            0 0 20px rgba(37, 99, 235, 0.3);
        }

        .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
            border-color: #3b82f6;
        }

        .dark .input-focus:focus {
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.4);
        }

        .progress-bar {
            height: 6px;
            border-radius: 3px;
            background-color: #e0e0e0;
        }

        .dark .progress-bar {
            background-color: #334155;
        }

        .progress-fill {
            height: 100%;
            border-radius: 3px;
            background: linear-gradient(90deg, #2563eb, #1e40af);
            transition: width 0.5s ease;
        }

        .password-strength {
            height: 4px;
            transition: all 0.3s ease;
        }

        .tab-active {
            position: relative;
            color: #2563eb;
            font-weight: 500;
        }

        .dark .tab-active {
            color: #3b82f6;
        }

        .tab-active:after {
            content: '';
            position: absolute;
            bottom: -8px;
            right: 0;
            width: 100%;
            height: 3px;
            background-color: #2563eb;
            border-radius: 3px 3px 0 0;
        }

        .dark .tab-active:after {
            background-color: #3b82f6;
        }

        .wave-hand {
            animation-name: wave;
            animation-duration: 2.5s;
            animation-iteration-count: infinite;
            transform-origin: 70% 70%;
            display: inline-block;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(37, 99, 235, 0.3), 0 2px 4px -1px rgba(37, 99, 235, 0.2);
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3), 0 4px 6px -2px rgba(37, 99, 235, 0.2);
        }

        .btn-success {
            background-color: #10b981;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3), 0 2px 4px -1px rgba(16, 185, 129, 0.2);
        }

        .btn-success:hover {
            background-color: #059669;
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3), 0 4px 6px -2px rgba(16, 185, 129, 0.2);
        }

        .btn-danger {
            background-color: #ef4444;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(239, 68, 68, 0.3), 0 2px 4px -1px rgba(239, 68, 68, 0.2);
        }

        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-1px);
            box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.3), 0 4px 6px -2px rgba(239, 68, 68, 0.2);
        }

        .toast {
            z-index: 100;
        }

        .post-item {
            background: white;
            border-radius: 0.5rem;
            padding: 1rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .dark .post-item {
            background: #1e293b;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3);
        }

        .post-item:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .dark .post-item:hover {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
        }

        .hidden {
            display: none !important;
        }

        .error {
            color: #ef4444;
        }

        .success {
            color: #10b981;
        }

        .theme-toggle {
            position: relative;
            width: 50px;
            height: 24px;
            border-radius: 12px;
            background-color: #e2e8f0;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dark .theme-toggle {
            background-color: #334155;
        }

        .theme-toggle:after {
            content: '';
            position: absolute;
            top: 2px;
            right: 2px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .dark .theme-toggle:after {
            transform: translateX(-26px);
            background-color: #0f172a;
        }

        .theme-toggle i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 12px;
            color: #64748b;
        }

        .theme-toggle .sun {
            left: 5px;
        }

        .theme-toggle .moon {
            right: 5px;
        }

        .dark .theme-toggle .sun {
            color: #f8fafc;
        }

        .dark .theme-toggle .moon {
            color: #64748b;
        }

        .activity-item {
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            transform: translateX(-5px);
        }
    </style>
</head>
<body class="font-sans">
<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-10 dark:bg-dark-800 dark:shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2 space-x-reverse">
            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold">
                <i class="fas fa-user"></i>
            </div>
            <h1 class="text-xl font-bold text-gray-800 dark:text-white">داشبورد کاربری</h1>
        </div>
        <div class="flex items-center space-x-6 space-x-reverse">
            <div class="flex items-center space-x-2 space-x-reverse">
                <span class="text-sm text-gray-600 dark:text-gray-300">حالت تاریک</span>
                <div class="theme-toggle" id="themeToggle">
                    <i class="fas fa-sun sun"></i>
                    <i class="fas fa-moon moon"></i>
                </div>
            </div>
            <nav>
                <ul class="flex space-x-6 space-x-reverse">
                    <li><a href="/" class="text-gray-600 hover:text-primary-600 transition dark:text-gray-300 dark:hover:text-primary-400"><i class="fas fa-home ml-1"></i> خانه</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Sidebar Profile -->
        <aside class="lg:w-1/4">
            <div class="glass-card rounded-2xl shadow-lg overflow-hidden dark:bg-dark-700">
                <div class="bg-gradient-to-r from-primary-500 to-primary-700 h-24 relative">
                    <div class="absolute -bottom-12 right-1/2 transform translate-x-1/2">
                        <div class="w-24 h-24 rounded-full bg-white dark:bg-dark-800 flex items-center justify-center avatar-ring">
                            <i class="fas fa-user text-3xl text-primary-600 dark:text-primary-400"></i>
                        </div>
                    </div>
                </div>

                <div class="pt-16 pb-6 px-6 text-center">
                    <h2 id="name" class="text-xl font-bold text-gray-800 mb-1 dark:text-white">در حال بارگذاری...</h2>
                    <p id="email" class="text-gray-500 text-sm mb-3 dark:text-gray-400">-</p>

                    <div class="bg-gray-50 rounded-lg p-4 mb-4 dark:bg-dark-600">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm text-gray-500 dark:text-gray-400">تکمیل پروفایل</span>
                            <span class="text-sm font-medium">100%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: 100%"></div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div class="bg-primary-50 rounded-lg p-3 text-center dark:bg-dark-600">
                            <div class="text-primary-600 mb-1 dark:text-primary-400"><i class="fas fa-calendar-alt"></i></div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">تاریخ عضویت</p>
                            <p id="joined" class="text-sm font-medium dark:text-white">-</p>
                        </div>
                        <div class="bg-primary-50 rounded-lg p-3 text-center dark:bg-dark-600">
                            <div class="text-primary-600 mb-1 dark:text-primary-400"><i class="fas fa-user-check"></i></div>
                            <p class="text-xs text-gray-500 dark:text-gray-400">وضعیت</p>
                            <p class="text-sm font-medium dark:text-white">فعال</p>
                        </div>
                    </div>

                    <button id="logout-btn" class="w-full py-2 btn-danger rounded-lg flex items-center justify-center font-medium">
                        <i class="fas fa-sign-out-alt ml-2"></i>
                        خروج از حساب
                    </button>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="glass-card rounded-2xl shadow-lg p-6 mt-6 dark:bg-dark-700">
                <h3 class="font-bold text-gray-800 mb-4 flex items-center dark:text-white">
                    <i class="fas fa-link ml-2 text-primary-600 dark:text-primary-400"></i>
                    لینک‌های سریع
                </h3>
                <ul class="space-y-3">
                    <li>
                        <a href="#" class="flex items-center text-gray-600 hover:text-primary-600 transition dark:text-gray-300 dark:hover:text-primary-400">
                            <i class="fas fa-tachometer-alt ml-2"></i>
                            تماس با ما
                        </a>
                    </li>

                    <li>
                        <a href="/posts" class="flex items-center text-gray-600 hover:text-primary-600 transition dark:text-gray-300 dark:hover:text-primary-400">
                            <i class="fas fa-heart ml-2"></i>
                           مقالات
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Profile Content -->
        <div class="lg:w-3/4">
            <div class="glass-card rounded-2xl shadow-lg overflow-hidden dark:bg-dark-700">
                <!-- Tabs -->
                <div class="border-b border-gray-200 dark:border-dark-600">
                    <nav class="flex -mb-px">
                        <button class="tab-active py-4 px-6 text-sm font-medium dark:text-white">
                            <i class="fas fa-user-edit ml-2"></i>
                            پروفایل کاربری
                        </button>
                        <button class="py-4 px-6 text-sm font-medium text-gray-500 hover:text-primary-600 transition dark:text-gray-400 dark:hover:text-primary-400">
                            <i class="fas fa-lock ml-2"></i>
                            امنیت و رمز عبور
                        </button>
                    </nav>
                </div>

                <!-- Tab Content -->
                <div class="p-6">
                    <!-- Welcome Message -->
                    <div class="bg-primary-50 border border-primary-100 rounded-lg p-4 mb-6 animation fade-in dark:bg-dark-600 dark:border-dark-500">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 text-primary-600 dark:text-primary-400">
                                <i class="fas fa-hand-paper wave-hand text-2xl"></i>
                            </div>
                            <div class="mr-3">
                                <h3 class="text-lg font-medium text-primary-800 dark:text-primary-200">سلام <span id="greeting-name">کاربر</span> عزیز!</h3>
                                <p class="text-primary-600 text-sm dark:text-primary-300">خوش آمدید به پنل کاربری شما. می‌توانید اطلاعات شخصی خود را در اینجا مدیریت کنید.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Update Form -->
                    <div class="mb-8 animation fade-in" style="animation-delay: 0.2s">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center dark:text-white">
                            <i class="fas fa-user-cog ml-2 text-primary-600 dark:text-primary-400"></i>
                            اطلاعات شخصی
                        </h2>

                        <form id="update-profile-form" class="space-y-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="newName" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">نام کامل</label>
                                    <div class="relative">
                                        <input id="newName" name="name"
                                               class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                      focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                        <div class="absolute left-3 top-3 text-gray-400 dark:text-gray-500">
                                            <i class="fas fa-user"></i>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">ایمیل</label>
                                    <div class="relative">
                                        <input id="email-display" disabled
                                               class="w-full p-3 border border-gray-300 rounded-lg bg-gray-100 dark:bg-dark-600 dark:border-dark-500 dark:text-gray-300" />
                                        <div class="absolute left-3 top-3 text-gray-400 dark:text-gray-500">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <button type="submit"
                                        class="px-6 py-3 btn-primary rounded-lg flex items-center justify-center font-medium">
                                    <i class="fas fa-save ml-2"></i>
                                    ذخیره تغییرات
                                </button>
                            </div>
                        </form>
                        <p id="profile-message" class="mt-3 text-sm text-center hidden"></p>
                    </div>

                    <!-- Password Update Form -->
                    <div class="animation fade-in hidden" style="animation-delay: 0.4s">
                        <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center dark:text-white">
                            <i class="fas fa-key ml-2 text-primary-600 dark:text-primary-400"></i>
                            تغییر رمز عبور
                        </h2>

                        <form id="update-password-form" class="space-y-5">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="currentPassword" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">رمز عبور فعلی</label>
                                    <div class="relative">
                                        <input type="password" id="currentPassword" name="current_password"
                                               class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                      focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                        <div class="absolute left-3 top-3 text-gray-400 dark:text-gray-500">
                                            <i class="fas fa-lock"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="md:col-span-2">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label for="newPassword" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">رمز عبور جدید</label>
                                            <div class="relative">
                                                <input type="password" id="newPassword" name="password"
                                                       class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                              focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                                <div class="absolute left-3 top-3 text-gray-400 dark:text-gray-500">
                                                    <i class="fas fa-key"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <label for="confirmPassword" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">تکرار رمز عبور جدید</label>
                                            <div class="relative">
                                                <input type="password" id="confirmPassword" name="password_confirmation"
                                                       class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                              focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                                <div class="absolute left-3 top-3 text-gray-400 dark:text-gray-500">
                                                    <i class="fas fa-key"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <p class="text-sm text-gray-600 mb-2 dark:text-gray-300">قدرت رمز عبور:</p>
                                        <div class="grid grid-cols-4 gap-2 mb-1">
                                            <div class="password-strength bg-gray-200 rounded dark:bg-dark-500" id="strength-1"></div>
                                            <div class="password-strength bg-gray-200 rounded dark:bg-dark-500" id="strength-2"></div>
                                            <div class="password-strength bg-gray-200 rounded dark:bg-dark-500" id="strength-3"></div>
                                            <div class="password-strength bg-gray-200 rounded dark:bg-dark-500" id="strength-4"></div>
                                        </div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400" id="password-hint">حداقل 8 کاراکتر شامل حروف بزرگ، کوچک و اعداد</p>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                        class="px-6 py-3 btn-success rounded-lg flex items-center justify-center font-medium">
                                    <i class="fas fa-key ml-2"></i>
                                    تغییر رمز عبور
                                </button>
                            </div>
                        </form>
                        <p id="password-message" class="mt-3 text-sm text-center hidden"></p>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="glass-card rounded-2xl shadow-lg p-6 mt-6 animation fade-in dark:bg-dark-700" style="animation-delay: 0.6s">
                <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center dark:text-white">
                    <i class="fas fa-history ml-2 text-primary-600 dark:text-primary-400"></i>
                    فعالیت‌های اخیر
                </h2>

                <div class="space-y-4">
                    <div class="flex items-start activity-item">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 dark:bg-dark-600 dark:text-primary-400">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <div class="mr-3">
                            <p class="text-sm font-medium text-gray-800 dark:text-white">ورود به حساب کاربری</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">امروز، ۱۴:۳۰</p>
                        </div>
                    </div>

                    <div class="flex items-start activity-item">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-success-100 flex items-center justify-center text-success-600 dark:bg-dark-600 dark:text-success-400">
                            <i class="fas fa-key"></i>
                        </div>
                        <div class="mr-3">
                            <p class="text-sm font-medium text-gray-800 dark:text-white">تغییر رمز عبور</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">دیروز، ۰۹:۱۵</p>
                        </div>
                    </div>

                    <div class="flex items-start activity-item">
                        <div class="flex-shrink-0 h-10 w-10 rounded-full bg-warning-100 flex items-center justify-center text-warning-600 dark:bg-dark-600 dark:text-warning-400">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <div class="mr-3">
                            <p class="text-sm font-medium text-gray-800 dark:text-white">به‌روزرسانی پروفایل</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">۳ روز پیش، ۱۶:۴۵</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="bg-white border-t mt-12 dark:bg-dark-800 dark:border-dark-700">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="flex items-center space-x-2 space-x-reverse mb-4 md:mb-0">
                <div class="w-8 h-8 rounded-full bg-primary-500 flex items-center justify-center text-white">
                    <i class="fas fa-user-tie text-sm"></i>
                </div>
                <span class="text-sm font-medium dark:text-white">پروفایل کاربری</span>
            </div>
            <div class="text-sm text-gray-500 dark:text-gray-400">
                © 2023 تمام حقوق محفوظ است.
            </div>
        </div>
    </div>
</footer>

<script>
    // مدیریت حالت تاریک و روشن
    const themeToggle = document.getElementById('themeToggle');
    const prefersDarkScheme = window.matchMedia('(prefers-color-scheme: dark)');
    const currentTheme = localStorage.getItem('theme');

    // اعمال تم اولیه
    if (currentTheme === 'dark' || (!currentTheme && prefersDarkScheme.matches)) {
        document.body.classList.add('dark');
    }

    // تغییر تم با کلیک روی دکمه
    themeToggle.addEventListener('click', () => {
        document.body.classList.toggle('dark');
        const newTheme = document.body.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem('theme', newTheme);
    });

    // Check authentication
    const token = localStorage.getItem('auth_token');
    if (!token) window.location.href = '/auth';

    // Load user data
    fetch('/api/me', {
        headers: { 'Authorization': `Bearer ${token}` }
    })
        .then(res => res.json())
        .then(data => {
            const user = data.user;

            if (user.is_admin === 1) {
                window.location.href = '/profile_A';
                return;
            }

            // Update profile info
            document.getElementById('name').innerText = user.name;
            document.getElementById('greeting-name').innerText = user.name;
            document.getElementById('email').innerText = user.email;
            document.getElementById('email-display').value = user.email;
            document.getElementById('joined').innerText = new Date(user.created_at).toLocaleDateString('fa-IR');
            document.getElementById('newName').value = user.name;

            // Update avatar if exists
            if (user.avatar) {
                document.getElementById('avatar').src = user.avatar;
            }
        })
        .catch(error => {
            console.error('Error fetching user data:', error);
            showToast('خطا در دریافت اطلاعات کاربر', 'error');
        });

    // Profile update form
    document.getElementById('update-profile-form').addEventListener('submit', async e => {
        e.preventDefault();
        const name = document.getElementById('newName').value;
        const messageElement = document.getElementById('profile-message');

        try {
            const res = await fetch('/api/profile/update', {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ name })
            });

            if (res.ok) {
                messageElement.textContent = 'اطلاعات با موفقیت به‌روزرسانی شد';
                messageElement.classList.remove('hidden', 'text-red-600');
                messageElement.classList.add('text-green-600');
                document.getElementById('name').innerText = name;
                document.getElementById('greeting-name').innerText = name;
                showToast('اطلاعات با موفقیت به‌روزرسانی شد', 'success');
            } else {
                const errorData = await res.json();
                throw new Error(errorData.message || 'Update failed');
            }
        } catch (error) {
            messageElement.textContent = error.message || 'خطا در به‌روزرسانی اطلاعات';
            messageElement.classList.remove('hidden', 'text-green-600');
            messageElement.classList.add('text-red-600');
            console.error('Update error:', error);
        } finally {
            setTimeout(() => {
                messageElement.classList.add('hidden');
            }, 5000);
        }
    });

    // Password strength checker
    document.getElementById('newPassword').addEventListener('input', function() {
        const password = this.value;
        const strengthBars = [
            document.getElementById('strength-1'),
            document.getElementById('strength-2'),
            document.getElementById('strength-3'),
            document.getElementById('strength-4')
        ];
        const hint = document.getElementById('password-hint');

        // Reset
        strengthBars.forEach(bar => {
            bar.style.backgroundColor = '';
        });

        if (password.length === 0) {
            hint.textContent = 'حداقل 8 کاراکتر شامل حروف بزرگ، کوچک و اعداد';
            hint.className = 'text-xs text-gray-500 dark:text-gray-400';
            return;
        }

        // Check password strength
        let strength = 0;

        // Length
        if (password.length >= 8) strength++;
        if (password.length >= 12) strength++;

        // Complexity
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[^A-Za-z0-9]/.test(password)) strength++;

        // Cap at 4
        strength = Math.min(strength, 4);

        // Update UI
        for (let i = 0; i < strength; i++) {
            if (i < 2) {
                strengthBars[i].style.backgroundColor = '#ef4444'; // red
            } else if (i < 3) {
                strengthBars[i].style.backgroundColor = '#f59e0b'; // yellow
            } else {
                strengthBars[i].style.backgroundColor = '#10b981'; // green
            }
        }

        // Update hint
        if (strength <= 2) {
            hint.textContent = 'رمز عبور ضعیف است. از حروف بزرگ، کوچک و اعداد استفاده کنید.';
            hint.className = 'text-xs text-red-600';
        } else if (strength === 3) {
            hint.textContent = 'رمز عبور متوسط است. می‌توانید قوی‌تر کنید.';
            hint.className = 'text-xs text-yellow-500';
        } else {
            hint.textContent = 'رمز عبور قوی است. عالی!';
            hint.className = 'text-xs text-green-600';
        }
    });

    // Password update form
    document.getElementById('update-password-form').addEventListener('submit', async e => {
        e.preventDefault();

        const currentPassword = document.getElementById('currentPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        const messageElement = document.getElementById('password-message');

        // Basic validation
        if (!currentPassword || !newPassword || !confirmPassword) {
            messageElement.textContent = 'لطفاً تمام فیلدها را پر کنید';
            messageElement.classList.remove('hidden', 'text-green-600');
            messageElement.classList.add('text-red-600');
            return;
        }

        if (newPassword !== confirmPassword) {
            messageElement.textContent = 'رمز عبور جدید و تکرار آن مطابقت ندارند';
            messageElement.classList.remove('hidden', 'text-green-600');
            messageElement.classList.add('text-red-600');
            return;
        }

        if (newPassword.length < 8) {
            messageElement.textContent = 'رمز عبور جدید باید حداقل 8 کاراکتر باشد';
            messageElement.classList.remove('hidden', 'text-green-600');
            messageElement.classList.add('text-red-600');
            return;
        }

        try {
            const res = await fetch('/api/profile/password', {
                method: 'PUT',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    current_password: currentPassword,
                    password: newPassword,
                    password_confirmation: confirmPassword
                })
            });

            const data = await res.json();

            if (res.ok) {
                messageElement.textContent = 'رمز عبور با موفقیت تغییر کرد';
                messageElement.classList.remove('hidden', 'text-red-600');
                messageElement.classList.add('text-green-600');
                document.getElementById('update-password-form').reset();
                // Reset strength bars
                document.querySelectorAll('.password-strength').forEach(bar => {
                    bar.style.backgroundColor = '';
                });
                document.getElementById('password-hint').textContent = 'حداقل 8 کاراکتر شامل حروف بزرگ، کوچک و اعداد';
                document.getElementById('password-hint').className = 'text-xs text-gray-500 dark:text-gray-400';
                showToast('رمز عبور با موفقیت تغییر کرد', 'success');
            } else {
                throw new Error(data.message || 'Password update failed');
            }
        } catch (error) {
            messageElement.textContent = error.message || 'خطا در تغییر رمز عبور';
            messageElement.classList.remove('hidden', 'text-green-600');
            messageElement.classList.add('text-red-600');
            console.error('Password update error:', error);
        } finally {
            setTimeout(() => {
                messageElement.classList.add('hidden');
            }, 5000);
        }
    });

    // Logout
    document.getElementById('logout-btn').addEventListener('click', async () => {
        try {
            const res = await fetch('/api/logout', {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}` }
            });

            if (res.ok) {
                localStorage.removeItem('auth_token');
                window.location.href = '/auth';
            } else {
                throw new Error('Logout failed');
            }
        } catch (error) {
            console.error('Logout error:', error);
            showToast('خطا در خروج از حساب', 'error');
        }
    });

    // Toast notification function
    function showToast(message, type = 'info') {
        const toastContainer = document.createElement('div');
        toastContainer.className = 'fixed bottom-6 left-6 md:left-auto md:right-6 z-50';

        const toast = document.createElement('div');
        toast.className = `toast px-6 py-3 rounded-lg shadow-lg text-white font-medium flex items-center
                          ${type === 'success' ? 'bg-success-500' :
            type === 'error' ? 'bg-danger-500' : 'bg-primary-500'} animate__animated animate__fadeInUp`;
        toast.innerHTML = `
            <i class="fas ${type === 'success' ? 'fa-check-circle' :
            type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'} ml-2"></i>
            ${message}
        `;

        toastContainer.appendChild(toast);
        document.body.appendChild(toastContainer);

        setTimeout(() => {
            toast.classList.add('animate__fadeOutDown');
            setTimeout(() => {
                toast.remove();
                toastContainer.remove();
            }, 500);
        }, 3000);
    }

    // Tab switching functionality
    const tabs = document.querySelectorAll('nav button');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('tab-active', 'text-primary-600', 'dark:text-primary-400'));
            tabs.forEach(t => t.classList.add('text-gray-500', 'dark:text-gray-400'));
            tab.classList.add('tab-active', 'text-primary-600', 'dark:text-primary-400');
            tab.classList.remove('text-gray-500', 'dark:text-gray-400');

            // Show/hide forms
            if (tab.textContent.includes('پروفایل')) {
                document.getElementById('update-profile-form').parentElement.classList.remove('hidden');
                document.getElementById('update-password-form').parentElement.classList.add('hidden');
            } else {
                document.getElementById('update-profile-form').parentElement.classList.add('hidden');
                document.getElementById('update-password-form').parentElement.classList.remove('hidden');
            }
        });
    });
</script>
</body>
</html>
<?php /**PATH D:\blog\laravel-blog\resources\views/profile/show.blade.php ENDPATH**/ ?>