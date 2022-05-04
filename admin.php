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

$values = array();

$user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));

  try {

    $stmt = $db->prepare("SELECT * FROM form2");
    $stmt->execute();
    foreach ($stmt as $row) {
      $values['name']=$row["name"];
      $values['email'] = $row["email"];
      $values['year'] = $row["year"];
      $values['radio-group-1'] = $row["sex"];
      $values['radio-group-2'] = $row["number_of_limbs"];
      $values['super'] = $row["superpowers"];
      $values['bio'] = $row["biography"];
      $values['check'] = $row["checkbox"];
      }
    }
      catch(PDOException $e){
        print('Error : ' . $e->getMessage());
        exit();
      }
    


?>

<div id="content">
                <section id="table">
                    <h2 class="font-weight-bold">Таблица с данными пользователей</h2>
                    <table border="1px">
                        <tr class="color1">
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Год</th>
                            <th>Пол</th>
                            <th>Количество конечностей</th>
                            <th>Сверхспособности</th>
                            <th>Биография</th>
                            <th>Соглашение</th>
                            <th>Логин</th>
                            <th>Хеш пароля</th>
                        </tr>
                        <tr>
                            <td><?php print $values['name'] ?></td>
                            <td>Ячейка 12</td>
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
