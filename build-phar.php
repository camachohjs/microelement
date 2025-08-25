<?php
$pharFile = 'microelement.phar';

if (file_exists($pharFile)) {
    unlink($pharFile);
}

$phar = new Phar($pharFile);
$phar->startBuffering();

$directory = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(__DIR__),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($directory as $file) {
    if ($file->isFile() && $file->getFilename() != 'build-phar.php') {
        $localPath = str_replace(__DIR__ . DIRECTORY_SEPARATOR, '', $file->getPathname());
        $phar->addFile($file->getPathname(), $localPath);
    }
}

$phar->setStub($phar->createDefaultStub('bin/microelement'));
$phar->stopBuffering();

echo "✅ microelement.phar generado correctamente.\n";
