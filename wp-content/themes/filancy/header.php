<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package filancy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<header>
        <div class="container header_block">
            <div class="row">
                <div class="col-lg-2 col-6">
                    <?php the_custom_logo(); ?>
                </div>
                <div class="col-lg-8 col-6">
                    <nav class="position-relative">
                        <?php 
                        if ( has_nav_menu('head_menu')) {
                            wp_nav_menu( array(
                                'theme_location' => 'head_menu',
                                'container' => false,
                                'menu_class' => 'menu',
                            )); 
                        }
						
						?>
                        <div class="hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </nav>
                </div>

                <?php 
                $phone = str_replace(" ", "", get_field('phone_number', 2));
                $phone = str_replace("-", "", $phone);
                $phone = str_replace("(", "", $phone);
                $phone = str_replace(")", "", $phone);

                ?>

                <div class="col-lg-2 col-md-12">
                    <div class="contacts">
                        <a href="tel:<?php echo $phone; ?>" class="contacts__tel"><?php the_field('phone_number', 2); ?></a>
                        <a href="#" class="contacts__btn">Заказать звонок</a>
                    </div>
                </div>
            </div>
        </div>
    </header>