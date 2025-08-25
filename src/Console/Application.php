<?php

namespace Microelement\Console;

use Symfony\Component\Console\Application as SymfonyApplication;
use Microelement\Console\Commands\NewCommand;

class Application extends SymfonyApplication
{
    public function __construct()
    {
        parent::__construct('Microelement CLI', '1.0.0');
        $this->add(new NewCommand());
    }
}
