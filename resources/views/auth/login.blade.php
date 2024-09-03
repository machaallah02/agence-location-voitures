<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Carbook - Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    {{-- lien bootstrap cdn--}}
    
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

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

    <!-- Formulaire de connexion -->
    <div class="login-container">
        <div class="login-box">
            <h2>Connexion</h2>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

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
                    <label for="email">Adresse Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Entrez votre email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group position-relative">
                    <label for="password">Mot de passe</label>
                    <input id="password-field" type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe" required>
                    <span toggle="#password-field" class="fa fa-fw fa-eye toggle-password position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);"></span>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">Se souvenir de moi</label>
                </div>

                <button type="submit" class="btn btn-primary">Se connecter</button>

                <a href="#" class="forgot-password">Mot de passe oublié?</a>

                <p class="sign-up-link">Pas encore membre? <a href="{{ route('register.form') }}">Inscrivez-vous</a></p>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
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

        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif
    </script>
</body>
</html>
