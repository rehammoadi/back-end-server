<?php

namespace App\Http\Controllers;

use App\Announcements;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Illuminate\Support\MessageBag;
use Image;


class AnnouncementsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function new_Announcements(){
        return view('newAnnouncement');
    }

    public function add_new_Announcements(Request $request){

      

        $params= $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'number' => 'required',
        ]);

        if ($validator->fails()) {


            return redirect('new_announcement')
                ->withErrors($validator)
                ->withInput();
        }


        //add the img to the folder and same the file name in db
        if ($request->hasFile('image')) {
        //  \dd($data);
        // $full_name = time().'.'.$request->file('image')->getClientOriginalExtension();
            // echo $full_name;
        // $destination = base_path() . '/public/images';
            //$request->file('image')->move($destination, $full_name);


            $this->validate($request, [
                'image' => 'mimes:jpeg,png,jpg,gif,svg',
            ]);
    
    
            $image = $request->file('image');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();//the name for the same in thumbnail and images 
            
            //add to the thumbnail folder
            $destinationPath = public_path('/images/thumbnail');
            $img = Image::make($image->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
    
            //add to the images folder the full size 
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);

        }
      
        $data = array(
              "user_created"=>Auth::id(),
              "title" => htmlentities(strip_tags($params['title'])),
              "mespar_tokhnet" => htmlentities(strip_tags($params['number'])),
              "area" => htmlentities(strip_tags($params['area'])),
              "merhav_tekhnon" => htmlentities(strip_tags($params['merhav_tekhnon'])),
              "city" => htmlentities(strip_tags($params['city'])),
              "address" => htmlentities(strip_tags($params['address'])),
              "doc_number" => htmlentities(strip_tags($params['doc_number'])),
              "block_number" => htmlentities(strip_tags($params['block_number'])),
              "helka" => htmlentities(strip_tags($params['helka'])),
              "description" => htmlentities(strip_tags($params['description'])),
              "note" => htmlentities(strip_tags($params['note'])),
              "pic_full_name"=> isset($input['imagename']) ? $input['imagename']: NULL
            );
            $obj = new Announcements(
                $data
            );
            $obj->save();
            return View('ListOfAnnouncement');

    }



    public function get_list_of_Announcements(){

       // $data = Announcements::all();

        //return $data;

        return view('AnnouncementsView/announcementsListView');//->with("ann_arr" , $data);

    }

    public function get_list_of_Announcements_json(Request $request){

        $params= $request->all();
        $search = null;
        $start = $params['start'];
        $limit = $params['length'];
        if(isset($params['search']['value'])){
            $search = params['search']['value'];
        }

        $response_data = array();
        $data = Announcements::getAnnouncement($start,$limit,$search);
        $countAll = Announcements::count();
        foreach ($data as $row){
            $response_data[] = array(
                "title" => $row->title,
                "mespar_tokhnet" => $row->mespar_tokhnet,
                "area" => $row->area,
                "block_number" => $row->block_number,
                "helka" => $row->helka,
                "created_at" => $row->created_at,
                "user_created" => $row->name,
                "action"=> "<a href='/view_announcement/$row->id'>פרטים</a>");
        }
        $data = json_encode(
            array(
                "data"=>$response_data,
                "draw"=> $params['draw'],
                "recordsTotal"=>  $countAll,
                "recordsFiltered"=> count($response_data)
            )
        );
        return $data;
    }

    public function get_Announcements_by_id($id){
        if(!empty($id) && is_numeric($id)){
            $data = Announcements::getAnnouncementByid($id);
            if(!empty($data)){
                return view('viewAnnouncement')->with(compact('data'));
            }else{
                    echo 'not exit';
            }

        }else{
            abort(404, 'error action.');
        }

    }

    //update_Announcements_by_id

    public function update_Announcements_by_id(Request $request){
        $params= $request->all();

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'number' => 'required',
            'announcement_id'=> '   required'
        ]);

        if ($validator->fails()) {
            return redirect("/view_announcement/{$params['announcement_id']}")
                ->withErrors($validator)
                ->withInput();
        }

        if(empty($params["announcement_id"])){
            abort(404, 'error action.');
        }

        if ($request->hasFile('image')) {
            
                $this->validate($request, [
                    'image' => 'mimes:jpeg,png,jpg,gif,svg',
                ]);
        
        
                $image = $request->file('image');
                $input['imagename'] = time().'.'.$image->getClientOriginalExtension();//the name for the same in thumbnail and images 
                
                //add to the thumbnail folder
                $destinationPath = public_path('/images/thumbnail');
                $img = Image::make($image->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['imagename']);
        
                //add to the images folder the full size 
                $destinationPath = public_path('/images');
                $image->move($destinationPath, $input['imagename']);


                    $data = array(
                        "id"=>$params['announcement_id'],
                        "user_created"=>Auth::id(),//need to change , who updated this item
                        "title" => htmlentities(strip_tags($params['title'])),
                        "mespar_tokhnet" => htmlentities(strip_tags($params['number'])),
                        "area" => htmlentities(strip_tags($params['area'])),
                        "merhav_tekhnon" => htmlentities(strip_tags($params['merhav_tekhnon'])),
                        "city" => htmlentities(strip_tags($params['city'])),
                        "address" => htmlentities(strip_tags($params['address'])),
                        "doc_number" => htmlentities(strip_tags($params['doc_number'])),
                        "block_number" => htmlentities(strip_tags($params['block_number'])),
                        "helka" => htmlentities(strip_tags($params['helka'])),
                        "description" => htmlentities(strip_tags($params['description'])),
                        "note" => htmlentities(strip_tags($params['note'])),
                        "pic_full_name"=> isset($input['imagename']) ? $input['imagename']: NULL
                        
                    );
    
            }else{
                $data = array(
                    "id"=>$params['announcement_id'],
                    "user_created"=>Auth::id(),//need to change , who updated this item
                    "title" => htmlentities(strip_tags($params['title'])),
                    "mespar_tokhnet" => htmlentities(strip_tags($params['number'])),
                    "area" => htmlentities(strip_tags($params['area'])),
                    "merhav_tekhnon" => htmlentities(strip_tags($params['merhav_tekhnon'])),
                    "city" => htmlentities(strip_tags($params['city'])),
                    "address" => htmlentities(strip_tags($params['address'])),
                    "doc_number" => htmlentities(strip_tags($params['doc_number'])),
                    "block_number" => htmlentities(strip_tags($params['block_number'])),
                    "helka" => htmlentities(strip_tags($params['helka'])),
                    "description" => htmlentities(strip_tags($params['description'])),
                    "note" => htmlentities(strip_tags($params['note'])),
                    
                );
            }

        
        $update_status = Announcements::update_announcement($data);
        //if success to update return true
        if($update_status){
                $new_data = Announcements::getAnnouncementByid($params['announcement_id']);
                if(!empty($new_data)){
                    return redirect("/view_announcement/{$params['announcement_id']}" );
                }else{
                    echo 'not exit';
                }
        }

    }

}
