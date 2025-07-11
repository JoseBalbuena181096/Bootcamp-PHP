<?php

namespace App\Session;

use app\interfaces\RepositoryInterface;

class Session
{
    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['beers'])) {
            $_SESSION['beers'] = [];
        }
    }

    public function get(): array
    {
        return $_SESSION['beers'];
    }
    public function create(array $data): void
    {
        $beer  = $_SESSION['beers'];
        if(count($beer) == 0) {
            $data['id'] = 1;
        }
        else{
            $lastElement = $beers[count($beers) - 1];
            $data['id'] = (int)$lastElement['id'] + 1;
        }
        array_push($beer, $data);
        $_SESSION['beers'] = $beer;
    }

    public function exists($id): bool
    {
        $beer = $_SESSION['beers'];
        foreach($beers as $beer) {
            if($beer['id'] == $id) {
                return true;
            }
        }
        return false;
    }


    public function update($data): void
    {
        $beers = $_SESSION['beers'];
        foreach($beers as $key => $beer) {
            if($beer['id'] == $data['id']) {
                $beer[$key] = $data;
                break;
            }
        }
        $_SESSION['beers'] = $beers;
    }

    public function delete(int $id): void
    {
        $beers = $_SESSION['beers'];
        foreach($beers as $key => $beer) {
            if($beer['id'] == $id) {
                unset($beers[$key]);
                $beer = array_values($beers);
                break;
            }
            $_SESSION['beers'] = $beers;
        }
    }
}
