var get_level = 0;
var give_level = 0;
var total_key_scan = 1;
var total_keys_scanned = 0;

function refresh_scan_levels()
{
    get_level = 0;
    give_level = 0;
    total_key_scan = 1;
    total_keys_scanned = 0;
}

function manage_levels(opt)
{
    if(opt == "get")
    {
        if(get_level == 0)
        {
            $("#get_cancel_0").css('display','inline-block');
            $("#get_scan").css('display','inline-block');

            $("#get_delete").css('display','none');
            $("#get_finnish").css('display','none');

            $("#get_print").css('display','none');
            $("#get_cancel_1").css('display','none');
        }
        else if(get_level == 1)
        {
            $("#get_delete").css('display','inline-block');
            $("#get_finnish").css('display','inline-block');

            $("#get_cancel_0").css('display','inline-block');
            $("#get_scan").css('display','inline-block');

            $("#get_print").css('display','none');
            $("#get_cancel_1").css('display','none');               
        }
        else if(get_level == 2)
        {
            $("#get_print").css('display','inline-block');
            $("#get_cancel_1").css('display','inline-block');

            $("#get_delete").css('display','none');
            $("#get_finnish").css('display','none');

            $("#get_cancel_0").css('display','none');
            $("#get_scan").css('display','none');
        }
        else if(get_level == 3)
        {
            $("#get_print").css('display','none');
            $("#get_cancel_1").css('display','none');

            $("#get_delete").css('display','inline-block');
            $("#get_finnish").css('display','inline-block');

            $("#get_cancel_0").css('display','none');
            $("#get_scan").css('display','none');
        }
    }
    else if(opt == "give")
    {
        if(give_level == 0)
        {
            $("#give_cancel_0").css('display','inline-block');
            $("#give_scan").css('display','inline-block');

            $("#give_delete").css('display','none');
            $("#give_finnish").css('display','none');

            $("#give_print").css('display','none');
            $("#give_cancel_1").css('display','none');
        }
        else if(give_level == 1)
        {
            $("#give_delete").css('display','inline-block');
            $("#give_finnish").css('display','inline-block');

            $("#give_cancel_0").css('display','inline-block');
            $("#give_scan").css('display','inline-block');

            $("#give_print").css('display','none');
            $("#give_cancel_1").css('display','none');
        }
        else if(give_level == 2)
        {
            $("#give_print").css('display','inline-block');
            $("#give_cancel_1").css('display','inline-block');

            $("#give_delete").css('display','none');
            $("#give_finnish").css('display','none');

            $("#give_cancel_0").css('display','none');
            $("#give_scan").css('display','none');
        }
        else if(give_level == 3)
        {
            $("#give_print").css('display','none');
            $("#give_cancel_1").css('display','none');

            $("#give_delete").css('display','inline-block');
            $("#give_finnish").css('display','inline-block');

            $("#give_cancel_0").css('display','none');
            $("#give_scan").css('display','none');
        }
    }
}

function check_scan_level(opt,opt2)
{
    if(opt == 0)
    {
        if(give_level == 0)
        {
            give_level+=1;
            manage_levels("give");
        }
        else if(give_level == 1 && opt2 == 1)
        {
            give_level += 1;
            manage_levels("give");
        }
        else if(give_level == 1 && opt2 == 2)
        {
            give_level = 3;
            manage_levels("give");
        }
    }
    else if(opt == 1)
    {
        if(get_level == 0)
        {
            get_level+=1;
            manage_levels("get");
        }
        else if(get_level == 1 && opt2 == 1)
        {
            get_level += 1;
            manage_levels("get");
        }
        else if(get_level == 1 && opt2 == 2)
        {
            get_level = 3;
            manage_levels("get");
        }
    }
}

