<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th> Id </th>
            <th> Author </th>
            <th> Comment </th>
            <th> Email </th>
            <th> Status </th>
            
            <th> In Response To </th>
            
            <th> Date </th>
            
            <th> Approve </th>
            <th> Unapprove </th>
            
            
            <th> Edit </th>
            <th> Delete </th>
        </tr>
    </thead>
    <?php
    $query="SELECT * FROM comments";    
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
        $comment_id=$row['comment_id'];
        $comment_post_id=$row['comment_post_id'];
        $comment_author=$row['comment_author'];
        $comment_email=$row['comment_email'];
        $comment_content=$row['comment_content'];
        $comment_status=$row['comment_status'];
        $comment_date=$row['comment_date'];
        
        $p_query="SELECT * FROM posts WHERE post_id={$comment_post_id}";
        $p_result=mysqli_query($connection,$p_query);
        $p_row=mysqli_fetch_assoc($p_result);
    ?>
    <tbody>
        <tr>
            <td>
                <?php echo $comment_id ?>
            </td>
            <td>
                <?php echo $comment_author ?>
            </td>
            <td>
                <?php echo $comment_content ?>
            </td>
            <td>
                <?php echo $comment_email ?>
            </td>
            <td>
                <?php echo $comment_status ?>
            </td>
            <td>
                <a href="../post.php?p_id=<?php echo $comment_post_id ?>"><?php echo $p_row['post_title'] ?></a>
            </td>
            
             <td>
                <?php echo $comment_date ?>
            </td>
            
            <td>
                <a <?php echo "href='comments.php?source=delete_comment&c_id={$comment_id}'" ; ?>>Approve</a>
            </td>
            
            <td>
                 <a <?php echo "href='comments.php?source=delete_comment&c_id={$comment_id}'" ; ?>>UnApprove</a>
            </td>
           
           <td>
                <a <?php echo "href='comments.php?source=update_comment&c_id={$comment_id}'" ; ?>><i class="fa fa-pencil-square-o"></i></a>
            </td>
           
            <td>
                <a <?php echo "href='comments.php?source=delete_comment&c_id={$comment_id}'" ; ?>><i class="fa fa-trash-o"></i></a>
            </td>
        </tr>
    </tbody>
    <?php } ?>

</table>
