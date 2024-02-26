<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');

// print_r($_POST);
// var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    // verificando datos recibidos
    
    // if (isset($_POST['amount']) ) {
    if (isset($_POST['amount']) && isset($_POST['interestRate']) && isset($_POST['paymentTime'])) {
        $amount = $_POST['amount'];
        $interestRate = $_POST['interestRate'];
        $paymentTime = $_POST['paymentTime'];
        // sacamos el porcentaje por mes
        $numberPorcen = $interestRate/100;
        $interestMonth = ($numberPorcen/12);
        
        if (is_numeric($amount) && is_numeric($interestRate) && is_numeric($paymentTime)) {
            $result = ($amount * $interestMonth * pow((1 + $interestMonth), $paymentTime))/(pow((1+$interestMonth),$paymentTime)-1) ;
            // $suma = $amount + $interestRate + $paymentTime;
            
            // Devolvemos el producto como respuesta
            echo json_encode(array('result' =>  round( $result, 2) ));
        } else {
            echo json_encode(array('error' => 'Los datos deben ser numéricos'));
        }
    } else {
        echo json_encode(array('error' => 'Se esperaban tres datos'));
    }
} else {
    echo json_encode(array('error' => 'Se esperaba una solicitud POST'));
}
?>
