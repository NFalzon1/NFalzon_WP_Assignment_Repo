<?php get_header() ?>

<div class="container">

  <div class="row">
    <?php

    $args = array('section_title' => 'Search Results');
    get_template_part("template-parts/loop", null, $args);

    ?>
</div>

<?php get_footer() ?>