      <footer>
        <?php if (!isset($_SESSION['user']) ): ?>
        <div id="user-functions">
          
          <div class="row">
            <div class="col">
              
              <!-- begin: вход в системата --> 
              <form class="user"     method="post" 
                    name="loginForm" action="?page=login">
                <div class="mb-3">
                  <h2>Вход за регистрирани потребители</h2>
                </div>
                
                <?php if (!empty($message)): ?> 
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <?=$message ?>
                     <button type="button" class="btn-close" 
                             data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php endif; ?>
                
                <div class="mb-3">
                  <label for="exampleInputEmail1"
                         class="form-label">Email address</label>
                  <input type="email"
                         name="email"
                         class="form-control"
                         id="exampleInputEmail1"
                         aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">Сайтът не споделя вашия имей с трети страни!</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" 
                         class="form-label">Парола</label>
                  <input type="password"
                         name="password"
                         class="form-control"
                         id="exampleInputPassword1">
                </div>
                <button type="submit"
                        name="login_submit"
                        class="btn btn-primary">Вход</button>
              </form>
              <!-- begin: вход в системата -->
               
            </div>
            
            <div class="col">
              <!-- begin: Регистрация -->
              <form class="user" method="post" name="regiterForm" action="?page=register">
                <div class="mb-3">
                  <h2>Регистрация на нов потребител</h2>
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
                         class="form-label">Парола</label>
                  <input type="password"      name="password"
                         class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input"
                         name="agree"    id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Съгласен съм с условията за изпозлване на сайта!</label>
                </div>
                <image src="http://localhost/captcha.php">
                <select class="form-select" name="gender" aria-label="Default select example">
                  <option <?=empty($user['gender'] ) ? 'selected' : '' ?> >Пол</option>
                  <option value="m"
                          <?=!empty($user['gender']) and $user['gender'] == 'm' ? 'selected' : '' ?> >Мъжки</option>
                  <option value="f"
                          <?=!empty($user['gender']) and $user['gender'] == 'f' ? 'selected' : '' ?> >Женски</option>
                  <option value="o"
                          <?=!empty($user['gender']) and $user['gender'] == 'o' ? 'selected' : '' ?>>Друг</option>
                </select>
              
                <button type="submit" name="register_submit"
                        class="btn btn-secondary">Регистрирай ме!</button>
              </form>     
              <!-- begin: Регистрация -->
            </div>
          
          </div>
          
        </div><!--div id="user-functions"-->
        <?php endif; ?>    
        
        <p>Copyright 2032</p>
        
      </footer>
    </div><!-- end: class="container" -->
  </body>
</html>
