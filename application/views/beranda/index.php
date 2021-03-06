<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>

    <!--CSS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/layout.css">

</head>
<body>

    <!-- HEADER -->
    <header>
        <nav>
        <img src="<?= base_url(); ?>assets/assets/images/seskoall.png" alt="" class="logo">

            <ul class="nav__links">
                <li><a href="#">Home</a></li>
                <li><a href="#berita">Berita</a></li>
                <li><a href="#bantuan">Bantuan</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#download">Dowload Manual</a></li>
                <li>
                    <a href="<?= base_url('login'); ?>">
                        <button>Masuk</button>
                    </a>
                </li> 
            </ul> 
        </nav>
    </header>
    <!-- END HEADER-->

    <!-- BANNER -->
    <section class="banner">
        <div class="container">
            <div class="button_cta">
                <a href="#" class="cta">
                    <button>Learn More</button>
                </a>
            </div>
        </div>
    </section>
    <!-- END BANNER -->

    <!-- Berita -->
    <section id="berita">
        <div class="news-area">
            <h3>Berita Terbaru</h3>
            <div class="swiper mySwiper container">
                    <div class="swiper-wrapper content">
                        <div class="swiper-slide card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="<?= base_url(); ?>assets/assets/images/foto-4.png" alt="" class="first-news">
                                </div>
                                <div class="news-title">
                                    <span><b>Untuk Lindungi Masyarakat, Kemendag Blokir 622 Situs Web Tanpa Izin Bappeti</b></span>
                                </div>
                                <div class="button">
                                    <button class="selengkapnya">Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="<?= base_url(); ?>assets/assets/images/foto-5.png" alt="" class="first-news">
                                </div>
                                <div class="news-title">
                                    <span><b>Bappeti Kembali Blokir 137 Entitas Tak Berizin, Termasuk Penawaran ini ...</b></span>
                                </div>
                                <div class="button">
                                    <button class="selengkapnya">Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="<?= base_url(); ?>assets/assets/images/foto-6.png" alt="" class="first-news">
                                </div>
                                <div class="news-title">
                                    <span><b>Optimalkan Pemanfaatan SRG sebagai Instrumen Perdagangan, Wamendag: SR..</b></span>
                                </div>
                                <div class="button">
                                    <button class="selengkapnya">Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="<?= base_url(); ?>assets/assets/images/foto-5.png" alt="" class="first-news">
                                </div>
                                <div class="news-title">
                                    <span><b>Serbuan Vaksinasi Tahap ke-2 Lanud Abd Saleh di Detasemen TNI AU Senggreng</b></span>
                                </div>
                                <div class="button">
                                    <button class="selengkapnya">Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="<?= base_url(); ?>assets/assets/images/foto-5.png" alt="" class="first-news">
                                </div>
                                <div class="news-title">
                                    <span><b>Dalam sehari "Serbuan Vaksinasi" Lanud Abd Saleh Jangkau Empat Lokasi</b></span>
                                </div>
                                <div class="button">
                                    <button class="selengkapnya">Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide card">
                            <div class="card-content">
                                <div class="image">
                                    <img src="<?= base_url(); ?>assets/assets/images/foto-5.png" alt="" class="first-news">
                                </div>
                                <div class="news-title">
                                    <span><b>Satkes Dema Mako Korphaskas Gelar Vaksinasi Covid Lanjutan di Gedung...</b></span>
                                </div>
                                <div class="button">
                                    <button class="selengkapnya">Selengkapnya <i class="fa-solid fa-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
        </div>
    </section>
    <!-- END Berita -->

    <!-- Bantuan-->
    <section id="bantuan">
        <div class="container">
            <h3>Bantuan</h3>
            <div class="grid-container">
                <div>
                    <span>Apa Kegunaan Aplikasi ini ?</span>
                    <ul class="arrows">
                        <li><a href="#"><img src="<?= base_url(); ?>assets/assets/images/arr-right.png" alt="" class="arrows-right"></a></li>
                    </ul>
                </div>
                <div>
                    <span>Koneksi Jaringan Internet Lambat</span>
                    <ul class="arrows">
                    <li><a href="#"><img src="<?= base_url(); ?>assets/assets/images/arr-right.png" alt="" class="arrows-right"></a></li>
                    </ul>
                </div>
                <div>
                    <span>Bagaimana Cara Perusahaan Mendapatkan<br />Akun Aplikasi ini ?</span>
                    <ul class="arrows">
                    <li><a href="#"><img src="<?= base_url(); ?>assets/assets/images/arr-right.png" alt="" class="arrows-right"></a></li>
                    </ul>
                </div>
                <div>
                    <span>Layanan Tidak Dapat Digunakan<br />Setelah Aktivasi</span>
                    <ul class="arrows">
                    <li><a href="#"><img src="<?= base_url(); ?>assets/assets/images/arr-right.png" alt="" class="arrows-right"></a></li>
                    </ul>
                </div>
                <div>
                    <span>Bagaimana Jika Lupa Password ?</span>
                    <ul class="arrows">
                    <li><a href="#"><img src="<?= base_url(); ?>assets/assets/images/arr-right.png" alt="" class="arrows-right"></a></li>
                    </ul>
                </div>
                <div>
                    <span>Nomor Tidak Bisa Dihubungi</span>
                    <ul class="arrows">
                    <li><a href="#"><img src="<?= base_url(); ?>assets/assets/images/arr-right.png" alt="" class="arrows-right"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Bantuan -->

    <!-- Bantuan-->
    <section id="gallery">
        <div class="container">
            <h3>Gallery</h3>
            <div class="slider-container">
                <ul class="slider-list">
                    <li class="slider-item">
                        <a href="" class="">
                            <img src="<?php echo base_url() ?>assets/assets/images/foto-1.png" alt="" class="img-slider">
                        </a>
                    </li>
                    <li class="slider-item">
                        <a href="" class="">
                            <img src="<?php echo base_url() ?>assets/assets/images/foto-2.png" alt="" class="img-slider">
                        </a>
                    </li>
                    <li class="slider-item">
                        <a href="" class="">
                            <img src="<?php echo base_url() ?>assets/assets/images/foto-3.png" alt="" class="img-slider">
                        </a>
                    </li>
                    <!-- <li class="slider-item">
                        <a href="" class="">
                            <img src="<?php echo base_url() ?>assets/assets/images/foto-4.png" alt="" class="img-slider">
                        </a>
                    </li>
                    <li class="slider-item">
                        <a href="" class="">
                            <img src="<?php echo base_url() ?>assets/assets/images/foto-5.png" alt="" class="img-slider">
                        </a>
                    </li> -->
                </ul>
                <div class="slider-arrows">
                    <img src="<?= base_url(); ?>assets/assets/images/arr-left.png" alt="" class="slider-arrow-prev">
                    <img src="<?= base_url(); ?>assets/assets/images/arr-right.png" alt="" class="slider-arrow-next">
                </div>
            </div>
        </div>
    </section>
    <!-- END Bantuan -->

    <!-- Download Manual-->
    <section id="download">
        <div class="container">
            <div class="banner-download">
                <a href="">
                <img src="<?= base_url(); ?>assets/assets/images/manual_book.png" alt="">
                </a>
            </div>
        </div>
    </section>
    <!-- END Bantuan -->

    <!--FOOTER-->
    <footer>
        <div>
            <h4>SEKOLAH STAF DAN KOMANDO TNI ANGKATAN LAUT (SESKOAL)</h4>
            <h5>Military School In South Jakarta</h5>
            <p>Jl. Ciledug Raya No. 2, RT. 4/RW. 4, Cipulir, Kec. Kby, Lama <br />
                Kota Jakarta Selatan, Daerah Khusus Ibukota, Jakarta 12230 <br />
                Phone: (021) 7222666
            </p>
        </div>
    </footer>
    <!-- END FOOTER-->

