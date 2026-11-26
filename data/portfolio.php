<?php
// Centralized CV & 3D Portfolio Data for Syahriel Andika
// Total Verified Credentials: 67 (64 Sertifikat + 3 SK Resmi Organisasi)

$profile = [
    'name'      => 'Syahriel Andika',
    'tagline'   => 'Undergraduate PAI UNUGIRI · Educational Technologist · Web & Cyber Security Developer',
    'bio'       => 'Mahasiswa S1 Program Studi Pendidikan Agama Islam (PAI) Fakultas Tarbiyah, Universitas Nahdlatul Ulama Sunan Giri (UNUGIRI) Bojonegoro, yang berfokus pada pengembangan teknologi web, sistem informasi, kecerdasan buatan pendidikan, dan keamanan siber melalui ILMUNA Digital.',
    'email'     => 'syahriel.andika28@gmail.com',
    'phone'     => '085117100227',
    'phone_wa'  => '6285117100227',
    'location'  => 'Bojonegoro & Lumajang, Jawa Timur',
    'photo'     => 'assets/img/Photo.jpg?v=' . (@filemtime(__DIR__ . '/../assets/img/Photo.jpg') ?: time()),
    'site_url'  => 'https://about.ilmuna.my.id',
];

$skills = [
    [
        'title' => 'Web & Full-Stack Dev',
        'sub'   => 'PHP 8 · JavaScript · Front-End · CMS',
        'level' => 'Utama',
        'accent'=> 'teal'
    ],
    [
        'title' => 'Cyber Security & WAF',
        'sub'   => 'Guardian Dome · Traffic Filtering · Hardening',
        'level' => 'Spesialis',
        'accent'=> 'navy'
    ],
    [
        'title' => 'AI & EdTech Systems',
        'sub'   => 'Agentic AI · LLM Automation · LMS Design',
        'level' => 'Inovasi',
        'accent'=> 'sky'
    ],
    [
        'title' => 'Digital Library & Data',
        'sub'   => 'Automasi Pustaka · Microsoft Fabric · UI/UX',
        'level' => 'Aktif',
        'accent'=> 'teal'
    ],
    [
        'title' => 'Pendamping Halal (PPPH)',
        'sub'   => 'Tersertifikasi BPJPH Kemenag RI & LPPPH EWI',
        'level' => 'Tersertifikasi',
        'accent'=> 'emerald'
    ],
    [
        'title' => 'Leadership & Kaderisasi',
        'sub'   => 'Ketua PAC · Koord. PC IPNU · BEM FT UNUGIRI',
        'level' => 'Aktif',
        'accent'=> 'navy'
    ]
];

$organizations = [
    [
        'role'    => 'Owner & Founder',
        'org'     => 'ILMUNA Digital',
        'period'  => 'Aktif',
        'desc'    => 'Pengembangan ekosistem teknologi pendidikan, sistem keamanan web berlapis, dan transformasi digitalisasi lembaga.',
        'url'     => 'https://ilmuna.my.id',
        'logo'    => 'assets/img/logos/ilmuna-official.png',
        'wide'    => true,
        'sk'      => null
    ],
    [
        'role'    => 'Departemen Komunikasi & Informasi',
        'org'     => 'BEM Fakultas Tarbiyah (FT) UNUGIRI',
        'period'  => '2026–2027',
        'desc'    => 'Pengurus resmi BEM Fakultas Tarbiyah UNUGIRI bidang komunikasi publik, media informasi, dan publikasi digital fakultas.',
        'url'     => '',
        'logo'    => 'assets/img/logos/unugiri.png',
        'wide'    => false,
        'sk'      => [
            'number' => 'SK Dekan FT No. 2788/SK/FT/071088/X/2026',
            'title'  => 'SK Dekan FT UNUGIRI — Pengurus BEM Fakultas Tarbiyah 2026/2027',
            'issuer' => 'Dekan Fakultas Tarbiyah UNUGIRI (19 Oktober 2026)',
            'desc'   => 'Keputusan Dekan Fakultas Tarbiyah UNUGIRI tentang Pengangkatan Pengurus BEM FT Periode 2026/2027 — Syahriel Andika sebagai Anggota Departemen Komunikasi & Informasi (Hal. 3).',
            'img'    => 'assets/img/certificates/sk_bem_ft_unugiri_p1.jpg',
            'pages'  => [
                'assets/img/certificates/sk_bem_ft_unugiri_p1.jpg',
                'assets/img/certificates/sk_bem_ft_unugiri_p2.jpg',
                'assets/img/certificates/sk_bem_ft_unugiri_p3.jpg',
            ]
        ]
    ],
    [
        'role'    => 'Ketua PAC',
        'org'     => 'PAC IPNU Kecamatan Tempeh, Lumajang',
        'period'  => '2026–2028',
        'desc'    => 'Memimpin Badan Pengurus Harian PAC IPNU Kecamatan Tempeh dalam tata kelola organisasi pelajar NU dan pengawalan kaderisasi.',
        'url'     => '',
        'logo'    => 'assets/img/logos/ipnu.png',
        'wide'    => false,
        'sk'      => [
            'number' => 'SP PC IPNU No. 067/PC/SP/XXIII/7354/V/26',
            'title'  => 'Surat Pengesahan PC IPNU — Ketua PAC IPNU Tempeh 2026–2028',
            'issuer' => 'PC IPNU Kabupaten Lumajang (16 Mei 2026)',
            'desc'   => 'Surat Pengesahan Susunan Pengurus PAC IPNU Kecamatan Tempeh Masa Khidmat 2026–2028 — Syahriel Andika ditetapkan sebagai Ketua (Hal. 2).',
            'img'    => 'assets/img/certificates/sk_pac_ipnu_tempeh_p1.jpg',
            'pages'  => [
                'assets/img/certificates/sk_pac_ipnu_tempeh_p1.jpg',
                'assets/img/certificates/sk_pac_ipnu_tempeh_p2.jpg',
            ]
        ]
    ],
    [
        'role'    => 'Koordinator Departemen Kaderisasi',
        'org'     => 'PC IPNU Kabupaten Lumajang',
        'period'  => '2025–2027',
        'desc'    => 'Merumuskan kurikulum kaderisasi serta mengawal pelaksanaan MAKESTA dan LAKMUD tingkat Kabupaten Lumajang.',
        'url'     => '',
        'logo'    => 'assets/img/logos/ipnu.png',
        'wide'    => false,
        'sk'      => [
            'number' => 'SR PW IPNU Jatim No. 143/PW/SR/XXV/7354/IV/24',
            'title'  => 'Surat Rekomendasi Pengesahan PW IPNU Jatim — PC IPNU Lumajang 2025–2027',
            'issuer' => 'PW IPNU Provinsi Jawa Timur (29 Mei 2025)',
            'desc'   => 'Surat Rekomendasi Pengesahan Susunan Pengurus PC IPNU Kabupaten Lumajang Masa Khidmat 2025–2027 — Syahriel Andika sebagai Koordinator Departemen Kaderisasi (Hal. 3).',
            'img'    => 'assets/img/certificates/sk_pc_ipnu_lumajang_p1.jpg',
            'pages'  => [
                'assets/img/certificates/sk_pc_ipnu_lumajang_p1.jpg',
                'assets/img/certificates/sk_pc_ipnu_lumajang_p2.jpg',
                'assets/img/certificates/sk_pc_ipnu_lumajang_p3.jpg',
            ]
        ]
    ],
    [
        'role'    => 'Sekretaris Pelaksana',
        'org'     => 'KPUM-U UNUGIRI (Pemilihan Raya Mahasiswa)',
        'period'  => 'Pemira 2025',
        'desc'    => 'Komite Pelaksana Sekretaris pada Komisi Pemilihan Umum Mahasiswa Universitas Nahdlatul Ulama Sunan Giri Bojonegoro dalam penyelenggaraan Pemilihan Raya Mahasiswa Tahun 2025.',
        'url'     => '',
        'logo'    => 'assets/img/logos/unugiri.png',
        'wide'    => false,
        'sk'      => [
            'number' => 'Struktur Kepengurusan KPUM-U UNUGIRI Tahun 2025',
            'title'  => 'Struktur Kepengurusan KPUM-U UNUGIRI — Pemilihan Raya 2025',
            'issuer' => 'Komisi Pemilihan Umum Mahasiswa (KPUM-U) UNUGIRI Bojonegoro',
            'desc'   => 'Dokumen resmi Struktur Kepengurusan KPUM-U UNUGIRI Tahun 2025 — Syahriel Andika sebagai Komite Pelaksana Sekretaris (Hal. 1).',
            'img'    => 'assets/img/certificates/sk_kpum_unugiri_2025_p1.jpg',
            'pages'  => [
                'assets/img/certificates/sk_kpum_unugiri_2025_p1.jpg',
                'assets/img/certificates/sk_kpum_unugiri_2025_p2.jpg',
            ]
        ]
    ],
    [
        'role'    => 'Tim IT',
        'org'     => 'Sahabat Perpustakaan UNUGIRI',
        'period'  => '2024–Aktif',
        'desc'    => 'Pengembangan portal layanan perpustakaan digital dan otomasi sistem informasi pustaka Universitas Nahdlatul Ulama Sunan Giri.',
        'url'     => 'https://library.unugiri.ac.id',
        'logo'    => 'assets/img/logos/perpustakaan-unugiri.png',
        'wide'    => false,
        'sk'      => null
    ],
    [
        'role'    => 'Pendamping Proses Produk Halal (PPPH)',
        'org'     => 'LPPPH Edukasi Wakaf Indonesia · BPJPH RI',
        'period'  => '2025–Aktif',
        'desc'    => 'Halal Advisor & Pendamping sertifikasi halal resmi tersertifikasi BPJPH Kementerian Agama RI untuk UMKM.',
        'url'     => '',
        'logo'    => 'assets/img/favicon.png',
        'wide'    => false,
        'sk'      => null
    ],
    [
        'role'    => 'Koordinator Litbang',
        'org'     => 'DA Gajah Mada',
        'period'  => 'Purna Tugas',
        'desc'    => 'Penelitian dan pengembangan program kepramukaan penegak serta tata kelola teknologi informasi ambalan.',
        'url'     => '',
        'logo'    => 'assets/img/logos/da-gajah-mada.png',
        'wide'    => false,
        'sk'      => null
    ],
    [
        'role'    => 'Koordinator Sie Keamanan',
        'org'     => 'DKG Siliwangi',
        'period'  => 'Purna Tugas',
        'desc'    => 'Koordinasi pengamanan teknis kegiatan lapangan dan mitigasi risiko operasional kepanduan.',
        'url'     => '',
        'logo'    => 'assets/img/logos/dkg-siliwangi.svg',
        'wide'    => false,
        'sk'      => null
    ]
];

