<pre>

<?php
      global $wpdb;
      
      $scooter_id = $_GET['scooter_id'];
      
      $table = $wpdb->prefix . "scooter_recommendation"; 

      $scooters = $wpdb->get_results( "SELECT * FROM $table WHERE `product_id` = $scooter_id" );
      
      $wpdb->flush();
      
 ?>

 </pre>

<div class="wrap" id="app">


<div id="page_body">
<h1 class="product-title"><?php esc_attr_e( get_the_title($scooter_id), $this->plugin_name  ); ?></h1>

<form method="post" name="scooter_recommendation" action="">

<input type="hidden"   placeholder="Scooter URL" class="regular-text"  name="product_url" value='<?php echo $scooters[0]->product_url;?>'/>
<input type="hidden"  placeholder="Scooter ID" class="regular-text" name="product_id"  value='<?php echo $scooter_id; ?>'/>  
    
<div class="can-toggle">
            <input id="at_home" type="checkbox" name="at_home" value="1" <?php echo ( $scooters[0]->at_home == 1 ? 'checked' : ''); ?>>
            <label for="at_home">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'At Home', $this->plugin_name  ); ?></div>
            </label>
        </div>
        
        <div class="can-toggle">
            <input id="around_town" type="checkbox" name="around_town" value="1" <?php echo ( $scooters[0]->around_town == 1 ? 'checked' : ''); ?> />
            <label for="around_town">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Around town', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <div class="can-toggle">
            <input id="traveling_portable" type="checkbox" name="traveling_portable" value="1" <?php echo ( $scooters[0]->traveling_portable == 1 ? 'checked' : ''); ?>>
            <label for="traveling_portable">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Traveling/Portable', $this->plugin_name  ); ?></div>
            </label>
        </div>

        
        <div class="can-toggle">
            <input id="all_terrain" type="checkbox" name="all_terrain" value="1" <?php echo ( $scooters[0]->all_terrain == 1 ? 'checked' : ''); ?> />
            <label for="all_terrain">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'All terrain', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <h2><?php esc_attr_e( 'Access', $this->plugin_name ); ?></h2>

        <div class="can-toggle">
            <input id="ramp" type="checkbox" name="ramp" value="1" <?php echo ( $scooters[0]->ramp == 1 ? 'checked' : ''); ?> />
            <label for="ramp">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Ramp', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <div class="can-toggle">
            <input id="elevator" type="checkbox" name="elevator" value="1" <?php echo ( $scooters[0]->elevator == 1 ? 'checked' : ''); ?>>
            <label for="elevator">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Elevator', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <div class="can-toggle">
            <input id="verticle_lift" type="checkbox" name="verticle_lift" value="1" <?php echo ( $scooters[0]->verticle_lift == 1 ? 'checked' : ''); ?>>
            <label for="verticle_lift">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Verticle Lift', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <div class="can-toggle">
            <input id="stairs" type="checkbox" name="stairs" value="1" <?php echo ( $scooters[0]->stairs == 1 ? 'checked' : ''); ?> />
            <label for="stairs">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Stairs', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <h2><?php esc_attr_e( 'Driver\'s Size', $this->plugin_name ); ?></h2>
        <h4><?php esc_attr_e( 'Driver Weight Range', $this->plugin_name ); ?></h4>

        <div class="can-toggle">
            <input id="less_than_250" type="checkbox" name="less_than_250" value="1" <?php echo ( $scooters[0]->less_than_250 == 1 ? 'checked' : ''); ?> />
            <label for="less_than_250">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Less than 250', $this->plugin_name  ); ?></div>
            </label>
        </div>


        <div class="can-toggle">
            <input id="from_251_350" type="checkbox" name="from_251_350" value="1" <?php echo ( $scooters[0]->from_251_350 == 1 ? 'checked' : ''); ?>>
            <label for="from_251_350">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( '251- 350', $this->plugin_name  ); ?></div>
            </label>
        </div>

         <div class="can-toggle">
            <input id="from_351_400" type="checkbox" name="from_351_400" value="1" <?php echo ( $scooters[0]->from_351_400 == 1 ? 'checked' : ''); ?>>
            <label for="from_351_400">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( '351-400', $this->plugin_name  ); ?></div>
            </label>
        </div>

         <div class="can-toggle">
            <input id="more_than_400_lbs" type="checkbox" name="more_than_400_lbs" value="1" <?php echo ( $scooters[0]->more_than_400_lbs == 1 ? 'checked' : ''); ?>>
            <label for="more_than_400_lbs">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'More than 400 lbs', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <h4><?php esc_attr_e( 'Driver Height Range', $this->plugin_name ); ?></h4>

        <div class="can-toggle">
            <input id="less_5_ft" type="checkbox" name="less_5_ft" value="1" <?php echo ( $scooters[0]->less_5_ft == 1 ? 'checked' : ''); ?>>
            <label for="less_5_ft">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Less 5 ft', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <div class="can-toggle">
            <input id="from_5ft_5_5ft" type="checkbox" name="from_5ft_5_5ft"  <?php echo ( $scooters[0]->from_5ft_5_5ft == 1 ? 'checked' : ''); ?> value="1">
            <label for="from_5ft_5_5ft">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( '5 ft- 5.5 ft', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <div class="can-toggle">
            <input id="from_5_5ft_6ft" type="checkbox" name="from_5_5ft_6ft" value="1" <?php echo ( $scooters[0]->from_5_5ft_6ft == 1 ? 'checked' : ''); ?>>
            <label for="from_5_5ft_6ft">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( '5.5 ft - 6 ft', $this->plugin_name  ); ?></div>
            </label>
        </div>

    
        <div class="can-toggle">
            <input id="from_6ft_6_5ft" type="checkbox" name="from_6ft_6_5ft" value="1" <?php echo ( $scooters[0]->from_6ft_6_5ft == 1 ? 'checked' : ''); ?> />
            <label for="from_6ft_6_5ft">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( '6 ft- 6.5 ft', $this->plugin_name  ); ?></div>
            </label>
        </div>


        <div class="can-toggle">
            <input id="more_than_6_5ft" type="checkbox" name="more_than_6_5ft" value="1" <?php echo ( $scooters[0]->more_than_6_5ft == 1 ? 'checked' : ''); ?>>
            <label for="more_than_6_5ft">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'More than 6.5ft', $this->plugin_name  ); ?></div>
            </label>
        </div>

        <h2><?php esc_attr_e( 'Suspension', $this->plugin_name ); ?></h2>
        <p><?php esc_attr_e( 'Does the scooter support suspension', $this->plugin_name ); ?></p>
       
        <div class="can-toggle">
            <input  type="checkbox" name="suspension" value="1" id="suspension" <?php echo ( $scooters[0]->suspension == 1 ? 'checked' : ''); ?>>
            <label for="suspension">
                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                <div class="can-toggle__label-text"><?php esc_attr_e( 'Suspension', $this->plugin_name ); ?></div>
            </label>
        </div>

            <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>        
     </form>
    </div>


