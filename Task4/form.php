<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problem 12 - Price & Discount Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 50px auto;
            background: #f0f4f8;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2d3748;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #4a5568;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cbd5e0;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #3182ce;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover { background: #2b6cb0; }
        .result {
            margin-top: 20px;
            padding: 15px;
            background: #ebf8ff;
            border-left: 4px solid #3182ce;
            border-radius: 6px;
        }
        .error {
            margin-top: 20px;
            padding: 15px;
            background: #fff5f5;
            border-left: 4px solid #e53e3e;
            border-radius: 6px;
            color: #c53030;
        }
        .result p { margin: 8px 0; font-size: 15px; }
        .result strong { color: #2b6cb0; }
    </style>
</head>
<body>
<div class="card">
    <h2> Price & Discount Calculator</h2>

    <form method="POST" action="">
        <label>Product Price:</label>
        <input type="text" name="price" placeholder="e.g. 250"
               value="<?= isset($_POST['price']) ? htmlspecialchars($_POST['price']) : '' ?>">

        <label>Quantity :</label>
        <input type="text" name="quantity" placeholder="e.g. 5"
               value="<?= isset($_POST['quantity']) ? htmlspecialchars($_POST['quantity']) : '' ?>">

        <button type="submit">Calculate</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $price    = $_POST['price'];
        $quantity = $_POST['quantity'];

       
        if (!is_numeric($price) || !is_numeric($quantity)) {
            echo '<div class="error"> only number</div>';
        }
       
        elseif ($price < 0 || $quantity < 0) {
            echo '<div class="error">you canot enter negative number!</div>';
        }
        else {
            $price    = (float)$price;
            $quantity = (int)$quantity;
            $total    = $price * $quantity;

          
            if ($total < 1000) {
                $discountRate = 10;
            } else {
                $discountRate = 15;
            }

            $discountAmount = $total * ($discountRate / 100);
            $finalPrice     = $total - $discountAmount;

            echo '
            <div class="result">
                <p><strong>Total before discount:</strong> ' . number_format($total, 2) . ' eg</p>
                <p><strong>Discount rate:</strong> ' . $discountRate . '%</p>
                <p><strong>Discount amount:</strong> ' . number_format($discountAmount, 2) . ' eg</p>
                <p><strong>Total after discount:</strong> ' . number_format($finalPrice, 2) . ' eg</p>
            </div>';
        }
    }
    ?>
</div>
</body>
</html>
