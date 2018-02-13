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
    public static function toArray(object $obj)
    {
        $array = (array)get_object_vars($obj);
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

    /**
     * @param object $obj
     * @return string
     */
    public static function toJsonObject(object $obj)
    {
        return json_encode(self::toArray($obj), true);
    }
}