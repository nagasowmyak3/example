<header>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script> -->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap.min.css" />-->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />  -->
<!-- <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script> -->
<script src="multiselect-dropdown.js" ></script>
</header>
<?php

ini_set("display_errors","on");error_reporting(E_ALL);

include('../include/session.php');

$session->checkUserAccess("add_navigation");

if(isset($_REQUEST['addForm']))
{

	?>
	<div class="row">
		<div class="col-xl-12 col-lg-12">
			<div class="card border-0 shadow mb-4">
				<div
					class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h5 class="m-0 font-weight-bold text-primary">Details</h5>
				</div>
				<div class="card-body">
					<form id="form1">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Name</label>
									<div class="col-sm-8">
											<input type="text" id="name" name="name" data-type="man" data-alias="Name" class="form-control" maxlength="30" value="<?php echo $form->value("name"); ?>">
										<span class="error"><?php echo $form->error("name"); ?></span>
									</div>
							</div>
                          </div>
								
						 
							
							<div class="col-lg-6 col-md-12">
							
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Email</label>
									<div class="col-sm-8">
										<input type="text" id="email" name="email" data-type="man" data-alias="Email"  class="form-control" maxlength="30" value="<?php echo $form->value("email"); ?>">
										<span class="error"><?php echo $form->error("email"); ?></span>
									</div>
								</div>
							
							
								</div>
								<div class="col-lg-6 col-md-12">
							
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Mobile</label>
									<div class="col-sm-8">
										<input type="text" id="mobile_number" onkeypress="return isMobile(event,$(this),10)" name="mobile_number" data-type="man" data-alias="Mobile" class="form-control" maxlength="30" value="<?php echo $form->value("mobile_number"); ?>">
										<span class="error"><?php echo $form->error("mobile_number"); ?></span>
									</div>
								</div>
							
							
								</div>

								<div class="col-lg-6 col-md-12">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Gender</label>
									<div class="col-sm-2">Male</div>
									<div class="col-sm-2">
										<input type="radio" id="gender" name="gender" data-type="man" data-alias="Gender"  maxlength="30" value="male" <?php if($form->value("gender")=="male"){ echo 'checked';} ?>>
                                    </div>	
									<div class="col-sm-2">Female</div>
									<div class="col-sm-2">
										<input type="radio" id="gender" name="gender" data-type="man" data-alias="Gender"  maxlength="30" value="female" <?php if($form->value("gender")=="female"){ echo 'checked';} ?>>
										
                                    </div>		
									<div style="margin-left:190px"><span class="error"><?php echo $form->error("gender"); ?></span></div>
                                  </div>
								</div>
								<div class="col-lg-6 col-md-12">
							
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Password</label>
									<div class="col-sm-8">
										<input type="password" id="password" name="password" data-type="man" data-alias="Password" class="form-control" maxlength="30" value="<?php echo $form->value("password"); ?>">
										<span class="error"><?php echo $form->error("password"); ?></span>
									</div>
								</div>
							
							
								</div>
								<div class="col-lg-6 col-md-12">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">city</label>
									<div class="col-sm-8">
										<input type="text" id="city" name="city" data-type="man" data-alias="city" class="form-control" maxlength="30" value="<?php echo $form->value("city"); ?>">
										<span class="error"><?php echo $form->error("city"); ?></span>
									</div>
								</div>
							
							
								</div>
							
								<div class="card-body">
					<form id="form">
						<div class="row">
							<div class="col-lg-6 col-md-12">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Districts</label>
									<div class="col-sm-8">

								
									<?php
							          $data=$database->connection->query("SELECT * FROM global_districts");
							        ?>
									<select class="form-select form-control" data-type="man" data-alias="Districts"  id="district" name="district"> 
									
									       <option value="">select</option>
										   <?php
							                 while($row = $data->fetch(PDO::FETCH_ASSOC))
							                 {
							               ?>	
										   
											<option value="<?= $row['district']?>"<?php if($_REQUEST['district']==$row['district']){ echo 'selected';} ?>><?= $row['district']?></option>
											<?php
											 }
											?>
										</select>
										<span class="error"><?php echo $form->error("district"); ?></span>
									</div>
							</div>
						</div>
						<div class="form-group row">
									<label class="col-sm-4 col-form-label">Interests</label>
									<div class="col-sm-2">
										<input type="checkbox" name="lang" id="lang" value="c" <?php if($form->value("lang")=="c"){ echo 'checked';} ?> data-type="man" data-alias="Select Languages">&nbsp;&nbsp;c
									</div>
									<div class="col-sm-3">
										<input type="checkbox" name="lang" id="lang" value="python" <?php if($form->value("lang")=="python"){ echo 'checked';} ?> data-type="man" data-alias="Select Languages">&nbsp;&nbsp;Python
									</div>
									<div class="col-sm-2">
										<input type="checkbox" name="lang" id="lang" value="java" <?php if($form->value("lang")=="java"){ echo 'checked';} ?> data-type="man" data-alias="Select Languages">&nbsp;&nbsp;Java
									</div>
										
									<div style="margin-left:190px"><span class="error"><?php echo $form->error("lang"); ?></span></div>
									
								</div>
								
							
								</div>

								<div class="col-lg-6 col-md-12">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Option </label>
									<div class="col-sm-8">
									<select class="form-select form-control select2 " data-type="man" data-alias="option" id="option" name="option[]" multiple="multiple" multiselect-search="true"> 

									<option value="">select</option>
									<option value="Option 1"<?php if(in_array("Option 1",$_REQUEST['option'])){ echo 'selected' ;} ?> >Option 1</option>
									<option  value="Option 2"<?php if(in_array("Option 2",$_REQUEST['option'])){ echo 'selected' ;} ?> >Option 2</option>
									<option  value="Option 3"<?php if(in_array("Option 3",$_REQUEST['option'])){ echo 'selected' ;} ?> >Option 3</option>
									<option value="Option 4"<?php if(in_array("Option 4",$_REQUEST['option'])){ echo 'selected' ;} ?> >Option 4</option>
									<option value="Option 5"<?php if(in_array("Option 5",$_REQUEST['option'])){ echo 'selected' ;} ?> >Option 5</option>
									<option value="Option 6"<?php if(in_array("Option 6",$_REQUEST['option'])){ echo 'selected' ;} ?> >Option 6</option>
											</select>
											<span class="error"><?php echo $form->error("option"); ?></span>
											</div>
											</div>
								</div>
							<?php
								// $values = $_POST['option'];
								// foreach ($values as $a){
								// 	echo $a;
								// }
							?>
                               <!-- <div class="col-lg-6 col-md-12">
								<div class="form-group row">
									<label class="col-sm-4 col-form-label">Animal</label>
									<div class="col-sm-8">
										 <input class="custom-select" id="city1" name="city1" data-alias="city1"  list="brow"> 
										<input class="form-select form-control" id="searchbar" onkeyup="search_animal()" type="text" name="search" placeholder="Search animals.."> -->
										
								<!-- <datalist  id="brow"> -->
								<!-- <option value="Internet Explorer">
								<option value="Firefox">
								<option value="Chrome">
								<option value="Opera">
								<option value="Safari"> -->
								<!-- </datalist>  -->

								<!-- <ol id='list'>
								<li class="animals">Cat</li>
								<li class="animals">Dog</li>
								<li class="animals">Elephant</li>
								<li class="animals">Fish</li>
								<li class="animals">Gorilla</li>
								<li class="animals">Monkey</li>
								<li class="animals">Turtle</li>
								<li class="animals">Whale</li>
								<li class="animals">Aligator</li>
								<li class="animals">Donkey</li>
								<li class="animals">Horse</li>
   							    </ol> -->
      
    <!-- linking javascript -->
    <!-- <script src="./animals.js"></script>
										<span class="error"><?php echo $form->error("searchbar"); ?></span>
									</div>
								</div>
							
							
								</div> -->
							 


						<div class="form-group row">
							<div class="offset-sm-4 col-sm-8">

								<button class="btn btn-md btn-primary" type="button" onClick="setState('adminForm','<?php echo SECURE_PATH; ?>example2/process.php','validateForm=1'+sendData())">
									Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
}

