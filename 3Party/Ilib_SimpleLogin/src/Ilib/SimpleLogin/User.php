<?php
class Ilib_SimpleLogin_User
{
    private $session;
    private $user = array();
    private $message;

    function __construct($session)
    {
        $this->session = &$session->get('Ilib_SimpleLogin');
    }

    function login($user, $password)
    {
        if(!isset($this->user[$user])) {
            $this->setMessage('Invalid user');
            return false;
        }
        
        if(md5($password) != $this->user[$user]) {
            $this->setMessage('Invalid password');
            return false;
        }
   
        $this->session['logged_in'] = true;    
        
        return true;
    }
    
    function logOut()
    {
        unset($this->session['logged_in']);
        return true;
    }

    function isLoggedIn()
    {
        if (empty($this->session['logged_in'])) {
            return false;
        }
        return true;
    }
    
    public function register($user, $password)
    {
        $this->user[$user] = $password;
    }
    
    private function setMessage($message) 
    {
        $this->message = $message;
    }
    
    public function getMessage()
    {
        return $this->message;
    }
}