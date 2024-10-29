<?php
require_once 'app/models/User.php';

class UserController
{
    private $userModel;

    public function __construct($dbConnection)
    {
        $this->userModel = new User($dbConnection);
    }

    public function getUserById($id)
    {
        return $this->userModel->getUserById($id);
    }

    public function show()
    {
        $user = $this->userModel->getAllUsers();
        require_once 'app/views/userView.php';
    }

    public function view($id)
    {
        $data = $this->userModel->getUserById($id);
        require_once 'app/views/detail.php';
    }

    public function add()
    {
        require_once 'app/views/add.php';
    }

    public function store($data)
    {
        $this->userModel->addUser($data);
        header("Location: index.php");
    }

    public function edit($id)
    {
        $data = $this->userModel->getUserById($id);
        require_once 'app/views/edit.php';
    }

    public function update($id, $data)
    {
        $this->userModel->updateUser($id, $data);
        header("Location: index.php");
    }

    public function delete($id)
    {
        $this->userModel->deleteUser($id);
        header("Location: index.php");
    }
}
