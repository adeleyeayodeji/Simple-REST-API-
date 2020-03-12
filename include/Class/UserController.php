<?php

class UserController extends UserModel
{
    protected static $username;
    protected static $firstname;
    protected static $lastname;
    protected static $id;

    public function addNewUser($username, $firstname, $lastname)
    {
        self::$firstname = $firstname;
        self::$lastname = $lastname;
        self::$username = $username;

        $response = $this->userCheckInsert(self::$username);
        //Proceed to registration if user not found

        if ($response == "Proceed") {
            return $this->userInsert(self::$username, self::$firstname, self::$lastname);
        }else{
            return array("message" => "User already exist");
        }
    }

    public function updateUserData($id, $username, $first, $last)
    {
        self::$firstname = $first;
        self::$lastname = $last;
        self::$username = $username;
        self::$id = $id;
        //Update data
        return $this->userEdit($id, $username, $first, $last);
    }

    public function userDeleteById($id)
    {
        self::$id = $id;
        return $this->userDelete(self::$id);
    }
}
