<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = strtolower((string) ($session->get('role') ?? ''));
        $path = ltrim(strtolower($request->getUri()->getPath()), '/');

        // Not logged in: block anything this filter is applied to
        if (!$role) {
            return redirect()->to(site_url('login'))->with('error', 'Please login to continue.');
        }

        // Enforce role-based prefixes
        if (str_starts_with($path, 'admin')) {
            if ($role !== 'admin') {
                return redirect()->to(site_url('announcements'))
                    ->with('error', 'Access Denied: Insufficient Permissions');
            }
            return; // admin allowed
        }

        if (str_starts_with($path, 'teacher')) {
            if ($role !== 'teacher') {
                return redirect()->to(site_url('announcements'))
                    ->with('error', 'Access Denied: Insufficient Permissions');
            }
            return; // teacher allowed
        }

        if (str_starts_with($path, 'student')) {
            if ($role !== 'student') {
                return redirect()->to(site_url('announcements'))
                    ->with('error', 'Access Denied: Insufficient Permissions');
            }
            return; // student allowed
        }

        // For other paths when filter is attached and user is logged in, allow.
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No after processing
    }
}
