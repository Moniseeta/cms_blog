<?php
$post_id=$_GET['id'];
$query="DELETE FROM posts WHERE post_id={$post_id}";
$delete_query=mysqli_query($connection,$query);
header("Location: posts.php");
?>