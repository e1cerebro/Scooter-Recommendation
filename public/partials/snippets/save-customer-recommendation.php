<?php 

        

        // run validation if you're not doing it in js
        global $wpdb;

        //Configure the table prefix
        $table = $wpdb->prefix . "scooter_recommendation_submissions";


        //Get all the data that were posted by the post request. 
        $at_home                =   $_POST['at_home'];
        $around_town            =   $_POST['around_town'];
        $traveling_portable     =   $_POST['traveling_portable'];
        $all_terrain            =   $_POST['all_terrain'];
        $ramp                   =   $_POST['ramp'];
        $elevator               =   $_POST['elevator'];
        $verticle_lift          =   $_POST['verticle_lift'];
        $stairs                 =   $_POST['stairs'];
        $drivers_height_range   =   $_POST['drivers-height-range'];
        $drivers_weight         =   $_POST['drivers-weight'];
        $suspension             =   $_POST['suspension'];
        $drivers_name           =   $_POST['drivers-name'];
        $drivers_email          =   $_POST['drivers-email'];
        $drivers_phone          =   $_POST['drivers-phone'];
        $consent                =   $_POST['consent'];   
        $custom_suggestion      =   $_POST['additional-recommendation'];   

        $wpdb->flush();


        //Build the insert query arguments
        $args = array(

            'at_home'               =>  $at_home,
            'around_town'           =>  $around_town,
            'traveling_portable'    =>  $traveling_portable,
            'all_terrain'           =>  $all_terrain,
            'ramp'                  =>  $ramp,
            'elevator'              =>  $elevator,
            'vertical_lift'         =>  $verticle_lift,
            'stairs'                =>  $stairs,
            'suspension'            =>  $suspension,
            'height_range'          =>  $drivers_height_range ,
            'weight_range'          =>  $drivers_weight,
            'drivers_name'          =>  $drivers_name,
            'drivers_email'         =>  $drivers_email,
            'drivers_phone'         =>  $drivers_phone,
            'drivers_consent'       =>  $consent ,
            'custom_suggestion'     =>  $custom_suggestion,
            'date_submitted'        => date('Y-m-d')

        );

        //Insert the new data
        $query = $wpdb->insert($table, $args);

        $wpdb->flush();

        if($query == false) {
            echo  "
                    <div id=\"setting-error-settings_updated\" class=\"error settings-error notice is-dismissible\"> 
                        <p><strong>Database Insertion failed.</strong></p>
                        <button type=\"button\" class=\"notice-dismiss\"><span class=\"screen-reader-text\">Dismiss this notice.</span></button>
                    </div>
                ";            

        }
        else{
            echo  "
                    <div id=\"setting-error-settings_updated\" class=\"updated settings-error notice is-dismissible\"> 
                        <p><strong>Settings saved.</strong></p>
                        <button type=\"button\" class=\"notice-dismiss\"><span class=\"screen-reader-text\">Dismiss this notice.</span></button>
                    </div>
                ";
        }



    ?>