<?

namespace Core;

use Core\Config as Cnf;
use PDO;

class Model
{
    protected $update_time = true;
    protected $create_time = true;
    protected static $DB;

    protected $default_columns = [
        'update_time' => 'date_update',
        'create_time' => 'date_create',
        'pk' => 'id'
    ];


    /**
     * Connect to db or get exists
     *
     * @return PDO
     */
    protected static function getDB()
    {
        if (self::$DB === null) {
            list($driver, $host, $name, $user, $pwd) = [
                Cnf::DB_DRIVER, Cnf::DB_HOST, Cnf::DB_SCHEME, Cnf::DB_USER, Cnf::DB_PASSWORD];
            $dsn = "$driver:host=$host;dbname=$name;charset=utf8";

            self::$DB = new PDO(
                $dsn,
                $user,
                $pwd,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        }
        return self::$DB;
    }

    /**
     * get all rows by table
     * @param string $table
     * @param string[] $columns
     * @param string $add //add query string include after FROM <table>
     * @return array array rows from table, row as array
     */
    public static function getRows($table, $columns = ['*'], $add = '')
    {
        $db = self::getDB();

        $columns = implode($columns);
        $stmp = $db->query("SELECT $columns FROM $table $add;");

        return $stmp->fetchAll();
    }

    /**
     * Insert new row to table
     * @param string $table
     * @param array $data [col=>value]
     * @return string new id or 0
     */
    public static function insertRow($table, $data)
    {
        $arPrep = ['cols' => '', 'val' => ''];
        $arCols = array_keys($data);
        $arValues = [];

        end($arCols) && $lastKey = key($arCols);
        foreach ($arCols as $key => $col) {
            $arPrep['cols'] .= "`{$col}`";
            $arPrep['val'] .= "?";
            $arValues[] = $data[$col];
            if ($key === $lastKey) continue;
            $arPrep['cols'] .= ',';
            $arPrep['val'] .= ',';
        }

        $db = self::getDB();
        try {
            $stmp = $db->prepare("
            INSERT INTO $table ({$arPrep['cols']}) VALUES ({$arPrep['val']})");
            $stmp->execute($arValues);
        } catch (\Exception $error) {
            return false;
        }
        return $db->lastInsertId();

    }


}