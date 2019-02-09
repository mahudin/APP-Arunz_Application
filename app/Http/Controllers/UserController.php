<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use DB;

class UserController extends Controller
{
    private $params = ['login','password','first_name','last_name','email','birth_date','sex','age','city','telephone','join_date'];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {
	$params = ['email','password','uname','surname','sex','phone','city',
        'walking_for','walking_count','walking_because','nr_card','date_card','join_date','is_online'];
	$values='';
	for($i=0;$i<=13;$i++) $values.=$i!=13 ? $request->input($params[$i]).',':$request->input($params[$i]);
        $wyn=DB::insert('INSERT INTO users
(email,password,uname,surname,sex,phone,city,walking_for,walking_count,walking_because,nr_card,date_card,join_date,is_online)
	VALUES('.explode(',',$values).')') ? true:false;
	return Response::json(array(
        'error' => false,
        'urls' => 'true'),
        200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $wyn=DB::select('SELECT * FROM users where id=:id',['id'=>$id]);
	return Response::json(array('error' => false, 'urls' => $wyn[0]),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
