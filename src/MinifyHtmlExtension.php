<?php

namespace Bolt\Extension\Hellonico\MinifyHtml;

$autoload = __DIR__ . '/../vendor/autoload.php';
if (is_file($autoload)) {
    require $autoload;
}

use Bolt\Extension\SimpleExtension;
use Bolt\Controller\Zone;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use WyriHaximus\HtmlCompress\Factory;

class MinifyHtmlExtension extends SimpleExtension
{

    /**
     * {@inheritdoc}
     */
    protected function subscribe(EventDispatcherInterface $dispatcher)
    {
        $dispatcher->addListener(KernelEvents::RESPONSE, function (FilterResponseEvent $event) {
            $response = $event->getResponse();
            $request = $event->getRequest();

            if ($response instanceof StreamedResponse) {
                return;
            }

            $app = $this->getContainer();

            if (!Zone::isFrontend($request) || $app['config']->get('general/debug')) {
                return;
            }

            if (!class_exists('WyriHaximus\HtmlCompress\Factory')) {
                return;
            }

            $parser = Factory::construct();
            $response->setContent($parser->compress($response->getContent()));
        });
    }
}
