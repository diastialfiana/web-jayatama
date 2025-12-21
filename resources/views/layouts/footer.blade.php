<footer id="footer" class="footer dark-background">
    <div class="container footer-top">
        <div class="row gy-4">
            <!-- Tentang Perusahaan -->
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                    <span class="sitename">JAYATAMA</span>
                </a>
                <p>
                    PT Jasa Swadaya Utama (Jayatama)<br>
                    Jl. Kapt. P. Tendean Kav 12 No. 14A<br>
                    RT 002 RW 002, Mampang Prapatan<br>
                    Jakarta Selatan, DKI Jakarta
                </p>
                <div class="footer-contact pt-3">
                    <p><strong>Phone:</strong> <span>0812 1285 8685</span></p>
                    <p><strong>Email:</strong> <span>info@jayatama.id</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                    <a href="https://www.youtube.com/@jayatamaofficial"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            <!-- Tautan Cepat -->
            <div class="col-lg-2 col-md-3 footer-links">
                <h4>Tautan Cepat</h4>
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                    <li><a href="{{ route('services') }}">Layanan</a></li>
                    <li><a href="{{ route('projects') }}">Solusi Bisnis</a></li>
                    <li><a href="{{ route('blog') }}">Berita</a></li>
                    <li><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>

            <!-- Layanan Kami -->
            <div class="col-lg-3 col-md-3 footer-links">
                <h4>Layanan Kami</h4>
                <ul>
                    <li><a href="{{ route('layanan.security') }}">Security</a></li>
                    <li><a href="{{ route('layanan.driver') }}">Driver</a></li>
                    <li><a href="{{ route('layanan.os') }}">Office Service</a></li>
                    <li><a href="{{ route('layanan.teknisi') }}">Teknisi</a></li>
                    <li><a href="{{ route('layanan.fnb') }}">Food & Beverage</a></li>
                    <li><a href="{{ route('layanan.parking') }}">Parking</a></li>
                    <li><a href="{{ route('layanan.gondola') }}">Gondola</a></li>
                </ul>
            </div>

            <!-- Informasi -->
            <div class="col-lg-3 col-md-3 footer-links">
                <h4>Informasi</h4>
                <ul>
                    <li><a href="{{ route('blog') }}#karir">Karir & Lowongan</a></li>
                    <li><a href="{{ route('contact') }}#faq">FAQ</a></li>
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Copyright -->
    <div class="container copyright text-center mt-4">
        <p>© <span id="current-year"></span> <strong class="sitename">PT Jasa Swadaya Utama (Jayatama)</strong>. All Rights Reserved.</p>
        <div class="credits">Designed with by Jayatama IT Team</div>
    </div>
</footer>

<script>
    // Set current year
    document.getElementById('current-year').textContent = new Date().getFullYear();
</script>