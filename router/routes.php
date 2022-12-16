<?php
use App\Services\Router;
use App\Controllers\Auth;
use App\Controllers\ClientAction;
use App\Controllers\AdminAction\BookingAction;

$p = explode('/', $_GET["q"]);
//admin page getAllBokings
Router::page('/login', 'admin/pages/login');
Router::page('/home', 'admin/pages/home');
//client page
Router::page('/naozere', 'client/pages/naozere');
//admin action
Router::post('/auth/login', Auth::class, 'login');
Router::post('/auth/logout', Auth::class, 'logout');
Router::get('/bookings', BookingAction::class, 'getAllBokings');
if(isset($p[1]))
{
Router::get('/bookings'.'/'.$p[1], BookingAction::class, 'getById', $params=["id"=>$p[1]]);
}
//client action
Router::post('/naozere/feedback', ClientAction::class, 'createFeedback');

Router::enable();

?>