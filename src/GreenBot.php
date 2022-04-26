<?php
class GreenBot{
    public function Request(array $data = [], string $method, string $token = null){
        $token = $token ?? $this->env('BotToken');
        $curl = curl_init("https://api.telegram.org/bot{$token}/{$method}");
        curl_setopt($curl, 19913,true);
        curl_setopt($curl, 10015, $data);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
    public function setWebHook(bool $is_bot = true, string $token = null, string $url = null, $ServerIp = null, $max_connections = null, bool $update_load = false){
        $BotToken = $token;
        $pathFile = $url;
        $BotToken = $is_bot ? $this->env('BotToken') : $token ;
        $pathFile = $url ?? $this->env('FileLocationIndexBot');
        $ArrayExec  = ['url' => $pathFile];
        $ServerIpArray = $ServerIp ? ['ip_address' => $ServerIp] : [];
        $max_connections = $max_connections ? ['max_connections' => $max_connections] : [];
        $drop_pending_updates = $update_load ? ['drop_pending_updates' => true] : [];
        
        $ArrayExec = array_merge($ArrayExec, $ServerIpArray, $max_connections, $drop_pending_updates);
        return $this->Request( $ArrayExec , 'setwebhook' , $BotToken);
    }
    public function deleteWebHook(bool $is_bot = true, string $token = null){
        $BotToken = $is_bot ? $this->env('BotToken') : $token ;
        return $this->Request([], 'deleteWebhook', $BotToken);
    }
    public function WebhookInfo(bool $is_bot = true, string $token = null){
        $BotToken = $is_bot ? $this->env('BotToken') : $token ;
        return $this->Request([], 'getWebhookInfo', $BotToken);
    }
    public function sendMessage(string $textMessage, $chat_id, $reply = null, array $Keyboard = null, string $parseMode = "markdown"){
        if(gettype($Keyboard) == 'array'){
            $Keyboard = json_encode($Keyboard);
        }
        return $this->Request([
        'chat_id' => $chat_id,
        'text'=>$textMessage,
        'reply_to_message_id'=>$reply,
        'reply_markup'=>$Keyboard,
        'parse_mode'=>$parseMode
        ],'sendmessage');
    }
    public function getChatMember($chat_id , $user_id){
        return $this->Request( [ "chat_id" => $chat_id , "user_id" => $user_id ], "getChatMember" );
    }
    public function CheckJoin($channel_id, $chat_id){
        $res = $this->Request( [ "chat_id" => $channel_id , "user_id" => $chat_id ], "getChatMember" );
    	if(isset($res->result->user) && $res->result->status == "member"){
    		return true;
    	}elseif($res->result->status == "administrator"){
    		return false;
    	}elseif($res->result->status == "creator"){
    		return true;
    	}else{
    	    return false;
    	}
    }
    public function forwardMessage($chat_id, $from_chat_id, $message_id, bool $disable_notification = true, bool $protect_content = true){
        return $this->Request([
            'chat_id'=>$chat_id,
            'from_chat_id'=>$from_chat_id,
            'message_id'=>$message_id,
            'disable_notification'=>$disable_notification,
            'protect_content'=>$protect_content
            ],'forwardMessage');
    }
    public function sendMessageIf(array $if, string $textMessage, $chat_id, $reply = null, array $Keyboard = [], string $parseMode = "markdown"){}
    public function Updates(bool $returnArray = false){
        $update = (file_get_contents('php://input'));
        file_put_contents('.json',$update);
        $update = json_decode(file_get_contents(".json"),$returnArray);
        return $update;
    }
    public function env(string $name,string $value = null){
        $env_path = __DIR__ . '/.env';
        if (file_exists($env_path)){
            $env_file_map = file_get_contents($env_path);
            $env_file = explode(PHP_EOL,$env_file_map);
            foreach ($env_file as $key => $values){
                if (preg_match('/([0-9-a-z-A-Z-\_]+)\=(.*)/',$values,$match_env)){
                    if ($match_env[1] == $name){
                        if (is_null($value)){
                            return (trim($match_env[2]));
                        }
                        if (file_put_contents($env_path,str_replace($values,$name."=" . $value,$env_file_map))){
                            return (trim($value));
                        } else{
                            return false;
                        }
                    }
                }
            }
            return false;
        }else{
            file_put_contents($env_path,null);
        }
    }
}
