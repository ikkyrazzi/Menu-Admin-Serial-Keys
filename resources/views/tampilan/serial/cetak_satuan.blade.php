
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/cetak/style.css') }}" media="all" />
     <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>@page { size: A5 landscape }</style>
  </head>

  @foreach ($serialDataSatuan as $serial)

  <body onload="window.print()" class="A5 landscape">
     <section class="sheet padding-10mm">
       <center>
      <img style="margin-top: 30px; margin-bottom: 15px;" src="{{ asset('assets/img/cetak/logo.png') }}">
      <h2 style="font-weight: bold;">TERIMA KASIH!</h2>
      <p style="padding-right: 200px; padding-left: 200px;">Telah Membeli Buku Original Kami, Sekarang Kamu Berhak Menggunakan Bonus Aplikasi di dalam Buku Dengan Memasukan Serial Key Berikut.</p>
      <h2 style="margin-bottom: 15px; font-weight: bold;">{{ $serial->serial }}</h2>

      <p style="padding-right: 200px; padding-left: 200px;">Apabila terdapat kendala dapat menghubungi CS kami dengan Scan QR Code di bawah ini.</p>
      <img style="width: 70px;" src="{{ asset('assets/img/cetak/qrcs.png') }}">
      </center>
      <div style="float: right;">
      
       </div>
     </section>
  </body>

  @endforeach
  {{-- <body onload="window.print()" class="A5 landscape">
    <!-- <header class="clearfix"> -->

     <section class="sheet padding-10mm">
       <center>
      <img style="margin-top: 30px; margin-bottom: 15px;" src="https://sarasaaksara.com/digitalbook/admin/assets//img/sarasalogo.png?>">
      <h2 style="font-weight: bold; color: #8e63aa;">TERIMA KASIH!</h2>
      <p style="padding-right: 200px; padding-left: 200px;">Telah Membeli Produk DigitalBook dari Sarasa Aksara, Gunakan SerialKey di bawah ini untuk login pertama kali di Aplikasi DigitalBook.</p>
      <h4 style="margin-bottom: 15px;">SerialKey Anda : IV6fyXl</h4>
      <img style="width: 200px; margin-bottom: 15px;" src="https://sarasaaksara.com/digitalbook/admin/serial/Barcode/IV6fyXl" alt="">
      <p style="padding-right: 200px; padding-left: 200px;">Panduan Instalasi Pengunaan dapat anda lihat di <span style="font-weight: bold;">bit.ly/petujukdigitalbook</span>. Apabila terdapat kendala dapat menghubungi CS kami dengan Scan QR Code di bawah ini.</p>
      </center>
      <div style="float: right;">
      <img style="width:75px; margin-right: 15px;" src="https://sarasaaksara.com/digitalbook/admin/assets//img/qrinstalasi.png">
      <img style="width: 75px; margin-right: 220px;" src="https://sarasaaksara.com/digitalbook/admin/assets//img/qrcs.png">
       </div>
     </section>


  </body> --}}

  
</html>