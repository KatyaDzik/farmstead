<?php

namespace App\Controllers;
use App\Services\Database;
use App\Services\Router;
use App\Models\Client;
use App\Models\Feedback;

class ClientAction{

    public function createFeedback($data)
    {
        $client=new Client();
        $client->createClient($data);
        $feedback=new Feedback();
        var_dump($data);
        $feedback->createFeedback($data, $client->getId());
    }
}