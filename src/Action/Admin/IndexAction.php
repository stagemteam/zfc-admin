<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2018 Serhii Stagem
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Stagem
 * @package Stagem_<package>
 * @author Serhii Stagem <popow.serhii@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Stagem\ZfcAdmin\Action\Admin;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;
//use Interop\Http\Server\MiddlewareInterface;
use Zend\Diactoros\Response\HtmlResponse;

use Zend\View\Model\ViewModel;

class IndexAction implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /*return (new HtmlResponse(
            $this->template->render('admin-admin::index', $data)
        ));*/

        $viewModel = new ViewModel(['message'=> '<h1>Hello, Ukraine!</h1>']);

        return $handler->handle($request->withAttribute(ViewModel::class, $viewModel));
    }
}

