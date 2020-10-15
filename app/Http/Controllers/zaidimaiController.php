<?php
namespace App\Http\Controllers;
use App\zaidimas;
use App\kurejas;
use App\zanras;
use App\atsiliepimas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class zaidimaiController extends Controller
{
    public function Index(Request $request)
    {
    $allzaidimas= zaidimas::paginate(4);

    return view('zaidimas')->with('allzaidimas', $allzaidimas);
}


    public function zaidimaim( Request $request,$date)
    {
        $allzaidimas= zaidimas::whereYear('isleidimo_data', $date )->paginate(3);
        $datta=$date;
        $time = Carbon::now();
        //session(['entryTime' => $time]);
        //echo(session('entryTime'));
        //session()->forget('entryTime');
        return view('zaidimas2019')-> with('allzaidimas', $allzaidimas)->with('datta', $datta);

    }
    public function zaidimovid( Request $request,$date,$name)
    {

            //

           // $request->session()->put('name', $name);
           // dd(session()->get('name'));


        $zaidimas = zaidimas::where('pavadinimas', $name)->first();
        $kurejas=kurejas::where('imones_kodas',$zaidimas->fk_Kurejasimones_kodas)->first()->pavadinimas;
        $allatsiliepimas=atsiliepimas::where('fk_Zaidimaszaidimo_kodas', $zaidimas->zaidimo_kodas)->get();
        return view('zaidimovidus')
            ->with('zaidimas', $zaidimas)
            ->with('kurejas', $kurejas)
            ->with('allatsiliepimas',$allatsiliepimas);

   }
    public function naujzaid(Request $request)
    {
        $allzanrai = zanras::paginate(10);;
        $allkurejai = kurejas::paginate(10);;


        return view ('naujzaid')->with('allkurejai', $allkurejai)->with('allzanrai', $allzanrai);

    }

    public function pridetizaidima(Request $request)
    {
        $validator = Validator::make(

            [
                'id' =>$request->input('id'),
                'name' =>$request->input('name'),

                'content' =>$request->input('content'),
                'data' =>$request->input('data'),
                'kurejas' => $request->input('kurejas'),
                'zanras' => $request->input('zanras')
            ],
            [   'id' => 'required|numeric',
                'name' => 'required|alpha_num',

                'content' =>'required|min:3|max:150',
                'data'=>'required|date',
                'kurejas' =>  'required',
                'zanras' =>  'required'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $zaidimai = new Zaidimas();
            $zaidimai->zaidimo_kodas  = $request->input('id');

            $zaidimai->pavadinimas  = $request->input('name');
            $zaidimai->isleidimo_data = $request->input('data');
            $zaidimai->aprasymas = $request->input('content');
            $zaidimai->zanras= $request->input('zanras');
               $zaidimai->fk_Kurejasimones_kodas= $request->input('kurejas');

            $zaidimai->save();
        }
        return Redirect::to('/zaidimai/2019')->with('success', 'Žaidimas pridėtas');
    }


    public function home ()
    {
        return view ('home');
    }


    public function kontaktai()
    {
        return view('kontaktai');
    }

    public function redaguotizaidima($id)
    {
        $zaidimai =  Zaidimas::all();
        $selectedZaidimas = Zaidimas::where('zaidimo_kodas','=',$id)->first();
        $allzanrai = zanras::paginate(10);;
        $allkurejai = kurejas::paginate(10);;

        return view('redaguotzaidima', compact('selectedZaidimas'))
            ->with('allkurejai', $allkurejai)
            ->with('allzanrai', $allzanrai);
    }

    public function pavykoredaguotizaidima(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'id' =>$request->input('zaidimo_kodas'),
                'name' =>$request->input('pavadinimas'),

                'content' =>$request->input('aprasymas'),
                'data' =>$request->input('isleidimo_data'),
                'kurejas' => $request->input('fk_Kurejasimones_kodas'),
                'zanras' => $request->input('zanras')
            ],
            [   'id' => 'required|numeric',
                'name' => 'required',

                'content' =>'required|min:3|max:150',
                'data'=>'required|date',
                'kurejas' =>  'required',
                'zanras' =>  'required'
            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {

           $appendableData = $request->all();

            //pašaliname iš masyvo saugumui naudojamą _token kintamąjį
            unset($appendableData ['_token']);


             $zaidimas = Zaidimas::where('zaidimo_kodas','=',$id)->first()->update($appendableData);


        }
        return Redirect::to('/zaidimai/2019')->with('success', 'Žaidimas atnaujintas');
    }





    public function deleteZaidima($id)
    {
        Zaidimas::where('zaidimo_kodas','=',$id)->delete();
        $allzaidimas= Zaidimas::paginate(1);

        return redirect()->back()
            ->with('success', 'Žaidimas pašalintas');
    }


}

