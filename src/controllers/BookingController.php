<?php

declare(strict_types=1);

namespace controllers;

use core\Controller;
use Exception;
use helpers\Response;
use helpers\Session;

class BookingController extends Controller
{
  protected $bookingModel;
  public function __construct() {
    $this->bookingModel = $this->loadModel('Booking');
  }

  public function invoice(string $ticket_number)
  {
    $data = [
      'title' => 'Invoice - ' . $ticket_number,
      'details' => $this->bookingModel->getInvoiceDetails($ticket_number),
    ];

    return $this->loadView('invoice-details', $data);
  }
}
