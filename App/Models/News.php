<?php
namespace App\Models;


/**
 * Class News
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */

class News extends \App\Models\Model
{
    const TABLE = 'news';
    
    public $title;
    public $lead;
    public $author_id;


    public function __get($name)
    {
        switch ($name)
        {
            case 'author':
                return \App\Models\Author::findById($this->author_id);
                break;
            default:
                return false;
        }
    }

    public function __isset($name)
    {
        switch ($name)
        {
            case 'author':
                return true;
                break;
            default:
                return false;
        }
    }

}