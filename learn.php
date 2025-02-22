<?php include 'path.php'; 
    include 'app/database/db.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samuryk • Изучение</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/learn.css">
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
                <li class="active">
                    <a href="<?php echo BASE_URL; ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M260-320q47 0 91.5 10.5T440-278v-394q-41-24-87-36t-93-12q-36 0-71.5 7T120-692v396q35-12 69.5-18t70.5-6Zm260 42q44-21 88.5-31.5T700-320q36 0 70.5 6t69.5 18v-396q-33-14-68.5-21t-71.5-7q-47 0-93 12t-87 36v394Zm-40 118q-48-38-104-59t-116-21q-42 0-82.5 11T100-198q-21 11-40.5-1T40-234v-482q0-11 5.5-21T62-752q46-24 96-36t102-12q58 0 113.5 15T480-740q51-30 106.5-45T700-800q52 0 102 12t96 36q11 5 16.5 15t5.5 21v482q0 23-19.5 35t-40.5 1q-37-20-77.5-31T700-240q-60 0-116 21t-104 59ZM280-494Z"/></svg>
                    <span>Изучение</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo "exercises.php"; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m826-585-56-56 30-31-128-128-31 30-57-57 30-31q23-23 57-22.5t57 23.5l129 129q23 23 23 56.5T857-615l-31 30ZM346-104q-23 23-56.5 23T233-104L104-233q-23-23-23-56.5t23-56.5l30-30 57 57-31 30 129 129 30-31 57 57-30 30Zm397-336 57-57-303-303-57 57 303 303ZM463-160l57-58-302-302-58 57 303 303Zm-6-234 110-109-64-64-109 110 63 63Zm63 290q-23 23-57 23t-57-23L104-406q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l63 63 110-110-63-62q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l303 303q23 23 23 56.5T857-441l-57 57q-23 23-57 23t-57-23l-62-63-110 110 63 63q23 23 23 56.5T577-161l-57 57Z"/></svg>
                    <span>Упражнения</span>
                    </a>
                </li>
                <li>
                    <div class="button">
                    <a href="<?php echo "/profile.php"; ?>" id="open__modal">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-240q-56 0-107 17.5T280-170v10h400v-10q-42-35-93-52.5T480-240Zm-280 34q54-53 125.5-83.5T480-320q83 0 154.5 30.5T760-206v-514H200v514Zm280-194q-58 0-99-41t-41-99q0-58 41-99t99-41q58 0 99 41t41 99q0 58-41 99t-99 41Zm0-80q25 0 42.5-17.5T540-540q0-25-17.5-42.5T480-600q-25 0-42.5 17.5T420-540q0 25 17.5 42.5T480-480ZM200-80q-33 0-56.5-23.5T120-160v-560q0-33 23.5-56.5T200-800h40v-80h80v80h320v-80h80v80h40q33 0 56.5 23.5T840-720v560q0 33-23.5 56.5T760-80H200Zm280-460Zm0 380h200-400 200Z"/></svg>
                    <span>Профиль</span>
                    </a>
                    </div>  
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
        <header class="header">
            <div class="header__container">
                <nav class="header__menu">
                    <ul class="menu__list">
                        <li class="menu-item">
                            <a href="" class="menu__link">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e25822"><path d="M240-400q0 52 21 98.5t60 81.5q-1-5-1-9v-9q0-32 12-60t35-51l113-111 113 111q23 23 35 51t12 60v9q0 4-1 9 39-35 60-81.5t21-98.5q0-50-18.5-94.5T648-574q-20 13-42 19.5t-45 6.5q-62 0-107.5-41T401-690q-39 33-69 68.5t-50.5 72Q261-513 250.5-475T240-400Zm240 52-57 56q-11 11-17 25t-6 29q0 32 23.5 55t56.5 23q33 0 56.5-23t23.5-55q0-16-6-29.5T537-292l-57-56Zm0-492v132q0 34 23.5 57t57.5 23q18 0 33.5-7.5T622-658l18-22q74 42 117 117t43 163q0 134-93 227T480-80q-134 0-227-93t-93-227q0-129 86.5-245T480-840Z"/></svg>
                            </a>
                            <span class="item-amount">0</span>
                        </li>
                        <li class="gold-menu-item">
                            <a href="" class="heart-menu__link">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff5757" ><path d="m480-120-58-52q-101-91-167-157T150-447.5Q111-500 95.5-544T80-634q0-94 63-157t157-63q52 0 99 22t81 62q34-40 81-62t99-22q94 0 157 63t63 157q0 46-15.5 90T810-447.5Q771-395 705-329T538-172l-58 52Zm0-108q96-86 158-147.5t98-107q36-45.5 50-81t14-70.5q0-60-40-100t-100-40q-47 0-87 26.5T518-680h-76q-15-41-55-67.5T300-774q-60 0-100 40t-40 100q0 35 14 70.5t50 81q36 45.5 98 107T480-228Zm0-273Z"/></svg>
                            </a>
                            <span class="item-amount">0</span>
                        </li>
                        <li class="menu-item">
                            <a href="" class="menu__link">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 512 512" width="24px" fill="#ffd700"><path d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2c0 0 0 0 0 0s0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4l0 3.4 0 5.7 0 26.3zm32 0l0-32 0-25.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5l0 35.4c0 44.2-86 80-192 80S0 476.2 0 432l0-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"/></svg>
                            </a>
                            <span class="item-amount">0</span>
                        </li>
                        
                        <li class="menu-item">
                            <?php if (isset($_SESSION['id'])): ?>
                                <form class="form" action="/" enctype="multipart/form-data" method="post">
                                <div class="profile">
                                <h3><?php echo $_SESSION['login']; ?></h3>
                                <div class="image">
                                <img id="our-image" src="images/account.svg" width="50px" height="50px" alt="icon">
                                </div>
                                </div>
                                <label class="input-label" for="input-file">Поменять аватар</label>
                                <input type="file" accept="image/jpeg, image/png, image/jpg" name="avatar" width="50px" height="50px" id="input-file" class="inputfile">
                                <div class="action">
                                </form>
                                <ul>
                                <?php if ($_SESSION['admin']): ?>
                                <li>
                                    <a href="#"><span>AdminSetUp</span></a>
                                </li>
                                <?php endif; ?>
                                <li>
                                    <a href="profile.php"><span>Мой профиль</span></a>
                                </li>
                                <li>
                                    <a href=""><span>Рейтинг</span></a>
                                </li>
                                <li class="logout">
                                    <a href="logout.php"><span>Выйти</span></a>
                                </li>
                                </ul>
                                </div>
                            <?php else: ?>
                                <div class="profile">
                                <h3>Войти</h3>
                                <div class="image">
                                    <img src="/images/no-profile-pic-icon-11.jpg" alt="asas">
                                </div>

                                <div class="action">
                                <ul>
                                <li>
                                    <a href="register.php"><span>Создать аккаунт</span></a>
                                </li>
                                <li>
                                    <a href="login.php"><span>Авторизация</span></a>
                                </li>
                                </div>
                                </ul>
                            <?php endif; ?>
                            
                        </li>
                </nav>
            </div>
        </header>
