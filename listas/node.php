<?php
class Node
{

    /*Node properties*/
    private int $id = 0;
    private static int $NUM_NODES = 0;
    private $data = null;
    private ?Node $next = null;

    /**
     * Constructor for the Node class
     *
     * Initializes the data and id of the node
     *
     * @param mixed $data The data to be stored in the node
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->id = self::$NUM_NODES++;
    }

    /**
     * Function that obtains the id of the node
     *
     * @return integer The id of the node
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Function that obtains the data of the node
     *
     * @return mixed The data of the node
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Function that modifies the data of the node
     *
     * @param mixed $data The new data to be stored in the node
     * @return void
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * Function that obtains the next node
     *
     * @return Node|null The next node in the linked list, or null if there is no next node.
     */
    public function getNext(): ?Node
    {
        return $this->next;
    }

    /**
     * Function that modifies the next node
     *
     * @param Node $next The next node in the linked list to be set for this node.
     * @return void
     */
    public function setNext(?Node $next): void
    {
        $this->next = $next;
    }

    /**
     * Function that obtains the type of data of the node
     *
     * @return string The type of data of the node
     */
    public function getDataType(): string
    {
        return gettype($this->data);
    }

    /**
     * Function that sets the node in a string format so it can be read
     *
     * @return string
     */
    public function __toString(): string
    {
        return "Node: { 'id' = $this->id, 'data' = $this->data }";
    }
}
