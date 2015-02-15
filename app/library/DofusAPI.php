<?php

class DofusAPI {

    static function forge($url)
    {
        return Config::get('dofus.web-api') . "forge/" . $url;
    }

    static function text($id)
    {
        return file_get_contents(Config::get('dofus.web-api') . "text/" . $id);
    }

}
