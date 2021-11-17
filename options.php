<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name()
{

	// Nombre de la plantilla
	$themename = wp_get_theme();
	$themename = preg_replace("/W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */


function optionsframework_options()
{
	// Pestaña Configuración general
	$options[]	=	array(
	'name'	=>	__('Configuración General', 'options_framework_theme'),
	'type'	=>	'heading');

	// Cambio del logo
	$options[]	=	array(
	'name'	=>	__('Logotipo del Sitio Web', 'options_check'),
	'desc'	=>	__('Selecciona el logo a mostrar en la web, tamaño 100px x 100px.', 'options_check'),
	'id'	=>	'logo_uploader',
	'type'	=>	'upload');

	// Titular del Portfolio de la home
	$options[]	=	array(
		'name'			=>	__('Titular a mostrar home', 'options_framework_theme'),
		'desc'			=>	__('Introduca un titular para mostrar en la home.', 'options_framework_theme'),
		'id'			=>	'portfolio_home',
		'placeholder'	=>	'Titular de ejemplo...',
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Contenido o mensaje para el porfolio de la home
	$options[]	=	array(
		'name'			=>	__('Mensaje a mostrar en la home', 'options_framework_theme'),
		'desc'			=>	__('Introduzca un contenido o mensaje para mostrar en la home.', 'options_framework_theme'),
		'id'			=>	'contenido_portfolio_home',
		'placeholder'	=>	'Contenido de ejemplo...',
		'class'			=>	'',
		'type'			=>	'textarea',
	);

	// Meta: keywords
	$options[]	=	array(
		'name'			=>	__('Meta: Palabras claves', 'options_framework_theme'),
		'desc'			=>	__('Introducir palabras (separadas por comas) claves de la web que son útiles para algunos buscadores. Muy importantes para SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_keywords2',
		'placeholder'	=>	'palabra1, palabra2, palabra3...',
		'class'			=>	'',
		'type'			=>	'text',
	);

	// Meta: Descripción
	$options[]	=	array(
		'name'			=>	__('Meta: Descripción de la web', 'options_framework_theme'),
		'desc'			=>	__('Introducir una descripción breve acerca de lo que trata esta web. Muy importante para el SEO. Máximo 160 caracteres.', 'options_framework_theme'),
		'id'			=>	'meta_description',
		'placeholder'	=>	'Este sitio web está dedicado a la ...',
		'class'			=>	'',
		'type'			=>	'textarea',
	);

	// Google Analitics
	$options[]	=	array(
		'name'			=>	__('Google Analitycs', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el script de Google Analitycs.', 'options_framework_theme'),
		'id'			=>	'google_analitycs',
		'placeholder'	=>	'var _gaq = _gaq || []; _gaq.push(["_setAccount", "UA-40089469-1"]); _gaq.push(["_trackPageview"]); etc...',
		'class'			=>	'',
		'type'			=>	'textarea',
	);
/* 
	// Obterner claves privadas y publicas de reCaptcha
	$options[] = array(
		'name' 			=> __('Conseguir las claves públicas y privadas para Google reCaptcha', 'options_framework_theme'),
		'desc' 			=> '<a class="button-primary" style="float:none;" target="_blank" title="Google reCaptcha" href="https://www.google.com/recaptcha/admin">' . __('Obtener', 'options_framework_theme') . '</a>',
		'id' 			=> 'obtencion',
		'placeholder'	=> '',
		'class'			=> '',
		'type' 			=> 'info',
	);


	// Clave privada de google recaptcha
	$options[] = array(
		'name' 			=> __('Clave Secreta de Google reCaptcha', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su clave secreta.', 'options_framework_theme'),
		'id' 			=> 'reCaptchaClavePrivada',
		'placeholder'	=> 'jf8erpandoasd98wepa...',
		'class'			=> '',
		'type' 			=> 'text',
	);

	// Clave pública de google recaptcha
	$options[] = array(
		'name' 			=> __('Clave pública de Google reCaptcha', 'options_framework_theme'),
		'desc' 			=> __('Introduzca su clave pública.', 'options_framework_theme'),
		'id' 			=> 'reCaptchaClavePublica',
		'placeholder'	=> 'qwoeg9384sd98wepa...',
		'class'			=> '',
		'type' 			=> 'text',
	); */

	/*====================================================================================*/
	/* =================== Pestaña información de contacto ============================== */
	$options[]	=	array(
	'name'	=>	__('Redes Sociales', 'options_framework_theme'),
	'type'	=>	'heading' );

	// Facebook
	$options[] = array(
		'name'			=>	__('Facebook', 'options_framework_theme'),
		'desc'			=>	__('Introduzca el enlace a Facebook.', 'options_framework_theme'),
		'id'			=>	'facebook_contact',
		'class'			=>	'',
		'placeholder'	=>	'www.facebook.com/usuario',
		'type'			=>	'text',
	);


	// Twitter
	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('Introduzca su enlace a Twitter.', 'options_framework_theme'),
		'id' => 'twitter_contact',
		'placeholder' => 'www.twitter.com/usuario',
		'class' => '',
		'type' => 'text',
	);

	// Instagram
	$options[] = array(
		'name' => __('Instagram', 'options_framework_theme'),
		'desc' => __('Introduzca su usuario de Instagram.', 'options_framework_theme'),
		'id' => 'instagram_contact',
		'placeholder' => '"@fulano_de_tal"',
		'class' => '',
		'type' => 'text',
	);

	// LinkedIn
	$options[] = array(
		'name' => __('LinkedIn', 'options_framework_theme'),
		'desc' => __('Introduzca su enlace al perfil de LinkedIn.', 'options_framework_theme'),
		'id' => 'linkedin_contact',
		'placeholder' => 'www.linkedin.com/usuario',
		'class' => '',
		'type' => 'text',
	);


	// Add This. Solo el enlace al script
	/*$options[] = array(
		'name' => __('Compartir en Redes Sociales', 'options_framework_theme'),
		'desc' => __('Introduzca el enlace a AddThis.', 'options_framework_theme'),
		'id' => 'add_this',
		'placeholder' => '<a class="addthis_button alignright" href="http://www.addthis.com/bookmark.php?v=250&amp;username=xa-4c8ff9282b8657a0">...',
		'class' => '',
		'type' => 'textarea'
	);
	$options[] = array(
		'name' => __('Compartir en Redes Sociales', 'options_framework_theme'),
		'desc' => __('Introduzca solamente el script de AddThis.', 'options_framework_theme'),
		'id' => 'add_this_script',
		'placeholder' => '//s7.addthis.com/js/...',
		'class' => '',
		'type' => 'text',
	);
	*/
	

	// $facebook_contact = of_get_option('facebook_contact','');

	/* ============================================================================== */
	/* Panel de la home page =========================================================*/
	$options[] = array(
	'name' => __('Datos de Contacto', 'options_framework_theme'),
	'type' => 'heading');

	// Email de contacto
	$options[] = array(
		'name' => __('E-mail de contacto', 'options_framework_theme'),
		'desc' => __('Introduzca el Email de contacto, se mostrará al pie del sitio web en un ícono.', 'options_framework_theme'),
		'id' => 'email_contact',
		'placeholder' => 'tu-mail@lo-que-sea.com.ar',
		'class' => '',
		'type' => 'text',
	);

	// Teléfono Fijo
	$options[] = array(
		'name' => __('Teléfono Fijo', 'options_framework_theme'),
		'desc' => __('Introduzca su teléfono fijo incluyendo el código de área.', 'options_framework_theme'),
		'id' => 'telefono_fijo',
		'placeholder' => '0351-4882213',
		'class' => 'mini',
		'type' => 'text',
	);

	// Teléfono Celular
	$options[] = array(
		'name' => __('Celular con WhatsApp', 'options_framework_theme'),
		'desc' => __('Introduzca su teléfono celular incluyendo el código de área.', 'options_framework_theme'),
		'id' => 'telefono_celular',
		'placeholder' => '+549261882213',
		'class' => 'mini',
		'type' => 'text',
	);

	// Campo de texto
	$wp_editor_settings = array(
		'wpautop' => true,
		'textarea_rows' => 7,
		'tinymce' => array( 'plugins' => 'wordpress, wplink' ),
	);

	// Dirección
	$options[] = array(
		'name' => __('Dirección', 'options_framework_theme'),
		'desc' => __('Introduzca calle, número, piso, departamento.', 'options_framework_theme'),
		'id' => 'direccion_web',
		'placeholder' => __('Man Sartín 453, Dpto. 3°A.', 'options_framework_theme'),
		'class' => '',
		'type' => 'text',
	);

	// Localidad
	$options[] = array(
		'name' => __('Localidad', 'options_framework_theme'),
		'desc' => __('Ciudad, pueblo.', 'options_framework_theme'),
		'id' => 'localidad_web',
		'placeholder' => __('Las Catitas.', 'options_framework_theme'),
		'class' => '',
		'type' => 'text',
	);

	// Departamento
	$options[] = array(
		'name' => __('Departamento', 'options_framework_theme'),
		'desc' => __('Departamento, partido, región.', 'options_framework_theme'),
		'id' => 'departamento_web',
		'placeholder' => __('Tulumba.', 'options_framework_theme'),
		'class' => '',
		'type' => 'text',
	);

	// Código Postal
	$options[] = array(
		'name' => __('Código Postal', 'options_framework_theme'),
		'desc' => __('Código Postal.', 'options_framework_theme'),
		'id' => 'codigopostal_web',
		'placeholder' => __('5001.', 'options_framework_theme'),
		'class' => 'mini',
		'type' => 'text',
	);

	// Provincia
	$options[] = array(
		'name' => __('Provincia', 'options_framework_theme'),
		'desc' => __('Provincia del país.', 'options_framework_theme'),
		'id' => 'provincia_web',
		'placeholder' => __('Tierra del Fuego.', 'options_framework_theme'),
		'class' => 'mini',
		'type' => 'text',
	);

	// País
	$options[] = array(
		'name' => __('País', 'options_framework_theme'),
		'desc' => __('País donde se encuentra la empresa.', 'options_framework_theme'),
		'id' => 'pais_web',
		'placeholder' => __('República no tan Checa.', 'options_framework_theme'),
		'class' => '',
		'type' => 'text',
	);

	// Lunes a viernes de 9 a 13 hs y de 16 a 20 hs sábados de 9 a 13 hs.
	// Días y horario de atención al público
	$options[] = array(
		'name' => __('Horario de atención', 'options_framework_theme'),
		'desc' => __('Introduzca los días de la semana y el horario de atención al público.', 'options_framework_theme'),
		'id' => 'horario_web',
		'placeholder' => __('Domingos a Martes; de 2 de la tarde a 14hs.', 'options_framework_theme'),
		'class' => '',
		'type' => 'text',
	);

	return $options;
}
