<?php get_header(); ?>

    <?php $theme_options_code = 435; //$theme_options = get_fields($theme_options_code); ?>

    <?php get_template_part('template-parts/banners/banners'); ?>

    <?php
        $show_about_section = get_field('show_about_section', $theme_options_code);
        if($show_about_section == true){ 
        get_template_part('template-parts/homepage/about');
        }
    ?>

    <?php
        $show_video = get_field('show_video', $theme_options_code);
        if($show_video == true){ 
        get_template_part('template-parts/homepage/video');
        }
    ?>

    <?php
        $show_slimbanner_section = get_field('show_slimbanner_section', $theme_options_code);
        if($show_slimbanner_section == true){ 
        get_template_part('template-parts/homepage/slim-banner');
        }
    ?>

    <?php //get_template_part('template-parts/homepage/mvv'); ?>

    <?php //get_template_part('template-parts/homepage/specialties'); ?>

    <?php
        $show_services_section = get_field('show_services_section', $theme_options_code);
        if($show_services_section == true){ 
        get_template_part('template-parts/homepage/services');
        }
    ?>

    <?php
        $show_expertise_areas_section = get_field('show_expertise_areas_section', $theme_options_code);
        if($show_expertise_areas_section == true){ 
        get_template_part('template-parts/homepage/expertise-areas');
        }
    ?>

    <?php 
        $show_blog = get_field('show_blog');
        if($show_blog == true){ 
        get_template_part('template-parts/homepage/blog');
        }
    ?>

    <?php get_template_part('template-parts/homepage/contact'); ?>

<?php get_footer(); ?>