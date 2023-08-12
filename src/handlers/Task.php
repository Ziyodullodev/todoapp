<?php



class Main
{

    public $tg;
    public $db;

    
    public function __construct($tg, $db)
    {
        $this->tg = $tg;
        $this->db = $db;
    }

    public function main_keyboard(string $chatid)
    {
        $sql = "SELECT tasks.*
        FROM tasks 
        INNER JOIN users ON users.chatid = {$chatid} 
        WHERE tasks.user_id = user.id ORDER BY tasks.id";
        $tasks = $this->db->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $key = [];
        foreach ($tasks as $task)
        {
            $key[] = [['text' => $task->title, 'callback_data' => $task->id],['text' => "✅", 'callback_data' => "done=".$task->id]];
        }
        return $key;
    
    }
    public function task_show_keyboard($id)
    {
        return [
            [
                ['text' => "Bajarilgan", 'callback_data' => "done=".$id]
            ],
            [
                ['text' => "orqaga", 'callback_data' => "back"],
            ]
        ];
    
    }

    public function gettasks()
    {
        $keyboard = $this->main_keyboard($this->tg->get_chatId());
        return $this->tg->set_inlineKeyboard($keyboard)->edit_message("Sizning bugungi qiladigan ishlaringiz");
    }

    public function gettask($id)
    {
        $keyboard = $this->task_show_keyboard($id);
        return $this->tg->set_inlineKeyboard($keyboard)->edit_message($id."-raqamdagi task");
    }

    
}
