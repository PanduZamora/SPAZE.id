<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPAZE | Virtual Office</title>

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css"> <!-- NOTES | find way to make it local -->
    <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.min.css">

    <!-- own css -->
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- scripting -->
    <script defer src="node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
</head>
<body>
    <?php require_once "navbar.html"; ?>

    <div class="main-container" id="main-container">
        <div class="hero" id="hero">
            <div class="container">
                <div class="row align-items-center flex-column-reverse flex-lg-row">
                    <div class="col-xl-6 col-lg-7 hero-content">
                        <h1>There's always <strong>SPAZE</strong> for me/you/us.</h1>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn btn-primary btn-lg me-2">We need spaze!</a>
                            <a href="#" class="text-muted small ms-2 w-50">Pendirian PT/CV dan Virtual Office termurah dan terpercaya di Indonesia</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 hero-img text-center">
                        <img src="assets/img/hero-img.png" alt="hero-img" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>

        <section class="product" id="product">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="fw-bold">Choose the best <i class="text-primary fw-light">plan</i> for you</h2>
                </div>

                <div class="product-content">
                    <div class="row row-cols-xxl-4 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-1">
                        <div class="col">
                            <div class="product-container hovered">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">PP</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>PT Perorangan <small class="small text-muted">(lengkap)</small></h3>
                                    <hr>
                                    <p>Paket pendirian PT Perorangan Sertifikat dari SPAZE</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">2900000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-container">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">PP</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>PT Perorangan <small class="small text-muted">(sertifikat)</small></h3>
                                    <hr>
                                    <p>Paket pendirian PT Perorangan Sertifikat dari SPAZE</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">1500000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-container">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">VO</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>Kantor Virtual</h3>
                                    <hr>
                                    <p>Untuk Anda yang ingin Kantor Virtual dengan alamat strategis di Jakarta</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">3700000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-container">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">FS</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>Flex Space</h3>
                                    <hr>
                                    <p>Penyewaan meeting room, workspace, atau studio livestreaming</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">150000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-container">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">PT</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>Pendirian PT</h3>
                                    <hr>
                                    <p>Pendirian perusahaan dengan struktur organisasi besar</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">5500000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-container">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">PT+</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>Pendirian PT <small class="small text-muted">+kantor virtual</small></h3>
                                    <hr>
                                    <p>Untuk Anda yang ingin Paket Terlengkap dari pendirian PT</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">9000000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-container">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">CV</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>Pendirian CV</h3>
                                    <hr>
                                    <p>Pendirian perusahaan dengan struktur organisasi menengah</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">4500000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="product-container">
                                <div class="d-flex product-header justify-content-between align-items-center">
                                    <span class="product-code">CV+</span>
                                    <!-- create badge for plus item -->
                                    <div class="d-flex flex-column">
                                        <a class="btn btn-primary rounded-circle" href="#"><i class="bi bi-cart3"></i></a>
                                        <a class="btn btn-outline-dark rounded-circle" href="#"><i class="bi bi-question-lg"></i></a>
                                    </div>
                                </div>
                                <div class="product-body text-start">
                                    <h3>Pendirian CV <small class="small text-muted">+kantor virtual</small></h3>
                                    <hr>
                                    <p>Untuk Anda yang ingin Paket Terlengkap dari pendirian CV</p>
                                    <a href="#" class="btn btn-outline-primary d-block autonumeric-rp">4500000</a>
                                    <a href="#" class="text-secondary d-block text-center">Lihat fitur paket ini</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about bg-light" id="about-us">
            <div class="container">
                <div class="section-header" hidden>
                    <h2 class="fw-normal">The spaze that you <u>need!</u></h2>
                </div>

                <div class="about-content">
                    <div class="row align-items-center">
                        <div class="col-xxl-7 col-xl-6 content">
                            <p class="h2 fw-normal">The <strong class="text-primary fw-bold">spaze</strong> that you <u>need!</u></p>
                            <p>
                                Spaze Virtual Office terletak di dua lokasi strategis di jantung kota Jakarta. Dekat dengan dua Universitas 
                                terbesar di Jakarta, restoran dan kafe dan banyak aktivitas lain yang Anda bisa lakukan. Jangan khawatir, akses transportasi 
                                untuk ke lokasi pun sangat mudah! <br><br> Spaze Virtual Office dirancang dengan lingkungan yang bersahabat untuk memberikan pengalaman 
                                yang ramah setiap hari. Misi kami adalah menjadikan Spaze tempat di mana jenis perusahaan dapat berkembang. Apapun bisnis Anda, 
                                Spaze adalah tempat yang tepat untuk Anda.
                            </p>
                        </div>
                        <div class="col-xxl-5 col-xl-6 image">
                            <div class="row align-items-center">
                                <div class="col text-end">
                                    <img src="assets/img/about-us3.png" alt="about-us" class="img-fluid">
                                    <img src="assets/img/about-us2.png" alt="about-us" class="img-fluid">
                                </div>
                                <div class="col">
                                    <img src="assets/img/about-us1.png" alt="about-us" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="reason" id="reason">
            <div class="container">
                <div class="section-header">
                    <h2 class="text-center fw-normal"><strong class="fw-bold text-primary">Spaze</strong> gives you the <u>best.</u></h2>
                </div>

                <div class="reason-content">
                    <div class="swiper swiper-reason">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="text-center reason-img">
                                    <img src="assets/img/icon/hemat-biaya.png" alt="" class="featured-icon">
                                </div>
                                <div class="reason-article">
                                    <h3>Fleksibel</h3>
                                    <p>
                                        Pilih untuk bekerja di kantor kami hari ini 
                                        atau bekerja dari mana saja besok! Apapun 
                                        suasana yang Anda cari, kami memiliki spaze!
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center reason-img">
                                    <img src="assets/img/icon/hemat-biaya.png" alt="" class="featured-icon">
                                </div>
                                <div class="reason-article">
                                    <h3>Hemat Biaya</h3>
                                    <p>
                                        Spaze dirancang untuk memenuhi kebutuhan Anda dengan menawarkan berbagai pilihan keanggotaan yang fleksibel. Paket keanggotaan fleksibel , koneksi internet berkecepatan tinggi, ruang pertemuan, dan layanan resepsionis berarti penghematan biaya bagi Anda. Anda dapat menggunakan dana untuk mengembangkan bisnis Anda.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center reason-img">
                                    <img src="assets/img/icon/hemat-biaya.png" alt="" class="featured-icon">
                                </div>
                                <div class="reason-article">
                                    <h3>Layanan Hukum</h3>
                                    <p>
                                        Berpengalaman dengan hukum bisnis, Spaze memastikan agar Anda aman dalam memulai bisnis. Spaze dapat membantu Anda dalam mendirikan bisnis, mulai dari alamat kantor resmi, pendirian perusahaan, izin usaha, perpajakan, dan pendaftaran kekayaan intelektual. Spaze menawarkan layanan konsultasi hukum gratis bagi setiap permasalahan hukum Anda.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center reason-img">
                                    <img src="assets/img/icon/hemat-biaya.png" alt="" class="featured-icon">
                                </div>
                                <div class="reason-article">
                                    <h3>Pengurusan PKP (Pengusaha Kena Pajak)</h3>
                                    <p>
                                        Bermanfaat untuk citra perusahaan Anda dan meningkatkan peluang kerjasama bisnis dengan pemerintah.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center reason-img">
                                    <img src="assets/img/icon/hemat-biaya.png" alt="" class="featured-icon">
                                </div>
                                <div class="reason-article">
                                    <h3>Sistem Pembayaran yang Mudah</h3>
                                    <p>
                                        Tidak perlu khawatir, kami menawarkan beberapa opsi pembayaran yang sesuai dengan usaha Anda.
                                    </p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center reason-img">
                                    <img src="assets/img/icon/hemat-biaya.png" alt="" class="featured-icon">
                                </div>
                                <div class="reason-article">
                                    <h3>Kantor Ramah Lingkungan</h3>
                                    <p>Tidak seperti kantor konvensional, kantor ramah lingkungan menciptakan lingkungan yang lebih sehat. Menawarkan ruang hijau dan sistem perkantoran digital untuk mengurangi limbah. Kami juga menawarkan ruang terbuka bagi Anda untuk menikmati kehijauan sambil bekerja.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="text-center reason-img">
                                    <img src="assets/img/icon/hemat-biaya.png" alt="" class="featured-icon">
                                </div>
                                <div class="reason-article">
                                    <h3>Live Streaming Studio</h3>
                                    <p>
                                        Ruang studio multifungsi dengan fasilitas dan peralatan perekaman lengkap yang dapat digunakan sebagai ruang atau acara online dan sangat ideal untuk para profesional maupun non-professional.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="benefits" id="benefits">
            <div class="container">
                <div class="section-header">
                    <h2 class="fw-light">Member <u class="fw-bold">Benefits.</u></h2>
                </div>

                <div class="benefits-content">
                    <div class="row row-cols-lg-2 row-cols-1">
                        <div class="col">
                            <ul>
                                <li>
                                    <h3>Opsi Keanggotaan Fleksibel</h3>
                                    <p>Kami menawarkan berbagai pilihan paket membership yang dapat Anda pilih untuk memenuhi kebutuhan bisnis Anda.</p>
                                </li>
                                <li>
                                    <h3>Resepsionis Professional</h3>
                                    <p>Resepsionis Profesional kami siap membantu Anda di setiap lokasi dengan menyediakan layanan asisten pribadi seperti kurir surat kepada penyewa.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col">
                            <ul>
                                <li>
                                    <h3>Teknologi</h3>
                                    <p>Koneksi internet berkecepatan tinggi yang aman dan tidak terbatas, serta printer dan pemindai.</p>
                                </li>
                                <li>
                                    <h3>Ruang Rapat & Lounge Eksklusif</h3>
                                    <p>Ruang rapat kami yang luas dilengkapi dengan Smart TV, proyektor dan papan tulis yang tersedia untuk melaksanakan pertemuan Anda.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="steps" id="steps">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="fw-light">Easy steps in getting <strong class="text-primary fw-bold">spaze</strong> for you (us)</h2>
                </div>

                <div class="steps-content">
                    <div class="row row-cols-lg-3 row-cols-1 g-4">
                        <div class="col text-center px-6">
                            <img src="assets/img/step-1.png" alt="step 1" class="img-fluid text-center">
                            <h3>Pilih Layanan</h3>
                            <p>Pilih layanan yang sesuai dengan kebutuhan Anda</p>
                        </div>
                        <div class="col text-center px-6">
                            <img src="assets/img/step-2.png" alt="step 2" class="img-fluid text-center">
                            <h3>Lakukan Pembayaran</h3>
                            <p>Lakukan pembayaran melalui website Kami</p>
                        </div>
                        <div class="col text-center px-6">
                            <img src="assets/img/step-3.png" alt="step 3" class="img-fluid text-center">
                            <h3>Anda telah menjadi pengusaha!</h3>
                            <p>Sekarang Anda telah memiliki alamat kantor Anda sendiri dan menikmati fasilitas Spaze lainnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimonial bg-light" id="testimonial">
            <div class="containerr">
                <div class="section-header text-center">
                    <h2>Spread <i class="fw-bold">happines</i> with <strong class="fw-bold text-primary">spaze</strong></h2>
                    <p>Dengarkan pengalaman dari orang-orang yang telah menggunakan spaze untuk kebutuhan bisnisnya.</p>
                </div>
                <div class="row align-items-top justify-content-end">
                    <div class="testimonial-title col-1">
                        <p class="title">Spread <i class="fw-bold">happines</i> with <strong class="fw-bold text-primary">spaze</strong></p>
                        <p class="lead-text">Dengarkan pengalaman dari orang-orang yang telah menggunakan spaze untuk kebutuhan bisnisnya.</p>
                    </div>
                    <div class="testimonial-content col-xl-3 col-lg-7 col-md-5 col-sm-6">
                        <div class="swiper swiper-testi">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimonial-container">
                                        <div class="test-header text-center">
                                            <img src="assets/img/icon/”.png" alt="">
                                        </div>
                                        <div class="test-content">
                                            <p>Pertama kali cobain livestreaming studio di spaze permata hijau, tempatnya keren dan bersih.. next bakal sering2 mampir nih!!</p>
                                        </div>
                                        <div class="test-footer">
                                            <p class="name">Clarissa</p>
                                            <p class="jobs">Mahasiswi</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-container">
                                        <div class="test-header text-center">
                                            <img src="assets/img/icon/”.png" alt="">
                                        </div>
                                        <div class="test-content">
                                            <p>Lokasi mudah dijangkau, punya layanan yang lengkap mulai dari virtual office sampai layanan pajak, fasilitas ruangan yg diberikan juga sangat memadai. Keep it up spaze!</p>
                                        </div>
                                        <div class="test-footer">
                                            <p class="name">Elisa</p>
                                            <p class="jobs">Wiraswasta</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-container">
                                        <div class="test-header text-center">
                                            <img src="assets/img/icon/”.png" alt="">
                                        </div>
                                        <div class="test-content">
                                            <p>Join  Virtual office di spaze highly recommended untuk para UMKM yang baru mulai bisnis nya. Staff ramah dan pengerjaan juga cepat.</p>
                                        </div>
                                        <div class="test-footer">
                                            <p class="name">Akbar</p>
                                            <p class="jobs">PT Maju Karya Baru</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testimonial-container">
                                        <div class="test-header text-center">
                                            <img src="assets/img/icon/”.png" alt="">
                                        </div>
                                        <div class="test-content">
                                            <p>Working place nya sangat tenang dan vibes nya sangat positif.. cocok untuk kerja karna tidak ada distraksi.</p>
                                        </div>
                                        <div class="test-footer">
                                            <p class="name">Gunawan</p>
                                            <p class="jobs">CV Nuansa Karya</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-pagination2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ads" id="ads">
            <div class="container text-center d-flex align-items-center justify-content-center">
                <span>Let's get a <strong class="fw-bold">bigger</strong> <u class="text-primary">spaze</u> for a <i class="lower">lower</i> <u>price</u></span>
                <a href="#" class="btn btn-primary">Find out</a>
            </div>
        </section>

        <?php include_once "contact.html" ?>

        <section class="call" id="call">
            <div class="container">
                <div class="section-header text-center">
                    <h2 class="fw-light"><strong class="text-primary fw-bold">Find</strong> Us</h2>
                </div>
                <div class="row row-cols-lg-3">
                    <div class="col-xl-6 col-md-12 mb-4">
                        <div class="holder">
                            <h3>Location</h3>
                            <p><strong>SPAZE Grogol:</strong> Jl. Dr. Susilo Raya No.342, RT.5/RW.5, Grogol, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11450</p>
                            <p><strong>SPAZE Permata Hijau:</strong> Jl. Arteri Permata Hijau No.5, RT.2/RW.10, Grogol Utara, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12240</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="holder">
                            <h3>Kontak</h3>
                            <p><strong>Telepon</strong><br>+622129557557</p>
                            <p><strong>Whatsapp</strong><br>+6281312120557</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="holder">
                            <h3>Email</h3>
                            <p><strong>CS</strong><br>cs@spaze.id</p>
                            <p><strong>Sales</strong><br>sales@spaze.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include_once "footer.html"; ?>


    <!-- include script section under here -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="node_modules/swiper/swiper-bundle.min.js"></script>

    <!-- custom script -->
    <script>
        const swiper = new Swiper(".swiper-reason", {
            slidesPerView: "auto",
            spaceBetween: 16,
            pagination: {
            el: ".swiper-pagination",
            clickable: true,
            },
        });
        const swiper2 = new Swiper(".swiper-testi", {
            slidesPerView: "auto",
            spaceBetween: 32,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</html>