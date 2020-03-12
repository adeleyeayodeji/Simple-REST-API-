<?php
class UserModel extends Db
{
    private static $id;
    private static $username;
    private static $first;
    private static $last;

    protected function userEdit($id, $username, $first, $last)
    {
        self::$id = $id;
        self::$username = $username;
        self::$first = $first;
        self::$last = $last;

        $sql = "UPDATE user SET first = ?, last = ?, username = ? WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([self::$first, self::$last, self::$username, self::$id]);
        return ($query) ? array("message" => "User Updated", "id" => self::$id, "firstname" => self::$first, "lastname" => self::$last, "username" => self::$username) : array("message" => "Error updating user");
    }

    protected function userInsert($username, $first, $last)
    {
        self::$username = $username;
        self::$first = $first;
        self::$last = $last;

        $sql = "INSERT INTO user (first, last, username) VALUES(?, ?, ?)";
        $query = $this->connect()->prepare($sql);
        $query->execute([self::$first, self::$last, self::$username]);
        //Getting user id
        if($query){
            $sql = "SELECT id FROM user WHERE username = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([self::$username]);
            $result = $query->fetch();
            //Assign id to property
            self::$id = $result->id;
        }
        //Return value
        return ($query) ? array("message" => "User Inserted", "first" => self::$first, "last" => self::$last, "username" => self::$username, "id" => self::$id) : array("message" => "Error inserting user");
    }

    protected function userCheckInsert($username)
    {
        self::$username = $username;

        $sql = "SELECT username FROM user WHERE username = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([self::$username]);
        $count = $query->rowCount();
        return ($count >= 1 ) ? "Failed" : "Proceed";
    }

    protected function userDelete($id)
    {
        self::$id = $id;

        $sql = "DELETE FROM user WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([self::$id]);
        return ($query) ? array("message" => "User deleted", "id" => self::$id) : array("message" => "Failed to delete");
    }

    protected function userRead()
    {
        $sql = "SELECT * FROM user ORDER BY id DESC";
        $query = $this->connect()->query($sql);
        $result = $query->fetchAll();
        return $result;
    }

    protected function viewUserWithId($id)
    {
        self::$id = $id;
        
        $sql = "SELECT * FROM user WHERE id = ?";
        $query = $this->connect()->prepare($sql);
        $query->execute([self::$id]);
        //Get result
        $result = $query->fetch();
        return $result->first.",".$result->last.",".$result->username;
    }
}
