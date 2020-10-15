<?php
namespace App\Http\Controllers;
use App\kurejas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class kurejaiController extends Controller
{
    public function Index()
    {
        $allkurejai = kurejas::paginate(4);;
        return view('kurejai', compact('allkurejai'));
    }
    public function vidus(Request $request,$name)
    {
        $kurejas = kurejas::where('pavadinimas', $name)->first();

        return view('kurejovidus')->with('kurejas', $kurejas);
    }
    public function naujkure(Request $request)
    {



        return view ('naujkure');

    }

    public function pridetikureja(Request $request)
    {
        $validator = Validator::make(

            [
                'id' =>$request->input('id'),
                'name' =>$request->input('name'),

                'content' =>$request->input('content'),
                'data' =>$request->input('data')

            ],
            [   'id' => 'required|numeric',
                'name' => 'required|alpha_num',

                'content' =>'required|min:3|max:150',
                'data'=>'required|date'

            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $kurejai = new Kurejas();
            $kurejai->imones_kodas  = $request->input('id');

            $kurejai->pavadinimas  = $request->input('name');
            $kurejai->ikurimo_data = $request->input('data');
            $kurejai->aprasymas = $request->input('content');

            $kurejai->save();


        }
        return Redirect::to('/kurejai')->with('success', 'Kūrėjas pridėtas');
    }
    public function deleteKureja($id)
    {
        Kurejas::where('imones_kodas','=',$id)->delete();
        $allkurejas= Kurejas::paginate(1);

        return redirect()->back()
            ->with('success', 'Kūrėjas pašalintas');
    }

    public function redaguotikureja($id)
    {

        $selectedKurejas = Kurejas::where('imones_kodas','=',$id)->first();


        return view('redaguotkureja', compact('selectedKurejas'));
    }

    public function pavykoredaguotikureja(Request $request, $id)
    {
        $validator = Validator::make(
            [
                'id' =>$request->input('imones_kodas'),
                'name' =>$request->input('pavadinimas'),

                'content' =>$request->input('aprasymas'),
                'data' =>$request->input('ikurimo_data'),

            ],
            [   'id' => 'required|numeric',
                'name' => 'required',

                'content' =>'required|min:3|max:150',
                'data'=>'required|date',

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


            $kurejas = Kurejas::where('imones_kodas','=',$id)->first()->update($appendableData);


        }
        return Redirect::to('/kurejai')->with('success', 'Kūrėjas atnaujintas');
    }
}