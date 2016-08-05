<?php 
/**
 * 框架入口文件
 * @author  AllenSun <sunyujiebj@gmail.com>
 * @since   1.0.0
 */
header('X-Powered-By: AGFrame');

// 设置默认ContentType
header("Content-type:text/html;charset=utf-8");
// 系统根目录（完整路径）
define('APP_PATH', __DIR__ . DIRECTORY_SEPARATOR);

//解析url
$URL = explode('/', $_SERVER["REQUEST_URI"]);
$r = $action = '';
$f = isset($_GET['f']) ? trim($_GET['f']) : null;
$r = isset($_GET['r']) ? trim($_GET['r']) : null;
$action = isset($_GET['action']) ? trim($_GET['action']) : null;

//加载系统异常文件
require 'system/Exception.php';
try {
    //文件测试代码
    if (!empty($f)) {
        //加载置指定文件
        $current_dir = 'phpfile/'.$f.'.php';
        if (file_exists($current_dir)) {           
            include_once($current_dir);
        } else {
            throw new agException($current_dir.'->File Not Exists!', 404);
        }
    } else {
        throw new agException('Params Error!');
    }
    echo '<script>document.title = "AGFrame--Test";</script>';
} catch (agException $e) {
    echo $e->getMessage();
}
?>