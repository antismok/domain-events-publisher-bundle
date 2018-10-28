<?php

namespace Antismok\DomainEventPublisherBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;

/**
 * @author Roman Saritskiy <saritskiy.r.mon@gmail.com>
 */
class DomainListenersPass extends RegisterListenersPass implements CompilerPassInterface
{
    /**
     * @param string $dispatcherService Service name of the event dispatcher in processed container
     * @param string $listenerTag       Tag name used for listener
     * @param string $subscriberTag     Tag name used for subscribers
     */
    public function __construct($dispatcherService = 'domain_event_dispatcher', $listenerTag = 'domain.event_listener', $subscriberTag = 'domain.event_subscriber')
    {
        $this->dispatcherService = $dispatcherService;
        $this->listenerTag       = $listenerTag;
        $this->subscriberTag     = $subscriberTag;
    }
}
