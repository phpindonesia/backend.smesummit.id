<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MailBroadcastController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

    public function actionToMemberPhpid() 
    {
        $db = yii::$app->db;
        $row = $db->createCommand('
            select * from member_phpid
            where mailed is null
            order by user_id 
            limit 1
        ')->queryOne();

        if ($row != null) {
            Yii::$app->mailer->compose('sme_mail_template', [
                //'params' => $params,
                //'url'   => $url
            ])
            ->setFrom(['info@smesummit.id'=>'SME Summit 2019'])
            ->setTo($row['email'])
            ->setSubject('[SME Summit 2019] Registrasi Sudah dibuka!!!...')
            ->send();  

            $db->createCommand('
            update member_phpid
            set mailed = now()
            where user_id = '.$row['user_id']
            )->execute();

        }                

    }
}
