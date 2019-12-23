
function display(json) {
    $.ajax({
        type: 'post',
        data: json,
        success: function (response) {

            for (var i = 1; i < json.length; i++)
            {
                var check = json[i].Name;
                var gen = json[i].Generation;
                if (check.includes("Mega")) {
                } else {
                    if (gen === 1) {
                        Generation1.push(['<a class="infocard" href=""><img class="img-fixed icon-pkmn" src="image/icons/' + json[i].ID + '.png"><br>' + json[i].Name + '</a>']);
                    }
                }
            }
            console.log(gen);
            for (var i = 0; i < Generation1.length; i++) {
                $("#Generation1").append(Generation1[i]);
            }
        }
    });
}

