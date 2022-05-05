<form action=""  method="POST">
                    <label>
                  <br /> <br />
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

            <form action=""  method="POST">
                    <label>
                  <br /> <br />
                        <strong>Удалить данные пользователя с Id:</strong>
                  <input name="id2"
                         value="" /></label><br />
                <input type="submit" value="Удалить" />
          </form>
                    
<?php
}
else{
$user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true)); 
if (!empty($_POST['id'])){
    $id = $_POST['id'];
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
  }
  else {
        $id = $_POST['id2'];
        $stmt = $db->prepare("DELETE FROM form2 WHERE id = '$id'");
        $stmt->execute();
        }
header('Location: admin.php');
}
        
?>
