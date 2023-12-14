
    <div class="card" style="col">
        <div class="archiveCardHeader">
            <img class="card-img-top" src="<?php echo get_the_post_thumbnail(); ?>
        <div class=" card-body">
            <h5 class="card-title">
                <?php the_title(); ?>
            </h5>
            <p class="card-text">
                <?php the_excerpt(); ?>
            </p>
            <p class="card-text">
                <?php the_date(); ?>
            </p>
        </div>
    </div>
    <div class="card-body">
        <div class="btnfullwidth">
            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
        </div>
    </div>
</div>
