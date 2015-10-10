<?php
    require('../classes/abstract/controller_base.php');

    Class Controller_auth Extends Controller_Base {
        private function checkUserAvailable($login) {
            $users = $this->redis->lrange(USER_DB_KEY, 0, -1);
            return in_array($login, $users);
        }

        private function checkUserPassword($login, $password) {
            $pass = $this->redis->hget(USER_DATA_KEY . $login, 'password');
            return $password == $pass;
        }

        function index() {
            $login = $_POST['login'];
            $password = $_POST['password'];
            $checkUserAvailable = $this->checkUserAvailable($login);
            $checkUserPassword = $this->checkUserPassword($login, $password);

            if (!$checkUserPassword) {
                echo 'Password is not required';
            }

            if (!$checkUserAvailable) {
                echo 'There is no such user';
            }

            if ($checkUserAvailable && $checkUserPassword) {
                session_start();

                $_SESSION['user'] = array('login' => $login, 'auth_time' => time());
                header('Location: http://'.$_SERVER['HTTP_HOST'], true, 301);
            }
        }
    }
?>
