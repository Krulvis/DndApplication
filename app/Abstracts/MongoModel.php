<?php
/**
 * Created by PhpStorm.
 * User: krulvis
 * Date: 12/16/18
 * Time: 1:41 PM
 */

namespace App\Abstracts;


use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class MongoModel.
 *
 * @mixin \Eloquent
 */
class MongoModel extends Model
{
    protected $connection = 'mongodb';
}