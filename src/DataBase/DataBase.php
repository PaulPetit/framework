<?php


namespace App\DataBase;

use App\Config;

class DataBase
{
    /**
     * @var null|\PDO
     */
    private $DB = null;
    /**
     * @var null|DataBase
     */
    private static $instance = null;

    /**
     * DataBase constructor.
     */
    private function __construct()
    {
        try {
            $config = Config::getInstance();

            $this->DB = new \PDO(
                "mysql:host=" . $config->get('database.host') . ";dbname=" .
                $config->get('database.name') . ";charset=UTF8",
                $config->get('database.user'),
                $config->get('database.password')
            );
            $this->DB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->DB->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $e->getMessage();
            echo "connection bdd échouée";
            die();
        }
    }

    /**
     * @return DataBase
     */
    private static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return \PDO
     */
    private function getDB()
    {
        return $this->DB;
    }

    /**
     * @param $statement
     * @param array $params
     * @param null $entity
     * @param array $ctorargs
     * @param bool $one
     * @return array|mixed
     */
    public static function select($statement, $params = [], $entity = null, $ctorargs = [], $one = false)
    {
        $DB = self::getInstance()->getDB()->prepare($statement);

        foreach ($params as $parameter => &$value) {
            $DB->bindParam($parameter, $value);
        }

        $DB->execute();
        if (!is_null($entity)) {
            $DB->setFetchMode(\PDO::FETCH_CLASS, $entity, $ctorargs);
        }

        if ($one) {
            return $DB->fetch();
        } else {
            return $DB->fetchAll();
        }
    }

    /**
     * @param $statement
     * @param array $params
     * @param null $entity
     * @param array $ctorargs
     * @return array|mixed
     */
    public static function selectOne($statement, $params = [], $entity = null, $ctorargs = [])
    {
        return self::select($statement, $params, $entity, $ctorargs, true);
    }

    /**
     * @param $statement
     * @param array $params
     * @return bool
     */
    public static function insert($statement, $params = [])
    {
        $DB = self::getInstance()->getDB()->prepare($statement);

        foreach ($params as $parameter => &$value) {
            $DB->bindParam($parameter, $value);
        }

        return $DB->execute();
    }

    /**
     * Renvoie l'id du dernier enregistrement en base de données
     * @return string
     */
    public static function lastInsertId()
    {
        $DB = self::getInstance()->getDB();
        return $DB->lastInsertId();
    }
}
