<!-- resources/views/pdf/sample.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
         @page {
        margin: 0;
    }

    body {
        margin: 0;
    }
        /* Add your header styles here */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            border-bottom:3px solid #63bf84;
        }

        /* Add your footer styles here */
        .footer {
            text-align: center;
            font-size: 12px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        
    </style>
</head>
<body>
    <div class="header">
        <table  width="100%">
            <tr>
                <td align="left" style="width: 10%;"><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/img/logo-trans.png'))) }}"></td>
                <td align="center" style="width: 80%;"><h3>BHAVANI SHIPPING SERVICES (1) PVT. LTD.</h3> <p>Regd. Office: 601/602/603, V-Times Square, Plot no:- 03 Sector-15, CBD Belapur, Navi Mumbai- 400614</p></td>
                <td align="right" style="width: 10%;"><img src="http://localhost:8000/assets/img/logo_icon.png" width="100%"></td>
            </tr>
        </table>
    </div>

    <h1>{{ $title }}</h1>
    <p>This is a sample PDF.</p>


    <div class="footer">
        Footer Content Goes Here
    </div>
</body>
</html>
