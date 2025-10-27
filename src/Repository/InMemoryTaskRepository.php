<?php

namespace App\Repository;

use App\Model\Task;
class InMemoryTaskRepository implements TaskRepositoryInterface
{

    public function findAll(): array{
        $tasks = $_SESSION['tasks'];
        return $tasks;
    }
    public function add(Task $task): void{
        $tasks = $_SESSION['tasks'];
        array_push($tasks,$task);
        $_SESSION['tasks'] = $tasks;
    }
}
?>