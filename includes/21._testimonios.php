<?php

// Register Custom Post Type
function carteles_home() {

	$labels = array(
		'name'                  => _x( 'Carteles', 'Post Type General Name', 'asa' ),
		'singular_name'         => _x( 'Cartel', 'Post Type Singular Name', 'asa' ),
		'menu_name'             => __( 'Carteles del Home', 'asa' ),
		'name_admin_bar'        => __( 'Carteles del Home', 'asa' ),
		'archives'              => __( 'Cartel Archives', 'asa' ),
		'parent_item_colon'     => __( 'Cartel superior:', 'asa' ),
		'all_items'             => __( 'Todos los carteles', 'asa' ),
		'add_new_item'          => __( 'Añadir nuevo cartel', 'asa' ),
		'add_new'               => __( 'Añadir uno nuevo', 'asa' ),
		'new_item'              => __( 'Nuevo cartel', 'asa' ),
		'edit_item'             => __( 'Editar cartel', 'asa' ),
		'update_item'           => __( 'Actualizar cartel', 'asa' ),
		'view_item'             => __( 'Ver cartel', 'asa' ),
		'search_items'          => __( 'Buscar cartel', 'asa' ),
		'not_found'             => __( 'No hay carteles', 'asa' ),
		'not_found_in_trash'    => __( 'No hay carteles en la papelera', 'asa' ),
		'featured_image'        => __( 'Imagen destacada', 'asa' ),
		'set_featured_image'    => __( 'Colocar una imagen destacada', 'asa' ),
		'remove_featured_image' => __( 'Remover una imagen destacada', 'asa' ),
		'use_featured_image'    => __( 'Usar como Imagen destacada', 'asa' ),
		'insert_into_item'      => __( 'Insertar dentro del cartel', 'asa' ),
		'uploaded_to_this_item' => __( 'Cargado en este cartel', 'asa' ),
		'items_list'            => __( 'Listado de los carteles', 'asa' ),
		'items_list_navigation' => __( 'Listado de navegación de carteles', 'asa' ),
		'filter_items_list'     => __( 'Filtrar listado de los carteles', 'asa' ),
	);
	$args = array(
		'label'                 => __( 'Cartel', 'asa' ),
		'description'           => __( 'Carteles de la home', 'asa' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-exerpt-view',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'carteles_post_type', $args );

}
add_action( 'init', 'carteles_home', 0 );

;?>