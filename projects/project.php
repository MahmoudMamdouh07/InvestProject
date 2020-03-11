<?php include "../includes/db.php"; ?>
  <?php include "../includes/header.php"; ?>

  <!-- Navigation -->
 <?php include "./includes/navigation.php"; ?>

<?php if(isset($_GET['p_id']))
    $project_id = $_GET['p_id'];
    ?>
  <!-- Page Content -->
        <br><br>

  <div class="container">

    <div class="row">
          

<?php
          $select_query = "SELECT * FROM projects WHERE project_id = " . $project_id . "";
          $select_query_result = $conn->query($select_query);
          while($row = $select_query_result->fetch_assoc())
          {
              $project_name = $row['project_name'];
              $project_description = $row['project_description'];
              $project_cost_per_share = $row['project_cost_per_share'];
              $project_needed_money = $row['project_needed_money'];
              $project_predicted_profit = $row['project_predicted_profit'];
              $project_owner = $row['project_owner'];
              $project_publish_date = $row['project_publish_date'];
              $project_category = $row['project_category'];
              $project_image = $row['project_image'];
              
              
              $get_owner_name_query = "SELECT * FROM project_owner WHERE project_owner_username = '" . $project_owner . "'";
              $name_query_result = $conn->query($get_owner_name_query);
              while($row = $name_query_result->fetch_assoc())
              {
                                $project_owner_name = $row['project_owner_name'];
              
          ?>
        
      <!-- Post Content Column -->

      <div class="col-lg-8">

        <!-- Title -->
        
        <h1 class="mt-4">  
<?php echo $project_name; ?></h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#"><?php echo $project_owner_name;} ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p><?php echo $project_publish_date; ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="../images/<?php echo $project_image; ?>" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $project_description; ?></p>

        <hr>

        <!-- Comments Form -->
 

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Financial details</h5>
          <div class="card-body">
            <p>Project needed money is <?php echo $project_needed_money; ?></p>
            <p>Project cost per share is <?php echo $project_cost_per_share; ?></p>
            <p>Project predicted profit is <?php echo $project_predicted_profit; ?></p>
          </div>
        </div>

      </div>
<?php 
          }
        ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

</body>

</html>
