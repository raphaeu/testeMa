<?php

namespace Core;

use App\Model\Usuario;

class Auth 
{

    /**
     * Register an User on session
     * @param Usuario $user
     */
    public static function authenticate(Usuario $user) {
        self::startSession();
        if (!array_key_exists('user', $_SESSION)) {
            $_SESSION['user'] = $user;
        }
    }

    /**
     * Destroy session
     */
    public static function destroy() {
        self::startSession();
        $_SESSION = [];
        self::closeSession();
    }

    /**
     * Get User from Session
     * @return Usuario
     */
    public static function getUserSession() {
        self::startSession();
        if (array_key_exists('user', $_SESSION)) {
            return $_SESSION['user'];
        }
        return null;
    }

    /**
     * Starts session if is not started
     */
    private static function startSession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Close session if is started
     */
    private static function closeSession() {
        if (session_status() != PHP_SESSION_NONE) {
            session_destroy();
        }
    }

}