$kaderisasi = [
    [
        'title' => 'MAKESTA',
        'full'  => 'Masa Kesetiaan Anggota',
        'year'  => '2023',
        'place' => 'PR IPNU-IPPNU Tumpeng',
        'org'   => 'IPNU-IPPNU',
        'logo'  => 'assets/img/logos/ipnu.png',
        'level' => 1
    ],
    [
        'title' => 'LAKMUD',
        'full'  => 'Latihan Kader Muda',
        'year'  => '2024',
        'place' => 'PAC IPNU-IPPNU Sukodono',
        'org'   => 'IPNU-IPPNU',
        'logo'  => 'assets/img/logos/ipnu.png',
        'level' => 2
    ],
    [
        'title' => 'LATIN-LATPEL',
        'full'  => 'Latihan Instruktur & Latihan Pelatih',
        'year'  => '2025',
        'place' => 'PC IPNU-IPPNU Sumenep',
        'org'   => 'IPNU-IPPNU',
        'logo'  => 'assets/img/logos/ipnu.png',
        'level' => 3
    ],
    [
        'title' => 'PKD',
        'full'  => 'Pelatihan Kader Dasar',
        'year'  => 'Mei 2026',
        'place' => 'PAC GP Ansor Yosowilangun, Kunir, Tempeh',
        'org'   => 'GP Ansor',
        'logo'  => 'assets/img/logos/ansor.png',
        'level' => 4
    ],
    [
        'title' => 'PKL',
        'full'  => 'Pelatihan Kader Lanjutan',
        'year'  => 'Oktober 2026',
        'place' => 'PC GP Ansor Bojonegoro',
        'org'   => 'GP Ansor',
        'logo'  => 'assets/img/logos/ansor.png',
        'level' => 5
    ]
];

// ── RIWAYAT KADERISASI NON-FORMAL (Dengan Dokumentasi Foto) ────────────────
$kaderisasi_nonformal = [
    [
        'title'  => 'Madrasah Jurnalistik (Batch #1)',
        'org'    => 'LTN PCNU Kabupaten Lumajang',
        'year'   => 'Batch #1',
        'badge'  => 'Jurnalistik & Media',
        'desc'   => 'Pelatihan kaderisasi non-formal bidang jurnalistik, penulisan berita, literasi media, dan dakwah digital bersama Lembaga Ta\'lif wan Nasyr (LTN) PCNU Lumajang.',
        'photos' => [
            'assets/img/dokumentasi/madrasah_jurnalistik.jpg'
        ]
    ],
    [
        'title'  => 'Diklat Kebencanaan LPBI NU',
        'org'    => 'LPBI NU Kabupaten Lumajang & TNI',
        'year'   => 'Januari 2024',
        'badge'  => 'Tanggap Bencana',
        'desc'   => 'Pendidikan dan pelatihan lapangan penanggulangan bencana, manajemen krisis, evakuasi pesisir, dan kesiapsiagaan relawan LPBI NU.',
        'photos' => [
            'assets/img/dokumentasi/diklat_lpbi_nu.jpg'
        ]
    ],
    [
        'title'  => 'Diklatsar Search and Rescue (SAR) Kanjuruhan',
        'org'    => 'SAR Kanjuruhan · Angkatan ke-3',
        'year'   => 'Mei 2024',
        'badge'  => 'SAR & Vertical Rescue',
        'desc'   => 'Latihan dasar Search and Rescue (SAR) dan pengukuhan anggota Angkatan ke-3 (24–26 Mei 2024), termasuk teknik vertical rescue, harness, dan pertolongan medan ekstrem.',
        'photos' => [
            'assets/img/dokumentasi/diklatsar_sar_pengukuhan.jpg',
            'assets/img/dokumentasi/diklatsar_sar_vertical.jpg'
        ]
    ]
];

// ── RIWAYAT AKSI KEMANUSIAAN 2024 (Dengan Dokumentasi Foto) ────────────────
$aksi_kemanusiaan = [
    [
        'title'    => 'Tanggap Darurat Kebakaran Jatigono',
        'location' => 'Jatigono, Kec. Kunir, Lumajang',
        'year'     => '2024',
        'role'     => 'Relawan LPBI NU',
        'desc'     => 'Aksi respon cepat, asesmen kerusakan rumah warga, serta koordinasi lapangan bersama aparat kepolisian pada insiden kebakaran di Jatigono, Kunir, Lumajang.',
        'photos'   => [
            'assets/img/dokumentasi/aksi_kebakaran_jatigono.jpg'
        ]
    ],
    [
        'title'    => 'Tanggap Darurat Banjir Semeru 2024',
        'location' => 'Kawasan Terdampak Semeru, Lumajang',
        'year'     => '2024',
        'role'     => 'Relawan LPBI NU & Satgas',
        'desc'     => 'Aksi kemanusiaan penyaluran bantuan logistik langsung kepada warga terdampak banjir lahar Gunung Semeru serta pemantauan pemukiman bersama tim Satgas.',
        'photos'   => [
            'assets/img/dokumentasi/aksi_banjir_semeru_bantuan.jpg',
            'assets/img/dokumentasi/aksi_banjir_semeru_lapangan.jpg'
        ]
    ],
    [
        'title'    => 'Operasi Search and Rescue (SAR) 2024',
        'location' => 'Medan Operasi SAR Gabungan',
        'year'     => '2024',
        'role'     => 'Tim Rescue Gabungan',
        'desc'     => 'Keterlibatan langsung sebagai personel tim rescue dalam operasi pencarian, penyelamatan, dan penyisiran medan berat pada tahun 2024.',
        'photos'   => [
            'assets/img/dokumentasi/aksi_operasi_sar_2024.jpg'
        ]
    ]
];

