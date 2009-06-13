<?php
class Root extends k_Dispatcher
{
    private $user;
    
    
    public $map = array('dashboard' => 'Ilib_SimpleLogin_Controller_Index',
                        'login' => 'Ilib_SimpleLogin_Controller_Login',
                        'logout' => 'Ilib_SimpleLogin_Controller_LogOut',
                        );
    
    function __construct()
    {
        parent::__construct();
        $this->document->template = 'main-tpl.php';
        $this->document->navigation = array(
            $this->url('logout') => 'Log out'
        );
    }
    
    function execute()
    {
        throw new k_http_Redirect($this->url('dashboard'));
    }
    
    public function forward($name)
    {
        $login_exceptions = array('login'); /* mappings which does not require login */
        
        if (!$this->getUser()->isLoggedIn() && !in_array($this->getSubspace(), $login_exceptions)) {
            throw new k_http_Redirect($this->url('login'));
        }
        
        return parent::forward($name);
    }
    
    function getUser()
    {
        if(empty($this->user)) {
            $this->user = $this->registry->get('user');
            $this->user->register('support@intraface.dk', md5('12345'));
        }
        
        return $this->user;   
    }

}