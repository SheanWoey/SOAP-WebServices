<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link href="feature/main.css" rel="stylesheet" type="text/css"/>
        <script src='https://code.jquery.com/jquery-3.3.1.min.js' type='text/javascript'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

        <?php
        $client = new SoapClient("http://localhost/WSDLserver/poke.wsdl");
        $response1 = $client->getAllPokemon();
        ?>
        <script>
            $(document).ready(function () {
                var Generation1 = [];
                var Generation2 = [];
                var Generation3 = [];
                var Generation4 = [];
                var Generation5 = [];
                var Generation6 = [];
                var json =<?php echo $response1; ?>;
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
                                    Generation1.push([' <button class="infocard" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick=javascript:display_specific_pokemon(' + json[i].ID + ')><img class="img-fixed icon-pkmn" src="image/icons/' + json[i].ID + '.png"><br>' + json[i].Name + '</button>']);
                                } else if (gen === 2) {
                                    Generation2.push([' <button class="infocard" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick=javascript:display_specific_pokemon(' + json[i].ID + ')><img class="img-fixed icon-pkmn" src="image/icons/' + json[i].ID + '.png"><br>' + json[i].Name + '</button>']);
                                } else if (gen === 3) {
                                    Generation3.push([' <button class="infocard" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick=javascript:display_specific_pokemon(' + json[i].ID + ')><img class="img-fixed icon-pkmn" src="image/icons/' + json[i].ID + '.png"><br>' + json[i].Name + '</button>']);
                                } else if (gen === 4) {
                                    Generation4.push([' <button class="infocard" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick=javascript:display_specific_pokemon(' + json[i].ID + ')><img class="img-fixed icon-pkmn" src="image/icons/' + json[i].ID + '.png"><br>' + json[i].Name + '</button>']);
                                } else if (gen === 5) {
                                    Generation5.push([' <button class="infocard" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick=javascript:display_specific_pokemon(' + json[i].ID + ')><img class="img-fixed icon-pkmn" src="image/icons/' + json[i].ID + '.png"><br>' + json[i].Name + '</button>']);
                                } else if (gen === 6) {
                                    Generation6.push([' <button class="infocard" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" onclick=javascript:display_specific_pokemon(' + json[i].ID + ')><img class="img-fixed icon-pkmn" src="image/icons/' + json[i].ID + '.png"><br>' + json[i].Name + '</button>']);
                                }
                            }
                        }
                        for (var i = 0; i < Generation1.length; i++) {
                            $("#Generation1").append(Generation1[i]);
                        }
                        for (var i = 0; i < Generation2.length; i++) {
                            $("#Generation2").append(Generation2[i]);
                        }
                        for (var i = 0; i < Generation3.length; i++) {
                            $("#Generation3").append(Generation3[i]);
                        }
                        for (var i = 0; i < Generation4.length; i++) {
                            $("#Generation4").append(Generation4[i]);
                        }
                        for (var i = 0; i < Generation5.length; i++) {
                            $("#Generation5").append(Generation5[i]);
                        }
                        for (var i = 0; i < Generation6.length; i++) {
                            $("#Generation6").append(Generation6[i]);
                        }
                    }
                });


            });

        </script>
    </head>
    <body>


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" id="res">

                </div>
                <div class="modal-content" id="res1" style>

                </div>
            </div>
        </div>
        <div class="container">
            <ul class="list-nav panel panel-nav">
                <li class="list-nav-title">Jump to</li>
                <li><a href="#Generation1">Generation 1</a></li>
                <li><a href="#Generation2">Generation 2</a></li>
                <li><a href="#Generation3">Generation 3</a></li>
                <li><a href="#Generation4">Generation 4</a></li>
                <li><a href="#Generation5">Generation 5</a></li>
                <li><a href="#Generation6">Generation 6</a></li>
            </ul>
            <div class="input-group">

                <select class="custom-select form-control" id="legend">
                    <option selected>legendary </option>
                    <option value="TRUE">TRUE</option>
                    <option value="FALSE">FALSE</option>
                </select>
                <select class="custom-select form-control" id="type">
                    <option selected>Type </option>
                    <option value="Steel">steel</option>
                    <option value="Fire">fire</option>
                    <option value="Water">water</option>
                    <option value="Dragon">dragon</option>
                    <option value="Grass">grass</option>
                    <option value="Dark">dark</option>
                </select>
                <div class="input-group-prepend">
                    <button class="infocard input-group-text" onclick="find()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Search</button>
                </div>
            </div>
            <h2>Generation 1 </h2>
            <div class="infocard-list infocard-list-pkmn-sm" id='Generation1'>

            </div>                
            <h2> Generation 2</h2>
            <div class="infocard-list infocard-list-pkmn-sm" id='Generation2'>

            </div>                
            <h2> Generation 3  </h2>
            <div class="infocard-list infocard-list-pkmn-sm" id='Generation3'>

            </div>                
            <h2> Generation 4 </h2>
            <div class="infocard-list infocard-list-pkmn-sm" id='Generation4'>

            </div>                
            <h2>  Generation 5 </h2>
            <div class="infocard-list infocard-list-pkmn-sm" id='Generation5'>

            </div>
            <h2> Generation 6  </h2>
            <div class="infocard-list infocard-list-pkmn-sm" id='Generation6'>

            </div>

        </div>        
        <form id = 'display_specific_pokemon' action = 'pokemonDetail.php' method = 'post'>
            <input type = 'hidden' id = 'id' name = 'id' value="1">
        </form>
        <script>
            function display_specific_pokemon(id)
            {

                document.getElementById('id').value = id.toString();
                show(id);
                //document.getElementById('display_specific_pokemon').submit();
            }
            function show(id) {
                $.post("pokemonDetail.php", {uid: id}, function (result) {
                    $("#res").empty();
                    $("#res1").empty();
                    $.ajax({
                        type: 'post',
                        data: result,
                        success: function (response) {
                            var obj = JSON.parse(result);
                            var pokemon_detail = "<div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>" + obj.Name + "</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'> <span aria-hidden='true'>&times;</span></button></div>";
                            pokemon_detail += " <div class='modal-body'><img src='image/sugimori/" + obj.ID + ".png' class='figure-img img-fluid rounded'><ul class='list-group list-group-flush'><li class='list-group-item'>Type1 : " + obj.Type1 + "  Type2 : " + obj.Type2 + "</li><li class='list-group-item'>Attack: " + obj.Attack + "</li><li class='list-group-item'>Defense : " + obj.Defense + "</li><li class='list-group-item'>Speed : " + obj.Speed + "</li><li class='list-group-item'>Sp. Atk: " + obj.SpAtk + "</li><li class='list-group-item'>Sp. Def: " + obj.SpDef + "</li><li class='list-group-item'>Total: " + obj.Total + "</li></div>";
                            console.log(result);
                            $("#res").append(pokemon_detail);
                        }
                    });
                });
            }
            function find() {
                var legend = document.getElementById("legend").value;
                var type = document.getElementById("type").value;
                $.post("pokemonSearch.php", {legend: legend, type: type}, function (result) {
                    var searchResult = [];
                    searchResult.push(["<div class='modal-header'><h5 class='modal-title' id='exampleModalLongTitle'>Search Result</h5><button type='button' class='close' data-dismiss='modal' aria-label='Close'> <span aria-hidden='true'>&times;</span></button></div>"]);
                    $("#res").empty();
                    $("#res1").empty();
                    $.ajax({
                        type: 'post',
                        data: result,
                        success: function (response) {
                            var obj = JSON.parse(result);
                            var check2 = [];
                            for (var i = 0; i < obj.length; i++)
                            {
                                var found = check2.includes(obj[i].Name);
                                var check = obj[i].Name;
                                if (check.includes("Mega") || check.includes("Primal")) {
                                } else {
                                    if (found == false) {
                                        $("#res1").empty();
                                        searchResult.push(["<div class='modal-body'><h5 class='modal-title' id='exampleModalLongTitle'>" + obj[i].Name + "</h5><img src='image/sugimori/" + obj[i].ID + ".png' class='figure-img img-fluid rounded'><ul class='list-group list-group-flush'><li class='list-group-item'>Type1 : " + obj[i].Type1 + "  Type2 : " + obj[i].Type2 + "</li><li class='list-group-item'>Attack: " + obj[i].Attack + "</li><li class='list-group-item'>Defense : " + obj[i].Defense + "</li><li class='list-group-item'>Speed : " + obj[i].Speed + "</li><li class='list-group-item'>Sp. Atk: " + obj[i].SpAtk + "</li><li class='list-group-item'>Sp. Def: " + obj[i].SpDef + "</li><li class='list-group-item'>Total: " + obj[i].Total + "</li></div>"]);
                                        check2.push(obj[i].Name);
                                        for (var i = 0; i < searchResult.length; i++) {
                                            $("#res1").append(searchResult[i][0]);
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
            }
        </script>
        <script src="feature/newjavascript.js" type="text/javascript"></script>   
    </body>
</html>
