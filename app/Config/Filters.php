<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'           => CSRF::class,
        'toolbar'        => DebugToolbar::class,
        'honeypot'       => Honeypot::class,
        'adminfilter'     => \App\Filters\AdminFilter::class,
        'walifilter'     => \App\Filters\WaliFilter::class,
        'gurufilter'     => \App\Filters\GuruFilter::class,
        'siswafilter'    => \App\Filters\SiswaFilter::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            'adminfilter' => ['except' => [
                'auth', 'auth/*',

                // 'about', 'about/*',
                '/',
            ]],
            'walifilter' => ['except' => [
                'auth', 'auth/*',
                // 'about', 'about/*',
                '/',
            ]],
            'gurufilter' => ['except' => [
                'auth', 'auth/*',
                // 'about', 'about/*',
                '/',
            ]],
            'siswafilter' => ['except' => [
                'auth', 'auth/*',
                'about', 'about/*',
                '/',
            ]],
            // 'honeypot',
            // 'csrf',
        ],
        'after' => [
            'adminfilter' => ['except' => [
                'about', 'about/*',
                'admin/dashboard', 'admin/dashboard/*',
                //Master data
                'admin/tahun', 'admin/tahun/*',
                'admin/jurusan', 'admin/jurusan/*',
                'admin/mapel', 'admin/mapel/*',
                'admin/kelas', 'admin/kelas/*',
                'admin/guru', 'admin/guru/*',
                'admin/siswa1', 'admin/siswa1/*',
                //Akademik
                'admin/walikelas', 'admin/walikelas/*',
                'admin/rombel', 'admin/rombel/*',
                'admin/wali', 'admin/wali/*',
                'auth/auth_siswa', 'auth/auth_siswa/*',
                'admin/walikelas', 'admin/walikelas/*',
                'admin/mapelkelas', 'admin/mapelkelas/*',
                //Pengaturan
                'admin/user', 'admin/user/*',
                'admin/admin', 'admin/admin/*',
                'admin/users', 'admin/users/*',

                // Wali Kelas
                'walikelas/rombel', 'walikelas/rombel/*',
                'walikelas/c_academic', 'walikelas/c_academic/*',

            ]],
            'walifilter' => ['except' => [

                // Wali Kelas
                // 'walikelas/dashboard', 'walikelas/dashboard/*',
                'walikelas/rombel', 'walikelas/rombel/*',
                'walikelas/rapor', 'walikelas/rapor/*',
                'walikelas/c_academic', 'walikelas/c_academic/*',
                'walikelas/pkl', 'walikelas/pkl/*',
                'walikelas/eskul', 'walikelas/eskul/*',


            ]],
            'gurufilter' => ['except' => [

                // Guru Mapel
                'guru/dashboard', 'guru/dashboard/*',

            ]],
            'siswafilter' => ['except' => [

                // siswa
                'siswa/dashboard', 'siswa/dashboard/*',

            ]],
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
