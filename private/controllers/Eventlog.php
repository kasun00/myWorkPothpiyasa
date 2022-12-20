<?php

class Eventlog extends Controller
{
    public function index()
    {
    
        //$user = new User();

        //$data = $user->where('FirstName','Sithija');
        //$data = $user->findAll();
        // $user->insert($arr);
        // $user->update(3,$arr);
        // $user->delete(3);
    
        $this->view('admin/eventlog');
    }
}