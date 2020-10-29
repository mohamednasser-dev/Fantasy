
       <h6 class="card-title" style="margin-right: 118px;">{{trans('admin.'.$position)}}</h6>
<div class="col-lg-6 col-md-10 " style="margin-right: 30px;">
       <button data-player-id="{{$player->id}}" data-order={{$order}} data-position-name="{{$position}}" class="btn btn-danger waves-effect btn-circle add_btn-style" id="delete_away_player" name="delete_away_player" type="button">
            <i class="fa fa-minus"></i> 
       </button>
       <img src="{{ url($player->image) }}" class="image-Style"/>
</div>
       <h4 class="text-themecolor" style="margin-right: 120px;">{{$player->player_name}}</h4>
	   <input type="hidden" name="squad_away[]" value="{{$player->id}}">
	   <input type="hidden" name="newPosition_away[]" value="{{$position}}">