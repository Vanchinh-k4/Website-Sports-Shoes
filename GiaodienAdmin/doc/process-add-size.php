<?php 
session_start();

    $selectedSizes = isset($_POST['selectedSize']) ? $_POST['selectedSize'] : null;
    $quantities = isset($_POST['enterquantity']) ? $_POST['enterquantity'] : null;
    
    $decodedSelectedSizes = array_map('intval', $_POST['selectedSize']);
    $decodedQuantities = array_map('intval', $_POST['enterquantity']);
    
    var_dump($decodedSelectedSizes);
    var_dump($decodedQuantities);
    $_SESSION['temp_selectedSizes'] = $decodedSelectedSizes;
    $_SESSION['temp_quantities'] = $decodedQuantities;
?>