// ── WEBSITE & SISTEM (Grouped into Interactive 3D Folders) ─────────────────
$systems = [
    [
        'id'       => 'web-ilmuna',
        'name'     => 'ILMUNA Digital',
        'type'     => 'Main Digital Ecosystem & EdTech Hub',
        'folder'   => 'edtech-ilmuna',
        'category' => 'Ekosistem ILMUNA',
        'domain'   => 'ilmuna.my.id',
        'status'   => 'Live Production',
        'desc'     => 'Platform utama ILMUNA Digital yang menaungi pengembangan solusi teknologi pendidikan, inovasi web, dan layanan digital lembaga.',
        'url'      => 'https://ilmuna.my.id',
        'logo'     => 'assets/img/logos/ilmuna-official.png',
        'wide'     => true,
        'accent'   => 'teal',
        'tags'     => ['EdTech', 'Ecosystem', 'PHP 8', 'UI 3D']
    ],
    [
        'id'       => 'web-learn',
        'name'     => 'learn.ILMUNA',
        'type'     => 'Modular Learning Management System (LMS)',
        'folder'   => 'edtech-ilmuna',
        'category' => 'Ekosistem ILMUNA',
        'domain'   => 'learn.ilmuna.my.id',
        'status'   => 'Live Production',
        'desc'     => 'Platform pembelajaran digital interaktif berbasis web dengan autentikasi terintegrasi, kelas modular, dan manajemen materi terstruktur.',
        'url'      => 'https://learn.ilmuna.my.id',
        'logo'     => 'assets/img/logos/ilmuna-learn.png',
        'wide'     => true,
        'accent'   => 'sky',
        'tags'     => ['LMS', 'EdTech', 'E-Learning', 'PHP']
    ],
    [
        'id'       => 'web-margo-one',
        'name'     => 'Margo One — Ilmuna SSO',
        'type'     => 'Centralized Identity Provider (IdP) & Single Sign-On',
        'folder'   => 'edtech-ilmuna',
        'category' => 'Ekosistem ILMUNA',
        'domain'   => 'margo-one.ilmuna.my.id',
        'status'   => 'Live Production',
        'desc'     => 'Portal Identity Provider & Single Sign-On (OAuth 2.0 / OIDC JWT RS256) terpusat ekosistem ILMUNA dengan integrasi Google OAuth, Agenda Kaldik real-time, PWA, dan Web Push Notification.',
        'url'      => 'https://margo-one.ilmuna.my.id',
        'logo'     => 'assets/img/logos/margo-one-sso.png',
        'wide'     => false,
        'accent'   => 'navy',
        'tags'     => ['SSO / OIDC', 'JWT RS256', 'Google OAuth', 'PWA Push']
    ],
    [
        'id'       => 'web-usman',
        'name'     => 'Usman Roin Official',
        'type'     => 'Academic & Literary Publication Portal',
        'folder'   => 'akademik-publikasi',
        'category' => 'Portal Akademik',
        'domain'   => 'usmanroin.com',
        'status'   => 'Live Production',
        'desc'     => 'Website resmi & rumah publikasi literasi "Suara Literasi Saya & Anda" dengan manajemen artikel ilmiah dan identitas digital akademisi.',
        'url'      => 'https://usmanroin.com',
        'logo'     => 'assets/img/logos/usman-roin.png',
        'wide'     => true,
        'accent'   => 'amber',
        'tags'     => ['Web Dev', 'Academic CMS', 'Literasi', 'SEO']
    ],
    [
        'id'       => 'web-perpus',
        'name'     => 'Perpustakaan Digital UNUGIRI',
        'type'     => 'Institutional Digital Library & Information Portal',
        'folder'   => 'akademik-publikasi',
        'category' => 'Portal Akademik',
        'domain'   => 'library.unugiri.ac.id',
        'status'   => 'Live Production',
        'desc'     => 'Sistem informasi dan portal layanan digital Perpustakaan Universitas Nahdlatul Ulama Sunan Giri Bojonegoro (NPP: 3522152D0000001).',
        'url'      => 'https://library.unugiri.ac.id',
        'logo'     => 'assets/img/logos/perpustakaan-unugiri.png',
        'wide'     => false,
        'accent'   => 'emerald',
        'tags'     => ['Digital Library', 'UNUGIRI', 'Information System']
    ],
    [
        'id'       => 'web-waf',
        'name'     => 'WAF Guardian Dome',
        'type'     => 'Web Application Firewall & Telegram Sentinel',
        'folder'   => 'cyber-security',
        'category' => 'Cyber Security',
        'domain'   => 'shield.ilmuna.internal',
        'status'   => 'Active Shield',
        'desc'     => 'Sistem perlindungan aplikasi web berlapis untuk mitigasi SQLi, XSS, LFI, scanner berbahaya, rate-limit, dan pelaporan real-time Telegram Sentinel.',
        'url'      => '',
        'logo'     => 'assets/img/logos/waf-guardian-dome.png',
        'wide'     => false,
        'accent'   => 'navy',
        'tags'     => ['WAF', 'Cyber Security', 'PHP Hardening', 'Sentinel']
    ]
];

$website_folders = [
    'semua' => [
        'name'    => 'Semua Website & Sistem',
        'code'    => 'ALL WEB',
        'sub'     => 'Buka seluruh portofolio sistem & website aktif',
        'accent'  => 'navy',
        'count'   => count($systems),
        'previews'=> [
            'assets/img/logos/ilmuna-learn.png',
            'assets/img/logos/usman-roin.png',
            'assets/img/logos/waf-guardian-dome.png',
        ]
    ],
    'edtech-ilmuna' => [
        'name'    => 'Ekosistem ILMUNA Digital',
        'code'    => 'EDTECH',
        'sub'     => 'ILMUNA Digital Hub, learn.ILMUNA LMS & Margo One SSO',
        'accent'  => 'teal',
        'count'   => count(array_filter($systems, fn($s) => $s['folder'] === 'edtech-ilmuna')),
        'previews'=> [
            'assets/img/logos/ilmuna-official.png',
            'assets/img/logos/ilmuna-learn.png',
            'assets/img/logos/margo-one-sso.png',
        ]
    ],
    'akademik-publikasi' => [
        'name'    => 'Portal Akademik & Literasi',
        'code'    => 'PORTAL',
        'sub'     => 'Usman Roin Official & Perpustakaan UNUGIRI',
        'accent'  => 'amber',
        'count'   => count(array_filter($systems, fn($s) => $s['folder'] === 'akademik-publikasi')),
        'previews'=> [
            'assets/img/logos/usman-roin.png',
            'assets/img/logos/perpustakaan-unugiri.png',
            'assets/img/logos/unugiri.png',
        ]
    ],
    'cyber-security' => [
        'name'    => 'Keamanan Siber & WAF',
        'code'    => 'SHIELD',
        'sub'     => 'Infrastruktur WAF Guardian Dome & Defense',
        'accent'  => 'sky',
        'count'   => count(array_filter($systems, fn($s) => $s['folder'] === 'cyber-security')),
        'previews'=> [
            'assets/img/logos/waf-guardian-dome.png',
            'assets/img/favicon.png',
            'assets/img/logos/ilmuna-official.png',
        ]
    ]
];

