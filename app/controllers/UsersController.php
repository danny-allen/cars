
<?php

class UsersController extends AbstractController
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

	public function registerAction()
	{
        $user = new Users();

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $user->login = $login;

        // Store the password hashed
        $user->password = $this->security->hash($password);

        $user->save();
	}


	/**
	 * Authenticates a user
	 */
	public function authAction()
	{

        $login    = $this->request->getPost('login');
        $password = $this->request->getPost('password');

        $this->view->disable();

        $user = Users::findFirstByLogin($login);
        if ($user) {
            if ($this->security->checkHash($password, $user->password)) {

		    	$this->flash->success("You've been successfully logged in");
            }
        } else {
            // To protect against timing attacks. Regardless of whether a user exists or not, the script will take roughly the same amount as it will always be computing a hash.
            $this->security->hash(rand());
		    $this->flash->error("Incorrect credentials");
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

