<?php
/**
 * ═══════════════════════════════════════════════════════════════════════════
 *  ILMUNA DIGITAL — CENTRAL APPLICATION & PORTFOLIO CONFIGURATION
 *  File: config/config.php
 *  Developer: Syahriel Andika
 * ═══════════════════════════════════════════════════════════════════════════
 */

// ==============================================================================
// GUARDIAN DOME — WEB APPLICATION FIREWALL (WAF)
// ==============================================================================
$gd_waf_candidates = [
    '/home/uofruaju/guardian-dome/guardian-dome-waf.php',
    dirname(__DIR__) . '/guardian-dome/guardian-dome-waf.php',
    __DIR__ . '/../guardian-dome/guardian-dome-waf.php',
    __DIR__ . '/guardian-dome-waf.php'
];
foreach ($gd_waf_candidates as $gd_waf) {
    if ($gd_waf && file_exists($gd_waf)) {
        require_once $gd_waf;
        break;
    }
}

// ==============================================================================
// GUARDIAN DOME — TELEGRAM SENTINEL REAL-TIME MONITORING
// Memantau ancaman siber, fatal error/crash, dan statistik kunjungan harian via Telegram
// ==============================================================================
$gd_tg_candidates = [
    '/home/uofruaju/guardian-dome/guardian-dome-telegram/bootstrap.php',
    dirname(__DIR__) . '/guardian-dome/guardian-dome-telegram/bootstrap.php',
    __DIR__ . '/../guardian-dome/guardian-dome-telegram/bootstrap.php',
    __DIR__ . '/guardian-dome-telegram/bootstrap.php'
];
foreach ($gd_tg_candidates as $gd_tg) {
    if ($gd_tg && file_exists($gd_tg)) {
        require_once $gd_tg;
        break;
    }
}

if (!defined('WP_CACHE')) {
    define('WP_CACHE', true); // Added by SpeedyCache
}

// ==============================================================================
// PENGATURAN APLIKASI & KEAMANAN DASAR
// ==============================================================================
if (!defined('APP_ENV')) {
    define('APP_ENV', 'production'); // Deploy online
}

if (APP_ENV === 'development') {
    ini_set('display_errors', '0');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    error_reporting(0);
}

// Pengaturan Global Portofolio
$app_config = [
    'app_name'      => 'Syahriel Andika | Portofolio',
    'app_version'   => '2.4.0',
    'base_url'      => 'https://about.ilmuna.my.id',
    'canonical_url' => 'https://about.ilmuna.my.id',
    'author'        => 'Syahriel Andika',
    'contact'       => [
        'email'       => 'syahriel.andika28@gmail.com',
        'whatsapp'    => '6285117100227',
        'phone'       => '085117100227',
        'organization'=> 'ILMUNA Digital',
        'campus'      => 'UNUGIRI Bojonegoro'
    ],
    'features'      => [
        'enable_lenis_scroll'     => true,
        'enable_particles'        => true,
        'enable_tilt_3d'          => true,
        'enable_anti_download'    => true,
    ]
];

// Header Keamanan HTTP & Anti-Cache Download Bug
function send_security_headers(): void
{
    if (headers_sent()) {
        return;
    }
    header('Content-Type: text/html; charset=UTF-8');
    header('Cache-Control: no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires: 0');
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: camera=(), microphone=(), geolocation=()');
}

send_security_headers();

// Helper Asset URL dengan Otomatis Cache-Busting (?v=timestamp)
if (!function_exists('asset_url')) {
    function asset_url(string $relative_path): string
    {
        $clean_path = ltrim($relative_path, '/');
        $full_path = __DIR__ . '/../' . $clean_path;
        
        if (file_exists($full_path)) {
            $version = filemtime($full_path);
            return $clean_path . '?v=' . $version;
        }
        
        return $clean_path;
    }
}
