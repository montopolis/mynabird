<?php

namespace Montopolis\Mynabird\Support;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr as IlluminateArr;

class Arr
{
    /**
     * data_get() is deprecated in later versions of Laravel and the replacement (Illuminate\Support\Arr::get()) behaves
     * differently (doesn't work with objects). The original implementation of data_get() is replicated here for simplicity.
     *
     * @param $target
     * @param $key
     * @param null $default
     * @return array|mixed
     */
    public static function get($target, $key, $default = null)
    {
        if (is_null($key)) {
            return $target;
        }

        $key = is_array($key) ? $key : explode('.', $key);

        foreach ($key as $i => $segment) {
            unset($key[$i]);

            if (is_null($segment)) {
                return $target;
            }

            if ($segment === '*') {
                if ($target instanceof Collection) {
                    $target = $target->all();
                } elseif (! is_array($target)) {
                    return value($default);
                }

                $result = [];

                foreach ($target as $item) {
                    $result[] = self::get($item, $key);
                }

                return in_array('*', $key) ? IlluminateArr::collapse($result) : $result;
            }

            if (IlluminateArr::accessible($target) && IlluminateArr::exists($target, $segment)) {
                $target = $target[$segment];
            } elseif (is_object($target) && isset($target->{$segment})) {
                $target = $target->{$segment};
            } else {
                return value($default);
            }
        }

        return $target;
    }
}