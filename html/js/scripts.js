function disableOtherThan(age) {
    $('#game_nation').find('option').remove();

    $('.nage_' + age).each(function (index) {
        var id = $(this).attr('id').split('_').pop();
        var value = $(this).text();

        $('#game_nation').append('<option value="' + id + '">' + value + '</option>');
    });
}

// delay after document is ready
$(function () {
//    Manage ages and nations on new game and edit game pages
    disableOtherThan('Early');

    $('#game_age').on('change', function (e) {
        var age = $('#game_age>option:selected').text();
        disableOtherThan(age);
    });

//    activate tooltips
    if ($.fn.tooltipster) {
        $('.tooltip').tooltipster({
            contentAsHTML: true,
            theme: 'tooltipster-light'
        });
    }

//    have download links without hash
    if ($('#activate-plain-download').length > 0) {
        $('a').each(function(e){
            var link = $(this);
            if ('download' == link.html()) {
                var parts= link.attr('href').split('_');
                link.attr('download',parts[1] + '_' + parts[2]);
            }
        });
    }

    if ($('#titles').length > 0) {

        var choices = [];
        var scales = [];
        var text = $('#titles').text();
        var strings = text.split('\n');

        for (var i=0; i<strings.length; i++){
            var current = strings[i];
            var parts = current.split('"');
            choices[i] = parts[1];

            if( parts.length == 3){
                var partsSecond = parts[2].split(':');
                scales[choices[i]] = partsSecond[1];
            } else {
                scales[choices[i]] = '';
            }
        }

        $('#title').autoComplete({
            minChars: 2,
            source: function(term, suggest){
                term = term.toLowerCase();

                var matches = [];
                for (i=1; i<choices.length; i++)
                    if (choices[i] != null && ~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                suggest(matches);
            },
            onSelect: function(e, term, item){
                var result = $('#title-result').text();
                var resultInitial = $('#title-initial').text();
                if (result == '') {
                    result = result + scales[term]
                    resultInitial = resultInitial + term;
                } else {
                    result = result + ', ' + scales[term];
                    resultInitial = resultInitial + ', ' + term;
                }

                var dominion = resultInitial.split(',').length * 2 - 2;

                $('#title-initial').text(resultInitial);
                $('#title-result').text(result);
                $('#title-dom').text(dominion);
                $('#title').val('');

            }
        });

        $("#title-clear").on('click', function() {
            $('#title-result').text('');
            $('#title-initial').text('');
            $('#title-dom').text('');
        });
    }
});


