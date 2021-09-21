<?php
/**
* comments.php
* @package WordPress
* @subpackage asa
* @since asa 1.0
* Text Domain: asa
* Text Domain: asa
*/
?>

<?php
	if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
		die (__('Por favor, no cargues esta página directamente. Gracias :-D', 'asa'));

	if ( post_password_required() )
	{
		_e('Esta publicación está protegida con contraseña. Iniciá sesión para ver los comentarios.', 'asa');
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<div class="page__article">
		<header class="page__article__header comentarios__article__header">
			<h2 class="page__article__header__title" id="comments">
				<?php comments_number( __('No hay respuestas', 'asa'), __('Una Respuesta', 'asa'), __('% Respuestas', 'asa') );?>
			</h2>
		</header>
	</div>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link();?></div>
		<div class="prev-posts"><?php next_comments_link();?></div>
	</div>

	<ul class="commentlist">
		<?php
			wp_list_comments();
			$args = array(
				'walker'            => null,
				'max_depth'         => '',
				'style'             => 'ul',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => __('Responder', 'asa'),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 64,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',	// or 'xhtml' if no 'HTML5' theme support
				'short_ping'        => false,	// @since 3.6
				'echo'              => true		// boolean, default is true
			);
		?>
	</ul>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link();?></div>
		<div class="prev-posts"><?php next_comments_link();?></div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // comments are closed ?>

		<h3><?php _e('Los comentarios están cerrados.', 'asa');?></h3>

	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond" class="page__article__content">
	<header class="page__article__header comentarios__article__header">
		<h2 class="page__article__header__title">
			<?php comment_form_title( __('Dejar un Comentario', 'asa'), __('Dejar un Comentario a %s', 'asa') ); ?>
		</h2>
	</header>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>
			<a class="boton" href="<?php echo wp_login_url( get_permalink() ); ?>">
				<?php _e('Iniciar sesión', 'asa');?>
			</a>
			<?php _e('para publicar un comentario', 'asa');?>.
		</p>
	<?php else : ?>


	<form class="formulario" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

		<?php if ( is_user_logged_in() ) : ?>

			<div class="page__article__header comentarios__article__header">
				<span class="page__article__header__title"><?php _e('Hola', 'asa');?></span>
				
				<a class="boton" href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
					<?php echo $user_identity; ?>
					<span class="icon-user icon-left"></span>
				</a>
				<a class="boton" href="<?php echo wp_logout_url( get_permalink() ); ?>" title="<?php __('Cerrar sesión', 'asa') ?>">
					<?php _e('Salir', 'asa');?>
					<span class="icon-exit icon-left"></span>
				</a>
			</div>

		<?php else : ?>

			<div class="page__article__form_comentarios">
				<input required="required" placeholder="<?php _e('Apellido y Nombre', 'asa');?>" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" maxlength="50" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

				<input required="required" placeholder="<?php _e('E-Mail. No será publicado', 'asa');?>" type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" maxlength="50" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
			</div>

			<!-- <div>
				<input type="text" name="url" id="url" value="<?php // echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
				<label for="url">Pagina Web</label>
			</div> -->

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php // echo allowed_tags(); ?></code></p>-->

		<div class="page__article__form_comentarios">
			<textarea required="required" placeholder="<?php _e('Comentario', 'asa');?>" name="comment" id="comment" cols="38" rows="10" tabindex="4" maxlength="999"></textarea>
		</div>

		<div>
			<button class="boton" name="submit" type="submit" id="submit">
				<?php _e('Enviar', 'asa');?>
				<span class="icon-checkmark icon-left"></span>
			</button>
			<button class="boton" name="reset" type="reset" id="reset">
				<?php _e('Limpiar', 'asa');?>
				<span class="icon-cross icon-left"></span>
			</button>
			<?php comment_id_fields(); ?>
		</div>

		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>

</div>

<?php endif; ?>