<?php

namespace Popov\ZfcLayout;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;
use Zend\View\Model\JsonModel;
use Zend\View\ViewEvent;
use Zend\View\Renderer\PhpRenderer;
use Zend\Console\Request as ConsoleRequest;
use Zend\Http\Request as HttpRequest;
use Zend\Http\Response as HttpResponse;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, [$this, 'handleDispatch']);
        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, [$this, 'handleError']);
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function handleDispatch(MvcEvent $e)
    {
        // inject global variables in layout after controller initialization
        if ($e->getRequest() instanceof HttpRequest
            && $e->getRequest()->isXmlHttpRequest()
            && !$e->getViewModel()->terminate()
        ) {
            // set empty layout for all not terminated ajax request
            $controller = $e->getTarget();
            $controller->layout()->setTemplate('layout/ajax');
        }
    }

    public function handleError(MvcEvent $e)
    {
        if (($request = $e->getRequest()) instanceof HttpRequest
            && $request->isXmlHttpRequest()
            && ($request->getServer('APPLICATION_ENV') !== 'development') // @todo Improve
        ) {
            /** @var \Exception $exception */
            $exception = $e->getParam('exception');
            $model = new JsonModel([
                'error' => $exception->getMessage(),
            ]);
            $e->setResult($model);

            if ($exception->getCode()) {
                $response = $e->getResponse();
                $response->setStatusCode($exception->getCode());
            }
        }
    }
}
