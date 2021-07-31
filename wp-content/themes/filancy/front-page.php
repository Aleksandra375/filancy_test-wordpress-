<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo(); ?></title>
    <?php wp_head() ?>
</head>
<body>

    <?php get_header() ?>

    <section class="banner mask mask--dark d-flex align-items-center" 
    <?php if(get_field('banner_img')) {
        echo 'style="background-image: url('. get_field('banner_img') .')"';
    }  ?>>
        <div class="container mask-child">
            <div class="row">
                <div class="col-lg-8 col-md-12 d-flex align-items-center">
                <div class="banner__text">
                    <h1><?php the_field('banner_title'); ?></h1>
                    <?php 
                        $phone = str_replace(" ", "", get_field('phone_number', 2));
                        $phone = str_replace("-", "", $phone);
                        $phone = str_replace("(", "", $phone);
                        $phone = str_replace(")", "", $phone);

                    ?>
                    <p><?php the_field('banner_descr'); ?><a href="tel:<?php echo $phone; ?>"><?php the_field('phone_number', 2); ?></a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="banner__form">
                    <p class="banner__form_title"><?php the_field('form_title'); ?></p>
                    <?php echo do_shortcode('[contact-form-7 id="18" title="Бронь"]'); ?>
                </div>
            </div>
            </div>
        </div>
    </section>


    <section class="booking">
        <h3 class="section_title"><?php the_field('booking_title'); ?></h3>
        <div class="container">
            <div class="booking__block">
                <div class="booking__wrap">
                    <div class="booking__wrap_row">
                        <span>100%</span> 
                    </div>
                    <div class="booking__wrap_descr">Гарантия заселения</div>
                </div>
                <div class="booking__wrap">
                    <div class="booking__wrap_row">
                        <span>24/7</span>
                    </div>
                    <div class="booking__wrap_descr">Круглосуточная подержка</div>
                </div>
                <div class="booking__wrap">
                    <div class="booking__wrap_row">
                        <span>до 40%</span>
                    </div>
                    <div class="booking__wrap_descr">Дисконтная карта</div>
                </div>
                <div class="booking__wrap">
                    <div class="booking__wrap_row">
                        <span>0%</span>
                    </div>
                    <div class="booking__wrap_descr">Бронь без комиссий</div>
                </div>
                <div class="booking__wrap">
                    <div class="booking__wrap_row">
                        <span>10+</span>
                    </div>
                    <div class="booking__wrap_descr">Более 10 способов оплаты</div>
                </div>
            </div>
            <?php if(get_field('booking_descr')) :?>
            <p class="booking__descr">
                <?php the_field('booking_descr'); ?>
            </p>
            <?php endif;?>
            <div class="booking__galery">
                <img src="<?php the_field('booking_room'); ?>" alt="rooms" class="booking__galery_img">
                <img src="<?php the_field('booking_terr'); ?>" alt="terr" class="booking__galery_img">
                <img src="<?php the_field('booking_build'); ?>" alt="building" class="booking__galery_img">
            </div>
            <div class="booking__btn">смотреть все фото</div>
        </div>
    </section>
    
    
    <?php 
    $query = new WP_Query(array(
        'post_type' => 'rooms',
        'order' => 'ASC',
        'orderby' => 'date'
    ));
    if($query->have_posts()) : ?>
    <section class="popular">
        <h3 class="section_title"><?php the_field('popular_rooms'); ?></h3>
        <div class="container cards">
            <div class="row justify-content-center">
            <?php while($query->have_posts()) : $query->the_post(); ?>
                <div class="col-lg-3 col-md-6 col-sm-12 card-group">
                    <div class="card">
                        <img src="<?php the_field('room_img'); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="card-body-title">
                                <h5 class="card-title"><?php the_field('room_type'); ?> <span class="custom-card__body_header_info">Площадь <?php the_field('room_size'); ?> м2</span></h5>
                                <p class="card-text">Количество человек: <?php the_field('room_people'); ?></p>
                            </div>
                          <hr>
                            <div class="custom-card__body_body">
                                <ul>
                                        <?php 
                                        $field = get_field('service'); 
                                        sort($field);
                                        foreach($field as $value_field) { ?>
                                            <li><?php echo $value_field ?></li>
                                        <?php }
                                        ?>
                                </ul>
                            </div> 
                        </div>
                            <div class="custom-card__body_footer_price">от <?php the_field('price'); ?> грн</div>
                            <a href="<?php the_permalink() ?>" class="btn btn-primary">Бронировать</a>
                    </div>
                </div>
            <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php 
    endif;
    wp_reset_postdata();
    ?>
    <?php get_footer() ?>
    <?php wp_footer() ?>
</body>
</html>