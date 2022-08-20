

<?php

ini_set("display_errors","on");error_reporting(E_ALL);

include('../include/session.php');

$session->checkUserAccess("facility1");

if(isset($_REQUEST['addForm']))
{
	//print_r($form->errors);
	?>
	         
         <link rel="stylesheet" type="text/css" href="<?php echo SECURE_PATH ;?>theme/js/upload/fileuploader.css">
	
	<script type="text/javascript">
var tableToExcel = (function() {
	
var uri = 'data:application/vnd.ms-excel;base64,'
  , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
  , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
  , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name)
{
	
  if (!table.nodeType) table = document.getElementById(table)
  var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
  window.location.href = uri + base64(format(template, ctx))
}

})()

</script>

          
	<div class="row">
		<div class="col-xl-12 col-lg-12">
			<div class="card border-0 shadow mb-4">
				<div
					class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h4 class="m-0 font-weight-bold text-primary">Facility</h4>
				</div>
				<div class="card-body">
					<form id="form">
					   <div class="row">
					   <div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">Districts</label>
								<div class="col-sm-12">
								<?php
							          $data=$database->connection->query("SELECT district FROM global_districts ORDER BY district ASC;");
							        ?>
								<select class="custom-select" data-type="man" data-alias="Districts"  id="district" name="district" >
									       <option value="">select</option>
										   <?php
							                 while($row = $data->fetch(PDO::FETCH_ASSOC))
							                 {
							               ?>	
										   
											<option value="<?= $row['notation']?>"<?php if($_REQUEST['district']==$row['notation']){ echo 'selected';} ?>><?= $row['district']?></option>
											<?php
											 }
											?>
										</select>
										<span class="error"><?php echo $form->error("district"); ?></span>
								</div>
                            </div>
                         </div>	
						 <div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">facility type</label>
								<div class="col-sm-12">
								<select class="custom-select" data-type="man" data-alias="facility" onChange="setState('facility_name','<?php echo SECURE_PATH; ?>facility1/process.php','add_facility=1&facility='+$('#facility').val()+'&district='+$('#district').val())" id="facility" name="facility" >
										<option value="" selected>select</option>
										<?php 
										     //print_r($_REQUEST['district']);
										
   
												$data1=$database->connection->query("SELECT DISTINCT facility_id,facility_type FROM mss_facility_name");
												//echo "SELECT DISTINCT facility_id,facility_type FROM mss_facility_name";
											
											?>
											
											<?php
											while($row1 = $data1->fetch(PDO::FETCH_ASSOC)){
												
												?>
												
					    					<option value="<?= $row1['facility_id']?>" <?php if($_REQUEST['facility']==$row1['facility_id']){ echo 'selected';} ?>><?= $row1['facility_type']?></option> 
													<?php
												}
											
											
											?>

									</select>
										<span class="error"><?php echo $form->error("facility"); ?></span>	</div>
                            </div>
                         </div>	
						
						 <div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">facility name</label>
								<div class="col-sm-12">
								<select class="custom-select" data-type="man" data-alias="facility name"  id="facility_name" name="facility_name" >
										<option value="" selected>select</option>
									 
                                        <?php 
										if(isset($_REQUEST['facility']))
										{
											
											$data2=$database->connection->query("SELECT * FROM mss_facility_name where district_uid='".$_REQUEST['district']."' and facility_id='".$_REQUEST['facility']."'");
										?>
									
										<option value="">Select</option>
										<?php
										while($row2 = $data2->fetch(PDO::FETCH_ASSOC)){
											
											?>
											
											<option value="<?= $row2['facility_code']?>"<?php if($_REQUEST['facility_name']==$row2['facility_code']){ echo 'selected';} ?>><?= $row2['facility_name']?></option>
												<?php
											}
										}
	  
	                               ?>
									</select>
										<span class="error"><?php echo $form->error("facility_name"); ?></span>	</div>
                            </div>
                         </div>	
                     
						 <div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">Rch Id</label>
								<div class="col-sm-12">
								<input type="number" id="rch_id" name="rch_id" data-type="man" onkeypress="return isNumber(event,$(this),12)" data-alias="rch_id" class="form-control" maxlength="" value="<?php echo $form->value("rch_id"); ?>">
									<span class="error"><?php echo $form->error("rch_id"); ?></span>
                            </div>
                         </div>	
						
						</div> 
						<div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">Name</label>
								<div class="col-sm-12">
								<input type="text" id="name" name="name" data-type="man" data-alias="Name" class="form-control" maxlength="30" value="<?php echo $form->value("name"); ?>">
										<span class="error"><?php echo $form->error("name"); ?></span>
                            </div>
						</div>
						</div>
						<div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">Husband Name</label>
								<div class="col-sm-12">
								<input type="text" id="hname" name="hname" data-type="man" data-alias="Name" class="form-control" maxlength="30" value="<?php echo $form->value("hname"); ?>">
										<span class="error"><?php echo $form->error("hname"); ?></span>
                            </div>
                         </div>	
						
						</div> 
						<div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">Mobile Number</label>
								<div class="col-sm-12">
								<input type="number" id="mobile_number" name="mobile_number" data-type="man" onkeypress="return isMobile(event,$(this),10)"  data-alias="Mobile" class="form-control" maxlength="30" value="<?php echo $form->value("mobile_number"); ?>">
										<span class="error"><?php echo $form->error("mobile_number"); ?></span>
                            </div>
                         </div>	
						 
						</div> 
						<div class="col-lg-3 col-md-12">
						    <div class="form-group row">
							  <label class="col-sm-12 col-form-label">Date</label>
								<div class="col-sm-12">
								<input type="date" id="date" onpaste="return false" oncopy="return false" oncut="return false" name="date" value="<?php echo $form->value("date"); ?>" data-type="man" data-alias="date" class="form-control">
										<span class="error"><?php echo $form->error("date"); ?></span>
                            </div>
                         </div>	
						 <script type="text/javascript">
								$(document).ready(function(){
									//$(function() {
									$( "#date1" ).datepicker({
										format : 'dd/mm/yyyy',
										autoclose: true,
										todayHighliht: true,
										showOtherMonths : true,
										selectOtherMonths:true,
										autoclose:true,
										changeMonth:true,
										changeYear:true,
										maxDate:new Date()
									});
								
								});
                            </script>
						</div> 
                         </div>	
						 <div class="form-group row mt-4 text-center">
							<div class="col-md-12">
								<button class="btn btn-md btn-success" type="button" onClick="setState('adminForm','<?php echo SECURE_PATH; ?>facility1/process.php','validateForm=1'+sendData())">
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
	
	//echo $form->value('panchayat')."hiii";
	//exit;
	$return_var='';
	$_REQUEST=$session->cleanInput($_REQUEST);
                                     
	unset($_REQUEST['validateForm']);
	foreach($_REQUEST as $key=>$value)
	{
		
		$val=explode('~!@',$value);
		//echo $key;
		
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
           $return_var.='&'.$key.'='.$value;
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
			$form->setError( 'mobile_number'," invalid Number ");
		}

	  }
	
    $rch = substr($form->value('rch_id'),0,4);

	if($rch !=1280)
	{
		$form->setError('rch_id','Please Enter correct');
	}
	if(strlen($form->value('rch_id'))< 12)
	{
		$form->setError('rch_id','Please Enter correct length');
	}
	  
	if($form->num_errors > 0 || $post['validateForm'] == 2)
	{
		
		
		?>
		<script type="text/javascript">

		setState('adminForm','<?php echo SECURE_PATH;?>facility1/process.php','addForm=1<?php echo $return_var; ?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$post['editform'];}?>');

		</script>
		<?php
	}
	else
	{
			
		
	
		$ins=$database->connection->prepare("INSERT INTO facility1 VALUES (NULL,:district,:facility_type,:facility_name,:rch_id,:uname,:husband_name,:mobile_number,:create_date)");
        $ins->execute(array(
		'district' => $form->value('district'),
	   'facility_type' => $form->value('facility'),  
	   'facility_name'   => $form->value('facility_name'),
	   'rch_id'   => $form->value('rch_id'),
	   'uname'   => $form->value('name'),
	   'husband_name'   => $form->value('hname'),
	   'mobile_number'   => $form->value('mobile_number'),
	   'create_date'  =>  $form->value('date'),
	
       
	));
	
	?>
	<script type="text/javascript">
         alert('Data Insert Successfully');
		setState('adminForm','<?php echo SECURE_PATH;?>facility1/process.php','addForm=1<?php echo $return_var; ?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$post['editform'];}?>');
		setState('adminTable','<?php echo SECURE_PATH;?>facility1/process.php','tableDisplay=1<?php echo $return_var; ?><?php if(isset($_REQUEST['editform'])){ echo '&editform='.$post['editform'];}?>');

		</script>
	<?php
	}
}
?>


 	<?php 
	 if(isset($_REQUEST['add_facility']))
	 {
		 
		  $data2=$database->connection->query("SELECT * FROM mss_facility_name where district_uid='".$_REQUEST['district']."' and facility_id='".$_REQUEST['facility']."'");
	  ?>
  
	 <option value="">Select</option>
	  <?php
	  while($row2 = $data2->fetch(PDO::FETCH_ASSOC)){
		  
		  ?>
		  
		  <option value="<?= $row2['facility_code']?>"<?php if($_REQUEST['facility_name']==$row2['facility_code']){ echo 'selected';} ?>><?= $row2['facility_name']?></option>
			  <?php
		  }
	 }
	  
	  ?>
	  <?php
   if(isset($_REQUEST['tableDisplay'])){
	$start = 0;  //if no page var is given, set start to 0
	$page=0;$limit=10;
	if(isset($_REQUEST['page']))
    {
		
        $start = ($_REQUEST['page'] - 1) * $limit;     //first item to display on this page
        $page=$_REQUEST['page'];
    }
	$tableName = 'facility1';
	$select_fields="*";
	$conditions= " order by id ASC";
	$post_vars=array();
	$q = "SELECT $select_fields FROM $tableName ".$conditions;
	$_SESSION['pagination_q']=$q;
    // echo $_SESSION['pagination_q'];exit;
	$result_sel = $database->connection->query($q);
	$numres = $result_sel->rowCount();
    
	$query = $_SESSION['pagination_q']." LIMIT $start,$limit ";
	$data_sel = $database->connection->query($query);

	$_SESSION['query'] = $query;
	$pagename=SECURE_PATH.'facility1/process.php';
	$method="tableDisplay"; 
	$pagination=showPagination(SECURE_PATH."facility1/process.php?tableDisplay=1&",$tableName,$start,$limit,$page,$conditions);
	
	if(($start+$limit) > $numres){
        $onpage = $numres;
    }
    else{
        $onpage = $start+$limit;
    }
?>

	  <div class="row">
	<div class="col-xl-12 col-lg-12">
		<div class="card border-0 shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h5 class="m-0 font-weight-bold text-primary">Facility Details</h5>
				
	  </div>
			<div class="card-body">
			<div>
		 <input type="button" class="btn btn-sm btn-success pull-right" onclick="tableToExcel('dataTable', 'facility_report')" value="Download Excel">
                </div>
		      <div style="text-align:center"> <?php echo $pagination ;?></div>
		        <table class="table table-condensed table-bordered" id="dataTable">
					<thead class="bg-primary">
	  
	
	  
<tr>
	<th>S.NO</th>
	<th>DISTRICT</th>
	<th>FACILITY TYPE</th> 
	<th>FACILITY NAME</th>
	<th>RCH ID</th>
	<th>NAME</th>
	<th>HUSBAND NAME</th>
	<th>MOBILE NUMBER</th>
	<th>DATE</th>
</tr>

<?php
						      if(isset($_REQUEST['page']))
							  {
								  if($_REQUEST['page']==1)
									  $i=1;
								  else
									  $i=(($_REQUEST['page']-1)*50)+1;
							  }
							  else
									$i=1;
							$n=$start+1;
						     	while($row = $data_sel->fetch(PDO::FETCH_ASSOC))
								 {  
								
									
						   ?>
<tbody>
	
	<tr>
		<td><?php echo $n?></td>
		<td><?php echo $row['district']?></td>
		<td><?php echo $row['facility_type']?></td>
		<td><?php echo $row['facility_name']?></td>
        <td><?php echo $row['rch_id']?></td>
		<td><?php echo $row['uname']?></td>
		<td><?php echo $row['husband_name']?></td>
		<td><?php echo $row['mobile_number']?></td>
		<td><?php echo $row['create_date']?></td>
	</tr>

	                 <?php
					   $n++;
						} 
					  ?>

</tbody>
</table>
</div></div>
</div>
</thead>
	  <?php
  }
