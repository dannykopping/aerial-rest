<?php

	date_default_timezone_set("UTC");

    /**
     * The path to the config folder
     *
     * @see /projectroot/config
     */
    Configuration::set("config", dirname(__FILE__));

    /**
     * The path to the Slim library
     */
    Configuration::set("slim", dirname(__FILE__)."/../slim/Slim");

    /**
     * The path to the Slim Plugins library
     */
    Configuration::set("plugins", dirname(__FILE__)."/../slim-plugins/Plugins");

    /**
     * Debug mode - show debugging messages and data if TRUE
     */
    Configuration::set("debug", true);

    /**
     * The default encoding of the response data
     */
    Configuration::set("content-type", "application/xml");

    /**
     * GZIP compression of output data
     */
    Configuration::set("gzip", true);

    /**
     * The path to services
     */
    Configuration::set("services", dirname(__FILE__)."/../services");

    Configuration::load();

    class Configuration
    {
        private static $definitions = array();

        // do not allow instantiation
        final private function __construct(){}

        public static function set($name, $value)
        {
            self::$definitions[$name] = $value;
        }

        public static function get($name)
        {
            return isset(self::$definitions[$name]) ? self::$definitions[$name] : null;
        }

        public static function load()
        {
            require_once self::get("plugins")."/rest/models/Request.php";
            require_once self::get("plugins")."/rest/models/Response.php";
        }
    }