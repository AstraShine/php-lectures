<?php

namespace App\Repository;

use App\Model\Task;
use PDO;

class MySqlTaskRepository implements TaskRepositoryInterface
{
    private $pdo;
    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->exec("Set Name utf8mb4");
    }
    public function findAll(): array
    {
        $a = $this ->pdo->query("Select id title completed");
        $b = $a->fetchAll(PDO::FETCH_ASSOC);
        $tasks =[];
        foreach ($b as $bs)
            {
                $tasks[]=new Task($bs['title'], (bool)$bs['completed'],$bs['id']);
            }    
        return $tasks;
    
    
    }
    public function add(App\Model\Task $task): void
    {
        $a = $this ->pdo->prepare('Insert tasks');
        $a->execute([
            ':title'=> $task->getTitle(),
            ':completed'=> $task->isCompleted()? 1 : 0,
        ]);
    }
}
?>