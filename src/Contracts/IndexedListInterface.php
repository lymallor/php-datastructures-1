<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  IndexedListInterface.php - Part of the php-datastructures project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Utilities\DataStructures\Contracts;

use ArrayAccess;

interface IndexedListInterface extends ListInterface {

    /**
     * Add a object to the list.
     *
     * @param $object
     * @return bool
     */
    public function add($object): bool;

    /**
     * Remove a object from the list.
     *
     * @param $object
     * @return bool
     */
    public function remove($object): bool;

    /**
     * Insert a object at the specific location.
     *
     * @param $object
     * @param int $index
     * @return bool
     */
    public function insert($object, int $index): bool;

    /**
     * Remove a object at a specific location.
     *
     * @param int $index
     * @param bool $cyclic  If true, the array will move all objects after the removed object to keep the array order.
     *                      If false, the last index will be placed at the removed objects index to speed up the
     *                      execution.
     * @return bool
     */
    public function removeAt(int $index, bool $cyclic = false): bool;

    /**
     * Insert a range of objects into the List.
     *
     * @param array|ArrayAccess $range
     * @param int $index
     * @return bool
     */
    public function insertRange($range, int $index): bool;


    /**
     * Add objects to the list.
     *
     * @param array $range
     * @return bool
     */
    public function addRange(array $range): bool;
}
