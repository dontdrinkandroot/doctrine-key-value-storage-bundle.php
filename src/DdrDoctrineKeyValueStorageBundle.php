<?php

namespace Dontdrinkandroot\DoctrineKeyValueStorageBundle;

use Override;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DdrDoctrineKeyValueStorageBundle extends Bundle
{
    #[Override]
    public function getPath(): string
    {
        return dirname(__DIR__);
    }
}
