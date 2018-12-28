@php $experience = \Session::get('experience'); @endphp
@if(!empty($experience))
		
	@switch($experience)

		@case('propel_me')
			<div class="bf-checkpoint__content-wrap bf-checkpoint-screen__transition-group-3">
				<div class="bf-checkpoint__text">
					<p data-focus-first tabindex="0">It sounds like you're looking for a shoe that's low to the ground and fast. We recommend your shoes be:</p>
				</div>
				<div class="bf-checkpoint__grow">
					
					<div class="bf-checkpoint__image-wrap">
						<div class="bf-checkpoint__image">
							
								<div data-bf-load-template data-template="SpeedImage"></div>
							
						</div>
					</div>
				</div>
				<div class="bf-checkpoint__button bf-checkpoint-screen__transition-group-4">
					<button class="bf-button" data-bf-next-screen-link>Continue to final question</button>
				</div>
			</div>
		@break

		@case('connect_me')
			<div class="bf-checkpoint__content-wrap bf-checkpoint-screen__transition-group-3">
				<div class="bf-checkpoint__text">
					<p data-focus-first tabindex="0">It sounds like you're looking for a lightweight, flexible shoe that brings you closer to the ground. We recommend your shoes be:</p>
				</div>
				<div class="bf-checkpoint__grow">
					
					<div class="bf-checkpoint__image-wrap">
						<div class="bf-checkpoint__image">
							
								<div data-bf-load-template data-template="ConnectedImage"></div>
							
						</div>
					</div>
				</div>
				<div class="bf-checkpoint__button bf-checkpoint-screen__transition-group-4">
					<button class="bf-button" data-bf-next-screen-link>Continue to final question</button>
				</div>
			</div>
		@break

		@case('cushion_me')
			<div class="bf-checkpoint__content-wrap bf-checkpoint-screen__transition-group-3">
				<div class="bf-checkpoint__text">
					<p data-focus-first tabindex="0">It sounds like you want a softer, more supportive ride. We recommend your shoes should be:</p>
				</div>
				<div class="bf-checkpoint__grow">
					
					<div class="bf-checkpoint__image-wrap">
						<div class="bf-checkpoint__image">
							
								<div data-bf-load-template data-template="CushionImage"></div>
							
						</div>
					</div>
				</div>
				<div class="bf-checkpoint__button bf-checkpoint-screen__transition-group-4">
					<button class="bf-button" data-bf-next-screen-link>Continue to final question</button>
				</div>
			</div>
		@break

		@case('energize_me')
			<div class="bf-checkpoint__content-wrap bf-checkpoint-screen__transition-group-3">
				<div class="bf-checkpoint__text">
					<p data-focus-first tabindex="0">It sounds like you're looking for a shoe that's responsive and ready for the long haul. We recommend your shoes be:</p>
				</div>
				<div class="bf-checkpoint__grow">
					
					<div class="bf-checkpoint__image-wrap">
						<div class="bf-checkpoint__image">
							
								<div data-bf-load-template data-template="EnergizeImage"></div>
							
						</div>
					</div>
				</div>
				<div class="bf-checkpoint__button bf-checkpoint-screen__transition-group-4">
					<button class="bf-button" data-bf-next-screen-link>Continue to final question</button>
				</div>
			</div>
		@break
	@endswitch

@endif

