<?php include("path.php"); 
      include("app/database/controllers/users.php");

      $data = $_POST;
      $user = selectOne('users', ['id' => $_SESSION['id']]);

      function loadAvatar($avatar) {
        global $pdo;
        $type = $avatar['type'];
        $name = md5(microtime().'.'.substr($type, strlen("image/")));
        $dir = 'uploads/avatars/';
        $uploadfile = $dir.$name;

        if(move_uploaded_file($avatar['tmp_name'], $uploadfile)) {
          $user = selectOne('users', 'id = ?', ($_SESSION['users']->id));
          $user->$avatar = $name;
          $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
          $stmt = $pdo->prepare($sql);
          $stmt->execute([
              ':avatar' => $name,
              ':id' => $userId
          ]);
        }else {
          return false;
        };
        return true;
      }

      if(isset($data['set-avatar'])) {
        $avatar = $_FILES['avatar'];
        header("Location: profile.php");
        
        if(avatarSecurity($avatar)) loadAvatar($avatar);
      }

      
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuryk • Профиль</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="learn.css">
    <link rel="stylesheet" href="main-profile.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link href="https://fonts.googleapis.com/css?family=Rubik:regular,700&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar">
            <ul>
                <li>
                    <img class="logo" src="/images/SamyrukLang.svg" alt="logo">
                    <button id="toggle-btn" class="toggle-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M440-240 200-480l240-240 56 56-183 184 183 184-56 56Zm264 0L464-480l240-240 56 56-183 184 183 184-56 56Z"/></svg>
                    </button>
                </li>
                <li>
                    <a href="learn.php">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg>
                    <span>Изучение</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo "/exercises.php"; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m826-585-56-56 30-31-128-128-31 30-57-57 30-31q23-23 57-22.5t57 23.5l129 129q23 23 23 56.5T857-615l-31 30ZM346-104q-23 23-56.5 23T233-104L104-233q-23-23-23-56.5t23-56.5l30-30 57 57-31 30 129 129 30-31 57 57-30 30Zm397-336 57-57-303-303-57 57 303 303ZM463-160l57-58-302-302-58 57 303 303Zm-6-234 110-109-64-64-109 110 63 63Zm63 290q-23 23-57 23t-57-23L104-406q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l63 63 110-110-63-62q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l303 303q23 23 23 56.5T857-441l-57 57q-23 23-57 23t-57-23l-62-63-110 110 63 63q23 23 23 56.5T577-161l-57 57Z"/></svg>
                    <span>Упражнения</span>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-240q-56 0-107 17.5T280-170v10h400v-10q-42-35-93-52.5T480-240Zm-280 34q54-53 125.5-83.5T480-320q83 0 154.5 30.5T760-206v-514H200v514Zm280-194q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T540-540q0-25-17.5-42.5T480-600q-25 0-42.5 17.5T420-540q0 25 17.5 42.5T480-480ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm280-460Zm0 380h200-400 200Z"/></svg>
                    <span>Профиль</span>
                    </a>
                </li>
                <li>
                    <a href="leaderboard.html">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-200h160v-320H160v320Zm240 0h160v-560H400v560Zm240 0h160v-240H640v240ZM80-120v-480h240v-240h320v320h240v400H80Z"/></svg>
                    <span>Рейтинг</span>
                    </a>
                </li>
                <li>
                    <button onclick=toggleSubMenu(this) class="dropdown-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M240-400q-33 0-56.5-23.5T160-480q0-33 23.5-56.5T240-560q33 0 56.5 23.5T320-480q0 33-23.5 56.5T240-400Zm240 0q-33 0-56.5-23.5T400-480q0-33 23.5-56.5T480-560q33 0 56.5 23.5T560-480q0 33-23.5 56.5T480-400Zm240 0q-33 0-56.5-23.5T640-480q0-33 23.5-56.5T720-560q33 0 56.5 23.5T800-480q0 33-23.5 56.5T720-400Z"/></svg>
                        <span>Еще</span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-344 240-584l56-56 184 184 184-184 56 56-240 240Z"/></svg>
                    </button>
                    <ul class="sub-menu">
                        <div>
                        <li><a href="#">NIS</a></li>
                        <li><a href="#">О Samyruk</a></li>
                        <li><a href="#">Справка</a></li>
                        <li><a href="#">Настройки</a></li>
                        </div>  
                    </ul>
                </li>
            </ul>
        </nav>
        </div>
        <main>
        <?php if (isset($_SESSION['id'])): ?>
        <div class="main-container">
            <div class="first-block">
              <div class="main-profile">
                <form class="form" action="" enctype="multipart/form-data" method="post">
                <div class="profile-img">
                  <img id="our-image" class="avatar" src="images/<?php echo htmlspecialchars($user['avatar'] ?? 'default.png'); ?>" alt="avatar">               
                </div>
                <button class="ava-btn" name="set-avatar">Сменить аватар</button>
                <label for="input-file" >Выбрать аватар</label>
                <input type="file" accept="image/jpeg, image/png, image/jpg," name="avatar" id="input-file" class="inputfile"> 
                
              </form>
                <h2 class="profile-name"><?php echo $_SESSION['login']; ?></h2>
                <div class="profile-regist-date">Регистрация: <span><?php echo $_SESSION['registration_date']; ?></span></div>
                <div class="profile-info">
                  <div class="profile-subscr">
                    <div class="subscriptions"><span>0</span> подписок</div>
                    <div class="subscribers"><span>0</span> подписчиков</div>
                    <div class="elocount"><span>254</span> ELO</div>
                  </div>
                  <div class="flag"><img src="images/globus.svg" alt="icon"></div>
                </div>
              </div>
              <div class="line"></div>
              <div class="statistics">
                <h2 class="stat-header">Статистика</h2>
                <div class="blocks">
                  <div class="strike box">
                    <img src="images/fire.svg" alt="icon">
                    <div class="strike-right">
                      <div class="block-number">0</div>
                      <div class="block-text">Ударный режим</div>
                    </div>
                  </div>
                  <div class="points box">
                    <img src="images/volt.svg" alt="icon">
                    <div class="strike-right">
                      <div class="block-number">254</div>
                      <div class="block-text">ELO</div>
                    </div>
                  </div>
                  <div class="league box">
                    <img src="images/police.svg" alt="icon">
                    <div class="strike-right">
                      <div class="block-number">Серебряная</div>
                      <div class="block-text">Текущая лига</div>
                    </div>
                  </div>
                  <div class="medal box">
                    <img src="images/medal.svg" alt="icon">
                    <div class="strike-right">
                      <div class="block-number">0</div>
                      <div class="block-text">Топ-3</div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="achievements">
                <div class="achievements-title">
                  <h2 class="achievements-header">Достижения</h2>
                  <div class="all">Все</div>
                </div>
                <div class="achievements-blocks">
                  <div class="item">
                    <div class="left">
                      <img src="images/fire.svg" alt="icon">
                      <div>Уровень 1</div>
                    </div>
                    <div class="right">
                      <div class="right-title">
                        <div class="right-text">Энтузиаст</div>
                        <div class="right-count">1/3</div>
                      </div>
                      <div class="right-block">
                        <div class="right-line"></div>
                        <div class="right-text">Удержите ударный режим 3 дня</div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="left">
                      <img src="images/police.svg" alt="icon">
                      <div>Уровень 1</div>
                    </div>
                    <div class="right">
                      <div class="right-title">
                        <div class="right-text">Джуниор</div>
                        <div class="right-count">0/1</div>
                      </div>
                      <div class="right-block">
                        <div class="right-line"></div>
                        <div class="right-text">Дойдите до бронзовой лиги</div>
                      </div>
                    </div>
                  </div>
                  <div class="item">
                    <div class="left">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#808080" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg>
                      <div>Уровень 1</div>
                    </div>
                    <div class="right">
                      <div class="right-title">
                        <div class="right-text">Бизнесмен</div>
                        <div class="right-count">26/50</div>
                      </div>
                      <div class="right-block">
                        <div class="right-line"></div>
                        <div class="right-text">Заработайте 50 золота</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="second-block">
              <div class="friends-wrapper">
                <div class="friends-header">
                  <div>Подписки</div>
                  <div>Подписчики</div>
                </div>
                <img src="images/1.png" alt="img">
                <div class="friends-text">Учиться вместе намного <br> интереснее и эффективнее</div>
              </div>
              <div class="add-friends">
                <div class="add-header">Добавить друзей</div>
                <div class="add-item">
                  <img src="images/search.svg" alt="icon">
                  <div class="add-item-text">
                    <div class="div">Найти друзей</div>
                    <img src="images/arrow.svg" alt="icon">
                  </div>
                </div>
                <div class="add-item">
                  <img src="images/mail.svg" alt="icon">
                  <div class="add-item-text">
                    <div class="div">Пригласить друзей</div>
                    <img src="images/arrow.svg" alt="icon">
                  </div>
                </div>
              </div>
        </div>
        <?php else: ?>
          <div class="create-content">
          <h1 class="prof-title">Создайте аккаунт</h1>
          <p class="prof-subtitle">Создайте свой аккаунт, что бы быть в рейтинге, видеть свой профиль, количество подписчиков и друзей и тд.</p>
          <a href="register.php" class="block-text__button">Создать</a>
        </div>
        </main>
          <?php endif; ?>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
</body>
</html>