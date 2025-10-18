<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Auth and role-based dashboards
// Login endpoint (expects POST)
$routes->post('login', 'Auth::login');
// Login page (GET)
$routes->get('login', static function () {
    return view('login');
});
// Logout
$routes->get('logout', 'Auth::logout');

// Protect teacher/admin routes with role-based auth filter
$routes->group('teacher', ['filter' => 'roleauth'], static function ($routes) {
    $routes->get('dashboard', 'Teacher::dashboard');
});
$routes->group('admin', ['filter' => 'roleauth'], static function ($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
});

// Students are redirected to /announcements; require login via roleauth filter
$routes->get('announcements', 'Announcement::index', ['filter' => 'roleauth']);

// Basic pages for the homepage nav
$routes->get('about', static function () {
    return view('about');
});
$routes->get('contact', static function () {
    return view('contact');
});
