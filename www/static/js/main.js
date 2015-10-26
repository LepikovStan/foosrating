$(function() {
    function serialize($form) {
        var result = {};
        $.each($form.find('input[type=text],select'), function(i, el) {
            console.log(i, el);
            var $el = $(el);
            result[$el.attr('name')] = $el.val();
        });

        return result;
    }

    $('.addPlayer').on('submit', function(e) {
        var $this = $(e.currentTarget);

        $.post($this.attr('action'), serialize($this), function(data) {
            var result = JSON.parse(data),
                playersData = result.data.sort(function(a, b) {
                    return b.rating - a.rating;
                });

            updateRatingTable(playersData);
            $this.trigger('reset');
        });

        return false;
    });

    function updateRatingTable(playersData) {
        var rows = '',
            nonactive = '';

        $.each(playersData, function(i, el) {
            if (el.tournamentsActiveNum == 0) {
                nonactive = 'nonactive'
                el.tournamentsActiveNum = '';
            } else {
                nonactive = ''
            }

            rows += '<tr class="'+nonactive+'">'+
                        '<td>'+(i+1)+'</td>'+
                        '<td>'+el.lastName+' '+el.firstName+'</td>'+
                        '<td>'+el.city+'</td>'+
                        '<td>'+el.tournamentsNum+'</td>'+
                        '<td>'+el.tournamentsActiveNum+'</td>'+
                        '<td>'+el.gamesPlayed+'</td>'+
                        '<td>'+el.gamesWin+'</td>'+
                        '<td>'+el.gamesLose+'</td>'+
                        '<td>'+el.gamesWinPercent+'</td>'+
                        '<td>'+el.rating+'</td>'+
                        '<td>'+el.rang+'</td>'+
                    '</tr>'
        });

        $('.ratingTable tbody').html(rows);
    }

    $.get('/getPlayers', function(data) {
        var result = JSON.parse(data),
            playersData = result.data.sort(function(a, b) {
                return b.rating - a.rating;
            });

        if (result.status == 'ok') {
            updateRatingTable(playersData);
        }
    });
});