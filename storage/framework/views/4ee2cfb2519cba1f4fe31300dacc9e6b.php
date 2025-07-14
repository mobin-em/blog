<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی | وبلاگ تخصصی فناوری</title>
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
                        secondary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                        },
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
                    fontFamily: {
                        sans: ['Vazir', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

        /* استایل‌های جدید را به بخش style اضافه کنید */

        /* فرم جستجو */
        .search-results {
            max-height: 400px;
            overflow-y: auto;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .search-results a {
            display: block;
            padding: 12px 16px;
            transition: all 0.2s ease;
            color: #334155;
        }

        .dark .search-results a {
            color: #e2e8f0;
        }

        .search-results a:hover {
            background-color: #f1f5f9;
        }

        .dark .search-results a:hover {
            background-color: #1e293b;
        }

        .search-results h3 {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .search-results p {
            font-size: 14px;
            color: #64748b;
        }

        .dark .search-results p {
            color: #94a3b8;
        }

        /* ویژگی‌ها با افکت شیشه‌ای */
        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .dark .feature-card {
            background: rgba(15, 23, 42, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            background: rgba(255, 255, 255, 0.9);
        }

        .dark .feature-card:hover {
            background: rgba(15, 23, 42, 0.9);
        }

        /* انیمیشن برای فرم جستجو */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .search-results.show {
            display: block;
            animation: fadeIn 0.3s ease-out;
        }

        :root {
            --primary-500: #0ea5e9;
            --primary-600: #0284c7;
            --secondary-500: #8b5cf6;
        }

        body {
            background-color: #f8fafc;
            background-image: radial-gradient(at 0% 0%, rgba(7, 89, 133, 0.08) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(124, 58, 237, 0.08) 0px, transparent 50%);
            transition: background-color 0.3s ease;
        }

        body.dark {
            background-color: #0f172a;
            background-image: radial-gradient(at 0% 0%, rgba(56, 189, 248, 0.1) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(139, 92, 246, 0.1) 0px, transparent 50%);
            color: #e2e8f0;
        }

        .hero-gradient {
            background: linear-gradient(135deg, rgba(14, 165, 233, 0.95), rgba(123, 92, 246, 0.95));
            backdrop-filter: blur(4px);
        }

        .dark .hero-gradient {
            background: linear-gradient(135deg, rgba(2, 132, 199, 0.95), rgba(109, 40, 217, 0.95));
        }

        .feature-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
        }

        .dark .feature-card {
            background: rgba(15, 23, 42, 0.8);
            border-color: rgba(255, 255, 255, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .banner-slide {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .search-box {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
        }

        .dark .search-box {
            background: rgba(15, 23, 42, 0.9);
        }

        .search-box input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(14, 165, 233, 0.3);
        }

        .post-card {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }

        .dark .post-card {
            background: rgba(15, 23, 42, 0.9);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .sidebar {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.1);
        }

        .auth-btn {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.95));
            color: #075985;
            font-weight: 600;
        }

        .dark .auth-btn {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.95));
            color: #e0f2fe;
        }

        .auth-btn:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            background: linear-gradient(135deg, rgba(255, 255, 255, 1), rgba(255, 255, 255, 1));
        }

        .dark .auth-btn:hover {
            background: linear-gradient(135deg, rgba(30, 41, 59, 1), rgba(15, 23, 42, 1));
        }

        .user-avatar {
            transition: all 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.3);
        }

        .sidebar-toggle {
            transition: all 0.3s ease;
        }

        .sidebar-toggle:hover {
            transform: scale(1.1);
        }

        .post-tag {
            display: inline-block;
            background-color: #e0f2fe;
            color: #0369a1;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 12px;
            margin-left: 4px;
        }

        .dark .post-tag {
            background-color: #075985;
            color: #e0f2fe;
        }

        .post-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
            background-color: #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .post-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #e2e8f0 25%, #f1f5f9 50%, #e2e8f0 75%);
            background-size: 200% 200%;
            animation: shimmer 1.5s infinite;
        }

        .dark .post-image::after {
            background: linear-gradient(45deg, #1e293b 25%, #334155 50%, #1e293b 75%);
        }

        @keyframes shimmer {
            0% { background-position: 100% 0; }
            100% { background-position: -100% 0; }
        }

        .post-image.loaded::after {
            display: none;
        }

        .post-meta {
            color: #64748b;
            font-size: 14px;
        }

        .dark .post-meta {
            color: #94a3b8;
        }

        .post-title {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            line-height: 1.4;
        }

        .dark .post-title {
            color: #f1f5f9;
        }

        .post-excerpt {
            color: #475569;
            line-height: 1.6;
        }

        .dark .post-excerpt {
            color: #94a3b8;
        }

        .read-more {
            color: #0ea5e9;
            font-weight: 500;
        }

        .dark .read-more {
            color: #7dd3fc;
        }

        .banner-container {
            height: 400px;
            position: relative;
            overflow: hidden;
            border-radius: 16px;
        }

        .banner-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background-color: #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .banner-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, #e2e8f0 25%, #f1f5f9 50%, #e2e8f0 75%);
            background-size: 200% 200%;
            animation: shimmer 1.5s infinite;
        }

        .banner-image.loaded::after {
            display: none;
        }

        @keyframes shimmer {
            0% { background-position: 100% 0; }
            100% { background-position: -100% 0; }
        }

        .dark .banner-image::after {
            background: linear-gradient(45deg, #1e293b 25%, #334155 50%, #1e293b 75%);
        }

        .banner-image.loaded::after {
            display: none;
        }

        .banner-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            padding: 20px;
            color: white;
        }

        .banner-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .banner-description {
            font-size: 16px;
        }

        /* Loading spinner */
        .loader {
            width: 48px;
            height: 48px;
            border: 5px solid #e0f2fe;
            border-bottom-color: #0ea5e9;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
        }

        @keyframes rotation {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Dark mode toggle */
        .dark-mode-toggle {
            position: relative;
            width: 60px;
            height: 30px;
            border-radius: 15px;
            background: #e2e8f0;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .dark .dark-mode-toggle {
            background: #334155;
        }

        .dark-mode-toggle::before {
            content: '';
            position: absolute;
            top: 3px;
            right: 3px;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            background: #0ea5e9;
            transition: all 0.3s ease;
        }

        .dark .dark-mode-toggle::before {
            right: calc(100% - 27px);
            background: #fbbf24;
        }

        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s ease;
        }

        /* Sidebar animation */
        @keyframes slideIn {
            from { transform: translateX(100%); }
            to { transform: translateX(0); }
        }

        @keyframes slideOut {
            from { transform: translateX(0); }
            to { transform: translateX(100%); }
        }

        .sidebar-open {
            animation: slideIn 0.3s forwards;
        }

        .sidebar-close {
            animation: slideOut 0.3s forwards;
        }
    </style>
