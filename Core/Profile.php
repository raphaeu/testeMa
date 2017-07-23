<?php

namespace Core;

class Profile {

    const GUEST = 1;
    const USER = 2;
    const MASTER = 3;

    public static function all() {
        return [
            self::GUEST,
            self::USER,
            self::MASTER
        ];
    }

}
