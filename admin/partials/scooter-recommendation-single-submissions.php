<?php
	  global $wpdb;

	  $table = $wpdb->prefix . "scooter_recommendation_submissions"; 
      $id = $_GET['id'];
	  $submissions = $wpdb->get_results( "SELECT * FROM $table Where `id` =  '$id' " );

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

    <?php foreach($submissions as $submission):?>
        <h1 class="text-upper text-center"><?php echo esc_html($submission->drivers_name." Submission",  $this->plugin_name); ?></h1>
        <div id="page_body">

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Email', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e($submission->drivers_email, $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Phone', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e($submission->drivers_phone, $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Contact Me On Phone', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->drivers_consent), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Custom Suggestion', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->custom_suggestion), $this->plugin_name); ?></div>
                </div>

                <h3 class="text-center">Daily Use</h3>
                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('At Home', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->at_home), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Around Town', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->around_town), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Traveling Portable', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->traveling_portable), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('All Terrain', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->all_terrain), $this->plugin_name); ?></div>
                </div>

                <h3 class="text-center">Access</h3>
                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Ramp', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->ramp), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Elevator', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->elevator), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Vertical Lift', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->vertical_lift), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Stairs', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->stairs), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Weight Range', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->weight_range), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('Height Range', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->height_range), $this->plugin_name); ?></div>
                </div>

                <div class="drivers-record">
                    <div class="subject"><?php echo esc_attr_e('suspension', $this->plugin_name); ?></div>
                    <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->suspension), $this->plugin_name); ?></div>
                </div>
        </div>
    <?php endforeach; ?>

</div>