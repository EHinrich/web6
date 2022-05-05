<?php
/**
 * Задача 6. Реализовать вход администратора с использованием
 * HTTP-авторизации для просмотра и удаления результатов.
 **/

// Пример HTTP-аутентификации.
// PHP хранит логин и пароль в суперглобальном массиве $_SERVER.
// Подробнее см. стр. 26 и 99 в учебном пособии Веб-программирование и веб-сервисы.
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
if (empty($_SERVER['PHP_AUTH_USER']) ||
    empty($_SERVER['PHP_AUTH_PW']) ||
    $_SERVER['PHP_AUTH_USER'] != 'admin' ||
    md5($_SERVER['PHP_AUTH_PW']) != md5('123')) {
  header('HTTP/1.1 401 Unanthorized');
  header('WWW-Authenticate: Basic realm="My site"');
  print('<h1>401 Требуется авторизация</h1>');
  exit();
}
$user = 'u41181';
    $password = '2342349';
    $db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));

  try {
    $stmt = $db->prepare("INSERT INTO admin (login, pass) VALUES (:login, :pass");

    $stmt -> bindParam(':login', $name);
    $stmt -> bindParam(':pass', $pass);

    $name = 'admin';
    $email = md5(123);

    $stmt->execute();
  }
    catch(PDOException $e){
      print('Error : ' . $e->getMessage());
      exit();
  }

print('Вы успешно авторизовались и видите защищенные паролем данные.'); 

// *********
// Здесь нужно прочитать отправленные ранее пользователями данные и вывести в таблицу.
// Реализовать просмотр и удаление всех данных.
// *********

$values = array();
$masseges = array();

$user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));    
?>

<div id="content">
                <section id="table">
                    <h2 class="font-weight-bold">Таблица с данными пользователей</h2>
                    <table border="1px">
                        <tr class="color1">
                            <th>Id</th>
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
                        <?php

                          try {

                            $stmt = $db->prepare("SELECT * FROM form2");
                            $stmt->execute();
                            foreach ($stmt as $row) {
                              $values['id']=$row["id"];
                              $values['name']=$row["name"];
                              $values['email'] = $row["email"];
                              $values['year'] = $row["year"];
                              $values['sex'] = $row["sex"];
                              $values['number_of_limbs'] = $row["number_of_limbs"];
                              $values['superpowers'] = $row["superpowers"];
                              $values['biography'] = $row["biography"];
                              $values['checkbox'] = $row["checkbox"];
                              $values['login'] = $row["login"];
                              $values['pass'] = $row["passwordmd"];
                                ?>
                                <tr>
                                    <td><?php print $values['id'] ?></td>
                                    <td><?php print $values['name'] ?></td>
                                    <td><?php print $values['email'] ?></td>
                                    <td><?php print $values['year'] ?></td>
                                    <td><?php print $values['sex'] ?></td>
                                    <td><?php print $values['number_of_limbs'] ?></td>
                                    <td><?php print $values['superpowers'] ?></td>
                                    <td><?php print $values['biography'] ?></td>
                                    <td><?php print $values['checkbox'] ?></td>
                                    <td><?php print $values['login'] ?></td>
                                    <td><?php print $values['pass'] ?></td>                                 
                                    <td><form method='POST' action='form.php'>
                                        <input type ='hidden' name='id1' value='<?php print $values['id'] ?>' >
                                        <input name='form' type='submit' value='Изменить'/>
                                        </form></td>
                                    <td><form method='POST' action='form.php'>
                                        <input type ='hidden' name='id2' value='<?php print $values['id'] ?>' >
                                        <input name='form' type='submit' value='Удалить'/>
                                        </form></td>
                                </tr>
                                <?php
                        
                              }
                          }
                              catch(PDOException $e){
                                print('Error : ' . $e->getMessage());
                                exit();
                              }
                        ?>
                        
                    </table>
                </section>
            </div>
<?php
  $user = 'u41181';
  $password = '2342349';
  $db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));
  $stmt = $db->prepare("SELECT * FROM form2");
  $stmt->execute();
  $count1 = 0;
  $count2 = 0;
  $count3 = 0;
  foreach ($stmt as $row) {
    if ($row["superpowers"]=='Immortality') $count1++;
    if ($row["superpowers"]=='Passing through walls') $count2++;
    if ($row["superpowers"]=='Levitation') $count3++;
  }
?>
<h3 class="font-weight-bold">Статистика по сверхспособностям</h3>
<table border="1px">
    <tr>
        <th> Бессмертие </th>
        <th> Прохождение сквозь стены </th>
        <th> Левитация </th>
    </tr>
    <tr>
        <td> <?php print $count1 ?> </td>
        <td> <?php print $count2 ?> </td>
        <td> <?php print $count3 ?> </td>
    </tr>
    
</table>
<?php
}
else{
    $user = 'u41181';
    $password = '2342349';
    $db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));
    $id =$_POST['id'];

  try {
    $stmt = $db->prepare("UPDATE form2 SET name=:name, email=:email, year=:year, sex=:sex, number_of_limbs=:number_of_limbs, superpowers=:superpowers, biography=:biography, checkbox=:checkbox WHERE id = '$id'");

    $stmt -> bindParam(':name', $name);
    $stmt -> bindParam(':email', $email);
    $stmt -> bindParam(':year', $year);
    $stmt -> bindParam(':sex', $sex);
    $stmt -> bindParam(':number_of_limbs', $number_of_limbs);
    $stmt -> bindParam(':superpowers', $superpowers);
    $stmt -> bindParam(':biography', $biography);
    $stmt -> bindParam(':checkbox', $checkbox);
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $year = $_POST['year'];
    $sex = $_POST['sex'];
    $number_of_limbs = $_POST['number_of_limbs'];
    $superpowers = $_POST['superpowers'];
    $biography = $_POST['biography'];
    if (empty($_POST['checkbox']))
      $checkbox = "No";
    else
      $checkbox = $_POST['checkbox'];

    $stmt->execute();
  }
    catch(PDOException $e){
      print('Error : ' . $e->getMessage());
      exit();
  }
    header('Location: admin.php');
} ?>
