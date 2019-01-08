<?php 
$id=$_GET['id'];
$query="SELECT * FROM posts WHERE post_id={$id}";
$read_result=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($read_result)){
$post_title=$row['post_title'];
$post_author=$row['post_author'];
$post_category_id=$row['post_category_id'];
$post_status=$row['post_status'];
$post_image=$row['post_image'];
$post_tags=$row['post_tags'];
$post_comment_count=$row['post_tags'];
$post_date=$row['post_date'];
$post_content=$row['post_content'];
?>

<form action="" method="post" enctype="multipart/form-data">
   
   <div class="form-group">
      <label for="post_title">Post Title</label>
      <input type="text" name="post_edit_title" class="form-control" value="<?php echo $post_title;  ?>"> 
   </div>
   
   <div class="form-group">
      <label for="post_category_id">Post Category Id</label>
      <input type="text" name="post_edit_category_id" class="form-control" value="<?php echo $post_category_id;  ?>"> 
   </div>
   
   <div class="form-group">
      <label for="post_author">Post Author</label>
      <input type="text" name="post_edit_author" class="form-control" value="<?php echo $post_author;  ?>"> 
   </div>
   
   <div class="form-group">
      <label for="post_status">Post Status</label>
      <input type="text" name="post_edit_status" class="form-control" value="<?php echo $post_status;  ?>"> 
   </div>
   
   <div class="form-group">
      <label for="post_image">Post Image</label>
      <input type="text" name="post_edit_image" class="form-control" value="<?php echo $post_image;  ?>"> 
   </div>
   
   <div class="form-group">
      <label for="post_tags">Post Tags</label>
      <input type="text" name="post_edit_tags" class="form-control" value="<?php echo $post_tags;  ?>"> 
   </div>
   
   <div class="form-group">
      <label for="post_content">Post Content</label>
       <textarea  name="post_edit_content" class="form-control" cols="30" rows="10" id="" value="<?php echo $post_content;  ?>"> </textarea>
   </div>
   
   <div class="form-group">
       <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
   </div>
</form>

<?php    
}//end of while

if(isset($_POST['update_post'])){
$post_title=$_POST['post_edit_title'];
$post_author=$_POST['post_edit_author'];
$post_category_id=$_POST['post_edit_category_id'];
$post_status=$_POST['post_edit_status'];
$post_image=$_POST['post_edit_image'];
$post_tags=$_POST['post_edit_tags'];
$post_comment_count=$_POST['post_edit_tags'];
$post_content=$_POST['post_edit_content'];    
$query="UPDATE posts SET post_title='{$post_title}',post_author='{$post_author}',post_category_id={$post_category_id},post_status='{$post_status}',post_image='{$post_image}',post_tags='{$post_tags}',post_comment_count='{$post_comment_count}',post_content='{$post_content}' WHERE post_id={$id}";
$result=mysqli_query($connection,$query);    
if(!$result){
die("Invalid Query".mysqli_error($connection));
}
header("Location: posts.php");
}
?>