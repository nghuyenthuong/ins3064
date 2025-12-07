
/* 1. Set "username" Cookie with Expiry  */
<?php
setcookie("username", "Gulnara Serik", time() + 3600, "/");
echo "Cookie 'username' has been set.";
?>

/* 2. Retrieve "username" Cookie */
<?php
if(isset($_COOKIE["username"])) {
    echo "Username is: " . $_COOKIE["username"];
} else {
    echo "Username cookie is not set.";
}
?>

/* 3. Delete "username" Cookie */
<?php
setcookie("username", "", time() - 3600, "/");
echo "Cookie 'username' has been deleted.";
?>

/* Set "userid" Session Variable */
<?php
session_start();
$_SESSION["userid"] = 12345;
echo "Session variable 'userid' has been set.";
?>

/* Retrieve "userid" Session Variable */
<?php
session_start();
if(isset($_SESSION["userid"])) {
    echo "User ID is: " . $_SESSION["userid"];
} else {
    echo "User ID session variable is not set.";
}
?>

/* 6. Destroy Session and Unset Variables */
<?php
session_start();
session_unset();
session_destroy();
echo "Session has been destroyed and variables have been unset.";
?>

/* 7. Set Secure Cookie Over HTTPS */
<?php
setcookie("secure_username", "Gulnara Serik", time() + 3600, "/", "", true, true);
echo "Secure cookie 'secure_username' has been set.";
?>

/* 8. Check for "visited" Cookie */
<?php
if(isset($_COOKIE["visited"])) {
    echo "Welcome back!";
} else {
    setcookie("visited", "yes", time() + 3600, "/");
    echo "This is your first visit.";
}
?>

/* 9. Store Array in Session Variable */
<?php
session_start();
$_SESSION["user_data"] = array("name" => "Gulnara Serik", "email" => "gulnara@example.com");
echo "Array has been stored in session variable 'user_data'.";
?>

/* 10. Retrieve Session User Preferences */
<?php
session_start();
if(isset($_SESSION["user_data"])) {
    $user_data = $_SESSION["user_data"];
    echo "Name: " . $user_data["name"] . "<br>";
    echo "Email: " . $user_data["email"];
} else {
    echo "User preferences are not set in the session.";
}
?>

/* 11. Session Timeout After 30 Minutes */
<?php
session_start();
$timeout_duration = 1800; // 30 minutes

if (isset($_SESSION['LAST_ACTIVITY']) && 
    (time() - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    echo "Session has timed out due to inactivity.";
} else {
    $_SESSION['LAST_ACTIVITY'] = time();
    echo "Session is active.";
}
?>

/* 12. Display Number of Active Sessions */
<?php
session_start();
if(!isset($_SESSION['active_sessions'])) {
    $_SESSION['active_sessions'] = 0;
}
$_SESSION['active_sessions'] += 1;
echo "Number of active sessions: " . $_SESSION['active_sessions'];
?>

/* 13. Limit Maximum Concurrent Sessions (3 sessions/user) */
<?php
session_start();
if(!isset($_SESSION['session_count'])) {
    $_SESSION['session_count'] = 0;
}
if($_SESSION['session_count'] < 3) {
    $_SESSION['session_count'] += 1;
    echo "Session started. Current session count: " . $_SESSION['session_count'];
} else {
    echo "Maximum concurrent sessions reached.";
}
?>

/* 14. Regenerate Session ID to Prevent Fixation */
<?php
session_start();
session_regenerate_id(true);
echo "Session ID has been regenerated to prevent fixation.";
?>

/* 15. Display Last Session Access Time */
<?php
session_start();
if(isset($_SESSION['LAST_ACTIVITY'])) {
    echo "Last session access time: " . date("Y-m-d H:i:s", $_SESSION['LAST_ACTIVITY']);
} else {
    echo "No last session access time available.";
}
?>

/* 16. Set Cookie and Session Variable with Same Name */
<?php
setcookie("user", "CookieUser", time() + 3600, "/");
session_start();
$_SESSION["user"] = "SessionUser";
echo "Cookie and session variable 'user' have been set.";       
?>

