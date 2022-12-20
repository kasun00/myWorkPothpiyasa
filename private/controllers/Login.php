<?php

//Login controller
class Login extends Controller
{
    public function index()
    {
        $errors = array();

        if (count($_POST) > 0) {
            //If we posted something, it created new user
            $user = new User();
            if ($row = $user->where('UserID', $_POST['UserID'])) {

                //$row comes as array of items (Array ( [0] => stdClass Object ( [UserID] => 1 [RegistrationNo] => 2020/CS/212....)
                $row = $row[0];

                //$row[0], (stdClass Object ( [UserID] => 1 [RegistrationNo] => 2020/CS/212..)

                // $userInput = $_POST['Password'];
                // echo $userInput;
                // $hashedPassword = $row->Password;
                // echo $hashedPassword;

                
                if ($_POST['Password'] == $row->Password) {

                    Auth::authenticate($row);

                    if ($row->JobType == "Librarian") {
                        $this->redirect('librarian');

                    }
                    else if ($row->JobType == "Admin") {
                        $this->redirect('home');

                    }


                } else {
                    $errors['UserID'] = "Invalid User ID / Password";
                }

            } else {

                $errors['UserID'] = "Invalid User ID";

            }




        }

        $this->view('librarian/login', ['errors' => $errors]);
    }
}