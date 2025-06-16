<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Invoice - TURTLE'S</title>
  <!-- Favicons -->
  <link href="/assets/img/logo-turtles.png" rel="icon">
  <link href="/assets/img/logo-turtles.png" rel="apple-touch-icon">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Open+Sans&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
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

    .wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
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
      margin: 30px 0 30px 0;
    }

    .header {
      text-align: center;
      font-family: 'Playfair Display', sans-serif;
      color: #ffcc66;
      font-size: 34px;
      margin-bottom: 5px;
    }

    .sub-header {
      font-family: 'Poppins', sans-serif;
      text-align: center;
      font-size: 17px;
      font-style: italic;
      margin-bottom: 30px;
      color: #ccc;
    }

    .info-columns {
      display: flex;
      gap: 20px;
      align-items: stretch;
      margin: 0 20px 30px 20px;
      justify-content: center;
      font-family: 'Poppins', sans-serif;
      font-size: 15px;
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
      width: 120px;
      font-weight: bold;
      color: #eee;
      text-align: left;
    }

    .colon {
      width: 10px;
      text-align: center;
      font-weight: bold;
      color: #eee;
      margin-right: 3px;
    }

    .value {
      flex: 1;
      color: #ccc;
      text-align: left;
    }

    table {
      font-family: 'Poppins', sans-serif;
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
      font-size: 14px;
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
      font-family: 'Poppins', sans-serif;
      text-align: right;
      font-size: 17px;
      color: #ffcc66;
      font-weight: bold;
      margin-top: 5px;
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
        padding: 20px 24px;
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
        z-index: 1;
        padding: 0 12px;
      }

      #invoice-area {
        width: 100%;
        height: auto;
      }
    }

    /*------------------
    # Alert
    ------------------*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Cormorant+Garamond:wght@400;600&display=swap');

    .poppins-alert {
      font-family: 'Poppins', sans-serif !important;
      font-size: 15px !important;
    }

    .cormorant-alert {
      font-family: 'Cormorant Garamond', serif !important;
      font-size: 35px !important;
    }
    
    /*------------------
    # Preloader
    ------------------*/
    #preloader {
      position: fixed;
      inset: 0;
      z-index: 999999;
      overflow: hidden;
      background: #0c0b09;
      transition: all 0.6s ease-out;
    }

    #preloader:before {
      content: "";
      position: fixed;
      top: calc(50% - 30px);
      left: calc(50% - 30px);
      border: 6px solid #ffffff;
      border-color: #cda45e transparent #cda45e transparent;
      border-radius: 50%;
      width: 50px;
      height: 50px;
      animation: animate-preloader 1.2s linear infinite;
    }

    @keyframes animate-preloader {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body>
  <!-- Preloader -->
  <div id="preloader"></div>
  
  <!-- Content -->
  <div class="wrapper" id="capture-area">
  <div class="invoice-container" id="invoice-area">
    <div class="header">TURTLE’S INVOICE</div>
    <div class="sub-header">Eat, Feel, and Fall in Love with Indonesian Flavor</div>

    <div class="info-columns">
      <div class="info-group">
        <div class="info-row">
          <div class="label">Name</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['name'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">Email</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['email'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">Phone Number</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['phone'] }}</div>
        </div>
      </div>

      <div class="vertical-line"></div>

      <div class="info-group">
        <div class="info-row">
          <div class="label">Date</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['date'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">Time</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['time'] }}</div>
        </div>
        <div class="info-row">
          <div class="label">People</div>
          <div class="colon">:</div>
          <div class="value">{{ $booking['people'] }}</div>
        </div>
      </div>
    </div>

    <table>
      <thead>
        <tr>
          <th>Item</th>
          <th>Qty</th>
          <th>Price</th>
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
      Total :&nbsp;Rp{{ number_format($total, 0, ',', '.') }}
    </div>

    <div style="text-align: center; margin-top: 25px;">
      <form method="POST" action="{{ route('invoice.confirm') }}">
        @csrf
       <button type="button" class="btn-print" id="confirm-and-download">DOWNLOAD INVOICE</button>
      </form>
    </div>
  </div>
  </div>

  <!-- Print pdf Invoice -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
 
  <script>
  document.getElementById("confirm-and-download").addEventListener("click", function () {
  const { jsPDF } = window.jspdf;

  html2canvas(document.querySelector("#invoice-area"), {
    scale: 2,
    useCORS: true,
    windowWidth: document.querySelector("#invoice-area").scrollWidth,
    windowHeight: document.querySelector("#invoice-area").scrollHeight,
  }).then(function (canvas) {
    const imgData = canvas.toDataURL("image/png");

    const canvasWidth = canvas.width * 0.264583;  // px to mm
    const canvasHeight = canvas.height * 0.264583;

    const pdf = new jsPDF({
      orientation: canvasWidth > canvasHeight ? "landscape" : "portrait",
      unit: "mm",
      format: [canvasWidth, canvasHeight],
    });

    const pageWidth = pdf.internal.pageSize.getWidth();
    const pageHeight = pdf.internal.pageSize.getHeight();

    const imgProps = pdf.getImageProperties(imgData);
    const maxWidth = pageWidth * 0.97;
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

  <!-- Preloader dan Alert -->
  <script>
  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(request()->has('confirm'))
  <script>
      Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: 'Reservation confirmed. Order received. See you soon!',
          showConfirmButton: true,
          // confirmButtonText: 'OK',
          width: '400px',
          customClass: {
              title: 'cormorant-alert',
              popup: 'poppins-alert'
          }
      });
  </script>
  @endif
</body>

</html>
