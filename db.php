<?php
class Db {
    private $con;
    function __construct(){
   $username= 'localhost:3307';
   $password= "";
   $database= "mydb";
   $host="root";

   $this->con= mysqli_connect($username,$host,$password,$database);
    }
    public function signup($uname,$password,$password2)
    {
   $check= "select * from user where name='$uname'";
   $result= mysqli_query($this->con,$check);
    if (mysqli_num_rows($result)== 0 && $password==$password2){
        $hash= password_hash($password,PASSWORD_DEFAULT);
   $sql= "insert into user(name,password) values('$uname','$hash')";
   mysqli_query($this->con,$sql);
     $_SESSION['user_name']=$uname;
     header('location:index.php');
    }
    else{
        echo " Seems like you already have a account";
    }
    
}
public function LogIn($name, $password)
{
    $check = "select * from user where name='$name' ";
    $result = mysqli_query($this->con, $check);
    if (mysqli_num_rows($result) > 0)
    {
        while($rr=mysqli_fetch_assoc($result)){
       if(password_verify($password,$rr['password']))
       {
        $_SESSION['user_name'] = $name; // Set the session variable here
        header('location: index.php');
       }
       else {
        echo 'SORRY, THERE IS NO ACCOUNT WITH THIS INFORMATION<br>';
        echo 'DO YOU WANT TO CREATE NEW ACCOUNT?';
       echo' <a href="Signup.php"> SIGN IN </a>';
    }
    }
   
    
   
    
}




}
}



?>