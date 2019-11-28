<?php 


class action {
  public function run(){
    $get = $_GET['url'];
    $params = explode('/', $get);

  //model
    $model = array_shift($params);
    require ('./models/'.$model.'.php');
    $ret = handle($params);

    //view
    extract($ret);
    require ('./views/'.$model.'.php');
 }
}

$app = new action();
$app->run();















