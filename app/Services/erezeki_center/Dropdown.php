<?php

namespace App\Services\erezeki_center;

/**
 * Class Dropdown
 * @package App\Services\erezeki_center
 */
trait Dropdown
{
    /**
     * 
     * @param  $name
     * @param  null     $selected
     * @param  array    $options
     * @return string
     */

    public function selectCenter($name, $selected = null, $options = array())
    {
        $list = [
            ''   => 'Select One...',
            'center1' => 'Center 1',
            'center2' => 'Center 2',
            'center3' => 'Center 3',
            'center4' => 'Center 4',

        ];

        return $this->select($name, $list, $selected, $options);
    }



}