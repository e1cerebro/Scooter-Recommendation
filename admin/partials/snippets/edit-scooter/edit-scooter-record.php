<?php 
   
    //Get all the data that were posted by the post request and sanitize them.
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

    //Update the scooter Record
    $query =  $wpdb->update(
                    $table,
                    array(
                        'at_home'               =>     $at_home,
                        'around_town'           =>     $around_town,
                        'traveling_portable'    =>     $traveling_portable,
                        'all_terrain'           =>     $all_terrain,
                        'ramp'                  =>     $ramp,
                        'elevator'              =>     $elevator,
                        'verticle_lift'         =>     $verticle_lift,
                        'stairs'                =>     $stairs,
                        'less_than_250'         =>     $less_than_250,
                        'from_251_350'          =>     $from_251_to_350,
                        'from_351_400'          =>     $from_351_to_400,
                        'more_than_400_lbs'     =>     $more_than_400_lbs,
                        'less_5_ft'             =>     $less_5_ft,
                        'from_5ft_5_5ft'        =>     $from_5ft_5_5ft,
                        'from_5_5ft_6ft'        =>     $from_5_5ft_6ft,
                        'from_6ft_6_5ft'        =>     $from_6ft_6_5ft,
                        'more_than_6_5ft'       =>     $more_than_6_5ft,
                        'suspension'            =>     $suspension,
                    ),
                    array( 'product_id'         =>     intval($product_id) ),
                    //array( '%s' ),
                    array( '%d' )
                );

            //Configure the redirect link
            $view_path = "admin.php?page=scooter-recommendation-view";
            $link = "{$view_path}&scooter_id={$product_id}&status=saved";
            
            wp_redirect( admin_url($link), 301 );
            exit;

            $wpdb->flush();