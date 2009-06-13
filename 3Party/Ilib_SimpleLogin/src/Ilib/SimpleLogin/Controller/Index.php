<?php

class Ilib_SimpleLogin_Controller_Index extends k_Controller
{
    
    function GET()
    {
        return $this->render('Ilib/SimpleLogin/templates/index-tpl.php');
    }

}