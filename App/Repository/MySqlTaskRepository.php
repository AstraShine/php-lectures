<?php

namespace App\Repository;

use App\Model\Task;
class FileTaskRepository implements TaskRepositoryInterface
{

    public function findAll(): array{
        require_once ('config.php');
        $bd = new PDO($config['db']['dsn'],$config['db']['user'],$config['db']['pass']);
        $names = $dbh->prepare("SELECT title FROM `tasks` ORDER BY `id` DESC");
        $names->execute();
        $names = $names->fetchAll(PDO::FETCH_NUM);

        $compl = $dbh->prepare("SELECT completed FROM `tasks` ORDER BY `id` DESC");
        $compl->execute();
        $compl = $compl->fetchAll(PDO::FETCH_NUM);

        $array;
        for ($i=0; $i < $names; $i++){
            $task = $names[$i];
            if ($compl[$i]===true) $task->complete();
            array_push($array,$task);
        }
        
        return $array;
    }
    public function add(Task $task): void{
        require_once ('config.php');
        $bd = new PDO($config['db']['dsn'],$config['db']['user'],$config['db']['pass']);
        $sth = $dbh->prepare("INSERT INTO `category` SET `parent` = :parent, `name` = :name");
        $sth->execute($task);
    }
}
?>