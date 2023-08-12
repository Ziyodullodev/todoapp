<?php


$config = require_once "config.php";
require_once "autoload.php";
// require_once "db/db.php";
// require_once "components/functions.php";
// require_once 'lang/i18n.class.php';

$tg = new Telegram(['token' => TOKEN]);
$tg->set_webhook("https://465d-37-110-211-100.ngrok-free.app/hook.php");
$updates = $tg->get_webhookUpdates();


if (!empty($updates)) {
    
    if (!empty($updates['message']['chat']['id'])) {
        $tg->set_chatId($updates['message']['chat']['id']);
        // $db = new Database($config['db_lang'],$config['db_host'], $config['db_name'], $config['db_username'], $config['db_password'], $updates['message']['chat']['id']);   
    }else{
        $tg->set_chatId($updates['callback_query']['message']['chat']['id']);
    }
    $tg->send_message("Assalomu alaykum");
    
    if (!empty($updates['message']['text'])) {
        $text = $updates['message']['text'];
        $main = new Main($tg);
        if (!$user_profile) {
            $main->startHandler(["Asalomu alaykum botga hush kelibsiz o'zingizga qulay bo'lgan tilni tanlang."]);
            $localbase->create_user($updates['message']['chat']['first_name'], 'start', $updates['message']['chat']['id'], 1);
        }
        
    }
}