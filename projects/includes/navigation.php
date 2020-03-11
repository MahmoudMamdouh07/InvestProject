     <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="../index.php">Home</a>
      <?php
        if(!isset($_SESSION['username']))
        {
            ?>
          <a class="navbar-brand" href="../index.php?login">Login</a>
                   <?php
        }
          ?>

      <?php
        if(isset($_SESSION['user_type']))
        {
            if($_SESSION['user_type'] == "owner")
            {
            ?>
                  <a class="navbar-brand" href="add_project.php">Add project</a>
            <?php
            }
        }
          ?>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <?php
            $select_category = "SELECT * FROM categories";
            $select_category_result = $conn->query($select_category);
            while($row = $select_category_result->fetch_assoc())
            {
                
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            ?>
          <li class="nav-item">
            <a class="nav-link" href="../category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
          </li>
          <?php
            }
            ?>
            <?php
        if(isset($_SESSION['username']))
        {
            ?>
                  <a class="navbar-brand" href="../index.php?logout">Logout</a>
            <?php
        }
          ?>
          
        </ul>
      </div>
    </div>
  </nav>
