<?php


namespace App\Models;


use Core\Model;

class Comment extends Model
{

    protected static $allCols = ['name', 'text', 'timestamp'];
    protected static $table = 'comments';

    /**
     * array comments
     * order by create date
     *
     * @return array [name=>value]
     */
    public static function getList()
    {
        $arData = [];
        $arRows = self::getRows(static::$table, ['*'], 'ORDER BY date_create');

        // Fix row data for show on page
        foreach ($arRows as $num => $row) {
            $date_create = strtotime($row['date_create']);
            $arData[] = [
                'name' => $row['name'],
                'text' => $row['text'],
                'time' => date('h:m', $date_create),
                'date' => date('d.m..Y', $date_create)
            ];
        }

        return $arData;
    }


    public static function add(string $name, string $text)
    {
        return self::insertRow(self::$table, ['name' => $name, 'text' => $text]);
    }

}