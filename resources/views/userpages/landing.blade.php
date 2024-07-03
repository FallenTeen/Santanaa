
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/landingstyles.css') }}">
  <link rel="icon" type="image" href="assets/images/santana.ico">
  <title>Santana</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <header class="header">
    <nav>
      <div class="nav__bar">
        <div class="logo">
          <a href="#"><img src="assets/images/santana.png" alt="logo" onclick="location.reload()" /></a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <i class="ri-menu-line"></i>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#service">Layanan</a></li>
        <li><a href="#explore">Jelajahi</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
      <div class="">
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
      </div>
    </nav>
    <div class="section__container header__container" id="home">
      <p>Sederhana - Unik - Ramah</p>
      <h1>Rasakan Seperti di Rumah<br />Di <span>Hotel</span> Kami.</h1>
    </div>
  </header>
  <section class="section__container booking__container">
    <!-- <form action="/" class="booking__form">
      <div class="input__group">
        <span><i class="ri-calendar-2-fill"></i></span>
        <div>
          <label for="check-in">CHECK-IN</label>
          <input type="text" placeholder="Check In" />
        </div>
      </div>
      <div class="input__group">
        <span><i class="ri-calendar-2-fill"></i></span>
        <div>
          <label for="check-out">CHECK-OUT</label>
          <input type="text" placeholder="Check Out" />
        </div>
      </div>
      <div class="input__group">
        <span><i class="ri-user-fill"></i></span>
        <div>
          <label for="guest">TAMU</label>
          <input type="text" placeholder="Tamu" />
        </div>
      </div>
      <div class="input__group input__btn">
        <button class="btn">CHECK OUT</button>
      </div>
    </form> -->
  </section>

  <section class="section__container about__container" id="about">
    <div class="about__image">
      <img src="assets/images/header.jpg" alt="about" />
    </div>
    <div class="about__content">
      <p class="section__subheader">TENTANG KAMI</p>
      <h2 class="section__header">Liburan Terbaik Dimulai Dari Sini!</h2>
      <p class="section__description">
        Dengan fokus pada akomodasi berkualitas, pengalaman yang dipersonalisasi, dan pemesanan yang mudah, platform
        kami didedikasikan untuk memastikan setiap pelancong memulai liburan impian mereka dengan percaya diri dan
        semangat.
      </p>
    </div>
  </section>

  <section class="section__container room__container">
    <p class="section__subheader">RUANG TAMU KAMI</p>
    <h2 class="section__header">Waktu Istirahat Paling Berkesan Dimulai Dari Sini.</h2>
    <div class="room__grid">
      <div class="room__card">
        <div class="room__card__image">
          <img src="assets/images/room-1.jpg" alt="room" />
          <div class="room__card__icons">
          </div>
        </div>
        <div class="room__card__details">
          <h4>Kamar Deluxe Pemandangan Laut</h4>
          <p>
            Nikmati kemewahan dengan pemandangan laut yang menakjubkan dari suite pribadi Anda.
          </p>
          <h5>Mulai dari <span>Rp.350.000/malam</span></h5>
          <button class="btn">Pesan Sekarang</button>
        </div>
      </div>
      <div class="room__card">
        <div class="room__card__image">
          <img src="assets/images/room-2.jpg" alt="room" />
          <div class="room__card__icons">
          </div>
        </div>
        <div class="room__card__details">
          <h4>Kamar Eksekutif Pemandangan Kota</h4>
          <p>
            Nikmati keanggunan perkotaan dan kenyamanan modern di pusat kota.
          </p>
          <h5>Mulai dari <span>Rp.150.000/malam</span></h5>
          <button class="btn">Pesan Sekarang</button>
        </div>
      </div>
      <div class="room__card">
        <div class="room__card__image">
          <img src="assets/images/room-3.jpg" alt="room" />
          <div class="room__card__icons">
          </div>
        </div>
        <div class="room__card__details">
          <h4>Retret Taman Keluarga</h4>
          <p>
            Luas dan mengundang, sempurna untuk menciptakan kenangan berharga bersama orang-orang tercinta.
          </p>
          <h5>Mulai dari <span>Rp.250.000/malam</span></h5>
          <button class="btn">Pesan Sekarang</button>
        </div>
      </div>
    </div>
  </section>

  <section class="service" id="service">
    <div class="section__container service__container">
      <div class="service__content">
        <p class="section__subheader">LAYANAN</p>
        <h2 class="section__header">Hanya Berusaha Untuk Yang Terbaik.</h2>
        <ul class="service__list">
          <li>
            <span><i class="ri-shield-star-line"></i></span>
            Keamanan Kelas Tinggi
          </li>
          <li>
            <span><i class="ri-24-hours-line"></i></span>
            Layanan Kamar 24 Jam
          </li>
          <li>
            <span><i class="ri-headphone-line"></i></span>
            Ruangan Tenang
          </li>
          <li>
            <span><i class="ri-map-2-line"></i></span>
            Wilayah Strategis
          </li>
        </ul>
      </div>
    </div>
  </section>

  <section class="section__container banner__container">
    <div class="banner__content">
      <div class="banner__card">
        <h4>25+</h4>
        <p>Kamar Tersedia</p>
      </div>
      <div class="banner__card">
        <h4>350+</h4>
        <p>Reservasi Selesai</p>
      </div>
      <div class="banner__card">
        <h4>600+</h4>
        <p>Tamu Bahagia</p>
      </div>
    </div>
  </section>

  <section class="explore" id="explore">
    <p class="section__subheader">JELAJAHI</p>
    <h2 class="section__header">Apa Yang Baru Hari Ini.</h2>
    <div class="explore__bg">
      <div class="explore__content">
        <p class="section__description">17 Juni 2024</p>
        <h4>Menu Baru Tersedia Di Hotel Kami.</h4>
        <button class="btn">Lanjutkan</button>
      </div>
    </div>
  </section>

  <footer class="footer" id="contact">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="justify-center">
          <a href="#home"><img src="assets/images/santana.png" alt="logo" /></a>
        </div>
        <p class="section__description">
          Temukan dunia kenyamanan, kemewahan, dan petualangan saat Anda menjelajahi pilihan hotel kami yang telah
          dikurasi, membuat setiap momen liburan Anda benar-benar luar biasa.
        </p>
      </div>
      <div class="footer__col">
        <h4>TAUTAN CEPAT</h4>
        <ul class="footer__links">
          <li><a href="#">Jelajahi Destinasi</a></li>
          <li><a href="#">Penawaran Khusus & Paket</a></li>
          <li><a href="#">Tipe Kamar & Fasilitas</a></li>
          <li><a href="#">Ulasan & Peringkat Pelanggan</a></li>
          <li><a href="#">Tips & Panduan Perjalanan</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>LAYANAN KAMI</h4>
        <ul class="footer__links">
          <li><a href="#">Bantuan Konsier</a></li>
          <li><a href="#">Opsi Pemesanan Fleksibel</a></li>
          <li><a href="#">Transfer Bandara</a></li>
          <li><a href="#">Kesehatan & Rekreasi</a></li>
        </ul>
      </div>
      <div class="footer__col">
        <h4>HUBUNGI KAMI</h4>
        <ul class="footer__links">
          <li><a href="#">Santana@gmail.com</a></li>
        </ul>
        <div class="footer__socials">
          <a href="#"><img src="assets/images/facebook.png" alt="facebook" /></a>
          <a href="#"><img src="assets/images/instagram.png" alt="instagram" /></a>
          <a href="#"><img src="assets/images/youtube.png" alt="youtube" /></a>
          <a href="#"><img src="assets/images/twitter.png" alt="twitter" /></a>
        </div>
      </div>
    </div>
    <div class="footer__bar">
      Hak Cipta © 2024 Santana.
    </div>
    <button class="btn ri-arrow-up-line" id="to-top-btn"></button>
  </footer>
  
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="main.js"></script>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>

</html>