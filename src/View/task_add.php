<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Добавить задачу</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .form {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #ffffffff;
            color: black;
            padding: 12px 24px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;

        }
        button:hover {
            background-color: #6384f1ff;
            color: white;
        }
        .back {
            display: inline-block;
            background-color: #ffffffff;
            color: black;
            padding: 12px 24px;
            margin: 10px;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s;
            font-size: 16px;
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
    </form>
    
    <a href="?route=task/list" class="back">Назад</a>
</body>

</html>