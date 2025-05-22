<?php

declare(strict_types=1);

require  APP_ROOT . '/views/include/admin_header.php';
$i = 1;
?>
<div class="row">
  <div class="col-md-12">
    <div class="d-main-title">
      <h3><i class="fa-solid fa-calendar-days me-3"></i>Events</h3>
    </div>
  </div>
  <div class="col-md-12">
    <div class="conversion-setup">
      <div class="tab-content">
        <div class="tab-pane fade active show" id="overview-tab" role="tabpanel">
          <div class="table-card mt-4">
            <div class="main-table">
              <div class="table-responsive">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Title</th>
                      <th scope="col">Start Date</th>
                      <th scope="col">End Date</th>
                      <th scope="col">Sessions</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($events)) : ?>
                      <?php foreach ($events as $event) : ?>
                        <tr>
                          <td><?= $i++ ?></td>
                          <td class="d-md-flex align-items-center event-top-info">
                            <div class="card-event-img">
                              <img src="<?= $event['cover_photo'] ? $event['cover_photo'] : '/assets/images/event-imgs/img-7.jpg' ?>"  alt="">
                            </div>
                            <div class="card-event-dt">
                              <h5><?= $event['title'] ?></h5>
                            </div>
                          </td>
                          <td><?= date('d M, Y', strtotime($event['start_date'])) ?></td>
                          <td><?= date('d M, Y', strtotime($event['end_date'])) ?></td>
                          <td><?= 2 ?></td>
                          <td><span class="action-btn"><i class="fa-solid fa-trash-can"></i></span></td>
                        </tr>

                      <?php endforeach; ?>
                    <?php else: ?>
                    <?php endif; ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require  APP_ROOT . '/views/include/admin_footer.php';
?>