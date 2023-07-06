<div class="auth-reg">
    <?php 
        include("header.php");
        

    ?>
    <div class="container">
        <div class="main_content">

            <div class="forms">
                <form action="authAdminDB.php" class="form form_auth" method="POST">
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
            </div>
        </div>
    </div>
</div>
<script src="/script.js"></script>
