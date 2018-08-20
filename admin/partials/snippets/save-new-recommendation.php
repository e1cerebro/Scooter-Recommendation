<?php 

        // run validation if you're not doing it in js
        global $wpdb;

        //Configure the table prefix
        $table = $wpdb->prefix . "scooter_recommendation";


        //Get all the data that were posted by the post request. 
        $product_url            =   $_POST['product_url'];
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

        //Check if the scooter already exists in the database
        $scooter_exists = $wpdb->get_results( "SELECT * FROM $table WHERE `product_id` = $product_id" );
      
        $wpdb->flush();

        //if exists - update the record
        if($scooter_exists){

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

                $wpdb->flush();

                $view_path = 'admin.php?page=new-scooter-recommendation';
                 
                wp_redirect( admin_url($view_path), 301 );
                
                exit;



        }else{ //else - create a new record

            //Build the insert query arguments
            $args = array(
                'product_id'            =>  $product_id,
                'product_url'           =>  $product_url,
                'at_home'               =>  $at_home,
                'around_town'           =>  $around_town,
                'traveling_portable'    =>  $traveling_portable,
                'all_terrain'           =>  $all_terrain,
                'ramp'                  =>  $ramp,
                'elevator'              =>  $elevator,
                'verticle_lift'         =>  $verticle_lift,
                'stairs'                =>  $stairs,
                'less_than_250'         =>  $less_than_250,
                'from_251_350'          =>  $from_251_to_350,
                'from_351_400'          =>  $from_351_to_400,
                'more_than_400_lbs'     =>  $more_than_400_lbs,
                'less_5_ft'             =>  $less_5_ft,
                'from_5ft_5_5ft'        =>  $from_5ft_5_5ft,
                'from_5_5ft_6ft'        =>  $from_5_5ft_6ft,
                'from_6ft_6_5ft'        =>  $from_6ft_6_5ft,
                'more_than_6_5ft'       =>  $more_than_6_5ft,
                'suspension'            =>  $suspension,
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

        }


    ?>