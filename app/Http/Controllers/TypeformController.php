<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Collection;

class TypeformController extends Controller
{
    public function webhook(Request $request)
    {

        try {
            Storage::prepend('typeform-second.txt', json_encode($request->all()) );
            
        } catch (\Exception $e) {
            logger()->error('Error happened: '  . $e->getMessage());
        }

        

        // $dataArray = $request->all();

        // $answers = $dataArray['form_response']['answers'];

        // try {
        //     Storage::prepend('answers.txt', $request->all() . '-----');
        // } catch (\Exception $e) {
        //     logger()->error('Error happened: '  . $e->getMessage());
        // }

    }


    public function testFile()
    {
        //1. get the text file - file in storage/app/typform-test-new.txt
        //2. manipulate its content
        //3. convert its content into an array, especial the form answers

        //matching between questions and answer

        // foreach ($questions as $question) 
        // {
        //    $question['ref'] => $answers['ref'] //label will be the actual answer

        //     $question['ref']//what is your name => $answer['ref']['label'] //Wandumi
        // }
    }


    public function view(Request $request)
    {
        // $data = Storage::disk('local')->get('typeform.txt');
        // $encodeData = json_decode($data, true);

        $encodeData = json_decode(json_encode($request->all()), true);
        
        $questions = $encodeData['form_response']['definition']['fields'];

        $answers = $encodeData['form_response']['answers'];
        // dd($answers);

        $lead = new Collection();
        
        $gender = null;

        foreach ($answers as $answer)
        {
            
            // if ($answer['field']['ref'] == '5000f803-66a6-4959-b2e6-08a1b154803d') {
            //    dd($answer);
            // }

            // dd ($gender);

            // exit();

            switch($answer['field']['ref']) {

                //case brand value
                case '8f0fe1db-381f-4ad3-9513-d16b8340975c':
                    $lead->brand_value = $answer['choices']['labels'];
                    break;

                //Masculine vs. Feminine
                case '83509c75-a4ea-48f8-991a-3cffee7c35b4':
                    $lead->masculine_vs_feminine = $answer['number'];
                    break;

                //Simple vs. Complex
                case '079ae59f-546a-4225-9c9d-8a24e0f28adc':
                    $lead->simple_vs_complex = $answer['number'];
                    break;
                
                case '9dab2482-67b3-4bad-a3f9-58878a878127':
                    $lead->Grey_vs_Colorful = $answer['number'];
                    break;
                    
                case 'a0f6a096-ce6d-43ed-9856-9d33900d5bd2':
                    $lead->Conservative_vs_Progressive = $answer['number']; 
                    break;

                case '3957d220-27c2-4fda-89f1-fbb0e1c63e83':
                    $lead->Approachable_vs_Authoritative = $answer['number'];
                    break;

                case '7f37a778-2309-4023-9d4f-08acd0e81b81':
                    $lead->Young_vs_Established = $answer['number'];
                    break;

                case '27147615-15bf-401e-86e3-316e5cc79eaa':
                    $lead->Sustainable_vs_ProfitableT = $answer['number'];
                    break;
                
                case 'f070089a-9cf6-4a48-972d-b5e37245e118':
                    $lead->Institutional_vs_Retail = $answer['number'];
                    break;

                case '767cf723-cb0d-4cc8-ba65-fb8c43dc2689':
                    $lead->Modern_vs_Classic = $answer['number'];
                    break;

                case 'b805f0b0-6bbc-4757-ae65-7113dfd291c9':
                    $lead->Informative_vs_Discrete = $answer['number'];
                    break;
                    
                case '185729f8-5e36-41ab-a11d-af4edc773dd6':
                    $lead->Technology_vs_Ethics = $answer['number'];
                    break;
                        
                case '916afeb8-208c-421c-a20f-1cb4dcd4c9ff':
                    $lead->do_you_want_associated_with_our_brand = $answer["text"];
                    break;

                case '6f794e9c-1914-4afd-8cbd-5357f0efa475':
                    $lead->What_does_Quentum_do_Describe_it_as_if_you_would_talk_with_a_friend = $answer['text'];
                    break;
                
                case '72a9ffb7-b4b9-469d-a0d8-753ef86e51a0':
                    $lead->do_you_not_want_associated_with_our_brand = $answer['text'];
                    break;

                case 'f930047c-cf9c-4d63-b28d-322f6ce43247':
                    $lead->What_is_our_unique_selling_point_to_Retail_Investors_How_do_we_differentiate_from_our_competitors = $answer['text'];
                    break;

                case 'bf390986-f9f4-4bfa-8242-74070e098bd8':
                    $lead->What_is_our_unique_selling_point_to_Professional_Investor_How_do_we_differentiate_from_our_competitors = $answer['text'];
                    break;

                case 'ca03ff51-68bf-4b1e-9144-866ad5193b81':
                    $lead->What_is_our_unique_selling_point_to_Venture_Capital_funds_How_do_we_differentiate_from_our_competitors = $answer['text'];
                    break;

                case 'bfad2549-3e64-4cd3-b109-30b6a45ca89d':
                    $lead->Other_characteristics_of_the_buyer_persona = $answer['text'];
                    break;


                case '5000f803-66a6-4959-b2e6-08a1b154803d':
                    $lead->Gender = $answer['choice']['label'];
                    break;

                // case 'a44cdce5-5524-44b8-8780-d3b18c5c896b':
                //     $lead->Age_range = $answer['choice']['labels'];
                //     break;

                // case '3f2ae8e4-8bf3-4970-9269-dcc45101b0b4':
                //     $lead->Income = $answer['choice']['labels'];
                //     break;

                
                
                
            }

        }

        //LeadService()->create($lead);
        //send slack notification that lead has been create

        dd($lead);

    }




