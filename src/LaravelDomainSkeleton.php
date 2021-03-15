<?php

namespace Gerfey\LaravelDomainSkeleton;

use Exception;
use Gerfey\LaravelDomainSkeleton\Storage\StorageDomainSkeleton;

class LaravelDomainSkeleton
{
    /**
     * @var
     */
    protected $domainName;

    /**
     * @param string $domainName
     */
    public function setNameDomain(string $domainName): void
    {
        $this->domainName = $domainName;
    }

    /**
     * @throws Exception
     */
    public function make(): void
    {
        $storage = new StorageDomainSkeleton();
        try {
            $storage->createStructure($this->domainName);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
