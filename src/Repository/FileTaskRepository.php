<?php

namespace App\Repository;

use App\Model\Task;

class FileTaskRepository implements TaskRepositoryInterface
{   
    public string $filepath;
    public function __construct(string $filepath)
    {
        $this->filepath = $filepath;
    }
    public function findAll(): array
    {
        if (!file_exists($this->filepath))
            {return [];}
        $content = file_get_contents($this->filepath);
        if ($content === false || trim($content) === ''){return [];}
        $data = json_decode($content, true);
        if (!is_array($data)){return [];}
        $task =[];
        foreach ($data as $item)
            {
                $task[] = new Task(
                    $item['title']??'',
                    $item['completed']??false,
                    $item['id']??null
                );

            }
        return $task;
    }
    public function add( $task): void
    { 
        $tasks = $this->findAll();

        $tasks[] = [ 
            'id' =>count($tasks)+1,
            'title' => $task->getTitle(),
            'completed' => $task->isCompleted()
        ];
        file_put_contents($this->filepath, json_encode($tasks,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
    }
}