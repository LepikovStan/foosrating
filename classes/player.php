<?php
    Class Player {
        protected $registry;
        protected $redis;
        protected $sort_players;

        function __construct($registry) {
            $this->registry = $registry;
            $this->redis = $this->registry['redis'];
        }

        function save($data) {
            $this->redis->hmset(PLAYER_DATA_KEY . $data['hash'], $data);
            $this->redis->bgsave();

            $this->addToList($data['rating'], $data['hash']);
        }

        function getData($hash = null) {
            if (is_null($hash)) {
                return false;
            }

            return $this->redis->hgetall(PLAYER_DATA_KEY . $hash);
        }

        function addToList($rating, $hash) {
            if (!empty($rating) && !empty($hash)) {
                $this->redis->zadd(PLAYERS_KEY, $rating, $hash);
                $this->redis->bgsave();
            }
        }

        function getAllPlayers() {
            $players = array();
            $playersHashFromDb = $this->redis->zrange(PLAYERS_KEY, 0, -1);

            foreach ($playersHashFromDb as $playerHash) {
                $playerData = $this->getData($playerHash);
                $playerData['gamesWinPercent'] = intval($playerData['gamesWin'] / $playerData['gamesPlayed'] * 100) . '%';
                array_push($players, $playerData);
            }

            return $players;
        }
    }
?>
