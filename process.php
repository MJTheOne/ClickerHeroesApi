<?php
	require_once(__DIR__ . '/ClickerHeroesApi.php');

	$api = new ClickerHeroesApi();

	$save = $_POST['save'];

	echo json_encode($api->decrypt($save));