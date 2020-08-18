<?php
declare(strict_types=1);

namespace Util;

use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\RawCodeCoverageData;

class NullDriver extends Driver
{
    public function nameAndVersion(): string
    {
        return 'null-null';
    }

    public function start(): void
    {
    }

    public function stop(): RawCodeCoverageData
    {
        return RawCodeCoverageData::fromXdebugWithoutPathCoverage([]);
    }
}
