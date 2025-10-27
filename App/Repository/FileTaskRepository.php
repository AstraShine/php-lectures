<?php

namespace App\Repository;

use App\Model\Task;
class FileTaskRepository implements TaskRepositoryInterface
{

    public function findAll(): array{
        require_once ('config.php');
        if (file_get_contents($config['storage'])===true){
            $bd = json_decode($config['storage'],true);
        }
        return $bd;
    }
    public function add(Task $task): void{
        require_once ('config.php');
        if (file_get_contents($config['storage'])===true){
            $bd = json_decode($config['storage'],true);
        }
        array_push($bd,$task);
        $jsonString = json_encode($bd);
        file_put_contents($config['storage'], $jsonString);
    }
}
?>