<?php

$total_price = isset($_GET['total_price']) ? $_GET['total_price'] : null;
$cash = isset($_GET['cash']) ? $_GET['cash'] : null;
$change = isset($_GET['change']) ? $_GET['change'] : null;
$message = isset($_GET['message']) ? urldecode($_GET['message']) : null;

$date = date('m/d/Y h:i:s A');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <style>
        .receipt-container {
            padding: 20px;
            width: 50%;
            margin: auto;
        }
        .border-black {
            border: 2px dotted black; 
        }
        .border-red {
            border: 2px dotted red; 
        }
        table {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="receipt-container <?php echo $message ? 'border-red' : 'border-black'; ?>">
        <table align="center" border="0" cellpadding="10">
            <?php if ($message): ?>
                <tr>
                    <td colspan="2" align="center">
                        <strong><?php echo htmlspecialchars($message); ?></strong>
                    </td>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="2" align="center">
                        <h2>RECEIPT</h2>
                    </td>
                </tr>
                <tr>
                    <td><strong>Total Price:</strong></td>
                    <td><?php echo htmlspecialchars($total_price); ?></td>
                </tr>
                <tr>
                    <td><strong>You Paid:</strong></td>
                    <td><?php echo htmlspecialchars($cash); ?></td>
                </tr>
                <tr>
                    <td><strong>CHANGE:</strong></td>
                    <td><?php echo htmlspecialchars($change); ?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <strong><?php echo $date; ?></strong>
                    </td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
