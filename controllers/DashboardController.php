<?php

namespace app\controllers;

use Yii;
use app\models\CoacherSearch;
use app\models\SpeakerSearch;
use app\models\ParticipantSearch;
use app\models\VolunteerSearch;
use app\models\SponsorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class DashboardController extends \yii\web\Controller
{
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

        return $this->render('index', [
            'dataProviderParticipant' => $dataProviderParticipant,
            'dataProviderCoacher' => $dataProviderCoacher,
            'dataProviderSponsor' => $dataProviderSponsor,
            'dataProviderVolunteer' => $dataProviderVolunteer,
            'dataProviderSpeaker' => $dataProviderSpeaker,
        ]);
    }

}