</head>
<body class="relative min-h-screen transition-all" style="margin-top: 0;">
<!-- منوی همبرگر -->
<div id="sidebar" class="sidebar fixed top-0 right-0 w-80 h-full bg-white dark:bg-dark-800 z-50 transform translate-x-full overflow-y-auto">
    <div class="p-4 border-b border-gray-200 dark:border-dark-700 flex justify-between items-center">
        <div class="text-xl font-bold text-gray-800 dark:text-white">منوی اصلی</div>
        <button id="close-sidebar" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-white">
            <span class="mdi mdi-close text-2xl"></span>
        </button>
    </div>
    <nav class="p-4">
        <ul class="space-y-3">
            <li>
                <a href="/profile" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-700 text-gray-700 dark:text-gray-300">
                    <span class="mdi mdi-account-circle-outline ml-2 text-xl"></span>
                    پروفایل کاربری
                </a>
            </li>
            <li>
                <a href="/posts" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-700 text-gray-700 dark:text-gray-300">
                    <span class="mdi mdi-book-open-variant ml-2 text-xl"></span>
                    مقالات
                </a>
            </li>
            <li>
                <a href="/about" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-700 text-gray-700 dark:text-gray-300">
                    <span class="mdi mdi-information-outline ml-2 text-xl"></span>
                    درباره ما
                </a>
            </li>
            <li>
                <a href="/contact" class="flex items-center p-3 rounded-lg hover:bg-gray-100 dark:hover:bg-dark-700 text-gray-700 dark:text-gray-300">
                    <span class="mdi mdi-email-outline ml-2 text-xl"></span>
                    تماس با ما
                </a>
            </li>
            <li class="pt-4 border-t border-gray-200 dark:border-dark-700">
                <div class="flex items-center justify-between p-3">
                    <span class="text-gray-700 dark:text-gray-300">حالت تاریک</span>
                    <button id="dark-mode-toggle" class="dark-mode-toggle"></button>
                </div>
            </li>
        </ul>
    </nav>
