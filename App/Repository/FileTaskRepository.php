<?php

namespace App\Repository;

use App\Model\Task;
class InMemoryTaskRepository implements TaskRepositoryInterface
{

    public function findAll(): array{
        if (file_get_contents("storage/task.json")===true){
            $bd = json_decode("storage/task.json", true);
        }
        
        return [
            new Task("Купить кофе"),
            new Task("Проспать пары"),
            new Task("Опоздать на пары"),
        ];
    }
}
?>