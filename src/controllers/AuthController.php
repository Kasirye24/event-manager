<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use Exception;
use helpers\Response;

class AuthController extends Controller
{
  protected $userModal;

  public function __construct()
  {
    $this->userModal = $this->loadModel('User');
  }

  public function index()
  {
    $data = [
      'title' => 'Admin Login',
    ];

    $errors = $this->store();
    return $this->loadView('admin/login', $data, $errors);
  }

  public function store()
  {
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $action = $_POST['action'] ?? null;
      if ($action === 'login') {
        $details = [
          'username' => htmlspecialchars($_POST['username']),
          'password' => htmlspecialchars($_POST['password']),
        ];

        if (empty($details['username'])) {
          $errors[] = "Fill in your username";
        } else if (empty($details['password'])) {
          $errors[] = "Fill in your password";
        }

        if (empty($errors)) {
          try {
            $result = $this->userModal->loginAuth($details);
            if ($result) {
              $_SESSION['user_id'] = $result['id'];
              $_SESSION['username'] = $result['username'];
              $_SESSION['email'] = $result['email'];
              header("location:/admin/dashboard");
              exit;
            } else {
              $errors[] = 'Invalid credentials';
            }
          } catch (Exception $e) {
            $errors[] = $e->getMessage();
          }
        }
      }
    }
    return $errors;
  }
}
