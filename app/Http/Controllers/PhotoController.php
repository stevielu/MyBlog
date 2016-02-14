<?php

namespace App\Http\Controllers;
use Auth;
use Storage;
use Validator;
use App\User;
use App\Models\Album;
use App\Models\images;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{

    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $auth;

    private function _editPhotoDes($albumID,$photoID,$content){
        $ret = Images::where('album_id',$albumID)
                        ->where('id',$photoID)
                        ->update(['description'=> $content]);
        return $ret;
    }

    private function _deletePhoto($photoID){
        $ret = Images::destroy($photoID);
    }

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        if ($this->auth->check()){
            $status = "logined";
        }
        else{
            $status = "unlogin";
        }
        //$albums = Album::with('Photos')->get();
        // return view('layouts.photo',['loginStauts'=>$status],['albums'=>$albums]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
          'album_id'=>'required',
          'myimage'=>'required|image'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            var_dump($validator->errors());
          // ->withErrors($validator)
          // ->withInput();
        }

        //$data = $request->only('album_id','myimage');
        //$img_data = $this->_dataurlToFile($data['cover_image']);
        // $f = finfo_open();
        // $extension = finfo_buffer($f, $img_data, FILEINFO_MIME_TYPE);
        // $f = finfo_close($f);
        // $input = array('cover_image' => $decodedData);
        // var_dump($input);
        
        

        //$file = $request->file('cover_image');
        // $random_name = str_random(8);
        $destinationPath = 'storage/users/albums/';
        //$filename=$random_name.'_cover.png';//.$extension;
        $file = $request->file('myimage');
        $filename = $file->getClientOriginalName();
        $file->move($destinationPath,$filename);
        // //$srcPath = $file->getRealPath();
        // var_dump($file->move('temp', $filename));
        // return;
        //Storage::move($data['myimage'],$destinationPath."test.jpg");
        // $uploadSuccess = $request->file('cover_image')
        // ->move($destinationPath, $filename);
        $album = Images::create(array(
          'image' => $filename,
          'album_id' => $request->album_id,
        ));

        return redirect('photos/'.$request->album_id);//,['id'=>$album->id]
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($this->auth->check()){
            $status = "logined";
        }
        else{
            $status = "unlogin";
        }
        $albums = Album::with('Photos')->find($id);
        return view('layouts.photos',['loginStauts'=>$status],['album'=>$albums]);
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


    public function postUpdate(Request $request, $id)
    {
        //
        $data = $request->only('type','des','id');
        var_dump($data['type']);
        switch ($data['type']) {
            case 'remove':
                $ret = $this->_deletePhoto($data['id']);
                break;

            case 'edit':
                $ret = $this->_editPhotoDes($id,$data['id'],$data['des']);
                break;

            default:
                # code...
                break;
        }   
        echo (json_encode($ret));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
