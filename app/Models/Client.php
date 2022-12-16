<?php

namespace App\Models;
use App\Services\Database;
class Client{

    private $db;
    private $id;
    private $name;
    private $number;
    private $email;

    public function __construct() {
        $this->db = new Database();
    }

    public function createClient($data) {    
        $key = round(microtime(true));  
        $data = [
            'id' => $key,
            'name' => $data["name"],
            'number' => $data["number"],
            'email' => $data["email"],
        ];
        $sql = "INSERT INTO clients (idClient, name, number, email) VALUES (:id, :name, :number, :email)";
        $stmt= $this->db->queryInserUpdate($sql, $data);
        if($stmt){
            $this->id=$data['id'];
            $this->name=$data['name'];
            $this->number=$data['number'];
            $this->email=$data['email'];
            return $key;
        } else {
            return "error";
        }
    }

    public function getId()
    {
        return $this->id;
    }
}