<?php
/**
 * The single template file
 * @package eCademy
 */
get_header();

$title = get_the_title();

// Blog sidebar
if( isset( $ecademy_opt['ecademy_blog_sidebar'] ) ) {
    if( $ecademy_opt['ecademy_blog_sidebar'] == 'ecademy_without_sidebar_center' ):
        $sidebar = 'col-lg-8 col-md-12 offset-lg-2';
    elseif( $ecademy_opt['ecademy_blog_sidebar'] == 'ecademy_without_sidebar' ):
        $sidebar = 'col-lg-12 col-md-12';
    else:
        if( is_active_sidebar( 'sidebar-1' ) ):
            $sidebar = 'col-lg-8 col-md-12';
        else:
            $sidebar = 'col-lg-8 col-md-12 offset-lg-2';
        endif;
    endif;
	$ecademy_sidebar_hide = $ecademy_opt['ecademy_blog_sidebar'];
	
} else {
    if( is_active_sidebar( 'sidebar-1' ) ):
        $sidebar = 'col-lg-8 col-md-12';
        $ecademy_sidebar_hide = 'ecademy_with_sidebar';
    else:
        $sidebar = 'col-lg-8 col-md-12 offset-lg-2';
        $ecademy_sidebar_hide = 'ecademy_without_sidebar';
	endif;
} 

// Blog Options
if( isset($ecademy_opt['blog_title']) ) {
    $hide_author_info       = $ecademy_opt['hide_author_info'];
} else {
    $hide_author_info       = true;
}

$ecademy_blog_layout = !empty($ecademy_opt['ecademy_blog_layout']) ? $ecademy_opt['ecademy_blog_layout'] : 'container';
if ( !empty($_GET['ecademy_blog_layout']) ) {
    $ecademy_blog_layout = $_GET['ecademy_blog_layout'];
}
?>
	<!-- Start Blog Area -->
	<div class="blog-details-area ptb-100">
        <div class="<?php echo esc_attr( $ecademy_blog_layout ); ?>">
			<div class="row">
				<?php
				while ( have_posts() ) : 
				the_post(); ?>
					<div class="<?php echo esc_attr( $sidebar ); ?>">
						<div class="blog-details">
						
							<?php if(has_post_thumbnail()) { ?>
								<div class="article-image">
									<img src="<?php the_post_thumbnail_url('full') ?>" alt="<?php the_title_attribute(); ?>">
								</div>
							<?php } ?> 

							<div class="blog-details-content">
								<div class="entry-meta">		
									<ul>
										<li>
											<i class="bx bx-comment"></i>
											<?php comments_number(); ?>
										</li>
										<li>
											<i class="bx bx-group"></i>
											<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) ?>"> <?php the_author() ?></a>
										</li>
										<li>
											<i class="bx bx-calendar"></i>
											<?php the_date(); ?>
										</li>
									</ul>
								</div>

								<?php the_content(); 
								
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecademy' ),
									'after'  => '</div>',
								) );
								?>
								
								<?php if( $hide_author_info != true ): ?>
									<div class="article-author">
										<div class="author-profile-header"></div>
										<div class="author-profile">
											<div class="author-profile-title">
												<?php 
													$user = get_the_author_meta('ID');
													$user_image = get_avatar_url($user, ['size' => '100']); 
												?>
												<img src="<?php echo esc_url( $user_image ); ?>" class="shadow-sm rounded-circle" alt="<?php echo esc_attr(get_the_author()); ?>">
											
												<div class="author-profile-title-details d-flex justify-content-between">
													<div class="author-profile-details">
														<h4><?php echo esc_html(get_the_author()); ?></h4>
														<span class="d-block"></span>
													</div>
												</div>
											</div>
											<p><?php echo esc_html(get_the_author_meta( 'description' )); ?></p>
										</div>
									</div>
								<?php endif; ?>
							</div>							
						</div>
					
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					</div>
				<?php endwhile; // End of the loop. ?>
				
				<?php if( $ecademy_sidebar_hide == 'ecademy_with_sidebar' ): ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<!-- End Blog Area -->

<?php
get_footer();