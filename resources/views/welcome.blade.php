<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users App</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body class="font-sans bg-gray-300">
       
        <div style="width: 600px; display: flex; justify-content: center; padding: 40px; ">
            <?php 
                $array = array(1,2,3);
                // echo $array;
            
                foreach ($array as $value) {
                    # code...
                    echo "Print the avalue of ", $value, '<br />';
                }

                $array2 = array(1,2,3, array( 2,array(4,5,6) ) );

                // foreach($array2 as $value2){
                //     echo $value2, '<br >';
                // }

                // foreach ($array2 as $value2) {
                //     # code...
                //     if(!is_array($value2)){
                //         echo "Check 1st if it is an array ", $value2, '<br >';
                //     }
                // }

                // function loopMulti($array){
                //     foreach ($array as $key => $value2) {
                //         # code...
                //         if(!is_array($value2)){
                //             // echo "Check 1st if it is an array ", $value2, '<br >';
                //             loopMulti($value2);
                //         } else {
                //             echo "Check 1st if it is an array ", $value2, '<br >';
                //         }
                //     }
                // }

                // loopMulti($array2)
            ?>

        </div>
    </body>
</html>
