<?php
	get_header();

	$current_post_id = get_the_ID();
	$parent_post_id = wp_get_post_parent_id( $current_post_id );
	$is_parent = get_pages(array(
		'child_of' => $current_post_id
	));

	?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="page-banner">
	<div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg')?>);"></div>
		<div class="page-banner__content container container--narrow">
			<h1 class="page-banner__title"><?php the_title();?></h1>
			<div class="page-banner__intro">
				<p>replace later</p>
			</div>
		</div>
	</div>  
</div>

  <div class="container container--narrow page-section">

	<?php
	if ( $parent_post_id ) : ?>

		<div class="metabox metabox--position-up metabox--with-home-link">
			<p>
				<a class="metabox__blog-home-link" href="<?php echo get_permalink($parent_post_id)?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parent_post_id);?></a> <span class="metabox__main"><?php the_title();?></span>
			</p>
		</div>

	<?php endif; ?>

	<?php if ($parent_post_id || $is_parent) : ?>
	
		<div class="page-links">
			<h2 class="page-links__title">
				<a href="<?php echo get_permalink($parent_post_id)?>">
					<?php echo get_the_title($parent_post_id);?>
				</a>
			</h2>
			<ul class="min-list">

				<?php

				($parent_post_id) ? $parents_children_id = $parent_post_id :  $parents_children_id = $current_post_id;

				wp_list_pages( array(
					'title_li' => NULL,
					'child_of' => $parents_children_id,
					'sort_column' => 'menu_order'
				) ); ?>

			</ul>
		</div>

	<?php endif; ?>

	<div class="generic-content">
	  <?php the_content(); ?>
	</div>

  </div>

	<?php endwhile; endif; // have_posts loop?>

<?php
	get_footer(); ?>