<?php
require "../includes/header.php";
require "../includes/db.php"; ?>
<?php
require "./includes/navigation.php";
require "../classes.php";
$db = new Database;
$loginSystem = new loginSystem;
if(isset($_POST['create_post']))
{
        $project_name = $_POST['project_name'];
        $project_cost_per_share = $_POST['project_cost_per_share'];
        $project_needed_money = $_POST['project_needed_money'];
        $project_predicted_profit = $_POST['project_predicted_profit'];
        $project_category = $_POST['project_category'];    
        $project_image = $_FILES['image']['name'];
        $project_image_temp = $_FILES['image']['tmp_name'];   
      //  $post_comment_counter = 4;
        $project_date = date('d-m-y');
        $project_description = $_POST['project_description'];
move_uploaded_file($project_image_temp,"../images/$project_image");

$loginSystem->add_post($_SESSION['username'], $project_name, $project_needed_money, $project_cost_per_share, $project_predicted_profit, $project_category, $project_image, $project_image_temp, $project_date, $project_description);
}

?> 
   <form action="" method="post" enctype="multipart/form-data">
<br><br><br>
                                                  
                         <div class="form-group">

                         <select name="project_category" id="">
                         
                         <?php
    
     $query = "SELECT * FROM categories";
                $select_result = mysqli_query ($conn,$query);
                                     while ($row =mysqli_fetch_assoc($select_result))
                                     {
                                         $cat_id = $row['cat_id'];
                                         $cat_title = $row['cat_title'];
    
                                         
                                         echo "<option value='$cat_id'>$cat_title</option>";

                                     }
    ?>
                         
                                                        </select>
                                      </div>
                         
                          
                         
                         
                           <div class="form-group">
                             <label for="title">Project name</label>
                             <input type="text" class="form-control" name="project_name">
                         </div>
                         <div class="form-group">
                             <label for="title">Project Needed Money</label>
                             <input type="text" class="form-control" name="project_needed_money">
                         </div>
                         <div class="form-group">
                             <label for="title">Project Cost Per Share</label>
                             <input type="text" class="form-control" name="project_cost_per_share">
                         </div>
                         <div class="form-group">
                             <label for="title">Project Predicted Profit</label>
                             <input type="text" class="form-control" name="project_predicted_profit">
                         </div>
                
                            <div class="form-group">
                             <label for="project_image">Project Image</label>
                             <input type="file" name="image">
                         </div>
                         
               <div class="form-group">
                     <label for="post_content">Project description</label>
                     <textarea class="form-control" name="project_description" id="" cols="30" $_POSTs="10">
                              </textarea> </div>
                         
                         
                          <div class="form-group">
                             
                             <input class="btn btn-primary" type="submit" name="create_post" value="Publish Post">
                         </div>
  
                            </form>