</div>

<!-- هدر پیشرفته -->
<header class="hero-gradient text-white shadow-lg relative">
    <div class="container mx-auto px-4 py-6">
        <nav class="flex justify-between items-center">
            <!-- دکمه همبرگر -->
            <button id="open-sidebar" class="sidebar-toggle text-white p-2 rounded-lg hover:bg-white hover:bg-opacity-10">
                <span class="mdi mdi-menu text-2xl"></span>
            </button>

            <!-- لوگو و نام سایت -->
            <div class="flex items-center">
                <span class="mdi mdi-book-open-page-variant-outline ml-2 text-3xl text-indigo-500"></span>
                <div class="text-2xl font-bold ml-4">وبلاگ تخصصی فناوری</div>
            </div>

            <!-- بخش کاربر -->
            <div class="flex items-center gap-4" id="user-auth-section">
                <!-- محتوای این بخش توسط جاوااسکریپت پر می‌شود -->
                <div class="loader"></div>
            </div>
        </nav>
    </div>

    <!-- بخش هیرو -->
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-6">به وبلاگ تخصصی ما خوش آمدید</h1>
        <p class="text-xl opacity-90 max-w-2xl mx-auto mb-8">مکانی برای یادگیری، اشتراک گذاری و کشف مطالب جدید در حوزه فناوری</p>

        <div class="max-w-4xl mx-auto px-4">
            <!-- فرم جستجو -->
            <form id="search-box" class="max-w-xl mx-auto mb-8">
                <div class="relative">
                    <input type="text" id="search-input" placeholder="جستجوی مقالات، تگ‌ها و نویسندگان..."
                           class="w-full px-4 py-3 pr-12 border-0 rounded-full focus:outline-none focus:ring-2 focus:ring-primary-500 text-gray-800 dark:text-gray-200 dark:bg-dark-700 dark:bg-opacity-70 transition-all duration-300 shadow-lg">
                    <button type="submit" class="absolute left-4 top-1/2 transform -translate-y-1/2 text-primary-500 dark:text-primary-400 hover:text-primary-600 dark:hover:text-primary-300 transition">
                        <span class="mdi mdi-magnify text-2xl"></span>
                    </button>
                </div>
            </form>

            <!-- نمایش نتایج -->
            <div id="search-results-container" class="search-results hidden max-w-xl mx-auto bg-white dark:bg-dark-700 rounded-xl shadow-xl overflow-hidden transition-all duration-300">
                <div class="p-4 border-b border-gray-200 dark:border-dark-600 flex justify-between items-center">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-gray-200">نتایج جستجو</h3>
                    <button id="close-search-results" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200">
                        <span class="mdi mdi-close text-xl"></span>
                    </button>
                </div>
                <div class="divide-y divide-gray-200 dark:divide-dark-600" id="search-results-list">
                    <!-- نتایج جستجو اینجا نمایش داده می‌شوند -->
                </div>
            </div>
        </div>
        </div>
</header>

