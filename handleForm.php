<?php
$menu = [
    "Burger" => 50,
    "Fries" => 75,
    "Steak" => 150
];

$order = "";
$quantity = 0;
$cash = 0;
$total_price = 0;
$change = 0;
$timestamp = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order = $_POST['order'];
    $quantity = (int)$_POST['quantity'];
    $cash = (int)$_POST['cash'];

    if (array_key_exists($order, $menu)) {
        $price_per_item = $menu[$order];
        $total_price = $price_per_item * $quantity;
        $change = $cash - $total_price;
    }
    
    date_default_timezone_set('Asia/Manila'); 
    $timestamp = date("m/d/Y h:i:s a");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif; 
        }
        .receipt {
            border: 2px dotted black; 
            padding: 20px 30px;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            font-weight: bold;
            font-size: 36px;
            margin-top: 10px;
            margin-bottom: 40px; 
        }
        .line-item {
            font-size: 32px; 
            font-weight: bold;
            margin-bottom: 15px;
        }
        .timestamp {
            font-size: 32px;
            font-weight: bold;
            font-style: italic; 
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php if ($cash < $total_price): ?>
            <div class="receipt" style="border: 2px dotted red;">
                <p style="font-size: 24px; font-weight: bold;">Sorry, balance not enough.</p>
            </div>
        <?php else: ?>
            <div class="receipt">
                <h1>RECEIPT</h1>
                
                <div class="line-item">
                    Total Price: <?php echo $total_price; ?>
                </div>
                
                <div class="line-item">
                    You Paid: <?php echo $cash; ?>
                </div>
                
                <div class="line-item">
                    CHANGE: <?php echo $change; ?>
                </div>
                
                <div class="timestamp">
                    <?php echo $timestamp; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <p>No order data received. <a href="index.php">Go back</a>.</p>
    <?php endif; ?>

</body>
</html>