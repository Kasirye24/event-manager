<?php

declare(strict_types=1);

namespace models;

use Exception;
use PDO;


class Guest
{
  private $pdo;

  public function __construct()
  {
    global $PDO;
    $this->pdo = $PDO;
  }

  public function findGuestByEmail(string $email)
  {
    $sql = "SELECT * FROM `guests` WHERE `email` = :email AND is_deleted = 0 LIMIT 1";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function addGuest(array $data)
  {
    $sql = "INSERT INTO `guests`(`full_name`, `email`, `phone`, `organization`) 
              VALUES(:full_name, :email, :phone, :organization)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':full_name', $data['full_name']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':phone', $data['phone']);
    $stmt->bindParam(':organization', $data['organization']);
    if (!$stmt->execute()) {
      return false;
    }
    $guest_id = (int) $this->pdo->lastInsertId();
    return $guest_id;
  }
}
