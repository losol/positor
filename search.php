<?php
/**
 * The template for displaying search results.
 *
 * @package Positor
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 * @since   1.0.0
 */

get_header(); ?>

    <section id="primary" class="content-area">
        <main id="main" class="site-main container" role="main">

    <?php
    if (have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title pt-5">
        <?php
        /* translators: %s: search query. */
        printf(esc_html__('Search Results for: %s', 'positor'), '<span>' . get_search_query() . '</span>');
        ?>
                </h1>
            </header>
        <?php
        /* Start the Loop */
        while ( have_posts() ) : the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part('components/post/content', 'standard');

        endwhile;

        the_posts_navigation();

        else :

            get_template_part('components/post/content', 'none');

        endif; ?>

        </main>
    </section>
<?php
get_footer();
