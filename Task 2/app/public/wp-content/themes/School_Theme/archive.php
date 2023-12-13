<?php get_header() ?>

<style>
  h1{
    display: none;
  }
</style>

<div class="container">

  <div class="row">

  <h2 id="archive-title">Posts written by <?php the_author_meta('first_name'); ?> <?php the_author_meta('last_name');?></h2>
  
    <?php

    $args = array('section_title' => 'Archive');
    get_template_part("template-parts/loop", null, $args);

    

    ?>
    <div class="col-4">
      <h4>Posts written by <?php the_author_meta('first_name'); ?></h4>

      <?php

    $args = array('section_title' => 'Archive');
    get_template_part("template-parts/archiveLoop", null, $args);

    get_sidebar('second');
    ?>
    </div>
  </div>
</div>

<?php get_footer() ?>