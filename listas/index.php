<?php
require_once 'list.php';

class listas
{

    public linkedList $myList;

    /**
     * Initializes the linked list object.
     *
     * @param mixed $id The id of the linked list.
     * @return void
     */
    public function __construct()
    {
        $this->myList = new linkedList();
        $this->myList->insert(5);
    }

    /**
     * Main function of the program.
     *
     * @return void
     */
    public function main(): void
    {
        $isRunning = true;

        echo "La lista es: " . $this->myList . "\n\n";

        do {
            echo "Por favor, introduce una opción: \n";
            echo "1. Mostrar la lista.\n";
            echo "2. Añadir un elemento a la lista.\n";
            echo "3. Añadir un elemento al inicio de la lista.\n";
            echo "4. Añadir un elemento en una posición x de la lista.\n";
            echo "5. Eliminar el primer elemento de la lista.\n";
            echo "6. Eliminar el último elemento de la lista.\n";
            echo "7. Eliminar un elemento en una posición x de la lista.\n";
            echo "8. Ver el tamaño de la lista.\n";
            echo "9. Salir.\n";

            echo "Opción: ";
            $option = (int)trim(fgets(STDIN));
            echo "\n";

            $correctOption = match ($option) {
                1 => $this->showList(),
                2 => $this->addElement(),
                3 => $this->addFirst(),
                4 => $this->addAt(),
                5 => $this->deleteFirst(),
                6 => $this->deleteLast(),
                7 => $this->deleteAt(),
                8 => $this->listSize(),
                9 => $isRunning = false,
                default => "La opción introducida no es válida. Por favor, introduce una opción válida.\n",
            };

            if ($correctOption === true) {
                /*Imprime la nueva lista*/
                echo "\nLa nueva lista es: " . $this->myList . "\n";
            } else {
                echo $correctOption;
            }
            $correctOption = !$correctOption;
        } while ($isRunning);
    }


    /**
     * Displays the linked list.
     *
     * @return void
     */
    private function showList(): void
    {
        echo "La lista es: " . $this->myList . "\n";
    }

    /**
     * Inserts a new element at the end of the linked list.
     *
     * @return bool True.
     */
    private function addElement(): bool
    {
        $this->myList->insert($this->selectValue());
        return true;
    }

    /**
     * Adds a new element at the beginning of the linked list.
     *
     * @return bool True.
     */
    private function addFirst(): bool
    {
        $this->myList->insertAtFirst($this->selectValue());
        return true;
    }

    /**
     * Adds a new element at a specified position in the linked list.
     *
     * @return bool True if the element is successfully added, false otherwise.
     */
    private function addAt(): bool
    {
        try {
            $this->myList->insertAt($this->selectPosition(), $this->selectValue());
        } catch (\Throwable $th) {
            echo $th->getMessage() . "\n";
            return false;
        }
        return true;
    }

    /**
     * Deletes the first element from the linked list.
     *
     * @return bool True.
     */
    private function deleteFirst(): bool
    {
        $this->myList->removeFirst();
        return true;
    }

    /**
     * Deletes the last element from the linked list.
     *
     * @return bool True.
     */
    private function deleteLast(): bool
    {
        $this->myList->removeLast();
        return true;
    }

    /**
     * Deletes an element at a specified position in the linked list.
     *
     * @return bool True if the element is successfully deleted, false otherwise.
     */
    private function deleteAt(): bool
    {
        try {
            $this->myList->removeAt($this->selectPosition());
        } catch (\Throwable $th) {
            echo $th->getMessage() . "\n";
            return false;
        }
        return true;
    }

    /**
     * Displays the size of the linked list.
     *
     * @return void
     */
    private function listSize(): void
    {
        echo "El numero de elementos en la lista es de: " . $this->myList->size() . "\n";
    }

    /**
     * Selects a value to be inserted into the linked list.
     *
     * @return int|any The selected value or any if the input is not a number.
     */
    private function selectValue(): ?int
    {
        $value = null;

        echo "Por favor, introduce el valor: ";
        $value = trim(fgets(STDIN));

        return $value;
    }

    /**
     * Selects a position to be used in the linked list operations.
     *
     * @return int The selected position.
     */
    private function selectPosition(): int
    {
        $selected = false;
        $position = 0;

        do {
            $selected = true;

            echo "Por favor, ingresa la posición: ";
            $position = trim(fgets(STDIN));

            if (!is_numeric($position)) {
                $selected = false;
                echo "El valor introducido no es un número. Por favor, introduce un número.\n";
            }
        } while (!$selected);

        return (int)$position - 1;
    }
}

/*Main*/
$program = new listas();
$program->main();
