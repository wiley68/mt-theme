<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<?php
$logo_url = $attributes['logoUrl'] ?? '';
?>
<div class="flex flex-col justify-center bg-cyan-600 text-white px-2 py-1 shadow-lg">
	<div class="flex flex-wrap items-center space-x-3">
		<button type="button" class="rounded-full p-1 text-white shadow-sm border border-gray-400 hover:border-gray-300 cursor-pointer">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="currentColor" aria-hidden="true" data-slot="icon">
				<path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
			</svg>
		</button>
		<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="flex items-center">
			<?php if (!empty($logo_url)) { ?>
				<img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>" class="size-10">
			<?php } else { ?>
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-10 text-amber-400" fill="currentColor" aria-hidden="true" data-slot="icon">
					<path d="M12.89,3L14.85,3.4L11.11,21L9.15,20.6L12.89,3M19.59,12L16,8.41V5.58L22.42,12L16,18.41V15.58L19.59,12M1.58,12L8,5.58V8.41L4.41,12L8,15.58V18.41L1.58,12Z" />
				</svg>
			<?php } ?>
		</a>
		<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="flex items-center">
			<h1 class="text-2xl font-medium text-amber-400"><?php echo esc_html(get_bloginfo('name')); ?></h1>
		</a>
		<div class="flex flex-1 items-center mx-6">
			<div class="flex-1">
				<div class="flex rounded-md bg-white outline-1 -outline-offset-1 outline-white has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-amber-400">
					<div class="grid shrink-0 grid-cols-1 focus-within:relative">
						<select class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pl-3 pr-7 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-amber-400 sm:text-sm/6">
							<option>Категория 1</option>
							<option>Категория 2</option>
							<option>Категория 3</option>
						</select>
						<svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4" viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
							<path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
						</svg>
					</div>
					<input type="text" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-0 sm:text-sm/6" placeholder="<?php esc_attr_e('Search for products', 'mt-theme'); ?>">
					<button type="button" class="flex shrink-0 items-center gap-x-1.5 rounded-r-md cursor-pointer bg-amber-600 px-3 py-2 text-sm font-semibold text-white outline-1 -outline-offset-1 outline-amber-300 hover:bg-amber-500 focus:relative focus:outline-2 focus:-outline-offset-2 focus:outline-amber-300">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="-ml-0.5 size-4 text-white" fill="currentColor" aria-hidden="true" data-slot="icon">
							<path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
						</svg>
						<?php esc_html_e('Search', 'mt-theme'); ?>
					</button>
				</div>
			</div>
		</div>
		<button id="mt-theme-toggle" type="button" class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-cyan-800 bg-cyan-800 transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2" role="switch" aria-checked="false">
			<span class="sr-only"><?php esc_html_e('Toggle Dark mode', 'mt-theme'); ?></span>
			<span id="mt-theme-toggle-circle" class="pointer-events-none relative inline-block size-5 translate-x-0 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
				<span id="mt-theme-toggle-dark" class="absolute inset-0 flex size-full items-center justify-center opacity-100 transition-opacity duration-200 ease-in" aria-hidden="true">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-3 text-gray-400" fill="none">
						<path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M3.55 19.09L4.96 20.5L6.76 18.71L5.34 17.29M12 6C8.69 6 6 8.69 6 12S8.69 18 12 18 18 15.31 18 12C18 8.68 15.31 6 12 6M20 13H23V11H20M17.24 18.71L19.04 20.5L20.45 19.09L18.66 17.29M20.45 5L19.04 3.6L17.24 5.39L18.66 6.81M13 1H11V4H13M6.76 5.39L4.96 3.6L3.55 5L5.34 6.81L6.76 5.39M1 13H4V11H1M13 20H11V23H13" />
					</svg>
				</span>
				<span id="mt-theme-toggle-light" class="absolute inset-0 flex size-full items-center justify-center opacity-0 transition-opacity duration-100 ease-out" aria-hidden="true">
					<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-3 text-gray-600" fill="currentColor">
						<path d="M17.75,4.09L15.22,6.03L16.13,9.09L13.5,7.28L10.87,9.09L11.78,6.03L9.25,4.09L12.44,4L13.5,1L14.56,4L17.75,4.09M21.25,11L19.61,12.25L20.2,14.23L18.5,13.06L16.8,14.23L17.39,12.25L15.75,11L17.81,10.95L18.5,9L19.19,10.95L21.25,11M18.97,15.95C19.8,15.87 20.69,17.05 20.16,17.8C19.84,18.25 19.5,18.67 19.08,19.07C15.17,23 8.84,23 4.94,19.07C1.03,15.17 1.03,8.83 4.94,4.93C5.34,4.53 5.76,4.17 6.21,3.85C6.96,3.32 8.14,4.21 8.06,5.04C7.79,7.9 8.75,10.87 10.95,13.06C13.14,15.26 16.1,16.22 18.97,15.95M17.33,17.97C14.5,17.81 11.7,16.64 9.53,14.5C7.36,12.31 6.2,9.5 6.04,6.68C3.23,9.82 3.34,14.64 6.35,17.66C9.37,20.67 14.19,20.78 17.33,17.97Z" />
					</svg>
				</span>
			</span>
		</button>
		<div class="relative inline-block text-left">
			<div>
				<button id="mt-theme-user-button" type="button" class="inline-flex w-full justify-center cursor-pointer gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-2 ring-inset ring-white hover:ring-amber-400 hover:bg-gray-50" id="menu-button" aria-expanded="true" aria-haspopup="true">
					<?php if (is_user_logged_in()) { ?>
						<?php $current_user = wp_get_current_user(); ?>
						<p><?php esc_html_e('Hello', 'mt-theme'); ?>,&nbsp;<?php echo esc_html($current_user->display_name); ?></p>
					<?php } else { ?>
						<p><?php esc_html_e('Hello, Guest!', 'mt-theme'); ?></p>
					<?php } ?>
					<svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
						<path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
					</svg>
				</button>
			</div>
			<div id="mt-theme-user" class="absolute right-0 z-10 mt-2 min-w-72 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none opacity-0 scale-95" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
				<?php if (is_user_logged_in()) { ?>
					<div class="py-1" role="none">
						<a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="flex flex-col px-4 cursor-pointer text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="none">
							<div class="flex items-center space-x-2" role="none">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 text-amber-600" fill="currentColor">
									<path d="M21.7,13.35L20.7,14.35L18.65,12.3L19.65,11.3C19.86,11.09 20.21,11.09 20.42,11.3L21.7,12.58C21.91,12.79 21.91,13.14 21.7,13.35M12,18.94L18.06,12.88L20.11,14.93L14.06,21H12V18.94M12,14C7.58,14 4,15.79 4,18V20H10V18.11L14,14.11C13.34,14.03 12.67,14 12,14M12,4A4,4 0 0,0 8,8A4,4 0 0,0 12,12A4,4 0 0,0 16,8A4,4 0 0,0 12,4Z" />
								</svg>
								<p class="text-lg font-medium" role="none"><?php esc_html_e('Account settings', 'mt-theme'); ?></p>
							</div>
							<p class="text-xs text-gray-600" role="none"><?php esc_html_e('View your orders, change your address details, etc.', 'mt-theme'); ?></p>
						</a>
					</div>
					<div class="py-1" role="none">
						<div class="px-4 cursor-pointer text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="none">
							<div class="flex items-center space-x-2" role="none">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 text-amber-600" fill="currentColor">
									<path d="M22,3H2A2,2 0 0,0 0,5V19A2,2 0 0,0 2,21H22A2,2 0 0,0 24,19V5A2,2 0 0,0 22,3M22,19H2V5H22V19M21,6H14V11H21V6M20,8L17.5,9.75L15,8V7L17.5,8.75L20,7V8M9,12A3,3 0 0,0 12,9A3,3 0 0,0 9,6A3,3 0 0,0 6,9A3,3 0 0,0 9,12M9,8A1,1 0 0,1 10,9A1,1 0 0,1 9,10A1,1 0 0,1 8,9A1,1 0 0,1 9,8M15,16.59C15,14.09 11.03,13 9,13C6.97,13 3,14.09 3,16.59V18H15V16.59M5.5,16C6.22,15.5 7.7,15 9,15C10.3,15 11.77,15.5 12.5,16H5.5Z" />
								</svg>
								<p class="text-lg font-medium" role="none"><?php esc_html_e('Contact us', 'mt-theme'); ?></p>
							</div>
							<p class="text-xs text-gray-600" role="none"><?php esc_html_e('You would like to receive information. We will answer all your questions', 'mt-theme'); ?></p>
						</div>
					</div>
					<div class="py-1" role="none">
						<a href="<?php echo esc_url(wp_logout_url(home_url())); ?>" class="flex items-center space-x-2 px-4 text-gray-700 hover:bg-gray-100 hover:text-gray-900">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 text-red-600" fill="currentColor">
								<path d="M20 6.91L17.09 4L12 9.09L6.91 4L4 6.91L9.09 12L4 17.09L6.91 20L12 14.91L17.09 20L20 17.09L14.91 12L20 6.91Z" />
							</svg>
							<p class="text-lg font-medium"><?php esc_html_e('Exit', 'mt-theme'); ?></p>
						</a>
					</div>
			</div>
		<?php } else { ?>
			<div class="py-1" role="none">
				<div class="py-1" role="none">
					<a href="<?php echo esc_url(wp_login_url()); ?>" class="flex flex-col px-4 cursor-pointer text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="none">
						<div class="flex items-center space-x-2" role="none">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 text-amber-600" fill="currentColor">
								<path d="M11 7L9.6 8.4L12.2 11H2V13H12.2L9.6 15.6L11 17L16 12L11 7M20 19H12V21H20C21.1 21 22 20.1 22 19V5C22 3.9 21.1 3 20 3H12V5H20V19Z" />
							</svg>
							<p class="text-lg font-medium" role="none"><?php esc_html_e('Sign in', 'mt-theme'); ?></p>
						</div>
						<p class="text-xs text-gray-600" role="none"><?php esc_html_e('View your account and check your order status', 'mt-theme'); ?></p>
					</a>
				</div>
				<div class="py-1" role="none">
					<a href="<?php echo esc_url(wp_registration_url()); ?>" class="flex flex-col px-4 cursor-pointer text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="none">
						<div class="flex items-center space-x-2" role="none">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 text-amber-600" fill="currentColor">
								<path d="M19,19H5V5H19M19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5C21,3.89 20.1,3 19,3M16.5,16.25C16.5,14.75 13.5,14 12,14C10.5,14 7.5,14.75 7.5,16.25V17H16.5M12,12.25A2.25,2.25 0 0,0 14.25,10A2.25,2.25 0 0,0 12,7.75A2.25,2.25 0 0,0 9.75,10A2.25,2.25 0 0,0 12,12.25Z" />
							</svg>
							<p class="text-lg font-medium" role="none"><?php esc_html_e('Create an account', 'mt-theme'); ?></p>
						</div>
						<p class="text-xs text-gray-600" role="none"><?php esc_html_e('View your orders, change your address details, etc.', 'mt-theme'); ?></p>
					</a>
				</div>
				<div class="py-1" role="none">
					<div class="px-4 cursor-pointer text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="none">
						<div class="flex items-center space-x-2" role="none">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-5 text-amber-600" fill="currentColor">
								<path d="M22,3H2A2,2 0 0,0 0,5V19A2,2 0 0,0 2,21H22A2,2 0 0,0 24,19V5A2,2 0 0,0 22,3M22,19H2V5H22V19M21,6H14V11H21V6M20,8L17.5,9.75L15,8V7L17.5,8.75L20,7V8M9,12A3,3 0 0,0 12,9A3,3 0 0,0 9,6A3,3 0 0,0 6,9A3,3 0 0,0 9,12M9,8A1,1 0 0,1 10,9A1,1 0 0,1 9,10A1,1 0 0,1 8,9A1,1 0 0,1 9,8M15,16.59C15,14.09 11.03,13 9,13C6.97,13 3,14.09 3,16.59V18H15V16.59M5.5,16C6.22,15.5 7.7,15 9,15C10.3,15 11.77,15.5 12.5,16H5.5Z" />
							</svg>
							<p class="text-lg font-medium" role="none"><?php esc_html_e('Contact us', 'mt-theme'); ?></p>
						</div>
						<p class="text-xs text-gray-600" role="none"><?php esc_html_e('You would like to receive information. We will answer all your questions', 'mt-theme'); ?></p>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</div>
</div>