<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

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
