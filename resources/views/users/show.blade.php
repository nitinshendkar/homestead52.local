
                    <div class="form-group input-group">
                        <span class="input-group-addon"> first Name</span>
                        <span class="input-group-addon">{{ $user->name }}</span>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"> Last Name</span>
                        <span class="input-group-addon">{{ $user->lastname }}</span>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Mobile Number</span>
                        <span class="input-group-addon">{{ $user->phone }}</span>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon">Email</span>
                       <span class="input-group-addon">{{ $user->email }}</span>
					   </div>
					   @foreach($educations as $education)
					   <div class="form-group input-group">
                        <span class="input-group-addon">Degree</span>
                       	<span class="input-group-addon">{{ $education->degree }}</span>
					   </div>
					   <div class="form-group input-group">
                        <span class="input-group-addon">Board</span>
                       	<span class="input-group-addon">{{ $education->board }}</span>
					   </div>
					   <div class="form-group input-group">
                        <span class="input-group-addon">Percentage</span>
                       	<span class="input-group-addon">{{ $education->percentage }}</span>
					   </div>
					   <div class="form-group input-group">
                        <span class="input-group-addon">Specialization</span>
                       	<span class="input-group-addon">{{ $education->specialization }}</span>
					   </div>
					   <div class="form-group input-group">
                        <span class="input-group-addon">Year Of Passing</span>
                       	<span class="input-group-addon">{{ $education->year_of_passing }}</span>
					   </div>
					   @endforeach

