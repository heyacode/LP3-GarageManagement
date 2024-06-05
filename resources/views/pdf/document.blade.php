<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice :{{ $invoice->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            width: 100%;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
            border-collapse: collapse;
        }
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <h1>Facture</h1>
                            </td>
                            <td>
                                Invoice : {{ $invoice->id }}<br>
                                Created: {{ $invoice->date->format('d/m/Y') }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Client ID: {{ $invoice->client_id }}<br>
                                Client FullName: {{ $invoice->client->firstname?.' '.$invoice->client->lastname ?? 'Nom non disponible' }}<br>
                            </td>
                            <td>
                                Repair ID: {{ $invoice->repair_id }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Description</td>
                <td>Total Amount</td>
            </tr>
            <tr class="item">
                <td>Repair</td>
                <td>{{ $invoice->totaAmount }} €</td>
            </tr>
            <tr class="total">
                <td></td>
                <td>Total: {{ $invoice->totalAmount }} €</td>
            </tr>
        </table>
    </div>
</body>
</html>
