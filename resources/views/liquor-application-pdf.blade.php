<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>awesome bootstrap forms - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
}
.formBox{
	margin-top: 90px;
	padding: 50px;
}
.formBox  h1{
	margin: 0;
	padding: 0;
	text-align: center;
	margin-bottom: 50px;
	text-transform: uppercase;
}
.inputBox{
	position: relative;
	box-sizing: border-box;
	margin-bottom: 25px;
}
.inputBox .inputText{
	position: absolute;
    font-size: 16px;
    line-height: 25px;
    transition: .5s;
    opacity: .5;
}
.inputBox .input{
	position: relative;
	width: 100%;
	height: 25px;
	background: transparent;
	border: none;
    outline: none;
    font-size: 12px;
    border-bottom: 1px solid rgba(0,0,0,.5);

}
.focus .inputText{
	transform: translateY(-30px);
	font-size: 12px;
	opacity: 1;
	color: #00bcd4;

}
textarea{
	height: 100px !important;
}
.button{
	width: 100%;
    height: 25px;
    border: none;
    outline: none;
    background: #03A9F4;
    color: #fff;
}    
.container {
    max-width: 100% !important;
}
</style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>
    <div class="container-fluid">
		<div class="container">
			<div class="formBox">
				<form>
						<div class="row">
							<div class="col-sm-12">
								<h1>Liquor License Application</h1>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox ">
									<div class="inputText">Business Name: {{ @$pdf['business_name'] }}</div>
									<input type="text" name="" class="input">
								</div>
                            </div>
                        </div>
                        
                        <div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Business Address: {{ @$pdf['business_address'] }}</div>
									<input type="text" name="" class="input">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText"><div style="width: 44%; float:left">Business Phone: {{ @$pdf['business_phone'] }}</div> <div style="width: 45%; float:right; text-align: left">Business Email: {{ @$pdf['business_email'] }}</div></div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>
                        
						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText"><div style="width: 44%; float:left">Contact Person: {{ @$pdf['business_contact_person'] }}</div> <div style="width: 45%; float:right; text-align: left">Title: {{ @$pdf['business_contact_title'] }}</div></div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>   
                        
                        <div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Contact Phone: {{ @$pdf['business_contact_phone'] }} </div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>     
 
                        <div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Business Classification: {{ @$pdf['business_classification'] }} </div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>   

                        @if($pdf['classifiable_type']  == "App\Corporation")
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Corporate Name: {{ @$pdf['corporate_name'] }} </div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Corporate Address: {{ @$pdf['corporate_address'] }} </div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText"><div style="width: 44%; float:left">Store Manager: {{ @$pdf['store_manager_name'] }}</div> <div style="width: 45%; float:right; text-align: left">Email: {{ @$pdf['store_manager_email'] }}</div></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText"><div style="width: 44%; float:left">Phone: {{ @$pdf['store_manager_phone'] }}</div> <div style="width: 45%; float:right; text-align: left">Address: {{ @$pdf['store_manager_address'] }}</div></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>    
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">President: {{ @$pdf['president_name'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Phone: {{ @$pdf['president_phone'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Email: {{ @$pdf['president_email'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Address: {{ @$pdf['president_address'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                             
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President: {{ @$pdf['vice_president_name'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President Phone: {{ @$pdf['vice_president_phone'] }}</div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President Email: {{ @$pdf['vice_president_email'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President Address: {{ @$pdf['vice_president_address'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                               
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary: {{ @$pdf['secretary_name'] }}</div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary Phone: {{ @$pdf['secretary_phone'] }}</div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary Email: {{ @$pdf['secretary_email'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary Address: {{ @$pdf['secretary_address'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                             
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer: {{ @$pdf['treasurer_name'] }}</div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer Phone: {{ @$pdf['treasurer_phone'] }}</div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer Email: {{ @$pdf['treasurer_email'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer Address: {{ @$pdf['treasurer_address'] }}</div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                               
                            
                            @if($pdf['shareholders'] != 'none')
                                @foreach($pdf['shareholders'] as $shareholder)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText"><div style="width: 44%; float:left">Shareholder: {{ @$shareholder['name'] }}</div> <div style="width: 45%; float:right; text-align: left">Shareholder Percentage Owned: {{ @$shareholder['percentage_owned'] }}</div></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText">Shareholder Address: {{ @$shareholder['address'] }}</div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>                                      
                                @endforeach
                            @endif
                        @elseif($pdf['classifiable_type']  == "App\LimitedLiabilityCompany")

                        @else

                        @endif

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Have you had a business within the City of Loves Park under any other corporate name? {{ $pdf['had_business_other_corporation'] == 'Yes' ? 'Yes' : 'None'  }}</div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>                         
				</form>
			</div>
		</div>
	</div>	<script type="text/javascript">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>	


</body></html>