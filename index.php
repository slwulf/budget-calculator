<?php

require_once 'init.php';

$select_month = ( isset($_GET['month']) ? $_GET['month'] : date('Y-m') );

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Budget Tracking App</title>
    <link rel="stylesheet" href="css/global.min.css">
</head>
<body>

<div class="wrapper">

    <h1>Income and Expenses</h1>
    <form action="index.php" class="add-transaction">
        <label for="month">
            <span>Select a month to view: </span>
            <select name="month">
                <?php foreach ($months as $month) {
                    $selected = ( $select_month == $month ? ' selected' : '' );
                    $plain = DateTime::createFromFormat('Y-m', $month)->format('F Y');
                    echo '<option value="'. $month .'"'. $selected .'>'. $plain .'</option>';
                } ?>
            </select>
        </label>

        <button>Select</button>
    </form>

    <?php require_once('transactions-list.php'); ?>

<form action="transaction.php" method="post" class="add-transaction">

    <h2>Add a transaction...</h2>

    <label for="description">
        <span>Description:</span>
        <input type="text" name="description" placeholder="What did you buy?">
    </label>

    <label for="amount">

        <span>Amount: $</span> <input type="text" name="amount" style="width: 75px;">

    </label>

    <label for="category">
        <span>Category: </span>
        <select name="category">
            <option value="add-cat">Add a Category</option>
            <?php sort($cats);
            foreach ( $cats as $cat ) {
                echo '<option value="'. $cat .'">'. $cat .'</option>';
            } ?>
        </select>
    </label>

    <label for="new-cat">
        <input type="text" name="new-cat" placeholder="New category name">
    </label>

    <label for="date">
        <span>Custom date:</span>
        <input type="text" name="date" placeholder="<?php echo date('Y-m-d'); ?>">
    </label>

    <button>Add</button>
    
</form>

<div class="reports">
    <div class="grid">

        <div class="col-1-2">
            <div class="module">

                <h2 id="reports">Generate a report...</h2>
                <ul class="reports-list">
                    <li>
                        <a href="index.php?r=expense-categories#reports">Expense Categories</a>
                    </li>
                    <li>
                        <a href="index.php?r=category-totals#reports">Category Totals</a>
                    </li>
                    <li>
                        <a href="index.php?r=budget-report#reports">Budget Report</a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="col-1-2">
            <div class="module">
                
                <?php require_once('reports.php'); ?>

            </div>
        </div>
        
    </div>
</div>

</div>

<link rel="stylesheet" href="css/chartist.min.css">
</body>
</html>