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

    /**
     * searchAction
     *
     * Find cars based on query param and pass to view.
     */
    public function searchAction()
    {
        //get query parameter
        $q = $this->request->getQuery('q');

        //add query param to views
        $this->view->search = $q;

        //set persistance params
        $this->persistent->parameters = null;

        //set the page number
        $numberPage = 1;

        //query based on search
        $cars = Cars::query()
             ->innerJoin('Makes') //we want to search by make name too
            ->where('name LIKE :bindparam:')
            ->orWhere("model LIKE :bindparam:")
            ->orWhere("colour LIKE :bindparam:")
            ->orWhere("description LIKE :bindparam:")
            ->bind( ['bindparam' => '%' . $q . '%'] )
            ->limit(20)
            ->execute();

        //if nothing was found
        if (count($cars) == 0) {
            $this->flash->notice("The search did not find any cars.");
        }

        //paginate results
        $paginator = new Paginator(array(
            'data' => $cars,
            'limit'=> 10,
            'page' => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }

    public function makeAction($slug)
    {
        
        $make = Makes::findFirst("slug = '" . $slug . "'");

        $this->view->make = $make;

        $this->persistent->parameters = null;
        
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

