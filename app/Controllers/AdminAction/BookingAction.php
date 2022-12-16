<?php

namespace App\Controllers\AdminAction;
use App\Models\Booking;

class BookingAction{

    private $b;

    public function __construct()
    {
        $b= new Booking();
    }

    public function getAllBokings()
    {
        $b= new Booking();
        echo $b->getAllBookings();
    } 
    
    public function getById($params)
    {
        $b= new Booking();
        print_r($b->getById($params['id']));
    }
}