<?php
namespace App;

class Db
{
    use Singleton;

    private $dbh;

    private function __construct()
    {
        $this->dbh = new \PDO('mysql:dbname=app;host=127.0.0.1', 'root', '');
    }
    
    public function execute($sql)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute();
        return $res;
    }

    public function query($sql, $parameters, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($parameters);
        if(false !== $res)
        {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];

    }

}