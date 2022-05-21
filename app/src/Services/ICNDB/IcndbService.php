<?php

class IcndbService
{
    /**
     * @param int $jokesCount
     * @return false|string
     */
    public function getJokes(int $jokesCount)
    {
        $apiUrl = "http://api.icndb.com/jokes/random/".$jokesCount;
        $jokes = file_get_contents($apiUrl);

        if (isset($jokes)) {
            return json_decode($jokes);
        } else {
            return '';
        }
    }
}