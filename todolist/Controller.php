<?php


class Controller
{
    private $model;
    private $view;
    private $requestParameters;
    private $action;

    private function setRequestParameters()
    {
        $uri = $_SERVER['REQUEST_URI'];
        if (\Model\Session::getUserId()) {
            if ($_POST) {
                $requestJSON = file_get_contents('php://input');
                foreach ($_POST as $key => $value) {
                    $_POST[$key] = htmlspecialchars($value, ENT_QUOTES | ENT_HTML5);
                }
                if (isset($_POST['action'])) {
                    if ($_POST['action'] == 'create') {
                        $this->action = 'create';
                        $this->requestParameters = $_POST;
                    } else if ($_POST['action'] == 'update') {
                        $this->action = 'update';
                        $this->requestParameters = $_POST;
                    }
                } else if ($requestJSON) {
                    $requestJSON = json_decode($requestJSON);
                    if ($requestJSON->action == 'edit') {
                        $this->action = 'edit';
                        $this->requestParameters = $requestJSON;
                    } else if ($requestJSON->action == 'delete') {
                        $this->action = 'delete';
                        $this->requestParameters = $requestJSON;
                    }
                }
            } else if ($_GET) {
                $this->requestParameters = $_GET;
                if (isset($_GET['sort'])) {
                    $this->requestParameters = $_GET['sort'];
                    $this->action = 'sort';
                } else if (isset($_GET['filter'])) {
                    $this->requestParameters = $_GET['filter'];
                    $this->action = 'filter';
                } else if (isset($_GET['search'])) {
                    $this->requestParameters = $_GET['search'];
                    $this->action = 'search';
                }
            } else if ($uri == '/logout') {
                $this->action = 'logout';
            } else if ($uri != '/current') {
                header("Location: /current");
            }
        } else {
            if ($uri == '/main') {
                $this->action = 'loginPage';
            } else {
                header("Location: /main");
            }
            if (isset($_POST['register'])) {
                $this->action = 'register';
                $this->requestParameters = $_POST;
            } else if (isset($_POST['login'])) {
                $this->action = 'login';
                $this->requestParameters = $_POST;
            }
        }
    }

    public function run()
    {
        try {
            ob_start();
            $this->setRequestParameters();
            \Db::init(HOST, USERNAME, PASSWORD, DBNAME);
            if ($this->action == 'register' || $this->action == 'login')  {
                $this->model = new Model\User($this->requestParameters);
                if ($this->action == 'register') {
                    $this->model->register();
                } else if ($this->action == 'login') {
                    $this->model->login();
                }
            } else {
                $this->model = new Model\Current($this->requestParameters);
                if ($this->action == 'create') {
                    $this->model->create();
                    $this->view = new View($this->model);
                    $this->view->createItem();
                } else if ($this->action == 'edit') {
                    $this->model->editItem();
                    $this->view = new View($this->model);
                    $this->view->editItem();
                } else if ($this->action == 'update') {
                    $this->model->update();
                    $this->view = new View($this->model);
                    $this->view->createItem();
                } else if ($this->action == 'delete') {
                    $this->model->delete();
                    $this->view = new View($this->model);
                    $this->view->deleteItem();
                } else if ($this->action == 'sort')  {
                    $this->model->sort();
                    $this->view = new View($this->model);
                    $this->view->render();
                } else if ($this->action == 'filter')  {
                    $this->model->filter();
                    $this->view = new View($this->model);
                    $this->view->render();
                } else if ($this->action == 'loginPage')  {
                    $this->view = new View(null);
                    $this->view->renderLoginPage();
                } else if ($this->action == 'search')  {
                    $this->model->search();
                    $this->view = new View($this->model);
                    $this->view->render();
                } else if ($this->action == 'logout') {
                    \Model\Session::exit();
                    return;
                } else {
                    $this->model->read();
                    $this->view = new View($this->model);
                    $this->view->render();
                }
            }
            ob_end_flush();
        } catch (Throwable $exc) {
            ob_end_clean();
            $error = $exc->getMessage();
            include 'template/error.php';
        }
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        die;
    }
}