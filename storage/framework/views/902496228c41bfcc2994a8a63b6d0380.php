<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بازیابی رمز عبور | سیستم مدیریت</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            font-family: 'Vazirmatn', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            background-attachment: fixed;
        }

        .auth-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .auth-card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
        }

        .form-input {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .form-input:focus {
            border-color: #93c5fd;
            box-shadow: 0 0 0 3px rgba(147, 197, 253, 0.3);
        }

        .btn-primary {
            background: linear-gradient(to right, #2563eb, #1d4ed8);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .loading {
            position: relative;
            opacity: 0.7;
            pointer-events: none;
        }

        .loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }

        .password-toggle {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #64748b;
        }

        .password-container {
            position: relative;
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .error-message {
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }

        .input-error {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.3) !important;
        }

        .text-success {
            color: #16a34a;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
<div class="auth-card bg-white rounded-xl overflow-hidden w-full max-w-md animate__animated animate__fadeIn">
    <!-- هدر کارت -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-center text-white">
        <h1 class="text-2xl font-bold">بازیابی رمز عبور</h1>
        <p class="text-blue-100 mt-1">رمز عبور جدید خود را تنظیم کنید</p>
    </div>

    <!-- محتوای کارت -->
    <div class="p-6">
        <form id="resetForm" novalidate class="animate-fade-in">
            <input type="hidden" id="token" />

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">آدرس ایمیل</label>
                <input type="email" id="email" placeholder="example@example.com" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none" readonly>
            </div>

            <div class="mb-4 password-container">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">رمز عبور جدید</label>
                <input type="password" id="password" placeholder="••••••••" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none pr-10">
                <span class="password-toggle" onclick="togglePassword('password')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
                <p class="text-xs text-gray-500 mt-1">حداقل 8 کاراکتر شامل حروف و اعداد</p>
            </div>

            <div class="mb-6 password-container">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">تکرار رمز عبور</label>
                <input type="password" id="password_confirmation" placeholder="••••••••" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none pr-10">
                <span class="password-toggle" onclick="togglePassword('password_confirmation')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
            </div>

            <button type="submit" class="btn-primary w-full py-3 rounded-lg text-white font-bold mb-4">
                تغییر رمز عبور
            </button>

            <p id="message" class="text-sm text-center py-2 hidden"></p>
        </form>
    </div>

    <!-- فوتر کارت -->
    <div class="bg-gray-50 px-6 py-4 text-center border-t">
        <p class="text-sm text-gray-600">بازگشت به <a href="/Auth" class="text-blue-600 hover:underline">صفحه ورود</a></p>
    </div>
</div>

<script>
    const API_URL = 'http://localhost:9999/api';

    // تابع نمایش/مخفی کردن رمز عبور
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const toggle = input.nextElementSibling.querySelector('svg');

        if (input.type === 'password') {
            input.type = 'text';
            toggle.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
        } else {
            input.type = 'password';
            toggle.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
        }
    }

    // دریافت توکن و ایمیل از URL
    const pathname = window.location.pathname;
    const token = pathname.split('/').pop();
    const email = new URLSearchParams(window.location.search).get('email');

    document.getElementById('token').value = token || '';
    document.getElementById('email').value = email || '';

    const resetForm = document.getElementById('resetForm');
    const message = document.getElementById('message');

    // اعتبارسنجی فرم قبل از ارسال
    function validateForm(form) {
        let isValid = true;
        const inputs = form.querySelectorAll('input[required]');

        inputs.forEach(input => {
            if (!input.checkValidity()) {
                input.classList.add('input-error');
                isValid = false;
            }
        });

        return isValid;
    }

    // تابع کمکی برای مدیریت لودینگ
    function setLoading(button, isLoading) {
        if (isLoading) {
            button.disabled = true;
            button.classList.add('loading');
            button.innerHTML = '<span class="opacity-0">' + button.textContent + '</span>';
        } else {
            button.disabled = false;
            button.classList.remove('loading');
            button.innerHTML = button.querySelector('span').textContent;
        }
    }

    resetForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        message.textContent = '';
        message.className = 'text-sm text-center py-2 hidden';

        if (!validateForm(resetForm)) {
            message.textContent = 'لطفا تمام فیلدهای ضروری را پر کنید';
            message.classList.remove('hidden');
            message.classList.add('text-red-600', 'error-message');
            return;
        }

        const submitButton = e.target.querySelector('button[type="submit"]');
        setLoading(submitButton, true);

        const emailValue = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value.trim();
        const password_confirmation = document.getElementById('password_confirmation').value.trim();
        const tokenValue = document.getElementById('token').value;

        if (!tokenValue) {
            message.textContent = 'توکن بازیابی رمز عبور معتبر نیست.';
            message.classList.remove('hidden');
            message.classList.add('text-red-600', 'error-message');
            setLoading(submitButton, false);
            return;
        }

        if (password !== password_confirmation) {
            document.getElementById('password').classList.add('input-error');
            document.getElementById('password_confirmation').classList.add('input-error');
            message.textContent = 'رمز عبور و تکرار آن مطابقت ندارند';
            message.classList.remove('hidden');
            message.classList.add('text-red-600', 'error-message');
            setLoading(submitButton, false);
            return;
        }

        try {
            const res = await fetch(`${API_URL}/reset-password`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({
                    token: tokenValue,
                    email: emailValue,
                    password,
                    password_confirmation
                })
            });

            const data = await res.json();

            if (res.ok) {
                message.textContent = data.message || 'رمز عبور شما با موفقیت تغییر کرد. در حال انتقال به صفحه ورود...';
                message.classList.remove('hidden');
                message.classList.remove('text-red-600');
                message.classList.add('text-green-600');

                // هدایت به صفحه ورود بعد از 3 ثانیه
                setTimeout(() => {
                    window.location.href = '/Auth';
                }, 3000);
            } else {
                message.textContent = data.message || 'خطایی در تغییر رمز عبور رخ داد.';
                message.classList.remove('hidden');
                message.classList.add('text-red-600', 'error-message');

                // علامت گذاری فیلدهای دارای خطا
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const input = document.getElementById(field);
                        if (input) {
                            input.classList.add('input-error');
                        }
                    });
                }
            }
        } catch (err) {
            console.error(err);
            message.textContent = 'خطا در ارتباط با سرور. لطفا مجددا تلاش کنید.';
            message.classList.remove('hidden');
            message.classList.add('text-red-600', 'error-message');
        } finally {
            setLoading(submitButton, false);
        }
    });

    // نمایش پیام در صورت ارسال از طریق url (اختیاری)
    const params = new URLSearchParams(window.location.search);
    const urlMessage = params.get('message');
    if (urlMessage) {
        setTimeout(() => {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg animate__animated animate__fadeInDown';
            alertDiv.textContent = decodeURIComponent(urlMessage);
            document.body.appendChild(alertDiv);

            setTimeout(() => {
                alertDiv.classList.remove('animate__fadeInDown');
                alertDiv.classList.add('animate__fadeOutUp');
                setTimeout(() => alertDiv.remove(), 1000);
            }, 5000);
        }, 500);
    }
</script>
</body>
</html>
<?php /**PATH D:\untitled\laravel-cms\resources\views/reset-password.blade.php ENDPATH**/ ?>