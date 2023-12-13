<?php

$noColumns = get_theme_mod('custom_gen_col_count', '3');
/*
Template Name: All Courses Template
*/
get_header(); // Include header template

$course_categories = get_terms(
    array(
        'taxonomy' => 'course_categories', // Adjust the taxonomy if needed
        'hide_empty' => false,
    )
);


?>
<div class="course-category-boxes">
    <?
    foreach ($course_categories as $category) {
        echo '<div class="course-category-box" data-category="' . esc_attr($category->slug) . '">';
        echo '<a href="?id='.esc_html($category->name).'">' . esc_html($category->name) . '</a>';
        echo '</div>';
    } ?>
</div>



<div class="container-fluid">
    <div class="row">
        <div class="col">

            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'courses', // Replace with your actual custom post type slug
                            'posts_per_page' => -1, // Display all posts
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            $count = 0;
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>
                                <div class="col">
                                    <div class="card" style="col">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?php the_title(); ?>
                                            </h5>
                                        </div>
                                        <!--<ul class="list-group list-group-flush">
                                            <li class="list-group-item"></li>
                                        </ul>-->
                                        <div class="card-body">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                // Increment count
                                $count++;

                                // If it's the second card in the row, close the row div and start a new row
                                if ($count % $noColumns === 0) {
                                    echo '</div><div class="row">';
                                }
                            endwhile;

                            // Restore original post data
                            wp_reset_postdata();

                        else:
                            // No posts found
                            echo 'No posts found';

                        endif;
                        ?>
                    </div>
                </main>
            </div>
        </div>

    </div>

    <?php
    get_footer(); // Include footer template
    ?>

