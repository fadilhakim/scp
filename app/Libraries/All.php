<?php

    namespace App\Libraries;

    class All{
        function isempty($val)
        {
            if(isset($val))
            {
                return $val;
            }
            else
            {
                return "";
            }
        }
    }