<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<div id="primary">
    <div id="content" role="main">
        <?php
        $mypost = array( 'post_type' => 'Phone', );
        $loop = new WP_Query( $mypost );
        ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post();?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <!-- Display featured image in right-aligned floating div -->
                    <div style="float: right; margin: 10px">
                        <?php the_post_thumbnail( array( 100, 100 ) ); ?>
                    </div>
                    <!-- Display Title and Author Name -->
                    <strong>Title: </strong><?php the_title(); ?><br />
                    <strong>Director: </strong>
                    <?php echo esc_html( get_post_meta( get_the_ID(), 'movie_director', true ) ); ?>
                    <br />
                    <!-- Display yellow stars based on rating -->
                    <strong>Rating: </strong>
                    <?php
                    $nb_stars = intval( get_post_meta( get_the_ID(), 'movie_rating', true ) );
                    for ( $star_counter = 1; $star_counter <= 5; $star_counter++ ) {
                        if ( $star_counter <= $nb_stars ) {
                            echo '<img src="' . plugins_url( 'Movie-Reviews/images/icon.png' ) . '" />';
                        } else {
                            echo '<img src="' . plugins_url( 'Movie-Reviews/images/grey.png' ). '" />';
                        }
                    }
                    ?>
                </header>
                <!-- Display movie review contents -->
                <div class="entry-content"><?php the_content(); ?></div>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<?php get_footer(); ?>
