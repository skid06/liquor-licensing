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
		<div class="container" style="max-width:50% !important">
      <div style="width: 50%; margin: 0 auto;"> <h3>ORDINANCE NO.</h3> </div>
      <div style="text-align: justify;">
              AN ORDINANCE APPROVING ISSUANCE OF A CLASS "F" LIQUOR LICENSE FOR
        NINO'S INVESTMENTS INC. d/b/a "Lucky Slots 2" PURSUANT TO CHAPTER 6,
        SECTION 6-37 OF THE CODE OF ORDINANCES OF THE CITY OF LOVES PARK,
        ILLINOIS
      </div>
      <p>
      WHEREAS, Chapter 6, Sections 6-37 and 6-43 of the Code of Ordinances of the City of
Loves Park ("City") regulate the number and classes of liquor licenses, respectively, existing
within the City ("Code"); and
      </p>
      <p>
      WHEREAS, a Class "F" liquor license authorizes the retail sale and consumption of
alcoholic liquor within a licensed premises, provided that the licensed premises also has, locates,
maintains and lawfully operates Video Gaming Terminals (as defined under the Illinois Video
Gaming Act, 230 ILCS 40/1 et seq.) within the Class "F" licensed establishment; and
      </p>
      <p>
      WHEREAS, the City now desires to approve the issuance of a Class "F" liquor license to
Nino's Investments Inc., an Illinois corporation, doing business as "Lucky Slots 2" (hereinafter
"Licensee"), pursuant to Chapter 6, Section 6-37 and 6-43 of the Code; and
      </p>
      <p>
      WHEREAS, said liquor license shall be for use only within the portion of the premises
located at 6451 North Second Street, Loves Park, Illinois, 61111 which is exclusively used for
video gaming and occupied by Licensee (“Premises”) and subject to the conditions set forth
herein.
      </p>
      <p>
      NOW THEREFORE, BE IT ORDAINED BY THE CITY COUNCIL OF THE CITY OF
LOVES PARK, BOONE AND WINNEBAGO COUNTIES, ILLINOIS AS FOLLOWS:
      </p>
      <h2></h2>

      <ol>
        <li>The above recitals are incorporated by reference herein and made a part hereof.</li>
        <li>The issuance of a Class “F” liquor license to Licensee for use at the Premises is
hereby approved pursuant to Chapter 6, Section 6-37 and Section 6-43 of the Code.</li>
      </ol>
      <ol>
        <li>In addition to the conditions set forth in Paragraph 4 of this Ordinance, final issuance
of the liquor license by the Local Liquor Commissioner will be subject to review and
approval of the liquor license application by the Local Liquor Commissioner along
with compliance by Licensee with all Ordinances of the City of Loves Park and all
applicable State and/or Federal laws.</li>
        <li>
        In addition to the conditions set forth above, final issuance of the said license will be
further subject to the Licensee meeting the following conditions, at the City’s sole
discretion:
          <ol type="a">
            <li>Final approval by the City of architectural plans for issuance of any required
building permits; and</li>
            <li>
            Issuance of an occupancy permit to Licensee by the City.
            </li>
          </ol>
        </li>
        <li>
        All other provisions of the Code and any City Ordinances or Resolutions shall remain
in effect as previously enacted except that those Ordinances, Resolutions or parts
thereof in conflict with the provisions of this Ordinance are hereby repealed.
        </li>
        <li>
        This Ordinance shall be in full force and effect from and after its passage, approval,
and publication in pamphlet form as provided by law.
        </li>
      </ol>
      <p>
      PASSED by the City Council of the City of Loves Park this ____day of May, 2018.
      </p>
      <p>
        APPROVED: <br></br>
        Mayor: 
      </p>
      <p>
        ATTEST: <br>
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