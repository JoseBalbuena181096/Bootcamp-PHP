<?php

class User{
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($id, $name, $email, $password){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function __serialize(){
        return [
            "name" => strtoupper($this->name),
            "email" => $this->email,
        ];
    }

    public function __unserialize($data){
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->password = null;
    }
}

$user = new User(1, "John", "john@example.com", "password");
$userSerialized = serialize($user);
echo $userSerialized."<br>";
$userUnserialized = unserialize($userSerialized);
print_r($userUnserialized);
echo $userUnserialized->name."<br>";


