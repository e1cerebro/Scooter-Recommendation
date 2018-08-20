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
        <h1 class="text-upper text-center"><?php echo esc_html($submission->drivers_name." Submission"); ?></h1>
        <div id="page_body">

        <div class="drivers-record">
            <div class="subject"><?php echo _e('Email', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e($submission->drivers_email); ?></div>
        </div>

        <div class="drivers-record">
            <div class="subject"><?php echo _e('Phone', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e($submission->drivers_phone); ?></div>
        </div>


        <div class="drivers-record">
            <div class="subject"><?php echo _e('Contact Me On Phone', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->drivers_consent)); ?></div>
        </div>

        <div class="drivers-record">
            <div class="subject"><?php echo _e('Custom Suggestion', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->custom_suggestion)); ?></div>
        </div>

        <h3 class="text-center">Daily Use</h3>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('At Home', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->at_home)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('Around Town', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->around_town)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('Traveling Portable', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->traveling_portable)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('All Terrain', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->all_terrain)); ?></div>
        </div>

        <h3 class="text-center">Access</h3>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('Ramp', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->ramp)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('Elevator', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->elevator)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('Vertical Lift', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->vertical_lift)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('Stairs', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->stairs)); ?></div>
        </div>


        <div class="drivers-record">
            <div class="subject"><?php echo _e('Weight Range', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->weight_range)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('Height Range', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->height_range)); ?></div>
        </div>
        <div class="drivers-record">
            <div class="subject"><?php echo _e('suspension', $this->plugin_name); ?></div>
            <div class="body"><?php echo esc_attr_e(scooter_country_set_options($submission->suspension)); ?></div>
        </div>

        

        </div>
    <?php endforeach; ?>

</div>