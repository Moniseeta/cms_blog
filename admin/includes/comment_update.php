<?php 
$comment_id=$_GET['c_id'];
$query="SELECT * FROM comments WHERE comment_id={$comment_id}";
$read_result=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($read_result)){
$comment_author=$row['comment_author'];
$comment_email=$row['comment_email'];
$comment_content=$row['comment_content'];
$comment_status=$row['comment_status'];
$comment_date=$row['comment_date'];
?>

<form action="" method="post" role="form">
    <div class="form-group">
        <label for="c_author">Author</label>
        <input class="form-control" name="c_author" value="<?php echo $comment_author;?>">
    </div>
    <div class="form-group">
        <label for="c_email">Email</label>
        <input class="form-control" name="c_email" value="<?php echo $comment_email;?>">
    </div>

    <div class="form-group">
        <label for="c_content">Comment</label>
        <textarea class="form-control" rows="3" name="c_content"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="c_update" value="Update">
</form>
<?php    
}//end of while

  if(isset($_POST['c_update'])){
                    
    $c_author=$_POST['c_author'];
    $c_email=$_POST['c_author'];
    $c_content=$_POST['c_content'];

    $query="UPDATE comments SET comment_author='{$c_author}',comment_email='{$c_email}',comment_content='{$c_content}' ";

    $query .="WHERE comment_id={$comment_id}";

    $c_result=mysqli_query($connection,$query);
    if(!$c_result){
        die('Invalid Query'.mysqli_error($connection));
    }
      header("Location: comments.php");
}
?>
