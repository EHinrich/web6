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
                <form action=""  method="POST">
                    <label>
                  <br />
                        <strong>Изменить данные пользователя с Id:</strong>
                  <input name="id"
                         value="" /></label><br />
                    
              <label>
                  Имя:<br />
                  <input name="name"
                         value="" />
              </label><br />
      
               <label>
                  email:<br />
                  <input name="email"
                         value=""
                         type="email" />
              </label><br />
      
              <select id="year" name="year">
                <?php for ($year = 1920; $year <= 2022; $year++) { ?>
                <option value="<?php print($year); ?>"><?php print($year); ?></option>
                <?php } ?>
              </select> <br />

      
              Пол:<br />
              <label>
                  <input type="radio" 
                         name="sex"
                         value="male"
                          />
                  Муж
              </label>
              <label>
                  <input type="radio" 
                         name="sex" 
                         value="female" 
                         />
                  Жен
              </label><br />
      
              Количество конечностей:<br />
              <label>
                  <input type="radio" 
                         name="number_of_limbs" 
                         value="1" 
                         />
                  1
              </label>
              <label>
                  <input type="radio"
                         name="number_of_limbs"
                         value="2" 
                          />
                  2
              </label>
              <label>
                  <input type="radio"
                         name="number_of_limbs" 
                         value="3"
                         />
                  3
              </label>
              <label>
                  <input type="radio"
                         name="number_of_limbs"  
                         value="4" 
                          />
                  4
              </label><br />
      
              <label>
                  Сверхспособности:
                  <br />
                  <select name="superpowers"
                      multiple="multiple">
                      <option value="Immortality" >Бессмертие</option>
                      <option value="Passing through walls" >Прохождение сквозь стены</option>
                      <option value="Levitation" >Левитация</option>
                  </select>
              </label><br />
      
              <label>
                  Биография:<br />
                  <textarea name="biography"></textarea> 
              </label><br />
      
      
              Чекбокс:<br />
              <label>
                  <input type="checkbox"
                         name="checkbox" value="Yes"
                         />
                  С контрактом ознакомлен
              </label><br />
      
              <input type="submit" value="Изменить" />
          </form>
<?php
$user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true)); 
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
    header('Location: admin.php');
  }
    catch(PDOException $e){
      print('Error : ' . $e->getMessage());
      exit();
  }
?>