</div>

<?php
    if($_POST['submit']){
 
        // $product_url            =   $_POST['product_url'];
         $product_id             =   $_POST['product_id'];
         $at_home                =   $_POST['at_home'];
         $around_town            =   $_POST['around_town'];
         $traveling_portable     =   $_POST['traveling_portable'];
         $all_terrain            =   $_POST['all_terrain'];
         $ramp                   =   $_POST['ramp'];
         $elevator               =   $_POST['elevator'];
         $verticle_lift          =   $_POST['verticle_lift'];
         $stairs                 =   $_POST['stairs'];
         $less_than_250          =   $_POST['less_than_250'];
         $from_251_to_350        =   $_POST['from_251_350'];
         $from_351_to_400        =   $_POST['from_351_400'];
         $more_than_400_lbs      =   $_POST['more_than_400_lbs'];
         $less_5_ft              =   $_POST['less_5_ft'];
         $from_5ft_5_5ft         =   $_POST['from_5ft_5_5ft'];
         $from_5_5ft_6ft         =   $_POST['from_5_5ft_6ft'];
         $from_6ft_6_5ft         =   $_POST['from_6ft_6_5ft'];
         $more_than_6_5ft        =   $_POST['more_than_6_5ft'];
         $suspension             =   $_POST['suspension'];  
        
         $query =  $wpdb->update(
                         $table,
                         array(
                                'at_home'     => $at_home,
                                'around_town' =>$around_town,
                                'traveling_portable' => $traveling_portable,
                                'all_terrain' => $all_terrain,
                                'ramp' =>$ramp,
                                'elevator' => $elevator,
                                'verticle_lift' =>$verticle_lift,
                                'stairs' => $stairs,
                                'less_than_250' => $less_than_250,
                                'from_251_350'         =>  $from_251_to_350,
                                'from_351_400'           => $from_351_to_400,
                                'more_than_400_lbs' => $more_than_400_lbs,
                                'less_5_ft'         =>$less_5_ft,
                                'from_5ft_5_5ft'       => $from_5ft_5_5ft,
                                'from_5_5ft_6ft'       => $from_5_5ft_6ft,
                                'from_6ft_6_5ft'       =>$from_6ft_6_5ft,
                                'more_than_6_5ft' => $more_than_6_5ft,
                                'suspension'      =>$suspension,
                         ),
                         array( 'product_id' => intval($product_id) ),
                         //array( '%s' ),
                         array( '%d' )
                     );
        
         
                    $view_path = 'admin.php?page=scooter-recommendation-view';
                    $link = "{$view_path}&scooter_id={$product_id}";
                    //wp_reset_query();
                    wp_redirect( admin_url($link), 301 );
                    exit;

                    $wpdb->flush();

       }
?>


