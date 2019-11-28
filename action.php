<?php

class action {
	public function run() {
		$get = filter_input(INPUT_GET, 'url');
		$filename = './models/' . $get . '.php';

		if (isset($get) && file_exists($filename)) {
			$params = explode('/', $get);
			$model = array_shift($params);
			require './models/' . $model . '.php';
			$ret = handle($params);
			extract($ret); //viewに変数をアサイン
			require './views/' . $model . '.php';
		} else {
			require './models/index.php';
			$ret = handle();
			extract($ret); //viewに変数をアサイン
			require './views/index.php';
		}
	}
}
