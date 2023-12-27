<?php

$button_bg = get_theme_mod("custom_button_bg", "#ffffff");
$button_text = get_theme_mod("custom_button_text", "#ffffff");
$button_hover = get_theme_mod("custom_button_hover", "#ffffff");
$btnText_hover = get_theme_mod("custom_buttonText_hover", "#ffffff");

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

<div class="pageTitle">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>

<div class="course-category-boxes">
    <?
    foreach ($course_categories as $category) {
        echo '<div class="course-category-box" data-category="' . esc_attr($category->slug) . '">';
        echo '<a href="?courseID=' . esc_html($category->name) . '">' . esc_html($category->name) . '</a>';
        echo '</div>';
    } ?>
</div>

<?php


$courseID = isset($_GET['courseID']) ? sanitize_text_field($_GET['courseID']) : '';



//echo $courseID; ?>




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

                        if ($courseID) {
                            $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'course_categories',
                                    'field' => 'name',
                                    'terms' => $courseID,
                                ),
                            );
                        }

                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            $count = 0;
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>
                                <div class="col courseCard">
                                    <div class="card" style="col; background-color:<?php echo $button_bg ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="card-body coursesText"
                                                onMouseOver="this.style.color='<?php echo $btnText_hover ?>'"
                                                onMouseOut="this.style.color='<?php echo $button_text ?>'"
                                                style="color: <?php echo $button_text; ?>">
                                                <h5 class="card-title">
                                                    <?php the_title(); ?>
                                                </h5>
                                            </div>
                                        </a>
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
                            echo '<p class="noPosts">No courses are found under the ' . $courseID . ' category.</p>';

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

    <style>
        .card :hover {
            background-color:
                <?php echo $button_hover ?>
            ;
        }
    </style>