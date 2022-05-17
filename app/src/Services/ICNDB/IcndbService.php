<?php

class IcndbService
{
    /**
     * @param int $jokesCount
     * @return false|string
     */
    public function getJokes(int $jokesCount)
    {
        try {
            $apiUrl = "http://api.icndb.com/jokes/random/".$jokesCount;
            $jokes = file_get_contents($apiUrl);


        } catch (\Exception $exception) {
            ;
        }

        return json_decode($jokes);
    }
}