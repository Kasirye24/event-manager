<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use Exception;
use helpers\Response;

class HomeController extends Controller
{
  protected $eventModal;

  public function __construct()
  {

    $this->eventModal = $this->loadModel('Event');
  }

  public function index()
  {
    $data = [
      'title' => 'Exhibition Ticket and Attendance Management System',
      'events' => $this->eventModal->getEvents(),
    ];

    // var_dump($this->modeModel->getName());

    return $this->loadView('home', $data);
  }
}
