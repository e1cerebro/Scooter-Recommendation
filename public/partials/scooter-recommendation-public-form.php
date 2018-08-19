<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       #
 * @since      1.0.0
 *
 * @package    Scooter_Recommendation
 * @subpackage Scooter_Recommendation/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
        <?php

                function GetImageUrlsByProductId( $productId){
                
                    $product = new WC_product($productId);
                    $attachmentIds = $product->get_gallery_attachment_ids();
                    $imgUrls = array();
                    foreach( $attachmentIds as $attachmentId )
                    {
                        $imgUrls[] = wp_get_attachment_url( $attachmentId );
                    }
                
                    return $imgUrls;
                }
		?>
			<?php if($_POST['submit']): ?>
                <?php 
                     global $wpdb;
                     $where_condition="";
                     $product_id             =   $_POST['product_id'];

                     $at_home                =   $_POST['at_home'];

                        if($at_home == 1){
                            $where_condition .= "`at_home` = $at_home ";
                        }

                     $around_town            =   $_POST['around_town'];

                        if($around_town == 1){
                            if($at_home != 0 ){
                                $where_condition .= " AND ";
                            }
                            $where_condition .= " `around_town` = $around_town ";
                        }

                     $traveling_portable     =   $_POST['traveling_portable'];

                        if($traveling_portable == 1){
                            if($around_town != 0 ||  $at_home != 0){
                                $where_condition .= " AND ";
                            }
                            $where_condition .= "`traveling_portable` = $traveling_portable ";
                        }

                     $all_terrain            =   $_POST['all_terrain'];

                        if($all_terrain == 1){
                            if($around_town != 0 || $traveling_portable != 0 ||  $at_home != 0){
                                $where_condition .= " AND ";
                            }
                            $where_condition .= "`all_terrain` = $all_terrain ";
                        }

                     $ramp                   =   $_POST['ramp'];

                        if($ramp == 1){
                            if($around_town != 0 ||  $all_terrain != 0 || $traveling_portable != 0 ||  $at_home != 0){
                                $where_condition .= " AND ";
                            }
                            $where_condition .= "`ramp` = $ramp ";
                        }

                     $elevator               =   $_POST['elevator'];

                        if($elevator == 1){
                            if($ramp != 0 || $around_town != 0 ||  $all_terrain != 0 || $traveling_portable != 0 ||  $at_home != 0){
                                $where_condition .= " AND ";
                            }
                            $where_condition .= "`elevator` = $elevator ";
                        }
                            
                     $verticle_lift          =   $_POST['verticle_lift'];
                       
                        if($verticle_lift == 1){
                            if($elevator != 0 || $ramp != 0 || $around_town != 0 ||  $all_terrain != 0 || $traveling_portable != 0 ||  $at_home != 0){
                                $where_condition .= " AND ";
                            }
                            $where_condition .= "`verticle_lift` = $verticle_lift ";
                        }

                     $stairs                 =   $_POST['stairs'];

                        if($stairs == 1){
                            if( $verticle_lift != 0 || $elevator != 0 || $ramp != 0 || $around_town != 0 ||  $all_terrain != 0 || $traveling_portable != 0 ||  $at_home != 0){
                                $where_condition .= " AND ";
                            }
                            $where_condition .= "`stairs` = $stairs ";
                        }

                     $drivers_weight   =   $_POST['drivers-weight'];
                        /* Choose which of the options the user choose. */   
                       
                    if( $stairs != 0 || $verticle_lift != 0 || $elevator != 0 || $ramp != 0 || $around_town != 0 ||  $all_terrain != 0 || $traveling_portable != 0 ||  $at_home != 0){
                        $where_condition .= " AND ";
                    }
                    
                    if($drivers_weight == 'less_than_250'){
                        $less_than_250   = 1;
                         $where_condition .= "`less_than_250` = $less_than_250 ";
                    }
                    
                    if($drivers_weight == 'from_251_350'){
                        $from_251_350   = 1;
                         $where_condition .= "`from_251_350` = $from_251_350 ";
                    }
                    
                    if($drivers_weight == 'from_351_400'){
                        $from_351_400   = 1;
                        $where_condition .= "`from_351_400` = $from_351_400 ";
                    }
                        
                     if($drivers_weight == 'more_than_400_lbs'){
                        $more_than_400_lbs   = 1;
                        $where_condition .= "`more_than_400_lbs` = $more_than_400_lbs ";
                     }
                    

                    $drivers_height_range   =   $_POST['drivers-height-range'];
                    
                    /* Choose which of the options the user choose. */   
                   
                    if( $drivers_weight != ' ' || $stairs != 0 || $verticle_lift != 0 || $elevator != 0 || $ramp != 0 || $around_town != 0 ||  $all_terrain != 0 || $traveling_portable != 0 ||  $at_home != 0){
                        $where_condition .= " AND ";
                    }

                    if($drivers_height_range == 'less_5_ft'){
                        $less_5_ft   = 1;
                        $where_condition .= "`less_5_ft` = $less_5_ft ";
                    }

                    if($drivers_height_range == 'from_5ft_5_5ft'){
                        $from_5ft_5_5ft   = 1;
                        $where_condition .= "`from_5ft_5_5ft` = $from_5ft_5_5ft ";
                    }

                    if($drivers_height_range == 'from_5_5ft_6ft'){
                        $from_5_5ft_6ft   = 1;
                        $where_condition .= "`from_5_5ft_6ft` = $from_5_5ft_6ft ";
                    }

                    if($drivers_height_range == 'from_6ft_6_5ft'){
                        $from_6ft_6_5ft   = 1;
                        $where_condition .= "`from_6ft_6_5ft` = $from_6ft_6_5ft ";
                    }

                    if($drivers_height_range == 'more_than_6_5ft'){
                        $more_than_6_5ft   = 1;
                        $where_condition .= "`more_than_6_5ft` = $more_than_6_5ft ";
                    }


                    $suspension_radio   =   $_POST['suspension'];
                    
                    /* Choose which of the options the user choose. */   
                   
                    if( $drivers_height_range != ' ' || $drivers_weight != ' ' || $stairs != 0 || $verticle_lift != 0 || $elevator != 0 || $ramp != 0 || $around_town != 0 ||  $all_terrain != 0 || $traveling_portable != 0 ||  $at_home != 0){
                        $where_condition .= " AND ";
                    }
              
                    $where_condition .= "`suspension` = $suspension_radio ";
  
                    $table = $wpdb->prefix . "scooter_recommendation"; 
                   
                    $scooters = $wpdb->get_results( "SELECT * FROM $table WHERE $where_condition " );
                     //print_r($wpdb->last_query);

                     ?>
                <?php if(sizeof($scooters) != 0):?>
                    <div class="result-header">
                        <h1 class="title">SEARCH RESULT</h1>
                        <p class="sub-title">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Modi a ratione facere consequatur quis saepe aspernatur corrupti molestias aperiam, corporis accusamus debitis asperiores tenetur esse obcaecati inventore ducimus similique totam?
                        </p>
                    </div>
                     <?php  foreach($scooters as $product): ?>
                     <?php
                        $_product = wc_get_product($product->product_id);
                        
                     ?>
                     <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->product_id ), 'single-post-thumbnail' );?>

                     <div class="container product-list">
                            <div class="box">
                                <div class="product-img" >
                                    <img src="<?php  echo $image[0]; ?>" width="250" alt="" />
                                </div>
                                <div class="product-info">
                                    <div class="product-info-header">
                                        <h1><?php  echo get_the_title($product->product_id);  ?></h1>
                                        <p class="price"><?php echo get_woocommerce_currency_symbol()."".$_product->get_regular_price(); ?></p>
                                    </div>
                                    <div class="product-description">
                                        <p class="description">
                                        <?php echo $_product->get_short_description(); ?>
                                        </p>
                                    </div>
                                    
                                    <div class="product-info-footer">
                                         <a class="border-button" href="<?php echo get_post_permalink( $product->product_id); ?>" class="link-button">Learn More</a>
                                     </div>

                                </div>
                            </div>

                    </div>
                    <?php endforeach; ?>

                    <div class="not-found">
                        <p class="link">
                            <a class="submit-btn btn-small" href="<?php echo $httpReferer; ?>">Search Again</a>
                            <?php $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );?>
                            <a class="submit-btn btn-small" href="<?php echo $shop_page_url; ?>">Visit Our Store</a>
                        </p>
                    </div>
                <?php else: ?>
                    <?php
                        $httpReferer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : null;
                    ?>
                    <div class="not-found">
                        <h3 class="message">
                            Your search returned an empty result.
                        </h3>
                        <p class="link">
                         <a href="<?php echo $httpReferer; ?>">Search Again</a>
                         <?php $shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );?>
                         <a href="<?php echo $shop_page_url; ?>">Visit Our Store</a>
                        </p>
                    </div>

                <?php endif; ?>
               
            <?php else: ?>
            <div class="font-end-form">

            <form method="post" action="">
			    <div class="form-section">
                    <div class="left-part">
                        <h2>Daily Use</h2>
                        <div class="description">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus quos veritatis similique sapiente perspiciatis enim vero sit officiis. Corrupti laborum saepe voluptate illo tempora veritatis modi molestias magni amet quisquam!
                        </div>
                    </div>
                    <div class="right-part">

                        <div class="can-toggle can-toggle--size-small">
                            <input id="at_home" type="checkbox" name="at_home" value="1">
                            <label for="at_home">
                                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                                <div class="can-toggle__label-text"><?php esc_attr_e( 'At Home', $this->plugin_name  ); ?></div>
                            </label>
                        </div>

                        <div class="can-toggle can-toggle--size-small">
                            <input id="around_town" type="checkbox" name="around_town" value="1">
                            <label for="around_town">
                                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                                <div class="can-toggle__label-text"><?php esc_attr_e( 'Around town', $this->plugin_name  ); ?></div>
                            </label>
                        </div>

                        <div class="can-toggle can-toggle--size-small">
                            <input id="traveling_portable" type="checkbox" name="traveling_portable" value="1">
                            <label for="traveling_portable">
                                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                                <div class="can-toggle__label-text"><?php esc_attr_e( 'Traveling/Portable', $this->plugin_name  ); ?></div>
                            </label>
                        </div>

                        
                        <div class="can-toggle can-toggle--size-small">
                            <input id="all_terrain" type="checkbox" name="all_terrain" value="1">
                            <label for="all_terrain">
                                <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                                <div class="can-toggle__label-text"><?php esc_attr_e( 'All terrain', $this->plugin_name  ); ?></div>
                            </label>
                        </div>

                    </div>
                </div>


                <div class="form-section">
                    <div class="left-part">
                        <h2>Acess</h2>
                        <div class="description">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus quos veritatis similique sapiente perspiciatis enim vero sit officiis. Corrupti laborum saepe voluptate illo tempora veritatis modi molestias magni amet quisquam!
                        </div>
                    </div>
                    <div class="right-part">
                       <div class="can-toggle can-toggle--size-small">
                        <input id="ramp" type="checkbox" name="ramp" value="1">
                        <label for="ramp">
                            <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                            <div class="can-toggle__label-text"><?php esc_attr_e( 'Ramp', $this->plugin_name  ); ?></div>
                        </label>
                    </div>

                    <div class="can-toggle can-toggle--size-small">
                        <input id="elevator" type="checkbox" name="elevator" value="1">
                        <label for="elevator">
                            <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                            <div class="can-toggle__label-text"><?php esc_attr_e( 'Elevator', $this->plugin_name  ); ?></div>
                        </label>
                    </div>
        
                    <div class="can-toggle can-toggle--size-small">
                        <input id="verticle_lift" type="checkbox" name="verticle_lift" value="1">
                        <label for="verticle_lift">
                            <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                            <div class="can-toggle__label-text"><?php esc_attr_e( 'Verticle Lift', $this->plugin_name  ); ?></div>
                        </label>
                    </div>

                    <div class="can-toggle can-toggle--size-small">
                        <input id="stairs" type="checkbox" name="stairs" value="1">
                        <label for="stairs">
                            <div class="can-toggle__switch" data-checked="Yes" data-unchecked="No"></div>
                            <div class="can-toggle__label-text"><?php esc_attr_e( 'Stairs', $this->plugin_name  ); ?></div>
                        </label>
                    </div>

                    </div>
                </div>


                 <div class="form-section">
                    <div class="left-part">
                        <h2>Driver's Weight Range</h2>
                        <div class="description">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus quos veritatis similique sapiente perspiciatis enim vero sit officiis. Corrupti laborum                                        
                        </div>
                    </div>
                    <div class="right-part">
                             <div class="radio">
                                <input id="less_than_250" name="drivers-weight" type="radio" value="less_than_250" checked>
                                <label for="less_than_250" class="radio-label"><?php esc_attr_e( 'Less than 250', $this->plugin_name  ); ?></label>
                            </div>

                             <div class="radio">
                                <input id="from_251_350" name="drivers-weight" type="radio" value="from_251_350"  >
                                <label for="from_251_350" class="radio-label"><?php esc_attr_e('251- 350', $this->plugin_name  ); ?></label>
                            </div>

                             <div class="radio">
                                <input id="from_351_400" name="drivers-weight" type="radio" value="from_351_400"  >
                                <label for="from_351_400" class="radio-label"><?php esc_attr_e( '351-400' , $this->plugin_name  ); ?></label>
                            </div>

                             <div class="radio">
                                <input id="more_than_400_lbs" name="drivers-weight" type="radio" value="more_than_400_lbs"  >
                                <label for="more_than_400_lbs" class="radio-label"><?php esc_attr_e( 'More than 400 lbs' , $this->plugin_name  ); ?></label>
                            </div>
 
                    </div>
                </div>

                 <div class="form-section">
                    <div class="left-part">
                        <h2>Driver's Height Range</h2>
                        <div class="description">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus quos veritatis similique sapiente perspiciatis enim vero sit officiis. Corrupti laborum                                        
                        </div>
                    </div>
                    <div class="right-part">

                        <div class="radio">
                            <input id="less_5_ft" name="drivers-height-range" type="radio" value="less_5_ft"  checked>
                            <label for="less_5_ft" class="radio-label"><?php esc_attr_e( 'Less 5 ft' , $this->plugin_name  ); ?></label>
                        </div>

                        <div class="radio">
                            <input id="from_5ft_5_5ft" name="drivers-height-range" type="radio" value="from_5ft_5_5ft"  >
                            <label for="from_5ft_5_5ft" class="radio-label"><?php esc_attr_e( '5 ft- 5.5 ft', $this->plugin_name  ); ?></label>
                        </div>

                        <div class="radio">
                            <input id="from_5_5ft_6ft" name="drivers-height-range" type="radio" value="from_5_5ft_6ft"  >
                            <label for="from_5_5ft_6ft" class="radio-label"><?php esc_attr_e('5.5 ft - 6 ft', $this->plugin_name  ); ?></label>
                        </div>

                        <div class="radio">
                            <input id="from_6ft_6_5ft" name="drivers-height-range" type="radio" value="from_6ft_6_5ft"  >
                            <label for="from_6ft_6_5ft" class="radio-label"><?php esc_attr_e('6 ft- 6.5 ft', $this->plugin_name  ); ?></label>
                        </div>

                        <div class="radio">
                            <input id="more_than_6_5ft" name="drivers-height-range" type="radio" value="from_6ft_6_5ft"  >
                            <label for="more_than_6_5ft" class="radio-label"><?php esc_attr_e('More than 6.5ft', $this->plugin_name  ); ?></label>
                        </div>

                    </div>
                </div>

                <div class="form-section">
                    <div class="left-part">

                        <h2>Suspension</h2>
                        <div class="description">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus quos veritatis similique sapiente perspiciatis enim vero sit officiis. Corrupti laborum                                        
                        </div>
                    </div>
                    <div class="right-part">
                        <div class="radio">
                            <input id="suspension-yes" name="suspension" type="radio" value="1"  checked>
                            <label for="suspension-yes" class="radio-label"><?php esc_attr_e( 'Yes' , $this->plugin_name  ); ?></label>
                        </div>

                        <div class="radio">
                            <input id="suspension-no" name="suspension" type="radio" value="0"  checked>
                            <label for="suspension-no" class="radio-label"><?php esc_attr_e( 'No' , $this->plugin_name  ); ?></label>
                        </div>

                    </div>
                </div>


                 <div class="form-section">
                    <div class="left-part">
                        <h2>Driver's Information</h2>
                        <div class="description">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus quos veritatis similique sapiente perspiciatis enim vero sit officiis. Corrupti laborum                                      
                        </div>
                    </div>
                    <div class="right-part">
                            <input type="text" name="respondent-name" value="" size="40"   id="respondent-name"  placeholder="Enter Your Name">
                            <br>
                            <input type="email" name="respondent-email" value="" size="40"   id="respondent-email" placeholder="Enter Email Address">
                           <br>
                            <input type="tel" name="respondent-phone" value="" size="40"  id="respondent-phone"  placeholder="Enter Phone Number">
                            <p>
                                Would you like us to give you a call back?
                            </p>
                            <div class="radio horizontal-radio">
                                <input id="consent-yes" name="consent" type="radio" value="1"  checked>
                                <label for="consent-yes" class="radio-label"><?php esc_attr_e( 'Yes please' , $this->plugin_name  ); ?></label>
                            </div>

                            <div class="radio horizontal-radio">
                                <input id="consent-no" name="consent" type="radio" value="0"  checked>
                                <label for="consent-no" class="radio-label"><?php esc_attr_e( 'No thank you' , $this->plugin_name  ); ?></label>
                            </div>
                        </div>
                    
                   

                </div>

                





                <div class="form-bottom">
                    <button type="submit" class="submit-btn" value="Get Recommendation" name="submit">Get Recommendation</button>
                </div>

            
            </form>
           
            <?php endif;?>

		</div>

