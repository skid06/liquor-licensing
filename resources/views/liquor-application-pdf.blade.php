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
									<div class="inputText">Business Name: <strong> {{ @$pdf['business_name'] }} </strong></div>
									<input type="text" name="" class="input">
								</div>
                            </div>
                        </div>
                        
                        <div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Business Address: <strong> {{ @$pdf['business_address'] }} </strong></div>
									<input type="text" name="" class="input">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText"><div style="width: 44%; float:left">Business Phone: <strong> {{ @$pdf['business_phone'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Business Email: <strong> {{ @$pdf['business_email'] }} </strong></div></div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>
                        
						<div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText"><div style="width: 44%; float:left">Contact Person: <strong> {{ @$pdf['business_contact_person'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Title: <strong> {{ @$pdf['business_contact_title'] }} </strong></div></div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>   
                        
                        <div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Contact Phone: <strong> {{ @$pdf['business_contact_phone'] }} </strong> </div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>     
 
                        <div class="row">
							<div class="col-sm-12">
								<div class="inputBox">
									<div class="inputText">Business Classification: <strong> {{ @$pdf['business_classification'] }} </strong> </div>
									<input type="text" name="" class="input">
								</div>
							</div>
                        </div>   

                        @if($pdf['classifiable_type']  == "App\Corporation")
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Corporate Name: <strong> {{ @$pdf['corporate_name'] }} </strong> </div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>  
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Corporate Address: <strong> {{ @$pdf['corporate_address'] }} </strong> </div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText"><div style="width: 44%; float:left">Store Manager: <strong> {{ @$pdf['store_manager_name'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Email: <strong> {{ @$pdf['store_manager_email'] }} </strong></div></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText"><div style="width: 44%; float:left">Phone: <strong> {{ @$pdf['store_manager_phone'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Address: <strong> {{ @$pdf['store_manager_address'] }} </strong></div></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>    
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">President: <strong> {{ @$pdf['president_name'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Phone: <strong> {{ @$pdf['president_phone'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Email: <strong> {{ @$pdf['president_email'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Address: <strong> {{ @$pdf['president_address'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                             
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President: <strong> {{ @$pdf['vice_president_name'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President Phone: <strong> {{ @$pdf['vice_president_phone'] }} </strong></div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President Email: <strong> {{ @$pdf['vice_president_email'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Vice President Address: <strong> {{ @$pdf['vice_president_address'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                               
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary: <strong> {{ @$pdf['secretary_name'] }} </strong></div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary Phone: <strong> {{ @$pdf['secretary_phone'] }} </strong></div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary Email: <strong> {{ @$pdf['secretary_email'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Secretary Address: <strong> {{ @$pdf['secretary_address'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                             
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer: <strong> {{ @$pdf['treasurer_name'] }} </strong></div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer Phone: <strong> {{ @$pdf['treasurer_phone'] }} </strong></div> 
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer Email: <strong> {{ @$pdf['treasurer_email'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Treasurer Address: <strong> {{ @$pdf['treasurer_address'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>                               
                            
                            @if($pdf['shareholders'] != 'none')
                                @foreach($pdf['shareholders'] as $shareholder)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText"><div style="width: 44%; float:left">Shareholder: <strong> {{ @$shareholder['name'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Shareholder Percentage Owned: <strong> {{ @$shareholder['percentage_owned'] }} </strong></div></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText">Shareholder Address: <strong> {{ @$shareholder['address'] }} </strong></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>                                      
                                @endforeach
                            @endif

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Have you had a business within the City of Loves Park under any other corporate name? <strong> {{ $pdf['had_business_other_corporation'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            
                        @elseif($pdf['classifiable_type']  == "App\LimitedLiabilityCompany")
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">State of Organization: <strong> {{ $pdf['state_of_organization'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">LLC Manager <strong> {{ $pdf['llc_manager_name'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText"><div style="width: 44%; float:left">LLC Manager's Email: <strong> {{ @$pdf['llc_manager_email'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">LLC Manager's Phone: <strong> {{ @$pdf['llc_manager_phone'] }} </strong></div></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText"><div style="width: 44%; float:left">Store Manager: <strong> {{ @$pdf['store_manager_name'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Store Manager's Email: <strong> {{ @$pdf['store_manager_email'] }} </strong></div></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>   

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Store Manager's Phone <strong> {{ $pdf['store_manager_phone'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>  

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Store Manager's Address <strong> {{ $pdf['store_manager_address'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>    

                            @if($pdf['members'] != 'none')
                                @foreach($pdf['members'] as $member)
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText"><div style="width: 44%; float:left">Member: <strong> {{ @$member['name'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Member's Email: <strong> {{ @$member['email'] }} </strong></div></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText">Member's Phone: <strong> {{ @$member['phone'] }} </strong></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText">Member's Address: <strong> {{ @$member['address'] }} </strong></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>                                                                          
                                @endforeach
                            @endif                                                                                                                                                                 
                        @else
                            @if($pdf['owners'] != 'none')
                                    @foreach($pdf['owners'] as $owner)
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="inputBox">
                                                    <div class="inputText"><div style="width: 44%; float:left">Owner: <strong> {{ @$owner['name'] }} </strong></div> <div style="width: 45%; float:right; text-align: left">Owner Percentage Owned: <strong> {{ @$owner['percentage_owned'] }} </strong></div></div>
                                                    <input type="text" name="" class="input">
                                                </div>
                                            </div>
                                        </div>   
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="inputBox">
                                                    <div class="inputText">Owner's Email: <strong> {{ @$owner['email'] }} </strong></div>
                                                    <input type="text" name="" class="input">
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="inputBox">
                                                    <div class="inputText">Owner Address: <strong> {{ @$owner['address'] }} </strong></div>
                                                    <input type="text" name="" class="input">
                                                </div>
                                            </div>
                                        </div>                                                                              
                                    @endforeach
                                @endif
                        @endif   

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">If state of incorporation is not ILLINOIS, when was the corporation become qualified to transact business? <strong> {{ $pdf['date_qualified_transact_business'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Was the owner born outside? <strong> {{ $pdf['born_outside_us'] == 'Yes' ? 'Yes' : 'No'  }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>                         

                        @if($pdf['born_outside_us'] == 'Yes')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Born of US Parents? <strong> {{ $pdf['born_us_parents'] == 'Yes' ? 'Yes' : 'No'  }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 
                            @if($pdf['born_us_parents'] == 'Yes')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="inputBox">
                                            <div class="inputText">Birth Country: <strong> {{ $pdf['birth_country'] }} </strong></div>
                                            <input type="text" name="" class="input">
                                        </div>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="inputBox">
                                            <div class="inputText">Date of Birth: <strong> {{ $pdf['date_of_birth'] }} </strong></div>
                                            <input type="text" name="" class="input">
                                        </div>
                                    </div>
                                </div>  

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="inputBox">
                                            <div class="inputText">Naturalized? <strong> {{ $pdf['naturalized'] == 'Yes' ? 'Yes' :'No' }} </strong></div>
                                            <input type="text" name="" class="input">
                                        </div>
                                    </div>
                                </div>   
                                @if($pdf['naturalized'] == 'Yes')
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText">City: <strong> {{ $pdf['naturalized_city'] }} </strong></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText">State: <strong> {{ $pdf['naturalized_state'] }} </strong></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="inputBox">
                                                <div class="inputText">Date: <strong> {{ $pdf['naturalized_date'] }} </strong></div>
                                                <input type="text" name="" class="input">
                                            </div>
                                        </div>
                                    </div>                                                                                                         
                                @endif                                                                                         
                            @endif
                        @endif 

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Owner's Name: <strong> {{ $pdf['establishment_owner_name'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Owner's Address: <strong> {{ $pdf['establishment_owner_address'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Owner's Phone: <strong> {{ $pdf['establishment_owner_phone'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Does the owner of the liquor establishment lease the premises where business will be conducted? <strong> {{ $pdf['owner_lease_premises'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>

                        @if($pdf['owner_lease_premises'] == 'Yes')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Lessor's Name: <strong> {{ $pdf['lessor_name'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Lessor's Address: <strong> {{ $pdf['lessor_address'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Lessor's Phone: <strong> {{ $pdf['lessor_phone'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Lease End Date: <strong> {{ $pdf['lessor_end_date'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="inputBox">
                                        <div class="inputText">Does the owner hold a liquor license at another premise? <strong> {{ @$pdf['liquor_license_another_premise'] }} </strong></div>
                                        <input type="text" name="" class="input">
                                    </div>
                                </div>
                            </div> 

                            @if(@$pdf['liquor_license_another_premise'] == 'Yes')
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="inputBox">
                                            <div class="inputText">Name of other establishment: <strong> {{ $pdf['other_establishment_name'] }} </strong></div>
                                            <input type="text" name="" class="input">
                                        </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="inputBox">
                                            <div class="inputText">Address of other establishment: <strong> {{ $pdf['other_establishment_address'] }} </strong></div>
                                            <input type="text" name="" class="input">
                                        </div>
                                    </div>
                                </div>                                                             
                            @endif                                                                                                                                        
                        @endif  

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Is any action currently pending against business or owner for violation of the Retailer's Occupation Tax Act of the State of Illinois? <strong> {{ $pdf['action_pending_against_owner'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>        

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Has the owner or establishment been issued a federal wagering stamp? <strong> {{ $pdf['owner_been_issued_wagering_stamp'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">Since the last license issuance, has a previous liquor license held by the applying entity or any owner of more than 5% ownership interest been revoked by any state or subdivision thereof, or by the Federal Government? <strong> {{ $pdf['previous_liquor_license_been_revoked'] }} </strong></div>
                                    <input type="text" name="" class="input">
                                </div>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="inputBox">
                                    <div class="inputText">When applying for a new liquor license, please note that there is a $250.00 non-refundable application fee. That fee is in addition to the liquor license itselft. This is a one time fee. This fee does not apply to renewal liquor licenses. The following is a listing of the current City of Loves Park liquor license fees revised January 31, 2019. Please check which class you are applying for. <strong> {{ $pdf['previous_liquor_license_been_revoked'] }} </strong></div>
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