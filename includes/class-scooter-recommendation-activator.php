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

		$table = $wpdb->prefix . "scooter_recommendation_submissions"; 
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE IF NOT EXISTS $table ( 
			    `id` int(11) NOT NULL AUTO_INCREMENT,
				`drivers_name` varchar(225) DEFAULT NULL,
				`drivers_email` varchar(225) DEFAULT NULL,
				`drivers_phone` varchar(225) DEFAULT NULL,
				`drivers_consent` varchar(225) DEFAULT NULL,
				`custom_suggestion` varchar(225) DEFAULT NULL,
 				`at_home` varchar(225) DEFAULT NULL,
				`around_town` varchar(225) DEFAULT NULL,
				`traveling_portable` varchar(225) DEFAULT NULL,
				`all_terrain` varchar(225) DEFAULT NULL,
				`ramp` varchar(225) DEFAULT NULL,
				`elevator` varchar(225) DEFAULT NULL,
				`vertical_lift` varchar(225) DEFAULT NULL,
				`stairs` varchar(225) DEFAULT NULL,
				`weight_range` varchar(225) DEFAULT NULL,
				`height_range` varchar(225) DEFAULT NULL,
				`suspension` varchar(225) DEFAULT NULL,
				`feedback` varchar(225) DEFAULT NULL,
				`date_submitted` varchar(225) DEFAULT NULL,
				PRIMARY KEY (`id`)
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
