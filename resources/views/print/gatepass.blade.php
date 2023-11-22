<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gate Pass</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .gate-pass-container {
            display: flex;
            justify-content: space-between;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .column {
            flex: 1;
            margin-right: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
<button class="no-print" onclick="printPage()">Print Page</button>

    <h2>Gate Pass</h2>

    <div class="gate-pass-container">
        <div class="column">
            <table>
                <tr>
                    <th>Consignee</th>
                    <td><?php echo $gate_pass['transporter']?></td>
                </tr>
                <tr>
                    <th>License Number</th>
                    <td><?php echo $gate_pass['licence_no']?></td>
                </tr>
                <tr>
                    <th>Adhar Card</th>
                    <td><?php echo $gate_pass['aadhar_no']?></td>
                </tr>
                <tr>
                    <th>Line Account or 3rd Party</th>
                    <td><?php echo $gate_pass['line_name']?></td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table>
                <tr>
                    <th>Shipper</th>
                    <td><?php echo $gate_pass['shippers']?></td>
                </tr>
                
                <tr>
                    <th>Pan Card</th>
                    <td><?php echo $gate_pass['pan_no']?></td>
                </tr>
                <tr>
                    <th>Seal Number</th>
                    <td><?php echo $gate_pass['seal_no']?></td>
                </tr>
            </table>
        </div>
    </div>
    <script>
    function printPage() {
            // Hide the button before printing
            document.querySelector('.no-print').style.display = 'none';

            // Print the page
            window.print();

            // Show the button after printing
            document.querySelector('.no-print').style.display = 'block';
        }
    </script>
</body>
</html>
