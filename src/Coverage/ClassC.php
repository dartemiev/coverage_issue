<?php
declare(strict_types=1);

namespace Coverage;

class ClassC
{
    private ClassB $classB;

    public function __construct()
    {
        $this->classB = new ClassB();
    }

    /** @return string */
    public function getName(): string
    {
        return $this->classB->getName();
    }
}
