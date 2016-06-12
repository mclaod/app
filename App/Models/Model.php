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
        return $db->query(
            'SELECT * FROM '.static::TABLE . ' WHERE  id=:id',
            array('id' => $id),
            static::class
        )[0];
        
    }    

}

