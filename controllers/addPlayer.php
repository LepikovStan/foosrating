<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/validation.php');
    require('../classes/player.php');

    Class Controller_addplayer Extends Controller_Base {
        function index() {
            $errors = array();
            $errorHash = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                foreach ($_POST as $key => $value) {
                    $validateValue = Validation::validate($key, $value);

                    if (!empty($validateValue)) {
                        $errors[$key] = $validateValue;
                    }
                }
            }

            if (!empty($errors)) {
                $errors = array();

                foreach ($errors as $erkey => $ervalue) {
                    $errors[$erkey] = $ervalue;
                }

                $result = array(
                    'status' => 'error',
                    'errors' => $errors
                );
                echo json_encode($result);
            } else {
                $hashData = array(
                    'firstName' => $_POST['firstName'],
                    'lastName' => $_POST['lastName'],
                    'city' => $_POST['city']
                );

                $player = new Player($this->registry);
                $playerData = $_POST;
                $playerData['hash'] = hash('sha256', join($hashData, '|'));
                $player->save($playerData);

                $allPlayers = $player->getAllPlayers();

                $result = array(
                    'status' => 'ok',
                    'data' => $allPlayers
                );

                echo json_encode($result);
            }
        }
    }
?>
