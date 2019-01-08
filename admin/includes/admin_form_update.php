                            
                            <form action="" method="post">
                                
                                <div class="form-group">
                                    <label for="cat_edit_title">Edit Category</label>
                                    <?php 
                                    
                                    $cat_id=$_GET['edit'];
                                    $query="SELECT * FROM categories WHERE cat_id={$cat_id}";
                                    $edit_query=mysqli_query($connection,$query);
                                    while($row= mysqli_fetch_assoc($edit_query)){
                                        $cat_id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];
                                        echo "<input type='text' name='cat_edit_title' class='form-control' value='{$cat_title}'>";
                                    }
                                    
                                    if(isset($_POST['edit_submit'])){
                                    $cat_edit_title = $_POST['cat_edit_title'];
                                    if($cat_edit_title == "" || empty($cat_title)){
                                    echo "This field should NOT be empty";
                                    }
                                    else{
                                    $query="UPDATE categories SET cat_title='{$cat_edit_title}' WHERE cat_id={$cat_id}";
                                    $edit_category_query=mysqli_query($connection,$query);    
                                    if(!$edit_category_query){
                                    die("Invalid Query".mysqli_error($connection));
                                    }
                                        header("Location: categories.php");
                                    }
                                    }
                                    ?>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <input type="submit" name="edit_submit" value="Edit Category" class="btn btn-primary">
                                </div>
                                
                            </form>