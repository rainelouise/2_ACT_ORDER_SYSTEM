<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order System</title>
</head>
<body>
    <h1>Menu</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Order</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Burger</td>
                <td>50</td>
            </tr>
            <tr>
                <td>Fries</td>
                <td>75</td>
            </tr>
            <tr>
                <td>Steak</td>
                <td>150</td>
            </tr>
        </tbody>
    </table><br>

    <form method="post">
        <label for="order">Select an order:</label>
        <select name="order">
            <option value="Burger">Burger</option>
            <option value="Fries">Fries</option>
            <option value="Steak">Steak</option>
        </select><br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" min="1" required><br><br>

        <label for="cash">Cash:</label>
        <input type="number" name="cash" min="0" step="0.01" required><br><br>

        <input type="submit" value="Submit">
    </form>

</body>
</html>

<?php

$burger = 50;
$fries = 75;
$steak = 150;

if (isset($_POST["quantity"], $_POST["cash"])) {
    if ($_POST["order"] == "Burger") {
        $orderPrice = $burger;
    } elseif ($_POST["order"] == "Fries") {
        $orderPrice = $fries;
    } elseif ($_POST["order"] == "Steak") {
        $orderPrice = $steak;
    }

    $quantity = (int)$_POST["quantity"];
    $cash = (float)$_POST["cash"];
    $total_cost = $orderPrice * $quantity;
    $change = $cash - $total_cost;

    if ($total_cost <= $cash) {
        header("Location: orderReceipt.php?total_price=$total_cost&cash=$cash&change=$change");
    } else {
        $message = urlencode("Sorry, balance not enough.");
        header("Location: orderReceipt.php?message=$message");
    }

    exit(); 
}
?>