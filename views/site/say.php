<?php
use yii\helpers\Html;
$this->title = 'Приветствие';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::encode($message) ?>