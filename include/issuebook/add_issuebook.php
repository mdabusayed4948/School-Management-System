<h2 class='styl boxshadow'><span class='style boxshadow'>Add IssueBook </span></h2>
  <?php
  
 date_default_timezone_set("Asia/Dhaka");	
 $cur_date = date('Y-m-d');
     $cur_date =date("d M Y",strtotime( $cur_date ));
     ?>
<?php

 if(isset($_POST["btnSave"])){
	 
	// $db=new mysqli("localhost","root","","lms");
	 
	
 
 if(isset($_SESSION["cart"])){
		
 $len=count($_SESSION["cart"]);
		  
foreach($_SESSION["cart"] as $row){
				
$member_id=$row["member_id"];
$book_id=$row["book_id"];
$return_date=$row["return_date"];
$remark=$row["remark"];

				
 $db->query("insert into say_issue_book(book_id,member_id,return_date,remark, issue_date)values('$book_id','$member_id','$return_date','$remark',now()+ INTERVAL 11 HOUR)");
				
}
	  
  echo "<div class='alert alert-success' role='alert'><strong> Successfully Created!</strong></div>";
	}
 
 }
 


 if(isset($_POST["btnUpdate"])){
	 
 $book_id=$_POST["txtBookId"];
 $date=$_POST["txtDate"];
	  
 if(isset($_SESSION["cart"])){
		
 $len=count($_SESSION["cart"]);
		  
for($i=0;$i<$len;$i++){
				
 if($book_id==$_SESSION["cart"][$i]["book_id"]){
					  
$_SESSION["cart"][$i]["issue_date"]=$date;
 }
				
}
	  
}
	 
	 
 }
?>

<?php
if(isset($_POST["btnDelete"])){
    $book_id = $_POST["txtBookId"];
    if(isset($_SESSION["cart"])){
        $len = count($_SESSION["cart"]);
        for($i=0;$i<$len;$i++){
            if($book_id==$_SESSION["cart"][$i]["book_id"]){
                unset($_SESSION["cart"][$i]);
            }
        }
        		$_SESSION["cart"]=array_values($_SESSION["cart"]);
    }
}
?>

<?php
   if(isset($_POST["btnClear"])){
	 
	 if(isset($_SESSION["cart"])){
	  unset($_SESSION["cart"]);	
	 }
	
	}
?>

<?php
if(isset($_POST["btnAdd"])){
      $member_id =  $_POST["cmbMname"];
      $book_id =  $_POST["txtBookId"];
       $return_date =  $_POST["txtDate"];
     $remark =  $_POST["txtRemark"];
    
      $member_table = $db->query("select name from say_member where id='$member_id' ");
     list($member_name)=$member_table->fetch_row();
     
     $book_table = $db->query("select name from say_book where id='$book_id' ");
     list($book_name)=$book_table->fetch_row();
     
    if(isset($_SESSION["cart"])){
        
        $len = count($_SESSION["cart"]);
        
         $_SESSION["cart"][$len]["member_id"] = $member_id ;
         $_SESSION["cart"][$len]["member_name"] = $member_name ;
         $_SESSION["cart"][$len]["book_id"] = $book_id ;
          $_SESSION["cart"][$len]["book_name"] = $book_name ;
          $_SESSION["cart"][$len]["return_date"] = $return_date ;
          $_SESSION["cart"][$len]["remark"] = $remark ;
    
    }else{
          $_SESSION["cart"] = array();
          $_SESSION["cart"][0]["member_id"] = $member_id ;
         $_SESSION["cart"][0]["member_name"] = $member_name ;
         $_SESSION["cart"][0]["book_id"] = $book_id ;
          $_SESSION["cart"][0]["book_name"] = $book_name ;
          $_SESSION["cart"][0]["return_date"] = $return_date ;
          $_SESSION["cart"][0]["remark"] = $remark ;
    }
     
}

?>


