<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Добавить задачу</title>
    <style>
        body {
            padding: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 100%;
            max-width: 600px;
            padding: 8px;
            border: 1px solid #2b2b2bff;
            border-radius: 2px;
        }
        button {
            background-color: white;
            color: black;
            padding: 15px;
            margin: 15px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;

        }
        button:hover {
            background-color: #6384f1ff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            color: white;
        }
        .back {
            display: inline-block;
            background-color: white;
            color: black;
            padding: 15px;
            margin: 15px;
            border: none;
            border-radius: 4px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
        }
        .back:hover {
            background-color: #6384f1ff;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .error {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <h1>Добавить новую задачу</h1>
    
    <form method="POST" action="?route=task/add">
        <div class="form">
            <input type="text" id="title" name="title" required 
                   placeholder="Введите название задачи..." 
                   value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty(trim($_POST['title'] ?? ''))): ?>
                <div class="error">Пожалуйста, введите название задачи</div>
            <?php endif; ?>
        </div>
        
        <button type="submit">Добавить задачу</button>
        <a href="?route=task/list" class="back">Назад</a>
    </form>
    
</body>

</html>