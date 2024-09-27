<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAPS</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom CSS -->
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }

        body {
            background-color: rgb(108, 199, 219);
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Asegura que el cuerpo tenga al menos el 100% de la altura de la pantalla */
        }

        .content-wrapper {
            flex-grow: 1; /* Esto empuja el footer hacia abajo */
        }

        .alert-container {
            max-width: 90%;
            margin: 0 auto;
        }

        footer {
            text-align: center;
            padding: 10px;
        }

        .image-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            flex-wrap: nowrap;
        }

        .image-footer img {
            max-width: 150px;
            height: auto;
        }

        @media (min-width: 768px) {
            .alert-container {
                max-width: 400px;
            }

            .image-footer img {
                max-width: 200px;
            }
        }

        @media (min-width: 1024px) {
            .image-footer img {
                max-width: 250px;
            }
        }

        /* Additional responsive styles */
        .btn-custom {
            width: 100%;
            max-width: 300px;
            margin: 10px auto;
        }

        @media (min-width: 768px) {
            .btn-custom {
                max-width: 200px;
            }
        }
    </style>

    @yield('head') <!-- Aquí se insertará el contenido del head de cada vista -->
</head>
<body>
    <div class="content-wrapper">
        @yield('body') <!-- Aquí se insertará el contenido del body de cada vista -->
    </div>

    <!-- Footer común -->
    <footer>
        <div class="image-footer">
            <img src="{{ asset('img/LOGOAPS.png') }}" alt="Logo APS" class="logoaps">
            <img src="{{ asset('img/LOGOMUNI.png') }}" alt="Logo Muni" class="logomuni">
        </div>
    </footer>
</body>
</html>