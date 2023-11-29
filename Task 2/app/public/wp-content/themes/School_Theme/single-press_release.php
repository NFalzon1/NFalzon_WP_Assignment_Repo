<?php get_header(); ?>

<div class="background-image">
    <?php echo get_the_post_thumbnail(); ?>

</div>
<div class="pr_title">
    <h2>
        <?php the_title(); ?>
    </h2>
</div>


<div class="container">
    <div class="row">
        <div class="col-8">
            <main>
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>

                        <article>


                            <div>
                                <?php the_content(); ?>
                            </div>

                            <?php
                            $author_id = get_the_author_meta("ID");
                            $author_posts = get_the_author_posts();
                            $author_display = get_the_author();
                            $author_posts_url = get_author_posts_url($author_id);
                            $author_desc = get_the_author_meta("user_description");
                            $author_url = get_the_author_meta("user_url");
                            ?>


                        </article>



                        <?php
                    endwhile;
                endif;
                ?>

            </main>
        </div>
        <div class="col-4">
            <?php get_sidebar() ?>

        </div>
        <div class="bg-light author_desc_post">
            <div>
                <div class="author_desc_post_img">
                    <?php echo get_avatar($author_id, 200); ?>
                </div>
                <div class="author_desc_post_content">
                    <?php
                    if ($author_url) {
                        echo "<p><a href='{$author_url}'>{$author_display}</a></p>";
                    } else {
                        echo "<p>{$author_display}</p>";
                    }
                    ;

                    if ($author_desc) {
                        echo "<p>{$author_desc}</p>";
                    }

                    if ($author_posts > 1) {
                        $posts_word = "Posts";
                    } else {
                        $posts_word = "Post";
                    }
                    echo "<p><a href='{$author_posts_url}'>{$author_posts} {$posts_word}</a> written by {$author_display}</p>";

                    ?>
                </div>
            </div>
        </div>

        <?php

        ?>
    </div>
</div>

<?php get_footer(); ?>