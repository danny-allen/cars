
<?php

class UsersController extends ControllerBase
{

    public function indexAction()
    {

    }

    /**
     * Displays the login
     */
    public function loginAction()
	{

	}


	/**
	 * Authenticates a user
	 */
	public function authAction()
	{
	    if ($this->request->isPost()) {
	    	$user = Users::findFirst([
	            'login = :login: and password = :password:', 
	            'bind' => [
	                'login'    => $this->request->getPost("login", "email"),
	                'password' => sha1($this->request->getPost("password"))
	            ]
	        ]);

		    if ($user === false) {
		        $this->flash->error("Incorrect credentials");
		        return $this->dispatcher->forward([
	                'controller' => 'index',
	                'action'     => 'index',
		        ]);
		    }

		    $this->session->set('auth', $user->id);
		    $this->flash->success("You've been successfully logged in");

		    return $this->dispatcher->forward([
	            'controller' => 'posts',
	            'action'     => 'index',
	        ]);
	    }
	}


	public function beforeExecuteRoute($dispatcher)
	{
	    // actions which we want to keep from outside access
	    $restricted = ['create', 'delete', 'edit', 'new'];

	    // auth token
	    $auth = $this->session->get('auth');

	    // we check here if currently invoked action is restricted and if
	    // the user is logged in
	    if (in_array($dispatcher->getActionName(), $restricted) && !$auth) {
	        $this->flash->error("You don't have access to this module");

	        $dispatcher->forward(
	            [
	                'controller' => 'index',
	                'action'     => 'index',
	            ]
	        );

	        // Returning false means that execute the action must be aborted
	        return false;
	    }
	}



}

