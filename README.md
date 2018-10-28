# domain-events-publisher-bundle
symfony bundle for domain event publisher

Subscribe to domain event

```yaml
some_domain_listener:
    class: Antismok\Identity\Application\UserCreatedHandler
    tags:
        - { name: domain.event_listener, event: Antismok\Identity\Domain\UserCreatedEvent, method: handle}
```

```php

declare(strict_types=1);

namespace Antismok\Identity\Application;

use Antismok\Identity\Domain\UserCreatedEvent;

class UserCreatedHandler
{
    public function handle(UserCreatedEvent $event)
    {
        //....
    }
}
```

Call in model
```php
<?php

declare(strict_types=1);

namespace Antismok\Identity\Domain\Model;

use Antismok\DomainEventPublisher\DomainEventPublisher;
use Antismok\Identity\Domain\UserCreatedEvent;

class User
{
    public function register(string $id, string $login): void
    {
        //.....
        DomainEventPublisher::getInstance()
            ->publish(new UserCreatedEvent($id, $login))
        ;
    }
}

```

You can use di service @domain_event_dispatcher or @Antismok\DomainEventPublisher\DomainEventPublisher
