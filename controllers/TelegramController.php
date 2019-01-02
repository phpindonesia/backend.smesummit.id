<?php

namespace app\controllers;

use Yii;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\httpclient\Client;
use yii\di\Instance;
use yii\helpers\StringHelper;

class TelegramController extends \yii\rest\Controller
{
    public $layout=false;

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => \yii\filters\VerbFilter::className(),
                'actions' => [
                    //'get-webhook' => ['POST'],
                ],
            ],
            'contents'=>[
                'class' => 'yii\filters\ContentNegotiator',
                'only' => ['*'],
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                'languages' => [
                    'en',
                    'de',
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        //149.154.167.197-233 TELEGRAM  
                        //'ips' => ['localhost','::1','149.154.167.*'],
                        'ips' => ['*'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return [];
    }

    public function actionGetWebhook()
    {
        $rcv = file_get_contents('php://input');
        $m = json_decode($rcv, true);

        $text = $this->analyzeText($m);

        if ($text != null) {
            $this->sendMessage([
                            'chat_id' => $m['message']['chat']['id'],
                            'text' => $text

                        ]);
        } else {
            $this->sendMessage([
                'chat_id' => $m['message']['chat']['id'],
                'text' => 'Mohon Maaf, Bot ini masih digunakan untuk keperluan Panitia...' 
            ]);
        }
    }

    public function analyzeText($m)
    {
        $explodes = StringHelper::explode(strtolower($m['message']['text']), ' ');

        $result = null;

        if ($explodes[0] == '/start') {
            $result ='Selamat Datang! di SME Summit 2019. Bot ini masih dalam pengembangan dan baru digunakan untuk kepentingan Panitia';
        }

        if ($explodes[0] == '/id') {
            $result =$m['message']['chat']['id'];
        }
            
        return $result;
    }
    
    public function sendMessage($params)
    {
        $client = new Client();
        $response = $client->createRequest()
                ->setMethod('POST')
                ->setUrl('https://api.telegram.org/bot'.Yii::$app->params['telegramBot'].'/sendMessage')
                ->setData(['chat_id'=>$params['chat_id'],'text'=>$params['text']])
                ->setFormat(Client::FORMAT_JSON)
                ->send();
    }
}
