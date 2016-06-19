<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PostsController extends AbstractController
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        
        $numberPage = 1;
        $parameters["order"] = "id";


        $posts = Posts::find($parameters);
        if (count($posts) == 0) {
            $this->flash->notice("The search did not find any posts");

            $this->dispatcher->forward(array(
                "controller" => "posts",
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


    public function showAction($slug) {
        $post = Posts::findFirst(
            [
                'slug = :slug:', 
                'bind' => ['slug' => $slug]
            ]
        );

        if ($post === false) {
            $this->flash->error("Sorry, post not found.");
            $this->dispatcher->forward(
                [
                    'controller' => 'posts',
                    'action'     => 'index',
                ]
            );
        }

        $this->view->setVar('post', $post);
    }


    /**
     * Searches for posts
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Posts', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "id";

        $posts = Posts::find($parameters);
        if (count($posts) == 0) {
            $this->flash->notice("The search did not find any posts");

            $this->dispatcher->forward(array(
                "controller" => "posts",
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

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a post
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            $post = Posts::findFirstByid($id);
            if (!$post) {
                $this->flash->error("post was not found");

                $this->dispatcher->forward(array(
                    'controller' => "posts",
                    'action' => 'index'
                ));

                return;
            }

            $this->view->id = $post->id;

            $this->tag->setDefault("id", $post->id);
            $this->tag->setDefault("title", $post->title);
            $this->tag->setDefault("slug", $post->slug);
            $this->tag->setDefault("content", $post->content);
            $this->tag->setDefault("created", $post->created);
            $this->tag->setDefault("users_id", $post->users_id);
            $this->tag->setDefault("categories_id", $post->categories_id);
            
        }
    }

    /**
     * Creates a new post
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "posts",
                'action' => 'index'
            ));

            return;
        }

        $post = new Posts();
        $post->title = $this->request->getPost("title");
        $post->slug = $this->request->getPost("slug");
        $post->content = $this->request->getPost("content");
        $post->created = $this->request->getPost("created");
        $post->users_id = $this->request->getPost("users_id");
        $post->categories_id = $this->request->getPost("categories_id");
        

        if (!$post->save()) {
            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "posts",
                'action' => 'new'
            ));

            return;
        }

        $this->flash->success("post was created successfully");

        $this->dispatcher->forward(array(
            'controller' => "posts",
            'action' => 'index'
        ));
    }

    /**
     * Saves a post edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward(array(
                'controller' => "posts",
                'action' => 'index'
            ));

            return;
        }

        $id = $this->request->getPost("id");
        $post = Posts::findFirstByid($id);

        if (!$post) {
            $this->flash->error("post does not exist " . $id);

            $this->dispatcher->forward(array(
                'controller' => "posts",
                'action' => 'index'
            ));

            return;
        }

        $post->title = $this->request->getPost("title");
        $post->slug = $this->request->getPost("slug");
        $post->content = $this->request->getPost("content");
        $post->created = $this->request->getPost("created");
        $post->users_id = $this->request->getPost("users_id");
        $post->categories_id = $this->request->getPost("categories_id");
        

        if (!$post->save()) {

            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "posts",
                'action' => 'edit',
                'params' => array($post->id)
            ));

            return;
        }

        $this->flash->success("post was updated successfully");

        $this->dispatcher->forward(array(
            'controller' => "posts",
            'action' => 'index'
        ));
    }

    /**
     * Deletes a post
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $post = Posts::findFirstByid($id);
        if (!$post) {
            $this->flash->error("post was not found");

            $this->dispatcher->forward(array(
                'controller' => "posts",
                'action' => 'index'
            ));

            return;
        }

        if (!$post->delete()) {

            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward(array(
                'controller' => "posts",
                'action' => 'search'
            ));

            return;
        }

        $this->flash->success("post was deleted successfully");

        $this->dispatcher->forward(array(
            'controller' => "posts",
            'action' => "index"
        ));
    }

}
