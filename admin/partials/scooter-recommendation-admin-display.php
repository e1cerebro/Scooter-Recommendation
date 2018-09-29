<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Scooter_Recommendation
 * @subpackage Scooter_Recommendation/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<pre>
<?php 

	function scooter_country_set_options($option){
		if($option == 1){
			return "Yes";
		}else{
			return "No";
		}
	}

?>
<?php
	  global $wpdb;

	  $table = $wpdb->prefix . "scooter_recommendation"; 
	
	  $scooters = $wpdb->get_results( "SELECT * FROM $table" );

	  $counter = 0;
?>
</pre>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap" id="app">
<div class="flex-container">  
        <div class="flex-section">
    <h1>All Scooters</h1>
    
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th style="text-align:center;">Id</th>
                <th style="text-align:center;">Scooter Name</th>
				<th style="text-align:center;"> Edit </th>
                <th style="text-align:left;"> Delete </th>
            </tr>
        </thead>
        <tbody>
			<?php foreach ($scooters as $scooter){ ?>
			<?php  

				$view_path = 'admin.php?page=scooter-recommendation-view';
				$url = admin_url($view_path);
				$name = get_the_title($scooter->product_id);
				$link = "<a class='admin-link' href='{$url}&scooter_id={$scooter->product_id}'>".$name."</a>";
			?>
		    <tr>
                <td data-search="Tiger Nixon" style="text-align:center;"><?php echo ++$count;?></td>
                <td style="text-align:center;"><?php  _e($link, $this->plugin_name);  ?></td>
                <td style="text-align:center;"><?php echo "<a class='admin-link' href='{$url}&scooter_id={$scooter->product_id}'>Edit"."</a>";  ?></td>
                <td style="text-align:center;">
					<form method="post" name="scooter_form" action="">
						<input type="hidden" name="product_id" value="<?php esc_attr_e($scooter->id); ?>"/>
 						<input type="submit" name="submit" id="submit" class="button" value="Delete">					
					</form>
				</td>
            </tr>  
	   <?php } ?>      
        </tbody>
 
    </table>

			</div>
	</div>
</div>

<?php if($_POST['submit']): ?>
<?php
	global $wpdb;
				
	$table = $wpdb->prefix . "scooter_recommendation";
	$wpdb->delete( $table, array( 'id' => $_POST['product_id'] ) );
	wp_redirect( admin_url( 'admin.php?page=uchenna-scooter-recommendation' ), 301 );
	exit;
?>
<?php endif; ?>
