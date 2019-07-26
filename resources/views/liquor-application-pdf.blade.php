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
    font-family: "Times New Roman", Times, serif !important;
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
		<div class="container" style="max-width:80% !important; margin-left: 50px;">
      <div style="width: 60%; margin-left: 50px;"> <h3 style="font-size: 14px;">ORDINANCE NO.</h5> </div>
      <p style="text-align: center !important;" style="text-align: center !important;">
              AN ORDINANCE APPROVING ISSUANCE OF A CLASS "R-1" LIQUOR LICENSE FOR
              "{{ @$pdf['business_name'] }}"" PURSUANT TO CHAPTER 6,
        SECTION 6-37 OF THE CODE OF ORDINANCES OF THE CITY OF LOVES PARK,
        ILLINOIS
      </p>
      <p style="text-align: center !important;">
      WHEREAS, Chapter 6, Sections 6-37 and 6-43 of the Code of Ordinances of the City of
Loves Park ("City") regulate the number and classes of liquor licenses, respectively, existing
within the City ("Code"); and
      </p>
      <p style="text-align: center !important;">
      WHEREAS, a Class “R-1” liquor license authorizes the retail sale on the premises
specified, of alcoholic liquor for consumption on the premises by restaurants, subject to the
requirement that at least 55 percent (55%) of the premises’ gross receipts be from the sale of
food; and
      </p>

      <p style="text-align: center !important;">
      WHEREAS, a Class “R-1” liquor license further authorizes the retail sale of packaged
alcoholic liquor, provided that said retail sales of such liquor shall not exceed ten percent (10%)
of the total sales of all alcoholic beverages; and
      </p>
      <p style="text-align: center !important;">
      WHEREAS, the City now desires to approve the issuance of a Class “R-1” liquor license
to "{{ @$pdf['business_name'] }}" an Illinois limited liability company, doing business as
“{{ @$pdf['business_name'] }}” (“Licensee”), pursuant to Chapter 6, Section 6-37 of the Code; and
      </p>
      <p style="text-align: center !important;">
      WHEREAS, said liquor license shall be issued for use only within that part of the
building and attached and enclosed outdoor patio area located at {{ @$pdf['business_address'] }} (“Premises”); and
      </p>
      <p style="text-align: center !important;">
      WHEREAS, the Premises will have a drive through window that will be used solely for
carry-out order pick-up of non-alcoholic items; and
      </p>
      <p style="text-align: center !important;">
      WHEREAS, said liquor license shall be issued for use only within the Premises and
subject to the conditions set forth herein and including the requirement that access to the outdoor
patio seating area shall only be allowed from the current location within the building and no
alcohol shall be sold, picked-up, served or provided in any way shape or form to customers
through the drive through window.
      </p>
      <p style="text-align: center !important;">
      NOW THEREFORE, BE IT ORDAINED BY THE CITY COUNCIL OF THE CITY OF
LOVES PARK, BOONE AND WINNEBAGO COUNTIES, ILLINOIS AS FOLLOWS:
      </p>
      <h2></h2>

      <ol>
        <li>The above recitals are incorporated by reference herein and made a part hereof.</li>
        <li>The issuance of a Class “R-1” liquor license to the Licensee for use at the Premises is
hereby approved pursuant to Chapter 6, Section 6-37 of the Code.</li>
        <li>
        Final issuance of the liquor license by the local liquor commissioner will be subject to
review and approval of the liquor license application by the local liquor commissioner
along with compliance by Licensee with all Ordinances of the City of Loves Park and
all applicable State and/or Federal laws.
        </li>
      </ol>
      <ol>
        <li>All other provisions of the Code and any City Ordinances or Resolutions shall remain
in effect as previously enacted except that those Ordinances, Resolutions or parts
thereof in conflict with the provisions of this Ordinance are hereby repealed.</li>
        <li>
        This Ordinance shall be in full force and effect from and after its passage, approval,
and publication in pamphlet form as provided by law.
        </li>
      </ol>
      <p style="text-align: center !important;">
      PASSED by the City Council of the City of Loves Park this ____day of May, 2018.
      </p>
      <p style="text-align: center !important;">
        APPROVED: <br /> <br> <br><br>
        _______________________
        <br>
        Mayor: 
      </p>
      <br><br>
      <p style="text-align: center !important;">
        ATTEST: <br><br><br><br>
        ________________________
        <br>
        City Clerk: 

      </p>
		</div>
	</div>	<script type="text/javascript">
	<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
	 <script type="text/javascript">
	 	$(".input").focus(function() {
	 		$(this).parent().addClass("focus");
	 	})
	 </script>	


</body></html>