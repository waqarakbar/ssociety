<?php
    /*
     * Template Name: News Template
     */
?>
<?php get_header(); ?>

<?php get_template_part( 'page-templates/news-archive', get_post_format() ); ?>

<?php get_footer(); ?>
