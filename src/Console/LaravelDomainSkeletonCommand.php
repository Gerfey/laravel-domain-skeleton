<?php

namespace Gerfey\LaravelDomainSkeleton\Console;

use Exception;
use Gerfey\LaravelDomainSkeleton\LaravelDomainSkeleton;
use Illuminate\Console\Command;

class LaravelDomainSkeletonCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'make:skeleton:domain {domainName}';

    /**
     * @var string
     */
    protected $description = 'Creating a skeleton domain framework.';

    public function handle()
    {
        $domainName = $this->argument('domainName');

        try {
            $domainSkeleton = new LaravelDomainSkeleton();
            $domainSkeleton->setNameDomain($domainName);
            $domainSkeleton->make();

            $this->info('Service skeleton create complete!');
        } catch (Exception $exception) {
            $this->error($exception->getMessage());
        }
    }
}
