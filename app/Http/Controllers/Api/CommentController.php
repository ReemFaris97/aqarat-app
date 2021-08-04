<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function update(Request $request, Comment $comment)
    {
        if ($comment->is_visible == 1){
            $comment->update(['is_visible'=>0]);
            $message=__('trans.success_disappear');
        }

    else{
        $comment->update(['is_visible'=>1]);
        $message=__('trans.not_disappear');
    }

        return \responder::success($message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return \responder::success(__('trans.deleted successfully'));
    }
}
