<?php

namespace Gerfey\LaravelDomainSkeleton\Storage;

use Exception;
use Gerfey\LaravelDomainSkeleton\Storage\Structures\DirectoryStructure;
use Gerfey\LaravelDomainSkeleton\Storage\Structures\FileStructure;

class StorageDomainSkeleton
{
    /**
     * @var string
     */
    private $structurePath = __DIR__ . '/../../config/structure.php';

    /**
     * @param string $domainName
     * @throws Exception
     */
    public function createStructure(string $domainName)
    {
        $pathDomainName = config('default_directory.domain') . '/' . $domainName;
        $pathDirectoryDomain = app_path($pathDomainName);

        if (!file_exists($pathDirectoryDomain)) {
            if (!$this->createRootDirectoryDomain($pathDirectoryDomain)) {
                throw new Exception('Error creating a directory: ' . $pathDomainName);
            }
        } else {
            throw new Exception('Directory on the path: ' . $pathDomainName . ' already exists.');
        }

        foreach ($this->getStructure() as $structure) {
            switch ($structure['type']) {
                case 'dir':
                    $structure = new DirectoryStructure($structure, $domainName);
                    break;
                case 'file':
                    $structure = new FileStructure($structure, $domainName);
                    break;
            }

            try {
                $structure->make($pathDirectoryDomain);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

    /**
     * @param string $pathDirectoryDomain
     * @return bool
     */
    private function createRootDirectoryDomain(string $pathDirectoryDomain): bool
    {
        return mkdir($pathDirectoryDomain);
    }

    /**
     * @return array
     */
    private function getStructure(): array
    {
        return require $this->structurePath;
    }
}
