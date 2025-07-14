<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نمایش پست | وبلاگ تخصصی فناوری</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.9.96/css/materialdesignicons.min.css" rel="stylesheet">
    <style>
        :root {
            --text-primary: #111827;
            --text-secondary: #374151;
            --bg-primary: #ffffff;
            --bg-secondary: #f3f4f6;
            --border-color: #e5e7eb;
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --accent: #ec4899;
        }

        .loading-skeleton {
            background: linear-gradient(90deg,
            var(--bg-secondary) 25%,
            var(--border-color) 50%,
            var(--bg-secondary) 75%);
        }
        .dark .prose img {
            filter: brightness(0.9);
        }

        .dark {
            --text-primary: #f3f4f6;
            --text-secondary: #e5e7eb;
            --bg-primary: #0f172a;
            --bg-secondary: #1e293b;
            --border-color: #374151;
        }
        .btn-primary:focus,
        .btn-secondary:focus,
        textarea:focus {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }


        .dark .btn-secondary {
            background: rgba(99, 102, 241, 0.25);
            color: #e0e7ff;
        }

        .dark .tag {
            background: rgba(99, 102, 241, 0.25);
            color: #e0e7ff;
        }

        body, .prose, .btn-secondary, .tag {
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .dark .prose pre {
            background: #1a2236;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .dark .prose code {
            background: rgba(99, 102, 241, 0.25);
            color: #c7d2fe;
        }

        body {
            background-color: rgba(15, 23, 42, 0.8);
            background-image:
                radial-gradient(at 10% 10%, rgba(99, 102, 241, 0.05) 0px, transparent 50%),
                radial-gradient(at 90% 90%, rgba(168, 85, 247, 0.05) 0px, transparent 50%);
            min-height: 100vh;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-family: 'Vazir', sans-serif;
            line-height: 1.6;
        }

        body.dark {
            background-color: var(--dark-900);
            background-image:
                radial-gradient(at 10% 10%, rgba(99, 102, 241, 0.1) 0px, transparent 50%),
                radial-gradient(at 90% 90%, rgba(168, 85, 247, 0.1) 0px, transparent 50%);
            color: #e2e8f0;
        }

        .glass-header {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .dark .glass-header {
            background: rgba(15, 23, 42, 0.92);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .post-container {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(236, 227, 227, 0.6);
            transition: all 0.3s ease;
        }

        .dark .post-container {
            background: rgba(15, 23, 42, 0.98);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .sidebar-card {
            background: rgba(27, 43, 77, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .dark .sidebar-card {
            background: rgba(15, 23, 42, 0.96);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .related-post {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: rgba(255, 255, 255, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }

        .dark .related-post {
            background: rgba(30, 41, 59, 0.92);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .related-post:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.08);
        }

        .comment-card {
            background: rgba(255, 255, 255, 0.94);
            border-radius: 12px;
            border: 1px solid rgba(0, 0, 0, 0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .comment-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
        }

        .dark .comment-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }

        .dark .comment-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .admin-badge {
            background: linear-gradient(135deg, #ec4899, #8b5cf6);
            color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .user-badge {
            background: rgba(99, 102, 241, 0.12);
            color: #6366f1;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .dark .user-badge {
            background: rgba(99, 102, 241, 0.25);
            color: #a5b4fc;
        }

        .loading-skeleton {
            animation: pulse 2s infinite ease-in-out;
            background: linear-gradient(90deg, #f3f4f6 25%, #e5e7eb 50%, #f3f4f6 75%);
            background-size: 200% 100%;
        }

        .dark .loading-skeleton {
            background: linear-gradient(90deg, #1e293b 25%, #334155 50%, #1e293b 75%);
        }

        @keyframes pulse {
            0% { opacity: 0.8; }
            50% { opacity: 0.5; }
            100% { opacity: 0.8; }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .comment-card.reply {
            margin-right: 2rem;
            border-right: 2px solid rgba(99,102,241,0.15);
        }

        .prose {
            /* سایر استایل‌های موجود */
            white-space: pre-wrap; /* حفظ فاصله‌ها و شکستن خطوط */
            word-wrap: break-word; /* شکستن کلمات طولانی */
            word-break: break-word; /* شکستن کلمات برای زبان فارسی */
            line-height: 2; /* افزایش فاصله بین خطوط */
            text-align: justify; /* تراز متن */
            text-justify: inter-word; /* تراز بهتر برای فارسی */
            padding: 1rem 0; /* فاصله از بالا و پایین */
        }

        .dark .prose {
            color: #e5e7eb;
        }

        .prose h1, .prose h2, .prose h3, .prose h4 {
            color: #111827;
            font-weight: 700;
            margin-top: 1.5em;
            margin-bottom: 0.8em;
            line-height: 1.3;
        }

        .dark .prose h1,
        .dark .prose h2,
        .dark .prose h3,
        .dark .prose h4 {
            color: #f3f4f6;
        }

        .prose h1 {
            font-size: 2.2rem;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 0.5rem;
        }

        .dark .prose h1 {
            border-color: #374151;
        }

        .prose h2 {
            font-size: 1.8rem;
        }

        .prose h3 {
            font-size: 1.5rem;
        }

        .prose p {
            margin-bottom: 1.5rem; /* افزایش فاصله بین پاراگراف‌ها */
            font-size: 1.1rem; /* اندازه متن مناسب */
        }

        .prose img {
            max-width: 100%;
            height: auto;
            border-radius: 0.75rem;
            margin: 1.5rem 0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }

        .dark .prose img {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            margin: 2rem auto; /* فاصله بیشتر برای تصاویر */
            display: block;
            max-width: 100%;
            height: auto;
        }

        .prose pre {
            background: #1e293b;
            color: #f8fafc;
            padding: 1.25rem;
            border-radius: 0.75rem;
            overflow-x: auto;
            font-family: 'Vazir', monospace;
            font-size: 0.95rem;
            line-height: 1.5;
            margin: 1.5rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);

                /* استایل برای کدها */
                white-space: pre;



        }

        .dark .prose pre {
            background: #0f172a;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .prose code {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
            padding: 0.2em 0.4em;
            border-radius: 0.3em;
            font-size: 0.9em;
        }

        .dark .prose code {
            background: rgba(99, 102, 241, 0.2);
            color: #a5b4fc;
        }

        .prose blockquote {
            border-right: 4px solid #6366f1;
            padding: 0.5rem 1.5rem;
            margin: 1.5rem 0;
            background: rgba(99, 102, 241, 0.05);
            border-radius: 0 0.5rem 0.5rem 0;
            font-style: italic;
        }

        .dark .prose blockquote {
            background: rgba(99, 102, 241, 0.1);
        }

        .prose ul, .prose ol {
            padding-right: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .prose li {
            margin-bottom: 0.5rem;
            position: relative;
            padding-right: 1rem;
        }

        .prose ul li::before {
            content: "•";
            color: #6366f1;
            position: absolute;
            right: 0;
        }

        .prose a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 500;
            border-bottom: 1px dashed #6366f1;
            transition: all 0.2s ease;
        }

        .prose a:hover {
            color: #4f46e5;
            border-bottom-style: solid;
        }

        .dark .prose a {
            color: #a5b4fc;
            border-bottom-color: #a5b4fc;
        }

        .dark .prose a:hover {
            color: #818cf8;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            border: none;
            border-radius: 9999px;
            padding: 0.75rem 1.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(99, 102, 241, 0.3);
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
        }

        .btn-secondary {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
            border: none;
            border-radius: 9999px;
            padding: 0.5rem 1.25rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background: rgba(99, 102, 241, 0.2);
            color: #4f46e5;
        }

        .dark .btn-secondary {
            background: rgba(99, 102, 241, 0.2);
            color: #a5b4fc;
        }

        .dark .btn-secondary:hover {
            background: rgba(99, 102, 241, 0.3);
            color: #818cf8;
        }

        .tag {
            display: inline-block;
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-left: 0.5rem;
            transition: all 0.2s ease;
        }

        .tag:hover {
            background: rgba(99, 102, 241, 0.2);
        }

        .dark .tag {
            background: rgba(99, 102, 241, 0.2);
            color: #a5b4fc;
        }

        .dark .tag:hover {
            background: rgba(99, 102, 241, 0.3);
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .toast {
            position: fixed;
            bottom: 1.5rem;
            left: 1.5rem;
            background: #4f46e5;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            z-index: 1000;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        .toast.error {
            background: #ef4444;
        }

        .toast.success {
            background: #10b981;
        }
    </style>
</head>
<body class="min-h-screen transition-all">
<!-- هدر -->
<header class="glass-header dark:glass-header sticky top-0 z-50 fade-in">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold flex items-center hover:opacity-90 transition-opacity">
                    <span class="mdi mdi-book-open-page-variant-outline ml-2 text-3xl text-indigo-500"></span>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-500 to-purple-500">
                        وبلاگ تخصصی فناوری
                    </span>
                </a>
            </div>

            <div class="flex items-center gap-3">
                <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-100 dark:hover:bg-dark-800 transition-colors" aria-label="تغییر تم">
                    <span class="mdi mdi-weather-sunny text-xl text-yellow-500 dark:hidden"></span>
                    <span class="mdi mdi-weather-night text-xl text-indigo-300 hidden dark:inline"></span>
                </button>

                <a href="/" class="btn-primary flex items-center">
                    <span class="mdi mdi-home-outline mr-2"></span>
                    بازگشت به خانه
                </a>
            </div>
        </nav>
    </div>
</header>

<!-- محتوای اصلی -->
<main class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <!-- سایدبار چپ - پست‌های مرتبط -->
        <div class="lg:col-span-1 order-1 lg:order-1">
            <div class="sidebar-card p-5 sticky top-20 fade-in">
                <h2 class="text-xl font-bold mb-5 text-gray-800 dark:text-white border-b pb-3 border-gray-200 dark:border-gray-700 flex items-center">
                    <span class="mdi mdi-bookmark-multiple-outline ml-2 text-indigo-500"></span>
                    پست‌های مرتبط
                </h2>
                <div id="related-posts" class="space-y-4">
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <span class="mdi mdi-loading animate-spin text-2xl"></span>
                        <p class="mt-2">در حال بارگذاری پست‌های مرتبط...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- بخش اصلی پست و کامنت‌ها -->
        <div class="lg:col-span-3 order-2 lg:order-2 space-y-6">
            <!-- محتوای پست -->
            <div id="post-container" class="post-container p-6 fade-in">
                <!-- محتوای پست اینجا نمایش داده می‌شود -->
            </div>

            <!-- بخش کامنت‌ها -->
            <div class="post-container p-6 fade-in">
                <h3 class="text-xl font-bold mb-5 text-gray-800 dark:text-white flex items-center">
                    <span class="mdi mdi-comment-text-outline ml-2 text-indigo-500"></span>
                    نظرات کاربران
                </h3>

                <div id="comments-list" class="space-y-4 mb-6">
                    <!-- کامنت‌ها اینجا نمایش داده می‌شوند -->
                </div>

                <form id="comment-form" class="mt-5">
                    <div class="mb-4">
                        <label for="comment-input" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            نظر خود را بنویسید
                        </label>
                        <textarea id="comment-input" rows="4"
                                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-dark-800 dark:text-white transition"
                                  placeholder="نظر خود را اینجا بنویسید..." required></textarea>
                    </div>
                    <button type="submit"
                            class="btn-primary">
                        ارسال نظر
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', async () => {
        const API_URL = 'http://localhost:9999';
        const token = localStorage.getItem('auth_token');
        const container = document.getElementById('post-container');
        const commentsList = document.getElementById('comments-list');
        const relatedPostsContainer = document.getElementById('related-posts');
        const commentForm = document.getElementById('comment-form');
        const commentInput = document.getElementById('comment-input');
        const themeToggle = document.getElementById('theme-toggle');

        let currentUser = null;

        // مدیریت حالت تاریک
        if (localStorage.getItem('darkMode') === 'true' ||
            (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }

        themeToggle.addEventListener('click', () => {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
        });

        // دریافت شناسه پست از URL
        const pathParts = window.location.pathname.split('/');
        const postId = pathParts[pathParts.length - 1];

        if (!postId || isNaN(postId)) {
            showPostError('شناسه پست مشخص نشده است');
            return;
        }

        // اعتبارسنجی توکن و دریافت اطلاعات کاربر
        if (!token) {
            window.location.href = '/auth?message=لطفا ابتدا وارد حساب خود شوید';
            return;
        }

        // دریافت اطلاعات کاربر فعلی
        try {
            const userResponse = await fetch(`${API_URL}/api/me`, {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Accept': 'application/json'
                }
            });

            if (!userResponse.ok) {
                throw new Error('خطا در دریافت اطلاعات کاربر');
            }

            const result = await userResponse.json();
            currentUser = result.data || result;
            console.log('User Data:', currentUser);
        } catch (error) {
            console.error('خطا در دریافت اطلاعات کاربر:', error);
            window.location.href = '/auth?message=لطفا ابتدا وارد حساب خود شوید';
            return;
        }

        // بارگذاری اولیه پست و کامنت‌ها
        await loadPost();
        await loadComments();

        // مدیریت ارسال کامنت اصلی
        commentForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            await submitComment();
        });






        // تابع بارگذاری پست
        async function loadPost() {
            try {
                container.innerHTML = `
                <div class="animate-pulse space-y-4">
                    <div class="h-10 bg-gray-200 dark:bg-gray-700 rounded w-3/4"></div>
                    <div class="h-64 bg-gray-200 dark:bg-gray-700 rounded-lg"></div>
                    <div class="space-y-2">
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded"></div>
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-5/6"></div>
                        <div class="h-4 bg-gray-200 dark:bg-gray-700 rounded w-2/3"></div>
                    </div>
                </div>
                `;

                const response = await fetch(`${API_URL}/api/posts/${postId}`, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    const error = await response.json();
                    throw new Error(error.message || 'خطا در دریافت پست');
                }

                const result = await response.json();
                const post = result.data || result;

                // ساخت URL تصویر اگر وجود دارد
                const imageUrl = post.image ? `${API_URL}/storage/${post.image}` : null;

                container.innerHTML = `
                <article class="fade-in">
                    <div class="flex items-center gap-3 mb-5">
                        <span class="text-xs px-3 py-1 rounded-full bg-indigo-100 dark:bg-indigo-900/50 text-indigo-800 dark:text-indigo-200">
                            <span class="mdi mdi-calendar-outline ml-1"></span>
                            ${new Date(post.created_at).toLocaleDateString('fa-IR')}
                        </span>
                        <span class="text-xs px-3 py-1 rounded-full bg-pink-100 dark:bg-pink-900/50 text-pink-800 dark:text-pink-200">
                            <span class="mdi mdi-clock-outline ml-1"></span>
                            ${Math.ceil(post.content.length / 1500)} دقیقه مطالعه
                        </span>
                    </div>

                    <h1 class="text-3xl font-bold mb-6 text-gray-800 dark:text-white">${post.title}</h1>

                    ${imageUrl ? `
                        <img src="${imageUrl}" alt="${post.title}"
                            class="w-full h-auto rounded-xl mb-8 shadow-lg transition hover:shadow-xl">
                    ` : `
                        <div class="w-full h-64 rounded-xl mb-8 bg-gradient-to-br from-gray-200 to-gray-300 dark:from-dark-700 dark:to-dark-600 flex items-center justify-center">
                            <span class="text-lg text-gray-500 dark:text-gray-400">بدون تصویر</span>
                        </div>
                    `}

                    <div class="prose max-w-none dark:prose-invert">
                        ${post.content}
                    </div>

                    <div class="mt-8 pt-5 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex flex-wrap gap-2">
                            ${post.tags ? post.tags.map(tag => `
                                <span class="tag">
                                    #${tag}
                                </span>
                            `).join('') : ''}
                        </div>
                    </div>
                </article>
                `;

                await loadRelatedPosts(post.title);

            } catch (error) {
                console.error('خطا در بارگذاری پست:', error);
                showPostError(error.message);
            }
        }

        // تابع بارگذاری کامنت‌ها
        async function loadComments() {
            try {
                commentsList.innerHTML = `
                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                    <span class="mdi mdi-loading animate-spin text-2xl"></span>
                    <p class="mt-2">در حال بارگذاری نظرات...</p>
                </div>
                `;

                const response = await fetch(`${API_URL}/api/posts/${postId}/comments`, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    const error = await response.json();
                    throw new Error(error.message || 'خطا در دریافت نظرات');
                }

                const result = await response.json();
                const comments = result.data || result;

                if (!comments || comments.length === 0) {
                    commentsList.innerHTML = `
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <span class="mdi mdi-comment-remove-outline text-2xl"></span>
                        <p class="mt-2">هنوز نظری ثبت نشده است</p>
                    </div>
                    `;
                    return;
                }

                commentsList.innerHTML = comments.map(comment =>
                    renderCommentWithReplies(comment)
                ).join('');

            } catch (error) {
                console.error('خطا در بارگذاری نظرات:', error);
                showToast('خطا در بارگذاری نظرات', 'error');
                commentsList.innerHTML = `
                <div class="text-center py-8 text-red-500 dark:text-red-300">
                    <span class="mdi mdi-alert-circle-outline text-2xl"></span>
                    <p class="mt-2">خطا در بارگذاری نظرات</p>
                    <p class="text-sm mt-2">${error.message}</p>
                </div>
                `;
            }
        }

        // تابع رندر کامنت با پاسخ‌ها
        function renderCommentWithReplies(comment) {
            let html = renderComment(comment);
            if (comment.replies && comment.replies.length > 0) {
                html += `<div class="mr-8 space-y-4 mt-4">${comment.replies.map(reply =>
                    renderComment(reply, true)
                ).join('')}</div>`;
            }
            return html;
        }

        // تابع رندر یک کامنت
        function renderComment(comment, isReply = false) {
            const user = comment.user || {};
            const badge = user.is_admin ? 'admin-badge' : 'user-badge';
            const role = user.is_admin ? 'ادمین' : 'کاربر';

            // اصلاح دسترسی به currentUser.user
            const currentUserData = currentUser.user || currentUser;
            const currentUserId = currentUserData && currentUserData.id ? currentUserData.id.toString() : null;
            const commentUserId = user.id ? user.id.toString() : null;

            const isOwner = currentUserId && commentUserId && (currentUserId === commentUserId);
            const isAdmin = currentUserData && (currentUserData.is_admin === 1 || currentUserData.is_admin === true);
            const canDelete = isOwner || isAdmin;

            console.log('Current User Data:', currentUserData);
            console.log('isAdmin:', isAdmin, 'isOwner:', isOwner, 'canDelete:', canDelete);

            return `
    <div class="comment-card p-4 ${isReply ? 'reply' : ''}" id="comment-${comment.id}">
        <!-- بقیه کدها -->
        <div class="flex justify-between items-center mb-3">
            <span class="text-sm font-semibold ${badge} px-3 py-1 rounded-full">
                ${role}: ${user.name || 'کاربر مهمان'}
            </span>
            <span class="text-xs text-gray-500 dark:text-gray-400">
                ${new Date(comment.created_at).toLocaleDateString('fa-IR')}
            </span>
        </div>
        <p class="mb-3 text-gray-700 dark:text-gray-300">${comment.content}</p>
        <div class="flex gap-4 text-sm">
            <button onclick="showReplyForm(${comment.id})" class="btn-secondary text-sm">
                پاسخ
            </button>
           ${canDelete ? `
        <button onclick="deleteComment(${comment.id})" class="text-red-600 dark:text-red-400 hover:underline text-sm">
                حذف
            </button>` : ''}
        </div>
        <div id="reply-form-${comment.id}" class="mt-3 hidden">
            <textarea id="reply-input-${comment.id}"
                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-dark-800 dark:text-white"
                placeholder="پاسخ خود را بنویسید..." rows="3"></textarea>
            <div class="flex gap-2 mt-2">
                <button onclick="submitReply(${comment.id})"
                    class="btn-primary px-4 py-2 text-sm">
                    ارسال پاسخ
                </button>
                <button onclick="hideReplyForm(${comment.id})"
                    class="btn-secondary px-4 py-2 text-sm">
                    انصراف
                </button>
            </div>
        </div>
    </div>
    `;
        }

        // تابع ارسال کامنت اصلی
        async function submitComment() {
            const content = commentInput.value.trim();

            if (!content) {
                showToast('لطفا متن نظر را وارد کنید', 'error');
                return;
            }

            try {
                const response = await fetch(`${API_URL}/api/posts/${postId}/comments`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ content })
                });

                if (!response.ok) {
                    const error = await response.json();
                    throw new Error(error.message || 'خطا در ارسال نظر');
                }

                commentInput.value = '';
                showToast('نظر شما با موفقیت ثبت شد', 'success');
                await loadComments();

            } catch (error) {
                console.error('خطا در ارسال نظر:', error);
                showToast(`خطا در ارسال نظر: ${error.message}`, 'error');
            }
        }

        // تابع بارگذاری پست‌های مرتبط
        async function loadRelatedPosts(title) {
            try {
                const response = await fetch(`${API_URL}/api/posts`, {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });

                if (!response.ok) {
                    throw new Error('خطا در دریافت پست‌های مرتبط');
                }

                const result = await response.json();
                const posts = result.data || result;

                if (!posts || posts.length === 0) {
                    relatedPostsContainer.innerHTML = `
                    <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                        <span class="mdi mdi-bookmark-remove-outline text-2xl"></span>
                        <p class="mt-2">پست مرتبطی یافت نشد</p>
                    </div>
                    `;
                    return;
                }
                const sortedPosts = posts.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                relatedPostsContainer.innerHTML = sortedPosts.slice(0, 3).map(post => `
                    <a href="/posts/${post.id}" class="related-post block p-4 rounded-lg transition">
                        <h3 class="font-bold text-gray-800 dark:text-white mb-2">${post.title}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2">
                            ${post.content.substring(0, 100)}...
                        </p>
                        <div class="mt-3 flex items-center justify-between text-xs text-gray-500 dark:text-gray-400">
                            <span>${new Date(post.created_at).toLocaleDateString('fa-IR')}</span>
                            <span>${Math.ceil(post.content.length / 1500)} دقیقه</span>
                        </div>
                    </a>
                `).join('');

            } catch (error) {
                console.error('خطا در دریافت پست‌های مرتبط:', error);
                relatedPostsContainer.innerHTML = `
                <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                    <span class="mdi mdi-alert-circle-outline text-2xl"></span>
                    <p class="mt-2">خطا در بارگذاری پست‌های مرتبط</p>
                </div>
                `;
            }
        }

        // تابع نمایش خطای پست
        function showPostError(message) {
            container.innerHTML = `
            <div class="text-center py-12">
                <span class="mdi mdi-alert-circle-outline text-red-500 dark:text-red-300 text-4xl"></span>
                <h2 class="text-xl font-bold mt-4 text-red-500 dark:text-red-300">خطا در بارگذاری پست</h2>
                <p class="text-gray-600 dark:text-gray-400 mt-2">${message}</p>
                <button onclick="window.location.reload()"
                        class="btn-primary mt-4">
                    <span class="mdi mdi-refresh mr-2"></span>
                    تلاش مجدد
                </button>
            </div>
            `;
        }

        // تابع نمایش نوتیفیکیشن
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            toast.innerHTML = `
                <div class="flex items-center">
                    <span class="mdi ${type === 'success' ? 'mdi-check-circle' : 'mdi-alert-circle'} mr-2"></span>
                    ${message}
                </div>
            `;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.style.animation = 'fadeOut 0.3s ease-out';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // تعریف توابع global برای رویدادهای دینامیک
        window.showReplyForm = function(commentId) {
            const form = document.getElementById(`reply-form-${commentId}`);
            if (form) form.classList.remove('hidden');
        };

        window.hideReplyForm = function(commentId) {
            const form = document.getElementById(`reply-form-${commentId}`);
            if (form) form.classList.add('hidden');
        };

        window.submitReply = async function(parentId) {
            const input = document.getElementById(`reply-input-${parentId}`);
            const content = input.value.trim();

            if (!content) {
                showToast('لطفا متن پاسخ را وارد کنید', 'error');
                return;
            }

            try {
                const response = await fetch(`${API_URL}/api/posts/${postId}/comments`, {
                    method: 'POST',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        content,
                        parent_id: parentId
                    })
                });

                if (!response.ok) {
                    const error = await response.json();
                    throw new Error(error.message || 'خطا در ارسال پاسخ');
                }

                input.value = '';
                document.getElementById(`reply-form-${parentId}`).classList.add('hidden');
                showToast('پاسخ شما با موفقیت ثبت شد', 'success');
                await loadComments();

            } catch (error) {
                console.error('خطا در ارسال پاسخ:', error);
                showToast(`خطا در ارسال پاسخ: ${error.message}`, 'error');
            }
        };

        window.deleteComment = async function(commentId) {
            if (!confirm('آیا از حذف این نظر مطمئن هستید؟')) return;

            try {
                const response = await fetch(`${API_URL}/api/comments/${commentId}`, {
                    method: 'DELETE',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                });

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(result.message || 'خطا در حذف نظر');
                }

                showToast(result.message || 'نظر با موفقیت حذف شد', 'success');
                document.getElementById(`comment-${commentId}`)?.remove();

            } catch (error) {
                console.error('خطا در حذف نظر:', error);
                showToast(error.message || 'خطا در حذف نظر', 'error');
            }
        };
    });
</script>
</body>
</html>
<?php /**PATH D:\untitled\laravel-cms\resources\views/posts/show.blade.php ENDPATH**/ ?>