<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th> Id </th>
            <th> Author </th>
            <th> Title </th>
            <th> Category </th>
            <th> Status </th>
            <th> Image </th>
            <th> Tags </th>
            <th> Comments </th>
            <th> Date </th>
            <th> Delete </th>
            <th> Edit </th>
        </tr>
    </thead>
    <?php
    $query="SELECT * FROM posts";    
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
    $post_id=$row['post_id'];
    $post_title=$row['post_title'];
    $post_author=$row['post_author'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_tags=$row['post_tags'];
    $post_comment_count=$row['post_tags'];
    $post_date=$row['post_date'];
        
    $query_cat="SELECT * FROM categories WHERE cat_id={$post_category_id}";
    $result_cat=mysqli_query($connection,$query_cat);
    $row_cat=mysqli_fetch_assoc($result_cat);
    $cat_title_post=$row_cat['cat_title'];
    ?>
    <tbody>
        <tr>
            <td>
                <?php echo $post_id ?>
            </td>
            <td>
                <?php echo $post_author ?>
            </td>
            <td>
                <?php echo $post_title ?>
            </td>
            <td>
                <?php echo $cat_title_post ?>
            </td>
            <td>
                <?php echo $post_status ?>
            </td>
            <td> <img width="100" src="<?php echo $post_image; ?>"></td>
            <td>
                <?php echo $post_tags ?>
            </td>
            <td>
                <?php echo $post_comment_count ?>
            </td>
            <td>
                <?php echo $post_date ?>
            </td>
            <td>
                <a <?php echo "href='posts.php?source=delete_post&id={$post_id}'" ; ?>><i class="fa fa-trash-o"></i></a>
            </td>
            <td>
                <a <?php echo "href='posts.php?source=update_post&id={$post_id}'" ; ?>><i class="fa fa-pencil-square-o"></i></a>
            </td>
        </tr>
    </tbody>
    <?php } ?>

</table>
