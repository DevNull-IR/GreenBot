<?php
include_once __DIR__ . '/../src/GreenBot.php';
$Bot = new GreenBot(false);
/**
 * f
 * c
 * d
 * t
 * v
 * */
 $update = $Bot->Updates(false);
 if(isset($update->callback_query)){
    $callback_query = $update->callback_query;
    $callback_query_id = $callback_query->id;
    $data = $callback_query->data;
    $from_id = $callback_query->from->id;
    $message_id = $callback_query->message->message_id;
    $chat_id = $callback_query->message->chat->id;
    // databse
}
if (isset($update->message)){
    
    $message = $update->message;
    if (isset($message->message_id)){
        $message_id = $message->message_id;
    }
    if (isset($message->text)){
        $text = $message->text;
    }
    if (isset($message->caption)){
        $text = $message->caption;
    }
    if (isset($update->edited_message)){
        $text = $update->edited_message->text;
    }
    if (isset($message->from)){
        $base_f = $message->from;
        $from_id = $base_f->id;
        $first_name = $base_f->first_name;
        $language_codef = $base_f->language_code;
        $is_botf = $base_f->is_bot;
        if(isset($base_f->last_name)){
            $last_name = $base_f->last_name;
        }
        if(isset($base_f->username)){
            $username = $base_f->username;
        }
    }
    if (isset($message->chat)){
        $base_c = $message->chat;
        $chat_id = $base_c->id;
        $first_name_c = $base_c->first_name;
        if(isset($base_c->last_name)){
            $last_name_c = $base_c->last_name;
        }
        if(isset($base_c->username)){
            $username_c = $base_c->username;
        }
        if (isset($base_c->language_code)){
            $language_codec = $base_c->language_code;
        }
        if (isset($base_c->is_bot)){
            $is_botc = $base_c->is_bot;
        }
        if (isset($base_c->type)){
            $tc = $base_c->type;
        }
    }
    if(isset($message->document)){
        $base_d = $message->document;
        $mime_type = $base_d->mime_type;
        $file_name = $base_d->file_name;
        $file_id_d = $base_d->file_id;
        $file_unique_id_d = $base_d->file_unique_id;
        $file_size_d = $base_d->file_size;
        if (isset($base_d->thumb)){
            $base_t = $base_d->thumb;
            $file_id_t = $base_t->file_id;
            $file_unique_id_t = $base_t->file_unique_id;
            $file_size_t = $base_t->file_size;
            $width_t = $base_t->width;
            $height_t = $base_t->height;
        }
    }
    if(isset($message->animation)){
        $base_a = $message->animation;
        $mime_type_a = $base_a->mime_type;
        $file_name_a = $base_a->file_name;
        $file_id_a = $base_a->file_id;
        $file_unique_id_a = $base_a->file_unique_id;
        $file_size_a = $base_a->file_size;
        if (isset($base_a->thumb)){
            $base_ta = $base_a->thumb;
            $file_id_ta = $base_ta->file_id;
            $file_unique_id_ta = $base_ta->file_unique_id;
            $file_size_ta = $base_ta->file_size;
            $width_ta = $base_ta->width;
            $height_ta = $base_ta->height;
        }
    }
    if(isset($message->voice)){
        $base_v = $message->voice;
        $mime_type_v = $base_v->mime_type;
        $duration_v = $base_v->duration;
        $file_id_v = $base_v->file_id;
        $file_unique_id_v = $base_v->file_unique_id;
        $file_size_v = $base_v->file_size;
    }
    if(isset($message->audio)){
        $base_au = $message->audio;
        $mime_type_au = $base_au->mime_type;
        $duration_au = $base_au->duration;
        $file_name_au = $base_au->file_name;
        $file_id_au = $base_au->file_id;
        $file_unique_id_au = $base_au->file_unique_id;
        $file_size_au = $base_au->file_size;
        if(isset($base_au->title)){
            $title_au = $base_au->title;
        }
        if(isset($base_au->performer)){
            $performer_au = $base_au->performer;
        }
    }
    if(isset($message->forward_from)){
        $forward_from = $message->forward_from;
        $forward_id = $forward_from->id;
        $forward_firstname = $forward_from->first_name;
        if(isset($forward_from->last_name)){
            $forward_lastname = $forward_from->last_name;
        }
        if(isset($forward_from->username)){
            $forward_username = $forward_from->username;
        }
    }
    if(isset($message->forward_from_chat)){
        $forward_from = $message->forward_from_chat;
        $forward_id = $forward_from->id;
        $forward_title = $forward_from->title;
        $forward_type = $forward_from->type;
    }
    if(isset($message->forward_from_message_id)){
        $forward_from_message_id = $message->forward_from_message_id;
    }
    if(isset($message->forward_signature)){
        $forward_signature = $message->forward_signature;
    }
}

