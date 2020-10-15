<?php
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\atsiliepimas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;
class komentController extends Controller
{
    public function index()
    {
    $time = Carbon::now();
    session(['entryTime' => $time]);
    echo(session('entryTime'));
    session()->forget('entryTime');
}
    public function naujatsi(Request $request,$id)
    {




        return view ('atsiliepimoforma')->with('id', $id);

    }

    public function pridetiatsiliepima(Request $request, $id)
    {
        $validator = Validator::make(

            [

                'name' =>$request->input('name'),
                'content' =>$request->input('content'),
               'vertinimas'=>$request->input('vertinimas'),

            ],
            [
                'name' => 'required|alpha_num',
                'content' =>'required|min:3|max:150',
                'vertinimas' =>  'required',

            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $user = Auth::user()->username;
           //dd(Auth::user()->username) ;
            //{ Auth::user()->email;}}
            //dd(Auth::user()->username) ;
            $z = new Atsiliepimas();
            $z->pavadinimas  = $request->input('name');

            $z->turinys  = $request->input('content');
            $z->paskelbimo_data = Carbon::now()->format('y-m-d');
            $z->vertinimas = $request->input('vertinimas');
            $z->fk_Zaidimaszaidimo_kodas= $id;
           // $z->fk_VartotojasNaudotojo_vardas='qAIdV3h8Q7';
            $z->fk_VartotojasNaudotojo_vardas=$user;
            Carbon::now()->format('d-m-Y');
            $z->save();
        }
        return redirect()->back()->with('success', 'Atsiliepimas pridėtas');
    }
    public function deleteAtsiliepima($id)
    {
        Atsiliepimas::where('id','=',$id)->delete();


        return redirect()->back()
            ->with('success', 'Atsiliepimas pašalintas');
    }

}