<?php
if(isset($_POST['create_post'])){
    $title=$_POST['post_title'];
    $author=$_POST['post_author'];
    $category_id=$_POST['post_category_id'];
    $status=$_POST['post_status'];
    $image=$_POST['post_image'];
    $tags=$_POST['post_tags'];
    $content=$_POST['post_content'];
    $comment_count=4;
    
    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
    $query .= "VALUES({$category_id},'{$title}','{$author}',now(),'{$image}','{$content}','{$tags}','{$comment_count}','{$status}')";
    
    $add_result=mysqli_query($connection,$query);
    if(!$add_result){
        die("Invalid query".mysqli_error($connection));
    }

}//end of if
?>




<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post Category Id</label><br>
        <select name="post_category_id">
            <?php 
            $query="SELECT * FROM categories";
            $result=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($result)){
                $cat_title=$row['cat_title'];
                $cat_id=$row['cat_id'];
                ?>
            <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
            <?php
            }
            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="text" name="post_image" class="form-control" placeholder="Paste the link of the picture here">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" cols="30" rows="10" id=""> </textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>
