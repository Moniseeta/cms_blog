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
                        
                        <?php
                        if(isset($_GET['source'])){
                            $source=$_GET['source'];
                        }
                        else{
                            $source='';
                        }
                        switch($source){
                            case 'add_post':
                                include "includes/post_add.php";
                                break;
                            case 'update_post':
                                include "includes/post_update.php";
                                break;
                            case 'delete_post':
                                include "includes/post_delete.php";
                                break;
                            default:
                                include "includes/post_view.php";
                                break;    
                        }
                        ?>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        
    <!--FOOTER-->
    <?php include "includes/admin_footer.php"; ?>