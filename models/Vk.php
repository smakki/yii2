<?php
/**
 * Created by PhpStorm.
 * User: днс
 * Date: 26.02.2017
 * Time: 9:57
 */

namespace app\models;


use Yii;
use yii\base\Model;

class Vk extends Model
{
    private $access_token;
    private $url = "https://api.vk.com/method/";
    private $version = "3";

    public function method($method, $params = null)
    {
        $this->access_token = Yii::$app->params['access_token'];
        $p = "";
        if ($params && is_array($params)) {
            foreach ($params as $key => $param) {
                $p .= ($p == "" ? "" : "&") . $key . "=" . urlencode($param);
            }
        }
        $response = file_get_contents($this->url . $method . "?" . ($p ? $p . "&" : "") . "access_token=" . $this->access_token . "&" . "v=" . $this->version);
        if ($response) {
            return json_decode($response, true);
        }
        return false;
    }
}