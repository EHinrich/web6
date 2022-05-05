<?php
session_start();
if (!empty($_SESSION['id']))
{
    $user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));

try {
$id =$values['id'];
$stmt = $db->prepare("SELECT * FROM form2 WHERE id = $id");
$stmt->execute();
foreach ($stmt as $row) {
  $values['name']=$row["name"];
  $values['email'] = $row["email"];
  $values['year'] = $row["year"];
  $values['sex'] = $row["sex"];
  $values['number_of_limbs'] = $row["number_of_limbs"];
  $values['superpowers'] = $row["superpowers"];
  $values['biography'] = $row["biography"];
  $values['checkbox'] = $row["checkbox"];
 }

}
catch(PDOException $e){
  print('Error : ' . $e->getMessage());
  exit();
}
}

?>
<form action=""  method="POST">
                    
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
                <option <?php if ($year == $values['year']) {print('selected="selected"');} ?> value="<?php print($year); ?>"><?php print($year); ?></option>
                <?php } ?>
              </select> <br />

      
              Пол:<br />
              <label>
                  <input type="radio" 
                         name="radio-group-1"
                         value="male"
                         <?php if($values['sex']=="male") {print 'checked';} ?> />
                  Муж
              </label>
              <label>
                  <input type="radio" 
                         name="radio-group-1" 
                         value="female" 
                         <?php if($values['sex']=="female") {print 'checked';} ?>/>
                  Жен
              </label><br />
      
              Количество конечностей:<br />
              <label>
                  <input type="radio" 
                         name="radio-group-2" 
                         value="1" 
                         <?php if($values['number_of_limbs']=="1") {print 'checked';} ?> />
                  1
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2"
                         value="2" 
                         <?php if($values['number_of_limbs']=="2") {print 'checked';} ?> />
                  2
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2" 
                         value="3"
                         <?php if($values['number_of_limbs']=="3") {print 'checked';} ?>/>
                  3
              </label>
              <label>
                  <input type="radio"
                         name="radio-group-2"  
                         value="4" 
                         <?php if($values['number_of_limbs']=="4") {print 'checked';} ?> />
                  4
              </label><br />
      
              <label>
                  Сверхспособности:
                  <br />
                  <select name="super"
                      multiple="multiple">
                      <option value="Immortality" <?php if($values['superpowers']=="Immortality"){print 'selected';} ?> >Бессмертие</option>
                      <option value="Passing through walls" <?php if($values['superpowers']=="Passing through walls"){print 'selected';} ?> >Прохождение сквозь стены</option>
                      <option value="Levitation" <?php if($values['superpowers']=="Levitation"){print 'selected';} ?> >Левитация</option>
                  </select>
              </label><br />
      
              <label>
                  Биография:<br />
                  <textarea name="bio">
                  <?php print $values['biography']; ?></textarea> 
              </label><br />
      
      
              Чекбокс:<br />
              <label>
                  <input type="checkbox"
                         name="check" value="Yes"
                         <?php if($values['checkbox']==TRUE){print 'checked';} ?> />
                  С контрактом ознакомлен
              </label><br />
      
              Отправить данные:
              <input type="submit" value="Изменить" />
          </form>
                    
<?php
$user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true)); 
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

header('Location: admin.php');

        
?>
