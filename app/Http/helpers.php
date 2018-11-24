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
