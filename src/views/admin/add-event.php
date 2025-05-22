<?php

declare(strict_types=1);

require APP_ROOT . '/views/include/admin_header.php';
?>
<div class="card">
  <form class="main-form" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
    <input name="action" value="add_event" type="hidden" />
    <div class="card-header">
      <h3><i class="fa-solid fa-calendar me-3"></i>Add New Event</h3>
    </div>
    <div class="card-body">
      <?php if (!empty($errors)) : ?>
        <div class="alert alert-<?= str_contains($errors[0], 'successfully') ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
          <?= $errors[0] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php endif; ?>
      <div class="form-group mt-30 mb-3">
        <label class="form-label fs-16">Event Name*</label>
        <input class="form-control h_40" type="text" placeholder="" value="" name="event_name" required>
      </div>
      <div class="form-group mb-3">
        <label class="form-label fs-16">Description*</label>
        <textarea class="form-control" id="ld_editor" rows="5" name="description"></textarea>
      </div>
      <div class="form-group mb-3">
        <label class="form-label fs-16">Location*</label>
        <input class="form-control h_40" type="text" placeholder="" value="" name="location" required>
      </div>
      <div class="form-group mb-3">
        <label class="form-label fs-16">Cover Photo</label>
        <input type="file" class="form-control" name="cover_photo">
      </div>
      <div class="row">
        <div class="form-group mb-3 col-md-6">
          <label class="form-label fs-16">Start Date*</label>
          <div class="loc-group position-relative">
            <input class="form-control h_50 datepicker-here" required name="start_date" data-language="en" type="text" placeholder="MM/DD/YYYY" value="">
            <span class="absolute-icon"><i class="fa-solid fa-calendar-days"></i></span>
          </div>
        </div>
        <div class="form-group mb-3 col-md-6">
          <label class="form-label fs-16">End Date*</label>
          <div class="loc-group position-relative">
            <input class="form-control h_50 datepicker-here" required name="end_date" data-language="en" type="text" placeholder="MM/DD/YYYY" value="">
            <span class="absolute-icon"><i class="fa-solid fa-calendar-days"></i></span>
          </div>
        </div>
      </div>
      <h5><i class="fa-solid fa-calendar mt-3 me-3"></i>Event Sessions</h5>
      <div class="row" id="session-row-0">
        <div class="form-group mb-3 col-sm-2">
          <label class="form-label fs-16">Speakers</label>
          <input class="form-control h_40" type="text" placeholder="e.g john doe, kasirye brian" value="" name="sessions[0][speakers]" required>
        </div>
        <div class="form-group mb-3 col-sm-2">
          <label class="form-label fs-16">Date*</label>
          <div class="loc-group position-relative">
            <input class="form-control datepicker-here" name="sessions[0][date]" data-language="en" type="text" placeholder="MM/DD/YYYY" value="" required>
            <span class="absolute-icon"><i class="fa-solid fa-calendar-days"></i></span>
          </div>
        </div>
        <div class="form-group mb-3 col-sm-2 clock-icon">
          <label class="form-label fs-16">Start Time*</label>
          <select class="selectpicker" data-size="5" data-live-search="true" name="sessions[0][start_time]" required>
            <option value="00:00">12:00 AM</option>
            <option value="00:15">12:15 AM</option>
            <option value="00:30">12:30 AM</option>
            <option value="00:45">12:45 AM</option>
            <option value="01:00">01:00 AM</option>
            <option value="01:15">01:15 AM</option>
            <option value="01:30">01:30 AM</option>
            <option value="01:45">01:45 AM</option>
            <option value="02:00">02:00 AM</option>
            <option value="02:15">02:15 AM</option>
            <option value="02:30">02:30 AM</option>
            <option value="02:45">02:45 AM</option>
            <option value="03:00">03:00 AM</option>
            <option value="03:15">03:15 AM</option>
            <option value="03:30">03:30 AM</option>
            <option value="03:45">03:45 AM</option>
            <option value="04:00">04:00 AM</option>
            <option value="04:15">04:15 AM</option>
            <option value="04:30">04:30 AM</option>
            <option value="04:45">04:45 AM</option>
            <option value="05:00">05:00 AM</option>
            <option value="05:15">05:15 AM</option>
            <option value="05:30">05:30 AM</option>
            <option value="05:45">05:45 AM</option>
            <option value="06:00">06:00 AM</option>
            <option value="06:15">06:15 AM</option>
            <option value="06:30">06:30 AM</option>
            <option value="06:45">06:45 AM</option>
            <option value="07:00">07:00 AM</option>
            <option value="07:15">07:15 AM</option>
            <option value="07:30">07:30 AM</option>
            <option value="07:45">07:45 AM</option>
            <option value="08:00">08:00 AM</option>
            <option value="08:15">08:15 AM</option>
            <option value="08:30">08:30 AM</option>
            <option value="08:45">08:45 AM</option>
            <option value="09:00">09:00 AM</option>
            <option value="09:15">09:15 AM</option>
            <option value="09:30">09:30 AM</option>
            <option value="09:45">09:45 AM</option>
            <option value="10:00" selected="selected">10:00 AM</option>
            <option value="10:15">10:15 AM</option>
            <option value="10:30">10:30 AM</option>
            <option value="10:45">10:45 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="11:15">11:15 AM</option>
            <option value="11:30">11:30 AM</option>
            <option value="11:45">11:45 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="12:15">12:15 PM</option>
            <option value="12:30">12:30 PM</option>
            <option value="12:45">12:45 PM</option>
            <option value="13:00">01:00 PM</option>
            <option value="13:15">01:15 PM</option>
            <option value="13:30">01:30 PM</option>
            <option value="13:45">01:45 PM</option>
            <option value="14:00">02:00 PM</option>
            <option value="14:15">02:15 PM</option>
            <option value="14:30">02:30 PM</option>
            <option value="14:45">02:45 PM</option>
            <option value="15:00">03:00 PM</option>
            <option value="15:15">03:15 PM</option>
            <option value="15:30">03:30 PM</option>
            <option value="15:45">03:45 PM</option>
            <option value="16:00">04:00 PM</option>
            <option value="16:15">04:15 PM</option>
            <option value="16:30">04:30 PM</option>
            <option value="16:45">04:45 PM</option>
            <option value="17:00">05:00 PM</option>
            <option value="17:15">05:15 PM</option>
            <option value="17:30">05:30 PM</option>
            <option value="17:45">05:45 PM</option>
            <option value="18:00">06:00 PM</option>
            <option value="18:15">06:15 PM</option>
            <option value="18:30">06:30 PM</option>
            <option value="18:45">06:45 PM</option>
            <option value="19:00">07:00 PM</option>
            <option value="19:15">07:15 PM</option>
            <option value="19:30">07:30 PM</option>
            <option value="19:45">07:45 PM</option>
            <option value="20:00">08:00 PM</option>
            <option value="20:15">08:15 PM</option>
            <option value="20:30">08:30 PM</option>
            <option value="20:45">08:45 PM</option>
            <option value="21:00">09:00 PM</option>
            <option value="21:15">09:15 PM</option>
            <option value="21:30">09:30 PM</option>
            <option value="21:45">09:45 PM</option>
            <option value="22:00">10:00 PM</option>
            <option value="22:15">10:15 PM</option>
            <option value="22:30">10:30 PM</option>
            <option value="22:45">10:45 PM</option>
            <option value="23:00">11:00 PM</option>
            <option value="23:15">11:15 PM</option>
            <option value="23:30">11:30 PM</option>
            <option value="23:45">11:45 PM</option>
          </select>
        </div>
        <div class="form-group mb-3 col-sm-2 clock-icon">
          <label class="form-label fs-16">End Time*</label>
          <select class="selectpicker" data-size="5" data-live-search="true" name="sessions[0][end_time]" required>
            <option value="00:00">12:00 AM</option>
            <option value="00:15">12:15 AM</option>
            <option value="00:30">12:30 AM</option>
            <option value="00:45">12:45 AM</option>
            <option value="01:00">01:00 AM</option>
            <option value="01:15">01:15 AM</option>
            <option value="01:30">01:30 AM</option>
            <option value="01:45">01:45 AM</option>
            <option value="02:00">02:00 AM</option>
            <option value="02:15">02:15 AM</option>
            <option value="02:30">02:30 AM</option>
            <option value="02:45">02:45 AM</option>
            <option value="03:00">03:00 AM</option>
            <option value="03:15">03:15 AM</option>
            <option value="03:30">03:30 AM</option>
            <option value="03:45">03:45 AM</option>
            <option value="04:00">04:00 AM</option>
            <option value="04:15">04:15 AM</option>
            <option value="04:30">04:30 AM</option>
            <option value="04:45">04:45 AM</option>
            <option value="05:00">05:00 AM</option>
            <option value="05:15">05:15 AM</option>
            <option value="05:30">05:30 AM</option>
            <option value="05:45">05:45 AM</option>
            <option value="06:00">06:00 AM</option>
            <option value="06:15">06:15 AM</option>
            <option value="06:30">06:30 AM</option>
            <option value="06:45">06:45 AM</option>
            <option value="07:00">07:00 AM</option>
            <option value="07:15">07:15 AM</option>
            <option value="07:30">07:30 AM</option>
            <option value="07:45">07:45 AM</option>
            <option value="08:00">08:00 AM</option>
            <option value="08:15">08:15 AM</option>
            <option value="08:30">08:30 AM</option>
            <option value="08:45">08:45 AM</option>
            <option value="09:00">09:00 AM</option>
            <option value="09:15">09:15 AM</option>
            <option value="09:30">09:30 AM</option>
            <option value="09:45">09:45 AM</option>
            <option value="10:00" selected="selected">10:00 AM</option>
            <option value="10:15">10:15 AM</option>
            <option value="10:30">10:30 AM</option>
            <option value="10:45">10:45 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="11:15">11:15 AM</option>
            <option value="11:30">11:30 AM</option>
            <option value="11:45">11:45 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="12:15">12:15 PM</option>
            <option value="12:30">12:30 PM</option>
            <option value="12:45">12:45 PM</option>
            <option value="13:00">01:00 PM</option>
            <option value="13:15">01:15 PM</option>
            <option value="13:30">01:30 PM</option>
            <option value="13:45">01:45 PM</option>
            <option value="14:00">02:00 PM</option>
            <option value="14:15">02:15 PM</option>
            <option value="14:30">02:30 PM</option>
            <option value="14:45">02:45 PM</option>
            <option value="15:00">03:00 PM</option>
            <option value="15:15">03:15 PM</option>
            <option value="15:30">03:30 PM</option>
            <option value="15:45">03:45 PM</option>
            <option value="16:00">04:00 PM</option>
            <option value="16:15">04:15 PM</option>
            <option value="16:30">04:30 PM</option>
            <option value="16:45">04:45 PM</option>
            <option value="17:00">05:00 PM</option>
            <option value="17:15">05:15 PM</option>
            <option value="17:30">05:30 PM</option>
            <option value="17:45">05:45 PM</option>
            <option value="18:00">06:00 PM</option>
            <option value="18:15">06:15 PM</option>
            <option value="18:30">06:30 PM</option>
            <option value="18:45">06:45 PM</option>
            <option value="19:00">07:00 PM</option>
            <option value="19:15">07:15 PM</option>
            <option value="19:30">07:30 PM</option>
            <option value="19:45">07:45 PM</option>
            <option value="20:00">08:00 PM</option>
            <option value="20:15">08:15 PM</option>
            <option value="20:30">08:30 PM</option>
            <option value="20:45">08:45 PM</option>
            <option value="21:00">09:00 PM</option>
            <option value="21:15">09:15 PM</option>
            <option value="21:30">09:30 PM</option>
            <option value="21:45">09:45 PM</option>
            <option value="22:00">10:00 PM</option>
            <option value="22:15">10:15 PM</option>
            <option value="22:30">10:30 PM</option>
            <option value="22:45">10:45 PM</option>
            <option value="23:00">11:00 PM</option>
            <option value="23:15">11:15 PM</option>
            <option value="23:30">11:30 PM</option>
            <option value="23:45">11:45 PM</option>
          </select>
        </div>
        <div class="form-group mb-3 col-sm-2">
          <label class="form-label fs-16">Period*</label>
          <select class="selectpicker" data-size="5" data-live-search="true" name="sessions[0][period]" required>
            <option value="">Select Period</option>
            <option value="morning">Morning</option>
            <option value="midday">Midday</option>
            <option value="afternoon">Afternoon</option>
            <option value="evening">Evening</option>
          </select>
        </div>
        <div class="col-sm-2">
          <button id="add-btn" class="main-btn btn-hover h_40 mt-30 w-100" type="button"><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div id="sessionContainer"></div>
    </div>
    <div class="card-footer">
      <button class="main-btn btn-hover h_40 mt-30 w-100" type="submit">Save</button>
    </div>
  </form>
