<div id="footer" class="animatedParent animateOnce">
	<div id="info">
		<div id="wrap">
			<div class="tab">
				<div class="row">
					<div id="information" class="col animated bounceInRight slower delay-250">
						<h2>Information</h2>
						<div class="tab">
							<div class="row">
								<div class="col">
									<img src="{{ asset('asset/picture-default/i-phone.png') }}">
								</div>
								<div class="col">
									<p>Tel : +6221 - 866 12832-33</p>
									<p>Fax : +6221 866 124 52</p>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<img src="{{ asset('asset/picture-default/i-mail.png') }}">
								</div>
								<div class="col">
									<p>info@anugrahalamabadi.com</p>
									<p>www.anugrahalamabadi.com</p>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<img src="{{ asset('asset/picture-default/i-location.png') }}">
								</div>
								<div class="col">
									<p>
										Kompleks Rukan Buaran Persada No. 20 Jl. Jend. Sukamto - Duren Sawit Jakarta Timus 13450 Indonesia
									</p>
								</div>
							</div>
						</div>
					</div>
					<div id="find_us" class="col animated bounceInDown slower delay-250" style="display: none;">
						<h2>Find Us</h2>
						<a href="">
							<img src="{{ asset('asset/picture-default/i-fb.png') }}">
						</a>
						<a href="">
							<img src="{{ asset('asset/picture-default/i-ig.png') }}">
						</a>
						<a href="">
							<img src="{{ asset('asset/picture-default/i-yt.png') }}">
						</a>
					</div>
					<div id="message" class="col animated bounceInLeft slower delay-250">
						<h2>Message</h2>
						<div id="response">
							<div class="text-center">
								<div class="tab">
									<div class="row">
										<div class="col">
											<h4>Info</h4>
											<h3 id="content">Waiting...! Send Your Request..!</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
						<form action="{{ route('message') }}">
							<div class="bar">
								<label id="name" class="error"></label>
								<input type="text" name="name" placeholder="Name">
							</div>
							<div class="bar">
								<label id="handphone" class="error"></label>
								<input type="text" name="handphone" placeholder="Handphone">
							</div>
							<div class="bar">
								<label id="email" class="error"></label>
								<input type="text" name="email" placeholder="Email">
							</div>
							<div class="bar">
								<label id="subject" class="error"></label>
								<input type="text" name="subject" placeholder="Subject">
							</div>
							<div class="bar">
								<label id="message" class="error"></label>
								<textarea name="message" placeholder="Message" rows="4"></textarea>
							</div>
							<div class="bar">
								<label id="g-recaptcha-response" class="error"></label>
								<div 
									class="g-recaptcha" 
									data-sitekey="6Lf6NnIUAAAAAKmjlPhnu3FiIA77O8r-V80Tr25b"
									data-callback="recaptcha_callback"
								></div>
								<button type="submit" disabled="true">
									Submit
								</button>
								<div class="clearfix"></div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="copyright" class="text-center">
		<div id="wrap">
			<div class="tab">
				<div class="row animated bounceInUp slower delay-250">
					<div class="col">
						© Copyright 2019 All Rights Reserved
					</div>
					<div class="col">
						|
					</div>
					<div class="col">
						Development By
					</div>
					<div class="col">
						<img src="{{ asset('asset/picture-default/porthole_co.png') }}">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>