<?php

namespace App\Consumer;

use App\Service\Contract\DeveloperServiceContract;
use App\Message\AssignTaskMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

/**
 * Class AssignTaskConsumer
 * @package App\Infrastructure\Queue\Consumer
 */
class AssignTaskConsumer implements MessageHandlerInterface
{
    /** @var DeveloperServiceContract  */
    private DeveloperServiceContract $developerService;

    /**
     * StoreTaskConsumer constructor.
     * @param DeveloperServiceContract $developerService
     */
    public function __construct(DeveloperServiceContract $developerService)
    {
        $this->developerService = $developerService;
    }

    /**
     * @param AssignTaskMessage $message
     */
    public function __invoke(AssignTaskMessage $message)
    {
        $this->developerService->assignTask($message->getTask());
    }
}
