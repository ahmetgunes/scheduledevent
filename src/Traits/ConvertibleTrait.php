<?php
/**
 * Created by PhpStorm.
 * User: ahmetgunes
 * Date: 13/12/2016
 * Time: 12:57
 */

namespace ScheduledEvent\Traits;

trait ConvertibleTrait
{
    function toArray()
    {
        $array = (array)get_object_vars($this);
        foreach ($array as $key => &$value) {
            if (is_object($value) && method_exists($value, 'toArray')) {
                $array[$key] = $value->toArray();
            } else if (is_array($value)) {
                foreach ($value as $deeper => $deepValue) {
                    if (is_object($deepValue) && method_exists($deepValue, 'toArray')) {
                        $value[$deeper] = $deepValue->toArray();
                    }
                }
            }
        }

        return $array;
    }

    function toObject($object)
    {
        $object = json_decode($object, true);
        $this->fromArray($object);
    }

    function fromArray($array)
    {
        if ($array) {
            foreach ($array as $key => $value) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    /**
     * @return string
     */
    function toJsonObject()
    {
        return json_encode($this->toArray(), true);
    }
}