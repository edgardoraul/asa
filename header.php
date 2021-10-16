<?php
/**
* header.php
* @package WordPress
* @subpackage asa
* @since asa 1.0
* Text Domain: asa
*/

// Variables útiles
$meta_description 				= of_get_option('meta_description', '');
$meta_keywords 					= of_get_option('meta_keywords2', '');
$facebook_contact 				= of_get_option('facebook_contact', '');
$twitter_contact  				= of_get_option('twitter_contact', '');
$logo_uploader 					= of_get_option('logo_uploader', '');

$webmoderna_meta_keywords 		= rwmb_meta('webmoderna_meta_keywords', '');
$webmoderna_meta_descripcion 	= rwmb_meta('webmoderna_meta_descripcion', '');
$meta_paginas_meta_descripcion 	= rwmb_meta('meta_paginas_meta_descripcion', '');
$meta_paginas_meta_keywords 	= rwmb_meta('meta_paginas_meta_keywords', '');

?>

<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.5, user-scalable=yes" />

<!-- Condidionales del título, descripción y las metakeywords -->
<?php if ( is_home() || is_search() ) { ?>

	<title><?php bloginfo('name');?> - <?php bloginfo('description') ?></title>
	<meta property="og:title" content="<?php bloginfo('name');?> - <?php bloginfo('description') ?>" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri() . '/img/asa_social.png';?>" />
<?php
	if ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
		echo '<meta property="og:description" content="' . $meta_description . '" />' . "\n";
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />' . "\n";
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />' . "\n";
	};

	if ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />' . "\n";
	}

} elseif ( is_404() ) { ?>
	<title>Error 404 - <?php bloginfo('name');?></title>
	<meta property="og:title" content="Error 404 - <?php bloginfo('name');?>" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri() . '/img/asa_social.png';?>" />
<?php
	if ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
		echo '<meta property="og:description" content="' . $meta_description . '" />' . "\n";
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />' . "\n";
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />' . "\n";
	};

	if ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />' . "\n";
	}

} elseif ( is_category() || is_tax() || is_tag() ) { ?>
	<title><?php printf( __( '%s', 'asa' ), single_cat_title( '', false ) ); ?> - <?php bloginfo('name');?></title>
	<meta property="og:title" content="<?php printf( __( '%s', 'asa' ), single_cat_title( '', false ) ); ?> - <?php bloginfo('name');?>" />
	<meta property="og:image" content="<?php echo get_stylesheet_directory_uri() . '/img/asa_social.png';?>" />
<?php
	if ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
		echo '<meta property="og:description" content="' . $meta_description . '" />' . "\n";
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />' . "\n";
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />' . "\n";
	};

	if ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />' . "\n";
	}

} elseif ( is_page() || is_single() ) { ?>
	<title><?php the_title();?> - <?php bloginfo('name');?></title>
	<meta property="og:title" content="<?php the_title();?> - <?php bloginfo('name');?>" />
	<meta property="og:image" content="<?php
		$optional_size	= 'custom-thumb-300-300';
		$img_id			= get_post_thumbnail_id( $post->ID );
		$image			= wp_get_attachment_image_src( $img_id, $optional_size );
		$alt_text		= get_post_meta( $img_id , '_wp_attachment_image_alt', true );
		$perm			= get_permalink ($post->ID );

		if ( $image )
		{
			echo $image[0];
		}
		else
		{
			echo get_stylesheet_directory_uri() . '/img/asa_social.png';
		}
;?>
	" />
<?php
	echo  "\n";
	if ( $meta_paginas_meta_descripcion )
	{
		echo '<meta name="description" content="' . $meta_paginas_meta_descripcion . '" />' . "\n";
		echo '<meta property="og:description" content="' . $meta_paginas_meta_descripcion . '" />' . "\n";
	}
	elseif ( $meta_description )
	{
		echo '<meta name="description" content="' . $meta_description . '" />' . "\n";
		echo '<meta property="og:description" content="' . $meta_description . '" />' . "\n";
	}
	else
	{
		echo '<meta name="description" content="' . get_bloginfo('description') . '" />' . "\n";
		echo '<meta property="og:description" content="' . get_bloginfo('description') . '" />' . "\n";
	};

	if ( $meta_paginas_meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_paginas_meta_keywords . '" />' . "\n";
	}
	elseif ( $meta_keywords )
	{
		echo '<meta name="keywords" content="' . $meta_keywords . '" />' . "\n";
	}
};?>
	<meta name="author" content="<?php bloginfo('name');?>">

