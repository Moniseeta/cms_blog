<?php include "includes/db.php"; ?>
<!--HEADER-->
<?php include "includes/header.php"; ?>

<body>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                
                if(isset($_GET['p_id'])){
                    $post_id=$_GET['p_id'];
                }
                $query="SELECT * FROM posts WHERE post_id={$post_id}";
                $result=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($result)){
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                //close the php here
                ?>
                
                <!--INCLUDE THE HTML FOR THE CONTENT OF BLOGS INSIDE LOOP -->
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="<?php echo $post_image ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <?php }//END OF THE WHILE LOOP ?>
                
                
                
                <!-- Blog Comments -->
                
                
                <?php 
                
                if(isset($_POST['c_submit'])){
                    
                    $c_author=$_POST['c_author'];
                    $c_email=$_POST['c_author'];
                    $c_content=$_POST['c_content'];
                    
                    $query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
                    
                    $query .="VALUES({$post_id},'{$c_author}','{$c_email}','{$c_content}','UnApproved',now())";
                    
                    $c_result=mysqli_query($connection,$query);
                    if(!$c_result){
                        die('Invalid Query'.mysqli_error($connection));
                    }
                }
                
                ?>
                
                

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                       
                       <div class="form-group">
                           <label for="c_author">Author</label>
                            <input class="form-control" name="c_author">
                        </div>
                        <div class="form-group">
                           <label for="c_email">Email</label>
                            <input class="form-control" name="c_email">
                        </div>
                       
                        <div class="form-group">
                           <label for="c_content">Comment</label>
                            <textarea class="form-control" rows="3" name="c_content"></textarea>
                        </div>
                        <input type="submit" class="btn btn-primary" name="c_submit" value="Submit">
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div>

                
                
            </div>

            <!--SideBar-->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
        
        
        
<!--FOOTER-->
<?php include "includes/footer.php"; ?>
