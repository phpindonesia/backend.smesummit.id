<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CoacherSearch;
use app\models\SpeakerSearch;
use app\models\ParticipantSearch;
use app\models\VolunteerSearch;
use app\models\SponsorSearch;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
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
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModelParticipant = new ParticipantSearch();
        $dataProviderParticipant = $searchModelParticipant->search(Yii::$app->request->queryParams);
        $searchModelCoacher = new CoacherSearch();
        $dataProviderCoacher = $searchModelCoacher->search(Yii::$app->request->queryParams);
        $searchModelSponsor = new SponsorSearch();
        $dataProviderSponsor = $searchModelSponsor->search(Yii::$app->request->queryParams);
        $searchModelVolunteer = new VolunteerSearch();
        $dataProviderVolunteer = $searchModelVolunteer->search(Yii::$app->request->queryParams);
        $searchModelSpeaker = new SpeakerSearch();
        $dataProviderSpeaker = $searchModelSpeaker->search(Yii::$app->request->queryParams);

        $pageSize = 5;
        $dataProviderParticipant->pagination->pageSize = $pageSize;
        $dataProviderCoacher->pagination->pageSize = $pageSize;
        $dataProviderSpeaker->pagination->pageSize = $pageSize;
        $dataProviderSponsor->pagination->pageSize = $pageSize;
        $dataProviderVolunteer->pagination->pageSize = $pageSize;

        return $this->render('index', [
            'dataProviderParticipant' => $dataProviderParticipant,
            'dataProviderCoacher' => $dataProviderCoacher,
            'dataProviderSponsor' => $dataProviderSponsor,
            'dataProviderVolunteer' => $dataProviderVolunteer,
            'dataProviderSpeaker' => $dataProviderSpeaker,
            'searchModelParticipant' => $searchModelParticipant,
            'searchModelCoacher' => $searchModelCoacher,
            'searchModelSponsor' => $searchModelSponsor,
            'searchModelVolunteer' => $searchModelVolunteer,
            'searchModelSpeaker' => $searchModelSpeaker,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
