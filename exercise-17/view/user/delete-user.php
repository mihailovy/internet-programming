<?php include ("view/common/header.php"); ?>

<!-- begin: Изтриване на профил -->
<form class="user" 
      method="post"
      name="userdeleteForm"
      action="?page=delete-user">
  <div class="mb-3">
    <h2>Изтриване на потребителски профил</h2>
  </div>
  
  <?php if (!empty($message)): ?> 
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
       <?=$message ?>
       <button type="button" class="btn-close" 
               data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" 
           class="form-label">Текуща парола</label>
    <input type="password"      name="password"
           placeholder="За да изтриете профила си, моля повторете два пъти своята парола"
           class="form-control" id="exampleInputPassword1">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" 
           class="form-label">Повтори текуща парола</label>
    <input type="password"      name="passwordRepeat"
           placeholder="За да изтриете профила си, моля повторете два пъти своята парола"
           class="form-control" id="exampleInputPassword1">
  </div>
    
  <div class="mb-3">
    <button type="submit" name="userdelete_submit"
            class="btn btn-secondary">Изтрий профила</button>
  </div>
</form>     
<!-- begin: Редакция на профил -->

<?php include ("view/common/footer.php"); ?>
