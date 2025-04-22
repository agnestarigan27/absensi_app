<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <form method="POST" action="{{ route('auth.verify') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        @if(session('msg'))
            <p>{{ session('msg') }}</p>
        @endif
    </form>
</body>
</html>
