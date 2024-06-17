<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CAPS</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Link para agregar botones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: #a5edfd;
        }
    </style>

    <style>
        .alert-container {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>

    <style>
      <style>
        .alert-container {
            max-width: 400px;
            margin: 0 auto;
        }
    </style>

    <style>
        footer {
            text-align: center;
            padding: 10px;
        }

        .image-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px; /* Espacio entre las imágenes */
            flex-wrap: wrap;
        }

        .image-footer img {
            max-width: 250px; /* Aumenta el tamaño máximo de las imágenes */
            height: auto;
        }
    </style>
    </style>

    @yield('head') <!-- Aquí se insertará el contenido del head de cada vista -->
</head>
<body>
    @yield('body') <!-- Aquí se insertará el contenido del body de cada vista -->

    <!-- Footer común -->
    <footer>
        <div class="image-footer">
            <img src="{{ asset('img/LOGOAPS.png') }}" alt="Logo aps" class="logoaps">
            <img src="{{ asset('img/LOGOMUNI.png') }}" alt="Logo muni" class="logomuni">
        </div>
    </footer>
</body>
</html>
