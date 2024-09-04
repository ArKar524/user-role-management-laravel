<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite('resources/css/app.css')

</head>

<body class="">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-center min-h-screen">
        <div class="w-full md:w-96 p-8 rounded-lg">
            @if (session('error_message'))
                <div class="bg-red-100 text-red-700 p-4 mb-4 rounded">
                    {{ session('error_message') }}
                </div>
            @endif
            <form action="login" method="POST">
                @csrf
                <div class="text-center mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="w-40 h-40 mx-auto text-green-600">
                        <path fill-rule="evenodd"
                            d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="mb-4">
                    <input type="email" name="email" id="email" placeholder="Email"
                        class="input input-bordered input-green rounded-full w-full @error('email') border-red-500 @enderror()"
                        value="{{ old('email') }}" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-10">
                    <input type="password" name="password" id="password" placeholder="Password"
                        class="input input-bordered input-green rounded-full w-full @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}" />
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="btn bg-green-600 hover:bg-green-700 rounded-full text-white w-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>Login
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>


</html>
