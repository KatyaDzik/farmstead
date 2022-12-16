<?php
namespace App\Models;
use App\Services\Database;
class Booking{

    private $db;
    private $id;
    private $num_of_person;
    private $comment;
    private $Statusid;
    private $Checksid;
    private $Eventid;

    public function __construct() {
        $this->db = new Database();
    }

    public function getAllBookings(){

        $bookings = $this->db->getAll('bookings');
        return $bookings;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getById($id)
    {
        $db = new Database();
        $sql = "SELECT * FROM `bookings` WHERE idBooking = :id";
        $params = [
            'id' => $id
        ];
        $booking=$db->query($sql, $params);
        if(!$booking) {
            die("booking $id not found");
        }

       return json_encode($booking[0]);

        // $params = [
        //     'id' => $id
        // ];
        // $sql = "WHERE idBooking = :id";
        // $booking = $this->db->getAll('bookings', $sql, $params);
        // echo $booking;
    }
}
