<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Invoice | TURTLE'S</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Open Sans', sans-serif;
      background: url('/assets/img/foto1.png') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      color: #fff;
      position: relative;
      
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 0;
    }

    .invoice-container {
      position: relative;
      width: 100%;
      max-width: 800px;
      background: rgba(20, 20, 20, 0.9);
      padding: 20px 40px;
      border-radius: 16px;
      box-shadow: 0 0 15px rgba(255, 204, 102, 0.3);
      z-index: 1;
    }

    .header {
      text-align: center;
      font-family: 'Playfair Display', serif;
      color: #ffcc66;
      font-size: 34px;
      margin-bottom: 5px;
    }

    .sub-header {
      text-align: center;
      font-size: 15px;
      margin-bottom: 30px;
      color: #ccc;
    }

    .info-columns {
      display: flex;
      gap: 20px;
      align-items: stretch;
      margin-bottom: 30px;
      justify-content: center;
    }

    .info-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
      flex: 1;
    }

    .info-row {
      display: flex;
      align-items: baseline;
      justify-content: center;
    }

    .label {
      width: 130px;
      font-weight: bold;
      color: #eee;
      text-align: left;
      margin-left: 60px;
    }

    .colon {
      width: 10px;
      text-align: center;
      font-weight: bold;
      color: #eee;
    }

    .value {
      flex: 1;
      color: #ccc;
      text-align: left;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      font-size: 15px;
    }

    th,
    td {
      padding: 8px 10px;
      border: 1px solid #555;
      text-align: center;
    }

    th {
      background-color: rgba(255, 204, 102, 0.1);
      color: #ffcc66;
    }

    .total {
      text-align: right;
      font-size: 17px;
      color: #ffcc66;
      font-weight: bold;
      margin-top: 5px;
      padding-right: 10px;
    }

    .btn-print {
      display: inline-block;
      padding: 10px 25px;
      font-size: 16px;
      font-weight: bold;
      color: #ffcc66;
      border: 2px dashed #ffcc66;
      background: transparent;
      text-decoration: none;
      border-radius: 50px;
      transition: 0.3s ease;
      cursor: pointer;
    }

    .btn-print:hover {
      background: #ffcc66;
      color: #1a1a1a;
    }

    @media (max-width: 600px) {
      .invoice-container {
        padding: 15px 20px;
      }

      .header {
        font-size: 24px;
      }

      .info-columns {
        flex-direction: column;
      }

      table {
        font-size: 12px;
      }

      .wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      width: 100%;
      /* position: relative; */
      z-index: 1;
      }

      #invoice-area {
      width: 100%;
      height: auto;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper" id="capture-area">
  <div class="invoice-container" id="invoice-area">
    <div class="header">TURTLE'S INVOICE</div>
    <div class="sub-header">Eat, Feel, and Fall in Love with Indonesian Flavor</div>

    <div class="info-columns">
      <div class="info-group">
        <div class="info-row">
          <div class="label">Nama</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['name'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">Email</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['email'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">No. Handphone</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['phone'] }}</div>
        </div>
      </div>

      <div class="vertical-line"></div>

      <div class="info-group">
        <div class="info-row">
          <div class="label">Tanggal</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['date'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">Jam</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['time'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">Jumlah Orang</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['people'] }}</div>
        </div>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Jumlah</th>
          <th>Harga</th>
          <th>Total</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($menus as $item)
        <tr>
          <td style="text-align: left;">{{ $item['name'] }}</td>
          <td>{{ $item['quantity'] }}</td>
          <td>Rp{{ number_format($item['price'], 0, ',', '.') }}</td>
          <td>Rp{{ number_format($item['quantity'] * $item['price'], 0, ',', '.') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="total">
      Total: Rp{{ number_format($total, 0, ',', '.') }}
    </div>

    <div style="text-align: center; margin-top: 25px;">
      <form method="POST" action="{{ route('invoice.confirm') }}">
        @csrf
       <button type="button" class="btn-print" id="confirm-and-download">KONFIRMASI PESANAN</button>
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
 
  <script>
  document.getElementById("confirm-and-download").addEventListener("click", function () {
  const { jsPDF } = window.jspdf;
  const capture = document.getElementById("capture-area");

  html2canvas(document.querySelector("#invoice-area"), {
    scale: 2,
    useCORS: true,
    windowWidth: document.querySelector("#invoice-area").scrollWidth,
    windowHeight: document.querySelector("#invoice-area").scrollHeight,
  }).then(function (canvas) {
    const imgData = canvas.toDataURL("image/png");

    const pdf = new jsPDF('landscape', 'mm', 'a4');
    const pageWidth = pdf.internal.pageSize.getWidth();
    const pageHeight = pdf.internal.pageSize.getHeight();

    const imgProps = pdf.getImageProperties(imgData);
    const maxWidth = pageWidth * 0.96; // beri margin 5% kiri-kanan
    const imgWidth = maxWidth;
    const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

    const x = (pageWidth - imgWidth) / 2;
    const y = (pageHeight - imgHeight) / 2;

    pdf.addImage(imgData, 'PNG', x, y, imgWidth, imgHeight);

    pdf.save("invoice.pdf");

    setTimeout(() => {
        document.querySelector("form").submit();
      }, 500);
  });
});
</script>

</body>

</html>