<?php
namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int aid
 * @property string name
 */
Class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    public static function updateCat()
    {
        $albums = self::getAlbumList();
        foreach ($albums as $album) {
            $aid = intval($album['aid']);
            $name = $album['title'];
            $data = self::find()->where(['aid' => $aid])->one();
            if ($data) {
                $data->name = $name;
                $data->save();
            } else {
                $data = new Category();
                $data->name = $name;
                $data->aid = $aid;
                $data->save();
            }
        }
    }


    public static function getAlbumList()
    {
        $vk = new Vk();

        $params = array(
            "owner_id" => \Yii::$app->params['userID'],
            "need_system" => 0
        );
        $albums = ($vk->method("photos.getAlbums", $params));
        return $albums['response'];
    }
}