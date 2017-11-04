<?php
    if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <h2>
        <?php the_title(); ?>
    </h2>

    <p>
        <?php wpautop(the_content()); ?>
    </p>
    
    <?php endwhile; endif; // have_posts loop?>