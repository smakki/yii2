<?php
/**
 * Created by PhpStorm.
 * User: днс
 * Date: 25.02.2017
 * Time: 15:54
 */

namespace app\controllers;


use app\models\Category;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ParserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(){
        if (\Yii::$app->user->isGuest){
            return $this->redirect('/site/login');
        }
        Category::updateCat();
        $category = Category::find()->asArray()->all();
        return $this->render('index',['category'=>$category]);
    }

}