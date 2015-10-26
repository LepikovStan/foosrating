<?php
    require('../classes/abstract/controller_base.php');
    require('../classes/player.php');

    Class Controller_getPlayers Extends Controller_Base {
        function index() {
            $player = new Player($this->registry);
            $players = $player->getAllPlayers();

            $result = array(
                'status' => 'ok',
                'data' => $players
            );
            echo json_encode($result);
        }
    }
?>
