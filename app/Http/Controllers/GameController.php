<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NumberGame;
use App\Models\UserGame;
use App\Models\User;

class GameController extends Controller
{
    public function fetchNumberBetResult(Request $request) {
        $betId = $request->input('betId');
        $winner = false;
        $bet = NumberGame::where('round_id', "1713294850903")->first();
        print_r($bet);die;

        $suc_arr = [];
        if ($bet) {
            $responseData = [
                'success' => true,
                'data' => [
                  'winner' => $winner
                ]
            ];
        } else {
            $responseData = [
               'success' => false       
            ];
        }
        return response()->json($responseData);
    }

    public function submitAmount(Request $request)
    {
        $user = $request->session()->get('user');
        $numberValue = $request->input('numberValue');
        $betId = $request->input('betId');
        $amountValue = $request->input('amountValue');
        $outputValue = $request->input('outputValue');
        $name = $request->input('name');
        $current_amt = (int)$user->amount - (int)$amountValue;
        $expValue = $amountValue;

        $columnName = 'number' . $numberValue;
        if($user->exposure != null) {
            $expValue = (int)$user->exposure + (int)$expValue;
        }
        NumberGame::updateOrCreate(
            ['round_id' => $betId], // Find record by betId or create a new one
            [
            $columnName => \DB::raw("COALESCE($columnName, 0) + $amountValue"),
            'winner' => 0 
            ]
        );


        User::where('id', $user->id)->update(['amount' => $current_amt , "exposure" => $expValue]);
        $user = User::find($user->id);
        $request->session()->put('user', $user);

        // Insert data into user_games table
        $userGame = new UserGame();
        $userGame->user_id = $user->id;
        $userGame->game = $name;
        $userGame->betId = $betId;
        $userGame->input_amount = $amountValue;
        $userGame->output_amount = $outputValue; 
        $userGame->win_or_lose = "in_game"; 
        $userGame->save();

        return response()->json(['success' => true]);
    }
}