// ── ALL VERIFIED CERTIFICATES & SK RESMI (Total: 67 Berkas) ──
$all_certificates = [
    [
        'id'       => 'sk-01',
        'title'    => 'SK Dekan FT UNUGIRI — Pengurus BEM Fakultas Tarbiyah 2026/2027',
        'issuer'   => 'Dekan Fakultas Tarbiyah UNUGIRI (No. 2788/SK/FT/071088/X/2026)',
        'folder'   => 'sk-organisasi',
        'category' => 'SK Resmi Kampus',
        'year'     => '2026',
        'desc'     => 'Keputusan Dekan Fakultas Tarbiyah UNUGIRI tentang Pengangkatan Pengurus BEM FT UNUGIRI Periode 2026/2027 — Syahriel Andika sebagai Anggota Departemen Komunikasi & Informasi (Lampiran Hal. 3).',
        'img'      => 'assets/img/certificates/sk_bem_ft_unugiri_p1.jpg',
        'pages'    => ['assets/img/certificates/sk_bem_ft_unugiri_p1.jpg', 'assets/img/certificates/sk_bem_ft_unugiri_p2.jpg', 'assets/img/certificates/sk_bem_ft_unugiri_p3.jpg']
    ],
    [
        'id'       => 'sk-02',
        'title'    => 'Surat Pengesahan PC IPNU — Ketua PAC IPNU Kec. Tempeh 2026–2028',
        'issuer'   => 'PC IPNU Kabupaten Lumajang (No. 067/PC/SP/XXIII/7354/V/26)',
        'folder'   => 'sk-organisasi',
        'category' => 'SK Pengesahan IPNU',
        'year'     => '2026',
        'desc'     => 'Surat Pengesahan resmi Susunan Pengurus PAC IPNU Kecamatan Tempeh Masa Khidmat 2026–2028 — Syahriel Andika ditetapkan sebagai Ketua Badan Pengurus Harian (Lampiran Hal. 2).',
        'img'      => 'assets/img/certificates/sk_pac_ipnu_tempeh_p1.jpg',
        'pages'    => ['assets/img/certificates/sk_pac_ipnu_tempeh_p1.jpg', 'assets/img/certificates/sk_pac_ipnu_tempeh_p2.jpg']
    ],
    [
        'id'       => 'sk-03',
        'title'    => 'Surat Rekomendasi Pengesahan PW IPNU Jatim — PC IPNU Lumajang 2025–2027',
        'issuer'   => 'PW IPNU Provinsi Jawa Timur (No. 143/PW/SR/XXV/7354/IV/24)',
        'folder'   => 'sk-organisasi',
        'category' => 'SK Pengesahan IPNU',
        'year'     => '2025',
        'desc'     => 'Surat Rekomendasi Pengesahan Susunan Pengurus PC IPNU Kabupaten Lumajang Masa Khidmat 2025–2027 — Syahriel Andika sebagai Koordinator Departemen Kaderisasi (Lampiran Hal. 3).',
        'img'      => 'assets/img/certificates/sk_pc_ipnu_lumajang_p1.jpg',
        'pages'    => ['assets/img/certificates/sk_pc_ipnu_lumajang_p1.jpg', 'assets/img/certificates/sk_pc_ipnu_lumajang_p2.jpg', 'assets/img/certificates/sk_pc_ipnu_lumajang_p3.jpg']
    ],
    [
        'id'       => 'sk-04',
        'title'    => 'Struktur Kepengurusan KPUM-U UNUGIRI — Pemilihan Raya Tahun 2025',
        'issuer'   => 'Komisi Pemilihan Umum Mahasiswa (KPUM-U) UNUGIRI Bojonegoro',
        'folder'   => 'sk-organisasi',
        'category' => 'SK Resmi Kampus',
        'year'     => '2025',
        'desc'     => 'Dokumen resmi Struktur Kepengurusan KPUM-U UNUGIRI Tahun 2025 dalam Pemilihan Raya Mahasiswa — Syahriel Andika sebagai Komite Pelaksana Sekretaris (Hal. 1).',
        'img'      => 'assets/img/certificates/sk_kpum_unugiri_2025_p1.jpg',
        'pages'    => ['assets/img/certificates/sk_kpum_unugiri_2025_p1.jpg', 'assets/img/certificates/sk_kpum_unugiri_2025_p2.jpg']
    ],
    [
        'id'       => 'tech-01',
        'title'    => 'Pelatihan Cyber Security bagi LKK PWNU Jawa Timur',
        'issuer'   => 'Dinas Kominfo Prov. Jawa Timur & BSrE-BSSN',
        'folder'   => 'teknologi-ai',
        'category' => 'Cyber Security',
        'year'     => '2025',
        'desc'     => 'Sertifikat resmi pelatihan keamanan siber bertanda tangan elektronik Balai Besar Sertifikasi Elektronik (BSrE-BSSN).',
        'img'      => 'assets/img/certificates/cert_komdigi_cyber_security.jpg'
    ],
    [
        'id'       => 'tech-02',
        'title'    => 'Penerapan Agentic AI dalam Sistem Otomasi Berbasis LLM',
        'issuer'   => 'Dinas Kominfo Prov. Jawa Timur, EJSC & BSrE-BSSN',
        'folder'   => 'teknologi-ai',
        'category' => 'Agentic AI & LLM',
        'year'     => '2025',
        'desc'     => 'Pelatihan arsitektur Agentic AI dan sistem otomasi alur kerja cerdas berbasis Large Language Model (LLM).',
        'img'      => 'assets/img/certificates/cert_komdigi_agentic_ai.jpg'
    ],
    [
        'id'       => 'tech-03',
        'title'    => 'Workshop Pemanfaatan AI: Etika dan Tanggung Jawab',
        'issuer'   => 'Dinas Kominfo Prov. Jawa Timur & BSrE-BSSN',
        'folder'   => 'teknologi-ai',
        'category' => 'AI Governance',
        'year'     => '2025',
        'desc'     => 'Workshop pemanfaatan kecerdasan buatan yang etis, aman, dan bertanggung jawab bertanda tangan elektronik BSrE-BSSN.',
        'img'      => 'assets/img/certificates/cert_komdigi_etika_ai.jpg'
    ],
    [
        'id'       => 'tech-04',
        'title'    => 'Certificate of Responsible AI — AI Upskilling Program (14 Jam)',
        'issuer'   => 'AI Opportunity Asia Pacific · AVPN · Google.org · ADB',
        'folder'   => 'teknologi-ai',
        'category' => 'Responsible AI',
        'year'     => '2025',
        'desc'     => 'Program AI Upskilling bersama Remote Skills Academy yang didukung oleh AVPN, Google.org, dan Asian Development Bank.',
        'img'      => 'assets/img/certificates/cert_responsible_ai_avpn.jpg'
    ],
    [
        'id'       => 'tech-05',
        'title'    => 'Training Completion: Berinovasi dengan AI (15 Learning Hours)',
        'issuer'   => 'Plan International Indonesia · Kemenpora · AVPN · Google.org · ADB',
        'folder'   => 'teknologi-ai',
        'category' => 'AI Innovation',
        'year'     => '2025',
        'desc'     => 'Pelatihan intensif 15 jam inovasi berbasis kecerdasan buatan yang diselenggarakan Yayasan Plan International Indonesia.',
        'img'      => 'assets/img/certificates/cert_berinovasi_ai_plan.jpg'
    ],
    [
        'id'       => 'tech-06',
        'title'    => 'InnovAItion: Menjaga Integritas Akademik dengan Gemini AI',
        'issuer'   => 'InnovAItion Live Workshop',
        'folder'   => 'teknologi-ai',
        'category' => 'Generative AI',
        'year'     => '2025',
        'desc'     => 'Workshop praktis pemanfaatan Gemini AI secara inovatif dan berintegritas untuk kebutuhan akademik.',
        'img'      => 'assets/img/certificates/cert_innovai_gemini.jpg'
    ],
    [
        'id'       => 'tech-07',
        'title'    => 'Belajar Dasar Pemrograman Web',
        'issuer'   => 'Dicoding Indonesia (ID: JLX15N97NZ72)',
        'folder'   => 'teknologi-ai',
        'category' => 'Web Development',
        'year'     => '2026',
        'desc'     => 'Sertifikasi kompetensi kelulusan kelas Belajar Dasar Pemrograman Web (HTML5, CSS3, Layouting Responsif).',
        'img'      => 'assets/img/certificates/cert_dicoding_web_dasar.jpg'
    ],
    [
        'id'       => 'tech-08',
        'title'    => 'Belajar Dasar Pemrograman JavaScript',
        'issuer'   => 'Dicoding Indonesia (ID: 07Z6J27EJXQR)',
        'folder'   => 'teknologi-ai',
        'category' => 'JavaScript',
        'year'     => '2026',
        'desc'     => 'Sertifikasi kompetensi kelulusan fundamental bahasa pemrograman JavaScript modern, OOP, dan asynchronous.',
        'img'      => 'assets/img/certificates/cert_dicoding_javascript.jpg'
    ],
    [
        'id'       => 'tech-09',
        'title'    => 'Belajar Membuat Front-End Web untuk Pemula',
        'issuer'   => 'Dicoding Indonesia (ID: 53XEKV17KXRN)',
        'folder'   => 'teknologi-ai',
        'category' => 'Front-End Web',
        'year'     => '2026',
        'desc'     => 'Sertifikasi pengembangan antarmuka web interaktif dengan DOM Manipulation, Event Handling, dan Web Storage.',
        'img'      => 'assets/img/certificates/cert_dicoding_frontend.jpg'
    ],
    [
        'id'       => 'tech-10',
        'title'    => 'Belajar Dasar AI (Artificial Intelligence)',
        'issuer'   => 'Dicoding Indonesia (ID: 81P25KQMNPOY)',
        'folder'   => 'teknologi-ai',
        'category' => 'Artificial Intelligence',
        'year'     => '2025',
        'desc'     => 'Sertifikasi pemahaman konsep dasar kecerdasan buatan, Machine Learning, Deep Learning, dan implementasi AI.',
        'img'      => 'assets/img/certificates/cert_dicoding_ai_dasar.jpg'
    ],
    [
        'id'       => 'tech-11',
        'title'    => 'Penerapan Data Science dengan Microsoft Fabric',
        'issuer'   => 'Dicoding Indonesia (ID: 1RXYQ80EKZVM)',
        'folder'   => 'teknologi-ai',
        'category' => 'Data Science',
        'year'     => '2026',
        'desc'     => 'Sertifikasi penerapan pipeline Data Science dan analitik data terintegrasi menggunakan Microsoft Fabric.',
        'img'      => 'assets/img/certificates/cert_dicoding_data_fabric.jpg'
    ],
    [
        'id'       => 'tech-12',
        'title'    => 'Akademi Santri Digital 2024 — Graphics Design',
        'issuer'   => 'Telkom Indonesia & Akademi Santri Digital',
        'folder'   => 'teknologi-ai',
        'category' => 'UI & Graphic Design',
        'year'     => '2024',
        'desc'     => 'Kelulusan program spesialisasi Desain Grafis pada Akademi Santri Digital 2024 bersama Telkom Indonesia.',
        'img'      => 'assets/img/certificates/cert_telkom_graphics_design.jpg'
    ],
    [
        'id'       => 'tech-13',
        'title'    => 'Workshop Cerdas Digital: Pemanfaatan AI di Lingkungan Akademik',
        'issuer'   => 'Diskominfo Prov. Jawa Timur & PW IPNU Jawa Timur',
        'folder'   => 'teknologi-ai',
        'category' => 'AI Akademik',
        'year'     => '2025',
        'desc'     => 'Workshop literasi dan etika pemanfaatan kecerdasan buatan bagi pelajar dan mahasiswa di Jawa Timur.',
        'img'      => 'assets/img/certificates/cert_cerdig_ai_ipnu.jpg'
    ],
    [
        'id'       => 'tech-14',
        'title'    => 'Webinar CERDIG: Jatim No Judol — Melawan Bahaya Judi Online',
        'issuer'   => 'Diskominfo Prov. Jawa Timur & PW IPNU Jawa Timur',
        'folder'   => 'teknologi-ai',
        'category' => 'Literasi Digital',
        'year'     => '2025',
        'desc'     => 'Edukasi keamanan digital dan pencegahan bahaya judi online bersama Lembaga Pers & Penerbitan PW IPNU Jatim.',
        'img'      => 'assets/img/certificates/cert_cerdig_no_judol.jpg'
    ],
    [
        'id'       => 'tech-15',
        'title'    => 'Santri Go Digital: Kemandirian Pesantren dengan Digital Marketing',
        'issuer'   => 'PC RMI NU Kota Malang',
        'folder'   => 'teknologi-ai',
        'category' => 'Digital Marketing',
        'year'     => '2024',
        'desc'     => 'Pelatihan transformasi digital pesantren dan strategi pemasaran digital bersama Rabithah Ma\'ahid Islamiyah NU.',
        'img'      => 'assets/img/certificates/cert_rmi_go_digital.jpg'
    ],
    [
        'id'       => 'intl-01',
        'title'    => 'Resource Mobilization to Meet Nutritional Needs in Emergencies',
        'issuer'   => 'UNICEF (Agora Learning Platform)',
        'folder'   => 'internasional',
        'category' => 'UNICEF Global',
        'year'     => '2021',
        'desc'     => 'Sertifikasi internasional UNICEF mengenai strategi mobilisasi sumber daya untuk situasi tanggap darurat kemanusiaan.',
        'img'      => 'assets/img/certificates/cert_unicef_resource_mob.jpg'
    ],
    [
        'id'       => 'intl-02',
        'title'    => 'Introduction to Post-Disaster Needs Assessment (PDNA)',
        'issuer'   => 'GFDRR · European Union · United Nations · The World Bank',
        'folder'   => 'internasional',
        'category' => 'UN & World Bank',
        'year'     => '2024',
        'desc'     => 'Sertifikasi internasional evaluasi kebutuhan pasca-bencana (PDNA) dari GFDRR, Uni Eropa, PBB, dan Bank Dunia.',
        'img'      => 'assets/img/certificates/cert_worldbank_un_pdna.jpg'
    ],
    [
        'id'       => 'intl-03',
        'title'    => 'International Observe the Moon Night 2023',
        'issuer'   => 'NASA (National Aeronautics and Space Administration)',
        'folder'   => 'internasional',
        'category' => 'NASA Space',
        'year'     => '2023',
        'desc'     => 'Sertifikat partisipasi global pengamatan astronomi International Observe the Moon Night 2023 dari NASA.',
        'img'      => 'assets/img/certificates/cert_nasa_observe_moon.jpg'
    ],
    [
        'id'       => 'intl-04',
        'title'    => 'WOSM Safe from Harm #2 for Scout Leaders (Score 100%)',
        'issuer'   => 'World Organization of the Scout Movement (WOSM)',
        'folder'   => 'internasional',
        'category' => 'WOSM Global',
        'year'     => '2023',
        'desc'     => 'Kelulusan kursus internasional perlindungan anak dan kepemimpinan aman WOSM dengan capaian nilai sempurna 100%.',
        'img'      => 'assets/img/certificates/cert_wosm_safe_from_harm.jpg'
    ],
    [
        'id'       => 'intl-05',
        'title'    => 'JOTA-JOTI 2023 World Scout Certificate (JID: 3ID78R)',
        'issuer'   => 'World Organization of the Scout Movement (WOSM)',
        'folder'   => 'internasional',
        'category' => 'WOSM Global',
        'year'     => '2023',
        'desc'     => 'Sertifikat partisipasi global Jamboree On The Air & Jamboree On The Internet tingkat dunia WOSM 2023.',
        'img'      => 'assets/img/certificates/cert_wosm_jota_joti.jpg'
    ],
    [
        'id'       => 'intl-06',
        'title'    => 'Visiting Lecturer & Student Mobility Program 2025',
        'issuer'   => 'UNUGIRI Bojonegoro & Universiti Islam Selangor (UIS)',
        'folder'   => 'internasional',
        'category' => 'Student Mobility',
        'year'     => '2025',
        'desc'     => 'Partisipasi akademik internasional dalam program Visiting Lecturer & Student Mobility kolaborasi UNUGIRI dan UIS Malaysia.',
        'img'      => 'assets/img/certificates/cert_unugiri_uis_mobility.jpg'
    ],
    [
        'id'       => 'intl-07',
        'title'    => 'International Webinar 2025 — BEM FEB Universitas Madura',
        'issuer'   => 'BEM Fakultas Ekonomi dan Bisnis Universitas Madura',
        'folder'   => 'internasional',
        'category' => 'International Webinar',
        'year'     => '2025',
        'desc'     => 'Partisipasi dalam forum webinar internasional yang diselenggarakan oleh BEM FEB Universitas Madura.',
        'img'      => 'assets/img/certificates/cert_unira_intl_webinar.jpg'
    ],
    [
        'id'       => 'diklat-01',
        'title'    => 'Panduan Praktis Mendesain Pembelajaran Mendalam',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Diklat Nasional',
        'year'     => '2026',
        'desc'     => 'Diklat Nasional 32 JP perancangan desain pembelajaran mendalam (Deep Learning) bagi pendidik.',
        'img'      => 'assets/img/certificates/cert_do_pembelajaran_mendalam_2026.jpg'
    ],
    [
        'id'       => 'diklat-02',
        'title'    => 'Strategi Pembelajaran Masa Kini: Efektif, Menyenangkan & Berdampak',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Diklat Nasional',
        'year'     => '2026',
        'desc'     => 'Diklat Nasional inovasi pedagogik dan strategi kelas interaktif yang menyenangkan dan berdampak.',
        'img'      => 'assets/img/certificates/cert_do_strategi_pembelajaran.jpg'
    ],
    [
        'id'       => 'diklat-03',
        'title'    => 'Optimalisasi Kemampuan Digital Pendidik dalam Kurikulum Nasional',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'EdTech Diklat',
        'year'     => '2026',
        'desc'     => 'Diklat Nasional penguatan literasi dan kompetensi teknologi digital pendidik pada Kurikulum Nasional.',
        'img'      => 'assets/img/certificates/cert_do_digital_pendidik.jpg'
    ],
    [
        'id'       => 'diklat-04',
        'title'    => 'Membuat Modul Pembelajaran Mendalam Berbantuan AI',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'AI in Education',
        'year'     => '2025',
        'desc'     => 'Diklat Nasional penyusunan modul ajar mendalam berbantuan Artificial Intelligence dalam Kurikulum Merdeka.',
        'img'      => 'assets/img/certificates/cert_do_modul_ai.jpg'
    ],
    [
        'id'       => 'diklat-05',
        'title'    => 'Mengenal Tes Kemampuan Akademik (TKA) di Satuan Pendidikan',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Webinar Nasional',
        'year'     => '2025',
        'desc'     => 'Webinar Nasional kebijakan dan implementasi Tes Kemampuan Akademik (TKA) pada satuan pendidikan.',
        'img'      => 'assets/img/certificates/cert_do_webinar_tka.jpg'
    ],
    [
        'id'       => 'diklat-06',
        'title'    => 'Mengajarkan Kepedulian Lingkungan Hidup Melalui Aksi Nyata',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Diklat Nasional',
        'year'     => '2025',
        'desc'     => 'Diklat Nasional integrasi pendidikan lingkungan hidup dan aksi berkelanjutan di sekolah.',
        'img'      => 'assets/img/certificates/cert_do_lingkungan_hidup.jpg'
    ],
    [
        'id'       => 'diklat-07',
        'title'    => 'Merancang Pembelajaran Mendalam yang Bermakna dan Reflektif',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Diklat Nasional',
        'year'     => '2025',
        'desc'     => 'Diklat Nasional perancangan kurikulum dan evaluasi pembelajaran mendalam yang reflektif.',
        'img'      => 'assets/img/certificates/cert_do_pembelajaran_reflektif.jpg'
    ],
    [
        'id'       => 'diklat-08',
        'title'    => 'Menerapkan Koding & Kecerdasan Artifisial (KKA) dalam Pembelajaran',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Coding & AI Ed',
        'year'     => '2025',
        'desc'     => 'Diklat Nasional strategi penerapan Koding dan Kecerdasan Artifisial berbasis Unplugged & Plugged Learning.',
        'img'      => 'assets/img/certificates/cert_do_kka_pembelajaran.jpg'
    ],
    [
        'id'       => 'diklat-09',
        'title'    => 'Mengenal Coding & Kecerdasan Artifisial untuk Pembelajaran Masa Depan',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Coding & AI Ed',
        'year'     => '2025',
        'desc'     => 'Diklat Nasional kebijakan dan pemanfaatan koding serta kecerdasan artifisial dalam pendidikan modern.',
        'img'      => 'assets/img/certificates/cert_do_coding_ai_masa_depan.jpg'
    ],
    [
        'id'       => 'diklat-10',
        'title'    => 'BIMTEK Nasional: ChatGPT untuk Menyusun Soal & Materi Ajar',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'BIMTEK AI',
        'year'     => '2025',
        'desc'     => 'Bimbingan teknis pemanfaatan prompt engineering ChatGPT untuk menyusun instrumen evaluasi dan bahan ajar.',
        'img'      => 'assets/img/certificates/cert_do_bimtek_chatgpt.jpg'
    ],
    [
        'id'       => 'diklat-11',
        'title'    => 'Pendidikan Karakter di Era Serba AI: Peluang & Tantangannya',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Pendidikan Karakter',
        'year'     => '2025',
        'desc'     => 'Diklat Nasional strategi penguatan akhlak dan pendidikan karakter peserta didik di era kecerdasan buatan.',
        'img'      => 'assets/img/certificates/cert_do_karakter_era_ai.jpg'
    ],
    [
        'id'       => 'diklat-12',
        'title'    => 'Penguatan Pendidikan Karakter yang Inklusif',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Pendidikan Karakter',
        'year'     => '2024',
        'desc'     => 'Diklat Nasional penerapan pendidikan karakter inklusif yang ramah bagi seluruh latar belakang siswa.',
        'img'      => 'assets/img/certificates/cert_do_karakter_inklusif.jpg'
    ],
    [
        'id'       => 'diklat-13',
        'title'    => 'Peran Teknologi dalam Pembelajaran Berdiferensiasi Kurikulum Merdeka',
        'issuer'   => 'Diklat Online · PT Sumber Belajar Bersama',
        'folder'   => 'diklat-pendidikan',
        'category' => 'Seminar Nasional',
        'year'     => '2024',
        'desc'     => 'Seminar Nasional berbagi praktik baik pemanfaatan teknologi untuk pembelajaran berdiferensiasi.',
        'img'      => 'assets/img/certificates/cert_do_berdiferensiasi.jpg'
    ],
    [
        'id'       => 'prof-01',
        'title'    => 'Sertifikat Tanda Lulus Pendamping Proses Produk Halal (PPH)',
        'issuer'   => 'BPJPH Kementerian Agama RI · Edukasi Wakaf Indonesia',
        'folder'   => 'kampus-halal',
        'category' => 'BPJPH Kemenag RI',
        'year'     => '2025',
        'desc'     => 'Sertifikat kelulusan resmi Pendamping Proses Produk Halal (PPPH) sesuai PMA No. 20 Tahun 2021.',
        'img'      => 'assets/img/certificates/cert_bpjph_pph.jpg'
    ],
    [
        'id'       => 'prof-02',
        'title'    => 'Lulus Pelatihan Halal Advisor (Predikat Memuaskan)',
        'issuer'   => 'LPPPH Edukasi Wakaf Indonesia',
        'folder'   => 'kampus-halal',
        'category' => 'Halal Advisor',
        'year'     => '2025',
        'desc'     => 'Sertifikat kompetensi Halal Advisor untuk pendampingan sertifikasi halal UMKM dengan hasil memuaskan.',
        'img'      => 'assets/img/certificates/cert_lppph_halal_advisor.jpg'
    ],
    [
        'id'       => 'prof-03',
        'title'    => 'Pelatihan Pendamping Proses Produk Halal (LMS GreatEdu)',
        'issuer'   => 'GreatEdu Learning Management System',
        'folder'   => 'kampus-halal',
        'category' => 'LMS GreatEdu',
        'year'     => '2025',
        'desc'     => 'Penyelesaian pelatihan terstruktur dan studi kasus pendampingan sertifikasi produk halal melalui LMS GreatEdu.',
        'img'      => 'assets/img/certificates/cert_greatedu_pph.jpg'
    ],
    [
        'id'       => 'prof-04',
        'title'    => 'Sahabat Perpustakaan UNUGIRI Periode 2',
        'issuer'   => 'Perpustakaan Universitas Nahdlatul Ulama Sunan Giri',
        'folder'   => 'kampus-halal',
        'category' => 'UNUGIRI Kampus',
        'year'     => '2025',
        'desc'     => 'Penghargaan penyelesaian program Sahabat Perpustakaan UNUGIRI Bojonegoro Semester Ganjil 2024/2025.',
        'img'      => 'assets/img/certificates/cert_sahabat_perpus_unugiri.jpg'
    ],
    [
        'id'       => 'prof-05',
        'title'    => 'Transformasi Pendidikan Islam & Etika Digital Era Society 5.0',
        'issuer'   => 'UNUGIRI Bojonegoro & STAINU Kotabumi Lampung',
        'folder'   => 'kampus-halal',
        'category' => 'Seminar Nasional',
        'year'     => '2026',
        'desc'     => 'Seminar Nasional kolaborasi membahas etika digital dan perlindungan hak anak dalam pendidikan Islam modern.',
        'img'      => 'assets/img/certificates/cert_unugiri_stainu_semnas.jpg'
    ],
    [
        'id'       => 'prof-06',
        'title'    => 'Capacity Building: Pencegahan Judi Online & Pinjol Ilegal',
        'issuer'   => 'Universitas Nahdlatul Ulama Sunan Giri Bojonegoro',
        'folder'   => 'kampus-halal',
        'category' => 'Capacity Building',
        'year'     => '2025',
        'desc'     => 'Kegiatan penguatan kapasitas mahasiswa bersama aparat penegak hukum terkait pencegahan kejahatan finansial digital.',
        'img'      => 'assets/img/certificates/cert_unugiri_capacity_building.jpg'
    ],
    [
        'id'       => 'prof-07',
        'title'    => 'PKKMB UNUGIRI 2024: Meretas Batas untuk Indonesia Emas',
        'issuer'   => 'Universitas Nahdlatul Ulama Sunan Giri Bojonegoro',
        'folder'   => 'kampus-halal',
        'category' => 'UNUGIRI Kampus',
        'year'     => '2024',
        'desc'     => 'Sertifikat kelulusan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru (PKKMB) UNUGIRI 2024.',
        'img'      => 'assets/img/certificates/cert_unugiri_pkkmb_2024.jpg'
    ],
    [
        'id'       => 'prof-08',
        'title'    => 'Pelatihan Jurnalis Muda Komprehensif (3 Bulan)',
        'issuer'   => 'Bidikin.com Media Redaksi',
        'folder'   => 'kampus-halal',
        'category' => 'Jurnalistik',
        'year'     => '2025',
        'desc'     => 'Penghargaan penyelesaian program intensif Pelatihan Jurnalis Muda Bidikin.com periode Agustus–November 2025.',
        'img'      => 'assets/img/certificates/cert_bidikin_jurnalis_muda.jpg'
    ],
    [
        'id'       => 'prof-09',
        'title'    => 'Introduction to Financial Literacy',
        'issuer'   => 'Dicoding Indonesia (ID: MEPJ23GYWP3V)',
        'folder'   => 'kampus-halal',
        'category' => 'Financial Literacy',
        'year'     => '2025',
        'desc'     => 'Sertifikasi dasar literasi keuangan, perencanaan anggaran, dan manajemen risiko finansial modern.',
        'img'      => 'assets/img/certificates/cert_dicoding_financial_literacy.jpg'
    ],
    [
        'id'       => 'prof-10',
        'title'    => 'Workshop Event Organizer: Perencanaan, Pelaksanaan & Evaluasi',
        'issuer'   => 'Prodi Manajemen Dakwah IAI Syarifuddin Lumajang',
        'folder'   => 'kampus-halal',
        'category' => 'Manajemen Event',
        'year'     => '2024',
        'desc'     => 'Workshop tata kelola acara profesional mencakup perencanaan strategis, eksekusi lapangan, dan evaluasi.',
        'img'      => 'assets/img/certificates/cert_iais_event_organizer.jpg'
    ],
    [
        'id'       => 'kad-01',
        'title'    => 'Sertifikat Kader LAKMUD (Latihan Kader Muda)',
        'issuer'   => 'PC IPNU Kabupaten Lumajang',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Kaderisasi Formal',
        'year'     => '2024',
        'desc'     => 'Sertifikat kelulusan kaderisasi formal tingkat menengah IPNU dengan predikat B.',
        'img'      => 'assets/img/certificates/cert_ipnu_lakmud.jpg'
    ],
    [
        'id'       => 'kad-02',
        'title'    => 'Sertifikat Anggota MAKESTA (Masa Kesetiaan Anggota)',
        'issuer'   => 'PC IPNU Kabupaten Lumajang',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Kaderisasi Formal',
        'year'     => '2023',
        'desc'     => 'Sertifikat kelulusan jenjang kaderisasi dasar Ahlussunnah wal Jama\'ah An-Nahdliyah dengan predikat B.',
        'img'      => 'assets/img/certificates/cert_ipnu_makesta.jpg'
    ],
    [
        'id'       => 'kad-03',
        'title'    => 'Belajar Nahdlatul Ulama untuk Pemula (Sejarah, Aswaja & Jama\'ah)',
        'issuer'   => 'NU Online Institute',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Aswaja & Ke-NU-an',
        'year'     => '2026',
        'desc'     => 'Kelulusan kelas ke-NU-an dan tradisi keilmuan Ahlussunnah wal Jama\'ah di NU Online Institute.',
        'img'      => 'assets/img/certificates/cert_nu_online_institute.jpg'
    ],
    [
        'id'       => 'kad-04',
        'title'    => 'Pelatihan Pembuatan Makalah Ilmiah Mahasiswa',
        'issuer'   => 'PK IPNU IPPNU UNUGIRI Bojonegoro',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Karya Ilmiah',
        'year'     => '2024',
        'desc'     => 'Pelatihan tata tulis akademik, sitasi ilmiah, dan struktur makalah standar perguruan tinggi.',
        'img'      => 'assets/img/certificates/cert_pk_ipnu_makalah.jpg'
    ],
    [
        'id'       => 'kad-05',
        'title'    => 'Pelatihan Kepenulisan Makalah — PR PMII Raden Paku',
        'issuer'   => 'PR PMII Rayon Raden Paku UNUGIRI Bojonegoro',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'PMII Akademik',
        'year'     => '2024',
        'desc'     => 'Pelatihan penguatan literasi dan metodologi penulisan karya tulis ilmiah bagi mahasiswa.',
        'img'      => 'assets/img/certificates/cert_pmii_kepenulisan.jpg'
    ],
    [
        'id'       => 'kad-06',
        'title'    => 'Pelatihan Public Speaking & Presentation',
        'issuer'   => 'PR PMII Rayon Raden Paku UNUGIRI Bojonegoro',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Public Speaking',
        'year'     => '2024',
        'desc'     => 'Pelatihan komunikasi publik, retorika persuasif, dan teknik presentasi efektif di depan audiens.',
        'img'      => 'assets/img/certificates/cert_pmii_public_speaking.jpg'
    ],
    [
        'id'       => 'kad-07',
        'title'    => 'Webinar Mental Health: Spiritual Kuat & Mental Sehat',
        'issuer'   => 'PC RMI NU Kota Malang',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Webinar RMI NU',
        'year'     => '2024',
        'desc'     => 'Edukasi penguatan spiritualitas dan kesehatan mental bagi santri dan generasi muda.',
        'img'      => 'assets/img/certificates/cert_rmi_mental_health.jpg'
    ],
    [
        'id'       => 'kad-08',
        'title'    => 'Kelas Nahwu Online Angkatan 31',
        'issuer'   => 'Santri Pedia Indonesia',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Bahasa Arab',
        'year'     => '2024',
        'desc'     => 'Pelatihan intensif kaidah gramatika bahasa Arab (Ilmu Nahwu) Angkatan 31 bersama Santri Pedia Indonesia.',
        'img'      => 'assets/img/certificates/cert_santripedia_nahwu.jpg'
    ],
    [
        'id'       => 'kad-09',
        'title'    => 'Seminar Bahasa Arab: Keindahan Ilmu Balaghah (الندوة اللغوية)',
        'issuer'   => 'Al-Wahy Forum Bahasa Arab',
        'folder'   => 'kaderisasi-keislaman',
        'category' => 'Ilmu Balaghah',
        'year'     => '2024',
        'desc'     => 'Seminar keilmuan sastra dan retorika Bahasa Arab (Ilmu Balaghah) secara daring.',
        'img'      => 'assets/img/certificates/cert_alwahy_balaghah.jpg'
    ],
    [
        'id'       => 'pram-01',
        'title'    => 'Piagam Penghargaan JOTA ke-86 & JOTI ke-44 Nasional 2023',
        'issuer'   => 'Kwartir Nasional Gerakan Pramuka (JJID92846)',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Kwarnas Pramuka',
        'year'     => '2023',
        'desc'     => 'Piagam penghargaan nasional partisipasi Jamboree On The Air & Jamboree On The Internet Indonesia 2023.',
        'img'      => 'assets/img/certificates/cert_kwarnas_jota_joti.jpg'
    ],
    [
        'id'       => 'pram-02',
        'title'    => 'International Webinar 167th Baden-Powell Day 2024',
        'issuer'   => 'Kwartir Daerah Gerakan Pramuka D.I. Yogyakarta',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Scouts for SDGs',
        'year'     => '2024',
        'desc'     => 'Webinar internasional nilai karakter kepanduan menuju program Kepramukaan Dunia & SDGs.',
        'img'      => 'assets/img/certificates/cert_kwarda_diy_bpday.jpg'
    ],
    [
        'id'       => 'pram-03',
        'title'    => 'Penyelesaian Silabus UNAR Tingkat Siaga (Amatir Radio)',
        'issuer'   => 'E-Learning UNAR / Amatir Radio Indonesia',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Amatir Radio',
        'year'     => '2023',
        'desc'     => 'Sertifikat penyelesaian kurikulum e-learning Ujian Negara Amatir Radio (UNAR) Tingkat Siaga.',
        'img'      => 'assets/img/certificates/cert_unar_siaga.jpg'
    ],
    [
        'id'       => 'pram-04',
        'title'    => 'Lomba Fotografi Ramadhan Pramuka Se-Indonesia',
        'issuer'   => 'Pramuka Pesantren At Taufiqiyah Sumenep',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Fotografi Pramuka',
        'year'     => '2023',
        'desc'     => 'Partisipasi nasional lomba kreativitas fotografi Ramadhan Gerakan Pramuka se-Indonesia.',
        'img'      => 'assets/img/certificates/cert_pramuka_fotografi.jpg'
    ],
    [
        'id'       => 'pram-05',
        'title'    => 'Honorable Mention Fisika — National Cynosure Olympics',
        'issuer'   => 'School Thunder Bolt',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Olimpiade Sains',
        'year'     => '2021',
        'desc'     => 'Piagam penghargaan Honorable Mention bidang Fisika pada ajang kompetisi sains nasional.',
        'img'      => 'assets/img/certificates/cert_olympics_fisika.jpg'
    ],
    [
        'id'       => 'pram-06',
        'title'    => 'MINITO Educare Science Competition 2021 (Bidang Fisika)',
        'issuer'   => 'Lembaga Educare Akademi',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Kompetisi Fisika',
        'year'     => '2021',
        'desc'     => 'Partisipasi dalam kompetisi sains nasional MINITO Educare bidang Fisika tingkat SMA/MA.',
        'img'      => 'assets/img/certificates/cert_minito_science_fisika.jpg'
    ],
    [
        'id'       => 'pram-07',
        'title'    => 'Kuis Fisika Online (FISOL) Batch #1',
        'issuer'   => 'Komunitas Kuis Fisika Online',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Sains Fisika',
        'year'     => '2021',
        'desc'     => 'Sertifikat keikutsertaan kompetisi pengerjaan soal Listrik Statis & Listrik Dinamis.',
        'img'      => 'assets/img/certificates/cert_fisol_kuis_fisika.jpg'
    ],
    [
        'id'       => 'pram-08',
        'title'    => 'Talkshow Keilmiahan: Intelektualitas & Kreativitas Era 4.0',
        'issuer'   => 'FIFASPORT Universitas Negeri Semarang (UNNES)',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Keilmiahan UNNES',
        'year'     => '2020',
        'desc'     => 'Talkshow pengembangan intelektualitas, budaya keilmiahan, dan kreativitas generasi muda di era Industri 4.0.',
        'img'      => 'assets/img/certificates/cert_unnes_talkshow_40.jpg'
    ],
    [
        'id'       => 'pram-09',
        'title'    => 'Seminar Online Quipper Indonesia: Sukses PTN & Uji Potensi',
        'issuer'   => 'Quipper Indonesia',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Seminar Quipper',
        'year'     => '2021',
        'desc'     => 'Seminar persiapan akademik, tes uji potensi, dan strategi berprestasi menembus perguruan tinggi.',
        'img'      => 'assets/img/certificates/cert_quipper_ptn.jpg'
    ],
    [
        'id'       => 'pram-10',
        'title'    => 'Webinar Budaya: Budaya Jawa Memanggil',
        'issuer'   => 'Taruna Budaya Lumajang',
        'folder'   => 'pramuka-prestasi',
        'category' => 'Kebudayaan',
        'year'     => '2021',
        'desc'     => 'Pelestarian kearifan lokal dan wawasan budaya Nusantara bersama Sanggar Taruna Budaya Lumajang.',
        'img'      => 'assets/img/certificates/cert_taruna_budaya_jawa.jpg'
    ]
];

