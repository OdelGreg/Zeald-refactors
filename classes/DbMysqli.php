<?php
require_once('classes/DbInterface.php');

class DbMysqli implements DbInterface
{
    protected $_connection;

    protected $_config;

    public function __construct(array $config)
    {
      $this->_config = $config;
    }

    public function connection()
    {
        if( $this->_connection === null ) {
            $this->_connection = new mysqli($this->_config['host'], $this->_config['username'], $this->_config['password'], $this->_config['table']);
        }

        return $this->_connection;
    }

    public function query($sql)
    {
        $result = $this->connection()->query($sql);
        if (!is_object($result)) {
            return $result;
        }

        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }
}