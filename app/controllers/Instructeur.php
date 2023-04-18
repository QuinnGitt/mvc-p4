<?php

class Instructeur extends BaseController 
{
    public function index() 
    {
        $data = [
            'title' => 'Het werkt'
        ];

        $this->view('Instructeur/index', $data);
    }
}