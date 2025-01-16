<?php
include("conn.php");

if (isset($_GET['id'])) {
    $notification_id = intval($_GET['id']);
    $update_sql = "UPDATE notifications SET is_read = 1 WHERE id = $notification_id";
    mysqli_query($conn, $update_sql);
}

header("Location: notifications.php");
exit();
?>
