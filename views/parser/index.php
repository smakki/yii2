<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Parser';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-parser">
    <style type="text/css">
        #container {
            margin:0 auto;
            overflow: hidden;
        }
        #sidebar {
            float:left;
            width:340px;
        }
        #content {
            float:left;
            width:620px;
        }
    </style>
    <form method="post" action="../index.php">
        <div id="container">
            <div id="sidebar">
                <p><label>Ссылка<br><input style="width: 224px" type="text" name="url" value="<?= $_POST['url'] ?>"></label>
                </p>

                <p>Название для ВК<br>
                    <textarea style="width: 224px; height: 73px;" name="namevk"
                              placeholder="Описание для контакта без ссылки с хештегами кроме #from_alik"><?= $_POST['namevk'] ?></textarea>
                </p>
                <p><label>Категория<br><select style="width: 224px" name="category">
                            <? foreach ($category as $item) { ?>
                                <option <? if ($item['id'] == $_POST['category']) {
                                    echo "selected";
                                } ?> value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <? } ?>
                        </select></label></p>
                <p><label>Постить в ВК <input name="post_vk" type="checkbox" <? if ($_POST['post_vk']) {
                            echo "checked";
                        } ?>></label></p>
                <p><label>Инстаграмить <input name="instagram" type="checkbox" <? if ($_POST['instagram']) {
                            echo "checked";
                        } ?>></label></p>
                <? if (!isset($_POST['select_photo'])) { ?>
                    <p><label>Предложить фото для загрузки <input name="select_photo"
                                                                  type="checkbox" <? if ($_POST['select_photo']) {
                            echo "checked";
                        } ?>></label></p><? } ?>
                <p><label>Загружать фото в альбом <input name="album_photo" type="checkbox"
                            <? if ($_POST['album_photo']) {
                                echo "checked";
                            } ?>></label></p>
                <p><label>Водяной знак <input name="watermark" type="checkbox"
                            <? if ($_POST['watermark']) {
                                echo "checked";
                            } ?>></label></p>
                <p><label>С таймером <input name="with_timer" type="checkbox" <? if ($_POST['with_timer']) {
                            echo "checked";
                        } ?>
                                            onclick="showOrHide(this);"></label></p>
                <div id="id_minutes">
                    <p><label>Минут<br><input style="width: 224px" type="text" name="minutes"
                                              value="<?= $_POST['minutes'] ?>"></label></p>
                    <p><label>После отложенного <input name="postponed" type="checkbox" <? if ($_POST['postponed']) {
                                echo "checked";
                            } ?>></label></p>
                </div>
                <? if (isset($otvet['error']) && $otvet['error']['error_code'] == 14) {
                    ?>
                    <input type="hidden" name="captcha_sid" value="<?= $otvet['error']['captcha_sid'] ?>">
                    <label><img src="<?= $otvet['error']['captcha_img'] ?>"><br>
                    Введите каптчу <br><input type="text" name="captcha_key"></label><? } ?>
                <input type="submit">
            </div>
            <div id="content">
                <? if (isset($urls)) {
                    foreach ($urls as $img) {
                        $img = copyimg($img,$_POST['watermark']);

                        $imgl = "thumbnails/" . $img;

                        ?><p><label><input type='checkbox' name='imgs[]' value='<?= $img ?>'> <img
                                    src="<?= $imgl ?>"></label></p><br>
                        <?
                    }
                } ?>
            </div>
        </div>
    </form>





</div>