    public function viewOld(Request $request)
    {
        $data = Storage::disk('local')->get('typeform.txt');
        

        $value = json_decode($data, true);
        // dd($value);

        $fields = $value['form_response'];
        // dd($fields);

       
        $definitions = $fields['definition']['fields'];
        dd($definitions);
        $answers = $fields['answers'];

        $finalAnswers = [];

        foreach ($definitions as $definitions)
        {
            $ref = $definitions['ref'];
            $title = $definitions['title'];

            foreach ($answers as $answer) {
                if ($answer['field']['ref'] == $ref)

                if ($answers['type'] == 'text') {
                   $finalAnswers = [$title => $answer['type']];
                }
            }
        }

        

        dd($finalAnswers);

        /*
        $definitions = [];
        $answers = [];

        
        // dd($fields['definition']['fields']['ref']);
        // dd($fields['answers']);

        // Definitions keys
        foreach($definition as $key => $data)
        {
            // dd($data);
            array_push ($definitions, $data['ref']);
            // array_push ($definitions, $data);
        }

        // Answers keys
        foreach($answer as $key => $data)
        {
            // dd($data);
            array_push($answers, $data['field']['ref']);
        }

        
        $result = array_intersect($definitions, $answers);


        if($result)
        {
            foreach($answer as $key => $choice)
            {
                dd($choice['']);

            }
        }

        // dd($result);
        

        // dd($answers);
        dd($definitions);

        */



    }

