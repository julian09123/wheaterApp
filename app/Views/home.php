<?php
$data = file_get_contents("public/argentina.json");
$cc = json_decode($data, true);



 ?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wheater App</title>

    <link rel="shortcut icon" href="icon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <script>
    	
    	



    </script>
    <style >
    	body {
    		background-color: #93C6E7;
    		overflow-x: hidden;
		    height: 100%;
		    
		    background-repeat: no-repeat;

    	}
        h6 {
            color: white;
        }
    	

		.card {
		    width: 400px;
		    background-color: #E3F6FF;
		}

		.block {
		    width: 20%;
		    background-color: #0d6efd;
		    cursor: pointer;
		    padding: 10px 0px;
            margin-bottom: 10px;
		}

		.first-block {
		    border-bottom-left-radius: 5px;
		}

		.last-block {
		    border-bottom-right-radius: 5px;
		}

		

		.city-symbol {
		    width: 200px;
		    height: 250px;
		}

		.large-font {
		    font-size: 60px;
		}

		.symbol-img {
		    width: 40px;
		    height: 40px;
		}

		@media screen and (max-width: 400px) {
		    .card {
		        width: 92%;
		    }

		    	}
		    .popup {
		    	width: 500px;
		    	padding: 30px;
		    	background: #fff;
		    	border-radius: 15px;
		    	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
		    }


		    #search {
		    	margin-bottom: 5px;
		    }
		    #img1 {
		    	

				position: absolute;
				display: flex;

				width: 50px;
				height: 50px;
			


		    }
		    #autocomplete-list{
		    	list-style-type: none;
		    	margin: 0;
		    	padding: 0;
		    	background-color: white;
		    	width: 100%;
		    	max-height: 200px;
		    	overflow-y: auto;
		    }
		    #autocomplete-list option {
		    	color: #48328F;
		    	padding: 15px;
		    	width: calc(100% - 30px);
		    	font-weight: bold;
		    	cursor: pointer;
		    }
		    .form-control {
    border-radius: 0;
    box-shadow: none;
    border-color: #d2d6de
}

.select2-hidden-accessible {
    border: 0 !important;
    clip: rect(0 0 0 0) !important;
    height: 1px !important;
    margin: -1px !important;
    overflow: hidden !important;
    padding: 0 !important;
    position: absolute !important;
    width: 1px !important
}

.form-control {
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 0;
    padding: 6px 12px;
    height: 34px
}

.select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #aaa;
    border-radius: 4px
}

.select2-container .select2-selection--single {
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    height: 28px;
    user-select: none;
    -webkit-user-select: none
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 10px
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0;
    padding-right: 0;
    height: auto;
    margin-top: -3px
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 0 !important;
    padding: 6px 12px;
    height: 40px !important
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 6px !important;
    right: 1px;
    width: 20px
}
.hrr {
    border: 1px solid black;
}
		

    	
    </style>

  </head>
  <body>

  	<form method="POST" action="<?php echo base_url()?>/weather">
  	<div class="container px-1 px-sm-4 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="card text-center pt-4 border-0">
            <div class="img1"></div>
            <img src="/wheaterApp/public/img/img.png"class="img-fluid" id="img1">
            <h2>Weather App</h2>
            <br>
            <div class="form-group">
            	<select class="form-control select2 select2-hidden-accessible" name="scity" id="scity" style="width: 100%;" tabindex="-1" aria-hidden="true">
            		<option value="none" selected> Search a Country</option>
            		<?php

            			foreach ($cc as $key) {
            				echo "<option value= '" . $key['name']. "'>" . $key['name'] . "</option>";
            			}
            			
            		?>


            	</select>

            </div>
            <span id="error" style="color: red;"></span><br> 
        	<input type="submit" name="button" id="search-box" class="btn btn-primary" onclick="return val()"  value="Search">
        	

            
             <br>
             <hr>
            <h4 class="mb-0"><?php echo $city ?></h4>
            <small class="text-muted mb-3"><?php echo $country ?></small>
            <h2 class="large-font"><?php echo $temp ?>&#176;</h2>
            
            <h6 class="small-font" style="color: black;">
            	<?php   echo "<img src='" . "http://openweathermap.org/img/wn/"  . $description[0]['icon'] . ".png'" . ">";           ?> 
            	<br>
            	<?php echo $description[0]["description"] ?></h6>
            
            <div class="text-center mt-3 mb-4">
                
            </div>
            <div class="row d-flex px-3 mt-auto">
                <div class="d-flex flex-column block first-block">
                    <small style="color: white;">Humidity</small>
                    <hr class="hrr">
                   <!-- <div class="text-center"><img class="symbol-img" src="https://i.imgur.com/BeWfUuG.png"></div> -->
                    <h6><strong><?php echo $humidity;?></strong></h6>
                </div>
                <div class="d-flex flex-column block">
                    <small style="color: white;">Min Temp</small>
                    
                    <hr class="hrr">
                        

                    <h6><strong><?php echo $temp_min;?></strong></h6>
                </div>
                <div class="d-flex flex-column block">
                    <small style="color: white;">Max Temp</small>
                    
                    <hr class="hrr">
                    
                    <h6><strong><?php echo $temp_max;?></strong></h6>
                </div>
                <div class="d-flex flex-column block">
                    <small style="color: white;">Wind Spe</small>
                    
                    <hr class="hrr">
                    
                    <h6><strong><?php echo $wind_spe;?>m/s</strong></h6>
                </div>
                <div class="d-flex flex-column block last-block">
                    <small style="color: white;">Wind Dir</small>
                    
                    <hr class="hrr">
                    
                    <h6><strong><?php echo $wind_di;?>&#176;</strong></h6>
                </div>
            </div>
        </div>
    </div>
</div>
</form>














	
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="/wheaterApp/public/js/main.js"></script>
  </body>
</html>