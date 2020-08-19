<?php
declare(strict_types=1);

namespace Coverage;

use Codeception\Test\Unit;
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\Report\PHP;

class ClassCTest extends Unit
{
    public function testGetName()
    {
        $filter = new Filter();
        $driver = Driver::forLineCoverage($filter);
        $coverage = new CodeCoverage($driver, $filter);
        $coverage->start(ClassCTest::class);

        $subject = new ClassC();
        self::assertEquals('ClassA', $subject->getName());

        $coverage->stop();

        $report = new PHP();
        $report->process($coverage, '/tmp/coverage/files/');
    }
}
