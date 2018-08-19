<?php

/**
 * Fired during plugin activation
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Scooter_Recommendation
 * @subpackage Scooter_Recommendation/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Scooter_Recommendation
 * @subpackage Scooter_Recommendation/includes
 * @author     Christian <nwachukwu16@gmail.com>
 */
class Scooter_Recommendation_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
	
		
		global $wpdb;
		// creates my_table in database if not exists
		$table = $wpdb->prefix . "my_table"; 
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE IF NOT EXISTS $table (
			`id` mediumint(9) NOT NULL AUTO_INCREMENT,
			`name` text NOT NULL,
		UNIQUE (`id`)
		) $charset_collate;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		// creates my_table in database if not exists
		$table = $wpdb->prefix . "scooter_recommendation"; 
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE IF NOT EXISTS $table (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`product_id` varchar(225) NOT NULL,
				`at_home` varchar(225)  NULL DEFAULT '0',
				`around_town` varchar(225) NULL DEFAULT '0',
				`traveling_portable` varchar(225) NULL DEFAULT '0',
				`all_terrain` varchar(225) NULL DEFAULT '0',
				`ramp` varchar(225) NULL DEFAULT '0',
				`elevator` varchar(225) NULL DEFAULT '0',
				`verticle_lift` varchar(225) NULL DEFAULT '0',
 				`stairs` varchar(225) NULL DEFAULT '0',
				`less_than_250` varchar(225) NULL DEFAULT '0',
				`from_251_350` varchar(225) NULL DEFAULT '0',
				`from_351_400` varchar(225)  NULL DEFAULT '0',
				`more_than_400_lbs` varchar(225) NULL DEFAULT '0',
				`less_5_ft` varchar(225) NULL DEFAULT '0',
				`from_5ft_5_5ft` varchar(225) NULL DEFAULT '0',
				`from_5_5ft_6ft` varchar(225) NULL DEFAULT '0',
				`from_6ft_6_5ft` varchar(225) NULL DEFAULT '0',
				`more_than_6_5ft` varchar(225) NULL DEFAULT '0',
				`suspension` varchar(225) NULL DEFAULT '0',
				`product_url` varchar(225) NULL DEFAULT '0',
				PRIMARY KEY (`id`)
				) $charset_collate";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql ); 

	}    

}