<!-- اسلایدر بنر -->
<div class="bg-gradient-to-b from-primary-50 dark:from-dark-900 to-white dark:to-dark-800 py-8">
    <div class="container mx-auto px-4 relative">
        <div class="banner-container">
            <div class="flex h-full transition-transform duration-500" id="banner-slider">
                <!-- بنر 1 -->
                <div class="banner-slide min-w-full relative">
                    <img
                        src="<?php echo e(asset('storage/banner/photo-1629904853893-c2c8981a1dc5.jpg')); ?>"
                        alt="برنامه نویسی وب"
                        class="banner-image"
                        loading="eager"
                    >
                    <div class="banner-overlay">
                        <h3 class="text-4xl font-bold mb-4">آموزش های پیشرفته برنامه نویسی وب</h3>
                        <p class="text-xl opacity-90">یادگیری تکنولوژی های مدرن توسعه وب مانند React, Vue و Next.js</p>
                    </div>
                </div>

                <!-- بنر 2 -->
                <div class="banner-slide min-w-full relative">
                    <img
                        src="<?php echo e(asset('storage/banner/photo-1517430816045-df4b7de11d1d.jpg')); ?>"
                        alt="هوش مصنوعی"
                        class="banner-image"
                        loading="eager"
                    >
                    <div class="banner-overlay">
                        <h3 class="text-4xl font-bold mb-4">دنیای هوش مصنوعی و یادگیری ماشین</h3>
                        <p class="text-xl opacity-90">آخرین پیشرفت ها در زمینه هوش مصنوعی و کاربردهای عملی آن</p>
                    </div>
                </div>

                <!-- بنر 3 -->
                <div class="banner-slide min-w-full relative">
                    <img
                        src="<?php echo e(asset('storage/banner/photo-1551288049-bebda4e38f71.jpg')); ?>"
                        alt="داده کاوی"
                        class="banner-image"
                        loading="eager"
                    >
                    <div class="banner-overlay">
                        <h3 class="text-4xl font-bold mb-4">علم داده و تحلیل اطلاعات</h3>
                        <p class="text-xl opacity-90">تبدیل داده های خام به اطلاعات ارزشمند با تکنیک های پیشرفته</p>
                    </div>
                </div>
            </div>

            <button id="prev-banner" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 text-gray-800 p-2 rounded-full shadow-md hover:bg-opacity-100 transition dark:bg-dark-700 dark:text-white">
                <span class="mdi mdi-chevron-right text-2xl"></span>
            </button>
            <button id="next-banner" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 text-gray-800 p-2 rounded-full shadow-md hover:bg-opacity-100 transition dark:bg-dark-700 dark:text-white">
                <span class="mdi mdi-chevron-left text-2xl"></span>
            </button>

            <div class="absolute bottom-4 left-0 right-0 flex justify-center gap-2">
                <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-slide="0"></button>
                <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-slide="1"></button>
                <button class="banner-dot w-3 h-3 rounded-full bg-white bg-opacity-50 hover:bg-opacity-100 transition" data-slide="2"></button>
            </div>
        </div>
    </div>

</div>

<!-- بخش ویژگی‌ها -->
<!-- بخش ویژگی‌ها را با این کد جایگزین کنید -->
<section class="py-16 bg-gradient-to-b from-primary-50 dark:from-dark-900 to-gray-50 dark:to-dark-900">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12 text-dark-800 dark:text-white relative">
            <span class="relative inline-block">
                چرا وبلاگ ما؟
                <span class="absolute bottom-0 right-0 w-full h-1 bg-primary-500 dark:bg-primary-400 rounded-full"></span>
            </span>
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- ویژگی 1 -->
            <div class="feature-card p-8 rounded-xl">
                <div class="text-primary-600 dark:text-primary-400 mb-4 flex justify-center">
                    <div class="p-4 bg-primary-100 dark:bg-dark-700 rounded-full">
                        <span class="mdi mdi-book-open-variant text-4xl"></span>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-3 text-dark-800 dark:text-white text-center">مقالات با کیفیت</h3>
                <p class="text-dark-600 dark:text-gray-300 text-center">مطالب تخصصی و کاربردی در حوزه‌های مختلف فناوری و برنامه‌نویسی</p>
            </div>

            <!-- ویژگی 2 -->
            <div class="feature-card p-8 rounded-xl">
                <div class="text-primary-600 dark:text-primary-400 mb-4 flex justify-center">
                    <div class="p-4 bg-primary-100 dark:bg-dark-700 rounded-full">
                        <span class="mdi mdi-update text-4xl"></span>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-3 text-dark-800 dark:text-white text-center">بروزرسانی مداوم</h3>
                <p class="text-dark-600 dark:text-gray-300 text-center">محتوای جدید هر هفته اضافه می‌شود تا همیشه به روز باشید</p>
            </div>

            <!-- ویژگی 3 -->
            <div class="feature-card p-8 rounded-xl">
                <div class="text-primary-600 dark:text-primary-400 mb-4 flex justify-center">
                    <div class="p-4 bg-primary-100 dark:bg-dark-700 rounded-full">
                        <span class="mdi mdi-account-group text-4xl"></span>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-3 text-dark-800 dark:text-white text-center">جامعه فعال</h3>
                <p class="text-dark-600 dark:text-gray-300 text-center">با جامعه‌ای از متخصصان و علاقه‌مندان در ارتباط باشید</p>
            </div>
        </div>
    </div>

