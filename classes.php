<?php
ob_start();
class Database{
   private $server_name = "localhost";
   private $username    = "root";
   private $password    = "";
   private $dbname      = "college";
   public $link;
    public $error;
    public function __Construct()
    {
        $this->connect();
    }
    public function connect(){
              $this->link = new mysqli($this->server_name, $this->username, $this->password, $this->dbname);
        if(!$this->link)
        {
                      $this->error = "Connection failed: " . $this->link->connect_error;
            return false;
        }
    }

    public function query($sql)
    {
      $result = $this->link->query($sql) or die($this->link->error.__LINE__);
        if($result->num_rows > 0)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
      
}
class loginSystem{
    public function login($username, $password)
    {

        $db = new Database;
        $query = $db->query("SELECT * FROM users WHERE username = '" . $username . "' AND user_password = '" . $password . "'");
        if($query)
        {
            while($row = $query->fetch_assoc())
            {
                $_SESSION["username"] = $row["username"];
                $_SESSION["user_password"] = $row["user_password"];
                $_SESSION["user_email"] = $row["user_email"];
                $_SESSION["user_phone"] = $row["user_phone"];
                $_SESSION["user_type"] = $row["user_type"];
                sleep(1);
                header("Location: ./index.php");
            }
        }

        /*$count = $query->rowCount();
        if($count == 1)
        {
            sleep(1);
        header("Location: ./index.php");
            
        }*/
        else
         {
            echo "<h1>Wrong password</h1>";
         }

    }
    public function register($name, $username, $password, $user_type, $user_email, $user_phone)
    {
        $db = new Database;
        $query = $db->query("SELECT username FROM users WHERE username = '" . $username . "'");
        if($query->num_rows > 0)
        {   
            echo "Username Already exist";
        }
      /*  $count = $query->rowCount();
        if($count == 1)
        {
            echo "Username Already exist";
        }*/
        else
         {
            $query_insert_user = $db->query("INSERT INTO users (name, username , user_password, user_type, user_email, user_phone) VALUES ('" . $name . "' ,'" . $username . "' , '" . $password . "' , '" . $user_type . "','" . $user_email . "', '" . $user_phone . "')");
         
            if($user_type == "owner")
            {
               
            $query_insert = $db->query("INSERT INTO project_owner (project_owner_name, project_owner_username , project_owner_password, project_owner_email, project_owner_contact_number) VALUES ('" . $name . "' ,'" . $username . "' , '" . $password . "' ,'" . $user_email . "', '" . $user_phone . "')");
                      }
            elseif($user_type == "investor")
            {
                $query_insert = $db->query("INSERT INTO investors (investor_name, investor_username , investor_password, investor_email, investor_contact_number) VALUES ('" . $name . "' ,'" . $username . "' , '" . $password . "' ,'" . $user_email . "', '" . $user_phone . "')");       
            }
                  echo "A new user has been registered";

        }

    }
    
    public function add_post($username, $project_name, $project_needed_money, $project_cost_per_share, $project_predicted_profit, $project_category, $project_image, $project_image_temp, $project_date, $project_description)
    {
        $db = new Database;

$query_insert = "INSERT INTO projects(project_name, project_category, project_owner, project_publish_date, project_image, project_description, project_cost_per_share, project_needed_money, project_predicted_profit)";
    
$query_insert.= " VALUES('{$project_name}','{$project_category}','{$username}',now(),'{$project_image}', '{$project_description}','{$project_cost_per_share}','{$project_needed_money}','{$project_predicted_profit}') ";
$query_result = $db->query($query_insert);
    }
       /* public function clean($data)
    {
        if(!empty($data))
        {
            $data = trim(strip_tags(stripslashes(mysqli_real_escape_string($data))));
            return $data;
        }
    }*/
    
}
?>