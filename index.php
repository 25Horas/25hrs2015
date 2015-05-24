<!doctype html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1" />
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>		
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_enqueue_script("jquery"); ?>

	<?php wp_head(); ?>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<body>

	<header class="o-header">
		<div class="o-header__logo">
			
		</div>
		<nav class="o-header__menu">
			<ul>
				<li><a href=""></a></li>
				<li><a href=""></a></li>
				<li><a href=""></a></li>
			</ul>
		</nav>
	</header>

	<div class="o-container c-home">

		<?php
			$args = array(
				'posts_per_page' => 1,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1
			);
			query_posts( $args );

			wp_reset_query();
		?>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="o-post is-featured <?php post_class(); ?>">

			<?php if ( has_post_thumbnail() ) { 
				echo '<figure class="o-post__cover"><a href="'. get_permalink() .'">';
				the_post_thumbnail( 'main-image' );
				echo '</a></figure>';
			}

				else{
					echo '<figure class="empty-img">';
					echo '</figure>';
				}
			?>

			<article>
				<div class="cat hide-div"><?php the_category(' '); ?></div>
	    		<div class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
				<div class="foundicon-torso hide-div meta">Escrito por <?php the_author_posts_link(); ?></div>
				<div class="foundicon-chat hide-div meta"><?php comments_popup_link('0 Comentarios', '1 Comentario', '% Comentarios'); ?></div>

	    		<?php the_excerpt( ); ?>
				
				<div class="clearfix"></div>
	    		
	    		<div class="readmore">
	    			<a href="<?php the_permalink(); ?>">Sigue leyendo</a>
	    		</div>

			</article>
 
		</section>

		<?php endwhile; ?>

		<!--section class="c-home-archive">
			<ul>
				<li class="o-post is-default">
					
				</li>
				<li class="o-post is-default">
					
				</li>
				<li class="o-post is-default">
					
				</li>
				<li class="o-post is-default">
					
				</li>
				<li class="o-post is-default">
					
				</li>
			</ul>
		</section-->

		<div class="navigation">
		  <div class="left"><?php previous_posts_link('&laquo; Anterior') ?></div>
		  <div class="right"><?php next_posts_link('Siguiente &raquo;') ?></div>

		  <div class="clearfix"></div>
		</div>
		
		<?php else : ?>

		<h2>No se encontraron resultados. ¿Deseas buscar de nuevo?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
		<?php endif; ?>	

	</div>

	<footer></footer>

	<?php wp_footer(); ?>
</body>
</html>