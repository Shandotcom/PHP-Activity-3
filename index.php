<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order System</title>
    <style>

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 20px;
        }
        
        table {
            width: 280px; 
            border-collapse: separate;
            border-spacing: 2px;
            margin-bottom: 20px;
            border: 1px solid black;
        }
        th, td {
            border: 1px solid black;
            padding: 3px 10px;
            text-align: left;
        }
        th {
            text-align: center;
            font-weight: bold;
        }
        
        .form-group {
            margin-bottom: 15px;
        }

        select {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            width: 85px; 
        }

        input[type="number"] {
            font-family: Arial, Helvetica, sans-serif; /* Changed to Arial */
            font-size: 18px;
            width: 220px; 
            margin-left: 5px;
        }

        input[type="submit"] {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            padding: 3px 10px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h1>Menu</h1>

    <table>
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
    </table>

    <form action="handleForm.php" method="POST">
        
        <div class="form-group">
            Select an order 
            <select name="order" id="order">
                <option value="Burger">Burger</option>
                <option value="Fries">Fries</option>
                <option value="Steak">Steak</option>
            </select>
        </div>

        <div class="form-group">
            Quantity 
            <input type="number" name="quantity" id="quantity" required min="1">
        </div>

        <div class="form-group">
            Cash 
            <input type="number" name="cash" id="cash" required min="0">
        </div>

        <input type="submit" value="Submit">
    </form>

</body>
</html>