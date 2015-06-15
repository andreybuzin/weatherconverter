<?php 

namespace app\modules\weatherconverter\controllers;

use app\modules\weatherconverter\models\WeatherForm;
use yii\web\Controller;
use yii\helpers\Url;
use Yii;

class DefaultController extends Controller
{
	public function actionIndex()
	{
		return $this->redirect(Url::to(['/site/matrix']));
	}

	public function actionWeather()
    {
        $temperatureInput = $_GET["temperature_convert"];
        $temperatureType = $_GET["convert_type"];
        $temperatureOutput = $this->convertWeather($temperatureInput, $temperatureType);
        return $temperatureOutput; 
    }
    
    public static function convertWeather($temperatureInput, $temperatureType)
    {
        $model = new WeatherForm();
        return $model->convertTemperature($temperatureInput, $temperatureType);
    }
}