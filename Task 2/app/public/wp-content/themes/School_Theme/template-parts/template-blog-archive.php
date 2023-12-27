<?php
/*
Template Name: Blog Template
*/

$sidebar_option = get_theme_mod("custom_gen_sidebar");

$sidebar_css_option = "";
$col_class = "";

if ($sidebar_option == "1"){
    $sidebar_css_option = "display:block";
    $col_class = "col-8 ";
}else{
    $sidebar_css_option = "display:none";
    $col_class = "col";
}


$button_bg = get_theme_mod("custom_button_bg", "#ffffff");
$button_text = get_theme_mod("custom_button_text", "#ffffff");


$card_bg = get_theme_mod("custom_card_bg", "#ffffff");
$card_text = get_theme_mod("custom_card_text", "#ffffff");


$noColumns = get_theme_mod('custom_gen_col_count', '3');


get_header(); // Include header template

?>
<div class="pageTitle">
    <h1>
        <?php the_title(); ?>
    </h1>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="<?php echo $col_class ?> ">

            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <div class="row">
                        <?php
                        $args = array(
                            'post_type' => 'post', // Replace with your actual custom post type slug
                            'posts_per_page' => 3, // Display all posts
                            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
                        );

                        $query = new WP_Query($args);

                        if ($query->have_posts()):
                            $count = 0;
                            while ($query->have_posts()):
                                $query->the_post();
                                ?>
                                <div class="col cardCol" style="padding-bottom: 10%;">
                                    <div class="card" style="col; background-color:<?php echo $card_bg ?>">
                                        <img class="card-img-top cardImage" src=<?php echo get_the_post_thumbnail(); ?> <div
                                            class=" card-body">
                                        <h5 class="card-title" style= "color:<?php echo $card_text ?>">
                                            <?php the_title(); ?>
                                        </h5>
                                    </div>

                                    <div class="card-body" style= "color:<?php echo $card_text ?>">
                                        <?php the_excerpt(); ?>
                                        <ul class="list-group list-group-flush">
                                            <p>Uploaded on:
                                                <?php echo get_the_date(); ?>
                                            </p>
                                        </ul>
                                        <div class="cardButton">
                                            <a href="<?php the_permalink(); ?>" class="btn" style="background-color: <?php echo $button_bg?>; color: <?php echo $button_text ?>">Read More</a>
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

                            ?>

                            <div class="container">
                                <div class="row">
                                    <?php 
 the_posts_pagination(array(
    'mid_size' => 1,
    'prev_text' => "Newer",
    'next_text' => "Older"
  )); //shows the pagination | mid_size controls how many other paginations are shown on both sides

// Restore original post data
wp_reset_postdata();

                                    ?>
                                </div>
                            </div>
                            <?php

                           
                           

                        else:
                            // No posts found
                            echo 'No posts found';

                        endif;

                        
                        ?>
            </div>

            

            </main>
        </div>
    </div>

    <div class="col" style="<?php echo $sidebar_css_option; ?>">
        <?php get_sidebar() ?>
    </div>
</div>

<?php
get_footer(); // Include footer template
?>