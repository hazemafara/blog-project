<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Quicksand', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #262424;
        }

        section {
            position: absolute;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2px;
            flex-wrap: wrap;
            overflow: hidden;
        }

        section .signin {
            position: absolute;
            width: 400px;
            background: rgb(3, 7, 18);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            border-radius: 4px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 9);
        }

        section .signin .content {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 40px;
        }

        section .signin .content h2 {
            font-size: 2em;
            color: rgb(236, 72, 153);
            text-transform: uppercase;
        }

        section .signin .content .form {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        section .signin .content .form .inputBox {
            position: relative;
            width: 100%;
        }

        section .signin .content .form .inputBox input {
            position: relative;
            width: 100%;
            background: #fff;
            border: none;
            outline: none;
            padding: 25px 10px 7.5px;
            border-radius: 4px;
            color: #fff;
            font-weight: 500;
            font-size: 1em;
            border: 1px rgb(236, 72, 153);
            color: black
        }

        section .signin .content .form .inputBox i {
            position: absolute;
            left: 0;
            padding: 15px 10px;
            font-style: normal;
            color: #aaa;
            transition: 0.5s;
            pointer-events: none;
        }

        .signin .content .form .inputBox input:focus~i,
        .signin .content .form .inputBox input:valid~i {
            transform: translateY(-7.5px);
            font-size: 0.8em;
            color: #fff;
        }

        .signin .content .form .links {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: space-between;
        }

        .signin .content .form .links a {
            color: #fff;
            text-decoration: none;
        }

        .signin .content .form .links a:nth-child(2) {
            color: rgb(236, 72, 153);
            font-weight: 600;
        }

        .signin .content .form .inputBox input[type="submit"] {
            padding: 10px;
            background: rgb(236, 72, 153);
            color: rgb(3, 7, 18);
            font-weight: 600;
            font-size: 1.35em;
            letter-spacing: 0.05em;
            cursor: pointer;
        }

        input[type="submit"]:active {
            opacity: 0.6;
        }

        @media (max-width: 900px) {
            section span {
                width: calc(10vw - 2px);
                height: calc(10vw - 2px);
            }
        }

        @media (max-width: 600px) {
            section span {
                width: calc(20vw - 2px);
                height: calc(20vw - 2px);
            }
        }

        .ms-3 {


            background-color: rgb(236, 72, 153);
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .login-label {
            color: rgb(236, 72, 153);
        }

        .login-input {
            color: black
        }
    </style>
</head>

<body>
    <section>
        <div class="signin">
            <div class="content">
                <h2>Register</h2>

                <form method="POST" action="{{ route('register') }}" class="form">
                    @csrf

                    <!-- Name -->
                    <div class="inputBox mt-4">
                        <label class="login-label">Name</label>
                        <input id="name" type="text" class = "login-input" name="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="inputBox mt-4">
                        <label class="login-label">Email</label>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" required
                            autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="inputBox mt-4">
                        <label class="login-label">Password</label>
                        <x-text-input id="password" type="password" name="password" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="inputBox mt-4">
                        <label class="login-label">password confirmation</label>
                        <x-text-input id="password_confirmation" type="password" name="password_confirmation" required
                            autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <!-- Links -->
                    <div class="links mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>
                    </div>

                    <!-- Submit Button -->
                    <div class="inputBox mt-4">
                        <x-primary-button class="ms-3">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>

</html>
