<?php
/*
*
*/


class group_page extends MainController
{
    public function __construct($name)
    {
        parent::__construct();
        
        $this->load_view($name);
    }



}