<?php
  class validate{
    
     // check to see if the number is correct
    public function validNumber($p){
     
      if (preg_match("/^\d{10}$/", $p)){
        return true;
      }
      else{
        echo "<p>Provide a valid number</p>";
      }
      
    }
    // check to see if our email is correct
    public function validEmail($email){
      if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
      }
      else{
        echo "<p>Provide a valid email</p>";
      }
      
    }
    
  }
 
?>