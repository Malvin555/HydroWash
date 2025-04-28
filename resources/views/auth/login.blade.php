<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">

    @vite('resources/css/app.css')
</head>

<body>

    <div class="flex justify-center items-center w-full h-screen bg-primary">

        <div class="bg-white w-[300px] md:w-[370px] lg:w-[440px] rounded-xl p-10">
            <div class="mb-5 lg:mb-7 flex flex-col md:gap-1 lg:gap-2">
                <h1
                    class="font-bold text-xl md:text-3xl lg:text-4xl text-center uppercase text-primary drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">
                    Welcome</h1>
                <p class="text-sm md:text-base lg:text-xl text-center">Hey, Enter Your details to get sign in to your
                    account</p>
            </div>

            <form action="{{ route('login.store') }}" method="post">
                @csrf

                <input type="text" name="name" id="name" placeholder="username"
                    class="w-full py-2 pl-4 bg-input rounded-xl outline-0" value="{{ old('name') }}">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <input type="password" name="password" id="password" placeholder="Password"
                    class="w-full py-2 pl-4 mt-4 bg-input rounded-xl outline-0">
                <button type="submit"
                    class="mt-8 font-bold bg-primary text-white md:text-xl w-full rounded-sm p-2 mb-5">Log
                    in</button>
            </form>

            <p class="text-[#848484] text-center text-[.8rem] md:text-base mb-7 lg:mb-11">Don’t have an account? <a
                    href="register" class="text-primary">Register</a></p>

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

    @include('pages.alert')

    <script>
        if (localStorage.getItem('api_token')) {
            localStorage.removeItem('api_token');
        }

        if (localStorage.getItem('ref_id')) {
            localStorage.removeItem('ref_id');
        }
    </script>
</body>

</html>
