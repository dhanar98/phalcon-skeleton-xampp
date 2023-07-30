<?php

declare(strict_types=1);

namespace Vokuro\Tasks;

use Phalcon\Cli\Task;

class DefaultTask extends Task
{
    public function mainAction()
    {
        echo 'This is the default action' . PHP_EOL;
    }
}
