<?php

namespace App\Services;

use Illuminate\Support\Collection;

class CommentService
{
    const MAX_LAYERS = 3;

    /**
     * Build comments tree.
     */
    public function buildCommentsTree(Collection $comments): Collection
    {
        $data = $comments->filter(function ($comment) {
            return $comment->layer == 0;
        });

        $groupedComments = $comments->groupBy('parent_id');

        foreach ($data as $comment) {
            $comment->replies = $this->getReplies(1, $comment->id, $groupedComments);
        }

        return $data->values();
    }

    /**
     * Get comment replies.
     */
    private function getReplies(int $layer, int $parentId, Collection $groupedComments): ?Collection
    {
        if ($layer > self::MAX_LAYERS) {
            return null;
        }

        $replies = $groupedComments->get($parentId);

        if ($replies === null) {
            return null;
        }

        foreach ($replies as $comment) {
            $comment->replies = $this->getReplies($layer + 1, $comment->id, $groupedComments);
        }

        return $replies;
    }
}
