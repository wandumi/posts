<?php

namespace App\Http\Controllers;

set_time_limit(300);

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PDF;

class CertificateController extends Controller
{
    public function index()
    {
        return view('frontend.certificates.index');
    }

    public function download()
    {
        return view('frontend.certificates.download'); 
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $name       = $request->name;
        $second     = $request->second;
        $third      = $request->third;

        $image = Image::make('certificate.jpg')->fit(1800, 1800);

        $image->text($name, 780, 200, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
            
        });

        $image->text('CLIMATE HERO!', 750, 300, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
        });

        $image->text($second, 760, 500, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
            
        });
        // dd($third);
        $image->text($third, 750, 580, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
            
        });

        $image->text('22 Baume', 740, 800, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('center');
            
        });

        // Three sections of text
        $image->text('~484kg', 330, 1000, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('left');
        });

        $image->text('=', 900, 1000, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('center');
        });

        $image->text('~5%', 1250, 1000, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('right');
        });

        // Two sections/ first column 
        $image->text('CO2 konnten', 420, 1150, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('neutralistert', 430, 1200, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('werden', 460, 1250, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });

        // Two sections/ second column 
        $image->text('meines CO2', 1300, 1150, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('AusstoBes auf', 1280, 1200, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });

        $image->text('Lebenszeit', 1320, 1250, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });

        // dd($image);

        $username = $name ."_".$image->basename;

        $image->save($username);

        $file = public_path()."\\". $username;

        $header = array(
            'content-type: application/jpg'
        );

        return Response()->download($file)->deleteFileAfterSend();


        // if ($language == "english") {
        //     $pdf = PDF::loadView('certificate-english', compact('order_items_qty', 'certificate_data', 'certificate_lines_english_content'));
        // } else {
        //     $pdf = PDF::loadView('certificate', compact('order_items_qty', 'certificate_data', 'certificate_lines_deutch_content'));
        // }
        // return $pdf->stream(); //return pdf on the browser


        // /// return the output as a blob to axios request

        // if ($language == "english") {
        //     $pdf = PDF::loadView('certificate-english', compact('order_items_qty', 'certificate_data', 'certificate_lines_english_content'));
        // } else {
        //     $pdf = PDF::loadView('certificate', compact('order_items_qty', 'certificate_data', 'certificate_lines_deutch_content'));
        // }
        // $pdf->setPaper('a4', 'portrait');
        // return $pdf->output();

    }

    public function certificate(Request $request)
    {
        //dd($request->all());
        $name = strtoupper($request->name);
        $order_id = $request->order_id;
        $customer_id = $request->customer_id; 
        $language = $request->language;
        $sponsor = $request->sponsor;

        $image = Image::make('certificate.jpg')->fit(1800, 1800)->encode('jpg');

        // Setting the position of the string 
        // Starting point
        if(strlen($name) >= 10){
            $pos = 920;  // this is the position of your label you need to adjust it
         }elseif(strlen($name) <= 8 ){
            $sec = 850;  //pos label you need to adjust it
         }

        $image->text($name, $pos, 200, function($font){
            $font->file(base_path('public/fonts/Roboto-Bold.ttf'));
            $font->size(80);
            $font->color('#fff');
            $font->align('center');
            $font->valign('center');
            
        });

       

        $image->text('CLIMATE HERO!', 900, 320, function($font){
            $font->file(base_path('public/fonts/Roboto-Bold.ttf'));
            $font->size(80);
            $font->color('#fff');
            $font->align('center');
            $font->valign('center');
        });

        $image->text('Third text on the picture', 500, 520, function($font){
            $font->file(base_path('public/fonts/Roboto-Bold.ttf'));
            $font->size(80);
            $font->color('#fff');
            $font->valign('center');
            
        });
        // dd($third);
        $image->text('Last line of the top four', 509, 600, function($font){
            $font->file(base_path('public/fonts/Roboto-Bold.ttf'));
            $font->size(80);
            $font->color('#fff');
            $font->valign('center');
            
        });

        $image->text('22 Baume', 580, 780, function($font){
            $font->file(base_path('public/fonts/Caveat-Bold.ttf'));
            $font->size(180);
            $font->color('#fff');
            $font->valign('center');
            
        });

        // Three sections of text
        $image->text('~484kg', 180, 1100, function($font){
            $font->file(base_path('public/fonts/Caveat-Bold.ttf'));
            $font->size(220);
            $font->color('#fff');
        
            $font->valign('left');
        });

        $image->text('=', 850, 1000, function($font){
            $font->file(base_path('public/fonts/Caveat-Bold.ttf'));
            $font->size(220);
            $font->color('#fff');
            // $font->align('center');
            $font->valign('center');
        });

        $image->text('~5%', 1200, 1100, function($font){
            $font->file(base_path('public/fonts/Caveat-Bold.ttf'));
            $font->size(220);
            $font->color('#fff');
          
            $font->valign('right');
        });

        // Two sections/ first column 
        $image->text('CO2 konnten', 320, 1220, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(60);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('neutralistert', 330, 1300, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(60);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('werden', 380, 1370, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(60);
            $font->color('#fff');
            $font->valign('center');
        });

        // Two sections/ second column 
        $image->text('meines CO2', 1200, 1220, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(60);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('AusstoBes auf', 1180, 1300, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(60);
            $font->color('#fff');
            $font->valign('center');
        });

        $image->text('Lebenszeit', 1220, 1370, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(60);
            $font->color('#fff');
            $font->valign('center');
        });

        return $image->response('jpg');

    }

    public function pdf(Request $request)
    {
        $name = $request->name;
        $order = $request->order_id;
        
        $data = [
            'name' => $name,
            'order' => $order
        ];

        // Auth::attempt(['email' => $email, 'password' => $password]);
        // view()->share('users', $data);

        $pdf = PDF::loadView('frontend.certificates.certificate', array( 'name' => $name, 'order' => $order) );

        return $pdf->stream();
    }

    public function pdfs()
    {
        // return view('frontend.certificates.original');
        
        $pdf = PDF::loadView('frontend.certificates.original');

        return $pdf->download();
    }

}
