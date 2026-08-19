<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Senha">
        <button type="submit">Entrar</button>
    </form>
</body>
</html>