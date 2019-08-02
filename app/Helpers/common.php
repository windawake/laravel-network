<?php

// 指定标准返回格式
function apiResponse($data = [], $code = 200, $message = ''){
    if(is_string($data)){
        $message = $data;
        $data = [];
    }
    $msg = $code == 200 ? '成功' : '失败';
    $requestId = request()->header('request_id');

    $ret = [
        'code' => $code,
        'msg'  => $message ?: $msg,
        'result' => $data,
        'request_id' => $requestId,
    ];

    return response()->json($ret);
}