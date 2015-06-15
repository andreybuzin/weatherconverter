<?php

namespace app\modules\weatherconverter\models;
use app\components\matrixspace\TempConvert;
use Yii;
use yii\base\Model;

/**
 * WeatherForm is the model for convertation of weather from Celsius to Fahrenheit.
 */
class WeatherForm extends Model
{
    /**
     * This method converts the temperature from Сelsius to Fahrenheit.
     *
     * @param float $temperature the temperature in Celsius.
     * @return float the temperature in Fahrenheit.
     */
    public function convertTemperature($temperature, $type)
    {   
        // $client = new \SoapClient('http://www.w3schools.com/webservices/tempconvert.asmx?wsdl');
        $client = new TempConvert('http://www.w3schools.com/webservices/tempconvert.asmx?wsdl');
        if($type === "CF")
        {
            $result = $client->CelsiusToFahrenheit($temperature);
            return $result->CelsiusToFahrenheitResult;
        }
        else if($type === "FC")
        {
            $result = $client->FahrenheitToCelsius($temperature);
            return $result->FahrenheitToCelsiusResult;
        }

    }
}
