<?php

class DofusAPI {

    static function get($url)
    {
        return Config::get('dofus.web-api') . $url;
    }

}
