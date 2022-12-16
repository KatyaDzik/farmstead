<?php

namespace App\Models;
use App\Services\Database;
class Feedback{

    private $db;
    private $id;
    private $feedback;
    private $date;
    private $clientId;
    private $statusId;

    public function __construct() {
        $this->db = new Database();
    }

    public function createFeedback($data, $clientId) {    
        $key = round(microtime(true));  
        $dt = new \DateTime();
        $dt = date_modify($dt, "+3 hour");
        var_dump($dt);
        $data = [
            'id' => $key,
            'feedback' => $data["message"],
            'date' => $dt->date,
            'clientId' => $clientId,
            'statusId' => 1
        ];

        echo $key;
        $sql = "INSERT INTO feedbacks (idFeedback, feedback, date, Client_idClient, Status_idStatus) VALUES (:id, :feedback, :date, :clientId, :statusId)";
        $stmt= $this->db->queryInserUpdate($sql, $data);
        if(isset($stmt)){
            echo $stmt;
        } else {
            return "error";
        }
    }
}