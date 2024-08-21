<!DOCTYPE html>
<html lang="en">
<head>
    <title>Carbook - Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        body {
            background-color: #85a9cd;
            font-family: 'Poppins', sans-serif;
        }

        .navbar-brand {
            font-weight: 600;
            color: #0f161d !important;
        }

        .navbarcolor{
            background-color: #78a0c7;
        }

        .login-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-box {
            background: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .login-box h2 {
            margin-bottom: 1.5rem;
            font-weight: 500;
            text-align: center;
            color: #343a40;
        }

        .form-control {
            border-radius: 4px;
            padding: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 4px;
            padding: 10px;
            font-weight: 500;
            width: 100%;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-check-label {
            font-weight: 400;
        }

        .forgot-password,
        .sign-up-link {
            text-align: right;
            display: block;
            margin-top: 10px;
        }

        .sign-up-link {
            text-align: center;
            margin-top: 20px;
        }

        .toggle-password {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbarcolor shadow">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">MyCar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <!-- Formulaire de connexion -->
            <form action="{{ route('login') }}" method="POST">
                @csrf

                <!-- Affichage des erreurs -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group position-relative">
                    <label for="password">Password</label>
                    <input id="password-field" type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye toggle-password position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);"></span>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Remember Me</label>
                </div>

                <button type="submit" class="btn btn-primary">Sign In</button>

                <a href="#" class="forgot-password">Forgot Password?</a>

                <p class="sign-up-link">Not a member? <a href="{{ route('register.form') }}">Sign Up</a></p>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        // Script pour basculer l'affichage du mot de passe
        $(".toggle-password").click(function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script>
     @if (Session::has('success'))
     <script>
         toastr.success("{{ Session::get('success') }}");
 
     </script>
               @endif
 
     @if (Session::has('error'))
     <script>
         toastr.error("{{ Session::get('error') }}");
 
     </script>
               @endif
</body>
</html>
