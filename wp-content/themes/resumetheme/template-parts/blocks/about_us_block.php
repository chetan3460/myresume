<?php

$subtitle = get_sub_field('subtitle');
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$award_badge = get_sub_field('award_badge');
$image = get_sub_field('image');
// $stats_items = get_sub_field('stats_items');


// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($subtitle || $heading || $content) && !$hide_block) :
?>
    <!-- About Us block -->
    <section id="about" class="about-us--block py-5 fade-in" style="<?php if ($padding_top) { ?>padding-top: <?= $padding_top ?>px; <?php } ?><?php if ($padding_bottom) { ?>padding-bottom: <?= $padding_bottom ?>px; <?php } ?>">

        <div class="container parallax-block-wrap">
            <div class="row">
                <div class="col-lg-5 ">
                    <div class="about-us--content-wrapper">

                        <?php if ($subtitle) : ?>
                            <div class="sec-title-animation animation-style2">
                                <div class="subtitle py-2 px-3 d-inline-flex justify-content-center align-items-center gap-2 mb-3 fw-bold rounded-4 title-animation text-uppercase">
                                    <?= $subtitle; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($heading) : ?>
                            <div class="sec-title-animation animation-style3">
                                <h2 class="mb-sm-8 mb-5 title-animation"><?= $heading; ?></h2>
                            </div>
                        <?php endif; ?>

                        <?php if (have_rows('stats_items')): ?>
                            <div class="about-us--cards-wrapper d-flex flex-md-row flex-column gap-4 fade-up-stagger-wrap">
                                <?php while (have_rows('stats_items')): the_row();
                                    // Sub repeater fields
                                    $years = get_sub_field('years');
                                    $title = get_sub_field('title');
                                    $description = get_sub_field('description');
                                    $delay = $delay + 0.2;
                                ?>
                                    <div class="item d-flex gap-sm-4 gap-3 flex-column fade-up-stagger" data-delay="<?php echo $delay ?>">
                                        <?php if ($years): ?>
                                            <div class="fig-txt d-flex align-items-center fw-bold gap-2">
                                                <p><?= ($years); ?></p>
                                                <span>+</span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($title): ?>
                                            <h3><?= $title; ?></h3>
                                        <?php endif; ?>

                                        <?php if ($description): ?>
                                            <div class="content">
                                                <?= $description; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endwhile; ?>


                            </div>
                        <?php endif; ?>


                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="about-us--img-wrapper mt-lg-0 mt-5">

                        <?php if ($award_badge) : ?>
                            <div class="about-us--awards-wrapper">
                                <img loading="lazy" src="<?= wp_get_attachment_image_url($award_badge, 'blur') ?>" data-src="<?= wp_get_attachment_image_url($award_badge, 'full') ?>" alt="<?= esc_attr(get_post_meta($award_badge, '_wp_attachment_image_alt', true)) ?: 'Section Image' ?>" class="lazy-image rounded-4 parallax-block" />
                            </div>
                        <?php endif; ?>

                        <!-- Team -->
                        <?php
                        $image_data = get_image_with_fallback($image, 'full');
                        $blur_image_url = $image ? wp_get_attachment_image_url($image, 'blur') : get_template_directory_uri() . '/assets/images/placeholder.jpg';
                        ?>

                        <div class="team-img">
                            <img loading="lazy"
                                src="<?= $blur_image_url ?>"
                                data-src="<?= $image_data['url'] ?>"
                                alt="<?= $image_data['alt'] ?>"
                                class="lazy-image object-cover rounded-4" />
                        </div>



                    </div>
                </div>
            </div>
        </div>


    </section>

<?php endif; ?>