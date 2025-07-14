<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>پنل مدیریت | داشبورد ادمین</title>
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
    </style>
</head>
<body class="font-sans">
<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-10 dark:bg-dark-800 dark:shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2 space-x-reverse">
            <div class="w-10 h-10 rounded-full bg-primary-500 flex items-center justify-center text-white font-bold">
                <i class="fas fa-user-shield"></i>
            </div>
            <h1 class="text-xl font-bold text-gray-800 dark:text-white">پنل مدیریت</h1>
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
    <!-- Access Denied Message (hidden by default) -->
    <div id="accessDenied" class="glass-card rounded-2xl shadow-lg p-6 text-center hidden dark:bg-dark-700 dark:text-white">
        <div class="text-danger-500 text-5xl mb-4">
            <i class="fas fa-ban"></i>
        </div>
        <h2 class="text-2xl font-bold text-gray-800 mb-2 dark:text-white">دسترسی محدود شده است</h2>
        <p class="text-gray-600 mb-4 dark:text-gray-300">شما مجوز دسترسی به این بخش را ندارید.</p>
        <a href="/" class="btn-primary px-6 py-2 rounded-lg inline-block">بازگشت به صفحه اصلی</a>
    </div>

    <!-- Admin Panel (hidden by default) -->
    <div id="adminPanel" class="hidden">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Profile -->
            <aside class="lg:w-1/4">
                <div class="glass-card rounded-2xl shadow-lg overflow-hidden dark:bg-dark-700">
                    <div class="bg-gradient-to-r from-primary-500 to-primary-700 h-24 relative">
                        <div class="absolute -bottom-12 right-1/2 transform translate-x-1/2">
                            <div class="w-24 h-24 rounded-full bg-white dark:bg-dark-800 flex items-center justify-center avatar-ring">
                                <i class="fas fa-user-shield text-3xl text-primary-600"></i>
                            </div>
                        </div>
                    </div>

                    <div class="pt-16 pb-6 px-6 text-center">
                        <h2 id="adminName" class="text-xl font-bold text-gray-800 mb-1 dark:text-white">در حال بارگذاری...</h2>
                        <p id="adminEmail" class="text-gray-500 text-sm mb-3 dark:text-gray-400">-</p>

                        <div class="bg-gray-50 rounded-lg p-4 mb-4 dark:bg-dark-600">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400">وضعیت حساب</span>
                                <span class="text-sm font-medium text-success-600">فعال</span>
                            </div>
                            <div class="progress-bar">
                                <div class="progress-fill" style="width: 100%"></div>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="bg-primary-50 rounded-lg p-3 text-center dark:bg-dark-600">
                                <div class="text-primary-600 mb-1 dark:text-primary-400"><i class="fas fa-user-shield"></i></div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">نقش کاربری</p>
                                <p class="text-sm font-medium dark:text-white">ادمین</p>
                            </div>
                            <div class="bg-primary-50 rounded-lg p-3 text-center dark:bg-dark-600">
                                <div class="text-primary-600 mb-1 dark:text-primary-400"><i class="fas fa-cog"></i></div>
                                <p class="text-xs text-gray-500 dark:text-gray-400">سطح دسترسی</p>
                                <p class="text-sm font-medium dark:text-white">کامل</p>
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
                        منوی مدیریت
                    </h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#profileSection" class="flex items-center text-gray-600 hover:text-primary-600 transition dark:text-gray-300 dark:hover:text-primary-400">
                                <i class="fas fa-user-cog ml-2"></i>
                                مدیریت پروفایل
                            </a>
                        </li>
                        <li>
                            <a href="#postsSection" class="flex items-center text-gray-600 hover:text-primary-600 transition dark:text-gray-300 dark:hover:text-primary-400">
                                <i class="fas fa-newspaper ml-2"></i>
                                مدیریت پست‌ها
                            </a>
                        </li>
                        <li>
                            <a href="#adminSection" class="flex items-center text-gray-600 hover:text-primary-600 transition dark:text-gray-300 dark:hover:text-primary-400">
                                <i class="fas fa-users-cog ml-2"></i>
                                مدیریت کاربران
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Main Admin Content -->
            <div class="lg:w-3/4">
                <!-- Admin Info Section -->
                <div id="adminInfo" class="glass-card rounded-2xl shadow-lg p-6 mb-6 hidden dark:bg-dark-700">
                    <div class="bg-primary-50 border border-primary-100 rounded-lg p-4 mb-6 animation fade-in dark:bg-dark-600 dark:border-dark-500">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 text-primary-600 dark:text-primary-400">
                                <i class="fas fa-hand-paper wave-hand text-2xl"></i>
                            </div>
                            <div class="mr-3">
                                <h3 class="text-lg font-medium text-primary-800 dark:text-primary-200">سلام <span id="adminGreetingName">ادمین</span> عزیز!</h3>
                                <p class="text-primary-600 text-sm dark:text-primary-300">به پنل مدیریت خوش آمدید. از اینجا می‌توانید تمام بخش‌های سیستم را مدیریت کنید.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="glass-card rounded-xl p-4 animation fade-in dark:bg-dark-600" style="animation-delay: 0.2s">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-primary-100 flex items-center justify-center text-primary-600 mr-3 dark:bg-dark-700 dark:text-primary-400">
                                    <i class="fas fa-user-shield"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 dark:text-white">دسترسی ادمین</h3>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">شما به تمام بخش‌های مدیریتی سیستم دسترسی کامل دارید و می‌توانید کاربران و محتوا را مدیریت کنید.</p>
                        </div>

                        <div class="glass-card rounded-xl p-4 animation fade-in dark:bg-dark-600" style="animation-delay: 0.4s">
                            <div class="flex items-center mb-3">
                                <div class="w-10 h-10 rounded-full bg-success-100 flex items-center justify-center text-success-600 mr-3 dark:bg-dark-700 dark:text-success-400">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <h3 class="font-bold text-gray-800 dark:text-white">آمار سیستم</h3>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300">در حال حاضر 128 کاربر ثبت‌نام شده و 40 پست در سیستم وجود دارد.</p>
                        </div>
                    </div>
                </div>

                <!-- Profile Management Section -->
                <section id="profileSection" class="glass-card rounded-2xl shadow-lg overflow-hidden mb-6 dark:bg-dark-700">
                    <div class="border-b border-gray-200 dark:border-dark-600">
                        <nav class="flex -mb-px">
                            <button class="tab-active py-4 px-6 text-sm font-medium dark:text-white">
                                <i class="fas fa-user-edit ml-2"></i>
                                ویرایش پروفایل
                            </button>
                            <button class="py-4 px-6 text-sm font-medium text-gray-500 hover:text-primary-600 transition dark:text-gray-400 dark:hover:text-primary-400">
                                <i class="fas fa-lock ml-2"></i>
                                تغییر رمز عبور
                            </button>
                        </nav>
                    </div>

                    <div class="p-6">
                        <!-- Name Update Form -->
                        <div class="mb-8 animation fade-in" style="animation-delay: 0.2s">
                            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center dark:text-white">
                                <i class="fas fa-user-tag ml-2 text-primary-600 dark:text-primary-400"></i>
                                تغییر نام نمایشی
                            </h2>

                            <form id="nameForm" class="space-y-5">
                                <div>
                                    <label for="newName" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">نام جدید</label>
                                    <div class="relative">
                                        <input type="text" id="newName" name="name"
                                               class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                      focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                        <div class="absolute left-3 top-3 text-gray-400 dark:text-gray-500">
                                            <i class="fas fa-user"></i>
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
                            <p id="profileMsg" class="mt-3 text-sm"></p>
                        </div>

                        <!-- Password Update Form -->
                        <div class="animation fade-in hidden" style="animation-delay: 0.4s">
                            <h2 class="text-xl font-bold text-gray-800 mb-4 flex items-center dark:text-white">
                                <i class="fas fa-key ml-2 text-primary-600 dark:text-primary-400"></i>
                                تغییر رمز عبور
                            </h2>

                            <form id="passwordForm" class="space-y-5">
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

                                <div class="pt-2">
                                    <button type="submit"
                                            class="px-6 py-3 btn-success rounded-lg flex items-center justify-center font-medium">
                                        <i class="fas fa-key ml-2"></i>
                                        تغییر رمز عبور
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>

                <!-- Posts Management Section -->
                <section id="postsSection" class="glass-card rounded-2xl shadow-lg p-6 mb-6 dark:bg-dark-700">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center dark:text-white">
                        <i class="fas fa-newspaper ml-2 text-primary-600 dark:text-primary-400"></i>
                        مدیریت پست‌ها
                    </h2>

                    <!-- Create New Post -->
                    <div class="mb-8 animation fade-in" style="animation-delay: 0.2s">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center dark:text-white">
                            <i class="fas fa-plus-circle ml-2 text-success-600 dark:text-success-400"></i>
                            ایجاد پست جدید
                        </h3>

                        <form id="createPostForm" class="space-y-5">
                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label for="postTitle" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">عنوان پست</label>
                                    <input type="text" id="postTitle" name="title" required
                                           class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                  focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                </div>

                                <div>
                                    <label for="postContent" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">محتوا</label>
                                    <textarea id="postContent" name="content" rows="4" required
                                              class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                     focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white"></textarea>
                                </div>

                                <div>
                                    <label for="postImage" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">تصویر پست (اختیاری)</label>
                                    <input type="file" id="postImage" name="image"
                                           class="w-full p-1 border border-gray-300 rounded-lg dark:bg-dark-600 dark:border-dark-500" />
                                </div>

                                <div>
                                    <label for="postStatus" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">وضعیت</label>
                                    <select id="postStatus" name="status" required
                                            class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                   focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white">
                                        <option value="published">منتشر شده</option>
                                        <option value="draft">پیش‌نویس</option>
                                    </select>
                                </div>
                            </div>

                            <div class="pt-2">
                                <button type="submit"
                                        class="px-6 py-3 btn-primary rounded-lg flex items-center justify-center font-medium">
                                    <i class="fas fa-save ml-2"></i>
                                    ایجاد پست جدید
                                </button>
                            </div>
                        </form>
                        <p id="postCreateMsg" class="mt-3 text-sm"></p>
                    </div>

                    <!-- Posts List -->
                    <div class="animation fade-in" style="animation-delay: 0.4s">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center dark:text-white">
                            <i class="fas fa-list ml-2 text-primary-600 dark:text-primary-400"></i>
                            پست‌های من
                        </h3>

                        <div class="mb-4">
                            <div class="relative">
                                <input type="text" id="searchInput" placeholder="جستجو در پست‌ها..."
                                       class="w-full p-3 pr-10 border border-gray-300 rounded-lg input-focus transition
                                              focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                <div class="absolute left-3 top-3 text-gray-400 dark:text-gray-500">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>

                        <div id="postsContainer" class="space-y-4">
                            <p class="dark:text-gray-300">در حال بارگذاری پست‌ها...</p>
                        </div>
                    </div>
                </section>

                <!-- Edit Post Section (hidden by default) -->
                <section id="editPostSection" class="glass-card rounded-2xl shadow-lg p-6 mb-6 hidden dark:bg-dark-700">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center dark:text-white">
                        <i class="fas fa-edit ml-2 text-primary-600 dark:text-primary-400"></i>
                        ویرایش پست
                    </h2>

                    <form id="editPostForm" class="space-y-5">
                        <input type="hidden" id="editPostId" name="id" />

                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="editTitle" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">عنوان پست</label>
                                <input type="text" id="editTitle" name="title" required
                                       class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                              focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                            </div>

                            <div>
                                <label for="editBody" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">محتوا</label>
                                <textarea id="editBody" name="content" rows="4" required
                                          class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                                 focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white"></textarea>
                            </div>

                            <div>
                                <label for="editStatus" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">وضعیت</label>
                                <select id="editStatus" name="status" required
                                        class="w-full p-3 border border-gray-300 rounded-lg input-focus transition
                                               focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white">
                                    <option value="published">منتشر شده</option>
                                    <option value="draft">پیش‌نویس</option>
                                </select>
                            </div>

                            <div>
                                <label for="editImage" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">تصویر جدید (اختیاری)</label>
                                <input type="file" id="editImage" name="image"
                                       class="w-full p-1 border border-gray-300 rounded-lg dark:bg-dark-600 dark:border-dark-500" />
                            </div>
                        </div>

                        <div class="flex space-x-4 space-x-reverse pt-2">
                            <button type="submit"
                                    class="px-6 py-3 btn-primary rounded-lg flex items-center justify-center font-medium">
                                <i class="fas fa-save ml-2"></i>
                                ذخیره تغییرات
                            </button>
                            <button type="button" onclick="document.getElementById('editPostSection').classList.add('hidden')"
                                    class="px-6 py-3 btn-danger rounded-lg flex items-center justify-center font-medium">
                                <i class="fas fa-times ml-2"></i>
                                انصراف
                            </button>
                        </div>
                    </form>
                    <p id="editPostMsg" class="mt-3 text-sm"></p>
                </section>

                <!-- Admin Management Section -->
                <section id="adminSection" class="glass-card rounded-2xl shadow-lg p-6 dark:bg-dark-700">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center dark:text-white">
                        <i class="fas fa-users-cog ml-2 text-primary-600 dark:text-primary-400"></i>
                        مدیریت ادمین‌ها
                    </h2>

                    <div class="animation fade-in" style="animation-delay: 0.2s">
                        <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center dark:text-white">
                            <i class="fas fa-user-plus ml-2 text-success-600 dark:text-success-400"></i>
                            افزودن ادمین جدید
                        </h3>

                        <div class="space-y-5">
                            <div>
                                <label for="newAdminEmail" class="block text-sm font-medium text-gray-700 mb-1 dark:text-gray-300">ایمیل کاربر</label>
                                <div class="flex space-x-4 space-x-reverse">
                                    <input type="email" id="newAdminEmail" placeholder="example@example.com"
                                           class="flex-1 p-3 border border-gray-300 rounded-lg input-focus transition
                                                  focus:border-primary-500 focus:ring-1 focus:ring-primary-500 dark:bg-dark-600 dark:border-dark-500 dark:text-white" />
                                    <button onclick="fetchUserInfo()"
                                            class="px-6 py-3 btn-primary rounded-lg flex items-center justify-center font-medium">
                                        <i class="fas fa-search ml-2"></i>
                                        جستجو
                                    </button>
                                </div>
                            </div>

                            <p id="makeAdminMsg" class="text-sm dark:text-gray-300"></p>

                            <!-- User Info (hidden by default) -->
                            <div id="userInfo" class="glass-card rounded-xl p-4 hidden dark:bg-dark-600">
                                <h4 class="font-medium text-gray-800 mb-3 dark:text-white">اطلاعات کاربر</h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">نام</p>
                                        <p id="userName" class="text-sm font-medium dark:text-white">---</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">ایمیل</p>
                                        <p id="userEmail" class="text-sm font-medium dark:text-white">---</p>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">نقش فعلی</p>
                                        <p id="userRole" class="text-sm font-medium dark:text-white">---</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirm Button (hidden by default) -->
                            <button id="confirmAdminBtn" onclick="makeAdmin()"
                                    class="px-6 py-3 btn-success rounded-lg flex items-center justify-center font-medium hidden">
                                <i class="fas fa-user-shield ml-2"></i>
                                تبدیل به ادمین
                            </button>
                        </div>
                    </div>
                </section>
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
                <span class="text-sm font-medium dark:text-white">پنل مدیریت</span>
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

    const token = localStorage.getItem('auth_token');
    let currentUser = null;

    async function checkAdminAccess() {
        if (!token) {
            document.getElementById('accessDenied').classList.remove('hidden');
            return;
        }

        try {
            const res = await fetch('/api/admin/check', {
                headers: { 'Authorization': `Bearer ${token}` }
            });

            if (res.status === 200) {
                document.getElementById('adminPanel').classList.remove('hidden');
                await loadAdminProfile();
                await fetchPosts();
            } else {
                document.getElementById('accessDenied').classList.remove('hidden');
            }
        } catch (e) {
            console.error('Error checking admin access:', e);
            document.getElementById('accessDenied').classList.remove('hidden');
        }
    }

    async function loadAdminProfile() {
        try {
            const res = await fetch('/api/admin/Admin_profile', {
                headers: { 'Authorization': `Bearer ${token}` }
            });

            if (!res.ok) throw new Error('Failed to load profile');

            const data = await res.json();
            currentUser = data;
            document.getElementById('adminName').textContent = data.name;
            document.getElementById('adminEmail').textContent = data.email;
            document.getElementById('adminGreetingName').textContent = data.name;
            document.getElementById('adminInfo').classList.remove('hidden');

            // Update avatar if exists
            if (data.avatar) {
                document.getElementById('adminAvatar').src = data.avatar;
            }
        } catch (error) {
            console.error('Error loading profile:', error);
            showMessage('profileMsg', 'خطا در بارگذاری پروفایل', 'error');
        }
    }

    // مدیریت ارسال فرم تغییر نام
    document.getElementById('nameForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const newName = document.getElementById('newName').value;

        try {
            const res = await fetch('/api/admin/Admin_profile/name', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({ name: newName })
            });

            const data = await res.json();

            if (res.ok) {
                showMessage('profileMsg', data.message || 'نام با موفقیت تغییر یافت', 'success');
                await loadAdminProfile();
            } else {
                showMessage('profileMsg', data.message || 'خطا در تغییر نام', 'error');
            }
        } catch (error) {
            console.error('Error updating name:', error);
            showMessage('profileMsg', 'خطا در ارتباط با سرور', 'error');
        }
    });

    // مدیریت ارسال فرم تغییر رمز عبور
    document.getElementById('passwordForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const pass = document.getElementById('newPassword').value;
        const confirm = document.getElementById('confirmPassword').value;

        if (pass !== confirm) {
            showMessage('profileMsg', 'رمزها با هم مطابقت ندارند!', 'error');
            return;
        }

        try {
            const res = await fetch('/api/admin/Admin_profile/password', {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    password: pass,
                    password_confirmation: confirm
                })
            });

            const data = await res.json();

            if (res.ok) {
                showMessage('profileMsg', data.message || 'رمز عبور با موفقیت تغییر یافت', 'success');
                document.getElementById('passwordForm').reset();
            } else {
                showMessage('profileMsg', data.message || 'خطا در تغییر رمز عبور', 'error');
            }
        } catch (error) {
            console.error('Error updating password:', error);
            showMessage('profileMsg', 'خطا در ارتباط با سرور', 'error');
        }
    });

    // مدیریت ارسال فرم ایجاد پست جدید
    document.getElementById('createPostForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);

        try {
            const res = await fetch('/api/admin/Admin_posts', {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}` },
                body: formData
            });

            const data = await res.json();

            if (res.ok) {
                showMessage('postCreateMsg', 'پست با موفقیت ایجاد شد', 'success');
                form.reset();
                await fetchPosts();
            } else {
                showMessage('postCreateMsg', data.message || 'خطا در ایجاد پست', 'error');
            }
        } catch (error) {
            console.error('Error creating post:', error);
            showMessage('postCreateMsg', 'خطا در ارتباط با سرور', 'error');
        }
    });

    // دریافت لیست پست‌های کاربر
    async function fetchPosts() {
        try {
            const search = document.getElementById('searchInput').value;
            const res = await fetch(`/api/admin/Admin_posts/mine?search=${encodeURIComponent(search)}`, {
                headers: { 'Authorization': `Bearer ${token}` }
            });

            if (!res.ok) throw new Error('Failed to fetch posts');

            const posts = await res.json();
            renderPosts(posts);
        } catch (error) {
            console.error('Error fetching posts:', error);
            showMessage('postsContainer', 'خطا در دریافت پست‌ها', 'error');
        }
    }

    // نمایش پست‌ها در صفحه
    function renderPosts(posts) {
        const container = document.getElementById('postsContainer');
        container.innerHTML = '';

        if (posts.length === 0) {
            container.innerHTML = '<p class="text-gray-500 text-center py-4 dark:text-gray-400">هیچ پستی یافت نشد</p>';
            return;
        }

        posts.forEach(post => {
            const postDiv = document.createElement('div');
            postDiv.className = 'post-item dark:bg-dark-600';
            postDiv.innerHTML = `
                <h4 class="text-lg font-medium text-gray-800 mb-2 dark:text-white">${escapeHtml(post.title)}</h4>
                <p class="text-gray-600 mb-3 dark:text-gray-300">${escapeHtml(post.content.substring(0, 100))}...</p>
                <div class="flex justify-between items-center">
                    <span class="text-sm ${post.status === 'published' ? 'text-success-600' : 'text-warning-600'}">
                        <i class="fas ${post.status === 'published' ? 'fa-check-circle' : 'fa-pen'} ml-1"></i>
                        ${escapeHtml(post.status === 'published' ? 'منتشر شده' : 'پیش‌نویس')}
                    </span>
                    <div class="flex space-x-2 space-x-reverse">
                        <button onclick="editPost('${post.id}', '${escapeHtml(post.title)}', '${escapeHtml(post.content)}', '${escapeHtml(post.status)}')"
                                class="px-4 py-2 bg-primary-500 text-white rounded-lg hover:bg-primary-600 transition">
                            <i class="fas fa-edit ml-1"></i>
                            ویرایش
                        </button>
                        <button onclick="deletePost('${post.id}')"
                                class="px-4 py-2 bg-danger-500 text-white rounded-lg hover:bg-danger-600 transition">
                            <i class="fas fa-trash ml-1"></i>
                            حذف
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(postDiv);
        });
    }

    // نمایش فرم ویرایش پست
    function editPost(id, title, content, status) {
        document.getElementById('editPostSection').classList.remove('hidden');
        document.getElementById('editPostId').value = id;
        document.getElementById('editTitle').value = title;
        document.getElementById('editBody').value = content;
        document.getElementById('editStatus').value = status;

        // اسکرول به بخش ویرایش
        document.getElementById('editPostSection').scrollIntoView({ behavior: 'smooth' });
    }

    document.getElementById('editPostForm').addEventListener('submit', async function (e) {
        e.preventDefault();
        const form = e.target;
        const formData = new FormData(form);
        const postId = document.getElementById('editPostId').value;

        try {
            const res = await fetch(`/api/admin/Admin_posts/${postId}`, {
                method: 'POST',
                headers: { 'Authorization': `Bearer ${token}` },
                body: formData
            });

            const data = await res.json();

            if (res.ok) {
                showMessage('editPostMsg', 'پست با موفقیت ویرایش شد', 'success');
                await fetchPosts();
                setTimeout(() => {
                    document.getElementById('editPostSection').classList.add('hidden');
                }, 2000);
            } else {
                showMessage('editPostMsg', data.message || 'خطا در ویرایش پست', 'error');
                if (res.status === 403) {
                    alert('شما مجاز به ویرایش این پست نیستید');
                }
            }
        } catch (error) {
            console.error('Error updating post:', error);
            showMessage('editPostMsg', 'خطا در ارتباط با سرور', 'error');
        }
    });

    // حذف پست
    async function deletePost(postId) {
        if (!confirm('آیا از حذف این پست مطمئن هستید؟ این عمل غیرقابل بازگشت است.')) {
            return;
        }

        try {
            const res = await fetch(`/api/admin/Admin_posts/${postId}`, {
                method: 'DELETE',
                headers: { 'Authorization': `Bearer ${token}` }
            });

            const data = await res.json();

            if (res.ok) {
                showToast('پست با موفقیت حذف شد', 'success');
                await fetchPosts();
            } else {
                showToast(data.message || 'خطا در حذف پست', 'error');
                if (res.status === 403) {
                    showToast('شما مجاز به حذف این پست نیستید', 'error');
                }
            }
        } catch (error) {
            console.error('Error deleting post:', error);
            showToast('خطا در ارتباط با سرور', 'error');
        }
    }

    async function fetchUserInfo() {
        const email = document.getElementById('newAdminEmail').value.trim();

        if (!email) {
            showMessage('makeAdminMsg', 'لطفا ایمیل کاربر را وارد کنید', 'error');
            return;
        }

        try {
            const res = await fetch(`/api/admin/Admin_user-info?email=${encodeURIComponent(email)}`, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            });

            const data = await res.json();

            if (res.ok) {
                // نمایش اطلاعات کاربر
                document.getElementById('userName').textContent = data.name || '---';
                document.getElementById('userEmail').textContent = data.email;
                document.getElementById('userRole').textContent = data.is_admin ? 'ادمین' : 'کاربر عادی';

                // نمایش بخش اطلاعات و دکمه تبدیل
                document.getElementById('userInfo').classList.remove('hidden');
                document.getElementById('confirmAdminBtn').classList.remove('hidden');

                showMessage('makeAdminMsg', 'اطلاعات کاربر با موفقیت دریافت شد', 'success');
            } else {
                document.getElementById('userInfo').classList.add('hidden');
                document.getElementById('confirmAdminBtn').classList.add('hidden');
                showMessage('makeAdminMsg', data.message || 'کاربر یافت نشد', 'error');
            }
        } catch (error) {
            console.error('Error fetching user info:', error);
            showMessage('makeAdminMsg', 'خطا در ارتباط با سرور', 'error');
        }
    }

    // تبدیل کاربر به ادمین
    async function makeAdmin() {
        const email = document.getElementById('newAdminEmail').value.trim();

        try {
            const res = await fetch('/api/admin/make-admin', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ email })
            });

            const data = await res.json();

            if (res.ok) {
                showMessage('makeAdminMsg', data.message || 'کاربر با موفقیت به ادمین تبدیل شد', 'success');
                document.getElementById('newAdminEmail').value = '';
                document.getElementById('userInfo').classList.add('hidden');
                document.getElementById('confirmAdminBtn').classList.add('hidden');
            } else {
                showMessage('makeAdminMsg', data.message || 'خطا در تبدیل کاربر به ادمین', 'error');
            }
        } catch (error) {
            console.error('Error making admin:', error);
            showMessage('makeAdminMsg', 'خطا در ارتباط با سرور', 'error');
        }
    };

    // تابع کمکی برای نمایش پیام
    function showMessage(elementId, message, type = 'info') {
        const element = document.getElementById(elementId);
        element.textContent = message;
        element.className = type;
        element.classList.remove('hidden');

        if (type === 'error') {
            element.classList.add('text-red-600');
            element.classList.remove('text-green-600');
        } else if (type === 'success') {
            element.classList.add('text-green-600');
            element.classList.remove('text-red-600');
        }
    }

    // تابع کمکی برای نمایش نوتیفیکیشن
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

    // تابع کمکی برای جلوگیری از XSS
    function escapeHtml(unsafe) {
        if (!unsafe) return '';
        return unsafe.toString()
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }

    // Tab switching functionality
    const tabs = document.querySelectorAll('#profileSection nav button');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('tab-active', 'text-primary-600'));
            tabs.forEach(t => t.classList.add('text-gray-500'));
            tab.classList.add('tab-active', 'text-primary-600');
            tab.classList.remove('text-gray-500');

            // Show/hide forms
            if (tab.textContent.includes('ویرایش پروفایل')) {
                document.getElementById('nameForm').parentElement.classList.remove('hidden');
                document.getElementById('passwordForm').parentElement.classList.add('hidden');
            } else {
                document.getElementById('nameForm').parentElement.classList.add('hidden');
                document.getElementById('passwordForm').parentElement.classList.remove('hidden');
            }
        });
    });

    // Logout functionality
    document.getElementById('logout-btn').addEventListener('click', () => {
        localStorage.removeItem('auth_token');
        window.location.href = '/auth';
    });

    // Search input event listener
    document.getElementById('searchInput').addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            fetchPosts();
        }
    });

    // بررسی دسترسی هنگام لود صفحه
    checkAdminAccess();
</script>
</body>
</html>
<?php /**PATH D:\blog\laravel-blog\resources\views/profile/admin.blade.php ENDPATH**/ ?>