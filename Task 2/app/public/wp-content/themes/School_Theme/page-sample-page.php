<?php get_header(); ?>

<h1>Sample Page Header</h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <?php
            $args = array('section_title' => '');
            get_template_part("template-parts/loop", null, $args);
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>