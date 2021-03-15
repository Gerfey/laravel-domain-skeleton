<?php

namespace Gerfey\LaravelDomainSkeleton\Storage\Structures;

class FileStructure extends Structure
{
    /**
     * @var string
     */
    protected $pathTemplate;

    /**
     * @param array $params
     * @param string $domainName
     */
    public function __construct(array $params, string $domainName)
    {
        parent::__construct($params, $domainName);

        $this->pathTemplate = dirname(__FILE__, 3) . '/Templates/' . $params['template'] . '.php';
    }

    /**
     * @param string $pathDirectoryName
     * @return bool
     */
    protected function create(string $pathDirectoryName): bool
    {
        $content = file_get_contents($this->pathTemplate);
        $content = str_replace(
            ['__DOMAIN_SKELETON_DIRECTORY__', '__DomainName__', '__DomainNameLower__'],
            [
                ucfirst(config('domain-skeleton.default_directory')),
                ucfirst($this->domainName),
                mb_strtolower($this->domainName)
            ],
            $content
        );

        if (!file_put_contents($pathDirectoryName, $content)) {
            return false;
        }

        return true;
    }
}
