<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/template.php');
    require('../classes/validation.php');
    require('../classes/player.php');

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

            $tpl = new Template('index', true);
            $errors = Validation::parseErrors();

            $player = new Player($this->registry);

            $allPlayers = $player->getAllPlayers();
            $ratingTableRows = '';
            $playersArrayIndex = 1;

            foreach($allPlayers as $playerData) {
                $ratingTableTpl = new Template('ratingTable');
                $ratingTableRowTpl = new Template('ratingTableRow');

                $ratingTableRowTpl->set('nonactive', '');

                if (empty($playerData['tournamentsActiveNum'])) {
                    $ratingTableRowTpl->set('nonactive', 'nonactive');
                }

                foreach($playerData as $key => $value) {
                    if (empty($value)) {
                        $value = '';
                    }
                    $ratingTableRowTpl->set('position', $playersArrayIndex);
                    $ratingTableRowTpl->set($key, $value);
                }
                $ratingTableRows = $ratingTableRows . $ratingTableRowTpl->parse();
                $playersArrayIndex = $playersArrayIndex + 1;
            }
            $ratingTableTpl->set('rows', $ratingTableRows);

            $tournamentInfoTpl = new Template('tournamentInfo');
            $tpl->set('tournamentInfo', $tournamentInfoTpl->parse());

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
                $tpl->set('ratingTable', $ratingTableTpl->parse());
            } else {
                $authFormTpl = new Template('authForm');
                $regFormTpl = new Template('regForm');

                $tpl->set('userLogged', '');
                $tpl->set('addPlayerForm', '');
                $tpl->set('authForm', $authFormTpl->parse());
                $tpl->set('regForm', $regFormTpl->parse());
                $tpl->set('ratingTable', $ratingTableTpl->parse());
            }

            $tpl->parse();
            $tpl->render();
        }
    }
?>
