<?php

//Authentication class

class Auth
{
    public static function authenticate($row)
    {
        //$row contains all the data of user just logged in
        $_SESSION['USER'] = $row;
    }

    public static function logout()
    {
        if(isset($_SESSION['USER']))
        {
            unset($_SESSION['USER']);
        }
        
    }

    public static function logged_in()
    {
        if(isset($_SESSION['USER']))
        {
            return true;
        }

        return false;
        
    }

    public static function profileName()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->FirstName. "" .$_SESSION['USER']->MidName. " " .$_SESSION['USER']->LastName; 

        }

        return false;
        
    }

    public static function profileID()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->UserID; 
        }

        return false;
        
    }
    
    public static function profile()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->Image; 
        }

        return false;
        
    }



    public static function StaffID()
    {
        if(isset($_SESSION['USER']))
        {
            return $_SESSION['USER']->StaffID; 
        }

        return false;
        
    }



}