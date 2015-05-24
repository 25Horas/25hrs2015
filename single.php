<?php get_header(); ?>

	<section class="single">
		
		<div class="entry-wrapper">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
				<?php if ( has_post_thumbnail() ) { 
					echo '<figure class="post-img">';
						the_post_thumbnail( 'main-image' );
					echo '</figure>';
					}

					else{
						echo '<figure class="empty-img">';
						echo '</figure>';
					}
				  ?>

			<div class="entry">
				<div class="cat"><?php the_category(' '); ?></div>
	    		<h1><?php the_title(); ?></h1>
				<div class="general-calendar meta">Publicado el <?php the_time(' d / m / Y') ?></div>

	    		<?php the_content( ); ?>

				<div class="wrapper">
		    		<div class="social-share">
						<button>Compartir</button>

						<div class="social">

							<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show-faces=false&amp;width=120&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:120px; height:20px"></iframe>
							<a href="https://twitter.com/share" class="twitter-share-button" data-via="25_horas" data-lang="es">Twittear</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

						<?php echo do_shortcode('[pinit]'); ?>
						</div>
							
					</div>
				</div>
				
				<hr>
				
				<h5 class="credit">Escrito por</h5>

				<div class="post-author">
					<div class="inline avatar">
						<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
					</div>
					<div class="inline author">
		    			<h3><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></h3>
		    			<p><?php the_author_meta( 'description' ); ?></p>

		    			<a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a>
		    			<a href="http://twitter.com/<?php echo $curauth->aim; ?>"><?php echo $curauth->user_url; ?></a>
	    			</div>
	    			
				</div>

				<div class="clearfix"></div>

				<hr>

				<h5 class="credit">Te puede interesar</h5>
				
				<div class="related">
				<?php if (function_exists('related_posts')){ ?>
					<?php related_posts();?>
				<?php }?> 
				</div>
				<hr>

				<div id="comments">
					<?php comments_template(); ?>
				</div>

			</div>
			<?php endwhile; ?>

		<?php endif; ?>			
		
		</div>

	</section>

	<?php get_footer(); ?>