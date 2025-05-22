<?php

declare(strict_types=1);

namespace models;

use Exception;
use PDO;

class User
{

  public function loginAuth(array $data)
  {
    global $PDO;
    $sql = "SELECT * FROM `users` WHERE  `username` = :username OR `email` = :email";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':username', $data['username']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user) {
      // User not found
      return false;
    }
    if (password_verify($data['password'], $user['password'])) {
      unset($user['password']);
      return $user;
    } else {
      return false;
    }
  }
}
