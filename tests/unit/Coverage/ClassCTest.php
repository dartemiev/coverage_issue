<?php
declare(strict_types=1);

namespace Coverage;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeCoverage\Driver\Driver;
use SebastianBergmann\CodeCoverage\Filter;

class ClassCTest extends TestCase
{
    public function testGetName()
    {
        $driver = Driver::forLineCoverage(new Filter());
        $driver->start();

        $subject = new ClassB();
        self::assertEquals('ClassA', $subject->getName());

        $data = $driver->stop()->lineCoverage();
        file_put_contents(
            '/tmp/coverage/files/ClassCTest',
            sprintf("<?php\n return %s;\n", var_export($data, true))
        );
    }
}
