<?php

$userId = $_SESSION['user']['id'];

if (isset($_POST['useredit_submit']) ) {
  
  // За разлика от $user, тук са редактираните от потребителя данни:
  $userEdit = $_POST;
  
  /* валидация и филтрация на данните
  ...
  */
  // CRUD - Update, промяна на запис/ред в БД
  if (   !empty($userEdit['password']) 
     and !empty($userEdit['passwordRepeat'])
     and $userEdit['password'] == $userEdit['passwordRepeat']) {
    $sql    = "
    UPDATE `users`
      SET `firstname` = '".$userEdit['firstname']."',
          `family`    = '".$userEdit['family']   ."',
          `email`     = '".$userEdit['email']    ."',
          `gender`    = '".$userEdit['gender']   ."',
          `password`  = '".$userEdit['password'] ."'
      WHERE  `id` = $userId";
    $message = "Вие успешно променихте данните във Вашия профил и зададохте нова парола.";
  } else {
    $sql    = "
    UPDATE `users`
      SET `firstname` = '".$userEdit['firstname']."',
          `family`    = '".$userEdit['family']   ."',
          `email`     = '".$userEdit['email']    ."',
          `gender`    = '".$userEdit['gender']   ."'
      WHERE  `id` = $userId";
    $message = "Вие успешно променихте данните във Вашия профил.";
  }
  $query   = mysqli_query($db, $sql);
}

$sql    = "
  SELECT *
    FROM `users`
    WHERE  `id` = $userId";
$query = mysqli_query($db, $sql);

// Получавам резултата като асоциативен масив от базата данни
$user  = mysqli_fetch_assoc($query);

    
include ("header.php");
?>

<!-- begin: Редакция на профил -->
<form class="user" 
      method="post"
      name="usereditForm"
      action="?page=edit-user">
  <div class="mb-3">
    <h2>Редакция на потребителски профил</h2>
  </div>
  
  <?php if (!empty($message)): ?> 
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
       <?=$message ?>
       <button type="button" class="btn-close" 
               data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  
  <div class="mb-3">
     <label for="firstname" 
           class="form-label">Име</label>
     <input type="text" class="form-control" placeholder="Име"
            name="firstname" 
            value="<?=!empty($user['firstname']) ? $user['firstname'] : '' ?>"
            id="firstname"
           aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <div class="mb-3">
     <label for="family" 
           class="form-label">Фамилия</label>
     <input type="text" class="form-control" placeholder="Фамилия"
            name="family"
            value="<?=!empty($user['family']) ? $user['family'] : '' ?>"
            id="family"
           aria-label="Username" aria-describedby="basic-addon1">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Имейл адрес</label>
    <input type="email" class="form-control"
           name="email"
           value="<?=!empty($user['email']) ? $user['email'] : '' ?>"
           id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" 
           class="form-label">Нова парола</label>
    <input type="password"      name="password"
           placeholder="Попълнете само, ако сменяте паролата"
           class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" 
           class="form-label">Повтори нова парола</label>
    <input type="password"      name="passwordRepeat"
           placeholder="Попълнете само, ако сменяте паролата"
           class="form-control" id="exampleInputPassword1">
  </div>
    
  <div class="mb-3">
    <select class="form-select" name="gender" aria-label="Default select example">
      <option <?=empty($user['gender'] ) ? 'selected' : '' ?> >Пол</option>
      <option value="m"
              <?=(!empty($user['gender']) and $user['gender'] == 'm') ? 'selected' : '' ?> >Мъжки</option>
      <option value="f"
              <?=(!empty($user['gender']) and $user['gender'] == 'f') ? 'selected' : '' ?> >Женски</option>
      <option value="o"
              <?=(!empty($user['gender']) and $user['gender'] == 'o') ? 'selected' : '' ?>>Друг</option>
    </select>
  </div>
  
  <div class="mb-3">
    <button type="submit" name="useredit_submit"
            class="btn btn-secondary">Запиши промените</button>
  </div>
</form>     
<!-- begin: Редакция на профил -->
              
<?php
include ("footer.php");