if (isset($update->edited_message)){
    $message = $update->edited_message;
    if (isset($message->message_id)){
        $message_id = $message->message_id;
    }
    if (isset($message->text)){
        $text = $message->text;
    }
    if (isset($message->caption)){
        $text = $message->caption;
    }
    if (isset($message->from)){
        $base_f = $message->from;
        $from_id = $base_f->id;
        $first_name = $base_f->first_name;
        $language_codef = $base_f->language_code;
        $is_botf = $base_f->is_bot;
        if(isset($base_f->last_name)){
            $last_name = $base_f->last_name;
        }
        if(isset($base_f->username)){
            $username = $base_f->username;
        }
    }
    if (isset($message->chat)){
        $base_c = $message->chat;
        $chat_id = $base_c->id;
        $first_name_c = $base_c->first_name;
        $language_codec = $base_c->language_code;
        $is_botc = $base_c->is_bot;
        if(isset($base_c->last_name)){
            $last_name_c = $base_c->last_name;
        }
        if(isset($base_c->username)){
            $username_c = $base_c->username;
        }
    }
    if(isset($message->document)){
        $base_d = $message->document;
        $mime_type = $base_d->mime_type;
        $file_name = $base_d->file_name;
        $file_id_d = $base_d->file_id;
        $file_unique_id_d = $base_d->file_unique_id;
        $file_size_d = $base_d->file_size;
        if (isset($base_d->thumb)){
            $base_t = $base_d->thumb;
            $file_id_t = $base_t->file_id;
            $file_unique_id_t = $base_t->file_unique_id;
            $file_size_t = $base_t->file_size;
            $width_t = $base_t->width;
            $height_t = $base_t->height;
        }
    }
    if(isset($message->animation)){
        $base_a = $message->animation;
        $mime_type_a = $base_a->mime_type;
        $file_name_a = $base_a->file_name;
        $file_id_a = $base_a->file_id;
        $file_unique_id_a = $base_a->file_unique_id;
        $file_size_a = $base_a->file_size;
        if (isset($base_a->thumb)){
            $base_ta = $base_a->thumb;
            $file_id_ta = $base_ta->file_id;
            $file_unique_id_ta = $base_ta->file_unique_id;
            $file_size_ta = $base_ta->file_size;
            $width_ta = $base_ta->width;
            $height_ta = $base_ta->height;
        }
    }
    if(isset($message->voice)){
        $base_v = $message->voice;
        $mime_type_v = $base_v->mime_type;
        $duration_v = $base_v->duration;
        $file_id_v = $base_v->file_id;
        $file_unique_id_v = $base_v->file_unique_id;
        $file_size_v = $base_v->file_size;
    }
    if(isset($message->audio)){
        $base_au = $message->audio;
        $mime_type_au = $base_au->mime_type;
        $duration_au = $base_au->duration;
        $file_name_au = $base_au->file_name;
        $file_id_au = $base_au->file_id;
        $file_unique_id_au = $base_au->file_unique_id;
        $file_size_au = $base_au->file_size;
        if(isset($base_au->title)){
            $title_au = $base_au->title;
        }
        if(isset($base_au->performer)){
            $performer_au = $base_au->performer;
        }
    }
    if (isset($message->photo)){
        $photo_id = $message->photo[2]->file_unique_id;
    }
    if(isset($message->forward_from)){
        $forward_from = $message->forward_from;
        $forward_id = $forward_from->id;
        $forward_firstname = $forward_from->first_name;
        if(isset($forward_from->last_name)){
            $forward_lastname = $forward_from->last_name;
        }
        if(isset($forward_from->username)){
            $forward_username = $forward_from->username;
        }
    }
    if(isset($message->forward_from_chat)){
        $forward_from = $message->forward_from_chat;
        $forward_id = $forward_from->id;
        $forward_title = $forward_from->title;
        $forward_type = $forward_from->type;
    }
    if(isset($message->forward_from_message_id)){
        $forward_from_message_id = $message->forward_from_message_id;
    }
    if(isset($message->forward_signature)){
        $forward_signature = $message->forward_signature;
    }
}
