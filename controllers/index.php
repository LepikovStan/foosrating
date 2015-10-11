<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/template.php');

    Class Controller_Index Extends Controller_Base {
        function index() {
            //$this->redis->flushall();
            session_start();

            if (!empty($_SESSION)) {
                $regTime = $_SESSION['user']['auth_time'];
                if ($regTime) {
                    $timeWithoutAction = time() - $regTime;
                    if ($timeWithoutAction > 600){
                        session_destroy();
                        header('Location: http://'.$_SERVER['HTTP_HOST'], true, 301);
                    }
                    else {
                        $_SESSION['user'] = array('login' => $_SESSION['user']['login'], 'auth_time' => time());
                    }
                }
            }

            $tpl = new Template('index');
            $errors = Template::parseErrors();

            if (!empty($_SESSION)) {
                $userLoggedTpl = new Template('userLogged');
                $userLoggedTpl->set('login', $_SESSION['user']['login']);

                $addPlayerTpl = new Template('addPlayerForm');

                foreach ($errors as $ername => $ervalue) {
                    $addPlayerTpl->set($ername, $ervalue);
                }

                $tpl->set('userLogged', $userLoggedTpl->parse());
                $tpl->set('addPlayerForm', $addPlayerTpl->parse());
                $tpl->set('authForm', '');
                $tpl->set('regForm', '');
            } else {
                $authFormTpl = new Template('authForm');
                $regFormTpl = new Template('regForm');

                $tpl->set('userLogged', '');
                $tpl->set('addPlayerForm', '');
                $tpl->set('authForm', $authFormTpl->parse());
                $tpl->set('regForm', $regFormTpl->parse());
            }

            $tpl->parse();
            $tpl->render();
        }
    }
?>
