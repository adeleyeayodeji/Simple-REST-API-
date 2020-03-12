<?php

class UserView extends UserModel
{
    protected static $id;
    public $username;
    public $firstname;
    public $lastname;

    public function viewUsers()
    {
        $result = $this->userRead();
        foreach ($result as $row) {
              $rows[] = $row;
        }
        header("Content-Type: application/json");
        echo json_encode($rows);
    }

    public function viewUserId($id)
    {
        self::$id = $id;
        $response = $this->viewUserWithId(self::$id);
        $newresponse = explode(",", $response);
        $this->firstname = $newresponse[0];
        $this->lastname = $newresponse[1];
        $this->username = $newresponse[2];
    }
}
