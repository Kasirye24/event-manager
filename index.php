<?php
require_once 'src/require.php';

use controllers\AuthController;
use controllers\BookingController;
use controllers\DashboardController;
use controllers\EventController;
use controllers\HomeController;
use controllers\pagesController;
use controllers\TestController;
use core\Router;


const BASE_DIR = __DIR__;

Router::get('/', HomeController::class . '@index');

Router::any('/admin', AuthController::class . '@index');
Router::post('/admin', AuthController::class . '@store');

Router::any('/admin/dashboard', DashboardController::class . '@index');

Router::any('/admin/events', EventController::class . '@index');
Router::any('/admin/events/add', EventController::class . '@add');

Router::get('/events/{id}', function ($params) {
  return (new EventController())->details((int) $params['id']);
});

Router::any('/event/booking/{id}', function ($params) {
  return (new EventController())->makeBooking((int) $params['id']);
});


Router::get('/booking/invoice/{ticket_number}', function ($params) {
  return (new BookingController())->invoice($params['ticket_number']);
});


Router::addNotFoundHandler(function () {
  echo 'Not Found';
});



Router::run();
