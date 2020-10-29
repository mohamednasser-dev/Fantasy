<div class="col-lg-6 col-md-10 " style="margin-right: 120px;">
	<h6 class="card-title label-Style">{{trans('admin.'.$position)}}</h6>
    <button data-player-id="{{$player->id}}" data-order={{$order}} data-position-name="{{$position}}" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_away_player" name="delete_away_player" type="button">
            <i class="fa fa-minus"></i> 
    </button>
    <img src="{{ url($player->image) }}" class="image-Style"/>
    <h4 class="text-themecolor label-Style">{{$player->player_name}}</h4>
</div>
    <input type="hidden" name="squad_away[]" value="{{$player->id}}">
	<input type="hidden" name="newPosition_away[]" value="{{$position}}">

