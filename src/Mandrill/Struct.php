<?php
/**
 * User: Joe Linn
 * Date: 9/12/13
 * Time: 4:19 PM
 */

namespace Mandrill;


abstract class Struct implements \IteratorAggregate{
    /**
     * Create a Struct from an associative array
     * @param array $data associative array array('property'=>data)
     * @param bool $filter (optional) if true, $data array keys which are not defined as properties in the Struct will be ignored
     * @return Struct
     */
    public static function fromArray(array $data, $filter = false){
        $class = get_called_class();
        $object = new static();
        foreach($data as $key => $value){
            if(!$filter || property_exists($class, $key)){
                $object->$key = $value;
            }
        }
        return $object;
    }

    /**
     * @return array associative array of property=>value pairs
     */
    public function toArray(){
        $reflection = new \ReflectionClass($this);
        $publicProperties = $reflection->getProperties(~\ReflectionProperty::IS_STATIC & \ReflectionProperty::IS_PUBLIC);
        $properties = array();
        foreach($publicProperties as $property){
            if(!$property->isStatic() && !is_null($property->getValue($this))){
                $properties[$property->getName()] = $property->getValue($this);
            }
        }
        return $properties;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return \Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     */
    public function getIterator(){
        return new \ArrayIterator($this->toArray());
    }


}