<link href="css/style.css" rel="stylesheet" type="text/css"/>

<form action="home.php?item=22" method="post">
<h2 class='styl boxshadow'><span class='style boxshadow'>Welcome to Dashboard</span></h2>

<div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
		          
        <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/user.jpg" />&nbsp;<span class="boxshadow" >  Total User
        = <?php 
		 $user_table = $db->query("select count(*) from user");
		 while(list($user)=$user_table->fetch_row()){
		
        	echo$user;
		
			
		 }
          ?>
      
         </span>
                </h3>
            </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">User Name</th>
               <th style="text-align: center">E-mail</th>
              <th style="text-align: center">Mobile</th>   
        </tr> 
        </thead>
          <?php 
//$user_table=$db->query("select u.id,r.name,u.username,u.password from user as u, role as r where r.id=u.role_id limit 3");
$user_table = $db->query("select u.id,r.name,u.username,u.gender,u.email,u.address,u.mobile,u.join_date,u.password from user as u, role as r where r.id=u.role_id limit 3");
 while(list($id,$role,$username,$gender,$mail,$address,$mobile,$join,$password)=$user_table->fetch_row()):?>
			
			

          
            
        <tbody>
            
            <tr>
             <td><?php echo $username?></td>
             <td><?php echo $mail?></td>
             <td><?php echo $mobile?></td>
            </tr>
              
        <?php endwhile ?>
           
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="home.php?item=12" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/user.jpg" />&nbsp;<span class="boxshadow" >  Total Teacher
        =<?php 
		 $teacher_table = $db->query("select count(*) from tbl_teacher");
		 while(list($user)=$teacher_table->fetch_row()){
		
        	echo$user;
		
			
		 }
          ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Role Name</th>
               <th style="text-align: center">User Name</th>
               
        </tr> 
        </thead>
          
            
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
            </tr>
              
          
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="" />&nbsp;<span class="boxshadow" >  Total Student
        =
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Role Name</th>
               <th style="text-align: center">User Name</th>
               
        </tr> 
        </thead>
          
            
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
            </tr>
              
          
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>
 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="3" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="images/parents-icon.png" />&nbsp;<span class="boxshadow" >  Total parents
        =<?php 
		 $user_table = $db->query("select count(*) from parents");
		 while(list($user)=$user_table->fetch_row()){
		
        	echo$user;
		
			
		 }
          ?>
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center"> Name</th>
               <th style="text-align: center">Email</th>
               <th style="text-align: center">Phone</th>
        </tr> 
        </thead>
          <?php 
  $parents_table=$db->query("select p.id,s.father_name,s.address,p.email,p.phone,p.profession from parents as p, student as s where s.id=p.student_id  limit 3");
 while(list($id,$f_name,$address,$mail,$phone,$profession)=$parents_table->fetch_row()):?>        
            
        <tbody>
            
            <tr>
                <td><?php echo $f_name?></td>
               <td><?php echo $mail?></td>
               <td><?php echo $phone?></td>
            </tr>
              
          
      <?php endwhile ?>         
        </tbody>
        
          
          <tr>
              <td colspan="3" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>
 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="" />&nbsp;<span class="boxshadow" >  Total Class
        =
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Role Name</th>
               <th style="text-align: center">User Name</th>
               
        </tr> 
        </thead>
          
            
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
            </tr>
              
          
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>
 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="" />&nbsp;<span class="boxshadow" >  Total Section
        =
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Role Name</th>
               <th style="text-align: center">User Name</th>
               
        </tr> 
        </thead>
          
            
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
            </tr>
              
          
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="" />&nbsp;<span class="boxshadow" >  Total Session
        =
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Role Name</th>
               <th style="text-align: center">User Name</th>
               
        </tr> 
        </thead>
          
            
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
            </tr>
              
          
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="" />&nbsp;<span class="boxshadow" >  Total User
        =
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Role Name</th>
               <th style="text-align: center">User Name</th>
               
        </tr> 
        </thead>
          
            
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
            </tr>
              
          
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>

 <div class='col-sm-4'>
       
               <div class="sttbl boxshadow">
           <table class="table table-bordered table-hover">
        <thead>
               
          <tr>
      
        <th  colspan="2" style="background-color: #F5F5F6"> <a  href="" style="text-decoration: none"> <h3 style="text-align: center; padding: 0px; margin: 0px"><img src="" />&nbsp;<span class="boxshadow" >  Total User
        =
                    </span>
                            </h3>
                        </a>	

        </th>
               
        </tr> 
       

        <tr >
              <th style="text-align: center">Role Name</th>
               <th style="text-align: center">User Name</th>
               
        </tr> 
        </thead>
          
            
        <tbody>
            
            <tr>
                <td></td>
                <td></td>
            </tr>
              
          
           
        </tbody>
        
          
          <tr>
              <td colspan="2" style="background-color: #F5F5F6"></td>
               
            </tr>
    </table>
		
</div>
</div>
         



	

	  
</form>
