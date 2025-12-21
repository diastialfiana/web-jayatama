<?php
$currentRoute = request()->route()->getName();
?>

<nav id="navmenu" class="navmenu">
    <ul>
        <li class="dropdown">
            <a href="{{ route('projects') }}" class="{{ str_contains($currentRoute, 'project') ? 'active' : '' }}">
                <span>Solusi Bisnis</span> <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
                <li><a href="{{ route('solusi') }}#solusi-banking">Perbankan & Keuangan</a></li>
                <li><a href="{{ route('solusi') }}#solusi-retail">Retail & Lifestyle</a></li>
                <li><a href="{{ route('solusi') }}#solusi-media">Media & Event</a></li>
                <li><a href="{{ route('solusi') }}#solusi-korporasi">Perkantoran & Korporasi</a></li>
                <li><a href="{{ route('solusi') }}#solusi-properti">Hotel, Properti & Fasilitas Gedung</a></li>
            </ul>
        </li>
        <li><a href="{{ route('blog') }}" class="{{ str_contains($currentRoute, 'blog') ? 'active' : '' }}">Berita</a></li>
        <li><a href="{{ route('contact') }}" class="{{ $currentRoute == 'contact' ? 'active' : '' }}">Kontak</a></li>
    </ul>
</nav>
<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

<a href="{{ route('home') }}" class="logo d-flex align-items-center">
    <img src="{{ asset('assets/assets/MASTER LOGO JAYATAMA.png') }}" alt="Jayatama Logo" style="height: 100px;">
</a>

<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="{{ route('home') }}" class="{{ $currentRoute == 'home' ? 'active' : '' }}">Beranda</a></li>
        <li><a href="{{ route('about') }}" class="{{ $currentRoute == 'about' ? 'active' : '' }}">Tentang Kami</a></li>
        
        <li class="dropdown">
            <a href="{{ route('services') }}" class="{{ str_contains($currentRoute, 'service') ? 'active' : '' }}">
                <span>Layanan</span> <i class="bi bi-chevron-down"></i>
            </a>
            <ul>
                <li><a href="{{ route('layanan.security') }}">Security</a></li>
                <li><a href="{{ route('layanan.os') }}">Office Service</a></li>
                <li><a href="{{ route('layanan.driver') }}">Driver</a></li>
                <li><a href="{{ route('layanan.messenger') }}">Messenger</a></li>
                <li><a href="{{ route('layanan.teknisi') }}">Teknisi</a></li>
                <li><a href="{{ route('layanan.fnb') }}">Food & Beverage</a></li>
                <li><a href="{{ route('layanan.parking') }}">Parking</a></li>
                <li><a href="{{ route('layanan.gondola') }}">Gondola</a></li>
            </ul>
        </li>
    </ul>
</nav>