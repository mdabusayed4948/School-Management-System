
<h2 class='styl boxshadow'><span class='style boxshadow'>Edit Book   </span></h2>

<?php
	if(isset($_POST['txtBookId'])){
	    $book_id = $_POST['txtBookId'];	
	$exam_table = $db->query("select id,name,author, publisher,description  from say_book  where id='$book_id '");
	list($book_id,$bname,$aname,$pname,$desc)=$exam_table->fetch_row();
	}
	
if(isset($_POST['btnSave'])){
	$book_id            = $_POST['txtBookId'];	
                      $bname       = validate($_POST["txtBook"]);
                        $aname        = validate($_POST["txtAuthor"]);
                        $pname       = validate($_POST["txtPublisher"]);
                        $desc          = validate($_POST["txtDesc"]);
                
	
        
	$db->query("update say_book set name='$bname', author='$aname',publisher='$pname',description='$desc' where id='$book_id'");
                       
	echo "<div class='alert alert-success' role='alert'><strong> Successfully  Edit!</strong></div>";
                    
}  

 function validate($data){
$data=trim($data);
$data=stripcslashes($data);
$data=htmlspecialchars($data);
return $data;
}

?>
<div   style='margin-left:10px; ' class="btn btn-default"><span class=' boxshadow '><a href='home.php?item=21'  style='font-weight:bold; color:#5A5A5A; text-decoration:none; margin: 5px'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Return</a></span></div>
<form action="home.php?item=19" method="post" style="margin-top:30px;" class="form-horizontal" >
    
 
    <div class="form-group">
  <label class="control-label col-sm-2">Book ID:</label>
  <div class="col-sm-5">
  
            <select class="selectpicker form-control" data-show-subtext="true" data-live-search="true" name="txtBookId"  value="<?php echo isset($book_id)?$book_id:""?>"  >
     
                        <?php
                        $table = $db->query("select id,name from say_book");
	while(list($id,$name)=$table->fetch_row()){
					
                       	 if($book_id==$id){
                     echo "<option value='$id' selected>Id=$id || $name</option>";	
	 }else{
	echo "<option value='$id'>Id=$id || $name</option>"; 
	 }
	}
	?>
                    </select>
      <span class="boxshadow">
            <button type="submit" name="btnSubmit" class="btn btn-default"><i class='glyphicon glyphicon-search'></i></button>      
      </span>
 
  </div>
 </div>
    
 
        <div class="form-group">
  <label class="control-label col-sm-2">Book Name:</label>
  <div class="col-sm-5">
         <input type="text"  name="txtBook"  value="<?php echo isset($bname)?$bname:" "?>"   class="form-control" />  
      
  </div>
 </div>
        <div class="form-group">
  <label class="control-label col-sm-2">Author Name :</label>
  <div class="col-sm-5">
<input type="text"  name="txtAuthor"  value="<?php echo isset($aname)?$aname:" "?>"   class="form-control" />  
 
  </div>
 </div>
     <div class="form-group">
  <label class="control-label col-sm-2">Publisher :</label>
  <div class="col-sm-5">
      <input type="text"  name="txtPublisher"  value="<?php echo isset($pname)?$pname:" "?>"   class="form-control" />  
      
 
  </div>
 </div>

   
 <div class="form-group">
  <label class="control-label col-sm-2">Description :</label>
  <div class="col-sm-5">
      <textarea name="txtDesc" placeholder="Description" cols="20" rows="4" class="form-control" required=""><?php echo isset($desc)?$desc:" "?></textarea>
   
  </div>
 </div>  
    
   
 <div class="form-group">
  <div class="col-sm-offset-2 col-sm-5">
      <input type="submit" value="Save Change" name="btnSave" class="btn btn-primary  " />
 
  </div>
 </div>
	
</form>




