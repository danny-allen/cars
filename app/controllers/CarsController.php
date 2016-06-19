<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CarsController extends AbstractController
{

    /**
     * indexAction
     *
     * Listing of cars
     */
    public function indexAction()
    {
        //set persistent params
        $this->persistent->parameters = null;
        
        //set the page number
        $numberPage = 1;

        //randomise the order
        $parameters["order"] = "rand()";

        //get the cars
        $cars = Cars::find();

        //if there are no cars
        if (count($cars) == 0) {

            //set message
            $this->flash->notice("The search did not find any cars.");
            return;
        }

        //paginate results
        $paginator = new Paginator(array(
            'data' => $cars,
            'limit'=> 10,
            'page' => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }


    /**
     * showAction
     *
     * Get car by id and pass to view.
     * 
     * @param  int $id  id of the car
     */
    public function showAction($id)
    {
        //get the car by id
        $car = Cars::findFirst([
            'id = :id:', 
            'bind' => ['id' => $id]
        ]);

        //pass car to view
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
            return;
        }

        //paginate results
        $paginator = new Paginator(array(
            'data' => $cars,
            'limit'=> 10,
            'page' => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }


    /**
     * makeAction
     *
     * Get cars by make
     * 
     * @param  string $slug The slug of the car make to search by
     */
    public function makeAction($slug)
    {
        //find first makes by slug query
        $make = Makes::findFirst("slug = '" . $slug . "'");

        //make the make accessible to view
        $this->view->make = $make;

        //set persistent params
        $this->persistent->parameters = null;
        
        //first page
        $numberPage = 1;

        //get cars by make id
        $cars = Cars::find("make_id = '" . $make->id . "'");

        //if no cars found
        if (count($cars) == 0) {
            $this->flash->notice("The search did not find any cars.");
            return;
        }

        //paginate the results
        $paginator = new Paginator(array(
            'data' => $cars,
            'limit'=> 10,
            'page' => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }
}

