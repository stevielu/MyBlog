<?php

namespace App\Http\Controllers;

use Storage;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Album;

use Illuminate\Foundation\Auth\ThrottlesLogins;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Database\Eloquent\Model;

class AlbumsController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $auth;
    protected $login;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($this->auth->check()){
            $status = "logined";
        }
        else{
            $status = "unlogin";
        }
        $this->login = $status;
        $albums = Album::with('Photos')->get();
        return view('layouts.albums',['loginStauts'=>$status],['albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('createalbum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function _dataurlToFile($dataUrl){
        $encodedData = str_replace(' ','+',$dataUrl);
        $encodedData = substr($encodedData,strpos($dataUrl,",")+1);
        $decodedData = base64_decode($encodedData);
        return $decodedData;
    }
    public function store(Request $request)
    {
        $rules = array(
          'name'=>'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
        var_dump($validator->errors());
          // ->withErrors($validator)
          // ->withInput();
        }
        $data = $request->only('cover_image','name');
        $img_data = $this->_dataurlToFile($data['cover_image']);
        // $f = finfo_open();
        // $extension = finfo_buffer($f, $img_data, FILEINFO_MIME_TYPE);
        // $f = finfo_close($f);
        // $input = array('cover_image' => $decodedData);
        // var_dump($input);
        
        

        //$file = $request->file('cover_image');
        $random_name = str_random(8);
        $destinationPath = 'albums/';
        $filename=$random_name.'_cover.png';//.$extension;
        Storage::put($destinationPath.$filename, $img_data);
        // $uploadSuccess = $request->file('cover_image')
        // ->move($destinationPath, $filename);
        $album = Album::create(array(
          'album_name' => $request->name,
          'description' => $request->descrption,
          'cover_image' => $filename,
        ));

        return redirect('albums');//,['id'=>$album->id]
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('Photos')->find($id);
        return view('layouts.photos',['album'=>$album],['loginStauts'=>$this->login]);
        
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
        $album = Album::find($id);

        $album->delete();

        return Redirect::route('/albums');
    }

}
