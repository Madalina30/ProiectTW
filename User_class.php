<?php
/*
 * Class User
 * 
 * Handles database related works
 */
class User {
    
    private $dbHost     = "localhost";
    private $dbUsername = "htmlcss";
    private $dbPassword = "Htmlcsslehs2021!";
    private $dbName     = "LEHS";
    private $userTbl    = 'users';
    
    function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = mysqli_connect($dbHost, $servername, $username, $password);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
    
    function checkUser($userData = array()){
        if(!empty($userData)){
            // Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                // Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET name = '".$userData['name']."', username = '".$userData['username']."', email = '".$userData['email']."', location = '".$userData['location']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = NOW() WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
                $update = $this->db->query($query);
            }else{
                // Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', name = '".$userData['name']."', username = '".$userData['username']."', email = '".$userData['email']."', location = '".$userData['location']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = NOW(), modified = NOW()";
                $insert = $this->db->query($query);
            }
            
            // Get the user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        // Return the user data
        return $userData;
    }
}