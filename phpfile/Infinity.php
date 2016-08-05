<?php
/**
 * 无限级分类
 * @author  AllenSun <sunyujiebj@gmail.com>
 * @since   1.0.0
 */
 
require 'Db.php';

class Infinity {
    public $curr_data = [];
    
    public function methodOne($cid) {
        $dbh = Db::get_instance();
        $this->curr_data = self::getParent(79);
        $result = [];   
       
        //如果存在则递归
        if (!empty($this->curr_data) && isset($this->curr_data['p_id'])) {            
            $result[] = $this->curr_data;
           
            for ($i=0; $i<100; $i++) {
                if ($this->curr_data['p_id'] > 0) {                    
                    $this->curr_data = self::getParent($this->curr_data['p_id']);                    
                    $result[] = $this->curr_data;
                } else {
                    break ;
                }                
            }
        }
        
        return $result;
    }
    
    /**
     * 获取当前分类数据
     * @param unknown $c_id
     */
    public function getParent($c_id) {
        $dbh = Db::get_instance();
        return $dbh->getOneRow("SELECT * FROM pf_classify WHERE `c_id` = '{$c_id}' LIMIT 1", false, PDO::FETCH_ASSOC);
        
    }
    
    /**
     * 添加分类
     * @param unknown $param
     */
    public function add($param) {
        $sql = "INSERT INTO `pf_classify` (`c_name`, `p_id`) VALUES ('银河系', '0')";
        $dbh = Db::get_instance();
        $data = $dbh->query($sql);
        var_dump($data);die();
    }
    
}

//链接数据库
//插入数据
$Obj = new Infinity();
//$Obj->add(array(':c_name'=>'银河系',':p_id'=>'0'));



//Method One
$data_one =$Obj->methodOne(79);

//排序  使用Sort函数
sort($data_one);
//var_dump($data_one);

//获取其中一列
echo '当前总数：'.count($data_one)."<br/>";


$data_pop = array_pop($data_one);
var_dump($data_pop);
echo 'execute->:array_pop()当前总数：'.count($data_one)."<br/>";



array_push($data_one, $data_pop);
//var_dump($data_one);
echo 'execute->:array_push()当前总数：'.count($data_one)."<br/>";


echo '************************华丽丽的分割线**********************************';
//$input = array(12, 10, 9);

//$result = array_pad($input, 4, -1);
// result is array(12, 10, 9, 0, 0)

//$result = array_pad($input, -7, -1);
// result is array(-1, -1, -1, -1, 12, 10, 9)

//$result = array_pad($input, 2, "noop");
//print_r($result);

//二维数组排序


