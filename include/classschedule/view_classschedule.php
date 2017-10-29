<h2 class='styl boxshadow'><span class='style boxshadow'> View Class Shedule</span></h2>

  <div class="container">   
    <div class="row">
        <div class="col-md-12 ">
            <!-- Nav tabs category -->
        
    
            <!-- Tab panes -->
            <div class="tab-content faq-cat-content">
                <div class="tab-pane active in fade" id="faq-cat-1">
                    <div class="panel-group" id="accordion-cat-1">
                      <?php
  $cs_table=$db->query("select cs.id,c.id,c.class_name,cs.photo from say_classschedule as cs, sayclass as c where c.id=cs.class_id");

 
  while(list($csid,$cid,$cname,$photo)=$cs_table->fetch_row()){?>
 
                        <div class="panel panel-default panel-faq">
                            <div class="panel-heading">
                                <a data-toggle="collapse" data-parent="#accordion-cat-1" href="#faq-cat-1-sub-<?php echo $cid;?>">
                                    <h3 class="panel-title">
                              <?php echo $cname;?>
                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                    </h3>
                                </a>
                            </div>
                            <div id="faq-cat-1-sub-<?php echo $cid;?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <img src=" <?php echo $photo;?>" width="1100" height="580"/>
                             
                                </div>
                                
                            
                            </div>
                              
                        </div>
                        
               <?php   }?>
                             
                    </div>
                </div>

            </div>
          </div>
        </div>
    </div>

