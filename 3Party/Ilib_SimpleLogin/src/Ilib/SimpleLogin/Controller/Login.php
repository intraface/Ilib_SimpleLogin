<?php
class Ilib_SimpleLogin_Controller_Login extends k_Controller
{
    
    
    public function GET()
    {
        $this->document->title = 'Login';
        return $this->render('Ilib/SimpleLogin/templates/login-tpl.php');
    }
    
    public function POST()
    {
        
        
        if($this->getUser()->login($this->POST['username'], $this->POST['password'])) {
            throw new k_http_Redirect($this->url('../'));
        }
        else {
            $this->document->title = 'Login';        
            return $this->render('Ilib/SimpleLogin/templates/login-tpl.php', array('error_message' => $this->getUser()->getMessage()));
        }
    }
    
    public function getUser()
    {
        return $this->context->getUser();
    }
}