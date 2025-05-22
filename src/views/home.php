<?php

declare(strict_types=1);

require  APP_ROOT . '/views/include/header.php';
?>
<div class="hero-banner">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-9 col-md-10">
                <div class="hero-banner-content">
                    <h2><?= $title ?></h2>
                    <p>Streamlining Entry, Simplifying Experience.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="explore-events p-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="main-title">
                    <h3>Explore Events</h3>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="event-filter-items">
                    <div class="featured-controls">
                        <div class="row" data-ref="event-filter-content">
                            <?php foreach ($events as $event) : ?>
                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mix arts concert workshops volunteer sports health_Wellness" data-ref="mixitup-target">
                                    <div class="main-card mt-4">
                                        <div class="event-thumbnail">
                                            <a href="/events/<?= $event['id'] ?>" class="thumbnail-img">
                                                <img src="<?= $event['cover_photo'] ? $event['cover_photo'] : '/assets/images/event-imgs/img-7.jpg' ?>" alt="">
                                            </a>
                                            <!-- <span class="bookmark-icon" title="Bookmark"></span> -->
                                        </div>
                                        <div class="event-content">
                                            <a href="/events/<?= $event['id'] ?>" class="event-title"><?= $event['title'] ?></a>
                                            <div class="duration-price-remaining">
                                                <?php $description = $event['description'] ? html_entity_decode(limitCharacters($event['description'], 30)) : 'No description'; ?>
                                                <?= $description  ?>
                                            </div>
                                        </div>
                                        <div class="event-footer">
                                            <div class="event-timing">
                                                <div class="publish-date">
                                                    <span><i class="fa-solid fa-calendar-day me-2"></i>
                                                        <?= date('d M', strtotime($event['start_date'])) ?>
                                                    </span>
                                                    <span class="dot"><i class="fa-solid fa-circle"></i></span>
                                                    <span><?= date('d M, Y', strtotime($event['end_date'])) ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require  APP_ROOT . '/views/include/footer.php';
?>