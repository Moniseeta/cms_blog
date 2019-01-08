<!--HEADER-->
<?php include "includes/admin_header.php"; ?>
<body>

    <div id="wrapper">

        <!--NAVIGATION-->
        <?php include "includes/admin_navigation.php"; ?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">
                           
                           <?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];
                                if($cat_title == "" || empty($cat_title)){
                                    echo "This field should NOT be empty";
                                }
                                else{
                                    $query="INSERT INTO categories(cat_title) VALUE('{$cat_title}')";
                                    $create_category_query=mysqli_query($connection,$query);
                                    if(!$create_category_query){
                                        die("Invalid Query".mysqli_error($connection));
                                    }
                                }
                            }
                            ?>
                           
                           
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input type="text" name="cat_title" class="form-control">
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" name="submit" value="Add Category" class="btn btn-primary">
                                </div>
                                
                            </form>
                         
                            <?php 
                            if(isset($_GET['edit'])){
                               include "includes/admin_form_update.php";        
                            } ?>
                            
                            
                        </div><!--add category form-->
                        
                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Id </th>
                                        <th> Category Title </th>
                                    </tr>
                                </thead>

                                <?php
                                $query="SELECT * FROM categories";
                                $result=mysqli_query($connection,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                $title=$row['cat_title'];
                                $id=$row['cat_id'];
                                ?>
                                <tbody>
                                    <tr>
                                <?php
                                echo "<td> $id </td>";
                                echo "<td> $title </td>";
                                    
                                ?>
                                   <td><a <?php echo "href='categories.php?delete={$id}'"; ?>><i class="fa fa-trash-o"></i></a>
                                   </td>
                                   <td><a <?php echo "href='categories.php?edit={$id}'"; ?>><i class="fa fa-pencil-square-o"></i></a>
                                   </td>
                                    </tr>
                                </tbody>
                                
                                <?php } ?>
                                
                                <?php 
                                if(isset($_GET['delete'])){
                                    $cat_id=$_GET['delete'];
                                    $query="DELETE FROM categories WHERE cat_id={$cat_id}";
                                    $delete_query=mysqli_query($connection,$query);
                                    header("Location: categories.php");
                                }
                                ?>
                                
                            </table>
                        </div><!--add category form-->
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
    <!--FOOTER-->
    <?php include "includes/admin_footer.php"; ?>