<?php
/**
 * 封装SAE storage操作.
 * User: ruby
 * Date: 16/1/30
 * Time: 下午11:29
 */

use sinacloud\sae\Storage as Storage;

function saePutObjectFile($tmpFile, $bucket, $uri) {
    $s = new Storage();
    $s->putObjectFile($tmpFile, $bucket, $uri);
    $s->setExceptions(true);
}
?>