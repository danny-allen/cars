<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CarsController extends AbstractController
{

    public function indexAction()
    {
        $this->persistent->parameters = null;
        
        $numberPage = 1;
        $parameters["order"] = "id";


        $posts = Cars::find($parameters);
        
        if (count($posts) == 0) {
            $this->flash->notice("The search did not find any cars.");

            $this->dispatcher->forward(array(
                "controller" => "cars",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $posts,
            'limit'=> 10,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();

    }
}

