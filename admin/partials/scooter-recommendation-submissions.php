<?php
	  global $wpdb;
	  $table = $wpdb->prefix . "scooter_recommendation_submissions"; 
	  $submissions = $wpdb->get_results( "SELECT * FROM $table  ORDER BY `date_submitted` DESC" );
	  $counter = 0;
?>
<?php 

function scooter_country_set_options($option){
    if($option == 1){
        return "Yes";
    }else{
        return "No";
    }
}

?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th style="text-align:center;">Id</th>
                <th style="text-align:left;">Name</th>
				<th style="text-align:center;">Email</th>
                <th style="text-align:left;">Phone</th>
                <th style="text-align:left;">Call On Phone</th>
                <th style="text-align:left;">Wants Custom Suggestion</th>
                <th style="text-align:left;">Date Submitted</th>
				
            </tr>
        </thead>
        <tbody>
            <?php foreach($submissions as $submission):?>
                <?php
                    $view_path = 'admin.php?page=scooter-recommendation-single-submission-view';
                    $url = admin_url($view_path);
                    $link = "<a class='admin-link' href='{$url}&id={$submission->id}'>".$submission->drivers_name."</a>";
                ?>
                <tr>
                    <td style="text-align:center;"><?php esc_attr_e(++$counter); ?></td>
                    <td style="text-align:left;"><?php _e($link); ?></td>
                    <td style="text-align:center;"><a class="admin-link" href="mailto:<?php echo esc_attr_e($submission->drivers_email); ?>">  <?php echo esc_attr_e($submission->drivers_email); ?></a></td>
                    <td style="text-align:center;"><a class="admin-link" href="tel:<?php echo esc_attr_e($submission->drivers_phone); ?>">  <?php echo esc_attr_e($submission->drivers_phone);  ?> </a></td>
                    <td style="text-align:center;"><?php echo esc_attr_e(scooter_country_set_options($submission->drivers_consent));  ?></td>
                    <td style="text-align:center;"><?php echo esc_attr_e(scooter_country_set_options($submission->custom_suggestion));  ?></td>
                    <td style="text-align:center;"><?php echo esc_attr_e($submission->date_submitted);  ?></td>
                </tr>
            <?php endforeach; ?>
         </tbody>
     </table>
</div>