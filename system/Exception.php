<?php
/**
 * 异常处理
 * @author  AllenSun <sunyujiebj@gmail.com>
 * @since   1.0.0
 */
class agException  extends Exception {

    public function errorMessage() {
        //error message
        $errorMsg = 'Error Message:'.$this->message."<br/>";
        $errorMsg .= 'File:'.$this->getFile."<br/>";
        $errorMsg .= 'Error Code:'.$this->code."   Line:".$this->getLine();
        
        return $errorMsg;
    }
}
