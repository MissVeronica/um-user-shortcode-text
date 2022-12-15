<?php
/*
 * Plugin Name: Ultimate Member - User Meta Shortcode Text
 * Description: Adds a shortcode functionality to render User Meta data in Pages/Posts returning conditional text 
 * Version:          1.0.0
 * Requires PHP:     7.4
 * Author:           Miss Veronica
 * License:          GPL v2 or later
 * License URI:      https://www.gnu.org/licenses/gpl-2.0.html
 * Author URI:       https://github.com/MissVeronica
 * Text Domain:      ultimate-member
 * Domain Path:      /languages
 * UM version:       2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

add_shortcode( 'um_user_text', 'um_user_shortcode_text' );

function um_user_shortcode_text( $atts, $content ) {

    if ( ! class_exists( "UM" ) ) return;

    $atts = extract( shortcode_atts( array(
                        'user_id'    => um_profile_id(),
                        'meta_key'   => '',
                        'meta_value' => '',
                    ), $atts ) );

    if ( empty( $meta_key ) ) return;
    if ( empty( $meta_value ) ) return;
    if ( empty( $user_id ) ) $user_id = um_profile_id();    
    if ( empty( $content ) ) return;

    $meta_value_user = get_user_meta( $user_id, $meta_key, true );

    if ( is_serialized( $meta_value_user ) ) {
        $meta_value_user = unserialize( $meta_value_user );
    } 
    if ( is_array( $meta_value_user ) ) {
        $meta_value_user = implode( ",", $meta_value_user );
    }
    if ( $meta_value_user != $meta_value ) return;

    return apply_filters( "um_user_shortcode_text_filter__{$meta_key}", esc_attr( $content ) ); 
}
