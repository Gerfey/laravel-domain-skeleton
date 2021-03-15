<?php

namespace Gerfey\LaravelDomainSkeleton\Storage\Structures;

use Exception;

class Structure
{
    /**
     * @var string
     */
    protected $domainName;

    /**
     * @var string
     */
    protected $name;

    /**
     * @param array $params
     * @param string $domainName
     */
    public function __construct(array $params, string $domainName)
    {
        $this->domainName = $domainName;
        $this->name = $this->replacePathDirectory($params['name'], $domainName);
    }

    /**
     * @param string $pathDirectoryName
     * @param string $domainName
     *
     * @return string
     */
    private function replacePathDirectory(string $pathDirectoryName, string $domainName): string
    {
        return str_replace('_DomainName_', ucwords($domainName), $pathDirectoryName);
    }

    /**
     * @param string $pathDomainName
     * @throws Exception
     */
    public function make(string $pathDomainName)
    {
        $pathDirectory = $pathDomainName . '/' . $this->name;

        if (!file_exists($pathDirectory)) {
            if (!$this->create($pathDirectory)) {
                throw new Exception('Error creating: ' . $pathDirectory);
            }
        }
    }

    /**
     * @param string $pathDirectoryName
     * @return bool
     */
    protected function create(string $pathDirectoryName): bool
    {
        return true;
    }
}
