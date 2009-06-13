<?php
class Ilib_SimpleLogin_Controller_LogOut extends k_Controller
{
    
    public function handleRequest()
    {
        $this->getUser()->logOut();
        throw new k_http_Redirect($this->url('../'));
    }
    
    
    public function getUser()
    {
        return $this->context->getUser();
    }
}