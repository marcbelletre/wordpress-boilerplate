<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
    <section class="section">
        <div class="container">
            <h1 class="title">
                <?php the_title(); ?>
            </h1>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="content">
                <?php the_content(); ?>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
