<?php //изменить это
namespace App\Repository;

use App\Model\Task;
class InMemoryFileTaskRepository implements FileTaskRepositoryInterface
{
    public function findAll(): array{}
    public function add(App\Model\Task $task): void{;}
}
?>