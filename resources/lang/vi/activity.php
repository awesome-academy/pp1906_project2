<?php

return [
    'to_present_user' => [
        'like' => "đã thích <a href='/posts/:post_id'>bài viết</a> của bạn",
        'love' => "đã yêu thích <a href='/posts/:post_id'>bài viết</a> của bạn",
        'comment' => "đã bình luận về <a href='/posts/:post_id'>bài viết</a> của bạn",
        'share' => "đã chia sẻ <a href='/posts/:post_id'>bài viết</a> của bạn",
    ],
    'to_others' => [
        'like' => "đã thích <a href='/posts/:post_id'>bài viết</a> của :user_name",
        'love' => "đã yêu thích <a href='/posts/:post_id'>bài viết</a> của :user_name",
        'comment' => "đã bình luận về <a href='/posts/:post_id'>bài viết</a> của :user_name",
        'share' => "đã chia sẻ <a href='/posts/:post_id'>bài viết</a> của :user_name",
    ],
];
