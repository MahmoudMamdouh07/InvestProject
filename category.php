<?php include "./includes/db.php"; ?>
  <?php include "./includes/header.php"; ?>

  <!-- Navigation -->
 <?php include "./includes/navigation.php"; ?>
<?php

if(isset($_GET['category']))
{
    $cat_title = $_GET['category'];
    ?>
     <div class="container">
    
    <!-- Page Features -->
    <div class="row text-center">
    <?php 
        $select_projects_query = "SELECT * FROM projects WHERE project_category = '" . $cat_id . "'";
        $select_query = $conn->query($select_projects_query);
        while($row = $select_query->fetch_assoc())
           {
                $project_id = $row['project_id'];
                $project_name = $row['project_name'];
                $project_description = $row['project_description'];
                $project_image = $row['project_image'];
        ?>
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="./images/<?php echo $project_image; ?>" alt="">
          <div class="card-body">
            <h4 class="card-title"><?php echo $project_name; ?></h4>
            <p class="card-text"><?php echo $project_description; ?></p>
          </div>
          <div class="card-footer">
            <a href="projects/project.php?p_id=<?php echo $project_id;  ?>" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>

        <?php
        }
        ?>

    </div>
    <!-- /.row -->
  </div>
  <?php
}
?>