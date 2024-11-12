<?php
$heading = get_sub_field('heading');

$highlighted_text = get_sub_field('highlighted_text');
$rest_heading = get_sub_field('rest_heading');
$medium_image = get_sub_field('medium_image');
$large_image = get_sub_field('large_image');
$small_image = get_sub_field('small_image');
$description = get_sub_field('description');
$marquee_text_items = get_sub_field('marquee_text_items');
$marquee_description = get_sub_field('marquee_description');

// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($highlighted_text || $rest_heading || $medium_image || $large_image || $small_image) && !$hide_block) :

?>
    <section id="about" class="lqd-section module-sec about--block ticker-text--block h-movement  py-5 bg-blue-100 overflow-hidden " data-section-luminosity="light">
        <div class="text-center d-flex gap-md-5 gap-4 flex-column">
            <h2><?= $heading; ?></h2>
            <!-- <h3 class="fw-bold text-white text-nowrap">
                <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?><span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?><span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?> <span class="text-darkblue"><?= $highlighted_text; ?></span> <?= $rest_heading; ?>
            </h3> -->
            <?php if (have_rows('marquee_text_items')): ?>

                <div class="content-row row_padding_bottom light-section" data-bgcolor="#ebebeb">

                    <div class="marquee-text-wrapper">

                        <div class="marquee-text big-title bw d-inline-block">
                            <?php while (have_rows('marquee_text_items')): the_row();
                                $marquee_text = get_sub_field('marquee_text');
                            ?><h3 class="d-inline-block">
                                    <span><?= $marquee_text; ?></span>
                                </h3>

                            <?php endwhile; ?>

                        </div>

                    </div>

                    <hr>

                    <div class="marquee-text-wrapper">
                        <div class="marquee-text big-title fw d-inline-block">
                            <?php while (have_rows('marquee_text_items')): the_row();
                                $marquee_text = get_sub_field('marquee_text');
                            ?>
                                <h3 class="d-inline-block">
                                    <span><?= $marquee_text; ?></span>
                                </h3>
                            <?php endwhile; ?>
                        </div>

                    </div>

                </div>
            <?php endif; ?>
        </div>



        <!-- <div class="content-row row_padding_bottom light-section" data-bgcolor="#ebebeb">

            <div class="marquee-text-wrapper">

                <div class="marquee-text big-title bw d-inline-block">
                    <h3 class="fw-bold marquee-text"><?= $marquee_description; ?></h3>

                </div>

            </div>


        </div> -->

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about--parallax-block-wrap mx-auto text-center d-flex flex-column align-items-center parallax-block-wrap pt-lg-9 pt-7">
                        <?php if ($medium_image || $large_image || $small_image) : ?>
                            <div class="about--image image position-relative">

                                <?php if ($medium_image) : ?>
                                    <img class="about--medium_image parallax-block lazy-image left-image position-absolute bottom-0" loading="lazy"
                                        data-src="<?= wp_get_attachment_image_url($medium_image, 'size-576*652') ?>" alt="<?= esc_attr(get_post_meta($medium_image, '_wp_attachment_image_alt', true)) ?: 'Block Image'; ?>">
                                <?php endif; ?>

                                <?php if ($large_image) : ?>
                                    <img class="about--large-image large-image lazy-image position-relative object-fit-cover" loading="lazy" data-src="<?= wp_get_attachment_image_url($large_image, 'size-876*1026') ?>" alt="<?= esc_attr(get_post_meta($large_image, '_wp_attachment_image_alt', true)) ?: 'Block Image'; ?>">
                                <?php endif; ?>

                                <?php if ($small_image) : ?>
                                    <img class="about--small_image parallax-block lazy-image  right-image" loading="lazy" data-src="<?= wp_get_attachment_image_url($small_image, 'size-560*520') ?>" alt="<?= esc_attr(get_post_meta($small_image, '_wp_attachment_image_alt', true)) ?: 'Block Image'; ?>">
                                <?php endif; ?>

                            </div>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <div class="about--description text-center pt-6 white-space">

                                <?php if ($description) : ?>
                                    <p class="fs-5 lh-base"><?= $description; ?></p>
                                <?php endif; ?>



                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </section>















<?php endif; ?>