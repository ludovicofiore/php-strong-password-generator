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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container-fluid">
    <div class="col-12 text-center mb-5">
        <h1>Strong Password Generator</h1>
    </div>

    <div class="row justify-content-center">
        <div class="col-8 text-center border border-primary">
            <h3><?php echo $message ?></h3>
        </div>

        <div class="col-8 border border-dark">

            <form action="index.php" method="get">
                <!-- filtri -->
                <div class="col-12 p-5">
                    <label for="numero-caratteri">Lunghezza password:</label>

                    <input type="number" id="numero-caratteri" name="numero-caratteri" min="0" max="100" />
                </div>

                <!-- bottoni -->
                <div class="col-5 p-4">
                    <button type="submit" class="btn btn-primary">Crea</button>
                    <button type="reset" class="btn btn-secondary">Annulla</button>
                </div>

            </form>
            
        </div>

    </div>
</div>
   



<!-- script bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>