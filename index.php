<?php
	require_once(__DIR__ . '/ClickerHeroesApi.php');

	$api = new ClickerHeroesApi();

	echo '<pre>';
	print_r($api->getStaticData('delimiter'));
	echo '</pre>';




?>