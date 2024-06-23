<?php
require_once 'stack.php';

class pilas
{
    public stack $myStack;
    public stack $myStack2;

    public function __construct()
    {
        $this->myStack = new stack();
        $this->myStack->push(2);
        $this->myStack->push(4);
        
        $this->myStack2 = new stack();
        $this->myStack2->push(1);
        $this->myStack2->push(3);
    }

    public function main(): void
    {
        echo $this->myStack;

        /* echo "\nEsto eliminará el último elemento\n";
        $this->myStack->pop();
        echo $this->myStack; */

        /* echo "\nInvertir pila mf\n";
        $this->myStack->reverse();
        echo $this->myStack; */

        echo "\nAlternar las dos pilas mf\n";
        $this->myStack->alternate($this->myStack2);
        echo $this->myStack;
    }
}

/*Main*/
$program = new pilas();
$program->main();