    public function hooks(Request $request)
    {
        
        // $data = Storage::disk('local')->get('typeform.txt');
        // $encodeData = json_decode($data, true);

        $encodeData = json_decode(json_encode($request->all()), true);
        
        $questions = $encodeData['form_response']['definition']['fields'];

        $answers = $encodeData['form_response']['answers'];
        // dd($answers);

        $lead = new Collection();
        
        $gender = null;

        foreach ($answers as $answer)
        {
            switch($answer['field']['ref']) {

                //case brand value
                case '8f0fe1db-381f-4ad3-9513-d16b8340975c':
                    $lead->brand_value = $answer['choices']['labels'];
                    break;

                //Masculine vs. Feminine
                case '83509c75-a4ea-48f8-991a-3cffee7c35b4':
                    $lead->masculine_vs_feminine = $answer['number'];
                    break;

                //Simple vs. Complex
                case '079ae59f-546a-4225-9c9d-8a24e0f28adc':
                    $lead->simple_vs_complex = $answer['number'];
                    break;
                
                case '9dab2482-67b3-4bad-a3f9-58878a878127':
                    $lead->Grey_vs_Colorful = $answer['number'];
                    break;
                    
                case 'a0f6a096-ce6d-43ed-9856-9d33900d5bd2':
                    $lead->Conservative_vs_Progressive = $answer['number']; 
                    break;

                case '3957d220-27c2-4fda-89f1-fbb0e1c63e83':
                    $lead->Approachable_vs_Authoritative = $answer['number'];
                    break;

                case '7f37a778-2309-4023-9d4f-08acd0e81b81':
                    $lead->Young_vs_Established = $answer['number'];
                    break;

                case '27147615-15bf-401e-86e3-316e5cc79eaa':
                    $lead->Sustainable_vs_ProfitableT = $answer['number'];
                    break;
                
                case 'f070089a-9cf6-4a48-972d-b5e37245e118':
                    $lead->Institutional_vs_Retail = $answer['number'];
                    break;

                case '767cf723-cb0d-4cc8-ba65-fb8c43dc2689':
                    $lead->Modern_vs_Classic = $answer['number'];
                    break;

                case 'b805f0b0-6bbc-4757-ae65-7113dfd291c9':
                    $lead->Informative_vs_Discrete = $answer['number'];
                    break;
                    
                case '185729f8-5e36-41ab-a11d-af4edc773dd6':
                    $lead->Technology_vs_Ethics = $answer['number'];
                    break;
                        
                case '916afeb8-208c-421c-a20f-1cb4dcd4c9ff':
                    $lead->do_you_want_associated_with_our_brand = $answer["text"];
                    break;

                case '6f794e9c-1914-4afd-8cbd-5357f0efa475':
                    $lead->What_does_Quentum_do_Describe_it_as_if_you_would_talk_with_a_friend = $answer['text'];
                    break;
                
                case '72a9ffb7-b4b9-469d-a0d8-753ef86e51a0':
                    $lead->do_you_not_want_associated_with_our_brand = $answer['text'];
                    break;

                case 'f930047c-cf9c-4d63-b28d-322f6ce43247':
                    $lead->What_is_our_unique_selling_point_to_Retail_Investors_How_do_we_differentiate_from_our_competitors = $answer['text'];
                    break;

                case 'bf390986-f9f4-4bfa-8242-74070e098bd8':
                    $lead->What_is_our_unique_selling_point_to_Professional_Investor_How_do_we_differentiate_from_our_competitors = $answer['text'];
                    break;

                case 'ca03ff51-68bf-4b1e-9144-866ad5193b81':
                    $lead->What_is_our_unique_selling_point_to_Venture_Capital_funds_How_do_we_differentiate_from_our_competitors = $answer['text'];
                    break;

                case 'bfad2549-3e64-4cd3-b109-30b6a45ca89d':
                    $lead->Other_characteristics_of_the_buyer_persona = $answer['text'];
                    break;


                case '5000f803-66a6-4959-b2e6-08a1b154803d':
                    $lead->Gender = $answer['choice']['label'];
                    break;
            }

        }

        //LeadService()->create($lead);
        //send slack notification that lead has been create

        //dd($lead);


        try {
            Storage::prepend('typeform-lead.txt', $lead);
            
        } catch (\Exception $e) {
            logger()->error('Error happened: '  . $e->getMessage());

            return $e->getMessage();
        }

    }
}
