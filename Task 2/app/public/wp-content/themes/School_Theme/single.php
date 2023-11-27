<?php get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <main>
                <?php if (have_posts()):
                    while (have_posts()):
                        the_post(); ?>

                        <article>
                            <?php post_class("mt-4 p-4 border"); ?>
                            <h2>
                                <?php the_title(); ?>
                            </h2>

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

                            <div class="bg-light">
                                <div><?php echo get_avatar($author_id,200); ?></div>
                            </div>

                            <?php
                            if($author_url){
                                echo "<p><a href='{$author_url}'>{$author_display}</a></p>";
                            }else{
                                echo "<p>{$author_display}</p>";
                            };

                            if($author_desc){
                                echo "<p>{$author_desc}</p>";
                            }

                            if($author_posts > 1){
                                $posts_word = "Posts";
                            }else{
                                $posts_word = "Post";
                            }
                            echo "<p><a href='{$author_posts_url}'>{$author_posts} {$posts_word}</a> written by {$author_display}</p>";
                            
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
    </div>
</div>

<?php get_footer(); ?>