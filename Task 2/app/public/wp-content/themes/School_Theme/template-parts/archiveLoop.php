<h2>
    <?php the_author(); ?>
</h2>

<p>
    <?php the_author_meta('description'); ?>
</p>

<p>
    <?php the_author_meta('first_name'); ?>
    <?php the_author_meta('last_name'); ?> (<?php the_author_meta('nickname'); ?>)
</p>


<p>

</p>
<p>
    <?php the_author_posts(); ?> post created by
    <?php the_author(); ?>
</p>