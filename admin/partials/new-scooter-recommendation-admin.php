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


<!-- This file should primarily consist of HTML with a little bit of PHP. -->
 <?php

  // Configure the args to fetch all the products from the database wp_posts table
  $args = array( 
                'ignore_sticky_posts' => 1,
                'posts_per_page'      => -1,
                'post_type'           => 'product',
                'post_status'         => 'publish', 
                'orderby' => 'post_title',
                'order' => 'ASC'
                );

   /* Initialize the query object */
  $the_query = new WP_Query( $args );

  /* Fetch all the posts */
  $products  = $the_query->get_posts();

 ?>

<div class="wrap" id="app">
<?php 
    if($_POST['submit']){
        include_once( 'snippets/save-new-recommendation.php' );
    } 
?>
    <div id="page_body">
                    
            <h1>Add New Scooter</h1>
            <br>
            <form method="post" name="scooter_recommendation" action="">
            <fieldset>
                <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
                <select  @click="greet" name="default_role" id="default_role">     
                <option value="">Select Scooter</option>
                <?php foreach($products as $product): ?>
                <option value="<?php echo  $product->guid; ?>|<?php echo  $product->ID; ?>"><?php echo  $product->post_title; ?></option>
                <?php endforeach;?>
                </select>
            </fieldset>
            <br/>
            <fieldset>
                <input type="hidden"   placeholder="Scooter URL" class="regular-text"  name="product_url" :value='link'/>
                <input type="hidden"  placeholder="Scooter ID" class="regular-text" name="product_id" :value='id'/>
            </fieldset>

            <h2><?php esc_attr_e( 'Daily Use', $this->plugin_name ); ?></h2>

          
            <div class="can-toggle">
                <input id="at_home" type="checkbox" name="at_home" value="1">
                <label for="at_home">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'At Home', $this->plugin_name  ); ?></div>
                </label>
            </div>
            
            <div class="can-toggle">
                <input id="around_town" type="checkbox" name="around_town" value="1">
                <label for="around_town">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Around town', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <div class="can-toggle">
                <input id="traveling_portable" type="checkbox" name="traveling_portable" value="1">
                <label for="traveling_portable">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Traveling/Portable', $this->plugin_name  ); ?></div>
                </label>
            </div>

            
            <div class="can-toggle">
                <input id="all_terrain" type="checkbox" name="all_terrain" value="1">
                <label for="all_terrain">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'All terrain', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <h2><?php esc_attr_e( 'Access', $this->plugin_name ); ?></h2>

            <div class="can-toggle">
                <input id="ramp" type="checkbox" name="ramp" value="1">
                <label for="ramp">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Ramp', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <div class="can-toggle">
                <input id="elevator" type="checkbox" name="elevator" value="1">
                <label for="elevator">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Elevator', $this->plugin_name  ); ?></div>
                </label>
            </div>
 
            <div class="can-toggle">
                <input id="verticle_lift" type="checkbox" name="verticle_lift" value="1">
                <label for="verticle_lift">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Verticle Lift', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <div class="can-toggle">
                <input id="stairs" type="checkbox" name="stairs" value="1">
                <label for="stairs">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Stairs', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <h2><?php esc_attr_e( 'Driver\'s Size', $this->plugin_name ); ?></h2>
            <h4><?php esc_attr_e( 'Driver\'s Weight Range', $this->plugin_name ); ?></h4>

            <div class="can-toggle">
                <input id="less_than_250" type="checkbox" name="less_than_250" value="1">
                <label for="less_than_250">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Less than 250', $this->plugin_name  ); ?></div>
                </label>
            </div>


            <div class="can-toggle">
                <input id="from_251_350" type="checkbox" name="from_251_350" value="1">
                <label for="from_251_350">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( '251- 350', $this->plugin_name  ); ?></div>
                </label>
            </div>

             <div class="can-toggle">
                <input id="from_351_400" type="checkbox" name="from_351_400" value="1">
                <label for="from_351_400">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( '351-400', $this->plugin_name  ); ?></div>
                </label>
            </div>

             <div class="can-toggle">
                <input id="more_than_400_lbs" type="checkbox" name="more_than_400_lbs" value="1">
                <label for="more_than_400_lbs">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'More than 400 lbs', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <h4><?php esc_attr_e( 'Driver Height Range', $this->plugin_name ); ?></h4>

            <div class="can-toggle">
                <input id="less_5_ft" type="checkbox" name="less_5_ft" value="1">
                <label for="less_5_ft">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Less 5 ft', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <div class="can-toggle">
                <input id="from_5ft_5_5ft" type="checkbox" name="from_5ft_5_5ft" value="1">
                <label for="from_5ft_5_5ft">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( '5 ft- 5.5 ft', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <div class="can-toggle">
                <input id="from_5_5ft_6ft" type="checkbox" name="from_5_5ft_6ft" value="1">
                <label for="from_5_5ft_6ft">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( '5.5 ft - 6 ft', $this->plugin_name  ); ?></div>
                </label>
            </div>

        
            <div class="can-toggle">
                <input id="from_6ft_6_5ft" type="checkbox" name="from_6ft_6_5ft" value="1">
                <label for="from_6ft_6_5ft">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( '6 ft- 6.5 ft', $this->plugin_name  ); ?></div>
                </label>
            </div>


            <div class="can-toggle">
                <input id="more_than_6_5ft" type="checkbox" name="more_than_6_5ft" value="1">
                <label for="more_than_6_5ft">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'More than 6.5ft', $this->plugin_name  ); ?></div>
                </label>
            </div>

            <h2><?php esc_attr_e( 'Suspension', $this->plugin_name ); ?></h2>
            <p><?php esc_attr_e( 'Does the scooter support suspension', $this->plugin_name ); ?></p>
           
            <div class="can-toggle">
                <input  type="checkbox" name="suspension" id="suspension" value="1">
                <label for="suspension">
                    <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                    <div class="can-toggle__label-text"><?php esc_attr_e( 'Suspension', $this->plugin_name ); ?></div>
                </label>
            </div>

            <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>        
        </div>

    </div>