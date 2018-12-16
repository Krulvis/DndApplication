<?php
/**
 * Created by PhpStorm.
 * User: krulvis
 * Date: 12/16/18
 * Time: 2:06 PM
 */

namespace App\Parsers;


use App\Formatters\ItemParseFormatter;
use App\Item;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ItemParser
{
    protected $location;

    /**
     * ItemParser constructor.
     * @param $location
     */
    public function __construct()
    {
        $this->location = base_path(('items'));
    }


    public function parseFiles()
    {
        // Loop through files
        foreach ($this->getFiles() as $file) {
            if ($file->getExtension() == 'json') {
                $file = new \SplFileObject($file, "r");
                $contents = json_decode($file->fread($file->getSize()),true);
                $formatter = new ItemParseFormatter($contents);
                Item::create($formatter->format());
         }
        }
    }


    /**
     * @return \SplFileInfo[]
     */
    private function getFiles()
    {
        $it = new RecursiveDirectoryIterator($this->location);
        return new RecursiveIteratorIterator($it);
    }

}