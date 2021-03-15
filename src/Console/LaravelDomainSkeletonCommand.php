<?php

namespace Gerfey\LaravelDomainSkeleton;

use Illuminate\Console\Command;

class LaravelDomainSkeletonCommand extends Command
{
    protected $signature = 'make:skeleton:domain {domainName}';

    protected $description = 'Make Domain skeleton.';
}
