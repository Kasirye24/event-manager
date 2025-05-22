<?php

declare(strict_types=1);

require APP_ROOT . '/views/include/header.php';

// Define booked seats for demonstration (this could come from a database in a real application)
$bookedSeats = [];

foreach ($booked_seats as $seat) {
  $bookedSeats[] = $seat['seat_number'];
}


// Define section prices in UGX
$sectionPrices = [
  'First' => 150000,
  'Middle' => 75000,
  'Balcony' => 35000,
  'Box' => 350000
];
?>

<style>
  .stage {
    background-color: #ccc;
    padding: 10px;
  }

  .section {
    margin: 30px auto;
    padding: 10px;
    max-width: 98%;
    border-radius: 10px;
  }

  .rows {
    display: flex;
    flex-direction: column;
    gap: 5px;
  }

  .row-seat {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
  }

  .seats {
    display: flex;
    gap: 5px;
  }

  .seats input[type="checkbox"] {
    width: 20px;
    height: 20px;
  }

  .box-seats {
    position: absolute;
    left: 10px;
    top: 100px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .box-container {
    display: grid;
    grid-template-columns: repeat(2, 30px);
    gap: 5px;
    margin-top: 10px;
  }

  .box-seat input[type="checkbox"] {
    width: 20px;
    height: 20px;
  }

  .seats {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
  }

  .seat-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 35px;
  }

  .seat-label {
    font-size: 10px;
  }

  /* Style for booked seats */
  .booked-seat {
    background-color: #808080 !important;
    /* Gray color for booked seats */
    cursor: not-allowed !important;
  }

  /* Cart styles */
  .cart-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
  }
</style>

