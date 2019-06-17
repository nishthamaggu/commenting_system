<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments';
    protected $fillable = ['comment', 'author'];

    public function getReplies($id) {
    	$reply = Replies::where('comment_id', $id)->where('parent_reply_id', null)->get()->toArray();

    	$i = 0;

    	foreach ($reply as $rply) {
    		$reply[$i++]['subReply'] = $this->getSubReply($rply['id']);
    	}

    	return $reply;
    }

    public function getSubReply($id) {
    	$subReply = Replies::where('parent_reply_id', $id)->get()->toArray();
    	return $subReply;
    }
}
