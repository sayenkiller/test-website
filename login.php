<?php

require('user_validation.php');

if (isset($_POST['submit'])) {
    // validate entries
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
    header('Location:index.php');
}
//lzm dir page whdkhra ta3 registration form w dirlha if set w validation form w save user to database

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<?php include('templates/header.php') ?>

<div class="login-main">
    <div class="box">
        <div class="form">
            <h2>Sign in</h2>
            <form name="myForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="inputBox">
                    <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? "") ?>" required>
                    <span>username</span>
                    <i>
                        <div class="error">
                            <?php echo $errors['username'] ?? '' ?>
                        </div>
                    </i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? '') ?>" required>
                    <span>password</span>
                    <i>
                        <div class="error">
                            <?php echo $errors['password'] ?? '' ?>
                        </div>
                    </i>
                </div>
                <div class="links">
                    <a href="#">forgot password?</a>
                    <input action="index.php" type="submit" value="Login" name="submit">
                </div>
            </form>
            <div class="links-2">
                <span>Create a new account ?</span>
                <a href="#">SIGN UP</a>
            </div>
        </div>
    </div>

</div>

<?php include('templates/footer.php') ?>

</html>