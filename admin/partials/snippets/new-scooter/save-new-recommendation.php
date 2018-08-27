<?php 

        // run validation if you're not doing it in js
        global $wpdb;

        //Configure the table prefix
        $table = $wpdb->prefix . "scooter_recommendation";


        //Get all the data that were posted by the post request and sanitize them.
        $product_url            =   sanitize_url($_POST['product_url']);
        $product_id             =   filter_var($_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
        $at_home                =   filter_var($_POST['at_home'], FILTER_SANITIZE_NUMBER_INT);
        $around_town            =   filter_var($_POST['around_town'], FILTER_SANITIZE_NUMBER_INT);
        $traveling_portable     =   filter_var($_POST['traveling_portable'], FILTER_SANITIZE_NUMBER_INT);
        $all_terrain            =   filter_var($_POST['all_terrain'], FILTER_SANITIZE_NUMBER_INT);
        $ramp                   =   filter_var($_POST['ramp'], FILTER_SANITIZE_NUMBER_INT);
        $elevator               =   filter_var($_POST['elevator'], FILTER_SANITIZE_NUMBER_INT);
        $verticle_lift          =   filter_var($_POST['verticle_lift'], FILTER_SANITIZE_NUMBER_INT);
        $stairs                 =   filter_var($_POST['stairs'], FILTER_SANITIZE_NUMBER_INT);
        $less_than_250          =   filter_var($_POST['less_than_250'], FILTER_SANITIZE_NUMBER_INT);
        $from_251_to_350        =   filter_var($_POST['from_251_350'], FILTER_SANITIZE_NUMBER_INT);
        $from_351_to_400        =   filter_var($_POST['from_351_400'], FILTER_SANITIZE_NUMBER_INT);
        $more_than_400_lbs      =   filter_var($_POST['more_than_400_lbs'], FILTER_SANITIZE_NUMBER_INT);
        $less_5_ft              =   filter_var($_POST['less_5_ft'], FILTER_SANITIZE_NUMBER_INT);
        $from_5ft_5_5ft         =   filter_var($_POST['from_5ft_5_5ft'], FILTER_SANITIZE_NUMBER_INT);
        $from_5_5ft_6ft         =   filter_var($_POST['from_5_5ft_6ft'], FILTER_SANITIZE_NUMBER_INT);
        $from_6ft_6_5ft         =   filter_var($_POST['from_6ft_6_5ft'], FILTER_SANITIZE_NUMBER_INT);
        $more_than_6_5ft        =   filter_var($_POST['more_than_6_5ft'], FILTER_SANITIZE_NUMBER_INT);
        $suspension             =   filter_var($_POST['suspension'], FILTER_SANITIZE_NUMBER_INT);


        //Check if the scooter already exists in the database
        $scooter_exists = $wpdb->get_results( "SELECT * FROM $table WHERE `product_id` = $product_id" );
      
        $wpdb->flush();

        //if exists - update the record
        if($scooter_exists){

                $query =  $wpdb->update(
                    $table,
                    array(
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
                    ),
                    array( 'product_id' => intval($product_id) ),
                    //array( '%s' ),
                    array( '%d' )
                );

                $wpdb->flush();

                $view_path = 'admin.php?page=new-scooter-recommendation';
                 
                wp_redirect( admin_url($view_path), 301 );
                
                exit;

        //else - create a new record
        }else{ 

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

                if(false == $query) {
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