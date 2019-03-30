<?php

class Logger
{
    private static $instances = null;
    private $logs = [];

    protected function __construct()
    {

    }

    protected function __clone()
    {

    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    /**
     * @return Logger
     */
    public static function getInstance(): Logger
    {
        $class = static::class;
        if (!isset(static::$instances[$class])) {
            static::$instances[$class] = new static;
        }
        return static::$instances[$class];
    }

    /**
     * @param string $message
     */
    public function log(string $message): void
    {
        $this->logs[] = $message;
    }

    /**
     * @return array
     */
    public function get_logs(): array
    {
        return $this->logs;
    }
}