<?php get_header(); ?>
    <main>
        <?php if (have_posts()) : while  (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; else: ?>
            <p> <?php esc_html_e('No posts found.'); ?></p>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>