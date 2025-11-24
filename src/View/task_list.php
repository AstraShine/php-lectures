<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Лист Задач</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 700px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            padding: 15px;
            margin: 10px 0;
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }
        .add {
            display: inline-block;
            background-color: #ffffffff;
            color: black;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .add:hover {
            background-color: #5b79daff;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .toggle {
            background: none;
            border: 2px solid #ffffffff;
            width: 32px;
            height: 32px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }
        .content {
            flex-grow: 1;
            margin: 0 20px;
            font-size: 16px;
        }
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .delete {
            background: #ffffffff;
            color: black;
            border: none;
            border-radius: 4px;
            padding: 6px 12px;
            cursor: pointer;
            font-size: 12px;
            transition: background-color 0.3s;
        }
        .delete:hover {
            background: #5373ddff;
            color: white;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            background: white;
        }
        .empty-state p {
            color: #6c757d;
            font-size: 18px;
            margin-bottom: 20px;
        }
        h1 {
            color: #333;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Список задач</h1>
        <a href="?route=task/add" class="add">Добавить задачу</a>
    </div>
        <ul>
            <?php foreach ($tasks as $task): ?>
                <li class="<?= $task->isCompleted() ? 'completed' : '' ?>">
                    <button class="toggle <?= $task->isCompleted() ? 'completed' : '' ?>" 
                            onclick="location.href='?route=task/toggle&id=<?= $task->getId() ?>'">
                        <?= $task->isCompleted() ? "✔️" : "❌" ?>
                    </button>
                    
                    
                    <div class="content">
                        <?= htmlspecialchars($task->getTitle()) ?>
                    </div>
                    
                    <div class="actions">
                        <button class="delete" 
                                onclick="if(confirm('Удалить задачу?')) location.href='?route=task/delete&id=<?= $task->getId() ?>'">
                            Удалить
                        </button>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        
</body>

</html>