<?php
namespace App\Authentification;

use Core\Authentification\Auth;
use Core\Authentification\TokenAuth;

class AuthManager
{
    private string $secret;

    public function __construct(string $secret)
    {
        $this->secret = $secret;
    }

    // Générer un token
    public function generateToken(array $data, int $expiry = 3600): string
    {
        $auth = new TokenAuth($this->secret);
        return $auth->generate($data, $expiry);
    }

    // Vérifier le token
    public function checkToken(): array
    {
        $auth = new Auth($this->secret);
        return $auth->handle();
    }
}
