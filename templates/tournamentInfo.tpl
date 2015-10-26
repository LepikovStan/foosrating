<form method="POST" class="form" action="tournament/add">
    <h2>Создать новый турнир</h2>
    <fieldset>
        <label>
            Дата начала турнира:
            <input name="tournamentStart" type="text" value="" />
        </label>
    </fieldset>
    <fieldset>
        <label>
            Дата конца турнира:
            <input name="tournamentEnd" type="text" value="" />
        </label>
    </fieldset>
    <fieldset>
        <label>
            Форматы игр:
            <select name="gamesFormat" multiple="multiple">
                <option value="os">open singles</option>
                <option value="od">open doubles</option>
            </select>
        </label>
    </fieldset>
    <fieldset>
        <label>
            Категория турнира:
            <select name="gamesFormat">
                <option value="1.25">Международные турниры (под эгидой ITSF)</option>
                <option value="1">Этапы и Финал Кубка России</option>
                <option value="0.75">Другие соревнования</option>
            </select>
        </label>
    </fieldset>
    <div class="buttons">
        <input type="submit" value="Создать" />
    </div>
</form>