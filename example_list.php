#!/usr/bin/env php5
<?php
# You must edit the following values with your own
$user_id = null;
$api_key = null;

@include 'local_config.php';

require_once 'CloudKey.php';

$cloudkey = new CloudKey($user_id, $api_key);

# List some video and display the media_id and title:
$page = 1;
while(1) {
    $res = $cloudkey->media->list(array('fields' => array('id', 'meta.title'), 'page' => $page++));
    foreach($res->list as $media) {
        printf("%s %s\n", $media->id, $media->meta->title);
    }
    if ($res->page == $res->pages) {
        break;
    }
}
