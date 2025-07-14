<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>احراز هویت | سیستم مدیریت</title>
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

        .tab-button {
            transition: all 0.3s ease;
            position: relative;
        }

        .tab-button.active-tab {
            color: #2563eb;
        }

        .tab-button.active-tab::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background-color: #2563eb;
            border-radius: 3px 3px 0 0;
            animation: fadeIn 0.3s ease;
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

        .btn-success {
            background: linear-gradient(to right, #10b981, #059669);
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .btn-secondary {
            background: linear-gradient(to right, #7c3aed, #6d28d9);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
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

        .social-login-btn {
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .social-login-btn:hover {
            border-color: #93c5fd;
            transform: translateY(-1px);
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
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
<div class="auth-card bg-white rounded-xl overflow-hidden w-full max-w-md animate__animated animate__fadeIn">
    <!-- هدر کارت -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-500 p-6 text-center text-white">
        <h1 class="text-2xl font-bold">به سیستم خوش آمدید</h1>
        <p class="text-blue-100 mt-1">لطفا برای ادامه وارد شوید</p>
    </div>

    <!-- تب‌ها -->
    <div class="flex border-b">
        <button id="loginTab" class="tab-button flex-1 py-4 text-center font-bold active-tab" type="button">ورود به حساب</button>
        <button id="registerTab" class="tab-button flex-1 py-4 text-center font-bold" type="button">ثبت‌نام جدید</button>
    </div>

    <!-- محتوای کارت -->
    <div class="p-6">
        <!-- فرم ورود -->
        <form id="loginForm" novalidate class="animate-fade-in">
            <div class="mb-4">
                <label for="loginEmail" class="block text-sm font-medium text-gray-700 mb-1">آدرس ایمیل</label>
                <input type="email" id="loginEmail" placeholder="example@example.com" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none">
                <p class="text-xs text-gray-500 mt-1">ایمیل خود را وارد کنید</p>
            </div>

            <div class="mb-4 password-container">
                <label for="loginPassword" class="block text-sm font-medium text-gray-700 mb-1">رمز عبور</label>
                <input type="password" id="loginPassword" placeholder="••••••••" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none pr-10">
                <span class="password-toggle" onclick="togglePassword('loginPassword')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <input id="rememberMe" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="rememberMe" class="mr-2 block text-sm text-gray-700">مرا به خاطر بسپار</label>
                </div>
                <a href="#" id="showForgotForm" class="text-sm text-blue-600 hover:underline">فراموشی رمز عبور؟</a>
            </div>

            <button type="submit" class="btn-primary w-full py-3 rounded-lg text-white font-bold mb-4">
                ورود به حساب
            </button>

            <p id="loginError" class="error-message text-red-600 text-sm text-center py-2 hidden"></p>


        </form>

        <!-- فرم بازیابی رمز عبور -->
        <form id="forgotForm" class="hidden animate-fade-in" novalidate>
            <div class="mb-6 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
                <h3 class="text-lg font-bold text-gray-800 mt-2">بازیابی رمز عبور</h3>
                <p class="text-gray-600 mt-1">لطفا ایمیل خود را وارد کنید تا لینک بازیابی برای شما ارسال شود</p>
            </div>

            <div class="mb-4">
                <label for="forgotEmail" class="block text-sm font-medium text-gray-700 mb-1">آدرس ایمیل</label>
                <input type="email" id="forgotEmail" placeholder="example@example.com" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none">
            </div>

            <button type="submit" class="btn-secondary w-full py-3 rounded-lg text-white font-bold mb-4">
                ارسال لینک بازیابی
            </button>

            <p id="forgotError" class="error-message text-red-600 text-sm text-center py-2 hidden"></p>

            <div class="text-center mt-4">
                <a href="#" id="hideForgotForm" class="text-sm text-blue-600 hover:underline">بازگشت به صفحه ورود</a>
            </div>
        </form>

        <!-- فرم ثبت‌نام -->
        <form id="registerForm" class="hidden animate-fade-in" novalidate>
            <div class="mb-4">
                <label for="registerName" class="block text-sm font-medium text-gray-700 mb-1">نام کامل</label>
                <input type="text" id="registerName" placeholder="نام و نام خانوادگی" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none">
            </div>

            <div class="mb-4">
                <label for="registerEmail" class="block text-sm font-medium text-gray-700 mb-1">آدرس ایمیل</label>
                <input type="email" id="registerEmail" placeholder="example@example.com" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none">
            </div>

            <div class="mb-4 password-container">
                <label for="registerPassword" class="block text-sm font-medium text-gray-700 mb-1">رمز عبور</label>
                <input type="password" id="registerPassword" placeholder="••••••••" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none pr-10">
                <span class="password-toggle" onclick="togglePassword('registerPassword')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
                <p class="text-xs text-gray-500 mt-1">حداقل 8 کاراکتر شامل حروف و اعداد</p>
            </div>

            <div class="mb-6 password-container">
                <label for="registerPasswordConfirmation" class="block text-sm font-medium text-gray-700 mb-1">تکرار رمز عبور</label>
                <input type="password" id="registerPasswordConfirmation" placeholder="••••••••" required
                       class="form-input w-full px-4 py-2 rounded-lg focus:outline-none pr-10">
                <span class="password-toggle" onclick="togglePassword('registerPasswordConfirmation')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </span>
            </div>

            <div class="flex items-center mb-6">
                <input id="agreeTerms" type="checkbox" required class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="agreeTerms" class="mr-2 block text-sm text-gray-700">با <a href="#" class="text-blue-600 hover:underline">شرایط و قوانین</a> موافقم</label>
            </div>

            <button type="submit" class="btn-success w-full py-3 rounded-lg text-white font-bold mb-4">
                ایجاد حساب کاربری
            </button>

            <p id="registerError" class="error-message text-red-600 text-sm text-center py-2 hidden"></p>
        </form>
    </div>

    <!-- فوتر کارت -->
    <div class="bg-gray-50 px-6 py-4 text-center border-t">
        <p class="text-sm text-gray-600">با ورود یا ثبت‌نام، شما با <a href="#" class="text-blue-600 hover:underline">شرایط و قوانین</a> ما موافقت می‌کنید</p>
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

    // سوئیچ تب‌ها
    const loginTab = document.getElementById('loginTab');
    const registerTab = document.getElementById('registerTab');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const forgotForm = document.getElementById('forgotForm');
    const loginError = document.getElementById('loginError');
    const registerError = document.getElementById('registerError');
    const forgotError = document.getElementById('forgotError');
    const showForgotForm = document.getElementById('showForgotForm');
    const hideForgotForm = document.getElementById('hideForgotForm');

    loginTab.onclick = () => {
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
        forgotForm.classList.add('hidden');
        loginTab.classList.add('active-tab');
        registerTab.classList.remove('active-tab');
        clearErrors();
    };

    registerTab.onclick = () => {
        registerForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
        forgotForm.classList.add('hidden');
        registerTab.classList.add('active-tab');
        loginTab.classList.remove('active-tab');
        clearErrors();
    };

    showForgotForm.onclick = (e) => {
        e.preventDefault();
        forgotForm.classList.remove('hidden');
        loginForm.classList.add('hidden');
        registerForm.classList.add('hidden');
        loginTab.classList.remove('active-tab');
        registerTab.classList.remove('active-tab');
        clearErrors();
    };

    hideForgotForm.onclick = (e) => {
        e.preventDefault();
        forgotForm.classList.add('hidden');
        loginForm.classList.remove('hidden');
        registerForm.classList.add('hidden');
        loginTab.classList.add('active-tab');
        registerTab.classList.remove('active-tab');
        clearErrors();
    };

    function clearErrors() {
        loginError.classList.add('hidden');
        registerError.classList.add('hidden');
        forgotError.classList.add('hidden');

        // حذف حالت خطا از تمام فیلدها
        document.querySelectorAll('.form-input').forEach(input => {
            input.classList.remove('input-error');
        });
    }

    // اعتبارسنجی فیلدها هنگام تایپ
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', function() {
            if (this.checkValidity()) {
                this.classList.remove('input-error');
            }
        });
    });

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

    // ورود
    loginForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearErrors();

        if (!validateForm(loginForm)) {
            loginError.textContent = 'لطفا تمام فیلدهای ضروری را پر کنید';
            loginError.classList.remove('hidden');
            return;
        }

        const submitButton = e.target.querySelector('button[type="submit"]');
        setLoading(submitButton, true);

        const email = document.getElementById('loginEmail').value.trim();
        const password = document.getElementById('loginPassword').value.trim();
        const rememberMe = document.getElementById('rememberMe').checked;

        try {
            const res = await fetch(`${API_URL}/login`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                credentials: 'include',
                body: JSON.stringify({email, password, remember_me: rememberMe})
            });

            const dataText = await res.text();
            let data;
            try {
                data = JSON.parse(dataText);
            } catch {
                loginError.textContent = 'پاسخ نامعتبر از سرور دریافت شد.';
                loginError.classList.remove('hidden');
                setLoading(submitButton, false);
                return;
            }

            if (res.ok) {
                localStorage.setItem('auth_token', data.access_token);
                localStorage.setItem('user', JSON.stringify(data.user));
                window.location.href = '/';
            } else {
                loginError.textContent = data.message || 'خطا در ورود';
                loginError.classList.remove('hidden');
            }
        } catch (err) {
            console.error(err);
            loginError.textContent = 'خطا در ارتباط با سرور.';
            loginError.classList.remove('hidden');
        } finally {
            setLoading(submitButton, false);
        }
    });

    // ثبت‌نام
    registerForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearErrors();

        if (!validateForm(registerForm)) {
            registerError.textContent = 'لطفا تمام فیلدهای ضروری را پر کنید';
            registerError.classList.remove('hidden');
            return;
        }

        const submitButton = e.target.querySelector('button[type="submit"]');
        setLoading(submitButton, true);

        const name = document.getElementById('registerName').value.trim();
        const email = document.getElementById('registerEmail').value.trim();
        const password = document.getElementById('registerPassword').value.trim();
        const password_confirmation = document.getElementById('registerPasswordConfirmation').value.trim();

        // بررسی تطابق رمز عبور
        if (password !== password_confirmation) {
            document.getElementById('registerPassword').classList.add('input-error');
            document.getElementById('registerPasswordConfirmation').classList.add('input-error');
            registerError.textContent = 'رمز عبور و تکرار آن مطابقت ندارند';
            registerError.classList.remove('hidden');
            setLoading(submitButton, false);
            return;
        }

        try {
            const res = await fetch(`${API_URL}/register`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                credentials: 'include',
                body: JSON.stringify({name, email, password, password_confirmation})
            });

            const dataText = await res.text();
            let data;
            try {
                data = JSON.parse(dataText);
            } catch {
                registerError.textContent = 'پاسخ نامعتبر از سرور دریافت شد.';
                registerError.classList.remove('hidden');
                setLoading(submitButton, false);
                return;
            }

            if (res.ok) {
                localStorage.setItem('auth_token', data.access_token);
                localStorage.setItem('user', JSON.stringify(data.user));
                window.location.href = '/';
            } else if(data.errors) {
                // نمایش خطاهای اعتبارسنجی
                const allErrors = Object.values(data.errors).flat().join('\n');
                registerError.textContent = allErrors;
                registerError.classList.remove('hidden');

                // علامت گذاری فیلدهای دارای خطا
                Object.keys(data.errors).forEach(field => {
                    const inputId = `register${field.charAt(0).toUpperCase() + field.slice(1)}`;
                    const input = document.getElementById(inputId);
                    if (input) {
                        input.classList.add('input-error');
                    }
                });
            } else {
                registerError.textContent = data.message || 'خطا در ثبت‌نام';
                registerError.classList.remove('hidden');
            }
        } catch (err) {
            console.error(err);
            registerError.textContent = 'خطا در ارتباط با سرور.';
            registerError.classList.remove('hidden');
        } finally {
            setLoading(submitButton, false);
        }
    });

    // بازیابی رمز عبور
    forgotForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        clearErrors();

        if (!validateForm(forgotForm)) {
            forgotError.textContent = 'لطفا ایمیل خود را وارد کنید';
            forgotError.classList.remove('hidden');
            return;
        }

        const submitButton = e.target.querySelector('button[type="submit"]');
        setLoading(submitButton, true);

        const email = document.getElementById('forgotEmail').value.trim();

        try {
            const res = await fetch(`${API_URL}/forgot-password`, {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ email })
            });

            const data = await res.json();
            if (res.ok) {
                // نمایش پیام موفقیت
                forgotError.textContent = data.message || 'لینک بازیابی ارسال شد. لطفا ایمیل خود را بررسی کنید.';
                forgotError.classList.remove('hidden');
                forgotError.classList.remove('text-red-600');
                forgotError.classList.add('text-green-600');

                // مخفی کردن فرم بعد از 3 ثانیه
                setTimeout(() => {
                    forgotForm.classList.add('hidden');
                    loginForm.classList.remove('hidden');
                    loginTab.classList.add('active-tab');
                    forgotError.classList.add('text-red-600');
                    forgotError.classList.remove('text-green-600');
                }, 3000);
            } else {
                forgotError.textContent = data.message || 'خطا در ارسال ایمیل.';
                forgotError.classList.remove('hidden');
            }
        } catch (err) {
            forgotError.textContent = 'خطا در ارتباط با سرور.';
            forgotError.classList.remove('hidden');
        } finally {
            setLoading(submitButton, false);
        }
    });

    // نمایش پیام در صورت ارسال از طریق url (اختیاری)
    const params = new URLSearchParams(window.location.search);
    const message = params.get('message');
    if (message) {
        setTimeout(() => {
            const alertDiv = document.createElement('div');
            alertDiv.className = 'fixed top-4 right-4 bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg animate__animated animate__fadeInDown';
            alertDiv.textContent = decodeURIComponent(message);
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
<?php /**PATH D:\blog\laravel-blog\resources\views/auth.blade.php ENDPATH**/ ?>