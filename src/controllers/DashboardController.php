<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use Exception;
use helpers\Response;
use helpers\Session;

class DashboardController extends Controller
{
  public function __construct() {}

  public function index()
  {
    Session::logout();
    isLoggedIn();

    $data = [
      'title' => 'Dashboard',
    ];

    return $this->loadView('admin/dashboard', $data);

  }
}