</div>
        <main>
    <div class="container">
                <section class="unit-1">
                    <div class="unit-name">
                        <h1>Раздел 1 | Таныстыру знакомство</h1>
                    </div>
                <div class="levels">
                    <div class="dropdown">
                    <a onclick="toggleDropdown(1)" class="lvl-button"></a>
                    <ul class="lvl-menu">
                        <li class="start-title">Уроки 0 из 6</li>
                        <li><a class="start" href="units/lesson.php">НАЧАТЬ</a></li>
                    </ul>
                    </div>
                    <a onclick="toggleDropdown(1)" class="lvl-button locked"></a>
                    
                    <a onclick="toggleDropdown(1)" class="lvl-button locked"></a>
                    
                    <a onclick="toggleDropdown(1)" class="lvl-button locked"></a>
                    
                    <a onclick="toggleDropdown(1)" class="lvl-button locked"></a>

                    <a onclick="toggleDropdown(1)" class="last lvl-button locked"></a>
                
                    <ul class="lvl-menu">
                        <form action="/units/lesson.php">
                        <li><h2 class="lesson-title">  Познакомься</h2></li>
                        <li><p class="lesson-count">  Уроков 0 из 6</p></li>
                        <li><button href="/sunits/lesson.php" class="start">НАЧАТЬ</button></li>
                        </form>
                    </ul>
                </div>
            </section>

            </div>
        </div>
    </div>
        </main>
    <script src="/js/learn.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/profile-dropdown.js"></script>
</body>
</html>
