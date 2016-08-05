<?php
class Db {
    
    /**DB**/
    private $db;
    
    /**单例**/
    protected static $instance = NULL;
    
    /**链接信息**/
    private $dsn = 'mysql:host=localhost;dbname=ag_frame';
    private $username = 'root';
    private $password  = '';
        

    /**
     * @return bool|Db
     */
    public static function get_instance() {
        if (!self::$instance) {
            //echo 'IN'."<br/>";
            self::$instance = new Db();
        }
        
        return self::$instance;
    }
    
    /**
     * 初始化Db
     * @global object $config
     * @param bool $dbname
     */
    public function __construct($dbname = false) {
        try {
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            $this->db->exec("SET NAMES utf8;");
        } catch (Exception $ex) {
            die('The database connection failed The databases connection failed.');
        }
    }
    
    /**
     * 查询分发器
     * @param unknown $sql
     * @param unknown $fetchStyle
     */
    public function query($statement, $mcache = true, $fetchStyle = PDO::FETCH_ASSOC) {        
        try {
            if (preg_match("/INSERT/is", $statement)) {
                //INSERT
                $this->db->exec($statement);
                $result = $this->db->lastInsertId();
            } else if (preg_match("/UPDATE|DELETE|REPLACE/s", $statement)) {
                $result = $this->db->exec($statement);
            } else {
                $result = $this->rawQuery($statement, $fetchStyle);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
        
        return $result;
    }
    
    /**
     * 直接执行SQL语句
     * @param string $statement
     * @param int $fetchStyle
     * @return array
     */
    private function rawQuery($statement, $fetchStyle) {
        // buffer模式
        $query = $this->db->prepare($statement);
        $query->execute();
       // var_dump($fetchStyle);die();
        $result = $query->fetchAll($fetchStyle);
        $query->closeCursor();
        
        return $result;
    }
    
    /**
     * 查询一个数据
     * @param string $SQL
     * @return string
     */
    public function getOne($SQL, $cache = true) {
        $ret = $this->query($SQL, $cache);
        if (!$ret[0]) {
            return false;
        }
        return current($ret[0]);
    }

    /**
     * 查询一行数据
     * @param string $SQL
     * @return array
     */
    public function getOneRow($SQL, $cache = false) {
        $ret = $this->query($SQL, $cache);
        if ($ret) {
            return $ret[0];
        }
        return false;
    }
}

//链接数据库