</section>

<!-- بخش آخرین مقالات -->
<section id="posts" class="py-16 bg-gradient-to-b from-white dark:from-dark-800 to-gray-50 dark:to-dark-900">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-12">
            <h2 class="text-3xl font-bold text-dark-800 dark:text-white">آخرین مقالات</h2>
            <a href="/posts" class="text-primary-600 dark:text-primary-400 hover:text-primary-800 dark:hover:text-primary-300 hover:underline flex items-center">
                مشاهده همه مقالات
                <span class="mdi mdi-arrow-left mr-1"></span>
            </a>
        </div>

        <div id="featured-posts" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- پست 1 -->
            <div class="post-card">

            </div>

            <!-- پست 2 -->
            <div class="post-card">
            </div>

            <!-- پست 3 -->
            <div class="post-card">
            </div>
        </div>
    </div>
</section>

<!-- فوتر پیشرفته -->
<footer class="bg-dark-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                <h3 class="text-xl font-bold mb-4">وبلاگ تخصصی فناوری</h3>
                <p class="text-gray-400 mb-4">منبعی برای یادگیری و رشد در حوزه فناوری و برنامه‌نویسی</p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><span class="mdi mdi-telegram"></span></a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><span class="mdi mdi-instagram"></span></a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><span class="mdi mdi-twitter"></span></a>
                    <a href="#" class="text-gray-400 hover:text-white transition text-xl"><span class="mdi mdi-linkedin"></span></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold mb-4">لینک‌های مفید</h4>
                <ul class="space-y-2">
                    <li><a href="/" class="text-gray-400 hover:text-white transition">صفحه اصلی</a></li>
                    <li><a href="/posts" class="text-gray-400 hover:text-white transition">مقالات</a></li>

                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">راهنمایی</h4>
                <ul class="space-y-2">
                    <li><a href="/about" class="text-gray-400 hover:text-white transition">درباره ما</a></li>
                    <li><a href="/contact" class="text-gray-400 hover:text-white transition">تماس با ما</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4">تماس با ما</h4>
                <p class="text-gray-400 mb-2 flex items-center">
                    <span class="mdi mdi-map-marker-outline ml-2"></span>
                   کرج.مهرشهر
                </p>
                <p class="text-gray-400 mb-2 flex items-center">
                    <span class="mdi mdi-email-outline ml-2"></span>
                    info@techblog.ir
                </p>
                <p class="text-gray-400 flex items-center">
                    <span class="mdi mdi-phone-outline ml-2"></span>
                   026-11111111
                </p>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-12 pt-8 text-center text-gray-400">
            <p>© ۱۴۰۲ وبلاگ تخصصی فناوری. تمام حقوق محفوظ است.</p>
        </div>
    </div>
</footer>

