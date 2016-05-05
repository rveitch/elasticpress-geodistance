<?php
/*
Plugin Name: Elasticpress Geodistance
Plugin URI: https://
Description: Adds Geo Distance functionality to Elasticpress
Author: Ryan Veitch
Version: 1.16.05.05
Author URI: http://veitchdigital.com/
*/

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

/*--------------------------------------------------------------
# Plugin Functions
--------------------------------------------------------------*/

/**
 * Prepare location geo points to send to ES
 *
 * @param object $post
 *
 * @since 1.0
 * @return array
 */
function ep_prepare_geopoints( $post ) {
  $meta = (array) get_post_meta( $post->ID );

  if ( empty( $meta ) ) {
    return array();
  }

  $lat = $meta[lat][0];
  $lon = $meta[lon][0];

  $location = array(
    'lat' => $lat,
    'lon' => $lon
  );

  PC::debug( $location, 'location_geopoints' );
  return $location;

}

// TODO add filter to ep_post_sync_args for  'location' => $this->ep_prepare_geopoints( $post )

// TODO filter to ep_config_mapping_file for mappings

// TODO metabox/post meta functionality

// TODO wp_query support
