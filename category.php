<?php
/**
* category.php
* @package WordPress
* @subpackage asa
* @since asa 1.0
* Text Domain: asa
*/
?>
<?php get_header();?>
		<!-- Todo la parte central -->
		<div class="content con_barra">
			<main>

				<!-- El listado de los posts -->
				<section class="entradas">
					<header class="page__article__header">
						<h1 class="page__article__header__title">
							<?php //_e('Categoría de Noticia: ', 'asa');
							echo  single_cat_title( '', false );?>
						</h1>
					</header>

					<?php if ( have_posts() ) : while ( have_posts() ) : the_post();?>

					<article class="entradas__article">
						<figure class="entradas__article__figure">
							<a href="<?php the_permalink();?>">
								<?php if( has_post_thumbnail() )
								{
									the_post_thumbnail( 'thumbnail' );
								}
								else
								{
									echo '<img src="' . get_stylesheet_directory_uri() . '/img/client.jpg" alt="imagen" />';
								}?>
							</a>
						</figure>
						<div class="entradas__article__right">
							<header class="entradas__article__header">
								<h2 class="entradas__article__header__title">
									<a href="<?php the_permalink();?>"><?php echo titulo_corto('...', 60);?></a>
								</h2>
							</header>
							<div class="entradas__article__content">

								<!-- Las Categorías -->
								<!-- <div class="categorizacion">
									<div class="categorizacion__icono">
										<span class="icon-folder-open icon-left icon-right"></span>
									</div>
									<div class="categorizacion__list">
										<ul class="categorizacion__list__items">
										</ul>
										<?php // the_category();?>
									</div>
								</div> -->

								<!-- Las Etiquetas -->
								<!-- <div class="categorizacion">
									<div class="categorizacion__icono">
										<span class="icon-price-tag icon-left icon-right"></span>
									</div>
									<div class="categorizacion__list">
										<?php //the_tags( '<ul class="categorizacion__list__items"><li>', '</li> <li>', '</li></ul>' );?>
									</div>
								</div> -->

								<!-- La fecha de publicación -->
								<div class="categorizacion">
									<div class="categorizacion__icono">
										<span class="icon-calendar icon-left icon-right"></span>
									</div>
									<div class="categorizacion__list">
										<span><?php echo get_the_date();?></span>
										<?php if ( get_comments_number( $post->ID ) != 0 )
										{
											echo '; <span class="icon-bubbles3 icon-left"></span><a class="importancia" title="' . get_comments_number( $post->ID ) . __(' comentarios', 'asa') . '" href="' . get_comments_link( $post->ID ) . '">' . get_comments_number( $post->ID ) . '</a>';
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</article>

					<?php endwhile; ?>

					<?php

					// La paginación
					if ( function_exists( "pagination" ) )
					{
						if ( pagination() != null )
						{
							pagination();
						}
					};?>

				<?php else : ?>

					<article class="entradas__article">
						<h2>
							<?php _e('No hay nada publicado en esta categoría.', 'asa');?>
						</h2>
					</article>

				<?php endif;?>

				</section>
			</main>
		</div>

<?php get_sidebar();?>

		<div class="separador"></div>
<?php get_footer();?>
