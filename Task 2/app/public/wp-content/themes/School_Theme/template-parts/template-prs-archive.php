<?php
/*
Template Name: Press Releases Template
*/
$noColumns = get_theme_mod('custom_gen_col_count', '3');

$button_bg = get_theme_mod("custom_button_bg", "#ffffff");
$button_text = get_theme_mod("custom_button_text", "#ffffff");


$card_bg = get_theme_mod("custom_card_bg", "#ffffff");
$card_text = get_theme_mod("custom_card_text", "#ffffff");


get_header(); // Include header template
?>
<div class="pageTitle">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'prs', // Replace with your actual custom post type slug
                            'posts_per_page' => -1, // Display all posts
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            $count = 0;
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>
                                <div class="col colCard" style="padding-bottom: 10%; " >
                                    <div class="card" style="col; background-color:<?php echo $card_bg ?>" >
                                        <img class="card-img-top" src=<?php echo get_the_post_thumbnail(); ?> <div
                                            class=" card-body">
                                        <h5 class="card-title" style= "color:<?php echo $card_text ?>">
                                            <?php the_title(); ?>
                                        </h5>
                                    </div>

                                    <div class="card-body" style= "color:<?php echo $card_text ?>">
                                        <p class="card-text" >
                                            <?php the_excerpt(); ?>
                                        </p>
                                        <ul class="list-group list-group-flush">
                                            <p>Uploaded on:
                                                <?php echo get_the_date(); ?>
                                            </p>
                                        </ul>
                                        <div class="cardButton">
                                            <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="background-color: <?php echo $button_bg?>; color: <?php echo $button_text ?>">Read More...</a>
                                        </div>
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
    <div class="col-3">
        <?php get_sidebar() ?>

    </div>
</div>

<?php
the_posts_pagination(array(
    'mid_size' => 1,
    'prev_text' => "Newer",
    'next_text' => "Older"
)); //shows the pagination | mid_size controls how many other paginations are shown on both sides
?>
?>

<?php
get_footer(); // Include footer template
?>