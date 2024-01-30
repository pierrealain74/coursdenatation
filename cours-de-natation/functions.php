<?php
/**
 * Cours-de-natation Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cours-de-natation
 * @since 1.0.0
 */


 
/**
 * 
 * Création dun Carousel
 * Créer un tableau JSON de tous les POST
 * 
 */


 function create_json_all_post(){


    require_once get_stylesheet_directory() . '/php/all_posts_json.php';

}

add_action('wp', 'create_json_all_post');

/**
* Get the domaine name + https / http
*/
function get_the_url_domainename(){

$fullUrl = 'http' . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];


}
add_action('wp_enqueue_scripts', 'get_the_url_domainename');

/**
 * Define Constants
 */
define( 'CHILD_THEME_COURS_DE_NATATION_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_enqueue_styles() {

	wp_enqueue_style( 'cours-de-natation-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_COURS_DE_NATATION_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15 );



/**
 * Ajoute une colonne thumbnail dans l'admin des posts
 */ 
function custom_columns_thumbnail($columns) {
    $columns['thumbnail'] = __('Thumbnail');
    return $columns;
}

// Affiche les miniatures dans la colonne ajoutée
function custom_columns_content($column_name, $post_id) {
    if ($column_name == 'thumbnail') {
        $thumbnail = get_the_post_thumbnail($post_id, array(50, 50));
        echo $thumbnail;
    }
}

// Enregistre les actions
add_filter('manage_posts_columns', 'custom_columns_thumbnail');
add_action('manage_posts_custom_column', 'custom_columns_content', 10, 2);