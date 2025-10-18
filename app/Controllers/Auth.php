<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{
    /**
     * Handle login and redirect users by role after successful auth.
     *
     * Demo implementation: authenticates against a small in-memory user list
     * and derives the user's role from the matched record. Replace with your
     * Users model + password hashing in a real application.
     */
    public function login()
    {
        $request = service('request');
        $session = session();

        // Always process credentials on POST /login to update the session

        $username = trim((string) $request->getPost('username'));
        $password = (string) $request->getPost('password');

        if ($username === '' || $password === '') {
            return redirect()->to(site_url('login'))->with('error', 'Please enter username and password.');
        }

        // Query database directly (no model)
        try {
            $db = \Config\Database::connect();
            $builder = $db->table('users');
            $user = $builder
                ->select('id, username, password_hash, role')
                ->where('username', $username)
                ->get()
                ->getRowArray();
        } catch (\Throwable $e) {
            return redirect()->to(site_url('login'))->with('error', 'Database error during login.');
        }

        // Validate password strictly with password_verify (hashed passwords only)
        $stored = (string) ($user['password_hash'] ?? '');
        if (!$user || !password_verify($password, $stored)) {
            return redirect()->to(site_url('login'))->with('error', 'Invalid credentials.');
        }

        // Persist session data
        $session->set([
            'user_id'   => $user['id'],
            'username'  => $user['username'],
            'role'      => trim((string) $user['role']),
            'isLoggedIn'=> true,
        ]);

        // Redirect by role
        return $this->redirectByRole(trim((string) $user['role']));
    }

    private function redirectByRole(string $role)
    {
        switch (strtolower($role)) {
            case 'teacher':
                return redirect()->to(site_url('teacher/dashboard'));
            case 'admin':
                return redirect()->to(site_url('admin/dashboard'));
            case 'student':
            default:
                return redirect()->to(site_url('announcements'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(site_url('/'))->with('error', 'You have been logged out.');
    }
}

