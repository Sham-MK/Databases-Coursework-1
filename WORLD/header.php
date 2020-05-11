<style>
.h{
  font-family: "Apple Chancery";
  text-align: center;
  padding: 2px 10px;
  text-shadow: 1px 1px rgb(255,255,255,1);
  font-size: 50px;
  color: rgb(0,51,102);
 }
.table{
    width:70%;
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
    box-sizing: border-box;
    border-collapse: collapse;
    border-spacing: 0;
    background-color: transparent;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    margin-right: 15%;
    margin-left: 15%; 
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}

 tr:hover {
  
          background-color: silver;
          color:blue;
        }
.table.th{
    text-align: left;
    display: table-cell;
    vertical-align: inherit;
    font-weight: bold;
}
.topnav 
{
  overflow: hidden;

}

body
{  
 background-position: center center;
  background-image: url(globe.jpg); 
  background-repeat: no-repeat;
  
  /* Background image is fixed in the viewport so that it doesn't move when 
     the content's height is greater than the image's height */
  background-attachment: fixed;
  
  /* This is what makes the background image rescale based
     on the container's size */
  background-size: cover;
  
  /* Set a background color that will be displayed
     while the background image is loading */
   background-color: #0066cc;
   background-image: url(globe.jpg); 

}

.topnav a 
{
  float: left;
  display: block;
  color: silver;
  text-align: center;
  padding: 5px 25px;
  text-decoration: none;
  font-size: 20px;
}

.active
 {
  color: silver;
}

.topnav .icon 
{
  display: none;
}

.dropdown
 {
  float:left;
  overflow: hidden;
}

.dropdown .dropbtn 
{
  font-size: 20px;    
  border: none;
  outline: none;
  color: silver;
  padding: 5px 25px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content
 {
  display: none;
  position: absolute;
  min-width: 160px;
  box-shadow: 0px 15px 20px 0px rgba(255,255,255,0.5);
  z-index: 1;
}

.dropdown-content a 
{

  float: none;
  color: white;
  padding: 5px 25px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn 
{
  background: silver;
  color: blue;
}

.dropdown-content a:hover
 {
  background: silver;

  color: blue;
}

.dropdown:hover .dropdown-content 
{
  display: block;
}

@media screen and (max-width: 600px)
 {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px)
 {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a
   {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
.header
  {
    float: none;
    display: block;
    text-align: left;
  }
}
.field
{
  width: 80%;
  margin-left: 5px;
  font-size:15px;
  padding:2px 10%;
  line-height:1;
  border-radius:3px
}

label{
  color: white;
  font-size: 18px;
}
.container-fluid 
{
  border-radius: 5px;
  background: rgba(40,100,120,.5);
  padding: 25px;
  margin-left: 20px;
  margin-right: 20px;
  margin-top: 20px;

}
input[type=enter] {
  background: rgba(0,134,179,.9);
  color: black;
  padding: 12px 20px;   
  border: 2px solid #000000;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  font-weight: bold;  
  width: 100px;
  margin-top: 2px;
  font-size: 15px;
  margin-right: 15px;
  margin-bottom: 2px;
}
input[type=submit] {
  background: rgba(0,134,179,.9);
  color: black;
  padding: 12px 20px;   
  border: 2px solid #000000;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  font-weight: bold;  
  width: 100px;
  margin-top: 2px;
  font-size: 15px;
  margin-right: 15px;
  margin-bottom: 2px;
}
input[type=reset] {
  background: rgba(0,134,179,.9);
  color: black;
  padding: 12px 20px;   
  border: 2px solid #000000;
  border-radius: 4px;
  cursor: pointer;
  float: right;
  font-weight: bold;  
  width: 100px;
  margin-top: 2px;
  font-size: 15px;
  margin-right: 15px;
  margin-bottom: 2px;
}
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: black;
  text-align: center;
    background: rgba(40,100,120,.2);

}



</style>


</head>
<body>
   <!-- <!to add -->
   <!-- <!to add a horizontal navigation bar> -->

<div class="topnav" id="myTopnav">
  <div class="dropdown">
     <a href="index.html" class=" tab active">Home</a>
  </div>
  <div class="dropdown">
    <button class="dropbtn">View 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="viewcountry.php">View Country</a>
      <a href="viewcity.php">View City</a>
      <a href="viewlang.php">View Language</a>
      <a href="view.php">View All</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Insert 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="countryform.php">Add Country</a>
      <a href="cityform.php">Add City</a>
      <a href="languageform.php">Add Language</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Edit 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="editCountry.php">Edit Country</a>
      <a href="editCity.php">Edit City</a>
      <a href="editCountryLang.php">Edit Language</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Delete 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="delFormCountry.php">Delete Country</a>
      <a href="delFormCity.php">Delete City</a>
      <a href="delFormLang.php">Delete Language</a>
    </div>
  </div> 
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<!--adding javascript so that when user clicks on icon it displays the hidden menu-->
<script>
function myFunction()
 {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") 
  {
    x.className += " responsive";
  } else 
  {
    x.className = "topnav";
  }
}
var header = document.getElementById("myTopnav");
var btns = header.getElementsByClassName("tab");
for (var i = 0; i < btns.length; i++)
{
  btns[i].addEventListener("click", function()
  {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
<div class="footer">
    <span class="footer_text">Copyright © 2020<br />All Rights Reserved.</span>
  </div>
  