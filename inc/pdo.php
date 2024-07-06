<?php

class MyPDO extends PDO 
{
    public function __construct($options = null, $user, $password)
    {
        parent::__construct($options, $user, $password);
    }
    
    public function fetch($query) {
        $prepare = $this->query($query);
        $prepare->execute();
        return $prepare->fetch();
    }
    
    public function fetchAll($query) {
        $prepare = $this->query($query);
        $prepare->execute();
        return $prepare->fetchAll();
    }
    
    public function select($query) {
        $prepare = self::fetchAll($query);
        
        if ($prepare) {
            return $prepare;
        } else {
            return false;
        }
    }
    
    public function selectCol($query) {
        return self::fetchAll($query);
    }
    
    public function delete($query) {
        $this->exec($query);
    }
    
    public function insert($query) {
        $this->exec($query);
    }
    
    public function insert_id() {
      return $this->lastinsertId();
    }
    
    public function update($query) {
        $this->exec($query); 
    }
    
    public function selectCount($query) {
        $prepare = $this->query($query);
        $prepare->execute();
        $array = $prepare->fetch();
        foreach($array AS $key => $val) {
            $count[] = $val;
        }
        
        if (count($count) == 1) {
            return $count[0];
        }
        
        return false;
    }
    
    public function esc($query) {
        return str_replace(array( '\\', "\0", "\n", "\r", "'", '"', "\x1a" ), array( '\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z' ), $query);
    }
}
