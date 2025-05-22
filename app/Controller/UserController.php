<?php

namespace App\Controller;

use App\Core\View;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends BaseController
{
    public function __construct(
        protected readonly View $view
    )
    {}
    
    public function dashboard(Request $request, Response $response): Response
    {
        $this->view->clearCacheIfDev();
        $userData = $request->getAttribute('user');

        $args = [
            'title' => 'User Dashboard',
            'userData' => $userData,
            'routeName' => $this->getRouteName($request),
        ];
        return parent::render($request, $response, 'user/dashboard', $args);
    }
}