function get_folder_previews(array $certs, string $folder_key): array {
    $filtered = ($folder_key === 'semua')
        ? $certs
        : array_values(array_filter($certs, fn($c) => $c['folder'] === $folder_key));
    $out = [];
    foreach (array_slice($filtered, 0, 3) as $item) {
        $out[] = $item['img'];
    }
    return $out;
}

$cert_folders = [
    'semua' => [
        'name'     => 'Semua Berkas & Sertifikat',
        'code'     => 'ALL ARCHIVE',
        'sub'      => 'Buka seluruh ' . count($all_certificates) . ' sertifikat & SK resmi terverifikasi',
        'accent'   => 'navy',
        'count'    => count($all_certificates),
        'previews' => [
            'assets/img/certificates/cert_komdigi_cyber_security.jpg',
            'assets/img/certificates/sk_bem_ft_unugiri_p1.jpg',
            'assets/img/certificates/cert_nasa_observe_moon.jpg',
        ]
    ],
    'sk-organisasi' => [
        'name'     => 'SK Resmi Organisasi',
        'code'     => 'SK RESMI',
        'sub'      => 'SK BEM FT · KPUM-U 2025 · PAC IPNU Tempeh · PC IPNU Lumajang',
        'accent'   => 'rose',
        'count'    => count(array_filter($all_certificates, fn($c) => $c['folder'] === 'sk-organisasi')),
        'previews' => get_folder_previews($all_certificates, 'sk-organisasi')
    ],
    'teknologi-ai' => [
        'name'     => 'Teknologi, Coding & AI',
        'code'     => 'TECH & AI',
        'sub'      => 'Komdigi BSrE-BSSN · Dicoding · Google.org · Telkom',
        'accent'   => 'teal',
        'count'    => count(array_filter($all_certificates, fn($c) => $c['folder'] === 'teknologi-ai')),
        'previews' => get_folder_previews($all_certificates, 'teknologi-ai')
    ],
    'internasional' => [
        'name'     => 'Internasional & Global',
        'code'     => 'GLOBAL',
        'sub'      => 'NASA · UNICEF · World Bank · UN · WOSM · UIS',
        'accent'   => 'sky',
        'count'    => count(array_filter($all_certificates, fn($c) => $c['folder'] === 'internasional')),
        'previews' => get_folder_previews($all_certificates, 'internasional')
    ],
    'diklat-pendidikan' => [
        'name'     => 'Diklat Nasional & Pendidikan',
        'code'     => 'EDTECH',
        'sub'      => 'Pembelajaran Mendalam · KKA · ChatGPT · Kurikulum',
        'accent'   => 'indigo',
        'count'    => count(array_filter($all_certificates, fn($c) => $c['folder'] === 'diklat-pendidikan')),
        'previews' => get_folder_previews($all_certificates, 'diklat-pendidikan')
    ],
    'kampus-halal' => [
        'name'     => 'Kampus, Halal & Profesi',
        'code'     => 'PROFESI',
        'sub'      => 'BPJPH Kemenag RI · Halal Advisor · UNUGIRI · Jurnalistik',
        'accent'   => 'emerald',
        'count'    => count(array_filter($all_certificates, fn($c) => $c['folder'] === 'kampus-halal')),
        'previews' => get_folder_previews($all_certificates, 'kampus-halal')
    ],
    'kaderisasi-keislaman' => [
        'name'     => 'Kaderisasi NU & Keislaman',
        'code'     => 'NU & ASWAJA',
        'sub'      => 'LAKMUD · MAKESTA · NU Online · PMII · Nahwu · Balaghah',
        'accent'   => 'amber',
        'count'    => count(array_filter($all_certificates, fn($c) => $c['folder'] === 'kaderisasi-keislaman')),
        'previews' => get_folder_previews($all_certificates, 'kaderisasi-keislaman')
    ],
    'pramuka-prestasi' => [
        'name'     => 'Kepramukaan, Sains & Umum',
        'code'     => 'PRESTASI',
        'sub'      => 'JOTA-JOTI Kwarnas · BP Day · UNAR · Olimpiade Fisika',
        'accent'   => 'slate',
        'count'    => count(array_filter($all_certificates, fn($c) => $c['folder'] === 'pramuka-prestasi')),
        'previews' => get_folder_previews($all_certificates, 'pramuka-prestasi')
    ]
];

