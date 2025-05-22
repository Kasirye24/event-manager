<?php

declare(strict_types=1);

namespace models;

use Exception;
use PDO;

class Booking
{
  private $pdo;

  public function __construct()
  {
    global $PDO;
    $this->pdo = $PDO;
  }

  public function addBooking(array $data)
  {
    try {
      if (!$this->pdo->inTransaction()) {
        $this->pdo->beginTransaction();
      }

      $sql = "INSERT INTO `bookings`(`guest_id`, `event_id`, `seat_number`, `ticket_number`) VALUES (:guest_id, :event_id, :seat_number, :ticket_number)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->bindParam(':guest_id', $data['guest_id']);
      $stmt->bindParam(':event_id', $data['event_id']);
      $stmt->bindParam(':seat_number', $data['seat_number']);
      $stmt->bindParam(':ticket_number', $data['ticket_number']);

      if (!$stmt->execute()) {
        $this->pdo->rollBack();
        return false;
      }

      $booking_id = (int) $this->pdo->lastInsertId();
      if (!$this->addPayment($booking_id, $data)) {
      }

      $this->pdo->commit();
      return $data['ticket_number'];
    } catch (Exception $e) {
      echo $e->getMessage();
      return false;
    }
  }

  public function addPayment(int $booking_id, array $data)
  {
    $sql = "INSERT INTO `payments`(`booking_id`, `reference_number`, `amount`) VALUES (:booking_id, :reference_number, :amount)";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':booking_id', $booking_id);
    $stmt->bindParam(':reference_number', $data['ticket_number']);
    $stmt->bindParam(':amount', $data['amount']);
    if (!$stmt->execute()) {
      return false;
    }
    return true;
  }

  public function getBookedEventSeats(int $event_id)
  {
    $sql = "SELECT seat_number FROM `bookings` WHERE `is_deleted` = 0 AND `event_id` = :event_id";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':event_id', $event_id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getInvoiceDetails(string $ticket_number)
  {
    $sql = "SELECT p.*, b.seat_number, b.ticket_number, b.event_id, e.title, e.description, e.start_date, e.end_date,
              g.full_name, g.email, g.phone, g.organization FROM `payments` p
              INNER JOIN `bookings` b ON p.booking_id = b.id
              INNER JOIN `events` e ON b.event_id = e.id
              INNER JOIN `guests` g ON b.guest_id = g.id
              WHERE b.ticket_number = :ticket_number AND p.is_deleted = 0 
              AND b.is_deleted = 0 AND e.is_deleted = 0";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':ticket_number', $ticket_number);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
