<?php

namespace Gerfey\LaravelDomainSkeleton\Storage\Structures;

use Exception;

class DirectoryStructure extends Structure
{
    /**
     * @var mixed
     */
    protected $children;

    /**
     * @param array $params
     * @param string $domainName
     */
    public function __construct(array $params, string $domainName)
    {
        parent::__construct($params, $domainName);

        $this->children = $params['children'];
    }

    /**
     * @param string $pathDirectoryName
     * @return bool
     *
     * @throws Exception
     */
    protected function create(string $pathDirectoryName): bool
    {
        if (mkdir($pathDirectoryName)) {
            if (count($this->children) > 0) {
                foreach ($this->children as $structure) {
                    switch ($structure['type']) {
                        case 'dir':
                            $structure = new DirectoryStructure($structure, $this->domainName);
                            break;
                        case 'file':
                            $structure = new FileStructure($structure, $this->domainName);
                            break;
                    }

                    $structure->make($pathDirectoryName);
                }
            }

            return true;
        }

        return false;
    }
}
