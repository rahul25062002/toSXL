<?php

namespace app\controllers;

use yii\filters\AccessControl;
use app\models\Project;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],

                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'actions' => ['index', 'view', 'create', 'update', 'delete'], // Specify actions that should be accessible
                            'allow' => true,
                            'roles' => ['@'], // Allow only authenticated users
                        ],
                        [
                            'actions' => ['login'], // Specify actions that are public
                            'allow' => true,
                            'roles' => ['?'], // Allow only guest users
                        ],
                    ],
                    'denyCallback' => function ($rule, $action) {
                        // Redirect to login page if access is denied
                        Yii::$app->user->loginRequired();
                    },
                ],
            ]
        );
    }

    /**
     * Lists all Project models.
     *
     * @return string
     */
    public function actionIndex()
    {     
           if(Yii::$app->user->identity->role == 'admin' ||  Yii::$app->user->identity->role == 'manager'){
       
           $dataProvider = new ActiveDataProvider([
            'query' => Project::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }else{
        throw new NotFoundHttpException('The requested page does not exist.');
    }}

    /**
     * Displays a single Project model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {   

        if(Yii::$app->user->identity->role == 'admin' || Yii::$app->user->identity->role == 'manager'){
           
        $model = new Project();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
            //    Yii::$app->response->statusCode=201;
            //    Yii::$app->response->header->set('Location',['view','id'=>$model->id]);

            //    return $this->asJson([
            //     'id'=>$model->id,
            //     'message'=>'Project created successfully',
            //    ]
            //    );
                return $this->redirect(['view', 'id' => $model->id],301);
            }
        } else {
            $model->loadDefaultValues();
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }else{
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {    
        
        if(Yii::$app->user->identity->role != 'admin' || Yii::$app->user->identity->role != 'manager'){
           

        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }else{
        throw new NotFoundHttpException('The requested page does not exist.');
    }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {   
        if(Yii::$app->user->identity->role == 'admin' || Yii::$app->user->identity->role == 'manager'){
            

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
