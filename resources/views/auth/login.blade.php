<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Screen Video Background</title>
    <!-- <link rel="stylesheet" href="login.css"> -->
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: Arial, sans-serif;
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        #background-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Login Form Styling */
        .login-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            padding: 30px 40px;
            border-radius: 8px;
            color: white;
            width: 300px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            text-align: center;
            /* Elemen dalam login-container akan rata tengah */
        }

        .login-container h1 {
            margin-bottom: 20px;
        }

        .login-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        .login-container button:hover {
            background: #0056b3;
        }

        .login-container p {
            margin-top: 15px;
            font-size: 0.9rem;
        }

        .login-container a {
            color: #007BFF;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Video Background -->
    <video autoplay muted loop id="background-video">
        <source src="{{ asset('login.mp4') }}" type="video/mp4">
    </video>

    <!-- Login Form -->
    <div class="login-container">
        <h1>Login</h1>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <input type="text" name="login" placeholder="Ussername" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
            <p>Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a></p>
        </form>
    </div>
</body>

</html>