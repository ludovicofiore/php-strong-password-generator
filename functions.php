<?php 
// Array delle lettere maiuscole
$maiuscole = range('A', 'Z');

// Array delle lettere minuscole
$minuscole = range('a', 'z');

// Unione dei due array
$alfabeto = array_merge($maiuscole, $minuscole);

// var_dump($alfabeto);

// Array dei numeri 
$numeri = range(0,9);
// var_dump($numeri)

// array per caratteri speciali
$caratteri_speciali = ['!', '?', '&', '%', '$', '<', '>', '^', '+', '-', '*', '/', '(', ')', '[', ']', '{', '}', '@', '#', '_', '='];
// var_dump($caratteri_speciali)

// array con tutti i caratteri 
$array_totale = array_merge($alfabeto, $numeri, $caratteri_speciali);
// var_dump($array_totale)

// numero caratteri da usare 
$password_len = $_GET['numero-caratteri'];


// funzione per generare password
function generator($array, $len) {
    
    // con array rand prendo le chiavi
    $random_keys = array_rand($array, $len);

    $password_array = [];
    // prendo un valore per ogni chiave e lo pusho in array vuoto
    foreach ($random_keys as $key) {
        $password_array[] = $array[$key];
    };
    
    // converto l'array in stringa
    $password = implode('', $password_array);
    return $password;
};


if(isset($_GET['numero-caratteri']) && !empty($_GET['numero-caratteri'])) {
    $generated_password = generator($array_totale, $password_len);
    // var_dump($generated_password);
};


// controllo per messaggio
if($password_len < 8 || $password_len > 32) {
    $message = 'ERRORE! La lunghezza deve essere tra 8 e 32 caratteri';
}else {
    $message = $generated_password;
}



?>