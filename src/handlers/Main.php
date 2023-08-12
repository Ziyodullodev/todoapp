<?php



class Main
{

    public $tg;
    public $db;

    
    public function __construct($tg, $db=null)
    {
        $this->tg = $tg;
        $this->db = $db;
    }

    public function main_keyboard(string $lang)
    {
        return [
            [
                ['text' => "Tasklar", 'callback_data' => "tasks"]
            ],
            [
                ['text' => "+ qo`shish", 'callback_data' => "add"],
            ]
        ];
    
    }

    public function startHandler()
    {
        $keyboard = $this->main_keyboard('uz');
        return $this->tg->set_inlineKeyboard($keyboard)->send_message("Bosh menu");
    }

    public function backHandler()
    {
        $keyboard = $this->main_keyboard('uz');
        return $this->tg->set_inlineKeyboard($keyboard)->edit_message("Bosh menu");
    }


    
}
