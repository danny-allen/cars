<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class PostsController extends AbstractController
{
    
    /**
     * Index action
     *
     * Get the list of posts
     */
    public function indexAction()
    {
        //set persistent params
        $this->persistent->parameters = null;
        
        //set the page number
        $numberPage = 1;

        //order by id
        $parameters["order"] = "id";

        //get posts
        $posts = Posts::find($parameters);

        //if no posts
        if (count($posts) == 0) {
            $this->flash->notice("The search did not find any posts");
            return;
        }

        //paginate the results
        $paginator = new Paginator(array(
            'data' => $posts,
            'limit'=> 10,
            'page' => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }


    /**
     * showAction
     *
     * Get post by slug and pass to view
     * 
     * @param  string $slug The slug to search posts by
     */
    public function showAction($slug) {
        $post = Posts::findFirst([
            'slug = :slug:', 
            'bind' => ['slug' => $slug]
        ]);

        //if post wasn't found
        if ($post === false) {
            $this->flash->error("Sorry, post not found.");
            return;
        }

        //pass post to view
        $this->view->setVar('post', $post);
    }


    /**
     * searchAction
     * 
     * Searches for posts
     */
    public function searchAction()
    {
        //set the page number
        $numberPage = 1;

        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Posts', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        //set params
        $parameters = $this->persistent->parameters;

        //make sure we have an array
        if (!is_array($parameters)) {
            $parameters = array();
        }

        //order by id
        $parameters["order"] = "id";

        //get posts by query params
        $posts = Posts::find($parameters);

        //if no posts were found
        if (count($posts) == 0) {
            $this->flash->notice("The search did not find any posts");
            return;
        }

        //paginate results
        $paginator = new Paginator(array(
            'data' => $posts,
            'limit'=> 10,
            'page' => $numberPage
        ));
        $this->view->page = $paginator->getPaginate();
    }


    /**
     * newAction
     * 
     * Displays the creation form
     */
    public function newAction()
    {

    }


    /**
     * editAction
     * 
     * Edits a post
     *
     * @param string $id
     */
    public function editAction($id)
    {
        if (!$this->request->isPost()) {

            //get post by id
            $post = Posts::findFirstByid($id);

            //if not post
            if (!$post) {
                $this->flash->error("post was not found");
                return;
            }

            //set id for view
            $this->view->id = $post->id;

            //set post attrs
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
     * createAction
     * 
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

        //create a new post
        $post = new Posts();

        //set the post attrs
        $post->title = $this->request->getPost("title");
        $post->slug = $this->request->getPost("slug");
        $post->content = $this->request->getPost("content");
        $post->created = $this->request->getPost("created");
        $post->users_id = $this->request->getPost("users_id");
        $post->categories_id = $this->request->getPost("categories_id");
        
        //if we couldnt save
        if (!$post->save()) {
            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }
            return;
        }

        //we saved!
        $this->flash->success("post was created successfully");

        //got to the list page
        $this->dispatcher->forward(array(
            'controller' => "posts",
            'action' => 'index'
        ));
    }


    /**
     * saveAction
     * 
     * Saves a post edited
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

        //set post id
        $id = $this->request->getPost("id");

        //get that post
        $post = Posts::findFirstByid($id);

        //if no post
        if (!$post) {
            $this->flash->error("post does not exist " . $id);
            return;
        }

        //set the post attrs
        $post->title = $this->request->getPost("title");
        $post->slug = $this->request->getPost("slug");
        $post->content = $this->request->getPost("content");
        $post->created = $this->request->getPost("created");
        $post->users_id = $this->request->getPost("users_id");
        $post->categories_id = $this->request->getPost("categories_id");
        
        //if we can't save
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

        //success
        $this->flash->success("post was updated successfully");

        $this->dispatcher->forward(array(
            'controller' => "posts",
            'action' => 'index'
        ));
    }


    /**
     * deleteAction
     * 
     * Deletes a post
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        //find post by id
        $post = Posts::findFirstByid($id);

        //if no post
        if (!$post) {
            $this->flash->error("post was not found");
            return;
        }

        //if we can't delete
        if (!$post->delete()) {

            foreach ($post->getMessages() as $message) {
                $this->flash->error($message);
            }
            return;
        }

        //post deleted
        $this->flash->success("post was deleted successfully");

        //go to post list page
        $this->dispatcher->forward(array(
            'controller' => "posts",
            'action' => "index"
        ));
    }
}
