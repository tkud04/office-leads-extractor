<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Cookie;
use Validator; 
use Carbon\Carbon;
use App\User; 
use Response;
//use Codedge\Fpdf\Fpdf\Fpdf;
use PDF;

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;                      
    }

	
	/**
	 * Show the application home page.
	 *
	 * @return Response
	 */
	public function getIndex(Request $request)
    {
		#$this->helpers->parseMessage(275);
		$user = null;
		$nope = false;
		$v = "";
		
		$signals = $this->helpers->signals;
		$plugins = $this->helpers->getPlugins();
        $cpt = ['user','signals','plugins'];
		$req = $request->all();
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
				$v = "index";

		
		return view($v,compact($cpt));
		
    }
	
	 /* Handle apartment update.
	 *
	 * @return Response
	 */
	public function postExtractor(Request $request)
    {
		$user = null;
		if(Auth::check())
		{
			$user = Auth::user();
		}
		

		$req = $request->all();
        #dd($req);
		$ret = ['status' => "error",'message' => "nothing happened"];
	    
		$validator = Validator::make($req,[
		                    'xf' => 'required'                
		]);
		
		if($validator->fails())
         {
               $ret['message'] = "validation";
         }
		 else
		 {
			  $h = []; $rets = []; $msg = "[]"; $xf = json_decode($req['xf']);
			 
			  
			 foreach($xf as $i)
			{
			  $temp = [];
			  $em = explode('@',$i);
			  $xx = getmxrr($em[1],$temp);
              if($xx){
            	array_push($h,['em' => $i,'h' => $temp]);
              }
            }
            $msg = $h;
			$ret = ['status' => "ok",'message' => $msg];
		 }
		 
		 return json_encode($ret);
    }
    
  
	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getZoho()
    {
        $ret = "97916613";
    	return $ret;
    }
	
	

	
}
