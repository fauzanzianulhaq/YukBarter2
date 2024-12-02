<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
    <h2>Set a New Password</h2>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">
        <input type="password" name="password" placeholder="New Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
