<?php

//Users controller
class Users extends Controller
{

    public function index()
    {
        if(!Auth::logged_in())
        {
            $this->redirect('login');
        }

        $user = new User();
        $data = $user->findAll();
        $this->view('admin/users.view',['rows' => $data]);
    }

    public function add()
    {
        $errors = array();

        if(count($_POST) > 0)
        {
            $user = new User();

            if($user->validate($_POST))
            {
            
                $userData['RegistrationNo'] = $_POST['RegistrationNo'];
                $userData['Title'] = $_POST['Title'];
                $userData['FirstName'] = $_POST['FirstName'];
                $userData['MidName'] = $_POST['MidName'];
                $userData['LastName'] = $_POST['LastName'];
                $userData['Sex'] = $_POST['Sex'];
                $userData['Birthday'] = $_POST['Birthday'];
                $userData['Address'] = $_POST['Address'];
                $userData['Email'] = $_POST['Email'];
                $userData['MemberType'] = $_POST['MemberType'];
                //Password
                // $userData['Password'] = password_hash($_POST['RegistrationNo'], PASSWORD_DEFAULT);
                $userData['Password'] = $_POST['RegistrationNo'];
                //UserName
                $userData['UserName'] = $_POST['RegistrationNo'];


                //Checking member type
                if($userData['MemberType'] == 'Library-Staff')
                {
                    $userData['JobType'] = 'Library-Staff';

                    $libStaff = new LibraryStaff();

                    //$libStaff->insert($libStaffData)

                }
                
                if($userData['MemberType'] == 'Administrator')
                {
                    
                    $userData['JobType'] = 'Administrator';

                }

                if($userData['MemberType'] == 'Librarian')
                {
                    
                    $userData['JobType'] = 'Librarian';

                }

                if($userData['MemberType'] == 'Librarian' 
                    || $userData['MemberType'] == 'Library-Staff' 
                    || $userData['MemberType'] == 'Administrator' 
                    || $userData['MemberType'] == 'Non-Academic')
                {
                    
                    $userData['AcademicType'] = 'Non-Academic';

                }

                if($userData['MemberType'] == 'Lecturer' || $userData['MemberType'] == 'Student')
                {
                    
                    $userData['AcademicType'] = 'Academic';

                }

                if($userData['MemberType'] == 'Lecturer')
                {
                    $userData['Type'] = 'Lecturer';

                    $lecturer = new Lecturer();

                    $lecturerData['LecType'] = $_POST['LecType'];
                    $lecturerData['Subject'] = $_POST['Subject'];
                    $lecturerData['Department'] = $_POST['Department'];

                    $lecturer->insert($lecturerData);

                }

                if($userData['MemberType'] == 'Student')
                {
                    $userData['Type'] = 'Student';

                    $student = new Student();

                    $studentData['StudentType'] = $_POST['StudentType'];
                    $studentData['Degree'] = $_POST['Degree'];
                    $studentData['Batch'] = $_POST['Batch'];

                    $student->insert($studentData);

                }

                //$userData['AddStaffID'] =
                $userData['AddDate'] = date("Y-m-d H:i:s");


                $user->insert($userData);
                $this->redirect('home');

            }else{
                $errors = $user->errors;
                
            }
        }

        $this->view('admin/users.add',['errors'=>$errors]);
    }
    
}