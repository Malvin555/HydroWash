<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-page="auth">

    <div class="flex justify-center items-center w-full h-screen bg-primary">

        <div class="bg-white w-[300px] md:w-[370px] lg:w-[440px] rounded-xl p-10">
            <div class="mb-5 lg:mb-7 flex flex-col md:gap-1 lg:gap-2">
                <h1
                    class="font-bold text-xl md:text-3xl lg:text-4xl text-center uppercase text-primary drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">
                    Create Account</h1>
                <p class="text-sm md:text-base lg:text-xl text-center">Hi there, Let's set up your new account</p>
            </div>

            <form action="{{ route('register.store') }}" method="post">
                @csrf

                <input type="text" name="name" id="name" placeholder="Username"
                    class="w-full py-2 pl-4 mt-4 bg-input rounded-xl outline-0" value="{{ old('name') }}">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <input type="email" name="email" id="email" placeholder="Email"
                    class="w-full py-2 pl-4 mt-4 bg-input rounded-xl outline-0" value="{{ old('email') }}">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="relative w-full mt-4">
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="w-full h-full py-2 pl-4 pr-10 bg-input rounded-xl outline-0" value="{{ old('password') }}">
                    <button type="button" id="togglePassword" class="absolute top-1/2 right-4 -translate-y-1/2 cursor-pointer">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <div class="relative w-full mt-4">
                    <input type="password" name="password_confirmation" id="confirmPassword" placeholder="Confirm Password"
                        class="w-full h-full py-2 pl-4 pr-10 bg-input rounded-xl outline-0" value="{{ old('password_confirmation') }}">
                    <button type="button" id="toggleConfirmPassword" class="absolute top-1/2 right-4 -translate-y-1/2 cursor-pointer">
                        <svg id="eyeIconConfirm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                </div>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="font-bold bg-primary text-white md:text-xl w-full rounded-sm p-2 my-5 cursor-pointer">Register</button>
            </form>

            <p class="text-[#848484] text-center text-[.8rem] md:text-base mb-7 lg:mb-11">Already have an account? <a
                    href="login" class="text-primary">Login</a></p>

            <div class="flex justify-center items-center gap-1">
                <a href="{{ route('landing') }}" class="flex items-center gap-2">
                    <img src="{{ asset('img/logo.png') }}" alt="logo"
                        class="w-[22px] h-[20px] lg:w-[43px] lg:h-[40px] drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">
                    <h1 class="text-[.8rem] lg:text-[1.2rem] font-bold drop-shadow-[0_5px_1px_rgba(0,57,69,0.2)]">
                        HydroWash
                    </h1>
                </a>
            </div>
        </div>

    </div>


</body>

</html>
