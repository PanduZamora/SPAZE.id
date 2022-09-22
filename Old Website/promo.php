<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="facebook-domain-verification" content="f2gxf62vn2qxgmkvgwaxqi579h500s" />
  <title>Promo Spaze</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/spaze-logo.webp" type="image/x-icon">
  <link href="assets/img/spaze-logo.webp" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="assets/vendor/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/vendor/aos/aos.css">
  <link rel="stylesheet" href="assets/vendor/glightbox/css/glightbox.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link rel="stylesheet" href="assets/css/style.css">

  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-W23378V');
  </script>
  <!-- End Google Tag Manager -->

  <style>
    .btn-secondary {
      border-radius: 0;
      background-color: #fff;
      border: solid #30972e 2px;
      color: #30972e;
    }

    .btn-secondary:hover {
      text-decoration: underline;
      background-color: #fff;
      color: #30972e;
    }

    .back-to-top {
      position: fixed;
      visibility: hidden;
      opacity: 0;
      right: 15px;
      bottom: 15px;
      z-index: 99999;
      background: #57af3c;
      width: 64px;
      height: 64px;
      border-radius: 50%;
      transition: all 0.4s;
    }

    .back-to-top i {
      font-size: 34px;
      color: #fff;
      line-height: 0;
    }

    .back-to-top:hover {
      background: #57af3c;
      color: #fff;
    }

    .back-to-top.active {
      visibility: visible;
      opacity: 1;
    }

    @media (max-width: 768px) {
      .back-to-top {
        width: 50px;
        height: 50px;
      }

      .back-to-top i {
        font-size: 24px;
      }
    }

    .wa-us-mobile {
      background: linear-gradient(90deg,
          rgba(87, 175, 60, 1) 0%,
          rgba(48, 151, 46, 1) 100%);
      color: #fff;
    }

    .wa-us-mobile .btn-wa-us-mobile {
      background-color: #fff;
      border: #fff solid 2px;
      color: rgba(87, 175, 60, 1);
      border-radius: 0;
      font-weight: 600;
    }

    .wa-us-mobile .btn-wa-us-mobile:hover {
      background-color: #fff;
      border: none;
      color: rgba(87, 175, 60, 1);
      border-radius: 0;
    }

    .swiper {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* css di bawah hanya untuk page ini */
    .header.fixed-top {
      background-color: #fff;
    }

    .promo {
      margin-top: 80px;
    }
  </style>
</head>

<body>
  
  <?php include_once "includes/navbar.html" ?>

  <section id="promo" class="promo">
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <header class="section-header pb-1 mb-md-4">
        <h2>Dapatkan Promo Terbaik</h2>
      </header>

      <div class="row text-left">

      <div class="col-12 col-md-3">
          <img src="assets/img/promo/promo_virtual_office_2tahun.jpeg" alt="Level Up Untuk UMKM" class="img-fluid">
          <a href="https://bit.ly/spazeid" target="_blank" class="btn btn-primary col-12 mt-2 mb-4">Hubungi Kami</a>
        </div>

        <div class="col-12 col-md-3">
          <img src="assets/img/promo/promo_umkm.jpeg" alt="Level Up Untuk UMKM" class="img-fluid">
          <a href="https://bit.ly/spazeid" target="_blank" class="btn btn-primary col-12 mt-2 mb-4">Hubungi Kami</a>
        </div>

        <div class="col-12 col-md-3">
          <img src="assets/img/promo/promo_cicilan.png" alt="Sewa Virtual Office Lebih Mudah" class="img-fluid">
          <a href="https://bit.ly/spazeid" target="_blank" class="btn btn-primary col-12 mt-2 mb-4">Hubungi Kami</a>
        </div>

        <div class="col-12 col-md-3">
          <img src="assets/img/promo/promo_laporspt.jpeg" alt="Lapor SPT Hari Ini Yuk!!" class="img-fluid">
          <a href="https://bit.ly/spazeid" target="_blank" class="btn btn-primary col-12 mt-2 mb-4">Hubungi Kami</a>
        </div>

        <div class="col-12 col-md-3">
          <img src="assets/img/promo/promo 3jt.jpeg" alt="Virtual Office 3 Jutaan !!" class="img-fluid">
          <a href="https://bit.ly/spazeid" target="_blank" class="btn btn-primary col-12 mt-2 mb-4">Hubungi Kami</a>
        </div>

        <div class="col-12 col-md-3">
          <img src="assets/img/promo/2022-bisnis-legal.jpeg" alt="PT Perorangan + Virtual Office" class="img-fluid">
          <a href="https://bit.ly/spazeid" target="_blank" class="btn btn-primary col-12 mt-2 mb-4">Hubungi Kami</a>
        </div>

        <div class="col-12 col-md-3">
          <img src="assets/img/promo/pt-perorangan.webp" alt="Bikin Usaha Makin Mudah" class="img-fluid">
          <a href="https://bit.ly/spazeid" target="_blank" class="btn btn-primary col-12 mt-2 mb-4">Hubungi Kami</a>
        </div>

      </div>

  </section>

  <?php include_once "includes/footer.html"; ?>

  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <script>
    const lightbox = GLightbox({
      touchNavigation: true,
      loop: true,
      autoplayVideos: true
    });

    var gallery2 = GLightbox({
      selector: '.glightbox2'
    });
    var gallery3 = GLightbox({
      selector: '.glightbox3'
    });
    var gallery4 = GLightbox({
      selector: '.glightbox4'
    });
  </script>
</body>

</html>