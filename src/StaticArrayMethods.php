<?php
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
  StaticArrayMethods.php - Part of the php-datastructures project.

  © - Jitesoft 2017
 * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
namespace Jitesoft\Utilities\DataStructures;

use ArrayAccess;
use Closure;
use Jitesoft\Utilities\Arrays\Contracts\ListInterface;
use PHPUnit\Framework\Exception;

/**
 * Class StaticArrayMethods
 *
 * A collection of static methods used on array or ListInterface objects.
 */
final class StaticArrayMethods {
    /**
     * @param mixed               $object - Object of the current Iteration.
     * @param int                 $index  - Index of the current iteration.
     * @param ListInterface|array $list   - The list which is being iterated.
     * @return mixed
     *
     * @codeCoverageIgnore
     */
    private static function callback($object, int $index, $list) {
        throw new Exception("...");
    }

    /**
     * Foreach method for a ListInterface implementation.
     *
     * Loops through each object in the List and applies the closure on it.
     * If closure returns false, it will stop the iteration and end the method, i.e, used as a break.
     *
     * @param ListInterface|ArrayAccess $array
     * @param Closure                   $closure {@see StaticArrayMethods::callback()}
     */
    public static function forEach($array, Closure $closure): void {
        $count = count($array);
        for ($i=0;$i<$count;$i++) {
            $result = $closure($array[$i], $i, $array);
            if ($result === false) {
                return;
            }
        }
    }

    /**
     * Method to iterate and apply a callback to each value in a ListInterface implementation.
     *
     * Loops through each object in the List and applies the closure on it.
     * Any value returned from the closure will end up in the result array returned when iteration is complete.
     *
     * @param ListInterface|ArrayAccess $array
     * @param Closure                   $closure {@see StaticArrayMethods::callback()}
     * @return ListInterface|array
     */
    public static function map($array, Closure $closure) {
        $result = [];
        $count  = count($array);
        for ($i=0;$i<$count;$i++) {
            $result[] = $closure($array[$i], $i, $array);
        }
        return $result;
    }

    /**
     * Filters a ListInterface implementation.
     *
     * Loops through each object in the List and applies the closure to it.
     * If closure returns true, the object will be added to the resulting array returned at the end of the iteration.
     * If closure returns false, the object will not be added.
     *
     * @param ListInterface|ArrayAccess $array
     * @param Closure                   $closure {@see StaticArrayMethods::callback()}
     * @return ListInterface|array
     */
    public static function filter($array, Closure $closure) {
        $result = [];
        $count  = count($array);
        for ($i=0;$i<$count;$i++) {
            if ($closure($array[$i], $i, $array) === true) {
                $result[] = $array[$i];
            }
        }
        return $result;
    }

    /**
     * Fetches first object on which the closure returns true.
     * If no closure is supplied, first object of the array will be returned.
     *
     * Depending on arguments the method will do the following:
     *
     * 1) With closure:
     * Loops through each object in the List and applies the closure to it.
     * If the closure returns true, the method will stop and return the value.
     * If the closure never returns false, null will be returned.
     *
     * 2) Without closure:
     * First object in the List will be returned.
     *
     * @param ListInterface|ArrayAccess $array
     * @param Closure|null              $closure {@see StaticArrayMethods::callback()}
     * @return mixed|null
     */
    public static function first($array, ?Closure $closure = null) {
        if ($closure === null) {
            return $array[0];
        }

        $count = count($array);
        for ($i=0;$i<$count;$i++) {
            if ($closure($array[$i], $i, $array)) {
                return $array[$i];
            }
        }
        return null;
    }
}
