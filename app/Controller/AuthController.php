<?php

namespace App\Controller;

use App\Core\View;
use App\Core\Config;
use App\Services\AuthService;
use App\Controller\BaseController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class AuthController extends BaseController
{
    public function __construct(
        protected readonly AuthService $auth,
        protected readonly Config $config,
        protected readonly View $view
    )
    {
    }
    
    public function login(Request $request, Response $response): Response
    {
        $args = [
            'title' => 'Login',
            'brandLogo' => $this->config->get('app.logo')
        ];
        return parent::render($request, $response, 'auth/login', $args);
    }

    // function to landing page
    public function landing(Request $request, Response $response): Response
    {
        $args = [
            'title' => 'Landing'
        ];
        return parent::render($request, $response, 'auth/landing', $args);
    }

    public function logout(Request $request, Response $response): Response
    {
        $this->auth->logout();
        $loginPage = $this->view->urlFor('auth.login');
        return $response->withHeader('Location', $loginPage)->withStatus(302);
    }
}
