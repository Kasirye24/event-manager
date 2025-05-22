<?php

declare(strict_types=1);

namespace models;

use Exception;
use PDO;

class Event
{

  private $pdo;

  public function __construct()
  {
    global $PDO;
    $this->pdo = $PDO;
  }

  public function addEvent(array $details, array $sessions = [])
  {
    global $PDO;
    try {
      if (!$PDO->inTransaction()) {
        $PDO->beginTransaction();
      }
      $sql = "INSERT INTO `events`(`title`, `description`, `cover_photo`, `start_date`, `end_date`)
            VALUES(:title, :description, :cover_photo, :start_date, :end_date)";
      $stmt = $PDO->prepare($sql);
      $stmt->bindParam(':title', $details['title']);
      $stmt->bindParam(':description', $details['description']);
      $stmt->bindParam(':cover_photo', $details['cover_photo']);
      $stmt->bindParam(':start_date', $details['start_date']);
      $stmt->bindParam(':end_date', $details['end_date']);

      if (!$stmt->execute()) {
        $PDO->rollBack();
        return false;
      }

      $event_id = (int) $PDO->lastInsertId();
      if (!empty($sessions)) {
        foreach ($sessions as $session) {
          if (!$this->addSession($event_id, $session)) {
            $PDO->rollBack();
            return false;
          }
        }
      }

      $PDO->commit();
      return true;
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function addSession(int $event_id, array $session)
  {
    global $PDO;
    $sql = "INSERT INTO `sessions`(`event_id`, `period`, `date`, `start_time`, `end_time`, `user_id`, `speakers`)
            VALUES(:event_id, :period, :date, :start_time, :end_time, :user_id, :speakers)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':event_id', $event_id);
    $stmt->bindParam(':period', $session['period']);
    $stmt->bindParam(':date', $session['date']);
    $stmt->bindParam(':start_time', $session['start_time']);
    $stmt->bindParam(':end_time', $session['end_time']);
    $stmt->bindParam(':user_id', $session['user_id']);
    $stmt->bindParam(':speakers', $session['speakers']);
    if (!$stmt->execute()) {
      return false;
    }
    return true;
  }

  public function getEvents()
  {
    $sql = "SELECT * FROM `events` WHERE `is_deleted` = 0 ORDER BY `created_at` DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getEventById(int $id)
  {
    $sql = "SELECT * FROM `events` WHERE `is_deleted` = 0 AND `id` = :id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public function getEventSessions(int $event_id)
  {
    $sql = "SELECT * FROM `sessions` WHERE `is_deleted` = 0 AND `event_id` = :event_id ORDER BY `created_at` DESC";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':event_id', $event_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

    public function getSections()
  {
    $sql = "SELECT * FROM `sections` WHERE `is_deleted` = 0";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
