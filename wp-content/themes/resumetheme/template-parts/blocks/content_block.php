<?php

$description = get_sub_field('description');



// Hiding and cosmetics/
include(locate_template('template-parts/blocks/hide_cosmetics.php', false, false));

if (($description) && !$hide_block) :
?>
    <section id="quotes" class=" lqd-section module-sec quotes--block bg-aqua min-h-100vh py-5 d-flex align-items-center justify-content-center" data-section-luminosity="light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="quotes--wrapper">
                        <?php if ($description) : ?>
                            <p class=""><?= $description; ?></p>
                        <?php endif; ?>
                        <!-- <p>I strive to maintain a seamless experience for my clients, delivering results that satisfy their business needs and drive increased traffic.</p> -->
                        <img class="intro_mission-bg" src="<?php bloginfo('template_directory'); ?>/assets/images/quotes-bg.jpg" alt="">
                        <!-- <video class="intro_mission-bg" autoplay muted loop id="myVideo">
                            <source src="<?php bloginfo('template_directory'); ?>/assets/Infinity big (white on white).mp4" type="video/mp4">
                        </video> -->
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php endif; ?>