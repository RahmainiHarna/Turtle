<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TURTLE'S</title>

    <!-- Favicons -->
    <link href="/assets/img/logo-turtles.png" rel="icon">
    <link href="/assets/img/logo-turtles.png" rel="apple-touch-icon">
    <link href="/assets/css/auth.css" rel="stylesheet">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
</head>
<body>
  <div class="video-background">
    <video autoplay muted loop playsinline>
        <source src="{{ asset('loginregis.mp4') }}" type="video/mp4">
    </video>
  </div>

  <div class="container">
    <div class="forms">
        <div class="form-content">
          <div class="signup-form">
          <div class="title">Signup</div>
            <form action="{{ route('register.submit') }}" method="POST">
            @csrf
              <div class="input-boxes">
                <div class="input-box">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" placeholder="username" required>
                </div>
                <div class="input-box">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="email" required>
                </div>
                <div class="input-box">
                    <i class="fas fa-phone"></i>
                    <input type="number" name="no_hp" placeholder="phone number" required>
                </div>
                <div class="input-box">
                    <i class="fas fa-key"></i>
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <div class="input-box">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password_confirmation" placeholder="password confirmation" required>
                </div>
                <div class="button input-box">
                    <button type="submit">SIGN UP</button>
                </div>
                <div class="text login-text">Already have an account? <a href="{{ route('login') }}">Log in now</a></div>
              </div>
            </form>
          </div>
        </div>
    </div>

    <div class="cover">
        <img src="/assets/img/regis.png" alt="">
        <div class="text">
          <span class="text-1">Tradition served on every plate.</span>
          <span class="text-2">Be part of the Turtle’s family!</span>
      </div>
    </div>
  </div>
</body>
</html>