<h1><?php echo $args['section_title']; ?></h1>



<div class="col-8">
      <?php if (have_posts()):
        while (have_posts()):
        the_post();
          
          if(is_page()):
            get_template_part('template-parts/content-page',null, null);
          else:
            get_template_part('template-parts/content',null, null);
          
          endif;
       

        endwhile;
              the_posts_pagination(array(
                'mid_size' => 1,
                'prev_text' => "Newer",
                'next_text' => "Older"
              )); //shows the pagination | mid_size controls how many other paginations are shown on both sides
        ?>

      <? else:
      echo "<p>Sorry, no posts found.</p>";
      endif;
       ?>
    </div>
   