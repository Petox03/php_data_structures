<?php

class stack
{
    private $stack;

    public function __construct()
    {
        $this->stack = array();
    }

    public function getStack(): array
    {
        return $this->stack;
    }

    public function sizeOf(): int
    {
        return count($this->stack);
    }

    public function isEmpty(): bool
    {
        return count($this->stack) == 0;
    }

    public function push($value): void
    {
        /* array_push($this->stack, $value); */
        $this->stack[] = $value;
    }

    public function showLastElement(): mixed
    {
        if ($this->isEmpty()) {
            throw new Exception('La pila está vacía y no hay elementos para eliminar');
        }

        $result = end($this->stack);

        return $result;
    }

    public function pop(): mixed
    {
        $result = $this->showLastElement();

        /* array_pop($this->stack); */
        unset($this->stack[$this->sizeOf()-1]);

        return $result;
    }

    public function peek(): mixed
    {
        $result = $this->showLastElement();

        return $result;
    }

    public function reverse(): void
    {
        $temp = new Stack();

        while (!$this->isEmpty()) {
            $temp->push($this->pop());
        }

        $this->stack = $temp->getStack();
    }

    public function alternate(stack $otherStack): void
    {
        $resultStack = new Stack();

        while (!$this->isEmpty() || !$otherStack->isEmpty()) {
            if (!$this->isEmpty()) {
                $resultStack->push($this->pop());
            }
            if (!$otherStack->isEmpty()) {
                $resultStack->push($otherStack->pop());
            }
        }

        while(!$resultStack->isEmpty())
        {
            $this->push($resultStack->pop());
        }
    }

    public function __toString(): string
    {
        return implode("\n↓\n", $this->stack);
    }
}
