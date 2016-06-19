<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CarsController extends AbstractController
{

    public function indexAction()
    {
        $this->persistent->parameters = null;
        
        $numberPage = 1;
        $parameters["order"] = "rand()";

        $cars = Cars::find($parameters);

        if (count($cars) == 0) {
            $this->flash->notice("The search did not find any cars.");

            $this->dispatcher->forward(array(
                "controller" => "cars",
                "action" => "index"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $cars,
            'limit'=> 10,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    public function showAction($id)
    {
        $car = Cars::findFirst([
            'id = :id:', 
            'bind' => ['id' => $id]
        ]);

        $this->view->setVar('car', $car);
    }

    public function makeAction($slug) {
        
        $make = Makes::findFirst("slug = '" . $slug . "'");

        $this->view->make = $make;

        $this->persistent->parameters = null;

        var_dump($make->id);
        
        $numberPage = 1;

        $cars = Cars::find("make_id = '" . $make->id . "'");

        if (count($cars) == 0) {
            $this->flash->notice("The search did not find any cars.");

            $this->dispatcher->forward(array(
                "controller" => "cars",
                "action" => "make"
            ));

            return;
        }

        $paginator = new Paginator(array(
            'data' => $cars,
            'limit'=> 10,
            'page' => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();

    }
}