if(isset($_REQUEST['validateForm']))
{
    $return_var='';
	$_REQUEST=$session->cleanInput($_REQUEST);
    
	unset($_REQUEST['validateForm']);
	foreach($_REQUEST as $key=>$value)
	{
		//print_r($value);
		
		$val=explode('~!@',$value);
		// echo $key;
		// exit();
		//echo $key."-".$val[0].",".$val[1].",".$val[2]."<br>";
		$value=$val[3];
		
		$form->setValue($key,$value);
		if($val[1]=="man")
		{

			if(strlen($value)==0)
			{
				if(in_array($val[0],array("text", "textarea", "number", "date", "checkbox", "datetime-local", "email", "month", "password", "radio", "tel", "time","file")))
				{
					$form->setError($key,$val[2]." Cannot not be empty");
				}
				elseif($val[0]=="select-one")
				{
					$form->setError($key," Please Select ".$val[2]);
				}
				
			}
		}

	if(!empty($form->value('email')))
	{
		if (!filter_var($form->value('email'), FILTER_VALIDATE_EMAIL))
		{	
			$form->setError( 'email'," invalid email ");
		}
	}

	if(!empty($form->value('mobile_number')))
	{
		if (!filter_var($form->value('mobile_number'), FILTER_SANITIZE_NUMBER_INT))
		{	
			$form->setError( 'mobile_number'," invalid Number ");
		}
		elseif(strlen($form->value('mobile_number'))>10)
		{
			$form->setError( 'mobile_number'," invalid Number ");
		}
		elseif(strlen($form->value('mobile_number'))<10)
		{

		}

	 }


					 
		$return_var.='&'.$key.'='.$value;

	}


	//print_r($form);
	//exit();

	if(empty($_REQUEST['gender']))
	{
		$form->setError('gender','Please Select Gender');
	}


	//Check if any errors exist
	if($form->num_errors > 0)
	{
		?>
		<script type="text/javascript">

		setState('adminForm','<?php echo SECURE_PATH;?>example2/process.php','addForm=1<?php echo $return_var; ?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$post['editform'];}?>');

		</script>
		<?php
	}
	else
	{
		
		$ins=$database->connection->prepare("INSERT INTO example2 VALUES (NULL,:name,:email,:create_date,:mobile_number,:password,:gender,:city,:district,:lang,:option)");
         $ins->execute(array(
	    'name' => $form->value('name'),  
	    'email'     => $form->value('email'),
	    'create_date'   => date('Y-m-d H:i:s'),
		'mobile_number' => $form->value('mobile_number'),  
		'password' => $form->value('password'),  
		'gender' => $form->value('gender'),
		'city' => $form->value('city'),
		'district' => $form->value('district'),
		'lang' => $form->value('lang'),
		'option'=>$_REQUEST['option'],
        
	));
	?>
	<script type="text/javascript">
          alert('Data Insert Successfully');
		setState('adminForm','<?php echo SECURE_PATH;?>example2/process.php','addForm=1<?php echo $return_var; ?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$post['editform'];}?>');
		setState('adminTable','<?php echo SECURE_PATH;?>example2/process.php','tableDisplay=1<?php echo $return_var; ?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$post['editform'];}?>');

 		</script>
	<?php
	}
}



