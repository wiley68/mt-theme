<?php

/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>
<div class="flex flex-col justify-center bg-cyan-600 text-white px-2 py-1 shadow-lg">
	<div class="flex flex-wrap items-center space-x-3">
		<button type="button" class="rounded-full p-1 text-white shadow-sm border border-gray-400 hover:border-gray-300 cursor-pointer">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6" fill="currentColor" aria-hidden="true" data-slot="icon">
				<path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
			</svg>
		</button>
		<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="flex items-center">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-10 text-amber-400 hover:text-amber-300" fill="currentColor" aria-hidden="true" data-slot="icon">
				<path d="M12.89,3L14.85,3.4L11.11,21L9.15,20.6L12.89,3M19.59,12L16,8.41V5.58L22.42,12L16,18.41V15.58L19.59,12M1.58,12L8,5.58V8.41L4.41,12L8,15.58V18.41L1.58,12Z" />
			</svg>
		</a>
		<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?>" class="flex items-center">
			<h1 class="text-2xl font-medium text-amber-400 hover:text-amber-300"><?php esc_html_e('АВАЛОН', 'mt-theme'); ?></h1>
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
					<input type="text" class="block min-w-0 grow py-1.5 pl-1 pr-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline focus:outline-0 sm:text-sm/6" placeholder="<?php esc_attr_e('Search for products', 'mt-theme'); ?>">
					<button type="button" class="flex shrink-0 items-center gap-x-1.5 rounded-r-md cursor-pointer bg-amber-600 px-3 py-2 text-sm font-semibold text-white outline-1 -outline-offset-1 outline-amber-300 hover:bg-amber-500 focus:relative focus:outline-2 focus:-outline-offset-2 focus:outline-amber-300">
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="-ml-0.5 size-4 text-white" fill="currentColor" aria-hidden="true" data-slot="icon">
							<path d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
						</svg>
						<?php esc_html_e('Search', 'mt-theme'); ?>
					</button>
				</div>
			</div>
		</div>
		<button id="mt-theme-toggle" aria-label="Превключи режим" class="cursor-pointer ml-2">
			🌓 Превключи режим
		</button>
	</div>
</div>