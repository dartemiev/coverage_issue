<?php

require_once 'vendor/autoload.php';

use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeCoverage\Filter;
use SebastianBergmann\CodeCoverage\RawCodeCoverageData;
use SebastianBergmann\CodeCoverage\Report\Html\Facade;
use Util\NullDriver;

$driver = new NullDriver();
$coverage = new CodeCoverage($driver, new Filter());
$files = ['/tmp/coverage/files/ClassCTest'];
foreach ($files as $file) {
    $coverageData = include($file);
    $coverageData = RawCodeCoverageData::fromXdebugWithoutPathCoverage($coverageData);
    $coverage->append($coverageData, basename($file));
}

$htmlReport = new Facade();
$htmlReport->process($coverage, '/tmp/coverage/report');
