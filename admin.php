<?php

/**
 * Задача 6. Реализовать вход администратора с использованием
 * HTTP-авторизации для просмотра и удаления результатов.
 **/

// Пример HTTP-аутентификации.
// PHP хранит логин и пароль в суперглобальном массиве $_SERVER.
// Подробнее см. стр. 26 и 99 в учебном пособии Веб-программирование и веб-сервисы.
if (empty($_SERVER['PHP_AUTH_USER']) ||
    empty($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] != 'admin' ||
    md5($_SERVER['PHP_AUTH_PW']) != md5('123')) {
  header('HTTP/1.1 401 Unanthorized');
  header('WWW-Authenticate: Basic realm="My site"');
  print('<h1>401 Требуется авторизация</h1>');
  exit();
}

print('Вы успешно авторизовались и видите защищенные паролем данные.');

// *********
// Здесь нужно прочитать отправленные ранее пользователями данные и вывести в таблицу.
// Реализовать просмотр и удаление всех данных.
// *********

<div class="col-md-6 order-3 my-sm-3" id="content2">
                <section id="table">
                    <h2 class="font-weight-bold">Таблица</h2>
                    <table border="1px">
                        <tr class="color1">
                        <th>Колонка 1</th>
                        <th>Колонка 2</th>
                        <th>Колонка 3</th>
                        </tr>
                        <tr>
                        <td colspan="2">Ячейка 11 объединенная с 12</td>
                        <td>Ячейка 13</td>
                        </tr>
                        <tr class="color2">
                        <td>Ячейка 21</td>
                        <td>Ячейка 22</td>
                        <td>Ячейка 23</td>
                        </tr>
                        <tr>
                        <td>Ячейка 31</td>
                        <td>Ячейка 32</td>
                        <td>Ячейка 33</td>
                        </tr>
                        <tr class="color2">
                        <td>Ячейка 41</td>
                        <td>Ячейка 42</td>
                        <td>Ячейка 43</td>
                        </tr>
                        <tr>
                        <td>Ячейка 51</td>
                        <td>Ячейка 52</td>
                        <td>Ячейка 53</td>
                        </tr>
                    </table>
                </section>
            </div>
