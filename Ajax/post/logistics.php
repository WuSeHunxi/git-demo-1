<?php
    $kuaidi = array();
    $kuaidi["1000"] = array(
        "info" => '王小三的快递',
        'status' => '配送中', 
    );
    $kuaidi["1001"] = array(
        "info" => '王三的快递',
        'status' => '配送中', 
    );
    $kuaidi["1002"] = array(
        "info" => '张三的快递',
        'status' => '已配送', 
    );
    /*    * 传送方式 GET
         * 参数 kuaidi_id 需要查询的快递单号
         * callback 回调函数名
     * */
    if(!empty($_GET["kuaidi_id"])){
        //如果没有传回调函数
        if(empty($_GET["callback"])){
            echo json_encode($kuaidi[$_GET["kuaidi_id"]]);
        }else{
            //如果有回调函数 那么输出 jsonp
            echo $_GET["callback"]."(".json_encode($kuaidi[$_GET["kuaidi_id"]]).")";
        }
    }
?>