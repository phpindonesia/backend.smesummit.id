<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\httpclient\Client;
use Yii;

/**
 * Telegram Notification via Cron Job.
 *
 * This command is use for notification via telegram on scheduled cron job.
 *
 * @author Peter Kambey <peter@phpindonesia.id>
 * @since 1.0
 */
class TelegramController extends Controller
{
    public function actionSendMessage($id,$message)
    {
        //153273116 = chat_id peter
        $params['chat_id'] = $id;
        $params['text'] = $message;
                        
        $this->execute($params['chat_id'], $params);

        echo json_encode($params);
    }

    public function actionMessageToPeter($message)
    {
        //153273116 = chat_id peter
        $params['text'] = $message;
                        
        $this->execute(153273116, $params);

        echo json_encode($params);
    }

    public function actionMessageToSc($message)
    {
        $params['text'] = $message;
        $lists = [
            'peter' => '153273116',
            //'nur' => '558743094',
        ];
        
        foreach ($lists as $list) {
            $this->execute($list, $params);
        }

        echo json_encode($params);
    }
    
    public function execute($chat_id, $params=[])
    {
        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://api.telegram.org/bot'.Yii::$app->params['telegramBot'].'/sendMessage')
            ->setData(['chat_id'=>$chat_id,'text'=>$params['text']])
            ->setFormat(Client::FORMAT_JSON)
            ->send();
            
        return true;
    }

}
