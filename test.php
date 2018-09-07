<?php
require "db.php";

$password = password_hash("123456", PASSWORD_BCRYPT);

$sql = "INSERT INTO users values (null, 'Jean Harrow', 'jharrow@gmail.com', '$password')";

mysqli_query($conn, $sql);

echo "User created.";

/*var_dump(password_verify('123456', '$2y$10$FtOgB5YF8NUj5HXveCBNI.EseRpM1DEZueUTW9qIU85.NwWEGOKzi'));
die();*/