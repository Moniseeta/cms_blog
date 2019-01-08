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
                //php starts
                
                 if(isset($_POST['submit'])){
                 $search = $_POST['search'];
                 $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                 $result=mysqli_query($connection,$query);
                 if(!$result){
                   die("Query Failed".mysqli_error($connection));
                 }
                 $count=mysqli_num_rows($result);
                 if($count == 0){
                   echo "<h1>No Results Found</h1>";
                 }
                 else{
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
                <?php }//end of while
                 }//end of inner else
                 }//end of outer if ?>                
            </div>

            <!--SideBar-->
            <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
        
<!--FOOTER-->
<?php include "includes/footer.php"; ?>
