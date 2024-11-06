<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .invoice-container {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #000;
            padding: 20px;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
        }

        .invoice-header h2 {
            margin: 0;
        }

        .invoice-details {
            margin-top: 20px;
        }

        .invoice-details, .invoice-table, .total-section {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-details th, .invoice-details td, .invoice-table th, .invoice-table td {
            padding: 8px;
            border: 1px solid #000;
        }

        .invoice-table th {
            background-color: #f2f2f2;
        }

        .total-section td {
            border: none;
        }

        .total-section td.total-label {
            text-align: right;
            font-weight: bold;
        }

        .total-section td.total-amount {
            text-align: right;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 12px;
        }

    </style>
</head>
<body>

<div class="invoice-container">
<p align="center">Original Bill</p><hr>
    <div class="invoice-header">
        @if (isset($BillData))
        @foreach ($BillData->all() as $all )
        <div>
            <h2><img src="banner/cover/walk.png" alt=""></h2>
            <p><strong>Order ID:</strong>{{ $all->Order_id}}</p>
            <p><strong>Order Date:</strong>{{$all->Order_date}}</p>
            <p><strong>Invoice Date:</strong> {{$all->Order_date}}</p>
            <p><strong>PAN:</strong> AAHCS7535A</p>
        </div><br><br>
        <div>
            <p><strong>Bill To:</strong>{{$all->Name}}</p>
            <p>{{$all->Address}},</p>
            <p>{{$all->City}}, {{$all->Pin}}{{ $all->State}}</p>
            <p>Phone: xxxxxxxxxx</p>
        </div><br><br>
        <div>
            <p><strong>Ship To:</strong> {{$all->Name}}</p>
            <p>{{$all->Address}},</p>
            <p>{{$all->City}}, {{$all->Pin}}{{ $all->State}}</p>
            <p>Phone: xxxxxxxxxx</p>
        </div>
    </div>

    <table class="invoice-details">
        <thead>
            <tr>
                <th>Product</th>
                <th>Title</th>
                <th>Qty</th>
                <th>Gross Amount +Ship ₹</th>
                
                <th>Taxable Value ₹</th>
              
                <th>Total ₹</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Shoe</td>
                <td>{{$all->P_name}}</td>
                <td>{{$all->P_qty}}</td>
                <td>{{$all->P_price}}</td>
                <td>0.00</td>
                <td>{{$all->P_price}}</td>
                
                
            </tr>
            
        </tbody>
    </table>

    <table class="total-section">
        <tr>
            <td colspan="8" class="total-label">Total:</td>
            <td class="total-amount">{{$all->P_price}}</td>
        </tr>
        <tr>
            <td colspan="8" class="total-label"><strong>Grand Total ₹:</strong></td>
            <td class="total-amount"><strong>{{$all->P_price}}</strong></td>
        </tr>
    </table>


        @endforeach
        
        @endif
        
    <p class="footer">Authorized Signatory</p>
    <h3 align="center">Walk & Wear pvt ltd.</h3>
</div><br>
<center><button id="download-btn">Download Bill</button></center>
<script>
    document.getElementById('download-btn').addEventListener('click', () => {
        const invoiceContainer = document.querySelector('.invoice-container');
        html2canvas(invoiceContainer, { scale: 2 }).then((canvas) => {
            const { jsPDF } = window.jspdf;
            const pdf = new jsPDF('p', 'pt', 'a4');
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = pdf.internal.pageSize.getHeight();
            const canvasWidth = canvas.width;
            const canvasHeight = canvas.height;
            const ratio = Math.min(pdfWidth / canvasWidth, pdfHeight / canvasHeight);

            pdf.addImage(canvas, 'JPEG', 0, 0, canvasWidth * ratio, canvasHeight * ratio);
            pdf.save('invoice.pdf');
        });
    });
</script>
</body>
</html>
