<?php
require_once("../db_config.php");
class User{
  
  // These are User properies
  private $username;
  private $password;
  private $role_id;
  
  // This is a constructor function
  function User($_username,$_password,$_role_id){
	  $this->username=$_username;
	  $this->password=$_password;
	  $this->role_id=$_role_id;
  }	
  
  // These are setter and getter functions
  
  public function get_username(){
	  return $this->username;
  }
  public function get_password(){
	  return $this->password;
  }
  
   public function get_role_id(){
	  return $this->role_id;
  }
  
  public function set_username($_username){
	  $this->username=$_username;
  }
  
  public function set_password($_password){
	  $this->password=$_password;
  }
  
  public function set_role_id($_role_id){
	  $this->role_id=$_role_id;
  }
  
  
  // This function is used to save an user
  public function save(){
	  global $db;
	  
	  return $db->query("insert into user(username,password,role_id)values('$this->username','$this->password','$this->role_id')");
  }
  
  
  //This function is used to delete an user by id
  public static function delete($id){
	 global $db;
	 
	 $db->query("delete from user where id='$id'");
	  
  }
  
  
  // This function is used to edit an user by id
  public static function edit(User $user,$id){
	 global $db;
	 
	 $db->query("update user set username='$user->get_username()',password='$user->get_password()' where id='$id'");
	  
  }
  
  
  //This function will show the list of users
  public static function show_user_list(){
	 global $db;
	 
	 $table=$db->query("select id,username,password from user");
	  
	  echo "<table class='table'>";
	  echo "<tr><th>Id</th><th>Username</th><th>Password</th></tr>";
	  while(list($id,$username,$pwd)=$table->fetch_row()){
		  echo "<tr><td>$id</td><td>$username</td><td>$pwd</td></tr>";
	  }
	  echo "</table>";
  }
  
}

?>