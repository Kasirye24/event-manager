<?php

declare(strict_types=1);

require  APP_ROOT . '/views/include/header.php';
?>
<div class="event-dt-block p-80">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="event-top-dts">
          <div class="event-top-date">
            <span class="event-month"><?= date('M', strtotime($details['start_date'])) ?></span>
            <span class="event-date"><?= date('d', strtotime($details['start_date'])) ?></span>
          </div>
          <div class="event-top-dt">
            <h3 class="event-main-title"><?= $details['title']; ?></h3>
            <div class="event-top-info-status">
              <span class="event-type-name"><i class="fa-solid fa-location-dot"></i><?= $details['location'] ?? 'No location' ?></span>
              <span class="event-type-name details-hr">Starts on <span class="ev-event-date"><?= date('d M', strtotime($details['start_date'])) ?></span></span>
              <!-- <span class="event-type-name details-hr">2h</span> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 col-lg-7 col-md-12">
        <div class="main-event-dt">
          <div class="event-img">
            <img src="<?= $details['cover_photo'] ? $details['cover_photo'] : '/assets/images/event-imgs/img-7.jpg' ?>" alt="">
          </div>
          <div class="main-event-content">
            <h4>About This Event</h4>
            <?= $details['description'] ? html_entity_decode($details['description']) : 'No description'; ?>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-5 col-md-12">
        <div class="main-card event-right-dt">
          <div class="bp-title">
            <h4>Event Sessions</h4>
          </div>
          <?php foreach ($sessions as $session): ?>
            <div class="event-dt-right-group mt-5">
              <div class="event-dt-right-icon">
                <i class="fa-solid fa-circle-user"></i>
              </div>
              <div class="event-dt-right-content">
                <span class="text-capitalize"><strong>Session:</strong> <?= $session['period'] ?></span><br>
                <span><strong>Date & Time:</strong> <?= date('d M, Y', strtotime($session['date'])) ?>: <?= date('h:i', strtotime($session['start_time'])) ?> - <?= date('h:i', strtotime($session['end_time'])) ?> </span><br>
                <span><strong>Speakers:</strong> <?= $session['speakers'] ?></span><br>
              </div>
            </div>
          <?php endforeach; ?>
          <div class="event-dt-right-group mt-5">
            <div class="event-dt-right-icon">
              <i class="fa-solid fa-receipt"></i>
            </div>
            <div class="event-dt-right-content">
              <?php foreach ($sections as $section): ?>
                <span class="text-capitalize"><strong>Name:</strong> <?= $section['name'] ?></span><br>
                <span class=""><strong>Price:</strong> UGX<?= number_format($section['price']) ?></span><br>
                <hr>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="booking-btn">
            <a href="/event/booking/<?= $details['id'] ?>" class="main-btn btn-hover w-100">Book Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php
require  APP_ROOT . '/views/include/footer.php';
?>