<?php

namespace Microelement\Console\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class NewCommand extends Command
{
    protected static $defaultName = 'new';

    protected function configure()
    {
        $this->setDescription('Crea un nuevo proyecto con Microelement')
            ->addArgument('name', InputArgument::REQUIRED, 'Nombre del proyecto');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $output->writeln("🚀 Creando nuevo proyecto: {$name}");

        if (!is_dir($name)) {
            mkdir($name, 0755, true);
            file_put_contents("{$name}/index.php", "<?php echo 'Hello from {$name}!';");
            $output->writeln("✅ Proyecto '{$name}' creado con éxito.");
        } else {
            $output->writeln("⚠️ El directorio '{$name}' ya existe.");
        }

        return Command::SUCCESS;
    }
}
