<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use Exception;
use helpers\Response;
use helpers\Session;

class EventController extends Controller
{
  protected $eventModal;
  protected $guestModal;
  protected $bookingModal;

  public function __construct()
  {
    $this->eventModal = $this->loadModel('Event');
    $this->guestModal = $this->loadModel('Guest');
    $this->bookingModal = $this->loadModel('Booking');
  }

  public function index()
  {
    Session::logout();
    isLoggedIn();

    $data = [
      'title' => 'Events',
      'events' => $this->eventModal->getEvents(),
    ];

    return $this->loadView('admin/events', $data);
  }

  public function add()
  {
    Session::logout();
    isLoggedIn();

    $data = [
      'title' => 'Add Event',
    ];

    $errors = $this->store();

    return $this->loadView('admin/add-event', $data, $errors);
  }

  public function store()
  {
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $action = $_POST['action'] ?? null;
      if ($action === 'add_event') {
        $image_name = fileUpload($_FILES['cover_photo'], 'events');

        $details = [
          'title' => htmlspecialchars($_POST['event_name']),
          'description' => htmlspecialchars($_POST['description']),
          'location' => htmlspecialchars($_POST['location']),
          'cover_photo' => !empty($_FILES['cover_photo']['name']) ? URL_ROOT . '/media/events/' . $image_name : NULL,
          'start_date' => convertToMySQLDateFormat(htmlspecialchars($_POST['start_date'])),
          'end_date' => convertToMySQLDateFormat(htmlspecialchars($_POST['end_date'])),
        ];

        $sessions = [];

        if (!empty($_POST['sessions'])) {
          foreach ($_POST['sessions'] as $key => $value) {
            $sessions[] = [
              'period' => $value['period'],
              'speakers' => $value['speakers'],
              'date' => convertToMySQLDateFormat($value['date']),
              'start_time' =>  $value['start_time'],
              'end_time' =>  $value['end_time'],
              'user_id' => $_SESSION['user_id'],
            ];
          }
        }


        if (empty($errors)) {
          try {
            $result = $this->eventModal->addEvent($details, $sessions);
            if ($result) {
              $errors[] = "Event added successfully";
            }
          } catch (Exception $e) {
            $errors[] = $e->getMessage();
          }
        }
      }
    }
    return $errors;
  }

  public function details(int $id)
  {
    $data = [
      'title' => $this->eventModal->getEventById($id)['title'],
      'details' => $this->eventModal->getEventById($id),
      'sessions' => $this->eventModal->getEventSessions($id),
      'sections' => $this->eventModal->getSections(),
    ];

    return $this->loadView('event-details', $data);
  }

  public function makeBooking(int $id)
  {
    $data = [
      'title' => $this->eventModal->getEventById($id)['title'],
      'details' => $this->eventModal->getEventById($id),
      'sessions' => $this->eventModal->getEventSessions($id),
      'sections' => $this->eventModal->getSections(),
      'booked_seats' => $this->bookingModal->getBookedEventSeats($id),
    ];

    $errors = $this->manage($id);

    return $this->loadView('book-seat', $data, $errors);
  }

  public function manage(int $event_id)
  {
    $errors = [];
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      $action = $_POST['action'] ?? null;

      if ($action === 'make_booking') {

        $guestData = [
          'title' => $_POST['title'],
          'full_name' => $_POST['full_name'],
          'email' => $_POST['email'],
          'phone' => $_POST['phone'],
          'organization' => !empty($_POST['organization']) ? $_POST['organization'] : NULL,
        ];

        $guest_id = $this->guestModal->findGuestByEmail($guestData['email']) ? $this->guestModal->findGuestByEmail($guestData['email'])['id'] : $this->guestModal->addGuest($guestData);

        $bookings = [
          'guest_id' => $guest_id,
          'event_id' => $event_id,
          'seat_number' => $_POST['seat'] ?? NULL,
          'amount' => $_POST['amount'] ?? NULL,
          'ticket_number' => generateTicketNumber(),
        ];

        
        if (!isset($bookings['seat_number'])) {
          $errors[] = "Select a seat to proceed";
        }

        if (empty($errors)) {
          try {
            $result = $this->bookingModal->addBooking($bookings);
            if ($result) {
              header("Location: /booking/invoice/$result");
              exit;
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
