<?php

//Each table in the database that should have this kind of model

class Author extends Model
{
 
     //Validation is differ from one model to another
     public function validate($DATA)
     {
          
          $this->errors = array();
          
          //Check for name
          //$name=$DATA['Name'];
          //if (!preg_match ("/^[a-zA-Z]*$/", $name) )
          //if(empty($DATA['Name']))
          if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['Name']))
          {
               $this->errors['Name'] = "Only letters and white space are allowed";
               //"Only letters allowed in name";
          }

          if($this->where('Name',($DATA['Name'])))
          {
               $this->errors['Name'] = "This name is already exists.";
          }


            //Check for sex
          if(empty($DATA['Sex']))
          {
               $this->errors['Sex'] = "Select Sex field";
          }
          
         
          
          

          //Check for email
          if(!filter_var($DATA['Email'],FILTER_VALIDATE_EMAIL))
          {
               $this->errors['Email'] = "Email is not valid";
          }

          //Check if email exist
          if($this->where('Email',($DATA['Email'])))
          {
               $this->errors['Email'] = "This email is already in use";
          }


          if(count($this->errors) == 0)
          {
               return true;
          }

          return false;
     }


     public function validateEdit($DATA)
     {
          
          $this->errors = array();
          
          //Check for name
          //$name=$DATA['Name'];
          //if (!preg_match ("/^[a-zA-Z]*$/", $name) )
          //if(empty($DATA['Name']))
          if(!preg_match('/^[a-zA-Z-, ]*$/',$DATA['Name']))
          {
               $this->errors['Name'] = "Only letters and white space are allowed";
               //"Only letters allowed in name";
          }

         


            //Check for sex
          if(empty($DATA['Sex']))
          {
               $this->errors['Sex'] = "Select Sex field";
          }
          
         
          
          

          //Check for email
          if(!filter_var($DATA['Email'],FILTER_VALIDATE_EMAIL))
          {
               $this->errors['Email'] = "Email is not valid";
          }

          //Check if email exist
          


          if(count($this->errors) == 0)
          {
               return true;
          }

          return false;
     }

     // public function hash_password($data)
     // {
     //   $data['Password'] = password_hash($data['Password'], PASSWORD_DEFAULT);
     //      return $data;
     // }
}