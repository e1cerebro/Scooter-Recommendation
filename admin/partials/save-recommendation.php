<?php
    print_r($_POST);
    $newURL = 'wp-admin/admin.php?page=uchenna-scooter-recommendation';
    header('Location: '.$newURL);