<?php

/* Init for transactions data */
$transactions = file_get_contents('data.json');
$transactions = json_decode($transactions, true);

foreach ( $transactions as $data ) {

    $amt = ( $data['type'] == 'income' ? $data['amount'] : -$data['amount'] );
    if ( $data['type'] == 'income' ) $income[] = $data['amount'];
    if ( $data['type'] == 'expense' ) $expense[] = $data['amount'];

    $cat = $data['category'];
    $cats[] = $cat;
    $cats_count[ $cat ] = $cats_count[ $cat ] + 1;
    $cats_amount[ $cat ] = (float)$cats_amount[ $cat ] + (float)$amt;

    $month = explode( '-', $data['date'] );
    $months[] = $month[0] .'-'. $month[1];

}

if ( sizeof($cats) > 0 ) $cats = array_unique($cats);
if ( sizeof($months) > 0 ) $months = array_unique($months);

$total_income = array_sum($income);
$total_expense = array_sum($expense);
$total_balance = $total_income - $total_expense;

/* Init for budget data */
$budget = file_get_contents('budget.json');
$budget = json_decode($budget, true);

?>