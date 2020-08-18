<?php
declare(strict_types=1);

namespace Coverage;

class ClassB
{
    private ClassA $classA;

    public function __construct()
    {
        $this->classA = new ClassA();
    }

    /** @return string */
    public function getName(): string
    {
        return $this->classA->getName();
    }
}
