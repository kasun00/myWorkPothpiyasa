<?php
$deleteLink = "";
//Return user fill and submitted values
function get_var($key,$default ="")
{

    if (isset($_POST[$key])) {
        return $_POST[$key];
    }
    
    return $default;
    
}

//For selecting input fields
function get_select($key,$value,$default = "")
{
    if (isset($_POST[$key])) 
    {
        if($_POST[$key] == $value)
        {
            return "selected";
        }    
    }

    if ($default == $value)
    {
        return "selected";

    }
    
    return "";

}

//select default button clicked
function select_redioButton($value)
{

    if (!empty($value)) {
        return "checked";
    }
    return "";
    
}

//Escape harmful code
function esc($var)
{
    return htmlspecialchars($var);

}

//When give the 
function get_staff_name($key,$value)
{
    $user = new LibraryStaff();
    if ($row = $user->where($key, $value)) {
        $row = $row[0];
        $value1 = $row->UserID;
        //return $value1;

         $member = new User();
        if($row1= $member->where('UserID',$value1)){
            $row1 = $row1[0];
            return $row1->FirstName."".$row1->MidName." ".$row1->LastName;

        }
       
    }else{
        return "None";
    }
}

function get_staffid($key,$value)
{
    $user = new LibraryStaff();
    if ($row = $user->where($key, $value)) {
        $row = $row[0];
        return $row->StaffID;

 
       
    }else{
        return "None";
    }
}


function get_bookid($key,$value)
{
    $user = new LibraryStaff();
    if ($row = $user->where($key, $value)) {
        $row = $row[0];
        return $row->StaffID;

 
       
    }else{
        return "None";
    }
}


function viewbooksforauthor($authorID)
    {
       
        $book = new Book();
        $data = $book->where("AuthorID",$authorID);
        return $data;
   }



   
//kasun



//get userID
function get_userID($key,$data){
    $staff = new LibraryStaff();
    if($row = $staff->where($key,$data)){
        return $row[0]->StaffID;
    }
    else{
        return "None";
    }
}

//get authorID
function get_authorID($key,$data){
    $author = new Author();
    if($row = $author->where($key,$data)){
        return $row[0]->AuthorID;
    }
    else{
        return "None";
    }
}

//get authorName
function get_authorName($key,$data){
    $author = new Author();
    if($row = $author->where($key,$data)){
        return $row[0]->Name;
    }
    else{
        return "None";
    }
}

//get Vendor Name
function get_VendorName($key,$data){
    $vendor = new Vendor();
    if($row = $vendor->where($key,$data)){
        return $row[0]->Name;
    }
    else{
        return "None";
    }
}

//get donor Name
function get_DonorName($key,$data){
    $donor = new Donor();
    if($row = $donor->where($key,$data)){
        return $row[0]->Name;
    }
    else{
        return "None";
    }
}

//get staff Name
function get_StaffName($key,$data){
    $staff = new LibraryStaff();
    if($row = $staff->where($key,$data)){
        $userID= $row[0]->UserID;
    }
    $user = new User();
    if($row2 = $user->where("UserID",$userID)){
       return $row2[0]->FirstName." ".$row2[0]->LastName;
    }
    else{
        return "None";
    }
}

//get category name
function get_CategoryName($key,$data){
    $category = new BookCategory();
    if($row = $category->where($key,$data)){
        return $row[0]->Name;
    }
    else{
        return "None";
    }
}
//get category id
function get_categoryID($key,$data){
        $category = new BookCategory();
        if($row = $category->where($key,$data)){
            return $row[0]->CategoryID;
        }
        else{
            return "None";
        }
    }

    // get delete url
function set_DeleteUrl($link){
    $GLOBALS['deleteLink'] = $link;
}

function get_DeleteUrl(){
    return $GLOBALS['deleteLink'];
}


function get_selectedVendorDonorName($vendorID,$donorID){
    if(!empty($vendorID)){
        $vendor = new Vendor();
        if($row = $vendor->where("VendorID",$vendorID)){
            return $row[0]->Name;
        }
        else{
            return "None";
        }
    }
    else if(!empty($donorID)){
        $donor = new Donor();
        if($row = $donor->where("DonorID",$donorID)){
            return $row[0]->Name;
        }
        else{
            return "None";
        } 
    }
    
}

