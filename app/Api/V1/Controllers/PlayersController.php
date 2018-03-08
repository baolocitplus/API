<?php

namespace App\Api\V1\Controllers;
use Config;
use App\Player;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\AddPlayerRequest;
class PlayersController extends Controller
{
     
    public function add(AddPlayerRequest $request)
    {
        $data_player = $request->all();
        $data['campaign_name']          = $request->get('campaign_name');
        $data['location_name']          = $request->get('location_name');
        $data['device_name']            = $request->get('device_name');
        $data['avatar']                 = $request->get('avatar');
        $data['full_name']              = $request->get('full_name');
        $data['email']                  = $request->get('email');
        $data['phone_number']           = $request->get('phone_number');
        $data['birthday']               = $request->get('birthday');
        $data['mac_address']            = $request->get('mac_address');
        $data['imei']                   = $request->get('imei');
        $data['created_client_at']      = $request->get('created_client_at');
        $data['state']                  = $request->get('state');

        foreach ($data as $key=>$value) {
            if(in_array($value,$data_player))
                unset($data_player[$key]);
        }
        $content = json_encode($data_player);

        $player = new Player;
        $player->campaign_name      = $data['campaign_name'];
        $player->location_name      = $data['location_name'];
        $player->device_name        = $data['device_name'];
        $player->avatar             =  $data['avatar'];
        $player->full_name          =  $data['full_name'];
        $player->email              = $data['email'];
        $player->phone_number       =  $data['phone_number'];
        if($data['birthday']==""){
            $player->birthday=null;
        }else{
            $player->birthday        = $data['birthday'];
        }
        
        $player->mac_address        = $data['mac_address'];
        $player->imei               = $data['imei'];
         if($data['created_client_at']==""){
            $player->created_client_at=null;
        }else{
            $player->created_client_at        = $data['created_client_at'];
        }
        $player->content            = $content;
         if($data['state']==""){
            $player->state=null;
        }else{
            $player->state        = $data['state'];
        }
        if($player->save())
         return response()
     ->json([
        'status' => 'Thêm Customer Thành Công!'
    ]);
     else
        return $this->response->error('could_not_create_book', 500);

}
public function getplayer($id){
   $player = Player::find($id);

   if(!$player)
    throw new NotFoundHttpException; 

return $player;
        // return response()
        //     ->json([
        //         'status' => 'Lấy Dữ Liệu Customer Thành Công!'
        //     ]);
}

public function getlistplayer(){
    // $currentPage = 1; 
    // Paginator::currentPageResolver(function () use ($currentPage) {
    //     return $currentPage;
    // });

    $data = Player::orderBy('id', 'DESC')->paginate(2);
    return $data;

}
public function getplistplayer_userid(){
       $currentUser = JWTAuth::parseToken()->authenticate();
         return $currentUser
        ->player()
        ->orderBy('created_at', 'DESC')
        ->get()
        ->toArray();
}


}
