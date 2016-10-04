<?php
namespace App\Models;

use \App\Db;

class Model
{
   const TABLE = '';
    
   public $id;

   public static function findAll()
   {
       $db = Db::instance();
       return $db->query(
           'SELECT * FROM '.static::TABLE,
           array(),
           static::class
       );
   }

    public function isNew()
    {
        return empty($this->id);
    }
    
    public static function findById($id)
    {
        $db = Db::instance();
        $res = $db->query(
        'SELECT * FROM '.static::TABLE . ' WHERE  id=:id',
        array('id' => $id),
        static::class
    )[0];
        return $res;
        
    }

    public function insert()
    {
        if (!$this->isNew())
        {
            return;
        }

        foreach ($this as $key => $v)
        {
            if($key == 'id'){
                continue;
            }
            $columns[] = $key;
            $values[':'.$key] = $v;
        }


        $sql = 'INSERT INTO '.static::TABLE.' ('.implode(', ', $columns).') VALUES 
        ( '.implode(',', array_keys($values)).')';

        //var_dump($sql);
        //die;
        $db = DB::instance();
        $db->execute($sql, $values);

        return $db->lastInsertId();
    }

    public function update()
    {
        if ($this->isNew())
        {
            return;
        }

        foreach ($this as $key => $v)
        {
            if($key == 'id'){
                continue;
            }
            $columns[] = $key;
            $values[':'.$key] = $v;
            $pairs[] = $key .'='.':'.$key;
        }

        $sql = 'UPDATE '.static::TABLE.' SET '.implode(', ', $pairs).' WHERE id='.$this->id;

        echo $sql;
        //die;
        $db = DB::instance();
        return $db->execute($sql, $values);
    }



}

