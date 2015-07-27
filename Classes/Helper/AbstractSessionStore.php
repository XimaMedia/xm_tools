<?php
namespace Xima\XmTools\Classes\Helper;

/**
 * Abstract class for storing session data.
 *
 * @package xm_tools
 * @author Wolfram Eberius <woe@xima.de>
 *
 */
abstract class AbstractSessionStore
{
    protected $data = array();

    /**
     * Write data into session.
     * 
     * @param string $key
     * @param mixed $value
     * @return bool
     */
    abstract public function set($key, $value);

    /**
     * Restore data from session.
     *
     * @param  string $key
     * 
     * @return mixed
     */
    abstract public function get($key);

    /**
     * Clean up all session data.
     * 
     * @return bool
     */
    abstract public function cleanUp();
}
