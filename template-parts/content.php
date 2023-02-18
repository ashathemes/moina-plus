<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moina Plus
 */
if ( ! is_singular( ) ) : ?>
<div class="col-lg-6">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="single-team-box">
			<?php if ( has_post_thumbnail () ): ?>
			<div class="author-img">
				<?php moina_post_thumbnail(); ?>
				<div class="author-img-hover">
					<div class="author-img-hover-inner">
						<div class="author-img-hover-content">
							<div class="socials-links">
								<?php 
								echo'<a href="'.esc_url ( get_the_permalink( $post->ID ) ).'">'.'<i class="fa fa-eye"></i>'.'</a>'; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
			<div class="section-footer">
				<div class="title">
					<?php
						the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
					?>
				</div>
				<footer class="entry-footer">
					<?php moina_entry_footer(); ?>
				</footer><!-- .entry-footer -->
			</div>
		</div>
	</article>	
</div>
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php moina_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">

					<?php 
						moina_posted_by();
						moina_posted_on(); 
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'moina-plus' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'moina-plus' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php moina_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>