function show_info_page()
{
    $("#main_col").html('');
    $.ajax({
    type: "GET",
    url: "./info.php",
    success: function(data){

        $("#main_col").html(data);
    }
    });   
}
function show_get_keys()
{
	$("#main_col").html('');
    refresh_session();
    $.ajax({
        type: "GET",
        url: "./get_keys.php",
        success: function(data){

            $("#main_col").html(data);

        }

    });
}
function show_receive_keys()
{
	$("#main_col").html('');
    refresh_session();
    $.ajax({
        type: "GET",
        url: "./get_keys2.php",
        success: function(data){

            $("#main_col").html(data);

        }

    });
}
function refresh_session()
{
    $.ajax({
        type: "POST",
        url: "./scan_cards_manage.php",
        data:{send_data:"refresh_sess"},
        success: function(data){

        }

    });
}
function send_scan(opt)
{
	$('#get_keys_succ').html('');
	$('#get_keys_err').html('');
	$.ajax({
        type: "POST",
        url: "./scan_cards_manage.php",
        data:{send_data:"scan",option:opt},
        success: function(data){

            check_scan_level(opt,0);
            //alert(data);

            if(data == "0")
            {
            	$('#get_keys_err').html('Eroare la conectarea la baza de date!');
            }
            else if(data == "1")
            {
            	$('#get_keys_err').html('Nu ati scanat nici un card!');
            }
            else if(data == "2")
            {
            	$('#get_keys_err').html('Ati scanat mai mult de 1 card de utilizator!');
            }
            else if(data == "3")
            {
            	$('#get_keys_err').html('Nu ati scanat nici un card de utilizator!');
            }
            else if(data == "4")
            {
            	$('#get_keys_err').html('Ati scanat un card de utilizator diferit fata de prima scanare!');
            }
            else if(data == "5")
            {
                $('#get_keys_err').html('Nu se poate distruge o scanare inexistenta!');
            }
            else if(data == "6")
            {
                $('#get_keys_err').html('Nu se poate trimite o scanare inexistenta!');
            }
            else if(data == "7")
            {
                $('#get_keys_err').html('Nu puteti primi chei care sunt deja in gestiune!');
            }
            else if(data == "8")
            {
                $('#get_keys_err').html('Gestionarul cheii nu corespunde cu utilizator-ul scanat!');
            }
            else if(data == "9")
            {
                $('#get_keys_err').html('Ati scanat deja cel putin o cheie!');
            }
            else if(data == "10")
            {
                $('#get_keys_err').html('Utilizatorul scanat nu este activ!');
            }
            else if(data == "11")
            {
                $('#get_keys_err').html('Ati scanat mai mult de 20 de chei!');
            }
            else if(data == "12")
            {
                $('#get_keys_err').html('Cel putin o cheie este in gestiunea altui utilizator!');
            }
            else if(data == "13")
            {
                $('#get_keys_err').html('Ati scanat mai mult de 4 ori!');
                check_scan_level(opt,2);
            }
            else if(data == "14")
            {
                $('#get_keys_err').html('Cel putin o cheie scanata este inactiva!');
            }
            else
            {
            	var x = data.split("////");
            	var target_html = '<div class="scan_div"><p>Scanare: '+total_key_scan+'</p>';
                if(total_key_scan >= 4) check_scan_level(opt,2);
                total_key_scan++;
            	for (var i = 0; i < x.length-1; i++) {
            		target_html += '<div class="card_div">'+(i+1)+": "+x[i]+'</div>';
            	}
                target_html += "<p class='scan_tmp_nr'>Total chei scanate: "+(x.length-1)+"</p>";
            	target_html += "</div>";
            	$('.scan').html( $('.scan').html() + target_html );
                total_keys_scanned+=x.length-1;
                $("#total_keys_scanned").html("Totalul cheilor scanate pana acum: "+total_keys_scanned);
                $("#total_keys_scanned").css("display","block");
            }

        }

    });
}
function destroy_last_scan()
{
	$('#get_keys_succ').html('');
	$('#get_keys_err').html('');
	$.ajax({
        type: "POST",
        url: "./scan_cards_manage.php",
        data:{send_data:"delete_scan"},
        success: function(data){

            //alert(data);

            if(data == "0")
            {
            	$('#get_keys_err').html('Eroare la conectarea la baza de date!');
            }
            else if(data == "5")
            {
            	$('#get_keys_err').html('Nu se poate distruge o scanare inexistenta!');
            }
            else if(data == "destroy")
            {
                if(get_level == 3)
                {
                    get_level = 1;
                    manage_levels("get");
                }
                else if(give_level == 3)
                {
                    give_level = 1;
                    manage_levels("give");
                }
                else if(get_level == 1 && total_key_scan == 2)
                {
                    get_level = 0;
                    manage_levels("get");
                }
                else if(give_level == 1 && total_key_scan == 2)
                {
                    give_level = 0;
                    manage_levels("give");
                }

                var tmp_val = $(".scan_tmp_nr").last().html();
                var subtract_nr = parseInt( tmp_val.split(":")[1].trim() );
                total_keys_scanned -= subtract_nr;
                total_key_scan -= 1;
                $("#total_keys_scanned").html("Totalul cheilor scanate pana acum: "+total_keys_scanned);
            	$( ".scan_div" ).last().remove();
            }

        }

    });
}
function finish_scan()
{
	$('#get_keys_succ').html('');
	$('#get_keys_err').html('');
	$.ajax({
        type: "POST",
        url: "./scan_cards_manage.php",
        data:{send_data:"send_to_user"},
        success: function(data){

            check_scan_level(0,1);
        	//alert(data);

            if(data == "0")
            {
            	$('#get_keys_err').html('Eroare la conectarea la baza de date!');
            }
            else if(data == "6")
            {
            	$('#get_keys_err').html('Nu se poate trimite o scanare inexistenta!');
            }
            else if(data == "sent")
            {
            	$('#get_keys_succ').html('Scanarea a fost trimisa cu succes!');
            }

        }

    });
}
function finish_receive_scan()
{
	$('#get_keys_succ').html('');
	$('#get_keys_err').html('');
	$.ajax({
        type: "POST",
        url: "./scan_cards_manage.php",
        data:{send_data:"get_cards"},
        success: function(data){

            check_scan_level(1,1);
            //alert(data);

            if(data == "0")
            {
            	$('#get_keys_err').html('Eroare la conectarea la baza de date!');
            }
            else if(data == "6")
            {
            	$('#get_keys_err').html('Nu se poate trimite o scanare inexistenta!');
            }
            else if(data == "7")
            {
                $('#get_keys_err').html('Cheile sunt deja in gestiune!');
            }
            else if(data == "8")
            {
                $('#get_keys_err').html('Cheile nu sunt in gestiunea utilizatorului scanat!');
            }
            else if(data == "sent")
            {
            	$('#get_keys_succ').html('Scanarea a fost trimisa cu succes!');
            }

        }

    });
}
function print_scan()
{
    $.ajax({
        type: "POST",
        url: "./scan_cards_manage.php",
        data:{send_data:"print_scan"},
        success: function(data){

            //alert(data);

        }

    });   
}