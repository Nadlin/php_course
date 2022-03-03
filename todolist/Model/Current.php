<?php
namespace Model;

class Current {
    private $data;
    private $requestParameters;

    public function __construct($requestParameters)
    {
        $this->requestParameters = $requestParameters;
    }

    public function create() {
        $requestData = $this->requestParameters;
        $user_id = \Model\Session::getUserId();
        $task = $requestData['task'];
        $comment = $requestData['comment'];
        $priority = $requestData['priority'];
        $date = $requestData['date'];

        $sql = "INSERT INTO current (user_id, task, comment, priority, `date`) VALUES ('$user_id', '$task', '$comment', '$priority', '$date')";
        $last_id = \Db::create($sql);
        $this->getItemById($last_id);
    }

    public function getItemById($id)
    {
        $sql = "SELECT * FROM current WHERE id=$id";
        $this->data = \Db::select($sql);
    }

    public function read()
    {
        $userId = \Model\Session::getUserId();
        $sql = "SELECT * FROM current WHERE user_id=$userId ORDER BY id DESC";

        $this->data = \Db::select($sql);
    }

    public function sort()
    {
        $userId = \Model\Session::getUserId();
        $param = $this->requestParameters;
        $sql = "SELECT * FROM current WHERE user_id=$userId ORDER BY $param";

        $this->data = \Db::select($sql);
    }

    public function filter()
    {
        $userId = \Model\Session::getUserId();
        $param = $this->requestParameters;
        $sql = "SELECT * FROM current WHERE user_id=$userId && priority='$param'";

        $this->data = \Db::select($sql);
    }

    public function editItem()
    {
        $itemId = $this->requestParameters->id;
        $this->getItemById($itemId);
    }

    public function delete()
    {
        $itemId = $this->requestParameters->id;
        $sql = "DELETE FROM current WHERE id = $itemId";
        $this->data = \Db::execute($sql);
    }

    public function update() {
        $requestData = $this->requestParameters;
        $userId = \Model\Session::getUserId();
        $id = $requestData['id'];
        $task = $requestData['task'];
        $comment = $requestData['comment'];
        $priority = $requestData['priority'];
        $date = $requestData['date'];
        $sql = "UPDATE current SET task = '$task', comment = '$comment', priority = '$priority', date = '$date' WHERE id = $id";
        $this->data = \Db::execute($sql);
        $this->getItemById($id);
    }

    public function getData()
    {
        return $this->data;
    }

    public function getParameters()
    {
        return $this->requestParameters;
    }

    public function search() {
        $userId = \Model\Session::getUserId();
        $expr = $this->requestParameters;
        $sql = "SELECT * FROM current WHERE user_id=$userId && MATCH (task, comment) AGAINST ('$expr' IN NATURAL LANGUAGE MODE)";
        $this->data = \Db::select($sql);
    }
}