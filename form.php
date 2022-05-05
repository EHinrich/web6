<?php
$id = $_POST['id1'];
if (!empty($_POST['id1'])) {
$values = array();
$user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true));

try {
  print $id;
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

?>
<form action="admin.php"  method="POST">
                    
              <label>
                  Имя:<br />
                  <input name="name"
                         value="<?php print $values['name']; ?>" />
              </label><br />
      
               <label>
                  email:<br />
                  <input name="email"
                         value="<?php print $values['email']; ?>"
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
                         name="sex"
                         value="male"
                         <?php if($values['sex']=="male") {print 'checked';} ?> />
                  Муж
              </label>
              <label>
                  <input type="radio" 
                         name="sex" 
                         value="female" 
                         <?php if($values['sex']=="female") {print 'checked';} ?>/>
                  Жен
              </label><br />
      
              Количество конечностей:<br />
              <label>
                  <input type="radio" 
                         name="number_of_limbs" 
                         value="1" 
                         <?php if($values['number_of_limbs']=="1") {print 'checked';} ?> />
                  1
              </label>
              <label>
                  <input type="radio"
                         name="number_of_limbs"
                         value="2" 
                         <?php if($values['number_of_limbs']=="2") {print 'checked';} ?> />
                  2
              </label>
              <label>
                  <input type="radio"
                         name="number_of_limbs" 
                         value="3"
                         <?php if($values['number_of_limbs']=="3") {print 'checked';} ?>/>
                  3
              </label>
              <label>
                  <input type="radio"
                         name="number_of_limbs"  
                         value="4" 
                         <?php if($values['number_of_limbs']=="4") {print 'checked';} ?> />
                  4
              </label><br />
      
              <label>
                  Сверхспособности:
                  <br />
                  <select name="superpowers"
                      multiple="multiple">
                      <option value="Immortality" <?php if($values['superpowers']=="Immortality"){print 'selected';} ?> >Бессмертие</option>
                      <option value="Passing through walls" <?php if($values['superpowers']=="Passing through walls"){print 'selected';} ?> >Прохождение сквозь стены</option>
                      <option value="Levitation" <?php if($values['superpowers']=="Levitation"){print 'selected';} ?> >Левитация</option>
                  </select>
              </label><br />
      
              <label>
                  Биография:<br />
                  <textarea name="biography">
                  <?php print $values['biography']; ?></textarea> 
              </label><br />
      
      
              Чекбокс:<br />
              <label>
                  <input type="checkbox"
                         name="checkbox" value="Yes"
                         <?php if($values['checkbox']==TRUE){print 'checked';} ?> />
                  С контрактом ознакомлен
              </label><br />
            <input type ='hidden' name='id' value='<?php print $id ?>' >
      
              Отправить данные:
              <input name='form' type="submit" value="Изменить" />
          </form>                   
<?php
}
  else{
$user = 'u41181';
$password = '2342349';
$db = new PDO('mysql:host=localhost;dbname=u41181', $user, $password, array(PDO::ATTR_PERSISTENT => true)); 
$id = $_POST['id2'];
    try {
        $stmt = $db->prepare("DELETE FROM form2 WHERE id = '$id'");
        $stmt->execute();
      }
        catch(PDOException $e){
          print('Error : ' . $e->getMessage());
          exit();
  } 
    header('Location: admin.php');
  }
?>
