<!-- Twitter Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

<style>

.cardAtt {
	border: 					none;
}

.cardHead {
	background-color: 			#A3BBB5;
	border-bottom: 				none;
}


.actDropItem {
	color: 						#000;
}
.actDropItem:hover {
	color: 						#000;
	background-color: 			#CCCCCC;
}

.btn-outline-secondary {
	background-color: 			#CDEFE7;
	border:						none;
}

.page-item.disabled .page-link {
	background-color: 			#404040;
	border-color:				#A3BBB5;
	color: 						#FFF;
}
.page-link {
	background-color: 			#404040;
	border-color:				#A3BBB5;
	color: 						#FFF;
}
.page-link:hover {
	background-color: 			#353535;
	color: 						#FFF;
}
.page-item.active .page-link {
	background-color: 			#A3BBB5;
	color: 						#000;
	border-color: 				#A3BBB5;
}

.table thead th:first-child{
	background-color: 			#A3BBB5;
	border-top-left-radius: 	15px;
	color: 						#000;
}
.table thead th:nth-child(-n+11) {
	background-color: 			#A3BBB5;
	color: 						#000;
}
.table thead th:last-child{
	background-color: 			#A3BBB5;
	border-top-right-radius: 	15px;
	color: 						#000;
}

.table thead th {
	border-color: 				transparent;
	border-bottom: 				rgba(255, 255, 255, 0.2) solid 2px;
	font-weight: 				normal;
}

.table td {
	border-top: 				rgba(255, 255, 255, 0.1) solid 1px;
}

.tableBack {
	background-color: 			#404040;
	color: 						#FFF;
	border-radius: 				15px;
}

.addUserButton {
	padding:					4px 12px 4px 12px;
}
.jumbotron {
	background-color: 			#CDEFE7;
	padding: 					10px 10px 0px 10px;
	margin: 					0;
}

.mainBtn {
	padding: 					7px 16px 10px 18px;
	margin-left: 				-18px;
}

.tabCol{
	background-color: 			rgba(0,0,0,0);
	color: 						#303030;
	transition: 				all 0.2s ease;
}
.tabCol:hover{
	background-color: 			rgba(0,0,0,0.2 );
	color: 						#000;
	text-decoration: 			none;
	transition: 				all 0.2s ease;
}

.topSmallText {
	color: 						#303030;
	transition: 				all 0.2s ease;
}

.mainColor0 {
	background-color: 			rgba(255,255,255,0.8);
	color: 						#303030;
	border: 					none;
	border-radius: 				25px;
	font-size:					14PT;
	transition: 				all 0.2s ease;
}
.mainColor0:hover {
	background-color: 			rgba(0,0,0,0.5);
	color: 						#FFFFFF;
	transition: 				all 0.2s ease;
}
.mainColor0:hover .topSmallText {
	color: 						#FFFFFF;
	transition: 				all 0.2s ease;
}

.mainColor1 {
	font-size:					14PT;
	background-color: 			#96DCCD;
	border-color: 				#96DCCD;
	color: 						#222222;
	transition: 				all 0.2s ease;
}
.mainColor1:hover {
	background-color: 			#39BDA0;
	border-color: 				#39BDA0;
	color: 						#FFFFFF;
	transition: 				all 0.2s ease;
}

.mainColor2 {
	font-size: 					14PT;
	background-color: 			#FFF;
	border-color: 				#FFF;
	color: 						#303030;
	transition: 				all 0.2s ease;
}
.mainColor2:hover {
	background-color: 			#303030;
	border-color: 				#303030;
	color: 						#FFFFFF;
	transition: 				all 0.2s ease;
}

.mainColor3 {
	background-color: 			#9BCFB8;
	border: 					none;
	font-size: 					12PT;
	color: 						#303030;
	transition: 				all 0.2s ease;
}
.mainColor3:hover {
	background-color: 			#D0EDE0;D0EDE0
	border: 					none;
	color: 						#303030;
	transition: 				all 0.2s ease;
}

.hoverAppear {
	opacity: 					0;
}
.hoverAppear:hover {
	opacity: 					1;
}

.nodeco:hover {
	text-decoration: 			none;
}

.navigate {
	margin: 					12px 0 12px 0;
}
.navigate .text-center {
	padding: 					5px 0 5px 0;
}
.actionBar {
	width: 						185px;
}

body {
	background-color: 			#404040;
}

.table > tbody > tr > td {
	vertical-align: middle;
}

.nav-items {
	border-bottom:				none;
}
.nav-tabs .nav-link:hover {
	border:						rgba(0,0,0,0) solid 1px;
}
.nav-tabs .nav-link.active {
	background-color:				#404040;
	border:						#404040 solid 1px;
	color: 						#FFF;
}

#return-to-top {
	position: 					fixed;
	bottom: 					20px;
	right: 						20px;
	background: 				rgb(0, 0, 0);
	background: 				rgba(0, 0, 0, 0.7);
	width: 						50px;
	height: 					50px;
	display: 					block;
	text-decoration: 			none;
	-webkit-border-radius: 		35px;
	-moz-border-radius: 		35px;
	border-radius: 				35px;
	display: 					none;
	-webkit-transition: 		all 0.3s linear;
	-moz-transition: 			all 0.3s ease;
	-ms-transition: 			all 0.3s ease;
	-o-transition: 				all 0.3s ease;
	transition: 				all 0.3s ease;
}
#return-to-top i {
	color:  					#fff;
	margin: 					0;
	position: 					relative;
	left: 						16px;
	top: 						13px;
	font-size: 					19px;
	-webkit-transition: 		all 0.3s ease;
	-moz-transition: 			all 0.3s ease;
	-ms-transition: 			all 0.3s ease;
	-o-transition: 				all 0.3s ease;
	transition: 				all 0.3s ease;
}
#return-to-top:hover {
	background: 				rgba(0, 0, 0, 0.9);
}
#return-to-top:hover i {
	color:  					#fff;
	top: 						5px;
}
</style>
