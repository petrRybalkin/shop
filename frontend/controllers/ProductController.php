<?php

namespace frontend\controllers;

use common\models\Category;
use Yii;
use common\models\Product;
use common\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex($id)
    {
        $category = $this->findCategory($id);

        $searchModel = new ProductSearch();
        $searchModel->category_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'category' => $category,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $db = Yii::$app->db;
        $ip = Yii::$app->request->getUserIP();
        // - rating;
            $fetchArRat = $db->createCommand("SELECT id FROM rating WHERE product_id='".$model->id."' AND ip ='".$ip."'")->queryScalar();
            $disabled = $fetchArRat ? true : false;
            $rating = Yii::$app->request->post('rating');
            if (isset($rating) && Rating::create($rating, $model->id))
            {
                $fetchRatingCountSum = $db->createCommand("SELECT count(*), sum(rating) FROM rating WHERE product_id = '".$model->id."'")->queryAll();
                $count = $fetchRatingCountSum[0]['count(*)'];
                $SummRating = $fetchRatingCountSum[0]['sum(rating)'];
                $itogRat = $SummRating/$count;
                $db->createCommand("UPDATE article SET count_rating = '".$count."', rating = '".$itogRat."' WHERE id = '".$model->id."' ")->execute();
                $this->refresh();
            }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'disabled' => $disabled,
        ]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findCategory($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