<?php if ( wpmd_is_notphone() ) { ?>
<!--[if lt IE 9]>
	<script type="text/javascript">
		document.createElement("nav");
		document.createElement("header");
		document.createElement("footer");
		document.createElement("section");
		document.createElement("article");
		document.createElement("aside");
		document.createElement("main");
	</script>
<![endif]-->

<!--[if IE 8]>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/html5-3.6-respond-1.4.2.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/selectivizr-min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('stylesheet_directory');?>/js/css3-mediaqueries.js"></script>
<![endif]-->

<!--[if IE 9]><style type="text/css">.gradient { filter: none !important; }</style><![endif]-->
<!--[if gt IE 9]><style type="text/css">.gradient { filter: none !important; }</style><![endif]-->
<?php };?>

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory');?>/css/style.css" />


	<!-- Los favicones -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory');?>/img/favicon.ico" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('stylesheet_directory');?>/img/apple-touch-icon-152x152.png" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?php bloginfo('stylesheet_directory');?>/img/favicon-16x16.png" sizes="16x16" />

	<?php
	/* Los estilos del Contact Form sólo se cargarán en la página de Cotnacto */
	
	
	
	wp_head();?>
</head>
<body>
	<div class="wrapper">
		<header class="heading animated slideInDown">

			<!-- Logotipo -->
			<div class="heading__logo">
				<figure class="heading__logo__figure">
					<a href="<?php echo get_home_url();?>" title="<?php bloginfo('name');?>">
					<?php if( $logo_uploader )
					{
						echo "<img src='" . $logo_uploader . "' alt='" . get_bloginfo('name') . "' />";
					} else { ?>
						<img
							src="<?php bloginfo('stylesheet_directory');?>/img/logo_200w.png"
							alt="<?php bloginfo('name');?>"
							srcset="<?php bloginfo('stylesheet_directory');?>/img/logo_200w.png 200w, <?php bloginfo('stylesheet_directory');?>/img/logo_400w.png 400w, <?php bloginfo('stylesheet_directory');?>/img/logo_600w.png 600w"
							sizes="(max-width: 200px) 100vw, 200px"
						/>
						<?php };?>
					</a>
					</figure>
				</div>
			
			<!-- El titulo de la web -->
			<div class="heading__title--alterno">
				<h1><?php bloginfo("the_title");?></h1>
			</div>

			<!-- Botón del menú -->
			<div class="heading__menu">
				<a id="boton_menu" href="#" class="heading__menu_boton icon-menu icon-right icon-left"></a>
			</div>


			<!-- Barra de navegación -->
			<nav class="nav">
				<?php $default = array(
					'container'			=>	false,
					'depth'				=>	2,
					'menu'				=>	'header_nav',
					'theme_location'	=>	'header_nav',
					'items_wrap'		=>	'<ul class="nav__list">%3$s</ul>'
				);
				wp_nav_menu($default);?>
			</nav>

			<!-- Limpiador -->
			<div class="clearboth"></div>

		</header>

			<?php
			// El titular principal h1 solo en la home, en el resto de las páginas será un h2
			if( is_home() ) { ?>
				<!-- <div class="heading__title">
					<h1><?php //bloginfo("description");?></h1>
				</div> -->
			<?php } else { ?>

				<!-- Sirve para englogar la pagina, sidebar y single -->
				<div class="englobador">
			<?php
			// Las miguillas de pan
			the_breadcrums();}?>