?>
<?php
  if(isset($_REQUEST['tableDisplay']))
  {
	  ?>
	  <div class="mt-4">
	  <h3>Reports</h3>
	  <table class="table mt-4">
	  <thead>

<tr>
	<th>S.NO</th>
	<th>NAME</th>
	<th>EMAIL</th> 
	<th>MOBILE</th>
	<th>GENDER</th>
	<th>DATE</th>
	<th>CITY</th>
	<th>DISTRICT</th>
	<th>LANGUAGE</th>
	<th>OPTION</th>

</tr>
<tbody>
	<?php
	  $sel=$database->connection->query("select * from example2");
	  $i=1;
	  while($row = $sel->fetch(PDO::FETCH_ASSOC)){
	?>
	<tr>
		<td><?php echo $i?></td>
		<td><?php echo $row['name']?></td>
		<td><?php echo $row['email']?></td>
		<td><?php echo $row['mobile_number']?></td>
        <td><?php echo $row['gender']?></td>
		<td><?php echo $row['create_date']?></td>
		<td><?php echo $row['city']?></td>
		<td><?php echo $row['district']?></td>
		<td><?php echo $row['lang']?></td>
		<!-- <td><?php //echo $a?></td> -->
		<td><?php echo $row['option']?></td>
	</tr>
	<?php
	$i++;
	  }
	?>
</tbody>
</table>
</div>
</thead>
	  <?php
  }
?>
<script>
	$(document).ready(function() {
    $('.option').select2();
});
</script>

