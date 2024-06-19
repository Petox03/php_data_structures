<?php
require_once 'node.php';

class linkedList
{
    /*Propiedades de la lista*/
    private int $id;
    private static int $NUM_LISTS = 0;
    private ?Node $first = null;
    private ?Node $last = null;

    /**
     * Constructor for the linkedList class
     *
     * Initializes the id of the linked list and sets it to the next available id.
     *
     * @return void
     */
    public function __construct()
    {
        $this->id = self::$NUM_LISTS++;
    }

    /**
     * Get the first node in the linked list.
     *
     * @return Node The first node in the linked list.
     */
    public function getFirst(): Node
    {
        return $this->first;
    }

    /**
     * Get the last node in the linked list.
     *
     * @return Node The last node in the linked list.
     */
    public function getLast(): Node
    {
        return $this->last;
    }

    /**
     * Get a node by its id.
     *
     * @param int $id The id of the node to retrieve.
     * @return Node|null The node with the given id, or null if not found.
     */
    public function getByid(int $id): ?Node
    {
        $node = $this->first;
        while ($node != null) {
            if ($node->getId() == $id) {
                return $node;
            }
            $node = $node->getNext();
        }
        return null;
    }

    /**
     * Checks if the linked list is empty.
     *
     * @return bool True if the linked list is empty, false otherwise.
     */
    public function isNull(): bool
    {
        return $this->first == null;
    }

    /**
     * Get the size of the linked list.
     *
     * @return int The number of nodes in the linked list.
     */
    public function size(): int
    {
        $counter = 0;

        if ($this->isNull()) {
            return $counter - 1;
        }

        $size = $this->first;

        while ($size != null) {
            $counter++;
            $size = $size->getNext();
        }

        return $counter;
    }

    /**
     * Insert a new node with the given data at the end of the linked list.
     *
     * @param mixed $data The data to be stored in the new node.
     * @return void
     */
    public function insert($data): void
    {
        $newNode = new Node($data);

        if ($this->first == null) {
            $this->first = $newNode;
            $this->last = $newNode;
        } else {
            $this->last->setNext($newNode);
            $this->last = $this->last->getNext();
        }
    }

    /**
     * Insert a new node with the given data at the beginning of the linked list.
     *
     * @param mixed $data The data to be stored in the new node.
     * @return void
     */
    public function insertAtFirst($data): void
    {
        $nodeAtFirst = new Node($data);

        $nodeAtFirst->setNext($this->first);

        $this->first = $nodeAtFirst;
    }

    /**
     * Insert a new node with the given data at the specified index in the linked list.
     *
     * @param int $index The index at which to insert the new node.
     * @param mixed $data The data to be stored in the new node.
     *
     * @throws Exception If the specified index is out of range.
     *
     * @return void
     */
    public function insertAt(int $index, $data): void
    {
        if ($index < 0 || $index > $this->size()) {
            throw new Exception("\nNo existe la posición " . $index + 1);
        }
        $newNode = new Node($data);
        if ($index == 0) {
            $this->insertAtFirst($data);
        } else {
            $temp = $this->first;
            for ($i = 0; $i < $index - 1; $i++) {
                $temp = $temp->getNext();
            }
            $newNode->setNext($temp->getNext());
            $temp->setNext($newNode);
        }
    }

    /**
     * Checks if the linked list is empty.
     *
     * @return bool True if the linked list is empty, false otherwise.
     */
    private function checkEmptyList(): bool
    {
        if ($this->first == null) {
            throw new Exception("La lista está vacía");
        }

        if ($this->first->getNext() == null) {
            $this->first = null;
            $this->last = null;
            return false;
        }

        return true;
    }

    /**
     * Removes the first node from the linked list.
     *
     * @return bool True if the first node was successfully removed, false otherwise.
     */
    public function removeFirst(): bool
    {
        if (!$this->checkEmptyList()) {
            return false;
        }

        $this->first = $this->first->getNext();
        return true;
    }

    /**
     * Removes the last node from the linked list.
     *
     * @return bool True if the last node was successfully removed, false otherwise.
     */
    public function removeLast(): bool
    {
        if (!$this->checkEmptyList()) {
            return false;
        }

        $temp = $this->first;
        while ($temp->getNext()->getNext() !== null) {
            $temp = $temp->getNext();
        }
        $temp->setNext(null);
        return true;
    }

    /**
     * Removes a node at the specified index from the linked list.
     *
     * @param int $index The index of the node to be removed.
     *
     * @return bool True if the node was successfully removed, false otherwise.
     */
    public function removeAt(int $index): bool
    {
        // Check if the linked list is empty
        if ($this->isNull()) {
            throw new Exception("\nNo hay elementos para eliminar");
            return false;
        }

        // Check if the specified index is out of range
        if ($index < 0 || $index > $this->size()) {
            throw new Exception("\nNo existe la posición " . ($index + 1));
            return false;
        }

        // If the index is 0, remove the first node
        if ($index == 0) {
            return $this->removeFirst();
        }

        // If the index is the last one, remove the last node
        if ($index == $this->size() - 1) {
            return $this->removeLast();
        }

        // Otherwise, find the node before the one to be removed
        $temp = $this->first;
        for ($i = 0; $i < $index - 1; $i++) {
            $temp = $temp->getNext();
        }

        // Set the next node of the node before the one to be removed to the next node of the one to be removed
        $temp->setNext($temp->getNext()->getNext());

        return true;
    }

    /**
     * Get a string representation of the linked list.
     *
     * @return string A string representation of the linked list.
     */
    public function __toString(): string
    {
        $list = "List [ ";
        $temp = $this->first;
        while ($temp != null) {
            $list .= $temp->getData();
            $list .= ($temp->getNext() != null) ? ", " : "";
            $temp = $temp->getNext();
        }
        $list .= " ]";
        return $list;
    }
}
