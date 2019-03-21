<?php

/**
* Views Randomizer is an addon for BriskLimbs that allows you to
* set random views for any given video. 
* @version: 1.0
* @BriskLimbs: 1.0^
* @since: 21st March, 2019
* @author: Saqib Razzaq
* @website: https://github.com/saqirzzq
*/

function randomizeAction($vkey) {
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	echo "<li><a href='?list=all&page=$page&randomize=$vkey'>Randomize Views</a></li>";
}

function randomize($vkey) {
	$videos = new Videos();
	$videos->initialize();

	$videos->setField('views', rand(1000, 999999), $vkey, 'vkey');
}

$addons->addTrigger('randomizeAction', 'admin_videos_actions_top', 'vkey');
if (isset($_GET['randomize'])) {
	randomize($_GET['randomize']);
}