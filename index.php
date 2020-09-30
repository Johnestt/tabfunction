<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Лабораторная 1</title>
</head>
<body>
<p>
    Лаборатораня работа №1
</p>
<p>
    Вариант №12
</p>
<p>
    Табулирование функции: x/1-x^3
</p>
<p>
    Сделал: Нестеров И.С. из группы ПИб-<span>181</span>
</p>
<form method="post">
    <fieldset>
        <legend>Табулирование функции</legend>
    <label for="first"> Начало диапозона: <br>
        <input id="first" type="number" name="fst" value="0" placeholder="0">
    </label>
    <label for="last"><hr align="left" width="300" size="4" color="#ff9900">Колличество точек: <br>
        <input id="last" type="number" name="lst" value="5" placeholder="5">
    </label>
    <label for="step"><hr align="left" width="300" size="4" color="#ff9900">Шаг: <br>
        <input id="step" type="number" name="stp" value="1" min="0.1" step="0.1" placeholder="0.5">
    </label>
        <br>
        <input type="submit" value="Вычислить" name="button">
    </fieldset>
</form>
<?php

if ((isset($_POST['fst'], $_POST['lst'], $_POST['stp']))  && is_numeric($_POST['fst']) && is_numeric($_POST['lst']) && is_numeric($_POST['stp'])) //проверка на ввод данных (пустые ответы и неверные ответы)
{
    $q = $_POST['fst'];
    $r = $_POST['lst'];
    $e = $_POST['stp'];
    $w = $q + $r; //создание ограницений по колличеству точек
    $x = $q; //служебная часть, для вычислений

    function f($x)
    {
        if ($x != 1)   { //проверка на деление на 0
            $to = 1-pow($x, 3);
            $f = $x/$to; //сама функция
        }

        else {
            $f = "Деление на 0";
        }

        return $f;
    }


    /*output вводимых значений*/
    echo("Начальные значение:  $q  <br>  Количество точек: $r <br> Шаг: $e
            <table border=1>
            <td>№</td>
            <td>X</td>
            <td>F(x)</td>");
    for ($i = 1; $x <= $w + $e / 4; ++$i, $x = bcadd($x, $e, 1)) { //логика для построения динамической таблицы
        $rez = f($x); //input: 0 (начальная точка) МЕНЬШЕ или РАВНО 0(начальная точка) + 5 (колличество точек) + 1 (колличество точек) /2
        /* Старый метод проверки на деление 0
        $rezfloat = floatval($rez);
        if ((is_infinite($rezfloat)) or (is_nan($rezfloat)) or (is_null($rezfloat))) {
            $rez = "Не возможно высчитать (бесконечно)";
        };
        */
        echo("<tr>
                <td>$i</td>
                <td>$x</td>
                <td>$rez</td>
                </tr>");
    }
    echo '</table>';
}
else
    echo "Введите нужные вам значения,<br> затем, нажмите на кнопку 'Вычислить'";
?>
</body>
</html>