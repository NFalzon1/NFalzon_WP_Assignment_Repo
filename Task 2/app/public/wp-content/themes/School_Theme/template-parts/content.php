
<div class="card" style="col">
  <div class="card-body">
    <h5 class="card-title"><?php the_title(); ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?php the_date(); ?></h6>
    <p class="card-text"><?php the_excerpt(); ?></p>
    <a href="<?php the_permalink(); ?>" class="card-link">Read More</a>
  </div>
</div>
