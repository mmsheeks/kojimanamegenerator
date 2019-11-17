<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;

use App\NameModel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        return view('welcome');
    }

    public function formSection( $section )
    {
        return view('form', [ 'section' => $section ] );
    }

    public function stepone( Request $request )
    {
        $roll = $request->input('roll');
        if( $roll < 6 ) {
            $numberOfNames = 1;
        } else {
            $numberOfNames = 7;
        }

        session(['numberOfNames' => $numberOfNames ] );
        return response()->JSON([ 'html' => view('form.section2')->render() ] );
    }

    public function steptwo( Request $request )
    {
        $input = $request->all();
        unset( $input['_token']);
        session($input);
        return redirect()->route('formStep', [ 'section' => 'section3' ] );
    }

    public function stepthree( Request $request )
    {
        $input = $request->all();
        unset( $input['_token']);
        session($input);
        return redirect()->route('formStep', [ 'section' => 'section4' ] );
    }

    public function stepfour( Request $request )
    {
        $input = $request->all();
        unset( $input['_token'] );
        session( $input );
        return redirect()->route('formStep', [ 'section' => 'section5' ] );
    }

    public function stepfive( Request $request )
    {
        $input = $request->all();
        unset( $input['_token'] );
        session( $input );
        return redirect()->route('name');
    }

    public function name( Request $request )
    {
        $data = $request->session()->all();
        $name = new NameModel( $data );
        return view('name', ['model' => $name ] );
    }

    public function testinput()
    {
        $data = [
            'numberOfNames' => 1,
            '2_1' => 'Martin Michael Sheeks',
            '2_2' => 'Editor',
            '2_3' => 'Domestic Short Hair',
            '2_4' => 'Missed Entrance',
            '2_5' => 'Rusty Spoon',
            '2_6' => 'Helping',
            '2_7' => '15',
            '2_8' => 'abandonment',
            '2_9' => 'cops',
            '2_10' => 'movie',
            '2_11' => 'tired',
            '2_12' => 'liquid',
            '2_13' => 'carton',
            '2_14' => 'taurus',
            '2_15' => 'kind',
            '3_16' => 'col lee',
            '3_17' => 'strangelove',
            '3_18' => 'pleasures',
            '3_19' => 'crispr',
            '3_20' => 'railgun',
            '3_21' => 'lullaby',
            '4_1' => 1,
            '4_2' => 7,
            '4_3' => 1,
            '4_4' => 50,
            '5_1' => 10
        ];

        $name = new NameModel( $data );
        dd( $name );
    }
}
