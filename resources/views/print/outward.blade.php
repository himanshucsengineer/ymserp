<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .receipt-container {
            display: flex;
            justify-content: space-between;
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
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<button class="no-print" onclick="printPage()">Print Page</button>

    <h2>Bhavani Shipping (I) Pvt Ltd</h2>
    <h2>Outward Receipt</h2>

    <div class="receipt-container">
        <div class="column">
            <table>
                <tr>
                    <th>DO Number</th>
                    <td><?php echo $receipt_data['do_no']?></td>
                </tr>
                <tr>
                    <th>Challan Number</th>
                    <td><?php echo $receipt_data['challan_no']?></td>
                </tr>
                <tr>
                    <th>Line Name</th>
                    <td><?php echo $receipt_data['line_name']?></td>
                </tr>
                <tr>
                    <th>Transport / Consignee</th>
                    <td><?php echo $receipt_data['transporter']?></td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table>
                <tr>
                    <th>Container Type</th>
                    <td><?php echo $receipt_data['container_type']?></td>
                </tr>
                <tr>
                    <th>Container Size</th>
                    <td><?php echo $receipt_data['container_size']?></td>
                </tr>
                <tr>
                    <th>Grade</th>
                    <td><?php echo $receipt_data['grade']?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td><?php echo $receipt_data['status']?></td>
                </tr>
                <tr>
                    <th>Container Number</th>
                    <td><?php echo $receipt_data['container_no']?></td>
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
