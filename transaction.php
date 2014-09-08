<?php 

require_once 'init.php';

$amount = floatval($_POST['amount']);
$type = ( $amount > 0 ? 'income' : 'expense' );
$amount = ( $amount < 0 ? -$amount : $amount );
$category = $_POST['category'];

if ( $category == 'add-cat' ) $category = $_POST['new-cat'];

$date = ( isset($_POST['date']) ? $_POST['date'] : date('Y-m-d') );

$transactions[] = array(
    'date' => $date,
    'type' => $type,
    'description' => $_POST['description'],
    'category' => $category,
    'amount' => $amount
);

$update = json_encode( $transactions, true );
file_put_contents( 'data.json', $update );

// echo '<pre>'; var_dump($transactions); echo '</pre>';

header('Location: index.php');