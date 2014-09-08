<?php
if ( isset($_GET['r']) ) { ?>

<script src="js/chartist.min.js"></script>

<?php
$report = $_GET['r'];

if ( $report == 'expense-categories' ) { ?>

    <h3>Expense Categories</h3>

    <?php foreach ( $cats_amount as $key => $val ) {

        echo '<p><strong>'. $key .': </strong>'. $val .'</p>';

    }

} elseif ( $report == 'category-totals' ) { ?>

    <h3>Category Totals</h3>

    <?php foreach ( $cats_amount as $key => $val ) {

        echo '<div class="grid reports-data"><div class="col-1-2"><strong>'. $key .': </strong></div>';
        echo '<div class="col-1-2">'. ( $val > 0 ? ' $'. $val : '-$'. $val * -1 ) .'</div></div>';

    }

} elseif ( $report == 'budget-report' ) { ?>

    <h3>Budget Report</h3>

    <div class="grid reports-data">
        <div class="col-1-2"><strong>Category</strong></div>
        <div class="col-1-4"><strong>Amt</strong></div>
        <div class="col-1-4"><strong>Rem</strong></div>
    </div>

    <?php foreach ( $budget as $item ) { ?>

        <?php
        $category = key($item);
        $amount = $item[ $category ];
        $spent = $cats_amount[$category];
        $remainder = $amount + $spent;

        $amt_total = $amt_total + $amount;
        $rem_total = $rem_total + $remainder;
        ?>

        <div class="grid reports-data">
            <div class="col-1-2"><?php echo $category; ?></div>
            <div class="col-1-4"><?php echo '$'. number_format((float)$amount, 2, '.', ''); ?></div>
            <div class="col-1-4"><?php echo '$'. number_format((float)$remainder, 2, '.', ''); ?></div>
        </div>

    <?php } ?>

    <div class="grid reports-data" style="border-top: 1px solid black; padding-top: .5em;">
        <div class="col-1-2"><strong>Totals</strong></div>
        <div class="col-1-4"><?php echo '$'. number_format((float)$amt_total, 2, '.', ''); ?></div>
        <div class="col-1-4"><?php echo '$'. number_format((float)$rem_total, 2, '.', ''); ?></div>
    </div>

<?php }

} ?>