<?php

use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\PhpFileLoader;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;

require __DIR__.'/../vendor/autoload.php';

/**
 * 加载路由配置.
 */
$locator = new FileLocator([__DIR__]);
$loader = new PhpFileLoader($locator);
$collection = $loader->load('../config/routes.php');

/**
 * 匹配路由.
 */
$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($collection, $context);

try {
    $match = $matcher->matchRequest($request);
} catch (ResourceNotFoundException $exception) {
    $response = new Response(Response::$statusTexts[Response::HTTP_NOT_FOUND], Response::HTTP_NOT_FOUND);
    $response->send();

    return;
} catch (Exception $e) {
    $response = new Response('An error occurred', 500);
    $response->send();

    return;
}
$controller = new ReflectionClass($match['controller']);
$action = $controller->getMethod($match['action']);

$response = $action->invoke($controller->newInstance(), $request);
if (is_string($response)) {
    $response = new Response($response, Response::HTTP_OK);
    $response->send();
} elseif (is_array($response)) {
    $response = new JsonResponse($response);
    $response->send();
} elseif ($response instanceof Response) {
    $response->send();
}
