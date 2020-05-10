<?php

return [
    'to_present_user' => [
        'like' => "liked your <a href='/posts/:post_id'>post</a>",
        'love' => "loved your <a href='/posts/:post_id'>post</a>",
        'comment' => "commented to your <a href='/posts/:post_id'>post</a>",
        'share' => "shared your <a href='/posts/:post_id'>post</a>",
    ],
    'to_others' => [
        'like' => "liked :user_name's <a href='/posts/:post_id'>post</a>",
        'love' => "loved :user_name's <a href='/posts/:post_id'>post</a>",
        'comment' => "commented to :user_name's <a href='/posts/:post_id'>post</a>",
        'share' => "shared :user_name's <a href='/posts/:post_id'>post</a>",
    ],
];
