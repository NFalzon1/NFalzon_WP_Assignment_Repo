<h4><?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name');?></h4>

<p>
    <?php the_author_meta('description'); ?>
</p>

<div id="arc_email">
<p><?php the_author_meta('email') ?></p>
</div>

<p> <?php the_author_meta('first_name'); ?> has written a total of <?php the_author_posts(); ?> posts.
</p>