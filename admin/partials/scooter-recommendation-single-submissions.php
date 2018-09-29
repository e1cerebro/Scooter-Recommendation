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

  <div class="flex-container">  
        <div class="flex-section">
    <?php foreach($submissions as $submission):?>
    <?php
        $date=date_create($submission->date_submitted);


    ?>
         
            <div class="submission">
                
            <?php if(strlen($submission->drivers_name) > 0):?>
                <div class="header header-section-2">
                        <h2 class="name"><?php echo esc_html($submission->drivers_name,  $this->plugin_name); ?></h2>
                        <div class="meta-info">
                        <span class="email">
                             <a href="mailto:<?php echo esc_attr_e($submission->drivers_email); ?>"><?php echo esc_attr_e($submission->drivers_email, $this->plugin_name); ?></a>
                        </span>
                        
                        
                         <span class="phone"> |
                         <a href="tel:<?php echo esc_attr_e($submission->drivers_phone); ?>"><?php echo esc_attr_e($submission->drivers_phone, $this->plugin_name); ?></a>
                         </span>
                        
                         <span class="date"> |
                         <?php echo esc_html(date_format($date,"D M Y") ,  $this->plugin_name); ?>                        </span>
                        </div>      
                </div>    
                <?php endif;?>  

                <div class="flex-section">
                     <div class="left-pane">
                            <div class="body">
                            <h2 class="section">Drivers Information</h2>
                            <div class="row">
                                <span class="subject"><?php echo esc_attr_e('Contact Me On Phone', $this->plugin_name); ?>: </span>
                                <span class="content"><?php echo esc_attr_e(scooter_country_set_options($submission->drivers_consent), $this->plugin_name); ?></span>
                            </div>
                            <div class="row">
                                <span class="subject"><?php echo esc_attr_e('Custom Suggestion', $this->plugin_name); ?>: </span>
                                <span class="content"><?php echo esc_attr_e(scooter_country_set_options($submission->custom_suggestion), $this->plugin_name); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-section">
                     <div class="left-pane">
                            <div class="body">
                            <h2 class="section">Daily Use</h2>
                            <div class="row">
                                <span class="subject"><?php echo esc_attr_e('At Home', $this->plugin_name); ?>: </span>
                                <span class="content"><?php echo esc_attr_e(scooter_country_set_options($submission->at_home), $this->plugin_name); ?></span>
                            </div>
                            <div class="row">
                                <span class="subject">
                                    <?php echo esc_attr_e('Around Town', $this->plugin_name); ?>: 
                                </span>
                                <span class="content">
                                    <?php echo esc_attr_e(scooter_country_set_options($submission->around_town), $this->plugin_name); ?>
                                </span>
                            </div>
                            <div class="row">
                                <span class="subject">
                                <?php echo esc_attr_e('Traveling Portable', $this->plugin_name); ?>: 
                                </span>
                                <span class="content">
                                    <?php echo esc_attr_e(scooter_country_set_options($submission->traveling_portable), $this->plugin_name); ?>
                                </span>
                            </div>
                            <div class="row">
                                <span class="subject">
                                <?php echo esc_attr_e('All Terrain', $this->plugin_name); ?>:
                                </span>
                                <span class="content">
                                    <?php echo esc_attr_e(scooter_country_set_options($submission->all_terrain), $this->plugin_name); ?>
                                </span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="flex-section">
                     <div class="left-pane">
                            
                <div class="body">
                    <h2 class="section">Access</h2>
                    <div class="row">
                        <span class="subject">
                            <?php echo esc_attr_e('Ramp', $this->plugin_name); ?>: 
                        </span>
                        <span class="content">
                            <?php echo esc_attr_e(scooter_country_set_options($submission->ramp), $this->plugin_name); ?>
                        </span>
                    </div>
                    <div class="row">
                        <span class="subject">
                        <?php echo esc_attr_e('Elevator', $this->plugin_name); ?>: 
                        </span>
                        <span class="content">
                        <?php echo esc_attr_e(scooter_country_set_options($submission->elevator), $this->plugin_name); ?>
                        </span>
                    </div>
                    <div class="row">
                        <span class="subject">
                        <?php echo esc_attr_e('Vertical Lift', $this->plugin_name); ?>:
                        </span>
                        <span class="content">
                        <?php echo esc_attr_e(scooter_country_set_options($submission->vertical_lift), $this->plugin_name); ?>
                        </span>
                    </div>
                    <div class="row">
                        <span class="subject">
                        <?php echo esc_attr_e('Stairs', $this->plugin_name); ?>:
                        </span>
                        <span class="content">
                        <?php echo esc_attr_e(scooter_country_set_options($submission->stairs), $this->plugin_name); ?>
                        </span>
                    </div>
                </div>
                    </div>
                </div>
                <div class="flex-section">
                     <div class="left-pane">
                            
                <div class="body">
                <h2 class="section">Additional Information</h2>

                     <div class="row">
                        <span class="subject">
                        <?php echo esc_attr_e('Weight Range', $this->plugin_name); ?>: 
                        </span>
                        <span class="content">
                        <?php echo esc_attr_e($submission->weight_range, $this->plugin_name); ?>
                        </span>
                    </div>

                      <div class="row">
                        <span class="subject">
                        <?php echo esc_attr_e('Height Range', $this->plugin_name); ?>: 
                        </span>
                        <span class="content">
                        <?php echo esc_attr_e($submission->height_range, $this->plugin_name); ?>
                        </span>
                    </div>
                      <div class="row">
                        <span class="subject">
                        <?php echo esc_attr_e('suspension', $this->plugin_name); ?>: 
                        </span>
                        <span class="content">
                        <?php echo esc_attr_e(str_replace("_", " ", scooter_country_set_options($submission->suspension)), $this->plugin_name); ?>
                        </span>
                    </div>
                </div>
                    </div>
                </div>
                <div class="flex-section">
                     <div class="left-pane">
                            
                
                <div class="body">
                     <h2 class="section">Recommended Scooters</h2>

                        <?php

                            $scooters = explode(",",$submission->scooters);

                            $count = 1;

                        ?>
                        <?php foreach($scooters as $scooter): ?>
                            <div class="row">
                                <span class="subject">
                                    <?php echo $count++.".)"; ?>
                                </span>
                                <span class="content">
                                <a target="_blank" href="<?php echo get_post_permalink( $scooter); ?>"> <?php echo get_the_title($scooter); ?> </a>
                                </span>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    </div>
                </div>


           
  


                <div class="response-footer">
                    <h3>WAS THIS FEEDBACK HELPFUL?</h3>
                    <h4> <?php echo esc_attr_e($submission->feedback, $this->plugin_name); ?></h4>
                </div>
                
            </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>