 <?php
include ("../includes/functions.php");
connect();
session_start();

$username = protect($_POST['username']);
$password = protect($_POST['password']);
$email = protect($_POST['email']);

if (strlen($username) > 20) {
    echo "Username too long. Max 20 chars";
} elseif (strlen($email) > 100) {
    echo "Email too long. Max 100 chars";
} else {
    $register1 = mysql_query("SELECT id FROM users WHERE username='$username'") or
        die(mysql_error());
    $register2 = mysql_query("SELECT id FROM users WHERE email='$email'") or die(mysql_error
        ());
    if (mysql_num_rows($register1) > 0) {
        echo "Username already in use";
    } elseif (mysql_num_rows($register2) > 0) {
        echo "Email address already in use";
    } else {
		$defaultinventory = "12:1;1:10;4:1";
		$defaultloottime = date("Y-m-d H:i:s", "2000-1-1 00:00:00");
        $ins1 = mysql_query("INSERT INTO users (username, password, email, gamestate) VALUES ('$username', '" . md5($password) . "', '$email', '0')") or die(mysql_error());
		$ins2 = mysql_query("INSERT INTO inventories (inventory) VALUES ('$defaultinventory')") or die(mysql_error());
		$ins3 = mysql_query("INSERT INTO misc_data (timesinceloot) VALUES ('$defaultinventory')") or die(mysql_error());
        header("Location: ../login");
    }
}

?>
