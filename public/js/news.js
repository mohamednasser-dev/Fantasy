$(document).ready(function () {
    var type;
    // $('#player_panel').hide();
    // $('#tour_panel').hide();
    // $('#coach_panel').hide();
    // $('#club_panel').hide();
console.log('here');

    $("#type").change(function () {
        type = $('#type').val();

        // type = $('#type').val();
        if ($('#type').val() == 'player') {

            $('#player_panel').show();
            $('#tour_panel').hide();
            $('#coach_panel').hide();
            $('#club_panel').hide();
        }else if ($('#type').val() == 'club') {
            $('#player_panel').hide();
            $('#tour_panel').hide();
            $('#coach_panel').hide();
            $('#club_panel').show();
        }else if ($('#type').val() == 'tournament') {
            $('#player_panel').hide();
            $('#tour_panel').show();
            $('#coach_panel').hide();
            $('#club_panel').hide();
        }else if ($('#type').val() == 'coach') {
            $('#player_panel').hide();
            $('#tour_panel').hide();
            $('#coach_panel').show();
            $('#club_panel').hide();
        }
            
    
  
});
});


