<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - TURTLE'S</title>
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
    <div class="cover">
        <img src="/assets/img/login.png" alt="">
        <div class="text">
            <span class="text-1">Welcome back to the taste of home.</span>
            <span class="text-2">Let’s continue the journey!</span>
        </div>
    </div>

    <div class="forms">
        <div class="form-content">
          <div class="login-form">
          <div class="title">Login</div>
            <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="input-boxes">
              <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="login" placeholder="username" required>
              </div>
              <div class="input-box">
                <i class="fas fa-key"></i>
                <input type="password" name="password" placeholder="password" required>
              </div>
              <div class="button input-box">
                <button type="submit">LOG IN</button>
              </div>
              <div class="text sign-up-text">Don't have an account? <a href="{{ route('register') }}">Sign up now</a></div>
            </div>
            </form>
          </div>
        </div>
    </div>
  </div>
</body>

</html>