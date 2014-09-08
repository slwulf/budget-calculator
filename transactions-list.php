<?php 
if ( sizeof($transactions) > 0 ) {
    echo '<ul class="transactions-list">'; ?>

    <li class="transaction-single grid">
        <div class="col-1-4"><strong>Date</strong></div>
        <div class="col-1-2"><strong>Description</strong></div>
        <div class="col-1-4"><strong>Amount</strong></div>
    </li>

    <?php foreach( $transactions as $transaction ) { ?>

    <?php if ( strpos($transaction['date'], $select_month) !== false ) { ?>

        <li class="transaction-single grid">

            <div class="col-1-4">
                <span><?php echo $transaction['date']; ?></span>
            </div>
            <div class="col-1-2">
                <span><?php echo $transaction['category'] .': '. $transaction['description']; ?></span>
            </div>
            <div class="col-1-4">
                <span><?php if ( $transaction['type'] == 'expense' ) { echo '-'; } echo number_format( (float)$transaction['amount'], 2, '.', '' ); ?></span>
            </div>
            
        </li>

    <?php } } ?>

    <li class="transaction-single grid">
        <div class="col-1-2">
            <div class="module"></div>
        </div>
        <div class="col-1-4">
            <span><?php
                echo '<p>Total income:</p>';
                echo '<p>Total expenses:</p>';
                echo '<p>Balance:</p>';
            ?></span>
        </div>
        <div class="col-1-4">
            <span><?php
                echo '<p>$'. number_format((float)$total_income, 2, '.', '') . "</p>";
                echo '<p>-$'. number_format((float)$total_expense, 2, '.', '') . "</p>";
                echo '<p>$'. number_format((float)$total_balance, 2, '.', '') . '</p>';
            ?></span>
        </div>
    </li>

    <?php echo '</ul>';
} else {

    echo 'No transactions found.';
    
} ?>