<?php
/**
* 
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
* @package schneider
*/
	
    //get_template_part( 'footer-widget' ); 
?>

	<footer id="page-footer" role="contentinfo">
		<div class="container">
			<p><strong>SIGN UP FOR EMAIL: Learn more about LayoutFAST best practices, new solutions and offers.</strong></p>
			
			<div class="signup">
				<input type="email" class="form-control w-90" placeholder="Email Address">
				<select class="form-control w-90" name="role">
					<option>I am a...</option>
					<option value="electrical-engineer">Electrical Engineer</option>
					<option value="project-manager">Project Manager</option>
					<option value="electrican">Electrican</option>
					<option value="designer">Designer</option>
					<option value="architect">Architect</option>
					<option value="hvac">HVAC Engineer</option>
					<option value="plumbing">Plumbing Engineer</option>
					<option value="spec-writer">Spec Writer</option>
					<option value="bim-subcontractor">BIM Sub-Contractor</option>
					<option value="bim-manager">BIM Manager</option>
					<option value="bim-specialist">BIM Specialist</option>
					<option value="cad-manager">CAD Manager</option>
					<option value="cad-draftsperson">CAD Draftsperson</option>
					<option value="estimator">Estimator</option>
					<option value="student">Student</option>
					<option value="panel-builder">Panel Builder</option>
					<option value="sales-manager">Sales Manager</option>
					<option value="sales-person">Sales Person</option>
					<option value="owner">Owner</option>
					<option value="facility-manager">Facility Manager</option>
					<option value="superintendent">Superintendent</option>
					<option value="other">Other</option>
				</select>
				<select class="form-control w-90" name="use">
					<option>for a...</option>
					<option value="electrical-consultant">Electrical Consultant</option>
					<option value="general-contractor">General Contractor</option>
					<option value="sub-contractor">Sub Contractor</option>
					<option value="owner">Owner/Self Employed</option>
					<option value="architectural-company">Architectural Company</option>
					<option value="distributor">Distributor</option>
					<option value="oem">OEM</option>
					<option value="reseller">Business Reseller</option>
					<option value="consumer">Consumer/Personal Use</option>
					<option value="educational">Educational Institution</option>
					<option value="government">Government Agency</option>
					<option value="plumbing-consultant">Plumbing Consultant</option>
					<option value="hvac-consultant">HVAC Consultant</option>
					<option value="corporation">Corporation</option>
					<option value="retailer">Retailer</option>
					<option value="service-provider">Service Provider</option>
					<option value="system-integrator">System Integrator</option>
					<option value="bldg-developer">Building Developer</option>
					<option value="facility-maintenance">Facility Maintenance</option>
				</select>
				<button class="btn btn-primary">OK</button>

				<ul class="social">
					<li><a href="#" target="_blank"><img src="/layoutfast/wp-content/themes/schneider/assets/images/social-facebook.svg"></a></li>
					<li><a href="#" target="_blank"><img src="/layoutfast/wp-content/themes/schneider/assets/images/social-googleplus.svg"></a></li>
					<li><a href="#" target="_blank"><img src="/layoutfast/wp-content/themes/schneider/assets/images/social-twitter.svg"></a></li>
					<li><a href="#" target="_blank"><img src="/layoutfast/wp-content/themes/schneider/assets/images/social-linkedin.svg"></a></li>
					<li><a href="#" target="_blank"><img src="/layoutfast/wp-content/themes/schneider/assets/images/social-youtube.svg"></a></li>
				</ul>
			</div>
		</div>
	</footer>
	<div class="bottombar">
		<div class="container">
			<img src="/layoutfast/wp-content/themes/schneider/assets/images/brand-lifeison.png">
			<p>&copy;2018, Schneider Electric</p>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
