<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ManagerContller extends Controller
{
    public function index(Request $request) {
        $items = Contact::paginate(5);
        return view('manager.manager',['items'=>$items]);
    }

    public function result(Request $request)
    {
        // 期間開始
        $start = $request->start;
        //期間終了
        $end = $request->end;

        // 性別が全ての場合

        if($request->gender == 3)
        {
            $items = Contact::where('fullname', 'LIKE', '%'.$request->fullname.'%')
            ->where('email', 'LIKE', '%'.$request->email.'%')
            ->whereIn('gender', [1, 2])
            ->paginate(5);
                //　期間の指定があるとき
                if($request->$start || $request->$end) {
                    Contact::whereBetween('created_at',
                        [Carbon::parse($start)->startOfDay(), Carbon::parse($end)->endOfDay()]
                    );
                }
            $items->appends($request->all());


        }
            // 性別の選択があるとき
            elseif($request->gender == 1 || $request->gender == 2)
        {
            $items = Contact::where('fullname', 'LIKE', '%'.$request->fullname.'%')
                ->where('email', 'LIKE', '%'.$request->email.'%')
                ->where('gender', $request->gender)
                ->paginate(5);
                //　期間の指定があるとき
                    if($request->$start || $request->$end) {
                        Contact::whereBetween('created_at',
                            [Carbon::parse($start)->startOfDay(), Carbon::parse($end)->endOfDay()]
                        );
                    }
            $items->appends($request->all());
        }
        return view('manager.manager', ['items' => $items]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/manager');
    }
}