?>

<?php
  function showPagination($pagename,$tbl_name,$start,$limit,$page,$condition)
  {
	  global $database;

	  // How many adjacent pages should be shown on each side?
	  $adjacents = 3;

	  /*
	  First get total number of rows in data table.
	  If you have a WHERE clause in your query, make sure you mirror it here.
	  */
	  //echo "SELECT COUNT(*) as num FROM $tbl_name $condition ";
	  $query = "SELECT COUNT(*) as num FROM $tbl_name $condition ";

	  //echo $query;

	  $tpq = $database->query($query);
	  $tp=$tpq->fetch(PDO::FETCH_ASSOC);
	  //        echo $total_pages['num'].',';
	  $total_pages = $tp['num'];




	  /* Setup vars for query. */
	  $targetpage = $pagename;     //your file name  (the name of this file)
	  //how many items to show per page




	  /* Setup page vars for display. */
	  if ($page == 0) $page = 1;                    //if no page var is given, default to 1.
	  $prev = $page - 1;                            //previous page is page - 1
	  $next = $page + 1;                            //next page is page + 1
	  $lastpage = ceil($total_pages/$limit);        //lastpage is = total pages / items per page, rounded up.
	  $lpm1 = $lastpage - 1;                        //last page minus 1



	  /*
	  Now we apply our rules and draw the pagination object.
	  We're actually saving the code to a variable in case we want to draw it more than once.
	  */
	  $pagination = "";
	  if($lastpage > 1)
	  {

	  $pagination .= "<ul class=\"pagination\">";
	  //previous button
	  if ($page > 1)
	  {

		  $pagination.= " <li class=\"page-item\">
		  <a class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$prev."')\">Previous</a></li>";

	  }
	  else
	  {
		  $pagination.= "<li class=\"page-item disabled\">
		  <a class=\"page-link\">Previous</a></li>";
	  }
	  //pages
	  if ($lastpage < 7 + ($adjacents * 2))    //not enough pages to bother breaking it up
	  {
		  for ($counter = 1; $counter <= $lastpage; $counter++)
		  {
			  if ($counter == $page)
				  $pagination.= "<li class=\"page-item active\"><a class=\"page-link\" >$counter <span class=\"sr-only\">(current)</span></a></li>";
			  else
				  $pagination.= "<li class=\"page-item \"><a class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$counter."')\">$counter</a></li>";
		  }
	  }
	  elseif($lastpage > 5 + ($adjacents * 2))    //enough pages to hide some
	  {
		  //close to beginning; only hide later pages
		  if($page < 1 + ($adjacents * 2))
		  {
			  for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
			  {
				  if ($counter == $page)
					  $pagination.= "<li class=\"page-item active\"><a class=\"page-link\" >$counter <span class=\"sr-only\">(current)</span></a></li>";
				  else
					  $pagination.= "<li class=\"page-item \"><a class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$counter."')\">$counter</a></li>";
			  }
			  $pagination.= "...";
			  $pagination.= "<li class=\"page-item \"><a class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$lpm1."')\">$lpm1</a></li>";
			  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$lastpage."')\">$lastpage</a></li>";
		  }
		  //in middle; hide some front and some back
		  elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
		  {
			  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\"  onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=1')\">1</a></li>";
			  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=2')\">2</a></li>";
			  $pagination.= "...";
			  for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
			  {
				  if ($counter == $page)
					  $pagination.= "<li class=\"page-item active\"><a class=\"page-link\" >$counter <span class=\"sr-only\">(current)</span></a></li>";
				  else
					  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$counter."')\">$counter</a></li>";
			  }
			  $pagination.= "...";
			  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\">$lpm1</a></li>";
			  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$lastpage."')\">$lastpage</a></li>";
		  }
		  //close to end; only hide early pages
		  else
		  {
			  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\" onclick=\"setStateGet('adminTable','".$targetpage."','page=1')\">1</a></li>";
			  $pagination.= "<li class=\"page-item \"><a  class=\"page-link\"  onclick=\"setStateGet('adminTable','".$targetpage."','page=2')\">2</a></li>";
			  $pagination.= "...";
			  for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
			  {
				  if ($counter == $page)
					  $pagination.= "<li class=\"page-item active\"><a class=\"page-link\" >$counter <span class=\"sr-only\">(current)</span></a></li>";
				  else
					  $pagination.= "<li class=\"page-item active\"><a class=\"page-link\"  onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$counter."')\">$counter</a></li>";
			  }
		  }
		  }

	  //next button
	  if ($page < $counter - 1)
		  $pagination.= "<li class=\"page-item active\"><a class=\"page-link\"  onclick=\"setStateGet('adminTable','".$targetpage."','tableDisplay=1&page=".$next."')\">Next</a></li>";
	  else
		  $pagination.= "<li class=\"page-item disabled\">
		  <a class=\"page-link\">Next</a></li>";
		  $pagination.= "</ul>\n";
	  }


	  return $pagination;


}

?>
<link href="http://code.jquery.com/ui/1.9.2/themes/smoothness/jquery-ui.css" rel="stylesheet" />

<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>


