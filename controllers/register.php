<?php
    require('../classes/abstract/controller_base.php');

    Class Controller_register Extends Controller_Base {
        private function checkUserAvailable($login) {
            $users = $this->redis->lrange(USER_DB_KEY, 0, -1);
            return in_array($login, $users);
        }

        function index() {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if (!$this->checkUserAvailable($login)) {
                $this->redis->rpush(USER_DB_KEY, $login);
                $this->redis->hset(USER_DATA_KEY . $login, 'password', $password);
                $this->redis->bgsave();
                session_start();

                $_SESSION['user'] = array('login' => $login, 'auth_time' => time());
                header('Location: http://'.$_SERVER['HTTP_HOST'], true, 301);
            } else {
                echo 'Such login is already available';
            }
        }
    }
?>
