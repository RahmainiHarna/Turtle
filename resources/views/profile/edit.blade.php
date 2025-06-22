<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - TURTLE'S</title>

    <!-- Favicons -->
    <link href="/assets/img/logo-turtles.png" rel="icon">
    <link href="/assets/img/logo-turtles.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" 
            rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/profile.css">
</head>
<body>
<div class="container">
    <h2>My <span>Profile</span></h2>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error-message">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grid">
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username', $user->username) }}">

                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">

                <label for="no_hp">Phone Number</label>
                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}">
            </div>

            <div>
                <label for="password">New Password</label>
                <input type="password" id="password" name="password">

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation">

                <label for="photo">Profile Photo</label>
                <input type="file" id="photo" name="photo" onchange="previewPhoto(event)">

                @if($user->photo)
                    <img src="{{ asset($user->photo) }}" class="preview-img" id="preview">
                @else
                    <img src="#" class="preview-img" id="preview" style="display: none;">
                @endif
            </div>
        </div>

        <div class="button-wrapper">
            <a href="{{ url('/') }}" class="btn-back"><i class="fa-solid fa-arrow-left" style="margin-right: 8px;"></i>BACK</a>
            <button type="submit" class="btn-update"><i class="fa-solid fa-floppy-disk" style="margin-right: 8px;"></i>SAVE</button>
        </div>
    </form>

</div>

<script>
    function previewPhoto(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    }
</script>
</body>
</html>
