<?php

namespace app\controllers;

use Yii;
use app\models\Message;
use app\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;

//use yii\captcha\CaptchaAction;
//use yii\data\Pagination;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
{
    public $layout = 'general';

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Lists all Message models.
     *
     * @return string
     */
    public function actionIndex()
    {

        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pagination' => $dataProvider->pagination,
        ]);
    }

    /**
     * Displays a single Message model.
     * @param int $m_id M ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($m_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($m_id),
        ]);
    }

    /**
     * Creates a new Message model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Message();

        if ($this->request->isPost) {
            $model->m_uagent = $_SERVER['HTTP_USER_AGENT'];
            $model->m_uip = $_SERVER['REMOTE_ADDR'];
            $model->m_created_at = strftime('%Y-%m-%d %T');
            if (!Yii::$app->user->isGuest) {
                $model->m_uid = Yii::$app->user->identity->id;
                $model->m_uname = Yii::$app->user->identity->username;
            }
            if ($model->load($this->request->post()) && $model->save()) {
                $model->attachedFile = UploadedFile::getInstance($model, 'attachedFile');
                if (!empty($model->attachedFile)) {
                    $model->attachedFile->saveAs('uploads/' . $model->m_id . '_' . $this->getRandomFilename($model->attachedFile->baseName)
                        . '.' . $model->attachedFile->extension);
                }
                return $this->redirect(['view', 'm_id' => $model->m_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * Update allowed for registered users.
     * Users can update their own messages. Admin can update any message.
     * @param int $m_id M ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($m_id)
    {
        $model = $this->findModel($m_id);

        if (Yii::$app->user->isGuest) {
            return $this->render('/site/error', [
                'message' => 'Редактирование доступно зарегистрированным пользователям',
            ]);
        } else if (Yii::$app->user->identity->id == $model->m_uid || Yii::$app->user->identity->userrole == 'admin') {

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                $model->attachedFile = UploadedFile::getInstance($model, 'attachedFile');
                if (!empty($model->attachedFile)) {
                    $model->attachedFile->saveAs('uploads/' . $model->m_id . '_' . $this->getRandomFilename($model->attachedFile->baseName)
                        . '.' . $model->attachedFile->extension);
                }
                return $this->redirect(['view', 'm_id' => $model->m_id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        } else {
            return $this->render('/site/error', [
                'message' => 'Вы можете редактировать только свои сообщения',
            ]);
        }
    }

    /**
     * Deletes an existing Message model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $m_id M ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($m_id)
    {
        $this->findModel($m_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Message model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $m_id M ID
     * @return Message the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($m_id)
    {
        if (($model = Message::findOne(['m_id' => $m_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    /**
     * Generates random string consisting of permitted chars
     *
     * @param string $filename filename without extension
     * @return bool|string
     */
    public function getRandomFilename($filename)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($permitted_chars), 0, 10);
    }
}