<!-- اسکریپت‌ها -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // مدیریت حالت تاریک
        const darkModeToggle = document.getElementById('dark-mode-toggle');
        const html = document.documentElement;

        // بررسی تنظیمات ذخیره شده کاربر
        if (localStorage.getItem('darkMode') === 'true' ||
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            html.classList.add('dark');
            localStorage.setItem('darkMode', 'true');
        } else {
            html.classList.remove('dark');
            localStorage.setItem('darkMode', 'false');
        }

        darkModeToggle.addEventListener('click', () => {
            html.classList.toggle('dark');
            localStorage.setItem('darkMode', html.classList.contains('dark'));
        });


        // مدیریت وضعیت احراز هویت کاربر
        async function checkAuthStatus() {
            const authSection = document.getElementById('user-auth-section');
            const token = localStorage.getItem('auth_token');
            const API_URL = 'http://localhost:9999';
            try {
                // نمایش loader در حین بررسی وضعیت
                authSection.innerHTML = '<div class="loader"></div>';

                // درخواست به API برای بررسی وضعیت کاربر با Fetch API
                const response = await fetch(`${API_URL}/api/me`, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',

                    },

                });

                // بررسی وضعیت پاسخ
                if (!response.ok) {
                    throw new Error('وضعیت احراز هویت نامعتبر');
                }

                // تبدیل پاسخ به JSON
                const userData = await response.json();

                // حالت کاربر لاگین کرده
                authSection.innerHTML = `
           <a href="/profile" class="user-avatar flex items-center justify-center w-10 h-10 rounded-full bg-white text-primary-600 font-bold hover:bg-gray-100 transition dark:bg-dark-700 dark:text-primary-400">
    ${userData.avatar ?
                    `<img src="${userData.avatar}" alt="پروفایل" class="w-full h-full rounded-full object-cover">` :
                    `<span class="mdi mdi-account text-xl text-gray-700 dark:text-gray-300"></span>`
                }
</a>
        `;
            } catch (error) {
                console.error('خطا در بررسی وضعیت احراز هویت:', error);

                // حالت کاربر مهمان
                authSection.innerHTML = `
            <a href="/auth" class="auth-btn px-6 py-2 rounded-lg flex items-center gap-2">
                <span class="mdi mdi-login"></span>
                ورود / ثبت نام
            </a>
        `;
            }
        }

