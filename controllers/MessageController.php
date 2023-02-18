<?php

namespace app\controllers;

use Yii;
use app\models\Message;
use app\models\MessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;

//use yii\captcha\CaptchaAction;
//use yii\data\Pagination;

/**
 * MessageController implements the CRUD actions for Message model.
 */
class MessageController extends Controller
{
    public $layout = 'general';
    public $isGranted = false; //will be set to true if admin is logged in

    /**
     * MessageController constructor.
     *
     * Sets isGranted = true if admin is logged in
     *
     * @param $id
     * @param $module
     * @param array $config
     */
    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->isGranted = Yii::$app->user->identity->userrole == 'admin';
    }

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
            'images' => $this->getAttachedImages($m_id),
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
                    $model->attachedFile->saveAs('uploads/' . $model->m_id . '_' . Yii::$app->security->generateRandomString(10)
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
        } else if (Yii::$app->user->identity->id == $model->m_uid || $this->isGranted) {

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                $model->attachedFile = UploadedFile::getInstance($model, 'attachedFile');
                if (!empty($model->attachedFile)) {
                    $model->attachedFile->saveAs('uploads/' . $model->m_id . '_' . Yii::$app->security->generateRandomString(10)
                        . '.' . $model->attachedFile->extension);
                }
                return $this->redirect(['view', 'm_id' => $model->m_id]);
            }

            return $this->render('update', [
                'model' => $model,
                'images' => $this->getAttachedImages($m_id),
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
     * Deleting allowed for registered users.
     * Users can delete their own messages. Admin can delete any message.
     * @param int $m_id M ID
     * @return \yii\web\Response|string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($m_id)
    {
        $model = $this->findModel($m_id);

        if (Yii::$app->user->isGuest) {
            return $this->render('/site/error', [
                'message' => 'Удаление доступно зарегистрированным пользователям',
            ]);
        } else if (Yii::$app->user->identity->id == $model->m_uid || $this->isGranted) {
            $model->delete();

            $path = 'uploads/';
            $files = FileHelper::findFiles($path, ['only' => [$model->m_id . '_*.*']]);
            foreach ($files as $file) {
                unlink($file);
            }

            return $this->redirect(['index']);
        } else {
            return $this->render('/site/error', [
                'message' => 'Вы можете удалять только свои сообщения',
            ]);
        }
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
     * Finds images attached to the message
     *
     * @param int $m_id Message id
     * @return array
     */
    public function getAttachedImages($m_id)
    {
        $path = 'uploads/';
        $files = FileHelper::findFiles($path, ['only' => [$m_id . '_*.*']]);
        $imageArr = [];

        foreach ($files as $file) {
            $filename = explode('\\', $file);
            $link = str_replace('\\', '/', $file);
            $imageArr[] = ['link' => $link, 'name' => end($filename)];
        }

        return $imageArr;

    }

    /**
     * Deletes image from web/uploads folder
     *
     * @return string|\yii\web\Response
     */
    public function actionDeleteimage()
    {
        if(Yii::$app->user->isGuest) {
            return 'Удаление доступно зарегистрированным пользователям';
        }

        $filename = explode('/', $this->request->post('image'));
        $msgIndex = explode('_', end($filename));
        reset($msgIndex);
        $model = $this->findModel(current($msgIndex));

        if (Yii::$app->user->identity->id == $model->m_uid || $this->isGranted) {

            if (Yii::$app->request->isAjax) {

                if (file_exists($this->request->post('image'))) {
                    unlink($this->request->post('image'));
                    return '1';
                } else {
                    return 'File not found';
                }
            } else {
                return $this->redirect(['view', 'm_id' => $model->m_id]);
            }
        } else {
            return 'Вы можете удалять только свои прикрепленные файлы';
        }
    }
}