<form action="home.php?item=79" method="post" style="margin-top:30px;" class="form-horizontal" >
  
    <div class="well text-center" style="font-size: 20px">
             <strong>Date:</strong><?php echo $cur_date;?>
       </div>
 
    
 <div class="form-group">
  <label class="control-label col-sm-2">Member Name :</label>
  <div class="col-sm-5">
       <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="cmbMname"  value="<?php echo isset($mname)?$mname:""?>" >
              
                    		<option >--Select--</option>
                        <?php
                        $exam_table = $db->query("select id,name,email,phone from say_member");
	while(list($id,$name,$mail,$phone)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>$id || $name || $mail || $phone</option>";
	}
	?>
                      </select>
   
  </div>
 </div> 
    
    
     <div class="form-group">
  <label class="control-label col-sm-2">Book Name   :</label>
  <div class="col-sm-5">
             <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtBookId"  value="<?php echo isset($tid)?$tid:""?>" >
              
                    		<option >--Select--</option>
                        <?php
                        $exam_table = $db->query("select id,name,author,publisher from say_book");
	while(list($id,$name,$author,$publisher)=$exam_table->fetch_row()){
					
                        echo "<option value='$id'>(i)$id ||(n) $name || (a)$author || (p)$publisher </option>";
	}
	?>
                      </select>
   
  </div>
 </div> 
   <div class="form-group">
  <label class="control-label col-sm-2">Retarn Date :</label>
  <div class="col-sm-5">
      <div  class='input-group date'>
          <span class="input-group-addon" >
                        <span class="glyphicon glyphicon-calendar" ></span>
                    </span>
                    <input type='text' class="form-control" id="Date" name="txtDate"  placeholder="yyyy-mm-dd" />
                    
                </div>
  </div>
 </div> 
  <div class="form-group">
  <label class="control-label col-sm-2">Remark :</label>
  <div class="col-sm-5">
      <textarea name="txtRemark" placeholder="Remark" cols="20" rows="4" class="form-control" value="<?php echo isset($desc)?$desc:"" ?>" ></textarea>
   
  </div>
 </div>      
   <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
  <input type="submit" name="btnAdd" value="Add" class="btn btn-primary  " />
 <input type="submit" name="btnClear" value="Refresh"  class="btn btn-success"/> 
    <input type="submit" name="btnSave" value="Save" class="btn btn-info"  />
  </div>
 </div>     
	
</form>
<table class="table table-bordered table-hover">
    <?php
if(isset($_SESSION["cart"])){ ?>


    <thead>
        <tr>
            <th>#S.L</th>   
            <th>Book Name</th>  
            <th>Member Name</th>  
            <th>Return Date</th> 
            <th>Remark</th>
              <th>Options</th>
        </tr>
    </thead>

    
    <?php
    $i=1;
    foreach($_SESSION["cart"] as $row){?>
    <tbody>
        <tr>
            <td>
                <?php echo $i++;?>
            </td>
                 <td>
                <?php echo $row["book_name"];?>
            </td>
             <td>
                <?php echo $row["member_name"];?>
            </td>
              <td>
                        <?php 
                          date_default_timezone_set("Asia/Dhaka");	
                            $rerurn_date = date('Y-m-d');
                           $rerurn_date =date("d M Y",strtotime( $row["return_date"] ));
  
                        echo $rerurn_date;
                        
                        ?>
              
             
            </td>
            <td>
                <?php echo $row["remark"];?>
            </td>
               <td>
               			 
	<div class="btn-group">
               
       <button type="button" class="label label-default btn-sm dropdown-toggle" data-toggle="dropdown">
        Action <span class="caret"></span></button>
          <ul class="dropdown-menu dropdown-default pull-right" >
             <div style="margin: 2px">
     
             </div>
           <div style="margin-left: 45px; margin-top: 3px">
  <li> 
        <form action='home.php?item=79' method='post' onSubmit="return confirm('Are you sure Delete this record?');" >
                <input type='hidden' value='<?php echo $row['book_id'];?>' name='txtBookId'/>&nbsp;&nbsp;
                    <span class="boxshadow"> 
                        <button type="submit"  name='btnDelete' class="btn btn-default" ><i class='glyphicon glyphicon-trash'></i></button>      
                    </span>
</form>	
                                 
 </li>
            </div>
  </ul>
                  
      </div>
            </td>
        </tr>
    </tbody>   
  
   
    


<?php    }}?>

</table>


