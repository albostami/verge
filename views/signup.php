Signup Now!
<div class="container">
 <form action="<?php echo $this->make_route('/signup')?>" method ="post" >
  <div class="row" >	
	<label class ="col span-1-of-12" for ="name">Name </label>
	<div class="col span-1-of-12">
		<input id ="name" name="name" type="text"> 
	</div>
  </div>
  <div class="row"> 		
	<label class ="col span-1-of-12" for="email">Email</label>
	<div class ="col span-1-of-12">
		<input id="email" name="email" type="text"> 
	</div>
  </div>
  <div class="row">		
	<input type="Submit" value="Submit">
  </div>
 </form>
</div>