</body>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 78,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
        },
        navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
        },
    });
    </script>

<!-- <script>
        "use strict";

    {
    // Get HTML elements
    const sliderList = document.querySelector(".slider-list");
    const sliderItems = document.querySelectorAll(".slider-item");
    const sliderNext = document.querySelector(".slider-arrow-next");
    const sliderPrev = document.querySelector(".slider-arrow-prev");

    // Define variables
    let numberOfItems;
    let itemIndex;

    // Define media queries
    const mediaQueryList = [
        window.matchMedia("(max-width: 650px)"),
        window.matchMedia("(max-width: 991px)")
    ];

    // Display slider items
    const displayItems = () => {
        let html = "";
        let len = itemIndex + numberOfItems;
        for (let i = itemIndex; i < len; i++) {
        html += sliderItems[i].outerHTML;
        }
        sliderList.innerHTML = html;
    };

    // Handel number of slides and set slides height and width
    const HandleScreen = () => {
        if (mediaQueryList[0].matches) {
        numberOfItems = 1;
        itemIndex = 0;
        // set width and height to item for when image does not load
        sliderItems.forEach((item) => {
            item.style.width = "100%";
            item.style.minHeight = "150px";
        });
        } else if (mediaQueryList[1].matches) {
        numberOfItems = 2;
        itemIndex = 0;
        // set width and height to item for when image does not load
        sliderItems.forEach((item) => {
            item.style.width = "50%";
            item.style.minHeight = "150px";
        });
        } else {
        numberOfItems = 3;
        itemIndex = 0;
        // set width and height to item for when image does not load
        sliderItems.forEach((item) => {
            item.style.width = "35%";
            item.style.minHeight = "150px";
        });
        }
        displayItems();
    };

    // Run handel screen function for the first time
    HandleScreen();

    // Add listener to media query list items
    for (let i = 0; i < mediaQueryList.length; i++) {
        mediaQueryList[i].addListener(HandleScreen);
    }

    // Diplay next slide
    sliderNext.addEventListener("click", function () {
        if (itemIndex < sliderItems.length - numberOfItems) {
        itemIndex++;
        displayItems();
        }
    });

    // Display Previous slide
    sliderPrev.addEventListener("click", function () {
        if (itemIndex > 0) {
        itemIndex--;
        displayItems();
        }
    });
    }
</script> -->
</html>