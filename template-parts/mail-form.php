<!-- wrap form START -->
<div class="wrap-form">
	<form name="form-contact" class="form-contact">
		<!-- name and email -->
		<div class="form-row">
			<div class="field-wrap half required">
				<label for="name">Name</label>
				<input type="text" name="name" id="name" required>
			</div>
			<div class="field-wrap half required">
				<label for="email">Email</label>
				<input type="email" name="email" id="email" required>
			</div>
		</div>

		<!-- theme -->
		<div class="form-row">
			<div class="field-wrap full required">
				<label for="subject">Theme</label>
				<select name="subject" id="subject">
					<option value="Subject 1" selected>Subject 1</option>
					<option value="Subject 1">Subject 2</option>
					<option value="Subject 1">Subject 3</option>
				</select>
			</div>
		</div>

		<!-- message -->
		<div class="form-row">
			<div class="field-wrap full">
				<label for="message">Message</label>
				<textarea name="message" id="message" cols="30" rows="5"></textarea>
			</div>
			<!-- info message -->
			<div class="form-info-message form-info-message-absolute" style="display: none; opacity: 0;">Error!</div>
		</div>

		<!-- groups -->
		<div class="form-row form-row-group">
			<div class="field-wrap checkbox">
				<label for="bad">Bad</label>
				<input type="checkbox" id="bad" value="Bad" name="Feel[]">
			</div>
			<div class="field-wrap checkbox">
				<label for="good">Good</label>
				<input type="checkbox" id="good" value="Good" name="Feel[]">
			</div>
			<div class="field-wrap checkbox">
				<label for="great">Great</label>
				<input type="checkbox" id="great" value="Great" name="Feel[]">
			</div>
		</div>

		<!-- attachments -->
		<div class="form-row form-row-files">
			<div class="field-wrap">
				<input
						type='file'
						id="form-contact-attachments"
						name='attachments[]'
						multiple>
			</div>
			<div class="field-wrap full notices">
				<span class="form-notice">Maximus size: 5 Mb</span>
				<span class="form-notice">Valid types: images , zip </span>
			</div>
		</div>

		<!-- agreement -->
		<div class="form-row">
			<div class="field-wrap checkbox agreement required">
				<input type="checkbox" id="agreement" value="agree" name="agreement" required>
				<label for="agreement">Agree ...</label>
			</div>
		</div>

		<!-- recaptcha -->
		<!-- <div class="recaptcha g-recaptcha" style="margin-top:25px; margin-bottom: 25px"></div> -->

		<!-- submit -->
		<div class="form-row">
			<input type="submit" value="Send">
		</div>
	</form>
</div> <!-- // wrap-form END -->