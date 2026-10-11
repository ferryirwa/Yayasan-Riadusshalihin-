<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yayasan Kita - Berbagi Kebaikan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset dan Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #2c5aa0;
            --secondary: #f8b739;
            --dark: #1a365d;
            --light: #f8f9fa;
            --gray: #6c757d;
            --success: #28a745;
        }

        body {
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--secondary);
            color: #333;
            border: none;
            border-radius: 4px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .section {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }

        .section-title h2:after {
            content: '';
            position: absolute;
            width: 70px;
            height: 3px;
            background-color: var(--secondary);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .section-title p {
            color: var(--gray);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Header dan Navigasi */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            width: 50px;
            height: 50px;
            background-color: var(--primary);
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
        }

        .logo-text h1 {
            font-size: 1.8rem;
            color: var(--dark);
        }

        .logo-text p {
            font-size: 0.9rem;
            color: var(--gray);
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 30px;
        }

        nav ul li a {
            font-weight: 600;
            color: var(--dark);
            padding: 5px 0;
            position: relative;
            transition: color 0.3s;
        }

        nav ul li a:hover, nav ul li a.active {
            color: var(--primary);
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background-color: var(--primary);
            bottom: -5px;
            left: 0;
            transition: width 0.3s;
        }

        nav ul li a:hover:after, nav ul li a.active:after {
            width: 100%;
        }

        .mobile-menu-btn {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 90, 160, 0.85), rgba(44, 90, 160, 0.9)), url('https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 180px 0 100px;
            margin-top: 80px;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 800px;
            margin: 0 auto 40px;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        /* About Section */
        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }

        .about-img {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .about-img img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s;
        }

        .about-img:hover img {
            transform: scale(1.03);
        }

        .about-text {
            flex: 1;
        }

        .about-text h3 {
            font-size: 2rem;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 20px;
            color: #555;
        }

        /* Programs Section */
        .programs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .program-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }

        .program-img {
            height: 200px;
            overflow: hidden;
        }

        .program-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .program-card:hover .program-img img {
            transform: scale(1.1);
        }

        .program-content {
            padding: 25px;
        }

        .program-content h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .program-content p {
            color: var(--gray);
            margin-bottom: 20px;
        }

        .program-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-aktif {
            background-color: rgba(40, 167, 69, 0.1);
            color: var(--success);
        }

        /* News Section */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .news-card {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .news-img {
            height: 200px;
            overflow: hidden;
        }

        .news-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .news-content {
            padding: 25px;
        }

        .news-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 0.9rem;
            color: var(--gray);
        }

        .news-content h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .news-content p {
            color: #555;
            margin-bottom: 20px;
        }

        /* Donation Section */
        .donation {
            background: linear-gradient(135deg, var(--primary), var(--dark));
            color: white;
            text-align: center;
        }

        .donation .section-title h2 {
            color: white;
        }

        .donation .section-title p {
            color: rgba(255, 255, 255, 0.8);
        }

        .donation-form {
            max-width: 600px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 40px;
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
        }

        .donation-amounts {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .amount-option {
            flex: 1;
            min-width: 100px;
            padding: 12px;
            background-color: rgba(255, 255, 255, 0.2);
            border: 2px solid transparent;
            border-radius: 4px;
            color: white;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
        }

        .amount-option:hover, .amount-option.active {
            background-color: var(--secondary);
            color: #333;
            border-color: var(--secondary);
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 70px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 50px;
        }

        .footer-column h3 {
            font-size: 1.3rem;
            margin-bottom: 25px;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-column h3:after {
            content: '';
            position: absolute;
            width: 40px;
            height: 2px;
            background-color: var(--secondary);
            bottom: 0;
            left: 0;
        }

        .footer-column p {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            transition: color 0.3s;
        }

        .footer-links a:hover {
            color: var(--secondary);
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            background-color: var(--secondary);
            color: var(--dark);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.8rem;
            }
            
            .about-content {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            nav ul {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: white;
                flex-direction: column;
                padding: 20px 0;
                box-shadow: 0 10px 15px rgba(0,0,0,0.1);
            }

            nav ul.active {
                display: flex;
            }

            nav ul li {
                margin: 0;
                text-align: center;
                padding: 15px 0;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .section-title h2 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <div class="logo-img">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <div class="logo-text">
                    <h1>Yayasan Kita</h1>
                    <p>Berbagi Kebaikan, Membangun Harapan</p>
                </div>
            </div>
            
            <div class="mobile-menu-btn" id="mobileMenuBtn">
                <i class="fas fa-bars"></i>
            </div>
            
            <nav>
                <ul id="mainMenu">
                    <li><a href="#home" class="active">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#programs">Program</a></li>
                    <li><a href="#news">Berita</a></li>
                    <li><a href="#gallery">Galeri</a></li>
                    <li><a href="#donation">Donasi</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h1>Bersama Membangun Masa Depan yang Lebih Baik</h1>
            <p>Yayasan Kita berkomitmen untuk memberikan bantuan pendidikan, kesehatan, dan kesejahteraan bagi masyarakat yang membutuhkan. Mari bersama-sama wujudkan perubahan yang berarti.</p>
            <div class="hero-buttons">
                <a href="#donation" class="btn">Donasi Sekarang</a>
                <a href="#programs" class="btn btn-primary">Lihat Program</a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="section" id="about">
        <div class="container">
            <div class="section-title">
                <h2>Tentang Yayasan Kita</h2>
                <p>Yayasan Kita adalah organisasi nirlaba yang didirikan pada tahun 2010 dengan misi untuk meningkatkan kualitas hidup masyarakat melalui berbagai program sosial dan kemanusiaan.</p>
            </div>
            
            <div class="about-content">
                <div class="about-img">
                    <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1174&q=80" alt="Kegiatan Yayasan">
                </div>
                <div class="about-text">
                    <h3>Visi & Misi Kami</h3>
                    <p><strong>Visi:</strong> Menjadi yayasan terdepan dalam pemberdayaan masyarakat untuk mencapai kehidupan yang lebih sejahtera dan bermartabat.</p>
                    <p><strong>Misi:</strong></p>
                    <ul>
                        <li>Memberikan bantuan pendidikan bagi anak-anak kurang mampu</li>
                        <li>Menyediakan akses kesehatan bagi masyarakat prasejahtera</li>
                        <li>Melakukan pemberdayaan ekonomi melalui pelatihan dan modal usaha</li>
                        <li>Memberikan respons cepat dalam situasi bencana dan darurat</li>
                    </ul>
                    <p>Selama lebih dari 10 tahun, Yayasan Kita telah membantu lebih dari 50.000 penerima manfaat di seluruh Indonesia melalui berbagai program yang berkelanjutan.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="section" id="programs" style="background-color: #f5f7fa;">
        <div class="container">
            <div class="section-title">
                <h2>Program Unggulan</h2>
                <p>Kami memiliki berbagai program yang dirancang untuk menjawab kebutuhan masyarakat di berbagai aspek kehidupan.</p>
            </div>
            
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-img">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Program Pendidikan">
                    </div>
                    <div class="program-content">
                        <span class="program-status status-aktif">Aktif</span>
                        <h3>Beasiswa Cerdas</h3>
                        <p>Program pemberian beasiswa bagi siswa berprestasi dari keluarga kurang mampu untuk melanjutkan pendidikan hingga perguruan tinggi.</p>
                        <a href="#" class="btn">Detail Program</a>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-img">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80" alt="Program Kesehatan">
                    </div>
                    <div class="program-content">
                        <span class="program-status status-aktif">Aktif</span>
                        <h3>Klinik Sehat</h3>
                        <p>Layanan kesehatan gratis dan penyediaan obat-obatan bagi masyarakat prasejahtera di daerah terpencil.</p>
                        <a href="#" class="btn">Detail Program</a>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-img">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1011&q=80" alt="Program Pemberdayaan">
                    </div>
                    <div class="program-content">
                        <span class="program-status status-aktif">Aktif</span>
                        <h3>Usaha Mandiri</h3>
                        <p>Pelatihan keterampilan dan pemberian modal usaha bagi ibu-ibu kepala keluarga dan pemuda putus sekolah.</p>
                        <a href="#" class="btn">Detail Program</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="section" id="news">
        <div class="container">
            <div class="section-title">
                <h2>Berita Terbaru</h2>
                <p>Ikuti perkembangan terbaru kegiatan dan program Yayasan Kita.</p>
            </div>
            
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-img">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Berita 1">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> 15 Juni 2023</span>
                            <span><i class="far fa-eye"></i> 245</span>
                        </div>
                        <h3>Penyaluran Bantuan untuk Korban Banjir di Kalimantan</h3>
                        <p>Tim Yayasan Kita telah menyalurkan bantuan berupa paket sembako, obat-obatan, dan perlengkapan kebersihan bagi 500 keluarga terdampak banjir.</p>
                        <a href="#" class="btn">Baca Selengkapnya</a>
                    </div>
                </div>
                
                <div class="news-card">
                    <div class="news-img">
                        <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Berita 2">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> 10 Juni 2023</span>
                            <span><i class="far fa-eye"></i> 189</span>
                        </div>
                        <h3>Wisuda 50 Penerima Beasiswa Angkatan 2023</h3>
                        <p>Sebanyak 50 penerima beasiswa Yayasan Kita berhasil menyelesaikan pendidikan dan diwisuda dari berbagai perguruan tinggi ternama.</p>
                        <a href="#" class="btn">Baca Selengkapnya</a>
                    </div>
                </div>
                
                <div class="news-card">
                    <div class="news-img">
                        <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Berita 3">
                    </div>
                    <div class="news-content">
                        <div class="news-meta">
                            <span><i class="far fa-calendar"></i> 5 Juni 2023</span>
                            <span><i class="far fa-eye"></i> 312</span>
                        </div>
                        <h3>Pelatihan Kewirausahaan Bagi 100 Ibu Rumah Tangga</h3>
                        <p>Yayasan Kita menyelenggarakan pelatihan kewirausahaan dan pembuatan produk unggulan daerah untuk meningkatkan ekonomi keluarga.</p>
                        <a href="#" class="btn">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Donation Section -->
    <section class="section donation" id="donation">
        <div class="container">
            <div class="section-title">
                <h2>Mari Berbagi Kebaikan</h2>
                <p>Setiap donasi yang Anda berikan akan langsung disalurkan kepada mereka yang membutuhkan. Bersama kita bisa membuat perubahan.</p>
            </div>
            
            <div class="donation-form">
                <h3 style="margin-bottom: 30px; text-align: center;">Form Donasi</h3>
                <form id="donationForm">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" id="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Masukkan email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="telepon">Nomor Telepon</label>
                        <input type="tel" id="telepon" class="form-control" placeholder="Masukkan nomor telepon">
                    </div>
                    
                    <div class="form-group">
                        <label>Jumlah Donasi (Rp)</label>
                        <div class="donation-amounts">
                            <div class="amount-option" data-amount="50000">50.000</div>
                            <div class="amount-option" data-amount="100000">100.000</div>
                            <div class="amount-option active" data-amount="250000">250.000</div>
                            <div class="amount-option" data-amount="500000">500.000</div>
                            <div class="amount-option" data-amount="1000000">1.000.000</div>
                        </div>
                        <input type="number" id="jumlah" class="form-control" placeholder="Atau masukkan jumlah lain" min="10000" step="10000" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="pesan">Pesan (Opsional)</label>
                        <textarea id="pesan" class="form-control" rows="4" placeholder="Tulis pesan atau doa untuk penerima donasi"></textarea>
                    </div>
                    
                    <div class="form-group" style="display: flex; align-items: center;">
                        <input type="checkbox" id="anonim" style="margin-right: 10px;">
                        <label for="anonim" style="margin-bottom: 0;">Sembunyikan nama saya (donasi anonim)</label>
                    </div>
                    
                    <button type="submit" class="btn" style="width: 100%; background-color: var(--secondary); color: #333; font-weight: bold; padding: 15px;">Donasi Sekarang</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Yayasan Kita</h3>
                    <p>Berkomitmen untuk memberikan bantuan pendidikan, kesehatan, dan kesejahteraan bagi masyarakat yang membutuhkan.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Menu Cepat</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Beranda</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#programs">Program</a></li>
                        <li><a href="#news">Berita</a></li>
                        <li><a href="#donation">Donasi</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Kontak Kami</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> Jl. Kemanusiaan No. 123, Jakarta 10110</li>
                        <li><i class="fas fa-phone"></i> (021) 1234-5678</li>
                        <li><i class="fas fa-envelope"></i> info@yayasankita.org</li>
                        <li><i class="fas fa-clock"></i> Senin - Jumat: 08:00 - 17:00</li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Laporan Keuangan</h3>
                    <p>Transparansi keuangan adalah prioritas kami. Unduh laporan keuangan terbaru Yayasan Kita.</p>
                    <a href="#" class="btn" style="background-color: rgba(255,255,255,0.1); color: white; border: 1px solid rgba(255,255,255,0.3);">Download Laporan</a>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 Yayasan Kita. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', function() {
            document.getElementById('mainMenu').classList.toggle('active');
            this.innerHTML = this.innerHTML.includes('bars') ? 
                '<i class="fas fa-times"></i>' : 
                '<i class="fas fa-bars"></i>';
        });

        // Smooth Scrolling for Anchor Links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Close mobile menu if open
                document.getElementById('mainMenu').classList.remove('active');
                document.getElementById('mobileMenuBtn').innerHTML = '<i class="fas fa-bars"></i>';
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Active Menu Item on Scroll
        window.addEventListener('scroll', function() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('nav ul li a');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if(pageYOffset >= (sectionTop - 100)) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if(link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        });

        // Donation Amount Selection
        document.querySelectorAll('.amount-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.amount-option').forEach(opt => {
                    opt.classList.remove('active');
                });
                this.classList.add('active');
                document.getElementById('jumlah').value = this.getAttribute('data-amount');
            });
        });

        // Donation Form Submission
        document.getElementById('donationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nama = document.getElementById('nama').value;
            const email = document.getElementById('email').value;
            const jumlah = document.getElementById('jumlah').value;
            
            // In a real application, you would send this data to the server
            // For now, we'll just show an alert
            alert(`Terima kasih ${nama}! Donasi sebesar Rp ${parseInt(jumlah).toLocaleString('id-ID')} telah berhasil direkam. Konfirmasi akan dikirim ke email ${email}.`);
            
            // Reset form
            this.reset();
            document.querySelectorAll('.amount-option').forEach(opt => {
                opt.classList.remove('active');
            });
            document.querySelector('.amount-option[data-amount="250000"]').classList.add('active');
        });

        // Initialize with some data
        window.addEventListener('DOMContentLoaded', function() {
            // Set current year in footer
            document.querySelector('.footer-bottom p').innerHTML = `&copy; ${new Date().getFullYear()} Yayasan Kita. Seluruh hak cipta dilindungi.`;
        });
    </script>
</body>
</html>