<?php
if(!function_exists('parseXmlToCollection'))
{
    /**
     * Method used to parse response from XML to Laravel Collection.
     *
     * @param $response
     * @return \Illuminate\Support\Collection
     */
    function getXmlData($response)
    {
        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $data = json_decode($json,TRUE);

        return $data['channel']['item'];
    }
}

if(!function_exists('aqiAverage'))
{
    /**
     * Method used to calculate average aqi.
     *
     * @param $aqiData
     * @return float
     */
    function aqiAverage($aqiData)
    {
        $sum = 0;

        foreach ($aqiData as $item)
        {
            $sum += $item->air_quality_index;
        }

        return round($sum / count($aqiData));
    }
}