</div>

<?php
require APP_ROOT . '/views/include/admin_footer.php';
?>

<script>
  ClassicEditor
    .create(document.querySelector('#ld_editor'), {
      // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
    })
    .then(editor => {
      window.editor = editor;
    })
    .catch(err => {
      console.error(err.stack);
    });

  function initializeDynamicElements(container) {
    $(container).find('.selectpicker').selectpicker();

    $(container).find('.datepicker-here').each(function() {
      $(this).datepicker({
        language: 'en'
      });
    });
  }

  $(document).ready(function() {
    initializeDynamicElements($('body'));
  });


  let i = 0;
  let maxSessionIndex = 0;
  $('input[name^="sessions["]').each(function() {
    const name = $(this).attr('name');
    const match = name.match(/sessions\[(\d+)\]/);
    if (match && match[1]) {
      const index = parseInt(match[1], 10);
      if (index > maxSessionIndex) {
        maxSessionIndex = index;
      }
    }
  });
  i = maxSessionIndex;

  $("body").on('click', '#add-btn', function(e) {
    i++;
    let sessionInput = `
            <div class="row" id="session-row-${i}">
                <div class="form-group mb-3 col-sm-2">
                    <label class="form-label fs-16">Speakers</label>
                    <input class="form-control h_40" type="text" placeholder="e.g john doe, kasirye brian" value="" name="sessions[${i}][speakers]">
                </div>
                <div class="form-group mb-3 col-sm-2">
                    <label class="form-label fs-16">Date*</label>
                    <div class="loc-group position-relative">
                        <input class="form-control datepicker-here" name="sessions[${i}][date]" data-language="en" type="text" placeholder="MM/DD/YYYY" value="">
                        <span class="absolute-icon"><i class="fa-solid fa-calendar-days"></i></span>
                    </div>
                </div>
                <div class="form-group mb-3 col-sm-2 clock-icon">
                    <label class="form-label fs-16">Start Time*</label>
                    <select class="selectpicker" data-size="5" data-live-search="true" name="sessions[${i}][start_time]">
                        <option value="00:00">12:00 AM</option>
                        <option value="00:15">12:15 AM</option>
                        <option value="00:30">12:30 AM</option>
                        <option value="00:45">12:45 AM</option>
                        <option value="01:00">01:00 AM</option>
                        <option value="01:15">01:15 AM</option>
                        <option value="01:30">01:30 AM</option>
                        <option value="01:45">01:45 AM</option>
                        <option value="02:00">02:00 AM</option>
                        <option value="02:15">02:15 AM</option>
                        <option value="02:30">02:30 AM</option>
                        <option value="02:45">02:45 AM</option>
                        <option value="03:00">03:00 AM</option>
                        <option value="03:15">03:15 AM</option>
                        <option value="03:30">03:30 AM</option>
                        <option value="03:45">03:45 AM</option>
                        <option value="04:00">04:00 AM</option>
                        <option value="04:15">04:15 AM</option>
                        <option value="04:30">04:30 AM</option>
                        <option value="04:45">04:45 AM</option>
                        <option value="05:00">05:00 AM</option>
                        <option value="05:15">05:15 AM</option>
                        <option value="05:30">05:30 AM</option>
                        <option value="05:45">05:45 AM</option>
                        <option value="06:00">06:00 AM</option>
                        <option value="06:15">06:15 AM</option>
                        <option value="06:30">06:30 AM</option>
                        <option value="06:45">06:45 AM</option>
                        <option value="07:00">07:00 AM</option>
                        <option value="07:15">07:15 AM</option>
                        <option value="07:30">07:30 AM</option>
                        <option value="07:45">07:45 AM</option>
                        <option value="08:00">08:00 AM</option>
                        <option value="08:15">08:15 AM</option>
                        <option value="08:30">08:30 AM</option>
                        <option value="08:45">08:45 AM</option>
                        <option value="09:00">09:00 AM</option>
                        <option value="09:15">09:15 AM</option>
                        <option value="09:30">09:30 AM</option>
                        <option value="09:45">09:45 AM</option>
                        <option value="10:00" selected="selected">10:00 AM</option>
                        <option value="10:15">10:15 AM</option>
                        <option value="10:30">10:30 AM</option>
                        <option value="10:45">10:45 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="11:15">11:15 AM</option>
                        <option value="11:30">11:30 AM</option>
                        <option value="11:45">11:45 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="12:15">12:15 PM</option>
                        <option value="12:30">12:30 PM</option>
                        <option value="12:45">12:45 PM</option>
                        <option value="13:00">01:00 PM</option>
                        <option value="13:15">01:15 PM</option>
                        <option value="13:30">01:30 PM</option>
                        <option value="13:45">01:45 PM</option>
                        <option value="14:00">02:00 PM</option>
                        <option value="14:15">02:15 PM</option>
                        <option value="14:30">02:30 PM</option>
                        <option value="14:45">02:45 PM</option>
                        <option value="15:00">03:00 PM</option>
                        <option value="15:15">03:15 PM</option>
                        <option value="15:30">03:30 PM</option>
                        <option value="15:45">03:45 PM</option>
                        <option value="16:00">04:00 PM</option>
                        <option value="16:15">04:15 PM</option>
                        <option value="16:30">04:30 PM</option>
                        <option value="16:45">04:45 PM</option>
                        <option value="17:00">05:00 PM</option>
                        <option value="17:15">05:15 PM</option>
                        <option value="17:30">05:30 PM</option>
                        <option value="17:45">05:45 PM</option>
                        <option value="18:00">06:00 PM</option>
                        <option value="18:15">06:15 PM</option>
                        <option value="18:30">06:30 PM</option>
                        <option value="18:45">06:45 PM</option>
                        <option value="19:00">07:00 PM</option>
                        <option value="19:15">07:15 PM</option>
                        <option value="19:30">07:30 PM</option>
                        <option value="19:45">07:45 PM</option>
                        <option value="20:00">08:00 PM</option>
                        <option value="20:15">08:15 PM</option>
                        <option value="20:30">08:30 PM</option>
                        <option value="20:45">08:45 PM</option>
                        <option value="21:00">09:00 PM</option>
                        <option value="21:15">09:15 PM</option>
                        <option value="21:30">09:30 PM</option>
                        <option value="21:45">09:45 PM</option>
                        <option value="22:00">10:00 PM</option>
                        <option value="22:15">10:15 PM</option>
                        <option value="22:30">10:30 PM</option>
                        <option value="22:45">10:45 PM</option>
                        <option value="23:00">11:00 PM</option>
                        <option value="23:15">11:15 PM</option>
                        <option value="23:30">11:30 PM</option>
                        <option value="23:45">11:45 PM</option>
                    </select>
                </div>
                <div class="form-group mb-3 col-sm-2 clock-icon">
                    <label class="form-label fs-16">Start Time*</label>
                    <select class="selectpicker" data-size="5" data-live-search="true" name="sessions[${i}][end_time]">
                        <option value="00:00">12:00 AM</option>
                        <option value="00:15">12:15 AM</option>
                        <option value="00:30">12:30 AM</option>
                        <option value="00:45">12:45 AM</option>
                        <option value="01:00">01:00 AM</option>
                        <option value="01:15">01:15 AM</option>
                        <option value="01:30">01:30 AM</option>
                        <option value="01:45">01:45 AM</option>
                        <option value="02:00">02:00 AM</option>
                        <option value="02:15">02:15 AM</option>
                        <option value="02:30">02:30 AM</option>
                        <option value="02:45">02:45 AM</option>
                        <option value="03:00">03:00 AM</option>
                        <option value="03:15">03:15 AM</option>
                        <option value="03:30">03:30 AM</option>
                        <option value="03:45">03:45 AM</option>
                        <option value="04:00">04:00 AM</option>
                        <option value="04:15">04:15 AM</option>
                        <option value="04:30">04:30 AM</option>
                        <option value="04:45">04:45 AM</option>
                        <option value="05:00">05:00 AM</option>
                        <option value="05:15">05:15 AM</option>
                        <option value="05:30">05:30 AM</option>
                        <option value="05:45">05:45 AM</option>
                        <option value="06:00">06:00 AM</option>
                        <option value="06:15">06:15 AM</option>
                        <option value="06:30">06:30 AM</option>
                        <option value="06:45">06:45 AM</option>
                        <option value="07:00">07:00 AM</option>
                        <option value="07:15">07:15 AM</option>
                        <option value="07:30">07:30 AM</option>
                        <option value="07:45">07:45 AM</option>
                        <option value="08:00">08:00 AM</option>
                        <option value="08:15">08:15 AM</option>
                        <option value="08:30">08:30 AM</option>
                        <option value="08:45">08:45 AM</option>
                        <option value="09:00">09:00 AM</option>
                        <option value="09:15">09:15 AM</option>
                        <option value="09:30">09:30 AM</option>
                        <option value="09:45">09:45 AM</option>
                        <option value="10:00" selected="selected">10:00 AM</option>
                        <option value="10:15">10:15 AM</option>
                        <option value="10:30">10:30 AM</option>
                        <option value="10:45">10:45 AM</option>
                        <option value="11:00">11:00 AM</option>
                        <option value="11:15">11:15 AM</option>
                        <option value="11:30">11:30 AM</option>
                        <option value="11:45">11:45 AM</option>
                        <option value="12:00">12:00 PM</option>
                        <option value="12:15">12:15 PM</option>
                        <option value="12:30">12:30 PM</option>
                        <option value="12:45">12:45 PM</option>
                        <option value="13:00">01:00 PM</option>
                        <option value="13:15">01:15 PM</option>
                        <option value="13:30">01:30 PM</option>
                        <option value="13:45">01:45 PM</option>
                        <option value="14:00">02:00 PM</option>
                        <option value="14:15">02:15 PM</option>
                        <option value="14:30">02:30 PM</option>
                        <option value="14:45">02:45 PM</option>
                        <option value="15:00">03:00 PM</option>
                        <option value="15:15">03:15 PM</option>
                        <option value="15:30">03:30 PM</option>
                        <option value="15:45">03:45 PM</option>
                        <option value="16:00">04:00 PM</option>
                        <option value="16:15">04:15 PM</option>
                        <option value="16:30">04:30 PM</option>
                        <option value="16:45">04:45 PM</option>
                        <option value="17:00">05:00 PM</option>
                        <option value="17:15">05:15 PM</option>
                        <option value="17:30">05:30 PM</option>
                        <option value="17:45">05:45 PM</option>
                        <option value="18:00">06:00 PM</option>
                        <option value="18:15">06:15 PM</option>
                        <option value="18:30">06:30 PM</option>
                        <option value="18:45">06:45 PM</option>
                        <option value="19:00">07:00 PM</option>
                        <option value="19:15">07:15 PM</option>
                        <option value="19:30">07:30 PM</option>
                        <option value="19:45">07:45 PM</option>
                        <option value="20:00">08:00 PM</option>
                        <option value="20:15">08:15 PM</option>
                        <option value="20:30">08:30 PM</option>
                        <option value="20:45">08:45 PM</option>
                        <option value="21:00">09:00 PM</option>
                        <option value="21:15">09:15 PM</option>
                        <option value="21:30">09:30 PM</option>
                        <option value="21:45">09:45 PM</option>
                        <option value="22:00">10:00 PM</option>
                        <option value="22:15">10:15 PM</option>
                        <option value="22:30">10:30 PM</option>
                        <option value="22:45">10:45 PM</option>
                        <option value="23:00">11:00 PM</option>
                        <option value="23:15">11:15 PM</option>
                        <option value="23:30">11:30 PM</option>
                        <option value="23:45">11:45 PM</option>
                    </select>
                </div>
                <div class="form-group mb-3 col-sm-2">
                    <label class="form-label fs-16">Period*</label>
                    <select class="selectpicker" data-size="5" data-live-search="true" name="sessions[${i}][period]">
                        <option value="">Select Period</option>
                        <option value="morning">Morning</option>
                        <option value="midday">Midday</option>
                        <option value="afternoon">Afternoon</option>
                        <option value="evening">Evening</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button id="${i}" class="danger-btn btn-hover h_40 mt-30 w-100 remove-session" type="button"><i class="fa fa-minus"></i></button>
                </div>
            </div>
        `;

    $('#sessionContainer').append(sessionInput);

    // Re-initialize the plugins for the newly added content
    initializeDynamicElements($('#session-row-' + i));
  });

  // Delegated event for removing sessions
  $(document).on('click', '.remove-session', function() {
    let row_id = $(this).attr('id');
    $(`#session-row-${row_id}`).remove();
  });
</script>