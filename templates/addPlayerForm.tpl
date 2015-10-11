<form class="addPlayer form" name="addPlayer" method="POST" action="/addplayer">
    <div class="head">Добавить игрока</div>
    <fieldset>
        <label>
            Имя:
            <input name="firstName" type="text" value="" />
            {error_firstName}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Фамилия:
            <input name="lastName" type="text" value="" />
            {error_lastName}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Город:
            <input name="city" type="text" value="" />
            {error_city}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Кол-во турниров:
            <input name="tournamentsNum" type="text" value="" />
            {error_tournamentsNum}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Кол-во турниров в сезоне:
            <input name="tournamentsActiveNum" type="text" value="" />
            {error_tournamentsActiveNum}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Кол-во игр:
            <input name="gamesPlayed" type="text" value="" />
            {error_gamesPlayed}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Побед:
            <input name="gamesWin" type="text" value="" />
            {error_gamesWin}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Поражений:
            <input name="gamesLose" type="text" value="" />
            {error_gamesLose}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Рейтинг:
            <input name="rating" type="text" value="" />
            {error_rating}
        </label>
    </fieldset>
    <fieldset>
        <label>
            Ранг:
            <input name="rang" type="text" value="" />
            {error_rang}
        </label>
    </fieldset>
    <div class="buttons">
        <input type="submit" value="Добавить" />
    </div>
</form>