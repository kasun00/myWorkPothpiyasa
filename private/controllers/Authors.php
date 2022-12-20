<?php

//Users controller
class Authors extends Controller
{

    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $author = new Author();
        $data = $author->findAll();
        $this->view('librarian/authors.view',['rows' => $data]);
    }

    public function viewOne($id = null)
    {

        $author = new Author();

       
        //Getting existing data from database
        $row = $author->where('AuthorID', $id);
        $this->view('librarian/authors.view.view',['row' => $row]);
    }

    public function add()
    {
        $errors = array();

        if(count($_POST) > 0)
        {
            $author = new Author();
           
            if($author->validate($_POST))
            {
            
            $img_name =$_FILES['imagefile']['name'];
            $img_size =$_FILES['imagefile']['size'];
            $tmp_name =$_FILES['imagefile']['tmp_name'];
            $error =$_FILES['imagefile']['error'];


            if($error===0){
            if($img_size >125000){
                
                $em="Sorry your file is too large.";
                echo "error";
                //function_alert("$em");
            //header("Location: authorAddHTML.php?error=$em");
                
                
            // header("Location: authorAddHTML.php");
                // 

            }
            else{
                $img_ex =pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc =strtolower($img_ex);
                $allowed_exs = array("jpg","jpeg","png");


                if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name,$img_upload_path);
                    //$_POST['imagefile']=$img_upload_path;
                    $authorData['ImgUrl'] = $new_img_name;
                    //print_r($authorData['ImgUrl']);
                }
              }
            }
           
                $authorData['Name'] = $_POST['Name'];
                $authorData['Sex'] = $_POST['Sex'];
                $authorData['Email'] = $_POST['Email'];
                
                //get staffid from userid
                $value = Auth::profileID();
                $authorData['AddStaffID'] = get_staffid('UserID', $value);


                $author->insert($authorData);
                $this->redirect('librarian/home');
           


            }else{
                
                $errors = $author->errors;
                //print_r($errors);
                
            }
        }

        $this->view('librarian/authors.add',['errors'=>$errors]);
    }

    public function edit($id = null)
    {
       
        $errors = array();

        $author = new Author();

       
        //Getting existing data from database
        $row = $author->where('AuthorID', $id);

        if (count($_POST) > 0) {

           
            
            if ($author->validateEdit($_POST)) {

                $authorData['Name'] = $_POST['Name'];
                $authorData['Sex'] = $_POST['Sex'];
                $authorData['Email'] = $_POST['Email'];
                $authorData['AddStaffID'] = 2001;


                

                //Insert data to user table
                $author->update('AuthorID',$id, $authorData);


                
                $this->redirect('authors');

            } else {
                $errors = $author->errors;
                //print_r($errors);

            }
        }

        
        $this->view('librarian/authors.edit',['row' => $row,'errors'=>$errors]);
    }

    public function delete($id = null)
    {
      
        $author = new Author();

        //Getting existing data from database
        $row = $author->where('AuthorID', $id);

      
          
            //Delete data from user table
            $author->delete('AuthorID',$id);
            $this->redirect('authors');

    } 
    
    

}

