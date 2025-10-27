<?php

namespace App\Repository;

use App\Model\Task;
class FileTaskRepository implements TaskRepositoryInterface
{

    public function findAll(): array{
        if (file_get_contents("storage/task.json")===true){
            $bd = json_decode("storage/task.json",true);
        }
        return $bd;
    }
    public function add(Task $task): void{
        if (file_get_contents("storage/task.json")===true){
            $bd = json_decode("storage/task.json",true);
        }
        array_push($bd,new Task("Поесть вкусняшки"));
        $jsonString = json_encode($bd);
        file_put_contents('storage/task.json', $jsonString);
    }
}
?>