// فراخوانی تابع هنگام بارگذاری صفحه
        document.addEventListener('DOMContentLoaded', checkAuthStatus);

        // مدیریت منوی همبرگر
        const sidebar = document.getElementById('sidebar');
        const openSidebarBtn = document.getElementById('open-sidebar');
        const closeSidebarBtn = document.getElementById('close-sidebar');

        openSidebarBtn.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-full');
            sidebar.classList.add('sidebar-open');
            sidebar.classList.remove('sidebar-close');
        });

        closeSidebarBtn.addEventListener('click', () => {
            sidebar.classList.add('sidebar-close');
            sidebar.classList.remove('sidebar-open');
            setTimeout(() => {
                sidebar.classList.add('translate-x-full');
            }, 300);
        });

        // مدیریت اسلایدر بنر
        const slider = document.getElementById('banner-slider');
        const slides = document.querySelectorAll('.banner-slide');
        const dots = document.querySelectorAll('.banner-dot');
        const prevBtn = document.getElementById('prev-banner');
        const nextBtn = document.getElementById('next-banner');

        let currentIndex = 0;
        const totalSlides = slides.length;
        let slideInterval;

        // تابع برای نمایش اسلاید جاری
        function showSlide(index) {
            // مخفی کردن همه اسلایدها
            slides.forEach(slide => {
                slide.style.display = 'none';
            });

            // نمایش اسلاید فعلی
            slides[index].style.display = 'block';

            // آپدیت نقاط فعال
            dots.forEach(dot => {
                dot.classList.remove('bg-opacity-100');
                dot.classList.add('bg-opacity-50');
            });
            dots[index].classList.add('bg-opacity-100');
            dots[index].classList.remove('bg-opacity-50');

            currentIndex = index;
        }

        // تابع برای اسلاید بعدی
        function nextSlide() {
            let newIndex = (currentIndex + 1) % totalSlides;
            showSlide(newIndex);
        }

        // تابع برای اسلاید قبلی
        function prevSlide() {
            let newIndex = (currentIndex - 1 + totalSlides) % totalSlides;
            showSlide(newIndex);
        }

        // شروع اسلایدر اتوماتیک
        function startSlider() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        // توقف اسلایدر اتوماتیک
        function stopSlider() {
            clearInterval(slideInterval);
        }

        // مقداردهی اولیه
        showSlide(0);
        startSlider();

        // رویدادها
        nextBtn.addEventListener('click', () => {
            stopSlider();
            nextSlide();
            startSlider();
        });

        prevBtn.addEventListener('click', () => {
            stopSlider();
            prevSlide();
            startSlider();
        });

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                stopSlider();
                showSlide(parseInt(dot.getAttribute('data-slide')));
                startSlider();
            });
        });

        // وقتی ماوس روی اسلایدر است، اتواسلاید متوقف شود
        slider.addEventListener('mouseenter', stopSlider);
        slider.addEventListener('mouseleave', startSlider);

        // شروع اسلاید اتوماتیک


        // بررسی وضعیت احراز هویت کاربر
        checkAuthStatus();


            const searchForm = document.getElementById('search-box');
            const searchInput = document.getElementById('search-input');
            const searchResultsContainer = document.getElementById('search-results-container');

            searchForm.addEventListener('submit', async function (e) {
                e.preventDefault();
                const title = searchInput.value.trim();

                console.log('🔎 مقدار وارد شده:', title);

                if (!title) {
                    alert('لطفاً عبارت جستجو را وارد کنید');
                    searchInput.focus();
                    return;
                }

                try {
                    searchInput.disabled = true;

                    const response = await fetch(`/search?q=${encodeURIComponent(title)}`);
                    if (!response.ok) {
                        throw new Error('خطا در ارتباط با سرور');
                    }

                    const results = await response.json();

                    // اگر فقط یک نتیجه پیدا شد → برو به صفحه پست
                    if (results.length === 1) {
                        window.location.href = `/posts/${results[0].id}`;
                        return;
                    }

                    // نمایش نتایج
                    if (results.length === 0) {
                        searchResultsContainer.innerHTML = `<p class="text-gray-500 text-center">هیچ نتیجه‌ای یافت نشد.</p>`;
                        return;
                    }

                    searchResultsContainer.innerHTML = results.map(post => `
                        <a href="/posts/${post.id}" class="block border-b p-3 hover:bg-gray-50">
                            <h3 class="font-semibold text-lg">${post.title}</h3>
                            <p class="text-sm text-gray-600">${post.content.substring(0, 100)}...</p>
                        </a>
                    `).join('');

                } catch (err) {
                    console.error(err);
                    alert('خطا در انجام جستجو');
                } finally {
                    searchInput.disabled = false;
                }
            });


        // دریافت آخرین پست‌ها
        async function fetchFeaturedPosts() {
            const postsContainer = document.getElementById('featured-posts');

            try {
                const response = await axios.get('/api/posts?per_page=3');
                postsContainer.innerHTML = '';

                response.data.data.forEach(post => {
                    const excerpt = post.content.length > 100
                        ? post.content.substring(0, 100) + '...'
                        : post.content;

                    const date = new Date(post.created_at).toLocaleDateString('fa-IR');

                    const imageUrl = post.image
                        ? `/storage/${post.image}`
                        : 'https://via.placeholder.com/600x400?text=بدون+تصویر';

                    postsContainer.innerHTML += `
                        <div class="post-card">
                            <img src="${imageUrl}" alt="${post.title}" class="post-image" onload="this.classList.add('loaded')">
                            <div class="p-6">
                                <div class="flex items-center post-meta mb-3">
                                    <span class="mdi mdi-calendar mr-1"></span>
                                    ${date}
                                    <span class="mx-2">•</span>
                                    <span class="mdi mdi-clock-outline mr-1"></span>
                                    ${post.reading_time || '۵'} دقیقه مطالعه
                                    ${post.tags && post.tags.length > 0 ? `<span class="post-tag">${post.tags[0]}</span>` : ''}
                                </div>
                                <h3 class="post-title mb-3">${post.title}</h3>
                                <p class="post-excerpt mb-4">${excerpt}</p>
                                <div class="flex justify-between items-center">
                                    <a href="/posts/${post.id}" class="read-more hover:underline">
                                        مطالعه مقاله
                                        <span class="mdi mdi-arrow-left"></span>
                                    </a>
                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                        <span class="mdi mdi-eye mr-1"></span>
                                        ${post.views || '۰'}
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                });
            } catch (error) {
                console.error('Error fetching featured posts:', error);
                postsContainer.innerHTML = `
                    <div class="col-span-full text-center py-8">
                        <p class="text-red-500">خطا در دریافت مقالات. لطفاً دوباره تلاش کنید.</p>
                        <button onclick="fetchFeaturedPosts()" class="mt-4 px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition">
                            تلاش مجدد
                        </button>
                    </div>
                `;
            }
        }

        fetchFeaturedPosts();
    });
</script>
</body>
</html>
<?php /**PATH D:\blog\laravel-blog\resources\views/home.blade.php ENDPATH**/ ?>