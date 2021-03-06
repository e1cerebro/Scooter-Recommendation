<pre>

<?php
      global $wpdb;
      
      $scooter_id = $_GET['scooter_id'];
      
      $table = $wpdb->prefix . "scooter_recommendation"; 

      $scooters = $wpdb->get_results( "SELECT * FROM $table WHERE `product_id` = $scooter_id" );
      
      $wpdb->flush();

      if($_GET['status'] == 'saved'){
        echo  "
                <div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\"> 
                    <p><strong>Settings saved.</strong></p>
                    <button type=\"button\" class=\"notice-dismiss\"><span class=\"screen-reader-text\">Dismiss this notice.</span></button>
                </div>
            ";
      }
 ?>

 </pre>

<div class="wrap" id="app">


    <div id="page_body">
     
    
    <div class="flex-container">
            <div class="header-section">
                <h1><?php esc_attr_e( get_the_title($scooter_id), $this->plugin_name  ); ?></h1>
            </div>
            <form method="post" name="scooter_recommendation" action="">

                <input type="hidden"   placeholder="Scooter URL" class="regular-text"  name="product_url" value='<?php echo esc_url($scooters[0]->product_url); ?>'/>
                <input type="hidden"  placeholder="Scooter ID" class="regular-text" name="product_id"  value='<?php esc_html_e($scooter_id); ?>'/>  
                
             <!--Flex Section  -->
             <div class="flex-section">
                <!--Left Section  -->
                <div class="left-pane">
                <h2><?php esc_attr_e( 'Daily Use', $this->plugin_name ); ?></h2>

                </div>
                <!--/Left Section  -->
                <!--Right Section  -->
                <div class="right-pane">
                <p>
                    <input id="at_home" type="checkbox" name="at_home" value="1" <?php echo ( $scooters[0]->at_home == 1 ? 'checked' : ''); ?>>
                    <label for="at_home">
                          <?php esc_attr_e( 'At Home', $this->plugin_name  ); ?> 
                    </label>
                </p>
                
                <p>
                    <input id="around_town" type="checkbox" name="around_town" value="1" <?php echo ( $scooters[0]->around_town == 1 ? 'checked' : ''); ?> />
                    <label for="around_town">
                          <?php esc_attr_e( 'Around town', $this->plugin_name  ); ?> 
                    </label>
                </p>

                <p>
                    <input id="traveling_portable" type="checkbox" name="traveling_portable" value="1" <?php echo ( $scooters[0]->traveling_portable == 1 ? 'checked' : ''); ?>>
                    <label for="traveling_portable">
                          <?php esc_attr_e( 'Traveling/Portable', $this->plugin_name  ); ?>
                    </label>
                </p>

                
                <p>
                    <input id="all_terrain" type="checkbox" name="all_terrain" value="1" <?php echo ( $scooters[0]->all_terrain == 1 ? 'checked' : ''); ?> />
                    <label for="all_terrain">
                        <?php esc_attr_e( 'All terrain', $this->plugin_name  ); ?>
                    </label>
                </p>
                </div>
                <!--/Right Section  -->
            </div>
           <!-- / Flex Section  -->

             <!--Flex Section  -->
             <div class="flex-section">
                <!--Left Section  -->
                <div class="left-pane">
                <h2><?php esc_attr_e( 'Access', $this->plugin_name ); ?></h2>

                </div>
                <!--/Left Section  -->
                <!--Right Section  -->
                <div class="right-pane">
                 <p>
                        <input id="ramp" type="checkbox" name="ramp" value="1" <?php echo ( $scooters[0]->ramp == 1 ? 'checked' : ''); ?> />
                        <label for="ramp">
                              <?php esc_attr_e( 'Ramp', $this->plugin_name  ); ?>
                        </label>
                    </p>

                    <p>
                        <input id="elevator" type="checkbox" name="elevator" value="1" <?php echo ( $scooters[0]->elevator == 1 ? 'checked' : ''); ?>>
                        <label for="elevator">
                            <?php esc_attr_e( 'Elevator', $this->plugin_name  ); ?>
                        </label>
                    </p>

                    <p>
                        <input id="verticle_lift" type="checkbox" name="verticle_lift" value="1" <?php echo ( $scooters[0]->verticle_lift == 1 ? 'checked' : ''); ?>>
                        <label for="verticle_lift">
                             <?php esc_attr_e( 'Verticle Lift', $this->plugin_name  ); ?>
                        </label>
                    </p>

                    <p>
                        <input id="stairs" type="checkbox" name="stairs" value="1" <?php echo ( $scooters[0]->stairs == 1 ? 'checked' : ''); ?> />
                        <label for="stairs">
                              <?php esc_attr_e( 'Stairs', $this->plugin_name  ); ?> 
                        </label>
                    </p>
                </div>
                <!--/Right Section  -->
            </div>
           <!-- / Flex Section  -->

             <!--Flex Section  -->
             <div class="flex-section">
                <!--Left Section  -->
                <div class="left-pane">
                    <h2><?php esc_attr_e( 'Driver\'s Size', $this->plugin_name ); ?></h2>
                </div>
                <!--/Left Section  -->
                <!--Right Section  -->
                <div class="right-pane">
                    <h5><?php esc_attr_e( 'Driver Weight Range', $this->plugin_name ); ?></h5>
                    <p>
                        <input id="less_than_250" type="checkbox" name="less_than_250" value="1" <?php echo ( $scooters[0]->less_than_250 == 1 ? 'checked' : ''); ?> />
                        <label for="less_than_250">
                             <?php esc_attr_e( 'Less than 250', $this->plugin_name  ); ?> 
                        </label>
                    </p>


                    <p>
                        <input id="from_251_350" type="checkbox" name="from_251_350" value="1" <?php echo ( $scooters[0]->from_251_350 == 1 ? 'checked' : ''); ?>>
                        <label for="from_251_350">
                              <?php esc_attr_e( '251- 350', $this->plugin_name  ); ?> 
                        </label>
                    </p>

                    <p>
                        <input id="from_351_400" type="checkbox" name="from_351_400" value="1" <?php echo ( $scooters[0]->from_351_400 == 1 ? 'checked' : ''); ?>>
                        <label for="from_351_400">
                              <?php esc_attr_e( '351-400', $this->plugin_name  ); ?> 
                        </label>
                    </p>

                    <p>
                        <input id="more_than_400_lbs" type="checkbox" name="more_than_400_lbs" value="1" <?php echo ( $scooters[0]->more_than_400_lbs == 1 ? 'checked' : ''); ?>>
                        <label for="more_than_400_lbs">
                             <?php esc_attr_e( 'More than 400 lbs', $this->plugin_name  ); ?> 
                        </label>
                    </p>

                    <h5><?php esc_attr_e( 'Driver Height Range', $this->plugin_name ); ?></h5>

                    <p>
                        <input id="less_5_ft" type="checkbox" name="less_5_ft" value="1" <?php echo ( $scooters[0]->less_5_ft == 1 ? 'checked' : ''); ?>>
                        <label for="less_5_ft">
                             <?php esc_attr_e( 'Less 5 ft', $this->plugin_name  ); ?>
                        </label>
                    </p>

                    <p>
                        <input id="from_5ft_5_5ft" type="checkbox" name="from_5ft_5_5ft"  <?php echo ( $scooters[0]->from_5ft_5_5ft == 1 ? 'checked' : ''); ?> value="1">
                        <label for="from_5ft_5_5ft">
                             <?php esc_attr_e( '5 ft- 5.5 ft', $this->plugin_name  ); ?> 
                        </label>
                    </p>

                    <p>
                        <input id="from_5_5ft_6ft" type="checkbox" name="from_5_5ft_6ft" value="1" <?php echo ( $scooters[0]->from_5_5ft_6ft == 1 ? 'checked' : ''); ?>>
                        <label for="from_5_5ft_6ft">
                              <?php esc_attr_e( '5.5 ft - 6 ft', $this->plugin_name  ); ?> 
                        </label>
                    </p>

                
                    <p>
                        <input id="from_6ft_6_5ft" type="checkbox" name="from_6ft_6_5ft" value="1" <?php echo ( $scooters[0]->from_6ft_6_5ft == 1 ? 'checked' : ''); ?> />
                        <label for="from_6ft_6_5ft">
                              <?php esc_attr_e( '6 ft- 6.5 ft', $this->plugin_name  ); ?> 
                        </label>
                    </p>


                    <p>
                        <input id="more_than_6_5ft" type="checkbox" name="more_than_6_5ft" value="1" <?php echo ( $scooters[0]->more_than_6_5ft == 1 ? 'checked' : ''); ?>>
                        <label for="more_than_6_5ft">
                              <?php esc_attr_e( 'More than 6.5ft', $this->plugin_name  ); ?> 
                        </label>
                    </p>
                </div>
                <!--/Right Section  -->
            </div>
           <!-- / Flex Section  -->

             <!--Flex Section  -->
             <div class="flex-section">
                <!--Left Section  -->
                <div class="left-pane">
                    <h2><?php esc_attr_e( 'Suspension', $this->plugin_name ); ?></h2>
                </div>
                <!--/Left Section  -->
                <!--Right Section  -->
                <div class="right-pane">
                    <p><?php esc_attr_e( 'Does the scooter support suspension', $this->plugin_name ); ?></p>
                
                    <p>
                        <input  type="checkbox" name="suspension" value="1" id="suspension" <?php echo ( $scooters[0]->suspension == 1 ? 'checked' : ''); ?>>
                        <label for="suspension">
                            <?php esc_attr_e( 'Suspension', $this->plugin_name ); ?>
                        </label>
                    </p>
                </div>
                <!--/Right Section  -->
            </div>
           <!-- / Flex Section  -->

            <div class="submit">
                <?php submit_button("Save Changes", 'primary','submit', TRUE); ?>        
            </div>

    </div>

       
       
     </form>
    </div>


</div>

<?php

    if($_POST['submit']){
       include_once( 'snippets/edit-scooter/edit-scooter-record.php' );
    }
?>


