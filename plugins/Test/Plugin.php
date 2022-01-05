<?php

namespace Test;

use Gallery\Plugin\Plugin;

class Test extends Plugin
{

    /**
     * 作者
     * @return string
     */
    public static function author()
    {
        return 'edgardong';
    }

    public static function version()
    {
        return '1.0.0';
    }

}
