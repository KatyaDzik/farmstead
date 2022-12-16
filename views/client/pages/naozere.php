<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Усадьба "НА ОЗЕРЕ"</title>
</head>
<body>
    <h3>Заказать звонок</h3>
    <form action="/naozere/feedback" method="POST">
    <div class="form_group">
    <label for="name">ИМЯ </label>
    <input type="text" id="name" name="name">
    </div>

    <div class="form_group">
    <label for="number">ТЕЛЕФОН </label>
    <input type="text" id="number" name="number">
    </div>

    <div class="form_group">
    <label for="email">ЭМЕЙЛ </label>
    <input type="text" id="email" name="email">
    </div>

    <div class="form_group">
    <label for="message">Опишите коротко ваш вопрос </label>
    <input type="textarea" id="message" name="message">
    </div>
    <button type="submit">Отправить</button>
    </form>
</body>
</html>