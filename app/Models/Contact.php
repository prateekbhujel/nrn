<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Exception;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email_address',
        'subject',
        'message',
        'reply_subject',
        'reply_message',
        'replied_at',
        'replied_by',
    ];

    protected $casts = [
        'replied_at' => 'datetime',
    ];

    public static function saveData($post)
    {
        try {
            $insertArray = [
                'full_name' => $post['full_name'],
                'email_address'=>$post['email_address'],
                'subject'=>$post['subject'],
                'message'=>$post['message'],
            ];
            $insertArray['created_at'] = Carbon::now();
            if(!Contact::insert( $insertArray)){
                throw new Exception("Couldn't Save Records",1);
            }
            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }
}
