<!DOCTYPE html>
<html lang="en">
<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    <title>Certificate</title>
</head>
<style>

    @font-face {
        font-family: 'Caveat';
        src: url({{ URL::asset('fonts/Caveat-Regular.ttf')  }}) format("truetype");
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'Helvatica';
        src: url({{ URL::asset('fonts/Caveat.ttf')  }}) format("truetype");
        font-weight: normal;
        font-style: normal;
    }

    /* *{
        box-sizing: border-box;
    } */

    body, html {
       
        color: #fff;
        text-align: center;
        margin: 0;
        padding: 0;
        
     
    }

    body {
        background-image: url('./cert_background.png');
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: center top; 
       
    }


    h1,h2,h3,h4,h5,h6,p {
        margin: 0;
        padding: 0;
    }
  
    .row{
        clear: both;
    }


    main{
        width: 80%;
        margin: 0 auto;
    }

    .first_row{
        width: 33%;
        float: left;
        height: 50px;

    }
    
    #equal_sign{
        padding-top: 0px;
    }

    .bauma{
        font-family: "Caveat";
        font-weight: 700
        
    }

    #bauma {
        font-size: 60px;
    }

    #bauma_text{
        font-size: 40px;
    }

    .normal_text{
        font-family: "Helvetica";
        font-weight: 700;
        line-height: 1.2;
        margin-top: 100px;
    }
    .header_text{
        font-size: 20px;
    }
    .text_bottom{
        font-size: 20px;
    }

    .top_margin{
        margin-top: 40px;
    }

</style>
<body>
   
    
            <header class="normal_text header_text">
                <div class="row"> 
                    <h1>Wandumi sichali</h1>
                    <h1>Serial Killer</h1>
                </div>
                <div class="row top_margin">
                    <p>Lorem ipsum dolor sit</p>
                
                    <p>Lorem ipsum dolor sit</p>
                </div>
            </header>
            <main>
                <div class="row top_margin">
                    <h2 class="bauma" id="bauma">22 Bauma</h2>
                </div>
                <div class="row top_margin" >
                    <aside class="first_row">
                        <div>
                            <h3 class="bauma" id="bauma_text">~ 415kg</h3>
                        </div>
                        <div class="text_bottom top_margin">
                            <p>CO2 konnten</p>
                            <p>neutralistert</p>
                            <p>werden</p>    
                        </div>
                    </aside>
                    <aside class="first_row">
                        <div id="equal_sign bauma_text" class="bauma">=</div>
                        <div></div>
                    </aside>
                    <aside class="first_row">
                        <div>
                            <h3 class="bauma"  id="bauma_text">~ 5%</h3>
                        </div>
                        <div class="text_bottom top_margin">
                            <p>meines CO2</p>
                            <p>AusstoBes auf</p>
                            <p>Lebenszeit</p>
                        </div>
                    </aside>
                </div>
                
            </main>
       
    
</body>
</html>