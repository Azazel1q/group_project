<div class="auth-reg">
    <?php 
        include("header.php");
        

    ?>
    <div class="container">
        <div class="main_content">
            <div class="main_buttons">
                <button class="button" id="auth">Авторизовация</button>
                <button class="button" id="reg">Регистрация</button>
            </div>
            <div class="forms">
                <form action="/authDB.php" class="form form_auth" method="POST">
                    <h2>Авторизация</h2>

                    <div class="input_group">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="Login">
                    </div>
                    <div class="input_group">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password">
                    </div>
                    <input type="submit" value="Авторизоваться" class="button">
                </form>

                <form action="/regDB.php" class="form form_reg" method="POST">
                    <h2>Регистрация</h2>
                    <div class="input_group">
                        <label for="name">Имя</label>
                        <input type="text" name="name" id="name">
                    </div>
                    <div class="input_group">
                        <label for="surname">Фамилия</label>
                        <input type="text" name="surname" id="surname">
                    </div>
                    <div class="input_group">
                        <label for="patronymic">Отчество</label>
                        <input type="text" name="patronymic" id="patronymic">
                    </div>
                    
                    <div class="input_group">
                        <label for="phone">Номер телефона</label>
                        <input type="text" name="phone" id="phone">
                    </div>
                    <div class="input_group">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="Login">
                    </div>
                    <div class="input_group">
                        <label for="adres">Адрес</label>
                        <input type="text" placeholder="Город" name="adres_city" id="adres">
                        <input type="text" placeholder="Улица" name="adres_street" id="adres">
                        <input type="text" placeholder="Дом" name="adres_home" id="adres">
                        <input type="text" placeholder="Подъезд" name="adres_ent" id="adres">
                        <input type="text" placeholder="Квартира" name="adres_apart" id="adres">
                    </div>
                    <div class="input_group">
                        <label for="password">password</label>
                        <input type="text" name="password" id="password">
                    </div>
                    <input type="submit" value="Регистрация" class="button">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="/script.js"></script>