$hero_badges = [
    ['label' => 'Owner ILMUNA Digital', 'logo' => 'assets/img/logos/ilmuna-official.png'],
    ['label' => 'Mahasiswa PAI UNUGIRI', 'logo' => 'assets/img/logos/unugiri.png'],
    ['label' => 'Tim IT Perpustakaan UNUGIRI', 'logo' => 'assets/img/logos/perpustakaan-unugiri.png'],
];

$nav_links = [
    ['href' => '#profil',      'label' => 'Profil & CV'],
    ['href' => '#organisasi',  'label' => 'Organisasi & SK'],
    ['href' => '#proyek',      'label' => 'Folder Website'],
    ['href' => '#sertifikat',  'label' => 'Folder Sertifikat'],
    ['href' => '#kontak',      'label' => 'Kontak']
];

// Otomatis tambahkan cache-buster (?v=filemtime) ke semua gambar ber-watermark
$wm_bust = function (string $path): string {
    $clean = preg_replace('/\?.*$/', '', $path);
    $full  = __DIR__ . '/../' . $clean;
    $v     = @filemtime($full);
    return $v ? ($clean . '?v=' . $v) : $path;
};

foreach ($organizations as &$org_item) {
    if (!empty($org_item['sk'])) {
        $org_item['sk']['img'] = $wm_bust($org_item['sk']['img']);
        if (!empty($org_item['sk']['pages'])) {
            $org_item['sk']['pages'] = array_map($wm_bust, $org_item['sk']['pages']);
        }
    }
}
unset($org_item);

foreach ($kaderisasi_nonformal as &$nf_item) {
    $nf_item['photos'] = array_map($wm_bust, $nf_item['photos']);
}
unset($nf_item);

foreach ($aksi_kemanusiaan as &$ak_item) {
    $ak_item['photos'] = array_map($wm_bust, $ak_item['photos']);
}
unset($ak_item);

foreach ($all_certificates as &$cert_item) {
    $cert_item['img'] = $wm_bust($cert_item['img']);
    if (!empty($cert_item['pages'])) {
        $cert_item['pages'] = array_map($wm_bust, $cert_item['pages']);
    }
}
unset($cert_item);

foreach ($cert_folders as &$cf_item) {
    $cf_item['previews'] = array_map($wm_bust, $cf_item['previews']);
}
unset($cf_item);
