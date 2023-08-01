<?php
 
  class Database{
   
    private $connection;
    
    function __construct(){
      
      $this->connect_db();
    }
    
    public function connect_db(){
      $this->connection = mysqli_connect('localhost:3307', 'root', '', 'mydb');
      if(mysqli_connect_error()){
        die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_error());
      }
    }
    public function create($pno,$name,$email){
      $sql = "INSERT INTO pizza (Name, Email, Mobile) VALUES ('$name', '$email' ,'$pno')";
      $res = mysqli_query($this->connection, $sql);
      if($res){
	 		    return true;
		  }
      else{
			    return false;
		  }
    }
    public function read($id=null){
		    $sql = "SELECT * FROM pizza";
		    if($id){
          $sql .= " WHERE id=$id";
        }
 		    $res = mysqli_query($this->connection, $sql);
 		    return $res;
	  }

     // Insert customer data into customer table
  public function insertData($post)
  {  
    if($_SESSION['user_name']){
    $name = $this->connection->real_escape_string($_POST['name']);
    $email = $this->connection->real_escape_string($_POST['email']);
    $Phonee = $this->connection->real_escape_string($_POST['phoneno']);
    $query="INSERT INTO pizza (Name, Email, Mobile) VALUES ('$name', '$email' ,'$Phonee')";
    $sql = $this->connection->query($query);
    if ($sql==true) {
      header("Location:view.php?msg1=insert");
    }else{
      
      echo "Registration failed try again!";
    }
  }
  else{
    header('location:signup.php');
  }
  }
 // Fetch single data for edit from customer table
  public function displayRecordById($id)
  {
    $query = "SELECT * FROM pizza WHERE id = '$id'";
    $result = $this->connection->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

   // Update customer data into customer table
   public function updateRecord($postData)
   {
     
     $name = $this->connection->real_escape_string($_POST['nname']);
     $email = $this->connection->real_escape_string($_POST['eemail']);
     $phone = $this->connection->real_escape_string($_POST['pphone']);
     $id = $this->connection->real_escape_string($_POST['id']);
     if (!empty($id) && !empty($postData)) {
       $query = "UPDATE pizza SET Name = '$name', Email = '$email', Mobile = '$phone' WHERE id = '$id'";
       $sql = $this->connection->query($query);
       if ($sql==true) {
         header("Location:view.php?msg2=update");
       }else{
         echo "Registration updated failed try again!";
       }
     }
 
   }
    // Delete customer data from customer table
  public function deleteRecord($id)
  {
    $query = "DELETE FROM pizza WHERE id = '$id'";
    $sql = $this->connection->query($query);
    if ($sql==true) {
      header("Location:view.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }
   
  }
  $database = new Database();
?>
