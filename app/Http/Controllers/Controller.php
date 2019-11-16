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
}