<div class="event-dt-block p-80">
  <div class="container">
    <form class="row" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
      <input type="hidden" name="action" value="make_booking">
      <div class="col-lg-12 col-md-12">
        <div class="main-title checkout-title">
          <h3>Booking Confirmation</h3>
        </div>
      </div>
      <div class="col-xl-8 col-lg-12 col-md-12">
        <div class="checkout-block">
          <div class="main-card">
            <div class="bp-title">
              <h4>Billing Information</h4>
            </div>
            <?php if (!empty($errors)) : ?>
              <div class="alert alert-<?= str_contains($errors[0], 'successfully') ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                <?= $errors[0] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>
            <div class="bp-content bp-form">
              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <div class="form-group mt-4">
                    <label class="form-label">Title*</label>
                    <input class="form-control h_50" type="text" name="title" placeholder="e.g Dr, Mr. etc" required value="<?= $_POST['title'] ?? '' ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="form-group mt-4">
                    <label class="form-label">Full Name*</label>
                    <input class="form-control h_50" type="text" placeholder="" required name="full_name" value="<?= $_POST['full_name'] ?? '' ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="form-group mt-4">
                    <label class="form-label">Email*</label>
                    <input class="form-control h_50" type="email" placeholder="brian@example.com" name="email" required value="<?= $_POST['email'] ?? '' ?>">
                  </div>
                </div>
                <div class="col-lg-6 col-md-12">
                  <div class="form-group mt-4">
                    <label class="form-label">Phone*</label>
                    <input class="form-control h_50" type="text" placeholder="" name="phone" required value="<?= $_POST['phone'] ?? '' ?>">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-group mt-4">
                    <label class="form-label">Organization</label>
                    <input class="form-control h_50" type="text" placeholder="" name="organization" value="<?= $_POST['organization'] ?? '' ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="main-card mt-5">
            <div class="bp-title">
              <h4>Available Seats: Select</h4>
            </div>
            <div class="bp-content bp-form">
              <h1 class="stage my-2">Stage</h1>
              <div class="box-seats mt-5">
                <div>BOX 1-8</div>
                <div class="box-container">
                  <?php for ($i = 1; $i <= 8; $i++):
                    $boxSeatId = "BOX{$i}";
                    $isBooked = in_array($boxSeatId, $bookedSeats);
                  ?>
                    <div class="box-seat">
                      <input type="checkbox" id="BOX<?php echo $i; ?>" title="Box Seat <?php echo $i; ?>" <?php echo $isBooked ? 'disabled' : ''; ?> class="seat-checkbox" data-section="Box" data-price="<?php echo $sectionPrices['Box']; ?>">
                      <label for="BOX<?php echo $i; ?>" <?php echo $isBooked ? 'class="booked-seat"' : ''; ?>><?php echo $i; ?></label>
                    </div>
                  <?php endfor; ?>
                </div>
              </div>

              <?php
              $firstRows = ['A', 'B', 'C', 'D', 'E', 'F'];
              $middleRows = ['G', 'H', 'I', 'J', 'K', 'L', 'M', 'N'];
              $balconyRows = ['AA', 'BB', 'CC', 'DD', 'EE', 'FF'];
              $seatCount = 12;

              function generateSeats($rows, $color, $bookedSeats, $sectionName, $sectionPrice)
              {
                $output = '';
                foreach ($rows as $row) {
                  $output .= '<div class="row-seat">' . $row . ': <span class="seats">';
                  for ($i = 1; $i <= 12; $i++) {
                    $seatId = $row . $i;
                    $isBooked = in_array($seatId, $bookedSeats);
                    $output .= '
                      <div class="seat-wrapper">
                        <input type="checkbox" id="' . $seatId . '" title="Seat ' . $seatId . '" class="seat seat-checkbox" style="cursor: ' . ($isBooked ? 'not-allowed' : 'pointer') . ';" value="' . $seatId . '" ' . ($isBooked ? 'disabled' : '') . ' data-section="' . $sectionName . '" data-price="' . $sectionPrice . '">
                        <label for="' . $seatId . '" class="seat-label' . ($isBooked ? ' booked-seat' : '') . '" style="background-color: ' . ($isBooked ? '#808080' : $color) . '; cursor: ' . ($isBooked ? 'not-allowed' : 'pointer') . ';">' . $seatId . '</label>
                      </div>';
                  }
                  $output .= '</span></div>';
                }
                return $output;
              }
              ?>

              <div class="section first">
                <h5 class="text-center">First Section</h5>
                <div class="rows">
                  <?php echo generateSeats($firstRows, '#d0e8ff', $bookedSeats, 'First', $sectionPrices['First']); ?>
                </div>
              </div>

              <div class="section middle">
                <h5 class="text-center">Middle Section</h5>
                <div class="rows">
                  <?php echo generateSeats($middleRows, '#ffe0cc', $bookedSeats, 'Middle', $sectionPrices['Middle']); ?>
                </div>
              </div>

              <div class="section balcony">
                <h5 class="text-center">Balcony Section</h5>
                <div class="rows">
                  <?php echo generateSeats($balconyRows, '#d4f4dd', $bookedSeats, 'Balcony', $sectionPrices['Balcony']); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-12 col-md-12">
        <div class="main-card order-summary">
          <div class="bp-title">
            <h4>Booking Summary</h4>
          </div>
          <div class="order-summary-content p_30">
            <div class="event-order-dt">
              <div class="event-thumbnail-img">
                <img src="<?= $details['cover_photo'] ? $details['cover_photo'] : '/assets/images/event-imgs/img-7.jpg' ?>" alt="">
              </div>
              <div class="event-order-dt-content">
                <h5><?= $details['title'] ?></h5>
              </div>
            </div>
            <div id="cart" class="cart">
              <!-- Cart items will be dynamically added here -->
            </div>
            <div class="order-total-block">
              <div class="order-total-dt">
                <div class="order-text">Total Ticket</div>
                <div class="order-number" id="total-tickets">0</div>
              </div>
              <div class="order-total-dt">
                <div class="order-text">Sub Total</div>
                <div class="order-number" id="sub-total">UGX 0</div>
              </div>
              <div class="divider-line"></div>
              <div class="order-total-dt">
                <div class="order-text">Total</div>
                <div class="order-number ttl-clr" id="total-amount">UGX 0</div>
              </div>
            </div>
            <div class="confirmation-btn">
              <button class="main-btn btn-hover h_50 w-100 mt-5" type="submit">Confirm Booking</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  const seatCheckboxes = document.querySelectorAll('.seat-checkbox');
  const cart = document.getElementById('cart');
  let selectedSeat = null;

  // Add event listener to each checkbox for single selection and cart update
  seatCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
      if (this.disabled) return; // Ignore booked seats

      if (this.checked) {
        // Uncheck all other checkboxes
        seatCheckboxes.forEach(otherCheckbox => {
          if (otherCheckbox !== this) {
            otherCheckbox.checked = false;
          }
        });

        // Update selected seat
        selectedSeat = this;

        // Get seat details
        const seatId = this.value;
        const section = this.getAttribute('data-section');
        const price = parseInt(this.getAttribute('data-price'));

        // Update cart
        cart.innerHTML = `
          <div class="cart-item">
            <span>Seat: ${seatId} (${section} Section)</span>
            <span>UGX ${price.toLocaleString()}</span>
            <input type="hidden" name="seat" value="${seatId}" >
            <input type="hidden" name="amount" value="${price}" >
          </div>
        `;

        // Update totals
        document.getElementById('total-tickets').textContent = '1';
        document.getElementById('sub-total').textContent = `UGX ${price.toLocaleString()}`;
        document.getElementById('total-amount').textContent = `UGX ${price.toLocaleString()}`;
      } else {
        // Clear cart if no seat is selected
        selectedSeat = null;
        cart.innerHTML = '';
        document.getElementById('total-tickets').textContent = '0';
        document.getElementById('sub-total').textContent = 'UGX 0';
        document.getElementById('total-amount').textContent = 'UGX 0';
      }
    });
  });
</script>

<?php
require APP_ROOT . '/views/include/footer.php';
?>