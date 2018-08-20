<div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <hr/>

           <table class="form-table">
            <tbody>
                <h3 class="text-center text-upper">Scooter Recommendation Form</h3>
                <form method="post" name="scooter_settings" action="options.php">
                    <?php 
                        $options            = get_option($this->plugin_name);

                        $daily_use          = $options['daily_use'];
                        $daily_use_title    = $options['daily_use_title'];
                        $access             = $options['access'];
                        $access_title       = $options['access_title'];
                        $weight_range_title = $options['weight_range_title'];
                        $weight_range       = $options['weight_range'];
                        $height_range       = $options['height_range'];
                        $height_range_title = $options['height_range_title'];
                        $suspension         = $options['suspension'];
                        $suspension_title   = $options['suspension_title'];
                        $addition_question_title   = $options['addition_question_title'];
                        $addition_question         = $options['addition_question'];
                        $drivers_information_title = $options['drivers_information_title'];
                        $drivers_information       = $options['drivers_information'];

                        settings_fields($this->plugin_name);
                        do_settings_sections($this->plugin_name);
                    ?>
                    <tr>

                        <th scope="row">
                            <h3><?php _e('Daily Use',$this->plugin_name); ?></h3>   
                        </th>
                        <td>
                            <legend class="screen-reader-text"><span><?php _e('Daily Use',$this->plugin_name); ?></span></legend>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name; ?>[daily_use_title]" value="<?php if(!empty($daily_use_title)) echo $daily_use_title; ?>" />
                            <textarea class="settings-textarea" placeholder="Section Description"  name="<?php echo $this->plugin_name; ?>[daily_use]"><?php if(!empty($daily_use)) echo $daily_use;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Daily Use</p>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <h3><?php _e('Access',$this->plugin_name); ?></h3>
                        </th>
                        <td>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name; ?>[access_title]" value="<?php if(!empty($access_title)) echo $access_title; ?>" />
                            <legend class="screen-reader-text"><span><?php _e('Access',$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea" placeholder="Section Description"  name="<?php echo $this->plugin_name; ?>[access]"><?php if(!empty($access)) echo $access;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Access</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <h3> <?php _e("Driver's Weight Range",$this->plugin_name); ?></h3>
                        </th>
                        <td>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name; ?>[weight_range_title]" value="<?php if(!empty($weight_range_title)) echo $weight_range_title; ?>" />
                            <legend class="screen-reader-text"><span><?php _e("Driver's Weight Range",$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea" placeholder="Section Description" name="<?php echo $this->plugin_name; ?>[weight_range]"><?php if(!empty($weight_range)) echo $weight_range;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Driver's Weight Range</p>
                        
                        </td>
                    </tr>
                    
                    <tr>
                        <th scope="row">
                        <h3> <?php _e("Driver's Height Range",$this->plugin_name); ?></h3>
                        </th>
                        <td>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name; ?>[height_range_title]" value="<?php if(!empty($height_range_title)) echo $height_range_title; ?>" />
                            <legend class="screen-reader-text"><span><?php _e("Driver's Height Range",$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea"  name="<?php echo $this->plugin_name; ?>[height_range]"><?php if(!empty($height_range)) echo $height_range;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Driver's Height Range</p>
                        </td>
                    </tr>


                    <tr>
                        <th scope="row">
                        <h3> <?php _e('Suspension',$this->plugin_name); ?></h3>
                        </th>
                        <td>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name; ?>[suspension_title]" value="<?php if(!empty($suspension_title)) echo $suspension_title; ?>" />
                            <legend class="screen-reader-text"><span><?php _e('Suspension',$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea"  name="<?php echo $this->plugin_name; ?>[suspension]"><?php if(!empty($suspension)) echo $suspension;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Suspension</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                        <h3> <?php _e('Additional Question',$this->plugin_name); ?></h3>
                        </th>
                        <td>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name; ?>[addition_question_title]" value="<?php if(!empty($addition_question_title)) echo $addition_question_title; ?>" />
                            <legend class="screen-reader-text"><span><?php _e('Additional Question',$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea"  name="<?php echo $this->plugin_name; ?>[addition_question]"><?php if(!empty($addition_question)) echo $addition_question;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Additional Questions Section</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                        <h3> <?php _e("Driver's Information",$this->plugin_name); ?></h3>
                        </th>
                        <td>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name; ?>[drivers_information_title]" value="<?php if(!empty($drivers_information_title)) echo $drivers_information_title; ?>" />
                            <legend class="screen-reader-text"><span><?php _e('Additional Question',$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea"  name="<?php echo $this->plugin_name; ?>[drivers_information]"><?php if(!empty($drivers_information)) echo $drivers_information;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Driver's Information Section</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                        </th>
                        <td>
                        <?php submit_button('Save Changes', 'primary','submit', TRUE); ?>

                        </td>
                    </tr>
                 </form>

                     </tbody>
        </table>



        <table class="form-table">
            <tbody>
               
               <h3 class="text-center text-upper">Scooter Recommendation Result Page</h3>

                <form method="post" name="scooter_result_settings" action="options.php">
                    <?php 
                       
                        $options               = get_option($this->plugin_name."-result-page-settings");
                       
                        $result_title          = $options['result_title'];
                        $result_description    = $options['result_description'];
                        $result_not_found      = $options['result_not_found'];
                        
                        settings_fields($this->plugin_name."-result-page-settings");
                        do_settings_sections($this->plugin_name."-result-page-settings");

                    ?>

                    <tr>


                        <th scope="row">
                            <h3><?php _e('Title',$this->plugin_name); ?></h3>   
                        </th>
                        <td>
                            <legend class="screen-reader-text"><span><?php _e('Title',$this->plugin_name); ?></span></legend>
                            <input type="text" placeholder="Section Title" class="regular-text"    name="<?php echo $this->plugin_name."-result-page-settings"; ?>[result_title]" value="<?php if(!empty($result_title)) echo $result_title; ?>" />
                             <p class="description" id="tagline-description">Settings For The Title of the Search Result Page</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <h3><?php _e('Result Description',$this->plugin_name); ?></h3>
                        </th>
                        <td>
                             <legend class="screen-reader-text"><span><?php _e('Result Description',$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea" placeholder="Section Description"  name="<?php echo $this->plugin_name."-result-page-settings"; ?>[result_description]"><?php if(!empty($result_description)) echo $result_description;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Short Description</p>
                        </td>
                    </tr> 


                    <tr>
                        <th scope="row">
                            <h3><?php _e('Result Not Found',$this->plugin_name); ?></h3>
                        </th>
                        <td>
                             <legend class="screen-reader-text"><span><?php _e('Result Not Found',$this->plugin_name); ?></span></legend>
                            <textarea class="settings-textarea" placeholder="Section Description"  name="<?php echo $this->plugin_name."-result-page-settings"; ?>[result_not_found]"><?php if(!empty($result_not_found)) echo $result_not_found;  ?></textarea>
                            <p class="description" id="tagline-description">Settings For Short Description</p>
                        </td>
                    </tr> 
                    <tr>
                        <th scope="row">
                        </th>
                        <td>
                        <?php submit_button('Save Changes', 'primary','submit', TRUE); ?>

                        </td>
                    </tr>
                 </form>

            </tbody>
        </table>

        

</div>